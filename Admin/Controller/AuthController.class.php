<?php
/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 1/22/17
 * Time: 2:24 PM
 */

namespace Admin\Controller;
//use Think\Controller;
use Tools\AdminBaseController;

class AuthController extends AdminBaseController
{

    function showlist()
    {
        $auth=D("Auth")->order("auth_path")->select();

        $this->assign("auth",$auth);
        $this->display();
    }

    function add($authPid)
    {
        if(!empty($_POST))
        {
            $authModel=new \Model\AuthModel();

            if($authModel->saveNewAuth($_POST))
            {
                $this->redirect("showlist",array(),2,"添加成功");
            }
        }

        $this->assign("authPid",$authPid);
        $this->display();
    }

    function delete($auth_id)
    {
        $authModel=new \Model\AuthModel();
        if(!empty($auth_id))
        {
            if($authModel->deleteById($auth_id))
                $this->redirect("showlist",array(),2,"删除成功");
        }
    }
}