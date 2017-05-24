<?php
/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 17-5-12
 * Time: 下午10:24
 */

class WeChat
{
    private $_appid;
    private $_appsecret;
    private $_token;

    public function __construct($appid,$appsecret,$token)
    {
       $this->_appid=$appid;
       $this->_appsecret=$appsecret;
       $this->_token=$token;

    }

    function curlRequest($url,$https=true,$method="get",$data=null)
    {
        $curl=curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_HEADER,false);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        if($https)
        {
            curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
            curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
        }
        if($method=="post")
        {
            curl_setopt($curl,CURLOPT_POST,true);
            curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
        }

        $str=curl_exec($curl);
        curl_close($curl);

        return $str;
    }

    function getAccesstoken()
    {
        $filepath="./accesstoken";

        if(file_exists($filepath))
        {
            $content=file_get_contents($filepath);
            $content=json_decode($content,true);

            if(time()-filemtime($filepath)<($content["expires_in"]-100))
            {
                return $content["access_token"];
            }
        }

        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->_appid.
            "&secret={$this->_appsecret}";
        $content=$this->curlRequest($url);
        file_put_contents($filepath,$content);
        $content=json_decode($content,true);

        return $content["access_token"];
    }

	//获取ticket
    function getTicket($type='temp',$scene=1,$expires_secords=604800)
    {
       if($type=='temp')
       {
           $data="{\"expire_seconds\": {$expires_secords}, \"action_name\": \"QR_SCENE\", \"action_info\": {\"scene\": {\"scene_id\": {$scene}}}}";

       }
       else{
           $data='{"action_name": "QR_LIMIT_SCENE", "action_info": {"scene": {"scene_id": '.$scene.'}}}';
       }

        $token=$this->getAccesstoken();
        $ticket=$this->curlRequest("https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=$token",true,"post",$data);

        return $ticket;
   }
	
	function getQRCode($type='temp',$scene=1,$expires_secords=604800)
	{
        $ticket=$this->getTicket($type,$scene,$expires_secords);
        $ticket=json_decode($ticket)->ticket;

        $img=$this->curlRequest("https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=".urlencode($ticket));

        return $img;
	}

    public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }

    public function responseMsg()
    {
        //get post data, May be due to the different environments
        //$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        $postStr=file_get_contents("php://input");

        //extract post data
        if (!empty($postStr)){

            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
            if(!empty( $keyword ))
            {
                $msgType = "text";
                $contentStr = "Welcome to wechat world!";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }else{
                echo "Input something...";
            }

        }else {
            echo "";
            exit;
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = $this->_token;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
}
