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

            $QueryParameter = $_GET['id'];
            global $Connection;
            $ViewQuery="SELECT * FROM product WHERE product_id='$QueryParameter'";
            $Execute = mysqli_query($Connection,$ViewQuery);

            while ($DataRows=mysqli_fetch_array($Execute)) {
                $Idp = $DataRows["product_id"];
                $TitleUpdated = $DataRows["title"];
                $CategoryUpdated = $DataRows["category"];
                $Price = $DataRows["price"];
                $quantity = $DataRows["quantity"];
                $ImageUpdated = $DataRows["image"];
                $Description = $DataRows["description"];
            }
            ?>
            <form action="action/product_update.php?edit=<?php echo $Idp; ?>" method="post" enctype="multipart/form-data">
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
                <div>

                        <fieldset>
                            <div class="form-group">
                                <label for="title"><span class="FieldInfo">Title:</span></label>
                                <input value="<?php echo $TitleUpdated; ?>" class="form-control" type="text" name="title" id="title" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <span class="FieldInfo">Existing Category:</span>
                                <?php echo $CategoryUpdated; ?>
                                <br>
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
                                <input value="<?php echo $Price; ?>" class="form-control" type="number" name="price" id="title" placeholder="Price">
                            </div>
                            <div class="form-group">
                                <label for="title"><span class="FieldInfo">Quantity:</span></label>
                                <input value="<?php echo $quantity; ?>" class="form-control" type="number" name="quantity" id="title" placeholder="Quantity">
                            </div>
                            <div class="form-group">
                                <span class="FieldInfo">Existing Image:</span>
                                <img src="../upload/<?php echo $ImageUpdated;?>" type="File" name="Image" id="imageselect" width=170px height=70px >
                                <br>
                                <label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
                                <input type="File" class="form-control" name="image" id="imageselect">
                            </div>
                            <div class="form-group">
                                <label for="postarea"><span class="FieldInfo">Description:</span></label>
                                <textarea  class="form-control" name="description" id="postarea"><?php echo $Description; ?></textarea>
                            </div>
                            <br>

                        </fieldset>
                        <br>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




<?php include("comman/footer.php"); ?>
</body>
</html>
