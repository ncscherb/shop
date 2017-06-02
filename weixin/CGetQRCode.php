<?php
/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 17-5-27
 * Time: 下午7:47
 */
include_once("./WeChat.php");
header("Content-Type:image/jpeg");
define("APPID","wxd909d273b63fc535");
define("APPSECRET","97fa95bd7aea4026d6cdec2ad2d7e784");
define("TOKEN","dsl");

$wechat=new WeChat(APPID,APPSECRET,TOKEN);
echo $wechat->getQRCode();
