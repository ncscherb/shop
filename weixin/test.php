<?php

/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 17-5-22
 * Time: 下午10:52
 */


include("./WeChat.php");
//define your token
define("APPID","wxd909d273b63fc535");
define("APPSECRET","97fa95bd7aea4026d6cdec2ad2d7e784");
define("TOKEN","dsl");

$wechat=new WeChat(APPID,APPSECRET,TOKEN);

$data=array("uuid"=>"EULUAZWBcfABAZBEERcGWHiYAWWNWHfD",
    "question"=>"地方",
    "robotName"=>"小谛",
    "unique_id"=>"7818c7f73c31468ca03c63b7375994b9",
    "answer1"=>"我不会的问题，我会在24小时内学会。",
    "answer2"=>"我不会的问题，我会在24小时内学会。",
    "answer3"=>"我不会的问题，我会在24小时内学会。",
    "answer4"=>"我不会的问题，我会在24小时内学会。",
    "answer5"=>"我不会的问题，我会在24小时内学会。",
    "enable"=>"False",
    );
$data=json_encode($data);

$data='{"uuid":"EULUAZWBcfABAZBEERcGWHiYAWWNWHfD","question":"地方","robotName":"小谛","unique_id":"7818c7f73c31468ca03c63b7375994b9","answer1":"我不会的问题，我会在24小时内学会。","answer2":"也许您可以换个说法，我还在学习。","answer3":"我还小呢！有些问题我搞不懂。","answer4":"你说的我没搞懂，也许您换个说法就好了。","answer5":"您说的跟我的工作似乎没什么关系。","enable":"False"}';

var_dump($wechat->curlRequest("http://www.ditingai.com/api/chat/info",false,"post",
    $data));
