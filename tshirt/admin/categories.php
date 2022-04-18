<?php require_once("../config/config.php");?>
<!DOCTYPE html>
<html lang="en">
<?php include("comman/header.php"); ?>
<body>
<?php include("comman/nav.php"); ?>

  <header id="main-header" class="py-2 bg-success text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1><i class="fa fa-pencil"></i>  Categories</h1>
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

<div class="container"><?php echo SuccessMessage();?></div>


  <!-- CATEGORIES -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>Latest Categories</h4>
            </div>
            <table class="table table-striped">
              <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Date Posted</th>
                    <th>Title</th>
                    <th>Creator Name</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php
              global $Connection;
              $ViewQuery="SELECT * FROM category";
              $Execute = mysqli_query($Connection,$ViewQuery);
              $Count=0;
              while ($DataRows=mysqli_fetch_array($Execute)) {
              $Id = $DataRows["cat_id"];
              $DateTime=$DataRows["datetime"];
              $CategoryName = $DataRows["title"];
              $CreatorName=$DataRows["creatorname"];
              $Count++;
              ?>
                <tr>
                    <td><?php echo $Count; ?></td>
                    <td><?php echo $DateTime; ?></td>
                    <td><?php echo $CategoryName; ?></td>
                    <td><?php echo $CreatorName; ?></td>
                    <td>
                        <a href="category_details.php?id=<?php echo $Id; ?>" class="btn btn-secondary">
                            <i class="fa fa-angle-double-right"></i> Details
                        </a>
                    </td>
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
