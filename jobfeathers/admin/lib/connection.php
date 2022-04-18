<?php

error_reporting(1);

//create a class for make connection
class createConnection {

    var $host = "localhost";
    var $username = "root";    // specify the sever details for mysql
    Var $password = "";
    var $database = "jobfeathers";
    var $myconn;

    function connectToDatabase() { // create a function for connect database

        $conn = mysql_connect($this->host, $this->username, $this->password);

        if (!$conn) {// testing the connection
            die("Cannot connect to the database");
        } else {
            $this->myconn = $conn;

            //echo "Connection established";
        }
        return $this->myconn;
    }

    function selectDatabase() { // selecting the database.
        mysql_select_db($this->database);  //use php inbuild functions for select database
        if (mysql_error()) { // if error occured display the error message
            echo mysql_error();
            //	echo "Cannot find the database ".$this->database;
        } else {
            //echo "Database selected..";     
        }
    }

}
