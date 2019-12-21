<?php
$method=$_SERVER['REQUEST_METHOD'];

if ($method=="GET"){
    require "../view/admin/categoryinsert.html";
}else{
    //接收数据
    $cname=$_POST['cname'];
    $csort=$_POST['csort'];
    //连接数据库
    require "../lib/connect.php";
    //插入数据
    $insert="insert into category(cname,csort) values('$cname','$csort')";
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


