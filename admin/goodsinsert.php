<?php
$method=$_SERVER['REQUEST_METHOD'];
//连接数据库
require "../lib/connect.php";
if ($method=="GET"){
    $category=$mysqli->query("select * from category")->fetch_all(MYSQLI_ASSOC);
    require "../view/admin/goodsinsert.html";
}else{
    //接收数据
    $cid=$_POST['cid'];
    $gname=$_POST['gname'];
    $gthumb=$_POST['gthumb'];
    $gbanner=$_POST['gbanner'];
    $market_price=$_POST['market_price'];
    $shop_price=$_POST['shop_price'];
    $gstock=$_POST['gstock'];
    $create_time=date('Y-m-s H:i:s');
    $update_time=date('Y-m-s H:i:s');
    $gstatus=$_POST['gstatus'];
    $gcontent=$_POST['gcontent'];

    //插入数据
    $insert="insert into goods(cid,gname,gthumb,gbanner,market_price,shop_price,gstock,create_time,update_time,gstatus,gcontent) values('$cid','$gname','$gthumb','$gbanner','$market_price','$shop_price','$gstock','$create_time','$update_time','$gstatus','$gcontent')";
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

?>




