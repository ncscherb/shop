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

    public function detail(){
        $this->display();
    }
}
