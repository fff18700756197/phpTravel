<?php
//1.GET 打开当前页面 2.POST 进行验证
$method=$_SERVER['REQUEST_METHOD'];
if ($method=='GET'){
    require "../view/admin/login.html";
}
else{
//  var_dump($_POST);
    $username=$_POST['username'];
    $password=$_POST['password'];

    //连接数据库
    require  "../lib/connect.php";
    //插入数据
//    $insert="insert into manager(username,password) values('$name','$password')";
//    $result=$mysqli->query($insert);
//    if ($result){
//        echo json_encode([
//            "code"=>200,
//            "msg"=>"插入成功"
//        ]);
//    }else{
//        echo json_encode([
//            "code"=>400,
//            "msg"=>"插入成功"
//        ]);
//    }

    //查询用户是否存在
    $sql="select * from manager where username='$username'";
    $result=$mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);
//    var_dump($result);
    if(count($result)){
        if ($result[0]['password']==$password){
            session_start();
            $_SESSION['id']=$result[0]['id'];
            $_SESSION['username']=$username;
            echo json_encode([
                "code"=>200,
                "msg"=>"登录成功"
            ]);
        }else{
            echo json_encode([
                "code"=>400,
                "msg"=>"该用户名与密码不匹配"
            ]);
        }
    }else{
        echo json_encode([
            "code"=>400,
            "msg"=>"该用户不存在"
        ]);
    }
}



?>