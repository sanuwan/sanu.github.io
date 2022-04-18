<?php require_once("../config/config.php");?>
<!DOCTYPE html>
<html lang="en">
<?php include("comman/header.php"); ?>
<body>
<?php include("comman/nav.php"); ?>

  <header id="main-header" class="py-2 bg-warning text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1><i class="fa fa-users"></i> Users</h1>
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

          </div>
        </div>
      </div>
    </div>
  </section>

<div class="container"><?php echo SuccessMessage();?></div>
  <!-- USERS -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>Latest Users</h4>
            </div>
            <table class="table table-striped">
              <thead class="thead-inverse">
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Email</th>
                    <th>Added By</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
              global $Connection;
              $ViewQuery="SELECT * FROM admin";
              $Execute = mysqli_query($Connection,$ViewQuery);
              $Count=0;
              while ($DataRows=mysqli_fetch_array($Execute)) {
                  $Id = $DataRows["admin_id"];
                  $DateTime=$DataRows["datetime"];
                  $Username = $DataRows["username"];
                  $Admin=$DataRows["addedby"];
                  $Count++;
                  ?>
                  <tr>
                      <td><?php echo $Count; ?></td>
                      <td><?php echo $DateTime; ?></td>
                      <td><?php echo $Username; ?></td>
                      <td><?php echo $Admin; ?></td>
                      <td>
                          <a href="action/user_update.php?delete=<?php echo $Id;?>">
                              <span class="btn btn-danger">Delete</span>
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
