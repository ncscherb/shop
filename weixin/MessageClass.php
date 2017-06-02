<?php

/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 17-5-25
 * Time: 下午10:14
 */

include_once("./CMessage.php");

class CMessageFactory
{
    public function messageCreate($postObj)
    {
        switch ($postObj->MsgType)
        {
            case MessageEumn::TEXT:
                $message=new TextMessage();
                break;
            case MessageEumn::IMAGE:
                $message=new ImageMessage();
                break;
            case MessageEumn::LOCATION:
                $message=new LocationMessage();
                break;
            case MessageEumn::EVENT:
                $message=$this->doEvent($postObj->Event);
                break;
        }

        return $message;

    }

    public function doEvent($event)
    {
        switch($event)
        {
            case MessageEumn::CLICK:
                $message= new MenuMessage();
                break;
            case MessageEumn::SUBSCRIBE:
            case MessageEumn::UNSUBSCRIBE:
                $message=new SubscribeMessage();
                break;
            case MessageEumn::SCANCODE_WAITMSG:
                $message= new ScanMessage();
                break;
            default:

                break;

        }

        return $message;
    }
}

class TextMessage implements IMessage
{
    public function responseMsg($postObj)
    {
        // TODO: Implement responseMsg() method.

        $keyword = trim($postObj->Content);

        if(!empty( $keyword ))
        {
            $contentStr = "Welcome to wechat world!";

            $arr=array( "createTime"=>time(),
                "content"=>$contentStr);

           // $resultStr=CMessage::message(MessageEumn::TEXT,$postObj,$arr);
            $resultStr=CMessage::message(MessageEumn::MUSIC,$postObj,$arr);
            echo $resultStr;
        }else{
            echo "Input something...";
        }
    }
}

class MenuMessage implements IMessage
{
    public function responseMsg($postObj)
    {
        // TODO: Implement responseMsg() method.

        switch ($postObj->EventKey)
        {
            case "news" :
                $arr=array(array("title"=>"邓庆旭：老百姓投资理财需求大 资产多样化配置不足",
                    "description"=>"新浪财经主办的“2017中国银行(3.700, 0.04, 1.09%)业资产管理高峰论坛”今日在北京开幕。新浪网副总裁邓庆旭在论坛上致辞时表示，中国这几年发展速度非常快，老百姓(44.430, 0.62, 1.42%)手中逐渐有了一些闲钱，因此在投资理财方面的诉求不断加大。但不得不承认，目前老百姓可投资的渠道，相对来说还是比较窄的。老百姓参与度比较高的，大多是炒股票，买房，买基金等，资产多样化配置的选择不多",
                    "picUrl"=>"http://n.sinaimg.cn/finance/transform/20170525/i_VQ-fyfkzht0827806.jpg",
                    "url"=>"http://finance.sina.com.cn/money/bank/bank_hydt/2017-05-25/doc-ifyfqvmh8816748.shtml"),
                    array("title"=>"图解专栏-骑士一念佛一念魔的秘武",
                        "description"=>"五月底的北京，已经热的我有点空虚，路上蒸发的烤人热度，让我甚至都对小姐姐们的装扮失去了兴趣。",
                        "picUrl"=>"http://n.sinaimg.cn/sports/transform/20170525/y15q-fyfquym0439594.jpg",
                        "url"=>"http://sports.sina.com.cn/basketball/nba/2017-05-25/doc-ifyfqvmh8799327.shtml"));
                break;

        }
        $arr=array(array("title"=>"邓庆旭：老百姓投资理财需求大 资产多样化配置不足",
            "description"=>"新浪财经主办的“2017中国银行(3.700, 0.04, 1.09%)业资产管理高峰论坛”今日在北京开幕。新浪网副总裁邓庆旭在论坛上致辞时表示，中国这几年发展速度非常快，老百姓(44.430, 0.62, 1.42%)手中逐渐有了一些闲钱，因此在投资理财方面的诉求不断加大。但不得不承认，目前老百姓可投资的渠道，相对来说还是比较窄的。老百姓参与度比较高的，大多是炒股票，买房，买基金等，资产多样化配置的选择不多",
            "picUrl"=>"http://n.sinaimg.cn/finance/transform/20170525/i_VQ-fyfkzht0827806.jpg",
            "url"=>"http://finance.sina.com.cn/money/bank/bank_hydt/2017-05-25/doc-ifyfqvmh8816748.shtml"),
            array("title"=>"图解专栏-骑士一念佛一念魔的秘武",
                "description"=>"五月底的北京，已经热的我有点空虚，路上蒸发的烤人热度，让我甚至都对小姐姐们的装扮失去了兴趣。",
                "picUrl"=>"http://n.sinaimg.cn/sports/transform/20170525/y15q-fyfquym0439594.jpg",
                "url"=>"http://sports.sina.com.cn/basketball/nba/2017-05-25/doc-ifyfqvmh8799327.shtml"));
        $resultStr= CMessage::news($postObj,$arr);

        echo $resultStr;

    }
}

class LocationMessage implements IMessage
{
   public function responseMsg($postObj)
   {
        // TODO: Implement responseMsg() method.
        $content="Your location is=>weidu:".$postObj->Location_X.",jingdu: ".$postObj->Location_Y;

       $arr=array( "createTime"=>time(),
           "content"=>$content);

       echo CMessage::message(MessageEumn::TEXT,$postObj,$arr);
   }
}

class ImageMessage implements IMessage
{
    public function responseMsg($postObj)
    {
        // TODO: Implement responseMsg() method.
        $content="Your image url is :".$postObj->PicUrl;

        //echo CMessage::message(MessageEumn::IMAGE_URL,$postObj,$content);
       // echo CMessage::message(MessageEumn::IMAGE_ID,$postObj,$postObj->MediaId);
        $arr=array("content"=>$postObj->MediaId);
        echo CMessage::message(MessageEumn::TEXT,$postObj,$arr);

    }
}

class SubscribeMessage implements IMessage
{
    public function responseMsg($postObj)
    {
        // TODO: Implement responseMsg() method.
        if($postObj->Event=="subscribe")
        {
            $this->subscribe($postObj);
        }
        else
        {

        }
    }

    public function subscribe($postObj)
    {
        $arr="Welcome to Mr Deng's WeChat";
        echo CMessage::message(MessageEumn::TEXT,$postObj,$arr);
    }

    public function unsubscribe()
    {
    }
}

class ScanMessage implements IMessage
{
    public function responseMsg($postObj)
    {
        // TODO: Implement responseMsg() method.
        $arr=$postObj->ScanCodeInfo->ScanResult;

        echo CMessage::message(MessageEumn::TEXT,$postObj,$arr);
    }
}