<?php
$type=$_GET['type'];
//连接数据库
require  "../lib/connect.php";

switch ($type){
    //1.查询
    case "querys":
        $page=$_GET['page'];
        $limit=$_GET['limit'];
        $offset=($page-1)*$limit;
        //查询所有数据
        $select="select * from manager";
        $result=$mysqli->query($select)->fetch_all(MYSQLI_ASSOC);
        //查询当前页数据
        $query="select * from manager order by id asc limit $offset,$limit";
        $result1=$mysqli->query($query);
        $data=$result1->fetch_all(MYSQLI_ASSOC);

        if ($result1){
            echo json_encode([
                "code"=>0,
                "msg"=>"查询成功",
                "count"=>count($result),
                "data"=>$data
            ]);
        }else{
            echo json_encode([
                "code"=>400,
                "msg"=>"查询失败"
            ]);
        }
        break;
    //2.获取当前这条数据
    case "queryone":
        $id=$_GET['id'];
        //获取当前这条数据
        $queryone="select * from manager where id=$id";
        $result=$mysqli->query($queryone);
        //var_dump($result);
        $data=$result->fetch_assoc();
        if ($result){
            echo json_encode([
                "code"=>200,
                "msg"=>"数据获取成功",
                "data"=>$data
            ]);
        }else{
            echo json_encode([
                "code"=>400,
                "msg"=>"数据获取失败".$mysqli->error
            ]);
        }
        break;
    //3.修改
    case "updates":
        $id=$_POST['id'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $manager_img=$_POST['manager_img'];
        //修改数据
        $update="update manager set username='$username',password='$password',manager_img='$manager_img' where id=$id";
        $result=$mysqli->query($update);
        if ($result){
            echo json_encode([
                "code"=>200,
                "msg"=>"数据修改成功",
                "data"=>$data
            ]);
        }else{
            echo json_encode([
                "code"=>400,
                "msg"=>"数据修改失败".$mysqli->error
            ]);
        }
        break;

    //删除
    case "deletes":
        $id=$_GET['id'];
        //删除数据
        //获取当前这条数据
        $delete = "delete from manager where id='$id'";
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
        break;
}


