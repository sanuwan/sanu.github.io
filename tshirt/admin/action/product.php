<?php require_once("../../config/config.php");?>
<?php
if (isset($_POST["product"])) {
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
        redirect("../index.php");
    }
    else if(strlen($Title)<2) {
        $_SESSION["ErrorMessage"] = "Title Should be at-least 2 Characters";
        redirect("../index.php");
    }
    else{
        global $Connection;
        $Query = "INSERT INTO product(datetime,title,category,author,price,quantity,image,description) VALUES('$DateTime','$Title','$Category','$Admin','$Price','$Quantity','$Image','$Description')";
        $Execute = mysqli_query($Connection,$Query);
        move_uploaded_file($_FILES["image"]["tmp_name"], $Target);
        if($Execute){
            $_SESSION["SuccessMessagePost"]= "Post Added Successfully";
            redirect("../posts.php");
        }
        else{
            $_SESSION["ErrorMessage"] = "Something Went Wrong. Try Again !";
            redirect("../index.php");
        }
    }
}
?>
