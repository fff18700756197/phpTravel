<?php
//连接数据库
require "../lib/connect.php";
////查询导航信息
$query="select * from banner order by bsort desc limit 2";
$banner=$mysqli->query($query)->fetch_all(MYSQLI_ASSOC);

    require "header.php";
    require "../view/index/index.html";
    require "footer.php";
?>
