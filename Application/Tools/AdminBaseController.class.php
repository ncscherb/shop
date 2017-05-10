<?php
/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 1/22/17
 * Time: 9:17 PM
 */

namespace Tools;

use Think\Controller;


class AdminBaseController extends Controller
{
    const PERMITROLE="Admin-login,Admin-loginOut,Admin-verifyImg,
        Index-index,Index-head,Index-right,Index-left,Admin-checkName,Admin-checkPWD";
    function __construct()
    {
        //子类的构造方法会覆盖父类的构造方法，因此需要在此调用父类的构造方法
        parent::__construct();

        //在此进行访问控制
        //读取session内容，获取登录用户名
        $adminRoleId=session("admin_role_id");

        $role=D("role")->find($adminRoleId);
        $roleAuthAC=$role["role_auth_ac"];

        $pathInfo=CONTROLLER_NAME."-".ACTION_NAME;

        if(empty(session("admin_user")) && strpos(self::PERMITROLE,$pathInfo)===false)
        {

            $urlModule=__MODULE__;

            $js = <<<eof
            <script type="text/javascript">
                window.top.location.href="$urlModule/Admin/login";
            </script>
eof;
            echo $js;

        }

        //注意超级管理员拥有所有的权限
        //设置默认允许的权限，如进入登录界面
        if(strpos($roleAuthAC,$pathInfo)===false &&
            strpos(self::PERMITROLE,$pathInfo)===false && session("admin_user")!="admin")
        {
           exit("没有权限，不能进入");
        }

    }
}