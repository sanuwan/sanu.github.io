<?php require_once("config/config.php");?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Midtown T Shirt</title>
<link rel="stylesheet" href="include/css/font-awesome.min.css">
<link rel="stylesheet" href="include/css/bootstrap.css">
<link rel="stylesheet" href="include/css/style.css">
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-primary p-0">
    <div class="container">

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item px-2">
                    <a href="index.php" class="nav-link active">Midtown T-Shirt</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="tshirtstore/checkout.php" class="nav-link">
                        checkout
                    </a>
                </li>
                <li class="nav-item">
                    <a href="tshirtstore/contact.php" class="nav-link">
                         contact
                    </a>
                </li>
                <li class="nav-item">
                    <a href="tshirtstore/logout.php" class="nav-link">
                        <i class="fa fa-user-times"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
    </div>
</nav>


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
            <?php
            global $Connection;
            $ViewQuery="SELECT * FROM product";
            $Execute = mysqli_query($Connection,$ViewQuery);
            $count=0;
            while ($DataRows=mysqli_fetch_array($Execute)) {
            $Id = $DataRows["product_id"];
            $Title = $DataRows["title"];
            $Image = $DataRows["image"];
            $count++;
            ?>
            <div class="col-md-3">
                <a href="tshirtstore/product.php?id=<?php echo $Id; ?>">
                <div class="card ">
                    <img class="card-img-top" src="upload/<?php echo $Image; ?>" style="height: 301.44px; width: 253px;"  alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $Title; ?></h5>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>

            <div class="col-md-3">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active">
                        Category
                    </button>
                    <?php
                    global $Connection;
                    $ViewQuery="SELECT * FROM category";
                    $Execute = mysqli_query($Connection,$ViewQuery);
                    $count=0;
                    while ($DataRows=mysqli_fetch_array($Execute)) {
                    $Id = $DataRows["cat_id"];
                    $Title = $DataRows["title"];

                    ?>
                    <button type="button" class="list-group-item list-group-item-action"><?php echo $Title; ?></button>
                    <?php } ?>
                </div>
            </div>
        </div>

        <nav class="mt-3">
            <ul class="pagination">
                <li class="page-item disabled"><a href="#" class="page-link">Previous</a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
            </ul>
        </nav>
    </div>
</section>



<script src="include/js/jquery.min.js"></script>
<script src="include/js/popper.min.js"></script>
<script src="include/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
</body>
</html>
