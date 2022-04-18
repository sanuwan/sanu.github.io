<?php require_once("../../config/config.php");?>
<?php
if (isset($_POST["update"])) {
    $Title = mysqli_real_escape_string($Connection,$_POST["title"]);
    $Category = mysqli_real_escape_string($Connection,$_POST["category"]);
    $Description = mysqli_real_escape_string($Connection,$_POST["description"]);
    $Price = mysqli_real_escape_string($Connection,$_POST["price"]);
    $Quantity = mysqli_real_escape_string($Connection,$_POST["quantity"]);
    date_default_timezone_get("Asia/Colombo");
    $CurrentTime=time();
    $DateTime=strftime("%B-%d-%Y", $CurrentTime );
    $DateTime;
    $Admin="max";
    $Image=$_FILES["image"]["name"];
    $Target="../../upload/".basename($_FILES["image"]["name"]);
    if (empty($Title)) {
        $_SESSION["ErrorMessage"] = "Title can't be empty";
        redirect("../details.php");
    }
    else if(strlen($Title)<2) {
        $_SESSION["ErrorMessage"] = "Title Should be at-least 2 Characters";
        redirect("../details.php");
    }
    else{
        global $Connection;
        $EditFromURL = $_GET['edit'];
        $Query ="UPDATE product SET datetime='$DateTime',title='$Title',
    category='$Category', author='$Admin',price=$Price,quantity=$Price,image='$Image',description='$Description'
    WHERE product_id='$EditFromURL'";
        $Execute = mysqli_query($Connection,$Query);
        move_uploaded_file($_FILES["image"]["tmp_name"], $Target);
        if($Execute){
            $_SESSION["SuccessMessagePost"]= "Post Added Successfully";
            redirect("../posts.php");
        }
        else{
            $_SESSION["ErrorMessage"] = "Something Went Wrong. Try Again !";
            redirect("../details.php");
        }
    }
}

if (isset($_POST["delete"])) {
    $Title = mysqli_real_escape_string($Connection,$_POST["title"]);
    $Category = mysqli_real_escape_string($Connection,$_POST["category"]);
    $Description = mysqli_real_escape_string($Connection,$_POST["description"]);
    $Price = mysqli_real_escape_string($Connection,$_POST["price"]);
    $Quantity = mysqli_real_escape_string($Connection,$_POST["quantity"]);
    date_default_timezone_get("Asia/Colombo");
    $CurrentTime=time();
    $DateTime=strftime("%B-%d-%Y", $CurrentTime );
    $DateTime;
    $Admin="max";
    $Image=$_FILES["image"]["name"];
    $Target="../../upload/".basename($_FILES["image"]["name"]);
    if (empty($Title)) {
        $_SESSION["ErrorMessage"] = "Title can't be empty";
        redirect("index.php");
    }
    else if(strlen($Title)<2) {
        $_SESSION["ErrorMessage"] = "Title Should be at-least 2 Characters";
        redirect("index.php");
    }
    else{
        global $Connection;
        $DeleteFromURL = $_GET['edit'];
        $Query ="DELETE FROM product WHERE product_id='$DeleteFromURL'";
        $Execute = mysqli_query($Connection,$Query);
        move_uploaded_file($_FILES["image"]["tmp_name"], $Target);
        if($Execute){
            $_SESSION["SuccessMessagePost"]= "Post Added Successfully";
            redirect("index.php");
        }
        else{
            $_SESSION["ErrorMessage"] = "Something Went Wrong. Try Again !";
            redirect("index.php");
        }
    }
}
?>
