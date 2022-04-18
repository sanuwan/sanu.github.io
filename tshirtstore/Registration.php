<!DOCTYPE html>
<html lang="en">
<?php include("comman/header.php"); ?>
<body>
<header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1><i class="fa fa-user"></i> </h1>
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
<section id="product">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Registration</h4>
                    </div>
                    <div class="card-body">
                        <form action="action/Registration.php" method="post">
                            <div class="form-group">
                                <label for="username">username</label>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="text" class="form-control" name="email">
                                <label for="password">password</label>
                                <input type="password" class="form-control" name="password">
                                <label for="password">confirm password</label>
                                <input type="password" class="form-control" name="confirmpassword">

                            </div>
                            <input type="submit" class="btn btn-primary btn-block" value="Login" name="user">
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
