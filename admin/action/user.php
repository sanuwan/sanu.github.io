<?php require_once("../../config/config.php");?>
<?php
if (isset($_POST["admin"])) {
    $Username = mysqli_real_escape_string($Connection,$_POST["username"]);
    $Password = mysqli_real_escape_string($Connection,$_POST["password"]);
    $ConfirmPassword = mysqli_real_escape_string($Connection,$_POST["confirmpassword"]);
    date_default_timezone_get("Asia/Colombo");
    $CurrentTime=time();
    $DateTime=strftime("%B-%d-%Y", $CurrentTime );
    $DateTime;
    $Admin="max";
    if (empty($Username)||empty($Password)||empty($ConfirmPassword) ) {
        $_SESSION["ErrorMessage"] = "All Fields must  be filled out";
        redirect("../index.php");
    }
    else if(strlen($Password)<4) {
        $_SESSION["ErrorMessage"] = "Atleast 4 Characters For Password are Required";
        redirect("../index.php");
    }
    else if($Password!==$ConfirmPassword) {
        $_SESSION["ErrorMessage"] = "Password / Confirm Password does not match";
        redirect("../index.php");}
    else {
        global $Connection;
        $Query = "INSERT INTO admin(datetime,username,password,addedby) VALUES('$DateTime','$Username','$Password','$Admin')";
        $Execute = mysqli_query($Connection,$Query);
        if($Execute){
            $_SESSION["SuccessMessage"]= "Admin Added Successfully";
            redirect("../users.php");
        }
        else{
            $_SESSION["ErrorMessage"] = "Admin failed to Add";
            redirect("../index.php");
        }
    }
}
?>
