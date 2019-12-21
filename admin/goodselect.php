<?php
require "../lib/connect.php";
$category=$mysqli->query("select * from category")->fetch_all(MYSQLI_ASSOC);
require "../view/admin/goodselect.html";
