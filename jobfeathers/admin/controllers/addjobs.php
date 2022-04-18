<?php

include ('session_check.php');
include ('../lib/mainlib.php');

$jobc = $_POST['jc'];
$jobtitle = $_POST['jt'];
$cdate = $_POST['cdate'];
$jdiscription = $_POST['jd'];
$remail = $_POST['remail'];
$jurl = $_POST['jurl'];

$file_name1 = ($_FILES['fileToUpload']['name']);
$jsnote = $_POST['jsn'];
$table = "job_posts";

$date = date("Y/m/d");

$apply_count = 0;
$view_count = 0;

// Referance Number
date_default_timezone_set('UTC');
$rn = date("Ydm") . mt_rand(10, 1000);


if (!empty($file_name1)) {

    $file_name = $rn . $file_name1;

    $adf = new uploadfile();
    $adf->fileupload($file_name);
} else {
    $file_name = "";
}

//User Id

$userid = $_SESSION["userid"];

// Company Name

$comname = "";

//Status

$Adminstatus = 0;
$Userstatus = 1;
$hint = "Vacancy Added";
$hint2 = "Vacancy Not Added";

$rows = "(date, catogory_id, closing_date, job_email, reference_number, user_id, job_title, job_discription, attachment, url, admin_status , user_status, notes, apply_count, view_count)";

$values = "('$date', '$jobc', '$cdate', '$remail', '$rn', '$userid', '$jobtitle', '$jdiscription', '$file_name', '$jurl', '$Adminstatus', '$Userstatus', '$jsnote', '$apply_count', '$view_count')";

$header = "../views/view_post.php";
$in = new jobs();
$in->addjobs($table, $rows, $values, $header, $hint, $hint2);
?>