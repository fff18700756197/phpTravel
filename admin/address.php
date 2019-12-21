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
        $select="select * from address";
        $result=$mysqli->query($select)->fetch_all(MYSQLI_ASSOC);
        //查询当前页数据
        $query="select * from address order by aid asc limit $offset,$limit";
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
        $aid=$_GET['aid'];
        //获取当前这条数据
        $queryone="select * from address where aid=$aid";
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
        $aid=$_POST['aid'];
        $store=$_POST['store'];
        $addr=$_POST['addr'];
        $tel=$_POST['tel'];
        $time1=$_POST['time1'];
        $time2=$_POST['time2'];
        $asort=$_POST['asort'];
        //修改数据
        $update="update address set store='$store',addr='$addr',tel='$tel',time1='$time1',time2='$time2',asort='$asort' where aid=$aid";
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
        $aid=$_GET['aid'];
        //删除数据
        //获取当前这条数据
        $delete = "delete from address where aid='$aid'";
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


