<?php
$method=$_SERVER['REQUEST_METHOD'];

if ($method=="GET"){
    require "../view/admin/teaminsert.html";
}else{
    //接收数据
    $tname=$_POST['tname'];
    $position=$_POST['position'];
    $head_img=$_POST['head_img'];
    //连接数据库
    require "../lib/connect.php";
    //插入数据
    $insert="insert into team(tname,position,head_img) values('$tname','$position','$head_img')";
    $result=$mysqli->query($insert);
    if ($mysqli->affected_rows>0){
        echo json_encode([
            "code"=>200,
            "msg"=>"插入成功"
        ]);
    }else{
        echo json_encode([
            "code"=>400,
            "msg"=>"插入失败".$mysqli->error
        ]);
    }

}


