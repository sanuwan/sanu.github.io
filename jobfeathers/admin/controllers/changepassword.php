<?php

include ('session_check.php');
include ('../lib/mainlib.php');

$cpass = $_POST['cpass'];
$npass = $_POST['npass'];
$nrpass = $_POST['rnpass'];


$suser_id = $_SESSION["userid"];
$select_table = "users";
$swhere = "id";
$ST = new SelectTable();
$ST->SelectTb($suser_id, $select_table, $swhere);

$users = mysql_fetch_array($query);

if ($npass == $nrpass) {

    if ($cpass == $users['password']) {
        $id = $_SESSION["userid"];
        $table = "users";
        $set = "password";
        $where = "id";
        $header = "../views/user_settings.php";
        $st = $npass;

        $Up = new update();

        $Up->UpdateData($header, $table, $set, $where, $id, $st);

        $sqlupdate = "UPDATE {$table} SET {$set}={$st} WHERE {$where} ={$id}";
    } else {

        $msg = "Your Current Password is Wrong";
        header("Location:../views/user_settings.php?msg=$msg");
    }
} else {

    $msg = "Your New Password is not Matching";
    header("Location:../views/user_settings.php?msg=$msg");
}
?>