<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/1/5
 * Time: 10:16
 */

namespace Admin\Controller;
use Think\Controller;
use Tools\AdminBaseController;

class IndexController extends AdminBaseController
{
    function index()
    {
       //$goods = new \Model\GoodsModel();
      // dump($goods);

        $this->display();
    }

    function head(){
        C('SHOW_PAGE_TRACE',false);
        $this->display();
    }

    function right(){
        //dump(get_defined_constants(true));
        $this->display();
    }

    function left(){
        //C('SHOW_PAGE_TRACE',false);
        //首先从session中获取用户名和用户id,由用户id获取用户的权限id
        if(session("admin_role_id")==0)
        {
            $auth=D("auth")->order("auth_path,auth_level")->select();//注：一定要排序
        }
        else{

            $role_id=D("manager")->field("mg_role_id")->find(session("admin_id"));
            $role_auth_ids=D("role")->field("role_auth_ids")->find($role_id);
            $auth=D("auth")->where("auth_id in ({$role_auth_ids['role_auth_ids']})")->order("auth_path,auth_level")->select();

        }
        //dump($auth);
        $this->assign("auth",$auth);

        $this->display();
    }
}