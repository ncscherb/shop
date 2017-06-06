<?php
/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 17-6-5
 * Time: 上午11:17
 */
function test($term)
{
    return $term;
}

$webService=new SoapServer("./wsdl.xml");
//$webService=new SoapServer("http://localhost/shop/webservice/webServiceServer.wsdl");
$webService->addFunction('test');

$webService->handle();

//var_dump($webService->getFunctions());