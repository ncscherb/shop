<?php
/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 1/12/17
 * Time: 11:24 PM
 */

namespace Model;
use Think\Model;

class UserModel extends Model
{
    protected $patchValidate=true;

    protected $_validate=array(
        array("username","require","user name is required"),
        array("username","","姓名必须唯一",0,"unique"),
        array("password","require","password is not null"),
        array("password2","password","two password must the same",0,"confirm"),
        array("user_tel",'number'," 必须为数值"),
        array("user_qq","number","必须为数值",2),
        array("user_email","email","邮箱输入有误"),
        array("user_hobby","hobby_validate","爱好必须选择两项以上",0,"callback"),

    );

    function hobby_validate($arg){
        if(count($arg)<2)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}