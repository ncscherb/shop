<?php

/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 17-6-1
 * Time: 下午9:49
 */
include_once "./CMediaTmp.php";

class CMediaManager
{

    public function addMedia(){

    }

    public function addTmpMedia(){
        $mediaTmp=new CMediaTmp();

        $mediaTmp->addImageMedia("./11.png");
    }

    public function addForeverMedia(){

    }


}