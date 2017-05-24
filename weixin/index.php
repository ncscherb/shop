<?php
/**
  * wechat php test
  * update time: 20141008
  */

include("./WeChat.php");
//define your token
define("APPID","wxd909d273b63fc535");
define("APPSECRET","97fa95bd7aea4026d6cdec2ad2d7e784");
define("TOKEN","dsl");

$wechat=new WeChat(APPID,APPSECRET,TOKEN);
//$wechat->responseMsg();
$wechat->valid();
