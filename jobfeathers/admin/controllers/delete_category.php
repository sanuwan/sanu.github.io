<?php

include ('session_check.php');
include ('../lib/mainlib.php');

$cid = $_GET['id'];
$table = "jobs_category";
$where = "id";
$header = "../views/add_category.php";

$DC = new delete();
$DC->DeleteData($table, $cid, $where, $header);
?>