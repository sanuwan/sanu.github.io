<?php require_once("../../config/config.php"); ?>

<?php
if(isset($_GET['add'])) {
    global $Connection;
    $add = $_GET['add'];
    $query = "SELECT * FROM product WHERE product_id='$add'";
    $Execute = mysqli_query($Connection,$query);
    while ($row = mysqli_fetch_array($Execute)) {
        if ($row['quantity'] != $_SESSION['product_' . $_GET['add']]) {
            $_SESSION['product_' . $_GET['add']] += 1;
            redirect("../checkout.php");
        } else {
            set_message("We only have " . $row['quantity'] . " " . "{$row['title']}" . " available");
            redirect("../checkout.php");
        }
    }

}

if(isset($_GET['remove'])) {
    $_SESSION['product_' . $_GET['remove']]--;
    if($_SESSION['product_' . $_GET['remove']] < 1) {
        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);
        redirect("../checkout.php");
    } else {
        redirect("../checkout.php");
    }
}

if(isset($_GET['delete'])) {
    $_SESSION['product_' . $_GET['delete']] = '0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    redirect("../checkout.php");
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
  <td><a class='btn btn-warning' href="action/cart.php?remove={$row['product_id']}"><span class='glyphicon glyphicon-minus'></span></a>   <a class='btn btn-success' href="action/cart.php?add={$row['product_id']}"><span class='glyphicon glyphicon-plus'></span></a>
<a class='btn btn-danger' href="action/cart.php?delete={$row['product_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>
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