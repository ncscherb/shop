<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/1/5
 * Time: 16:42
 */

namespace Admin\Controller;
use Think\Controller;
use Tools\AdminBaseController;

class GoodsController extends AdminBaseController
{
    function update($goods_id)
    {
        $goods=D('goods');
        if(!empty($_POST))
        {
            $row=$goods->save($_POST);

            if($row){
                $this->redirect('showlist',array(),2,"修改成功");
            }else{
                $this->redirect("update",array('goods_id'=>$_POST['goods_id']),2,"修改失败，请再次修改");
            }

        }
        if(!empty($goods_id))
        {
            $info=$goods->find($goods_id);
            $this->assign('info',$info);
        }
        $this->display();
    }

    function showlist()
    {
        //dump($_SERVER);
        $goods=new \Model\GoodsModel();
        //$info = $goods->order('goods_id desc')->select();

        //开始分页
        $totalRecord=$goods->count();
        $per=8;

        //建立分页对象
        $page=new \Tools\Page($totalRecord,$per);
        $pagelist=$page->paging();

        //获取数据
        $sql = "select * from sw_goods order by goods_id desc ".$page->pageLimit();
        $info = $goods->query($sql);

        $this->assign("pagelist",$pagelist);
        $this->assign('info',$info);
        $this->assign("pagePerFirst",$page->pagingPerFirst()-1);

        $this->display();
    }

    function showlistAjax()
    {
        $this->display();
    }

    function showlistResponseAjax()
    {
        $goods=D("Goods");

        $totalRecord=$goods->count();
        $per=8;

        $page=new \Tools\PageAjax($totalRecord,$per);
        $pagelist=$page->paging();

        $sql = "select goods_id id,goods_name name,goods_number number,goods_big_img bigImg,".
            "goods_small_img smallImg,goods_brand_id brand,goods_create_time createtime".
            " from sw_goods order by goods_id desc ".$page->pageLimit();
        $info=$goods->query($sql);//$info is a two dim array

        $info[]=array("pagelist"=>$pagelist,"perFirstPage"=>$page->pagingPerFirst());

        echo json_encode($info);

    }

    function add()
    {
        $goods=D('goods');
        if(!empty($_POST))
        {
            if($_FILES["goods_big_img"]["error"]==0){

                //上传文件
                $upload=new \Think\Upload();

                $info=$upload->uploadOne($_FILES["goods_big_img"]);

                $filepath=$upload->rootPath.$info["savepath"].$info["savename"];

                chmod($filepath,0777);

                //制作缩略图
                $filesavepath=$upload->rootPath.$info["savepath"]."small".$info["savename"];

                $this->thumb($filepath,$filesavepath,125,125);

                chmod($filesavepath,0777);

                //保持到数据中
                $_POST["goods_big_img"]=ltrim($filepath,"./");
                $_POST["goods_small_img"]=ltrim($filesavepath,"./");
                $_POST["goods_create_time"]=date("y-m-d h:i:s",time());

                $row=$goods->add($_POST);//return the added good's id
                if($row)
                {
                    //begin cached html here
                    ob_start();

                    $this->assign("info",$_POST);
					//调用前台View/Good中的detail.htm
                    $this->display("Home@Goods/detail");

                    $content=ob_get_contents();

                    file_put_contents("./Public/CachedHtml/Goods/goods_".$row.".html",$content);
                    ob_end_clean();

                    $this->redirect("Admin/Goods/showlist",array(),2,"添加成功");
                }else{
                    $this->redirect('add',array(),2,"添加失败，请重新添加");
                }

                dump($_POST);
            }
            exit;

        }
        else{
            $this->display();
        }
    }

    function addAjax()
    {
        //上传文件--判断是否出错
        if($_FILES["goods_big_img"]["error"]==0)
        {
            $rootPath="./Uploads/";
            $filePath=$rootPath.$_FILES["goods_big_img"]["name"];
            //$filePath=$rootPath.time().$_FILES["goods_big_img"]["name"];

            if(!move_uploaded_file($_FILES["goods_big_img"]["tmp_name"],$filePath))
                echo "problem";
        }
        else
            echo "file upload si error";

    }

    function delete($goods_id)
    {
       if(!empty($goods_id))
       {
           $goods=D();

           $sql="delete from sw_goods where goods_id=".$goods_id;
           $row=$goods->execute($sql);

           if(empty($row))
           {
               $this->redirect('showlist',array(),1,"删除失败");
           }else{
               $this->redirect('showlist',array(),1,"删除成功");
           }
       }
    }

    function thumb($filename,$filesavepath,$width,$height,$type=null)
    {
        $img = new \Think\Image();

        $img->open($filename);
        $img->thumb($width,$height,$type?$type:\Think\Image::IMAGE_THUMB_SCALE);

        $img->save($filesavepath);
    }

    function fileUpload()
    {
        $this->display();
    }

    function fileUploadByJquery()
    {
        $test=U("Admin/Goods/fileUpload");
        $up=new \Org\File\UploadHandler();
    }
}
