<?php
$method=$_SERVER['REQUEST_METHOD'];

if ($method=="GET"){
    require "../view/admin/addressinsert.html";
}else{
    //接收数据
    $store=$_POST['store'];
    $addr=$_POST['addr'];
    $tel=$_POST['tel'];
    $time1=$_POST['time1'];
    $time2=$_POST['time2'];
    $asort=$_POST['asort'];
    //连接数据库
    require "../lib/connect.php";
    //插入数据
    $insert="insert into address(store,addr,tel,time1,time2,asort) values('$store','$addr','$tel','$time1','$time2','$asort')";
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


