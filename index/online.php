<?php
$method=$_SERVER['REQUEST_METHOD'];
//连接数据库
require "../lib/connect.php";
if ($method==GET){
    require "../view/index/online.html";
}else{
    //接收数据
    $sid=$_POST['sid'];
    $date = $_POST['date'];
    $name=$_POST['name'];
    $sex=$_POST['sex'];
    $tel=$_POST['tel'];
    $remark=$_POST['remark'];

    //插入数据
    $insert="insert into online(sid,date,name,sex,tel,remark) values('$sid','$date','$name','$sex','$tel','$remark')";
    $result=$mysqli->query($insert);
    if ($result){
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

require "header.php";
require "../view/index/online.html";
require "footer.php";