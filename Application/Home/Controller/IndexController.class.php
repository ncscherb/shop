<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //connect to memcached
        S(array("type"=>"memcached","servers"=>array(array("127.0.0.1",11211))));

        $info =S("name");

        if(empty($info))
        {
            S("name","zw",500);
        }

        echo $info;

        //get last 10 good
        $goods=D("goods")->order("goods_id desc")->limit(10)->select();
        $this->assign("goods",$goods);
        $this->display();
    }

}