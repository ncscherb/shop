<?php

/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 17-5-27
 * Time: 下午10:51
 */
include_once("./../CWeChat.php");
require_once("./../CMessage.php");

class CMessageSend
{
    private $url="https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token=";
    private $weChat;

    function __construct()
    {
        $this->weChat=new CWeChat();
        $this->url.=$this->weChat->getAccesstoken();
    }

    function sendAll()
    {

        $message=CMessage::sendMessage("hello world",MessageEumn::TEXT,time());
        $result=$this->weChat->curlRequest($this->url,true,"post",$message);

        $result=json_decode($result);
        var_dump($result);
        if($result->errcode==0)
        {
            echo "send all success";
        }
        else
        {
            var_dump($result);
        }
    }
}

