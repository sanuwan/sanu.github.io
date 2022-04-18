<?php require_once("../../config/config.php");?>
<?php
if (isset($_GET["delete"])) {
    $IdFromURL=$_GET["delete"];
    $Connection;
    $Query = "DELETE FROM admin WHERE admin_id='$IdFromURL'";
    $Execute = mysqli_query($Connection,$Query);
    if ($Execute) {
        $_SESSION["SuccessMessage"] = "Admin delete Successfully";
        redirect("users.php");

    }else{
        $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again";
        redirect("users.php");
    }
}
?>