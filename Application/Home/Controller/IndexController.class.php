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

        $this->display();
    }

    public function detail($id)
    {
        $good=D("goods")->find($id);

        $good["goods_create_time"]=date("Y-m-d",$good["goods_create_time"]);
        $this->assign("info",$good);
        $this->display();
    }
}