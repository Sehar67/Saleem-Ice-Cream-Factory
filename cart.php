<?php
include('includes/header.php');
?>

<div class="container py-5">

<h2 class="text-center text-danger mb-4">
Shopping Cart
</h2>

<?php

$total=0;

if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
{

?>

<table class="table table-bordered">

<thead class="table-danger">

<tr>

<th>Image</th>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Total</th>

</tr>

</thead>

<tbody>

<?php

foreach($_SESSION['cart'] as $item)
{

$subtotal=$item['price']*$item['quantity'];

$total+=$subtotal;

?>

<tr>

<td>
<img src="images/<?php echo $item['image']; ?>" width="80">
</td>

<td><?php echo $item['name']; ?></td>

<td>Rs. <?php echo $item['price']; ?></td>

<td><?php echo $item['quantity']; ?></td>

<td>Rs. <?php echo $subtotal; ?></td>

</tr>

<?php
}
?>

</tbody>

</table>

<div class="text-end">

<h3 class="text-danger">

Grand Total :
Rs. <?php echo $total; ?>

</h3>

<a href="checkout.php" class="btn btn-success">

Proceed To Checkout

</a>

</div>

<?php

}
else
{

echo "<div class='alert alert-warning text-center'>
Your cart is empty.
</div>";

}

?>

</div>

<?php include('includes/footer.php'); ?>