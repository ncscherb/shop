<?php /* Smarty version Smarty-3.1.6, created on 2017-02-28 23:18:22
         compiled from "/var/www/shop/Admin/View/Admin/login.html" */ ?>
<?php /*%%SmartyHeaderCode:196913702058b055033e1552-03380308%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76836dd94ac10783b175d1c9d8f6a7f8f937c010' => 
    array (
      0 => '/var/www/shop/Admin/View/Admin/login.html',
      1 => 1488295101,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196913702058b055033e1552-03380308',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_58b0550370f8a',
  'variables' => 
  array (
    'errorInfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b0550370f8a')) {function content_58b0550370f8a($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta content="MSHTML 6.00.6000.16674" name="GENERATOR" />
        <link href="<?php echo @CSS_URL_ADMIN;?>
User_Login.css" type="text/css" rel="stylesheet" />

        <title>用户登录</title>

        <script type="text/javascript">
           function Check(name) {
               this.name=name;
           }

           var testA=new Check("dsl");

           Check.prototype.dsl="test";

           testA["dsl"]="zw";

           var testB=new Check("senlin");

            console.log(testA);
            console.log(testB);
            console.log(testA.dsl);
            console.log(testB.dsl);

            console.log({ "b":"a" });
            function a() {
                this.a="a";
            }

            console.log(new a());

            function checkname() {
                //获取输入框的值
                var userName=document.getElementById("admin_user").value;
                userName=encodeURIComponent(userName);

                //创建ajax对象，并传递参数
                var xhr=new XMLHttpRequest();

                xhr.onreadystatechange=function () {
                    if(xhr.readyState==4)
                    {
                        document.getElementById("errorShow").innerHTML=xhr.responseText;
                    }

                }

                xhr.open("get","checkName/mg_name/"+userName);
                xhr.send();
            }

            function checkPWD()
            {
                var pwd = document.getElementById("admin_pwd").value;
                pwd=encodeURIComponent(pwd);

                var userName=document.getElementById("admin_user").value;
                userName=encodeURIComponent(userName);
                var info="name="+userName+"&pwd="+pwd;

                var xhr=new XMLHttpRequest();

                xhr.onreadystatechange=function () {
                    if(xhr.readyState==4)
                    {
                        document.getElementById("errorShow").innerHTML=xhr.responseText;
                    }
                }

                xhr.open("post","checkPWD?getType=aa");
                xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
                xhr.send(info);
            }

        </script>
    </head><body id="userlogin_body">
        <div></div>
        <div id="user_login">
            <dl>
                <dd id="user_top">
                    <ul>
                        <li class="user_top_l"></li>
                        <li class="user_top_c"></li>
                        <li class="user_top_r"></li></ul>
                </dd><dd id="user_main">
                    <form action="<?php echo @__SELF__;?>
" method="post">
                        <ul>
                            <li class="user_main_l"></li>
                            <li class="user_main_c">
                                <div class="user_main_box">
                                    <?php echo (($tmp = @$_smarty_tpl->tpl_vars['errorInfo']->value)===null||$tmp==='' ? '' : $tmp);?>

                                    <div id="errorShow"></div>
                                    <ul>
                                        <li class="user_main_text">用户名： </li>
                                        <li class="user_main_input">
                                            <input class="TxtUserNameCssClass" id="admin_user" maxlength="20" name="admin_user" onblur="checkname()"> </li></ul>
                                    <ul>
                                        <li class="user_main_text">密&nbsp;&nbsp;&nbsp;&nbsp;码： </li>
                                        <li class="user_main_input">
                                            <input class="TxtPasswordCssClass" id="admin_pwd" name="admin_pwd" type="password" >
                                        </li>
                                    </ul>
                                    <ul>
                                        <li class="user_main_text">验证码： </li>
                                        <li class="user_main_input">
                                            <input class="TxtValidateCodeCssClass" id="captcha" name="captcha" type="text">
                                            <img onclick="this.src='<?php echo @__CONTROLLER__;?>
/verifyImg/'+Math.random()"  src="<?php echo @__CONTROLLER__;?>
/verifyImg" alt="" />
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="user_main_r">
                                <input style="border: medium none; background: url('<?php echo @IMG_URL_ADMIN;?>
user_botton.gif') repeat-x scroll left top transparent; height: 122px; width: 111px; display: block; cursor: pointer;" value="" type="submit">
                            </li>
                        </ul>
                    </forlm>
                </dd><dd id="user_bottom">
                    <ul>
                        <li class="user_bottom_l"></li>
                        <li class="user_bottom_c"><span style="margin-top: 40px;"></span> </li>
                        <li class="user_bottom_r"></li></ul></dd></dl></div><span id="ValrUserName" style="display: none; color: red;"></span><span id="ValrPassword" style="display: none; color: red;"></span><span id="ValrValidateCode" style="display: none; color: red;"></span>
        <div id="ValidationSummary1" style="display: none; color: red;"></div>
    </body>
</html><?php }} ?>