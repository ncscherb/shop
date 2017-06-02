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

class CMessageResponse
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

            $messageFactory=new CMessageFactory();
            $message=$messageFactory->messageCreate($postObj);

            if(empty($message))
            {
                echo "message is not defined!";
            }
            $message->responseMsg($postObj);

        }else {
            echo "";
            exit;
        }

    }

}

