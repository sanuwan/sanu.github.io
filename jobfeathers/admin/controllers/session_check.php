<?php

// Session Check 
error_reporting(1);
session_start();

if (!isset($_SESSION["userid"])) {
    header("location:../index.php");
    exit();
} else {

}

?>