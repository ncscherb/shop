<?php

/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 17-5-25
 * Time: 下午9:48
 */

include_once("./MessageClass.php");

interface IMessage
{
    public function responseMsg($postObj);
}

class CMessageManager
{

    public static function responseMsg()
    {
        //get post data, May be due to the different environments
        //$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        $postStr=file_get_contents("php://input");

        //extract post data
        if (!empty($postStr)){

            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            // header('Location: '."./test.php?post=".json_encode($postObj));

            switch ($postObj->MsgType)
            {
                case "text":
                   $message=new TextMessage();
                    break;
                case "image":
                    $message=new ImageMessage();
                    break;
                case "location":
                    $message=new LocationMessage();
                    break;
                case "event":
                    $message=CMessageManager::doEvent($postObj);
                    break;
            }

            if(!isset($message))
            {
                echo "message is not defined!";
            }
            $message->responseMsg($postObj);

        }else {
            echo "";
            exit;
        }

    }

    public static function doEvent($postObj)
    {
        switch($postObj->Event)
        {
            case "CLICK":
                return new MenuMessage();
                break;
            case "subscribe":
            case "unsubscribe":
                return new SubscribeMessage();
                break;
            case "scancode_waitmsg":
                return new ScanMessage();
                break;
            default:

                break;

        }

    }
}

