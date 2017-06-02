<?php

/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 17-5-26
 * Time: 下午7:28
 */

//include_once ("./MessageClass.php");

class MessageEumn
{
   const TEXT="text";
   const IMAGE_ID=1;
   const IMAGE_URL=2;
   const IMAGE="image";
   const SUBSCRIBE="subscribe";
   const UNSUBSCRIBE="unsubscribe";
   const LOCATION="location";
   const EVENT="event";
   const CLICK="CLICK";
   const SCANCODE_WAITMSG="scancode_waitmsg";
   const MUSIC="music";

}

class CMessage
{

    public static function message($type,$postObj,$arr,$time=-1)
    {

        if(!is_array($arr))
        {
            if($time==-1)
                $arr=array( "createTime"=>time(),
                    "content"=>$arr);
            else
                $arr=array( "createTime"=>$time,
                    "content"=>$arr);
        }

        $arr["fromUserName"]=$postObj->FromUserName;
        $arr["toUserName"]=$postObj->ToUserName;

        switch ($type)
        {
            case MessageEumn::IMAGE_ID:
                return CMessage::image($arr);
                break;
            case MessageEumn::IMAGE_URL:
            case MessageEumn::TEXT:
                return CMessage::text($arr);
                break;
            case MessageEumn::MUSIC:
                return self::music($arr);
        }
    }

    public static function text($arr,$postObj=null)
    {

        $textTpl = "<xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[text]]></MsgType>
                <Content><![CDATA[%s]]></Content>
                <FuncFlag>0</FuncFlag>
                </xml>";

        $textTpl=sprintf($textTpl,$arr["fromUserName"],$arr["toUserName"],$arr["createTime"],$arr["content"]);

        return $textTpl;
    }

    public static function music($arr){
        $textTpl="<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[music]]></MsgType>
            <Music>
            <Title><![CDATA[TITLE]]></Title>
            <Description><![CDATA[DESCRIPTION]]></Description>
            <MusicUrl><![CDATA[http://music.163.com/m/song?id=152428&from=singlemessage]]></MusicUrl>
            <HQMusicUrl><![CDATA[http://music.163.com/m/song?id=152428&from=singlemessage]]></HQMusicUrl>
            <ThumbMediaId><![CDATA[FeT2ylLB6t4VMIt0P4PLiXbZCuSYedWfiFfgvmTvuge92Fa3xG5Crcd6rSIMk-In]]></ThumbMediaId>
            </Music>
            </xml>";

        $textTpl=sprintf($textTpl,$arr["fromUserName"],$arr["toUserName"],$arr["createTime"]);

        return $textTpl;
    }

    public static function news($postObj,$arr)
    {
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;

        $textTpl="<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[news]]></MsgType>
            <ArticleCount>%s</ArticleCount>
            <Articles>
            %s
            </xml>";

        $item="<item>
            <Title><![CDATA[%s]]></Title> 
            <Description><![CDATA[%s]]></Description>
            <PicUrl><![CDATA[%s]]></PicUrl>
            <Url><![CDATA[%s]]></Url>
            </item>";

        $items="";
        for($i=0;$i<count($arr);$i++)
        {
            $items.=sprintf($item,$arr[$i]["title"],$arr[$i]["description"],$arr[$i]["picUrl"],$arr[$i]["url"]);
        }

        $textTpl=sprintf($textTpl,$fromUsername,$toUsername,time(),count($arr),$items);

        return $textTpl;
    }

    public static function image($arr,$postObj=null)
    {

        $textTpl="<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[image]]></MsgType>
            <Image>
            <MediaId><![CDATA[%s]]></MediaId>
            </Image>
            </xml>";

       $arr["mediaId"]=isset($arr["mediaId"])?$arr["mediaId"]:$arr["content"];
       $textTpl=sprintf($textTpl,$arr["fromUserName"],$arr["toUserName"],$arr["createTime"],$arr["mediaId"]);

       return $textTpl;
    }


    public static function sendMessage($content,$msgType,$msgId,$isToAll="true",$tagId=2){

       switch ($msgType)
       {
           case MessageEumn::TEXT:
               $sendMessage=self::sendText($content,$msgId,$isToAll,$tagId);
               break;

       }

       return $sendMessage;
    }

    public static function sendText($content,$msgId,$isToAll="true",$tagId=2){

        $textTpl='{
           "filter":{
              "is_to_all":%s,
              "tag_id":%s
           },
           "text":{
              "content":"%s"
           },
            "msgtype":"%s",
            "clientmsgid":"%s"
        }';

        $textTpl=sprintf($textTpl,$isToAll,$tagId,$content,"text",$msgId);

        return $textTpl;
    }
}
