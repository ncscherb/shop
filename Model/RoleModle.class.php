<?php
/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 1/22/17
 * Time: 10:11 AM
 */

namespace Model;
use Think\Model;

class RoleModle extends  Model
{
    private $roleAuthAC;

    function saveAuth($roleId,$post)
    {
        //保存新的权限信息
        $authIdSubmit["role_auth_ids"]=$this->getParentIds($post["authId"]);
        $authIdSubmit["role_auth_ac"]=ltrim($this->roleAuthAC,",");
        //添加判断是否给子权限添加父权限的的id,以便于显示
        $row=$this->where("role_id={$roleId}")->data($authIdSubmit)->save();

        return $row;
    }


    /*
     * 获取子权限的父id
     */
    function getParentIds($subId)
    {
        $role_auth_ids=$subId;
        foreach ($subId as $value)
        {
            $role_auth_ids=$this->getParentId($value,$role_auth_ids);

        }

        return implode(",",$role_auth_ids);
    }

    //获取父节点病添加到列表中
    //从子节点查找父节点，判断父节点是否在权限表中，再根据父节点的id查找父节点的权限；
    function getParentId($subId,$role_auth_ids)
    {
        //查找id对应的权限
        $subAuth=D("auth")->find($subId);

        //获取列表，查看其对应的level是否为0
        if(!empty($subAuth))
        {
            if(!empty($subAuth["auth_a"]) && !empty($subAuth["auth_c"]))
            {
                $roleAuthAC=$subAuth["auth_c"]."-".$subAuth["auth_a"];
                if(strpos($this->roleAuthAC,$roleAuthAC)===false)
                {
                    $this->roleAuthAC.=",".$roleAuthAC;
                }

            }

            //当前节点的节点父id不在权限节点列表中，并且，当前节点不为最顶级节点。
            if(!in_array($subAuth["auth_pid"],$role_auth_ids) && $subAuth["auth_pid"]!=0)
            {
                array_push($role_auth_ids,$subAuth["auth_pid"]);

            }

            //如果当前节点的级别不为０，者继续获取其父节点的父节点信息（为什么不加到上一个内容中，因为上一个是一个并列关系，
            //可能父节点已经存在当前节点中了，但是其父父节点不存在）
            if($subAuth["auth_level"]!=0)
            {
                $role_auth_ids=$this->getParentId($subAuth["auth_pid"],$role_auth_ids);
            }
        }

        return $role_auth_ids;
    }
}