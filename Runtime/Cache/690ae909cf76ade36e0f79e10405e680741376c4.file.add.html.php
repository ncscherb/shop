<?php /* Smarty version Smarty-3.1.6, created on 2017-02-25 08:37:17
         compiled from "/var/www/shop/Admin/View/Auth/add.html" */ ?>
<?php /*%%SmartyHeaderCode:188217169758b0d1bd39f601-70561876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '690ae909cf76ade36e0f79e10405e680741376c4' => 
    array (
      0 => '/var/www/shop/Admin/View/Auth/add.html',
      1 => 1485073164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188217169758b0d1bd39f601-70561876',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'authPid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_58b0d1bd4530a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b0d1bd4530a')) {function content_58b0d1bd4530a($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="<?php echo @CSS_URL_ADMIN;?>
mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：权限列表-》添加权限信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo @__CONTROLLER__;?>
/showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="<?php echo @__SELF__;?>
" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>权限名称</td>
                    <td><input type="text" name="auth_name" /></td>
                </tr>
                <tr>
                    <td>模块</td>
                    <td><input type="text" name="auth_c" /></td>
                </tr>
                <tr>
                    <td>操作方法</td>
                    <td><input type="text" name="auth_a" /></td>
                </tr>

                <tr>
                    <td colspan="2" align="center">
                        <input type="hidden" name="auth_pid" value="<?php echo $_smarty_tpl->tpl_vars['authPid']->value;?>
"/>
                        <input type="submit" value="添加">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html><?php }} ?>