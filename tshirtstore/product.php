<?php require_once("../config/config.php");?>
<!DOCTYPE html>
<html lang="en">
<?php include("comman/header.php"); ?>
<body>
<?php include("comman/nav.php"); ?>


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
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <?php
                    global $Connection;
                    $productId = $_GET['id'];
                    $ViewQuery="SELECT * FROM product WHERE product_id=$productId";
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
               <div class="col-md-4">
                   <img src="../upload/<?php echo $Image; ?>" alt="..." class="img-thumbnail" style="width: 316px; height: 516px;">
               </div>
                <div class="col-md-8">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"> <a href="action/cart.php?add=<?php echo $Id; ?>"class="btn btn-danger btn-block">check out</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Title</th>
                            <td><?php echo $Title; ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Category</th>
                            <td><?php echo $Category; ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Quantity</th>
                            <td><?php echo $quantity; ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">Price</th>
                            <td><?php echo $price; ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">descrition</th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                    <p><?php echo $Post; ?></p>
                </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include("comman/footer.php"); ?>
</body>
</html>
