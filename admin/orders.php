<?php

include('../includes/config.php');

include('includes/header.php');

?>

<h2 class="mb-4">
    Customer Orders
</h2>


<table class="table table-bordered table-hover">

<thead class="table-danger">

<tr>

<th>Order ID</th>

<th>Customer</th>

<th>Phone</th>

<th>Address</th>

<th>Total</th>

<th>Status</th>

<th>Action</th>

</tr>

</thead>


<tbody>


<?php

$query = mysqli_query($conn,"SELECT * FROM orders ORDER BY id DESC");


while($order = mysqli_fetch_assoc($query))

{

?>


<tr>

<td>
#<?php echo $order['id']; ?>
</td>


<td>
<?php echo $order['customer_name']; ?>
</td>


<td>
<?php echo $order['phone']; ?>
</td>


<td>
<?php echo $order['address']; ?>
</td>


<td>
Rs. <?php echo $order['total']; ?>
</td>


<td>

<span class="badge bg-warning">

<?php echo $order['status']; ?>

</span>

</td>


<td>

<a href="update-order.php?id=<?php echo $order['id']; ?>"
class="btn btn-success btn-sm">

Update

</a>

</td>


</tr>


<?php

}

?>


</tbody>


</table>


<?php include('includes/footer.php'); ?>