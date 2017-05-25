<?php

/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 17-5-25
 * Time: 下午9:48
 */
use weixin;

interface IMessage
{
    public function responseMsg($postObj);
}

class CMessageManager
{

    public function responseMsg()
    {
        //get post data, May be due to the different environments
        //$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        $postStr=file_get_contents("php://input");

        //extract post data
        if (!empty($postStr)){

            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);

            switch ($postObj->MsgType)
            {
                case "text":
                   $message=new TextMessage();
                    break;
                case "event":
                    $message=$this->doEvent($postObj);
                    break;
            }

            $message->responseMsg($postObj);

        }else {
            echo "";
            exit;
        }


    }

    public function doEvent($postObj)
    {
        switch($postObj->EVENT)
        {
            case "CLICK":
                return new CMenuMessage();
        }

    }
}