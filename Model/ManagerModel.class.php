<?php
/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 1/14/17
 * Time: 8:55 AM
 */
namespace Model;
use Think\Model;

class ManagerModel extends Model{

    function checkLogin($name,$password){
        $adminInfo=$this->where("mg_name='".$name."'")->find();

        if($adminInfo){
            if($adminInfo['mg_pwd']===$password){
              return $adminInfo;
            }
        }

        return false;
    }

    //ajax用户名验证，查看是否存在用户名
    function checkName($name)
    {
        $name=$this->where("mg_name="."'{$name}'")->find();
        if(!empty($name))
        {
            return true;
        }
        else
            return false;

    }

    function checkPWD($name,$pwd)
    {
        $oneDb=$this->where("mg_name="."'{$name}'")->find();

        if(empty($oneDb))
        {
            return false;
        }
        else
        {
            if($oneDb["mg_pwd"]===$pwd)
                return true;
            else
                return false;
        }
    }
}