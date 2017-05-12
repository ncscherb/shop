<?php
/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 1/14/17
 * Time: 8:11 PM
 */
namespace Tools;

class Page{
    private  $total;
    private $pageNum;
    private $pageCurrent;
    private $limit;
    private $listNum=8;
    private $url;
    private $config=array("first"=>"首页","prev"=>"上一页","next"=>"下一页","last"=>"最后一页");

    function __construct($total,$limit=10)
    {
        $this->total=$total;
        $this->limit=$limit;
        $this->pageCurrent=$_GET["page"] ?$_GET["page"]:1;
        $this->url=$_SERVER["REQUEST_URI"];
        $this->pageNum=ceil($this->total/$this->limit);

        $this->pageLimit();
    }

    function pageLimit()
    {
        return "limit ".($this->pageCurrent-1)*$this->limit.",{$this->limit}";
    }

    function pagingPerFirst()
    {
        return ($this->pageCurrent-1)*$this->limit+1;
    }

    function paging()
    {
        $html=array();
        $html[0]="共有{$this->total}条记录";
        $html[1]="每页显示{$this->limit}条，本页是{$this->pagingPerFirst()}-".($this->pagingPerFirst()+$this->limit)."条记录";
        $html[2]="{$this->pageCurrent}/{$this->pageNum}页";
        $html[3]="&nbsp;&nbsp;".$this->first();
        $html[4]="&nbsp;&nbsp;".$this->prev();
        $html[5]="&nbsp;&nbsp;".$this->pagelist();
        $html[6]="&nbsp;&nbsp;".$this->next();
        $html[7]="&nbsp;&nbsp;".$this->last();
        $html[8]="&nbsp;".$this->skipByNumber();

        $htmlStr="";
        foreach ($html as $str)
        {
            $htmlStr.=$str." ";
        }
        return $htmlStr;
    }

    function pagelist()
    {
        $left=floor($this->listNum/2);
        $right=$this->listNum-$left;
        $num=array();

        //页码显示
        if($this->pageNum<=$this->listNum+1)
        {
            $num=range(1,$this->listNum);
        }
        else
        {
            if($this->pageCurrent<=$left)
            {
                $num=range(1,$this->listNum+1);
            }
            elseif (($this->pageNum-$right)<$this->pageCurrent)
            {
                $num=range(($this->pageNum-$this->listNum),$this->pageNum);
            }
            else
            {
                $num=range($this->pageCurrent-$left,$this->pageCurrent+$right);
            }
        }

        //关联超链接
        $a="";

        foreach($num as $seq){
            if($seq==$this->pageCurrent)
                $a.="<span>{$seq}</span>"."&nbsp;";
            else
                $a.=$this->createAtag($this->url,$seq,$seq)."&nbsp;";

        }

        return $a;
    }

    /***
     * @param $url
     * @param $pagePerShow 每一个页码对应显示的信息，如１，２，３，前一页/后一页等
     * @param $pagePer　每一页对应的页码值
     * @return string
     *
     */
    function createAtag($url, $pagePerShow, $pagePer)
    {
        $index=strpos($url,".html");
        if($index)
        {
            $url=substr($url,0,$index);
        }

        if(strpos($url,"page")!==false)
           $url=substr_replace("$url","page/".$pagePer,strpos($url,"page"));//$url = preg_replace("/(page\/\d*)*/","page/".$pagePer,$url);
        elseif ($this->pageCurrent==1)
        {
            $url=$url."/page/".$pagePer;
        }

        return "<a href={$url}>{$pagePerShow}</a>";

    }
    function createAfour($pagePerShow,$pagePer)
    {
        return $this->createAtag($this->url,$pagePerShow,$pagePer);
    }

    private function first()
    {
        if($this->pageCurrent==1)
        {
            $html="";
        }
        else
            $html=$this->createAfour($this->config["first"],1);
        return $html;
    }

    private function prev()
    {
        if($this->pageCurrent==1){
            $html="";
        }
        else
            $html=$this->createAfour($this->config["prev"],$this->pageCurrent-1);
        return $html;
    }

    private function next()
    {
        if($this->pageCurrent==$this->pageNum)
            $html="";
        else
            $html=$this->createAfour($this->config["next"],$this->pageCurrent+1);
        return $html;
    }

    private function last()
    {
        if($this->pageCurrent==$this->pageNum)
            $html="";
        else
            $html=$this->createAfour($this->config["last"],$this->pageNum);
        return $html;
    }

    private function skipByNumber()
    {
        $html="<input type='text' id='number'/>&nbsp;<input type='button' value='Go' 
            onclick=\"location='{$this->url}/page/'+document.getElementById('number').value\"/>";

        return $html;
    }
}