<?php

include ('../lib/mainlib.php');

$suser_id = $_POST['jobid'];
$company = $_POST['company'];
$fname = $_GET['fname'];

echo $file_name1 = ($_FILES['fileToUpload']['name']);

// Referance Number
date_default_timezone_set('UTC');
$rn = date("Ydm") . mt_rand(10, 1000);

if (!empty($file_name1)) {
    $file_name = $rn . $file_name1;
    $adf = new uploadcv();
    $adf->fileupload($file_name);

    header("Location:../views/apply.php?fname=$file_name&&jobid=$suser_id&&company=$company");
} else {
    header("Location:../views/apply.php?msg=Sorry Cannot upload your cv");
}