<?php
require "../lib/connect.php";
$gid=$_GET['gid'];
$data=$mysqli->query("select * from goods where gid='$gid' ")->fetch_assoc();
//    var_dump($data);
require "header.php";
require "../view/index/detail.html";
require "footer.php";