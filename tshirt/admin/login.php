<?php require_once("../config/config.php");?>
<?php
if (isset($_POST["Submit"])) {
    $username= mysqli_real_escape_string($Connection, $_POST["username"]);
    $Password = mysqli_real_escape_string($Connection, $_POST["password"]);
    if (empty($username) || empty($Password)) {
        $_SESSION["ErrorMessage"] = "All Fields must  be filled out";
        redirect("index.php");
    } else {
        global $Connection;
        $sql = "SELECT password, admin_id FROM admin WHERE username = '".$username."' AND password ='".$Password."'";
        $result = mysqli_query($Connection,$sql);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $dbPassword = $row['password'];
            if($Password === $dbPassword){
                redirect("index.php");
                return true;
            }
            else{
                return false;
            }
        }else{
            return false;
        }

    }


}
?>
<!DOCTYPE html>
<html lang="en">
<?php include("comman/header.php"); ?>
<body>


  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>Midtown T Shirt</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">

      </div>
    </div>
  </section>

  <!-- LOGIN -->
  <section id="login">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-header">
              <h4>Account Login</h4>
            </div>
            <div class="card-body">
              <form action="login.php" method="post">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control"  name="password">
                </div>
                  <input class="btn btn-primary btn-block" type="Submit" name="Submit" value="Login">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <?php include("comman/footer.php"); ?>
</body>
</html>
