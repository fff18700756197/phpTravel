<?php
$method=$_SERVER['REQUEST_METHOD'];

if ($method=="GET"){
    require "../view/admin/newsinsert.html";
}else{
    //接收数据
    $ntitle=$_POST['ntitle'];
    $ncontent=$_POST['ncontent'];
    $ncreate_time=date('Y-m-s');
    $nupdate_time=date('Y-m-s');
//    $ncreate_time=$_POST['ncreate_time'];
//    $nupdate_time=$_POST['nupdate_time'];
    $nsort=$_POST['nsort'];
    //连接数据库
    require "../lib/connect.php";
    //插入数据
    $insert="insert into news(ntitle,ncontent,ncreate_time,nupdate_time,nsort) values('$ntitle','$ncontent',' $ncreate_time','$nupdate_time','$nsort')";
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


