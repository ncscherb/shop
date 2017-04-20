<?php
/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 1/17/17
 * Time: 7:53 PM
 */

namespace Admin\Controller;
use Tools\AdminBaseController;

class RoleController extends AdminBaseController
{
   function showlist()
   {
       $info=D("role")->select();

       $this->assign("info",$info);
       $this->display();
   }

   function distributeRole($roleId)
   {
       if(!empty($_POST))
       {
           $role=new \Model\RoleModle();
           $row=$role->saveAuth($roleId,$_POST);

           if($row)
           {
               $this->redirect("showlist",array());
           }
       }
      //从数据库中读取信息，显示用户当前的权限
       $roleInfo=D("role")->find($roleId);
       $roleAuthIds=explode(",",$roleInfo["role_auth_ids"]);

       $authInfo=D("auth")->order("auth_path,auth_level")->select();
       $authInfo=$this->roleAuthIdsShow($authInfo,$roleAuthIds);

       $this->assign("authInfo",$authInfo);
       $this->assign("roleInfo",$roleInfo);

       $this->display();
   }

   //判断是否给checkbox加上选择符号
   function roleAuthIdsShow($auth, $role)
   {
        foreach($auth as $k=>&$v)
        {
            if(in_array($v["auth_id"],$role))
            {
                $v["auth_id_in"]="checked";
            }
            else
                $v["auth_id_in"]="";
        }

        return $auth;
   }


}