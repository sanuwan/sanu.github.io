<?php require_once("../config/config.php");?>
<?php
function query($query){
    global $Connection;
    return mysqli_query($Connection, $query);
}

function confirm($result){
    global $Connection;
    if(!$result){
        die("QUERT FAILED".mysqli_error($Connection));
    }
}

// Gets data from URL parameters.
$name = $_GET['name'];
$address = $_GET['address'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$type = $_GET['type'];

$query = query("INSERT INTO markers(name,address,lat,lng,type) VALUES('{$name}','{$address}','{$lat}','{$lng}','{$type}')");
confirm($query);

?>