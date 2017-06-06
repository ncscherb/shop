<?php
/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 17-6-4
 * Time: 上午11:03
 */
header("content-type:text/html;charset=utf-8");
$soap=new SoapClient("http://www.webxml.com.cn/WebServices/ChinaZipSearchWebService.asmx?wsdl");

var_dump($soap->__getFunctions());
var_dump($soap->__getTypes());

//$soap->getZipCodeByAddress(array("theZipCode"=>430035));
$result=$soap->getAddressByZipCode(array("theZipCode"=>"430035","userID"=>""));

var_dump($result);
echo $result->getAddressByZipCodeResult->any;

