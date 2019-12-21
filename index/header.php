<?php
//连接数据库
require "../lib/connect.php";
////查询导航信息
$query="select * from nav order by nsort limit 5";
$nav=$mysqli->query($query)->fetch_all(MYSQLI_ASSOC);

require "../view/index/header.html";

