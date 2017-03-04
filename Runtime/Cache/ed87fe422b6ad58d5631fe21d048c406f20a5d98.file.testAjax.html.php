<?php /* Smarty version Smarty-3.1.6, created on 2017-03-02 23:47:48
         compiled from "/var/www/shop/Admin/View/Ajax/testAjax.html" */ ?>
<?php /*%%SmartyHeaderCode:128075290858b58a06965e06-14583619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed87fe422b6ad58d5631fe21d048c406f20a5d98' => 
    array (
      0 => '/var/www/shop/Admin/View/Ajax/testAjax.html',
      1 => 1488469667,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128075290858b58a06965e06-14583619',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_58b58a06a0d6c',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b58a06a0d6c')) {function content_58b58a06a0d6c($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Ajax</title>
    <script type="text/javascript">
        function testAjax() {
            //创建ajax对象
            var xhr=new XMLHttpRequest();
            //建立链接
            xhr.open("get","responseToAjax");
            //发送消息
            xhr.send(null);

            var data = {
                "title": "JavaScript Templates",
                "license": {
                    "name": "MIT license",
                    "url": "https://opensource.org/licenses/MIT"
                },
                "features": [
                    "lightweight & fast",
                    "powerful",
                    "zero dependencies"
                ]
            };

            document.getElementById("dsl").innerHTML = tmpl("tmpl-demo", data);
        }

        function asyn() {
            var xhr=new XMLHttpRequest();

            xhr.open("get","asynAjax");
            xhr.onreadystatechange=function () {
                if(xhr.readyState==4)
                    alert(xhr.responseText);
            }
            xhr.send(null);
        }
    </script>
    
    <script type="text/x-tmpl" id="tmpl-demo">
        <h3>{%=o.title%}</h3>
        <p>Released under the
        <a href="{%=o.license.url%}">{%=o.license.name%}</a>.</p>
        <h4>Features</h4>
        <ul>
        {% for (var i=0; i<o.features.length; i++) { %}
            <li>{%=o.features[i]%}</li>
        {% } %}
        </ul>
    </script>
    
    <script src="<?php echo @__PUBLIC__;?>
/JsTemplates/js/tmpl.js"></script>
    <script src="<?php echo @__PUBLIC__;?>
/jQuery_File_Upload/js/jquery.min.js"></script>
</head>
<body>
    <input type="button" onclick="testAjax()" value="发送消息">
    <input type="button" onclick="asyn()" value="异步"/>
    <div id="dsl"></div>

</body>
</html><?php }} ?>