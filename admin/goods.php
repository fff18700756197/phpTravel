<?php
$type=$_GET['type'];
//连接数据库
require  "../lib/connect.php";

switch ($type){
    //1.查询数据渲染到表格
    case "querys":
        $page=$_GET['page'];
        $limit=$_GET['limit'];
        $offset=($page-1)*$limit;
        //查询所有数据
        $select="select * from goods";
        $result=$mysqli->query($select)->fetch_all(MYSQLI_ASSOC);

        //查询当前页数据
        $query="select goods.*,category.cname from goods,category where goods.cid=category.cid limit $offset,$limit";
        $result1=$mysqli->query($query);
        $data=$result1->fetch_all(MYSQLI_ASSOC);

        if ($result1){
            echo json_encode([
                "code"=>0,
                "msg"=>"获取数据成功",
                "count"=>count($result),
                "data"=>$data
            ]);
        }else{
            echo json_encode([
                "code"=>400,
                "msg"=>"获取数据失败"
            ]);
        }
        break;
    //2.获取当前这条数据
    case "queryone":
        $gid=$_GET['gid'];
        //获取当前这条数据
        $queryone="select * from goods where gid=$gid";
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
//    3.修改
    case "updates":
        $gid=$_POST['gid'];
        $cid=$_POST['cid'];
        $gname=$_POST['gname'];
        $gthumb=$_POST['gthumb'];
        $gbanner=$_POST['gbanner'];
        $market_price=$_POST['market_price'];
        $shop_price=$_POST['shop_price'];
        $gstock=$_POST['gstock'];
        $update_time=$_POST['update_time'];
        $gstatus=$_POST['gstatus'];
        $gcontent=$_POST['gcontent'];
        //修改数据
        $update="update goods set cid=$cid,gname='$gname',gthumb='$gthumb',gbanner='$gbanner',market_price='$market_price',shop_price='$shop_price',gstock='$gstock',update_time='$update_time',gstatus='$gstatus' gcontent='$gcontent' where gid='$gid'";
        $result=$mysqli->query($update);
        if ($result){
            echo json_encode([
                "code"=>200,
                "msg"=>"数据修改成功"
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
        $gid=$_GET['gid'];
        //删除数据
        //获取当前这条数据
        $delete = "delete from goods where gid='$gid'";
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

    //排序
    case "sorts":
        $gid=$_GET['gid'];
        $val=$_GET['val'];
        //修改
        $update="update goods set gsort=$val where gid=$gid";
        $result=$mysqli->query($update);
        if ($result){
            echo json_encode([
                "code"=>200,
                "msg"=>"排序修改成功"
            ]);
        }else{
            echo json_encode([
                "code"=>400,
                "msg"=>"排序修改失败".$mysqli->error
            ]);
        }
        break;


}

