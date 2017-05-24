<?php
/**
 * Created by PhpStorm.
 * User: ncscherb
 * Date: 17-5-15
 * Time: 下午7:51
 */

//$urioption=["appname"=>"zw","password"=>"deng3124731","authMechanism"=>"PLAIN"];
$manager = new MongoDB\Driver\Manager("mongodb://zw:deng3124731@localhost:27017/goods");
var_dump($manager->getServers());

$filter=[];
$options=[];

// 查询数据
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('goods.goods', $query);
//var_dump($cursor);

foreach ($cursor as $document) {
    var_dump($document);
    echo $document->name;
    echo "<hr>";
}

//// 插入数据
//$bulk = new MongoDB\Driver\BulkWrite;
//$bulk->insert(['x' => 1, 'name'=>'菜鸟教程', 'url' => 'http://www.runoob.com']);
//$bulk->insert(['x' => 2, 'name'=>'Google', 'url' => 'http://www.google.com']);
//$bulk->insert(['x' => 3, 'name'=>'taobao', 'url' => 'http://www.taobao.com']);
//$manager->executeBulkWrite('test.sites', $bulk);
//
//$filter = ['x' => ['$gt' => 1]];
//$options = [
//    'projection' => ['_id' => 0],
//    'sort' => ['x' => -1],
//];
//
//// 查询数据
//$query = new MongoDB\Driver\Query($filter, $options);
//$cursor = $manager->executeQuery('test.sites', $query);
//var_dump($cursor);
//
//foreach ($cursor as $document) {
//    print_r($document);
//    echo "<hr>";
//}
