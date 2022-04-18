<?php require_once("../config/config.php");?>
<?php

$dataPoints = array(
	array("y" => 10, "label" => "Germany" ),
	array("y" => 12, "label" => "France" ),
	array("y" => 34, "label" => "China" ),
	array("y" => 30, "label" => "Russia" ),
	array("y" => 12, "label" => "Switzerland" ),
	array("y" => 23, "label" => "Japan" ),
	array("y" => 6, "label" => "Netherlands" )
);
?>
<!DOCTYPE html>
<html lang="en">
<?php include("comman/header.php"); ?>
<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Gold Reserves"
            },
            axisY: {
                title: "Gold Reserves (in tonnes)"
            },
            data: [{
                type: "column",
                yValueFormatString: "#,##0.## tonnes",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
</script>
<body>
<?php include("comman/nav.php"); ?>

  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1><i class="fa fa-gear"></i> Dashboard</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addPostModal">
            <i class="fa fa-plus"></i> Add Post
          </a>
        </div>
        <div class="col-md-3">
          <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#addCategoryModal">
            <i class="fa fa-plus"></i> Add Category
          </a>
        </div>
        <div class="col-md-3">
          <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#addUserModal">
            <i class="fa fa-plus"></i> Add User
          </a>
        </div>
      </div>
    </div>
  </section>
<div class="container"><?php echo Message();?></div>

  <!-- POSTS -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <h4>Latest Posts</h4>
            </div>
              <div id="chartContainer" style="height: 504.2px; width: 690px;"></div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-center bg-primary text-white mb-3">
            <div class="card-body">
              <h3>Posts</h3>
              <h1 class="display-4">
                <i class="fa fa-pencil"></i>
              </h1>
              <a href="posts.php" class="btn btn-outline-light btn-sm">View</a>
            </div>
          </div>

          <div class="card text-center bg-success text-white mb-3">
            <div class="card-body">
              <h3>Categories</h3>
              <h1 class="display-4">
                <i class="fa fa-folder-open-o"></i>
              </h1>
              <a href="categories.php" class="btn btn-outline-light btn-sm">View</a>
            </div>
          </div>

          <div class="card text-center bg-warning text-white mb-3">
            <div class="card-body">
              <h3>Users</h3>
              <h1 class="display-4">
                <i class="fa fa-users"></i>
              </h1>
              <a href="users.php" class="btn btn-outline-light btn-sm">View</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- POST MODAL -->
  <div class="modal fade" id="addPostModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Add Post</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
            <div>
                <form action="action/product.php" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                            <label for="title"><span class="FieldInfo">Title:</span></label>
                            <input class="form-control" type="text" name="title" id="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="categoryselect"><span class="FieldInfo">Category:</span></label>
                            <select class="form-control" id="categoryselect" name="category">
                                <?php
                                global $Connection;
                                $ViewQuery="SELECT * FROM category";
                                $Execute = mysqli_query($Connection,$ViewQuery);
                                while ($DataRows=mysqli_fetch_array($Execute)) {
                                    $Id = $DataRows["cat_id"];
                                    $CategoryName = $DataRows["title"];

                                    ?>
                                    <option><?php echo $CategoryName ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title"><span class="FieldInfo">Price:</span></label>
                            <input class="form-control" type="number" name="price" id="title" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label for="title"><span class="FieldInfo">Quantity:</span></label>
                            <input class="form-control" type="number" name="quantity" id="title" placeholder="Quantity">
                        </div>
                        <div class="form-group">
                            <label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
                            <input type="File" class="form-control" name="image" id="imageselect">
                        </div>
                        <div class="form-group">
                            <label for="postarea"><span class="FieldInfo">Description:</span></label>
                            <textarea  class="form-control" name="description" id="postarea"></textarea>
                        </div>
                        <br>
                        <input class="btn btn-primary btn-block"  type="submit" name="product" value="Add New Product">
                    </fieldset>
                    <br>
                </form>
            </div>
        </div>

      </div>
    </div>
  </div>


  <!-- CATEGORY MODAL -->
<div class="modal fade" id="addCategoryModal">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Add Category</h5>
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="action/category.php" method="post">
                        <fieldset>
                            <div class="form-group">
                                <label for="Categoryname"><span class="FieldInfo">Name:</span></label>
                                <input class="form-control" type="text" name="category" id="Categoryname" placeholder="Name">
                            </div>
                            <br>
                            <input class="btn btn-success btn-block" type="Submit" name="add_category" value="Add New Category">
                        </fieldset>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- USER MODAL -->
  <div class="modal fade" id="addUserModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title">Add User</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
            <div>
                <form action="action/user.php" method="post">
                    <fieldset>
                        <div class="form-group">
                            <label for="Username"><span class="FieldInfo">UserName:</span></label>
                            <input class="form-control" type="text" name="username" id="Username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="Password"><span class="FieldInfo">Password:</span></label>
                            <input class="form-control" type="password" name="password" id="Password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="ConfirmPassword"><span class="FieldInfo">Confirm Password:</span></label>
                            <input class="form-control" type="password" name="confirmpassword" id="ConfirmPassword" placeholder="Retype same Password">
                        </div>
                        <br>
                        <input class="btn btn-warning btn-block" type="submit" name="admin" value="Add New Admin">
                    </fieldset>
                    <br>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php include("comman/footer.php"); ?>
</body>
</html>
