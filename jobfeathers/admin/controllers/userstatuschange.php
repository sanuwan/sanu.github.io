<?php

include ('../controllers/session_check.php');
include ('../lib/mainlib.php');

error_reporting(4);

$count = $_POST["count"];
$table = "job_posts";
$set = "user_status";
$where = "id";
$header = "../views/view_post.php";


while ($count > 0) {
    $st = 1;

    if ($_POST["check_list" . $count] != "on") {
        $st = 0;
    }
    $id = $_POST["id" . $count];
    $value = "admin_status";

    $Up = new update();

    $Up->UpdateData($header, $table, $set, $where, $id, $st);

    $count--;
}
?>
