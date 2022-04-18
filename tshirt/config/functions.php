<?php require_once("db.php"); ?>
<?php require_once("sessions.php"); ?>
<?php

function redirect($location){
    return header("Location: $location ");
}

function query($sql) {
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm($result){
    global $connection;
    if(!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
}

function escape_string($string){
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){
    return mysqli_fetch_array($result);
}

function display_message() {
    if(isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function Login_Attempt($Username,$Password){
global $Connection;
$Query="SELECT * FROM customer WHERE username='$Username' AND password='$Password'";
$Execute = mysqli_query($Connection,$Query);
if ($admin=mysqli_fetch_assoc($Execute)) {
	return $admin;
}else
{
	return null;
}
}

function Login(){
	if ($_SESSION["User_Id"]) {
		return true;
	}
}

function Confirm_Login(){
	if (!Login()) {
		$_SESSION["ErrorMessage"]="Login Required !";
		Redirect_to("login.php");
	}
}
?>