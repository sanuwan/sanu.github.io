<?php require_once("../../config/config.php");?>
<?php
if (isset($_POST["update"])) {
    $Category = mysqli_real_escape_string($Connection,$_POST["category"]);
    date_default_timezone_get("Asia/Colombo");
    $CurrentTime=time();
    $DateTime=strftime("%B-%d-%Y %H:%M:%S", $CurrentTime );
    $DateTime;
    $Admin="max";
    if (empty($Category)) {
        $_SESSION["ErrorMessage"] = "All Fields must  be filled out";
        redirect("../post.php");
    }
    else if(strlen($Category)>99) {
        $_SESSION["ErrorMessage"] = "Too Long Name";
        redirect("../login.php");
    }
    else{
        global $Connection;
        $EditFromURL=$_GET['edit'];
        $Query = "UPDATE category SET datetime='$DateTime',title='$Category', creatorname='$Admin' WHERE cat_id='$EditFromURL'";
        $Execute = mysqli_query($Connection,$Query);
        if($Execute){
            $_SESSION["SuccessMessage"]= "Category Added Successfully";
            redirect("../index.php");
        }
        else{
            $_SESSION["ErrorMessage"] = "Categoty failed to Add";
            redirect("../user.php");
        }
    }
}
?>
<?php
if (isset($_POST["delete"])) {
    $IdFromURL=$_GET["edit"];
    $Connection;
    $Query = "DELETE FROM category WHERE cat_id='$IdFromURL'";
    $Execute = mysqli_query($Connection,$Query);
    if ($Execute) {
        $_SESSION["SuccessMessage"] = "Admin delete Successfully";
        redirect("index.php");

    }else{
        $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again";
        redirect("users.php");
    }
}
?>