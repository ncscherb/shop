<?php /* Smarty version Smarty-3.1.6, created on 2017-05-05 22:24:45
         compiled from "./Application/Admin/View/Goods/showlistAjax.html" */ ?>
<?php /*%%SmartyHeaderCode:1789650527590c8b2d081d84-70902221%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e42ffb4c7e3035946128303b25b808379df0a41' => 
    array (
      0 => './Application/Admin/View/Goods/showlistAjax.html',
      1 => 1493993862,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1789650527590c8b2d081d84-70902221',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_590c8b2d1236b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590c8b2d1236b')) {function content_590c8b2d1236b($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <link href="<?php echo @CSS_URL_ADMIN;?>
mine.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript">
            function showPage(url) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange=function () {
                    if(xhr.readyState==4)
                    {
                        var trpage="";
                        var pageJson=xhr.responseText;
                        eval("var pageObject="+pageJson);

                        trpage="<tr style=\"font-weight: bold;\">\
                        <td>序号</td>\
                        <td>商品名称</td>\
                        <td>库存</td>\
                        <td>图片</td>\
                        <td>缩略图</td>\
                        <td>品牌</td>\
                        <td>创建时间</td>\
                        <td align=\"center\">操作</td>\
                    </tr>";

                        for(var i=0;i<(pageObject.length-1);i++)
                        {
                            var oneRow=pageObject[i];

                            trpage+="<tr><td>"+oneRow.id+"</td><td>"+oneRow.name+
                            "</td><td>"+oneRow.number+"</td><td>"+oneRow.bigimg+
                                "</td><td>"+oneRow.smallimg+"</td><td>"+
                                oneRow.brand+"</td><td>"+oneRow.createtime+"</td></tr>";
                        }

                        trpage+="<tr><td colspan='20' style='text-align:center;'>"+pageObject[pageObject.length-1].pagelist+"</tr>";
                        var table=document.getElementById("result");
                        console.log(pageObject);
                        table.innerHTML=trpage;
                    }
                }

                xhr.open("get",url);
                xhr.send(null);

            }

            window.onload=function () {
                showPage("<?php echo @__CONTROLLER__;?>
/showlistResponseAjax/page/1");
            }
        </script>
    </head>
    <body>
        <style>
            .tr_color{ ackground-color: #9F88FF }
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：商品管理-》商品列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="<?php echo @__CONTROLLER__;?>
/add.html">【添加商品】</a>
                </span>
            </span>
        </div>
        <div></div>
        <div class="div_search">
            <span>
                <form action="#" method="get">
                    品牌<select name="s_product_mark" style="width: 100px;">
                        <option selected="selected" value="0">请选择</option>
                        <option value="1">苹果apple</option>
                    </select>
                    <input value="查询" type="submit" />
                </form>
            </span>
        </div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%" id="result">
                <tbody>
                </tbody>
            </table>
        </div>
    </body>
</html><?php }} ?>