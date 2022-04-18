<?php

// Main Libreray 
include ('connection.php');
$connection = new createConnection(); // created a new object
$connection->connectToDatabase(); // connected to the database
$connection->selectDatabase(); // connected to the database
// Insert User Class

class user {

    public function insert($table, $rows, $values, $email, $header) {

        $result = "SELECT * FROM  users WHERE email = '{$email}'";

        $view = mysql_query($result);
        $count = mysql_num_rows($view);

        if ($count == 0) {
            $insert = ("INSERT INTO {$table} {$rows} VALUES {$values} ");

            if (mysql_query($insert)) {
                $msg = "Registered Now you Can Log into Job feathers";
            } else {
                echo mysql_error();

                $msg = "this time we can't register you sorry";
            }
        } else {
            $msg = "User Allrdy Exists";
        }
        header("Location:$header?uneqmsg=$msg");
    }

}

// Add Jobs Class		

class jobs {

    public function addjobs($table, $rows, $values, $header, $hint, $hint2) {
        $insertjob = ("INSERT INTO {$table} {$rows} VALUES {$values} ");
        if (mysql_query($insertjob)) {
            $msg = $hint;
        } else {
            echo mysql_error();
            $msg = $hint2;
        }

        header("Location:$header?uneqmsg=$msg");
    }

}

// Upload File Class 

class uploadfile {

    function fileupload($file_name) {

        //This is the directory where images will be saved
        $target_dir = "../uploads/";
        $target_file = $target_dir . $file_name;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        // Check if image file is a actual image or fake image
        if (isset($file_name)) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            //$msg = " Sorry, your file is too large ...";
            header("Location:");
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {

            $msg = " Sorry, only JPG, JPEG, PNG & GIF files are allowed ...";
            header("Location:");
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //$msg = " Sorry, your file was not uploaded.";
            header("Location:");
            // if everything is ok, try to upload file
        } else {

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                //$msg =  "file Upload Sucsessfully";
            }
            $msg = " Sorry, there was an error uploading your file..";
            header("Location:../views/addjobs.php?uneqmsg=$msg");
        }
    }

}

// User Login Class

class login {

    function userlogin($username, $password) {
        $CheckUserNameAndPassword = "SELECT * FROM users WHERE email='$username' AND password = '$password'";
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

            header("location:../views/addjobs.php");
        } else {
            $msg = "Check Your Username and Password Again";
            header("Location:../index.php?uneqmsg=$msg");
        }
    }

}

// Logout Class

class logout {

    function logout() {
        // Destoring all the sessions when click log out 
        session_start();
        session_destroy(); //destroying all the sessions
        header("location:../index.php");
        exit();
    }

}

// Select table class 

class SelectTable {

    function SelectTb($suser_id, $select_table, $swhere) {
        $stb = " SELECT * FROM {$select_table} WHERE {$swhere} = {$suser_id}";
        global $query;

        $query = mysql_query($stb);

        global $query1;
        $query1 = mysql_query($stb);
    }

    function SelectTb2($suser_id2, $select_table2, $swhere2) {
        $stb2 = " SELECT * FROM {$select_table2} WHERE {$swhere2} = {$suser_id2}";
        global $query2;

        $query2 = mysql_query($stb2);

        global $query21;
        $query21 = mysql_query($stb2);
    }

    function SelectTb3($id1, $id2, $select_table3, $wh1, $wh2) {
        $stb3 = " SELECT * FROM {$select_table3} WHERE {$wh1} = {$id1} and {$wh2} = {$id2} ORDER BY id ASC";
        global $query3;
        $query3 = mysql_query($stb3);
    }

}

// Select table All class 

class SelectTableAll {

    function SelectTbAll($SAtable) {

        $stb = " SELECT * FROM {$SAtable}";
        global $SAquery;
        $SAquery = mysql_query($stb);
        $query1 = mysql_query($stb);

        global $STb;
        $STb = mysql_fetch_array($query1);
    }

}

// Delete Class 
class delete {

    function DeleteData($table, $where, $cid, $header) {

        echo $deletesql = "DELETE FROM {$table} WHERE {$where} = {$cid}";

        if (mysql_query($deletesql)) {
            $msg = "Deleted";
        } else {
            echo mysql_error();
            $msg = "Sory We Can not delete the category at the momment";
        }

        header("Location:$header?uneqmsg=$msg");
    }

}

// Update Class 

class update {

    function UpdateData($header, $table, $set, $where, $id, $st) {

        $sqlupdate = "UPDATE {$table} SET {$set}={$st} WHERE {$where} ={$id}";
        mysql_query($sqlupdate);

        $msg = "Updated";

        header("Location:$header?msg=$msg");
    }

    function UpdateDataRow($header, $table, $setquery, $where, $id) {

        $sqlupdate = "UPDATE {$table} SET {$setquery} WHERE {$where} ={$id}";
        mysql_query($sqlupdate);
        $msg = "Updated";
        header("Location:$header?msg=$msg");
    }

}

// Reports Class

class reports {

    public function ex_vacancies() {
        $date = date("Y-m-d");
        $ex_vacan_sql = "SELECT * FROM job_posts WHERE closing_date < '{$date}'";
        global $g_result;
        $g_result = mysql_query($ex_vacan_sql);
    }

    public function top_catagories() {
        $topc = "SELECT * FROM jobs_category ORDER BY view_count DESC ";
        global $topcdata;
        $topcdata = mysql_query($topc);
    }

    public function top_vacancy() {
        $tovc = "SELECT * FROM job_posts ORDER BY apply_count DESC ";
        global $topvacan;
        $topvacan = mysql_query($tovc);
    }

}

// Increese the hits of view count for job post and job category
class hits {

    public function catagory_count($cid) {

        $sql_select = "SELECT * FROM jobs_category WHERE id = '{$cid}'";
        $query = mysql_query($sql_select);
        $array = mysql_fetch_array($query);
        $id = $array['id'];
        $name = $array['jobs_category'];
        $count = $array['view_count'] + 1;
        $update = "UPDATE jobs_category SET jobs_category = '{$name}',view_count='{$count}' WHERE id ='{$id}'";
        mysql_query($update);
    }

    public function job_view_count($cid) {

        $sql_select = "SELECT * FROM job_posts WHERE id = '{$cid}'";
        $query = mysql_query($sql_select);
        $array = mysql_fetch_array($query);

        $date = $array['date'];
        $reference_number = $array['reference_number'];
        $catogory_id = $array['catogory_id'];
        $closing_date = $array['closing_date'];
        $job_email = $array['job_email'];
        $user_id = $array['user_id'];
        $job_title = $array['job_title'];
        $job_discription = $array['job_discription'];
        $attachment = $array['attachment'];
        $url = $array['url'];
        $admin_status = $array['admin_status'];
        $user_status = $array['user_status'];
        $notes = $array['notes'];
        $apply_count = $array['apply_count'];

        $view_count = $array['view_count'] + 1;

        $update = "UPDATE job_posts SET date = '{$date}', reference_number='{$reference_number}', catogory_id = '{$catogory_id}', closing_date='{$closing_date}', job_email='{$job_email}', user_id='{$user_id}', job_title='{$job_title}', job_discription='{$job_discription}', attachment='{$attachment}', url='{$url}', admin_status='{$admin_status}', user_status='{$user_status}', notes='{$notes}', apply_count='{$apply_count}', view_count='{$view_count}'  WHERE id ='{$cid}'";
        mysql_query($update);
    }

    public function job_apply_count($cid) {

        $sql_select = "SELECT * FROM job_posts WHERE id = '{$cid}'";
        $query = mysql_query($sql_select);
        $array = mysql_fetch_array($query);

        $date = $array['date'];
        $reference_number = $array['reference_number'];
        $catogory_id = $array['catogory_id'];
        $closing_date = $array['closing_date'];
        $job_email = $array['job_email'];
        $user_id = $array['user_id'];
        $job_title = $array['job_title'];
        $job_discription = $array['job_discription'];
        $attachment = $array['attachment'];
        $url = $array['url'];
        $admin_status = $array['admin_status'];
        $user_status = $array['user_status'];
        $notes = $array['notes'];
        $apply_count = $array['apply_count'] + 1;

        $view_count = $array['view_count'];

        $update = "UPDATE job_posts SET date = '{$date}', reference_number='{$reference_number}', catogory_id = '{$catogory_id}', closing_date='{$closing_date}', job_email='{$job_email}', user_id='{$user_id}', job_title='{$job_title}', job_discription='{$job_discription}', attachment='{$attachment}', url='{$url}', admin_status='{$admin_status}', user_status='{$user_status}', notes='{$notes}', apply_count='{$apply_count}', view_count='{$view_count}'  WHERE id ='{$cid}'";
        mysql_query($update);
    }

}

class uploadcv {

    public function fileupload($file_name) {

        //This is the directory where images will be saved
        $target_dir = "../cv/";
        $target_file = $target_dir . $file_name;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            //$msg = " Sorry, your file is too large ...";
            // header("Location:index.php?$msg");
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "jpg") {

            $msg = " Sorry, only Doc, PDF files are allowed ...";
            // header("Location:index.php?$msg");
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //$msg = " Sorry, your file was not uploaded.";
            // header("Location:index.php?$msg");
            // if everything is ok, try to upload file
        } else {

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $msg = "file Upload Sucsessfully";
                // header("Location:../views/apply.php?fname=$file_name");
            }
        }
        $msg = " Sorry, there was an error uploading your file..";
        //header("Location:index.php?$msg");
    }

}

?>