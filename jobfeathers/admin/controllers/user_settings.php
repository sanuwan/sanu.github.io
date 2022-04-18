<?php

include ('session_check.php');
include ('../lib/mainlib.php');


$name = $_POST['name'];
$comname = $_POST['cname'];
$add1 = $_POST['add1'];
$add2 = $_POST['add2'];
$email = $_POST['email'];
$phn = $_POST['phn'];
$fb = $_POST['fb'];
$web = $_POST['web'];

// null verifications

$suser_id = $_SESSION["userid"];
$select_table = "users";
$swhere = "id";
$ST = new SelectTable();
$ST->SelectTb($suser_id, $select_table, $swhere);

$users = mysql_fetch_array($query);

if ($name == null) {
    $name = $users['name'];
}

if ($comname == null) {
    $comname = $users['company_name'];
}

if ($add1 == null) {
    $add1 = $users['company_address1'];
}

if ($add2 == null) {
    $add2 = $users['company_address2'];
}

if ($email == null) {
    $email = $users['email'];
}

if ($phn == null) {
    $phn = $users['phone'];
}

if ($fb == null) {
    $fb = $users['facebook'];
}

if ($web == null) {
    $web = $users['website'];
}

$table = "users";
$header = "../views/user_settings.php";

$setquery = " name='$name', company_name='$comname', company_address1='$add1', company_address2='$add2', email='$email', phone='$phn' ,facebook='$fb', website='$web' ";

$where = "id";

$id = $_SESSION["userid"];

$up = new update();

$up->UpdateDataRow($header, $table, $setquery, $where, $id);
?>