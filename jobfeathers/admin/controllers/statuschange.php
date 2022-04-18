<?php

include ('../controllers/session_check.php');
include ('../lib/mainlib.php');

error_reporting(4);

$count = $_POST["count"];
$table = "job_posts";
$set = "admin_status";
$where = "id";
$header = "../views/manage_jobs.php";


while ($count > 0) {
    $st = 1;

    if ($_POST["check_list" . $count] != "on") {
        $st = 0;
    }
    //echo "<span>".$_POST["id".$count]."</span>=";
    //echo "<span>".$st."</span><br><br>";

    $id = $_POST["id" . $count];
    $value = "admin_status";

    $Up = new update();

    $Up->UpdateData($header, $table, $set, $where, $id, $st);

    $count--;
}
?>

