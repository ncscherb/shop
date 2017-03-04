<?php
/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 2/19/17
 * Time: 5:14 PM
 */
//生成ｊson
//１．关联数组
$relationArray=array("city"=>"wuhan","wind"=>"north");
$relationJson=json_encode($relationArray);

echo$relationJson."<br/>";

//反编码json
//远程获取数据
$data=file_get_contents("http://www.weather.com.cn/data/cityinfo/101010100.html");
$dataPhp=json_decode($data,true);

print_r($dataPhp);
