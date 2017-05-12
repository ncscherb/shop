<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/1/4
 * Time: 16:13
 */
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller{
    public function showlist(){
        $this->display("category");
    }

    public function detail($id){
        $good=D("goods")->find($id);

        $good["goods_create_time"]=date("Y-m-d",$good["goods_create_time"]);
        $this->assign("info",$good);
        $this->display();
    }
}
