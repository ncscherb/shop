<?php
/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 17-5-14
 * Time: 上午11:21
 */
include("./CWeChat.php");

header("Content-Type:image/jpeg");
$wecat=new CWeChat(APPID,APPSECRET,TOKEN);
echo $wecat->getQRCode("temp",11);
