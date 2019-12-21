<?php
$nid=$_POST['nid'];
$name=$_POST['name'];
$val=$_POST['val'];
//连接数据库
require "../lib/connect.php";
//修改
$update="update nav set $name=$val where nid=$nid";
$result=$mysqli->query($update);
if ($result){
    echo json_encode([
        "code"=>200,
        "msg"=>"修改成功"
    ]);
}else{
    echo json_encode([
        "code"=>400,
        "msg"=>"修改失败".$mysqli->error
    ]);
}