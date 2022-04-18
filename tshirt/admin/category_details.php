<?php require_once("../config/config.php");?>
<!DOCTYPE html>
<html lang="en">
<?php include("comman/header.php"); ?>
<body>
<?php include("comman/nav.php"); ?>

<header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1> Post One</h1>
            </div>
        </div>
    </div>
</header>

<!-- ACTIONS -->
<section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mr-auto">
                <a href="index.php" class="btn btn-light btn-block">
                    <i class="fa fa-arrow-left"></i> Back To Dashboard
                </a>
            </div>
            <div class="col-md-3">
                    <?php
                    global $Connection;
                    $SerachQueryParameter=$_GET['id'];
                    $ViewQuery="SELECT * FROM category WHERE cat_id='$SerachQueryParameter'";
                    $Execute = mysqli_query($Connection,$ViewQuery);
                    while ($DataRows=mysqli_fetch_array($Execute)) {
                        $Id = $DataRows["cat_id"];
                        $CategoryName = $DataRows["title"];
                        ?>
                    <form action="action/category_update.php?edit=<?php echo $Id; ?>" method="post">
                <input  class="btn btn-success btn-block" type="submit" name="update" value="Save Changes">

            </div>
            <div class="col-md-3">
                <input class="btn btn-danger btn-block" type="submit" name="delete" value="Delete">
            </div>
        </div>
    </div>
</section>

<!-- POSTS -->
<section id="posts">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Post</h4>
                    </div>
                    <div class="card-body">

                            <div class="form-group">

                                <label for="title">Title</label>
                                <input type="text" class="form-control" value="<?php echo $CategoryName ?>" name="category">
                                    <?php } ?>
                            </div>
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
<?php
/**
 * Created by PhpStorm.
 * User: madur
 * Date: 4/29/2018
 * Time: 1:18 PM
 */