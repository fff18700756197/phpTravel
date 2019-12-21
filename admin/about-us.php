<?php
$method=$_SERVER['REQUEST_METHOD'];
//连接数据库
require "../lib/connect.php";
if ($method=="GET"){
    //查询数据
    $select="select * from about_us where uid=1";
    $results=$mysqli->query($select)->fetch_assoc();
    if ($results){
        echo json_encode([
            "code"=>200,
            "msg"=>"查询成功",
            "content"=>$results['content']
        ]);
    }else{
        echo json_encode([
            "code"=>400,
            "msg"=>"查询失败".$mysqli->error
        ]);
    }
}else{
    //接收数据
    $content=$_POST['content'];
    //修改数据
    $update="update about_us set content='$content' where uid=1";
    $result=$mysqli->query($update);
    if ($mysqli->affected_rows>0){
        echo json_encode([
            "code"=>200,
            "msg"=>"修改成功"
        ]);
    }else{
        echo json_encode([
            "code"=>400,
            "msg"=>"修改失败".$mysqli->error
        ]);
    }

}
?>