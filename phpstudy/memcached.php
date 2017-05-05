<?php
    $m=new Memcached();
    $m->addServer('127.0.0.1',11211);

    //memcached save php data stype
    $int=12;
    $string='hello world';
    $bool=true;
    $float=123.456;

    $m->set('int',$int);
    $m->set('string',$string);
    $m->set('bool',$bool);
    $m->set('float',$float);

    var_dump($m->get("int"));
	echo "<br/>";
    var_dump($m->get("string"));
	echo "<br/>";
    var_dump($m->get("bool"));
	echo "<br/>";
    var_dump($m->get("float"));
	echo "<br/>";

	$array=array("dsl"=>"zw","hello"=>"world");
	
	class MemClass{
		private $name="dsl";
		 var $age=28;
		
		public function test()
		{
			$this.toString();
		}
	}
	$class =new MemClass();

	$m->set('array',$array);
	$m->set('class',$class);

	var_dump($m->get("array"));
	echo "<br/>";
	var_dump($m->get("class"));
	echo "<br/>";
	
	//将session数据存储到memcached
	ini_set("session.save_handler","memcached");
	ini_set("session.save_path","127.0.0.1:11211");

	session_start();
	$_SESSION['username']="dsl";
    $_SESSION['pwd']="zw";
	var_dump($_SESSION["username"]);
	echo  session_id();
