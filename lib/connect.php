<?php
//连接数据库
//连接数据库
$mysqli = new mysqli('localhost','root','root','travel');
if ($mysqli->connect_error){
    echo json_encode([
        "code"=>400,
        "msg"=>"连接失败".$mysqli->connect_error
    ]);
}
$mysqli->query("set names utf8");

?>