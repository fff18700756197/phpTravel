<?php
$method=$_SERVER['REQUEST_METHOD'];

if ($method=="GET"){
    require "../view/admin/bannerinsert.html";
}else{
    //接收数据
    $bthumb=$_POST['bthumb'];
    $bsort=$_POST['bsort'];

    //连接数据库
    require "../lib/connect.php";
    //插入数据
    $insert="insert into banner(bthumb,bsort) values('$bthumb','$bsort')";
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


