<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/1/4
 * Time: 15:53
 */
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller{
    public function login(){
       $this->display();
    }

    public function register(){

        if(!empty($_POST)){

            $user=new \Model\UserModel();

            $info=$user->create();

            if(!empty($info))
            {
                $row=$user->add($info);
            }else{
                $this->assign("errorInfo",$user->getError());
            }
        }

       $this->display();
    }
}