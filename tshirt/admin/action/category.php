<?php require_once("../../config/config.php");?>
<?php
 if (isset($_POST["add_category"])) {
$Category = mysqli_real_escape_string($Connection,$_POST["category"]);
date_default_timezone_get("Asia/Colombo");
$CurrentTime=time();
$DateTime=strftime("%B-%d-%Y %H:%M:%S", $CurrentTime );
$DateTime;
$Admin="max";
if (empty($Category)) {
$_SESSION["ErrorMessage"] = "All Fields must  be filled out";
    redirect("../index.php");
}
else if(strlen($Category)>99) {
$_SESSION["ErrorMessage"] = "Too Long Name";
    redirect("../index.php");
}
else{
global $Connection;
$Query = "INSERT INTO category(datetime,title,creatorname) VALUES('$DateTime','$Category','$Admin')";
$Execute = mysqli_query($Connection,$Query);
if($Execute){
$_SESSION["SuccessMessage"]= "Category Added Successfully";
    redirect("../categories.php");
}
else{
$_SESSION["ErrorMessage"] = "Categoty failed to Add";
    redirect("../index.php");
}
}
}

?> ?>
