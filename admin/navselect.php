<?php
//连接数据库
require  "../lib/connect.php";
//查询数据
$select="select * from nav order by nid asc";
$result=$mysqli->query($select)->fetch_all(MYSQLI_ASSOC);

require "../view/admin/navselect.html";