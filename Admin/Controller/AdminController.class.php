<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/1/5
 * Time: 9:17
 */

namespace Admin\Controller;
use Tools\AdminBaseController;

class AdminController extends AdminBaseController
{
    private $manager;
    function _initialize()
    {
        $this->manager=new \Model\ManagerModel();
    }

    public function login(){

        $this->manager=new \Model\ManagerModel();

        if(!empty($_POST)){

            $verify= new \Think\Verify();
            if($verify->check($_POST["captcha"])){

                $userInfo=$this->manager->checkLogin($_POST["admin_user"],$_POST["admin_pwd"]);

                if($userInfo){
                    session("admin_user",$userInfo["mg_name"]);
                    session("admin_id",$userInfo["mg_id"]);
                    session("admin_role_id",$userInfo["mg_role_id"]);

                    $this->redirect("Index/index");
                }
                else{
                    $this->assign("errorInfo","登录失败，请重新输入用户名和密码");
                }
            }
            else
            {
                $this->assign("errorInfo","验证码输入有误，请重新输入");
            }
        }

        $this->display();
    }

    function loginOut(){
        session(null);

        $this->redirect("login");
    }

    function verifyImg(){
        ob_end_clean();
        $verifyImgInfo=array("imageH"=>45,
            'imageW'=>100,
            'length'=>4,
            'fontSize'=>15,
            'fontttf'=>"4.ttf",);

        $verify=new \Think\Verify($verifyImgInfo);

        $verify->entry();
    }

    //ajax验证用户名是否已存在
    function checkname()
    {
        $reslut=$this->manager->checkName($_GET["mg_name"]);

        if($reslut) {
            echo "<span color='red'>用户名已存在</span>";
        }
    }

    //ajax验证密码是否正确
    function checkPWD()
    {
       $reslut=$this->manager->checkPWD($_POST["admin_user"],$_POST["admin_pwd"]);
    }
}