<?php
$nid=$_GET['nid'];
//连接数据库
require  "../lib/connect.php";

//删除数据
$delete = "delete from nav where nid='$nid'";
$result = $mysqli->query($delete);
if ($mysqli->affected_rows>0){
    echo json_encode([
        "code"=>200,
        "msg"=>"删除成功"
    ]);
}else{
    echo json_encode([
        "code"=>400,
        "msg"=>"删除失败".$mysqli->error
    ]);
}
