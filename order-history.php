<?php

session_start();

include('includes/config.php');


if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}


include('includes/header.php');


$user_id = $_SESSION['user_id'];

?>

<div class="container py-5">

<h2 class="text-center text-danger mb-5">
My Order History
</h2>


<?php


$query = mysqli_query($conn,

"SELECT * FROM orders 
WHERE user_id='$user_id'
ORDER BY id DESC"

);



if(mysqli_num_rows($query)>0)

{


while($order=mysqli_fetch_assoc($query))

{


?>


<div class="card shadow mb-4">


<div class="card-body">


<h4>
Order #<?php echo $order['id']; ?>
</h4>


<p>
<strong>Date:</strong>

<?php echo $order['created_at']; ?>

</p>


<p>
<strong>Total:</strong>

Rs. <?php echo $order['total']; ?>

</p>


<p>
<strong>Status:</strong>

<span class="badge bg-warning">

<?php echo $order['status']; ?>

</span>

</p>


<h5>
Products:
</h5>



<ul>


<?php


$order_id=$order['id'];


$items=mysqli_query($conn,

"SELECT order_items.*, products.product_name

FROM order_items

INNER JOIN products

ON order_items.product_id=products.id

WHERE order_id='$order_id'"

);



while($item=mysqli_fetch_assoc($items))

{


?>


<li>

<?php echo $item['product_name']; ?>

-

Quantity:
<?php echo $item['quantity']; ?>

</li>


<?php

}

?>


</ul>


</div>


</div>


<?php


}


}

else

{


echo "

<div class='alert alert-info text-center'>

You have not placed any orders yet.

</div>

";


}


?>


</div>


<?php include('includes/footer.php'); ?>