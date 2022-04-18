<?php

include ('session_check.php');
include ('../lib/mainlib.php');


$cid = $_GET['id'];
$table = "job_posts";
$where = "id";
$header = "../views/manage_jobs.php";

$DC = new delete();
$DC->DeleteData($table, $cid, $where, $header);
?>