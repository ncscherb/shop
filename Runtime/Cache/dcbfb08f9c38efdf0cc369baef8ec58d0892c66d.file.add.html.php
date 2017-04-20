<?php /* Smarty version Smarty-3.1.6, created on 2017-02-25 08:42:58
         compiled from "/var/www/shop/Admin/View/Goods/add.html" */ ?>
<?php /*%%SmartyHeaderCode:108133718458b0d312d6d504-00301483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dcbfb08f9c38efdf0cc369baef8ec58d0892c66d' => 
    array (
      0 => '/var/www/shop/Admin/View/Goods/add.html',
      1 => 1487862448,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108133718458b0d312d6d504-00301483',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_58b0d31300022',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b0d31300022')) {function content_58b0d31300022($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="<?php echo @CSS_URL_ADMIN;?>
mine.css" type="text/css" rel="stylesheet">

        <style type="text/css">
            #parent
            {
                width: 100px;
                height:20px;
                border: 4px solid blue;
            }

            #son
            {
                width: 0;
                height: 100%;
                background-color: red;
            }
        </style>

        <script type="text/javascript">
            window.onload=function () {
                var form = document.getElementsByTagName("form")[0];

                form.onsubmit=function (evt) {
                    var fd= new FormData(form);

                    var xhr=new XMLHttpRequest();
                    xhr.open("post","<?php echo @__CONTROLLER__;?>
/addAjax");
                    xhr.onreadystatechange=function () {
                        if(xhr.readyState==4)
                        {
                            console.log(xhr.responseText);
                        }
                    }

                    xhr.upload.onprogress=function (event) {
                        var son=document.getElementById("son");

                        var per=event.loaded/event.total*100+"%";
                        son.style.width=per;
                    }

                    xhr.send(fd);

                    //阻止默认提交
                    evt.preventDefault();
                }


            }
        </script>
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：商品管理-》添加商品信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo @__CONTROLLER__;?>
/showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="<?php echo @__ACTION__;?>
" method="post" enctype="multipart/form-data">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>商品名称</td>
                    <td><input type="text" name="goods_name" /></td>
                </tr>
                <tr>
                    <td>商品价格</td>
                    <td><input type="text" name="goods_price" /></td>
                </tr>
                <tr>
                    <td>商品重量</td>
                    <td><input type="text" name="goods_weight" /></td>
                </tr>
                <tr>
                    <td>商品数量</td>
                    <td><input type="text" name="goods_number" /></td>
                </tr>
                <tr>
                    <td>商品图片</td>
                    <td><input type="file" name="goods_big_img" /><div id="parent"><div id="son"></div></div></td>
                </tr>
                <tr>
                    <td>商品详细描述</td>
                    <td>
                        <textarea name="goods_introduce"></textarea>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="添加">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html><?php }} ?>