<?php
/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 17-6-5
 * Time: 上午11:21
 */

$webClient=new SoapClient("http://localhost/shop/webservice/wsdl.xml",
    array("trace"=>true,"exceptions"=>true));
var_dump($webClient);
var_dump($webClient->__getFunctions());

var_dump($webClient->test("aa"));
