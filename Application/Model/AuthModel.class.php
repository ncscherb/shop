<?php
/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 1/22/17
 * Time: 3:45 PM
 */

namespace Model;
use Think\Model;

class AuthModel extends  Model
{
    private $authParent=array();

    function saveNewAuth($post)
    {
       $this->data($post)->add();

       //获取最近插入的id
       $authId=$this->getLastInsID();

       //获取父id的信息
        if($post["auth_pid"]!=0)
        {
            $this->authParent=$this->find($post["auth_pid"]);

            $authPath=$this->authParent["auth_path"]."-".$authId;
        }
        else
        {
            $authPath=0;
        }

        $authLevel=substr_count($authPath,"-");
        $authUpdate=array("auth_path"=>$authPath,"auth_level"=>$authLevel);

        $this->where("auth_id={$authId}")->save($authUpdate);

        return true;

    }

    function deleteById($id)
    {
        $this->delete($id);

        return true;
    }
}