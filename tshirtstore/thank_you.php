<?php require_once("../config/config.php");?>
<?php

    $email = $_GET['email'];
    $validation = $_GET['code'];
    global $Connection;
    $sql = "UPDATE customer SET active = 1, validation_code = 0 WHERE email = '" . $email . "' AND validation_code ='" . $validation . "'";
    $Execute = mysqli_query($Connection, $sql);

?>

<h1 class="text-center"><a href="login.php" class="btn btn-primary">Login</a></h1>
