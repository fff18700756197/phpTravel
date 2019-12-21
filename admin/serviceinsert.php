<?php
$method=$_SERVER['REQUEST_METHOD'];

if ($method=="GET"){
    require "../view/admin/serviceinsert.html";
}else{
    //接收数据
    $sthumb=$_POST['sthumb'];
    $sname=$_POST['sname'];
    $scontent=$_POST['scontent'];
    //连接数据库
    require "../lib/connect.php";
    //插入数据
    $insert="insert into service(sthumb,sname,scontent) values('$sthumb','$sname','$scontent')";
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


