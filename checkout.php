<?php
session_start();
include('includes/config.php');

if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0)
{
    header("Location: cart.php");
    exit();
}

if(isset($_POST['place_order']))
{

$name = mysqli_real_escape_string($conn,$_POST['name']);
$phone = mysqli_real_escape_string($conn,$_POST['phone']);
$address = mysqli_real_escape_string($conn,$_POST['address']);

$total=0;

foreach($_SESSION['cart'] as $item)
{
    $total += $item['price'] * $item['quantity'];
}

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;

mysqli_query($conn,"INSERT INTO orders(user_id,customer_name,phone,address,total)
VALUES('$user_id','$name','$phone','$address','$total')");

$order_id = mysqli_insert_id($conn);

foreach($_SESSION['cart'] as $item)
{

$product_id=$item['id'];
$price=$item['price'];
$qty=$item['quantity'];

mysqli_query($conn,"INSERT INTO order_items(order_id,product_id,quantity,price)
VALUES('$order_id','$product_id','$qty','$price')");

}

unset($_SESSION['cart']);

header("Location: order-success.php");
exit();

}

include('includes/header.php');
?>

<div class="container py-5">

<h2 class="text-center text-danger mb-4">
Checkout
</h2>

<form method="POST">

<div class="mb-3">

<label>Customer Name</label>

<input
type="text"
name="name"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Phone Number</label>

<input
type="text"
name="phone"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Delivery Address</label>

<textarea
name="address"
class="form-control"
rows="4"
required></textarea>

</div>

<button
type="submit"
name="place_order"
class="btn btn-success w-100">

Place Order

</button>

</form>

</div>

<?php include('includes/footer.php'); ?>