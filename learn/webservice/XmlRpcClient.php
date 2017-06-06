<?php

/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 17-6-5
 * Time: 下午6:43
 */
class XmlRpcClient{

    private $url="";

    public function __construct($url){
        $this->url=$url;
    }

    public function query($request){
        echo $request;

        $http=stream_context_create(array(
            "http"=>array(
                "method"=>"POST",
                "header"=>"Content-Type:text/html",
                "content"=>$request
            )
        ));

        $response = file_get_contents($this->url, false, $http);

        return xmlrpc_decode($response);
    }

    public function __call($name, $arguments){
        // TODO: Implement __call() method.
        $request=xmlrpc_encode_request($name,$arguments);

        print_r($request);

        $this->query($request);
    }
}

$xmlrpc = new XmlRpcClient("http://localhost/shop/learn/webservice/XmlRpcServer.php");
var_dump($xmlrpc->hello("hell world"));