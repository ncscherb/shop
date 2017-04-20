<?php /* Smarty version Smarty-3.1.6, created on 2017-02-25 08:04:26
         compiled from "/var/www/shop/Admin/View/Ajax/xmlAjax.html" */ ?>
<?php /*%%SmartyHeaderCode:23580082158b0ca0a220fe3-47140617%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'adb153a354665596d57fb7d340d62d906f854f5f' => 
    array (
      0 => '/var/www/shop/Admin/View/Ajax/xmlAjax.html',
      1 => 1486912607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23580082158b0ca0a220fe3-47140617',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_58b0ca0a40232',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b0ca0a40232')) {function content_58b0ca0a40232($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>xml输出显示</title>
    <script type="text/javascript">
        function xmlHandle()
        {
            var xhr=new XMLHttpRequest();

            xhr.onreadystatechange=function () {
                if(xhr.readyState==4)
                {
                    var xmlDom=xhr.responseXML;

                    //获取根节点
                    var messages=xmlDom.firstChild;

                    console.log(messages);

                    var msgs=xmlDom.getElementsByTagName("msg");
                    for(var i=0;i<msgs.length;i++)
                    {
                        var test=msgs[i].getElementsByTagName("sender")[0].firstChild.nodeValue;
                        console.log(test);
                    }
                }
            }

            xhr.open("get","/shop/Admin/View/Ajax/xmlInfo.xml");
            xhr.send(null);
        }
    </script>
</head>
<body>
<input type="button" onclick="xmlHandle()" value="获取xml信息">
</body>
</html><?php }} ?>