<?php /* Smarty version Smarty-3.1.6, created on 2017-02-24 23:45:18
         compiled from "/var/www/shop/Admin/View/Index/left.html" */ ?>
<?php /*%%SmartyHeaderCode:101876347958b0550e9cc419-61824380%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'edc4d83e0f8a2d6de9bfd2e3eb8e60b22c5bb3c4' => 
    array (
      0 => '/var/www/shop/Admin/View/Index/left.html',
      1 => 1484659569,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101876347958b0550e9cc419-61824380',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'auth' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_58b0550f15a30',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b0550f15a30')) {function content_58b0550f15a30($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv=content-type content="text/html; charset=utf-8" />
        <link href="<?php echo @CSS_URL_ADMIN;?>
admin.css" type="text/css" rel="stylesheet" />
        <script language=javascript>
            function expand(el)
            {
                childobj = document.getElementById("child" + el);

                if (childobj.style.display == 'none')
                {
                    childobj.style.display = 'block';
                }
                else
                {
                    childobj.style.display = 'none';
                }
                return;
            }
        </script>
    </head>
    <body>
        <table height="100%" cellspacing=0 cellpadding=0 width=170
               background=<?php echo @IMG_URL_ADMIN;?>
menu_bg.jpg border=0>
               <tr>
                <td valign=top align=middle>
                    <table cellspacing=0 cellpadding=0 width="100%" border=0>

                        <tr>
                            <td height=10></td></tr></table>
                    <table cellspacing=0 cellpadding=0 width=150 border=0>

                        <tr height=22>
                            <td style="padding-left: 30px" background=<?php echo @IMG_URL_ADMIN;?>
menu_bt.jpg><a
                                    class=menuparent onclick=expand(1) 
                                    href="javascript:void(0);">关于我们</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child1 style="display: none" cellspacing=0 cellpadding=0 
                           width=150 border=0>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo @IMG_URL_ADMIN;?>
menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="#" 
                                   target=main>公司简介</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo @IMG_URL_ADMIN;?>
menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="#" 
                                   target=main>荣誉资质</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo @IMG_URL_ADMIN;?>
menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="#" 
                                   target=main>分类管理</a></td></tr>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo @IMG_URL_ADMIN;?>
menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="#" 
                                   target=main>子类管理</a></td></tr>
                        <tr height=4>
                            <td colspan=2></td></tr></table>
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['auth']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <?php if (preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['v']->value['auth_path'], $tmp)==3){?>
                    <table cellspacing=0 cellpadding=0 width=150 border=0>
                        <tr height=22>
                            <td style="padding-left: 30px" background=<?php echo @IMG_URL_ADMIN;?>
menu_bt.jpg><a
                                    class=menuparent onclick="expand( <?php echo $_smarty_tpl->tpl_vars['v']->value['auth_id'];?>
 )"
                                    href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['v']->value['auth_name'];?>
</a></td></tr>
                        <tr height=4>
                            <td></td></tr></table>
                    <table id=child<?php echo $_smarty_tpl->tpl_vars['v']->value['auth_id'];?>
 style="display: none" cellspacing=0 cellpadding=0
                           width=150 border=0>
                        <?php }else{ ?>
                        <tr height=20>
                            <td align=middle width=30><img height=9 
                                                           src="<?php echo @IMG_URL_ADMIN;?>
menu_icon.gif" width=9></td>
                            <td><a class=menuchild 
                                   href="<?php echo @__MODULE__;?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['auth_c'];?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['auth_a'];?>
"
                                   target="right"><?php echo $_smarty_tpl->tpl_vars['v']->value['auth_name'];?>
</a></td></tr>
                    <?php }?>
                    <?php } ?>
                </td>
               </tr>
        </table>
    </body>
</html><?php }} ?>