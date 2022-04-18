<?php

include ('session_check.php');
include ('../lib/mainlib.php');


$cid = $_GET['id'];
$table = "users";
$where = "id";
$header = "../views/manage_users.php";

$cun = $_SESSION["uname"];



$suser_id = $cid;
$select_table = "users";
$swhere = "id";

$jp = new SelectTable();
$jp->SelectTb($suser_id, $select_table, $swhere);
$STbA = mysql_fetch_array($query);

$cemail = $STbA['email'];

if ($cemail == $cun) {

    $msg = "You Can not Delete Your Account";

    header("Location:../views/manage_users.php?uneqmsg=$msg");
} else {
    $DC = new delete();
    $DC->DeleteData($table, $cid, $where, $header);
}
?>