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
        $select="select * from online";
        $result=$mysqli->query($select)->fetch_all(MYSQLI_ASSOC);
        //查询当前页数据
        $query="select * from online order by oid asc limit $offset,$limit";
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

    //删除
    case "deletes":
        $oid=$_GET['oid'];
        //删除数据
        //获取当前这条数据
        $delete = "delete from online where oid='$oid'";
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


