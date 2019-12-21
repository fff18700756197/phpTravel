<?php
$method=$_SERVER['REQUEST_METHOD'];

if ($method=="GET"){
    require "../view/admin/managerinsert.html";
}else{
    //接收数据
    $username=$_POST['username'];
    $password=$_POST['password'];
    $manager_img=$_POST['manager_img'];
    //连接数据库
    require "../lib/connect.php";
    //插入数据
    $insert="insert into manager(username,password,manager_img) values('$username','$password','$manager_img')";
    $result=$mysqli->query($insert);
    if ($mysqli->affected_rows>0){
        echo json_encode([
            "code"=>200,
            "msg"=>"添加成功"
        ]);
    }else{
        echo json_encode([
            "code"=>400,
            "msg"=>"添加失败".$mysqli->error
        ]);
    }

}
