<?php

include ('session_check.php');
include ('../lib/mainlib.php');


$jobc = $_POST['category_name'];
$view_count = 0;

$header = "../views/add_category.php";
$table = "jobs_category";
$rows = "(jobs_category,view_count)";
$values = "('$jobc','$view_count')";
$hint = "New Category Saved";
$hint2 = "New Category Not Saved";

$addc = new jobs();
$addc->addjobs($table, $rows, $values, $header, $hint, $hint2);
?>