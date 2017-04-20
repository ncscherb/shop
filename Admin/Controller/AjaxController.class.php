<?php
/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 1/23/17
 * Time: 11:03 PM
 */

namespace Admin\Controller;

use Think\Controller;

class AjaxController extends Controller
{
    function testAjax()
    {
        $this->display();
    }

    function responseToAjax()
    {
        $file=fopen("ajax.txt","a");

        fwrite($file,"ajax \n");

        fclose($file);
    }

    function asynAjax()
    {
        echo "同步显示";
    }

    function  xmlAjax()
    {
        $this->display();
    }

    function xmlInfo()
    {
        $this->display("xmlInfo");
    }
}