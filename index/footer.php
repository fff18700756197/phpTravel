<?php
//连接数据库
require "../lib/connect.php";
//查询门店地址信息
$query="select * from address";
$addr=$mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
require "../view/index/footer.html";

?>
