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
          <h1><i class="fa fa-pencil"></i> Posts</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto">
          <div class="input-group">

            </span>
          </div>
        </div>
      </div>
    </div>
  </section>
<div class="container"><?php echo SuccessMessagepost();?></div>
  <!-- POSTS -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>Latest Posts</h4>
            </div>
            <table class="table table-striped">
              <thead class="thead-inverse">
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Date</th>
                  <th>Creator</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>price</th>
                  <th>Quantity</th>
                    <th></th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
              <?php
              global $Connection;
              $ViewQuery="SELECT * FROM product";
              $Execute = mysqli_query($Connection,$ViewQuery);
              $count=0;
              while ($DataRows=mysqli_fetch_array($Execute)) {
              $Id = $DataRows["product_id"];
              $DateTime=$DataRows["datetime"];
              $Title = $DataRows["title"];
              $Category = $DataRows["category"];
              $Admin = $DataRows["author"];
              $Image = $DataRows["image"];
              $Post = $DataRows["description"];
              $price = $DataRows["price"];
              $quantity = $DataRows["quantity"];
              $count++;
              ?>
                <tr>
                  <td scope="row"><?php echo $count; ?></td>
                    <td><?php
                        if (strlen($Title)>20) {
                            $Title = substr($Title, 0,20).'..';
                        }
                        echo $Title;
                        ?>
                    </td>
                    <td><?php echo $DateTime; ?></td>
                    <td><?php
                        if (strlen($Admin)>6) {
                            $Admin = substr($Admin, 0,6).'..';
                        }
                        echo $Admin;
                        ?>
                    </td>
                    <td><?php echo $Category; ?></td>
                    <td><img src="../upload/<?php echo $Image; ?>" width="170" height="50px"></td>
                    <td><?php echo $price; ?></td>
                    <td><?php echo $quantity; ?></td>
                  <td><a href="details.php?id=<?php echo $Id; ?>" class="btn btn-secondary">
                    <i class="fa fa-angle-double-right"></i> Details
                  </a></td>
                  
                </tr>
                <?php } ?>
              </tbody>
            </table>

            <nav class="ml-4">
              <ul class="pagination">
                <li class="page-item disabled"><a href="#" class="page-link">Previous</a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>



<?php include("comman/footer.php"); ?>
</body>
</html>
