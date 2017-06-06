<?php
/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 17-6-5
 * Time: 下午1:23
 */

//创建rpc服务器
$rpcServer = xmlrpc_server_create();

xmlrpc_server_register_method($rpcServer,"hello","hello");

$request=file_get_contents("php://input");

$xmlResponse=xmlrpc_server_call_method($rpcServer,$request,nul);

header("content-type:text/html");
echo $xmlResponse;

xmlrpc_server_destroy($rpcServer);


