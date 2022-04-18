<?php require_once("../config/config.php");?>
<?php
if(isset($_GET['add'])) {
    global $Connection;
    $add = $_GET['add'];
    $query = "SELECT * FROM product WHERE product_id='$add'";
    $Execute = mysqli_query($Connection,$query);
    while ($row = mysqli_fetch_array($Execute)) {
        if ($row['quantity'] != $_SESSION['product_' . $_GET['add']]) {
            $_SESSION['product_' . $_GET['add']] += 1;
            redirect("checkout.php");
        } else {
            set_message("We only have " . $row['quantity'] . " " . "{$row['title']}" . " available");
            redirect("checkout.php");
        }
    }

}

if(isset($_GET['remove'])) {
    $_SESSION['product_' . $_GET['remove']]--;
    if($_SESSION['product_' . $_GET['remove']] < 1) {
        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);
        redirect("checkout.php");
    } else {
        redirect("checkout.php");
    }
}

if(isset($_GET['delete'])) {
    $_SESSION['product_' . $_GET['delete']] = '0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    redirect("checkout.php");
}


function cart() {
    $total = 0;
    $item_quantity = 0;
    $item_name = 1;
    $item_number =1;
    $amount = 1;
    $quantity =1;
    foreach ($_SESSION as $name => $value) {
        if($value > 0 ) {
            if(substr($name, 0, 8 ) == "product_") {
                $length = strlen($name);
                $id = substr($name, 8 , $length);
                global $Connection;
                $query = "SELECT * FROM product WHERE product_id ='$id'";
                $Execute = mysqli_query($Connection,$query);
                while($row = mysqli_fetch_array($Execute)) {
                    $sub = $row['price']*$value;
                    $item_quantity +=$value;
                    $product_image = $row['image'];
                    $product = <<<DELIMETER

<tr>
  <td>{$row['title']}<br></td>
  <td>
  <img width='100' src='../upload/$product_image'>

  </td>
  <td>&#36;{$row['price']}</td>
  <td>{$value}</td>
  <td>&#36;{$sub}</td>
  <td><a class='btn btn-warning' href="checkout.php?remove={$row['product_id']}"></a>   <a class='btn btn-success' href="checkout.php?add={$row['product_id']}"><span class='glyphicon glyphicon-plus'></span></a>
<a class='btn btn-danger' href="checkout.php?delete={$row['product_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>
  </tr>

<input type="hidden" name="item_name_{$item_name}" value="{$row['title']}">
<input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
<input type="hidden" name="amount_{$amount}" value="{$row['price']}">
<input type="hidden" name="quantity_{$quantity}" value="{$value}">


DELIMETER;

                    echo $product;
                    $item_name++;
                    $item_number++;
                    $amount++;
                    $quantity++;
                    $_SESSION['item_total'] = $total += $sub;
                    $_SESSION['item_quantity'] = $item_quantity;
                }
            }
        }
    }
}

function show_paypal() {
    if(isset($_SESSION['item_quantity']) && $_SESSION['item_quantity'] >= 1) {
        $paypal_button = <<<DELIMETER
    <input type="image" name="upload" border="0"
src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
alt="PayPal - The safer, easier way to pay online">
DELIMETER;
        return $paypal_button;
    }
}
?>
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

<div class="container">


    <!-- /.row -->

    <div class="row">
        <h4 class="text-center bg-danger"><?php display_message(); ?></h4>


        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="business" value="mad@codingfaculty.com">
            <input type="hidden" name="currency_code" value="US">
            <table class="table table-striped">
                <thead class="thead-inverse">
                <tr>
                    <th>Product</th>
                    <th></th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub-total</th>
                    <th></th>

                </tr>
                </thead>
                <tbody>


                <?php cart(); ?>

                </tbody>
            </table>


            <?php echo show_paypal(); ?>

        </form>



        <!--  ***********CART TOTALS*************-->

        <div class="col-md-4 pull-right ">
            <h2>Cart Totals</h2>

            <table class="table table-bordered" cellspacing="0">

                <tr class="cart-subtotal">
                    <th>Items:</th>
                    <td><span class="amount"><?php
                            echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0";?></span></td>
                </tr>
                <tr class="shipping">
                    <th>Shipping and Handling</th>
                    <td>Free Shipping</td>
                </tr>

                <tr class="order-total">
                    <th>Order Total</th>
                    <td><strong><span class="amount">&#36;<?php
                                echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0";?>



</span></strong> </td>
                </tr>


                </tbody>

            </table>

        </div><!-- CART TOTALS-->


    </div><!--Main Content-->


</div>



<?php include("comman/footer.php"); ?>
</body>
</html>
