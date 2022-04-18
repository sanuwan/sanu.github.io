<?php

include ('../../lib/connection.php');
$connection = new createConnection(); // created a new object
$connection->connectToDatabase(); // connected to the database
$connection->selectDatabase(); // connected to the database
//fb user login insert class
class fb_login {

    public function check($id, $name) {

        $result = "SELECT * FROM  users WHERE email = '{$id}'";
        $view = mysql_query($result);
        $count = mysql_num_rows($view);

        if ($count == 0) {

            $name = $name;
            $comname = $name;
            $add1 = "";
            $add2 = "";
            $email = $id;
            $pass = "";
            $phone = "";
            $web = "";
            $facebook = "";
            $user_group = 3;
            $date = date("Y/m/d");

            $insert = ("INSERT INTO users (name, company_name, company_address1, company_address2, email, password, phone, facebook, website, user_group, date) VALUES "
                    . "('$name', '$comname','$add1','$add2','$email','$pass','$phone','$web','$facebook', '$user_group', '$date')");

            if (mysql_query($insert)) {
                $idmail = $email;
                $log = new log();
                $log->userlogin($idmail);
            } else {
                echo mysql_error();
                return $msg = "this time we can't register you sorry";
            }
        } else {

            $idmail = $id;
            $log = new log();
            $log->userlogin($idmail);
        }
    }

}

// Fb user login class
class log {

    function userlogin($idmail) {
        $CheckUserNameAndPassword = "SELECT * FROM users WHERE email='$idmail'";
        //query to check the user
        $UserQuery = mysql_query($CheckUserNameAndPassword);
        $row = mysql_fetch_array($UserQuery);
        $UserCount = mysql_num_rows($UserQuery);
        if ($UserCount == 1) {
            session_start();
            $_SESSION["userid"] = $row["id"];
            $_SESSION["name"] = $row["name"];
            $_SESSION["uname"] = $row["email"];
            $_SESSION["comname"] = $row["company_name"];
            $_SESSION["user_group"] = $row["user_group"];

            // Re direct to the page 

            header("location:../../views/addjobs.php");
        } else {

            $msg = "Something Went Wrong";
            header("Location:index.php?uneqmsg=$msg");
        }
    }

}
