<?php

/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 17-5-24
 * Time: 下午9:42
 */
include_once("./../CWeChat.php");

class CMenu
{
    private $weChat;
    private $token;

    public function __construct()
    {
        $this->weChat=new CWeChat();
        $this->token=$this->weChat->getAccesstoken();
    }

    public function createMenu()
    {
        $menuJson=file_get_contents("./menu.json");
        $url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$this->token;

        $msg=$this->weChat->curlRequest($url,true,"post",$menuJson);
        $msg=json_decode($msg);

        if($msg->errcode===0)
            return "create menu success";

    }

    public function queryMenu()
    {
        $url="https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".$this->token;

        $query=$this->weChat->curlRequest($url);

        return $query;
    }

    public function deleteMenu()
    {
        $url="https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=".$this->token;

        $msg=$this->weChat->curlRequest($url);

        $msg=json_decode($msg);
        if($msg->errcode===0)
            return "delete menu success!";
    }
}

$menu=new CMenu();
switch ($_GET["type"])
{
    case "create":
        echo $menu->createMenu();
        break;
    case "query":
        echo $menu->queryMenu();
        break;
    case "delete":
        echo $menu->deleteMenu();
        break;
    default;

}
