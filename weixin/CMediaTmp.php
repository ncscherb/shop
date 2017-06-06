<?php

/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 17-6-2
 * Time: 下午10:56
 */
include_once "./CWeChat.php";

class CMediaTmp
{
    private $url="https://api.weixin.qq.com/cgi-bin/media/upload?access_token=%s&type=%s";
    private $wechat;

    function __construct()
    {
        $this->wechat=new CWeChat();
    }

    public function addImageMedia($filepath){
        $url=sprintf($this->url,$this->wechat->getAccesstoken(),"image");
        //$data["media"]="@".$filepath;
        $data["media"]=new CURLFile($filepath);

        $result=$this->wechat->curlRequest($url,true,"post",$data);

        var_dump($result);
    }
}