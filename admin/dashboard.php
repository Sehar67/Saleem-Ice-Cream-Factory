<?php
session_start();

if(!isset($_SESSION['admin_id']))
{
    header("Location: login.php");
    exit();
}

include('../includes/config.php');

$productCount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM products"));
$orderCount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM orders"));
$customerCount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users"));

$sales = mysqli_query($conn,"SELECT SUM(total) AS total FROM orders");
$salesData = mysqli_fetch_assoc($sales);
$totalSales = $salesData['total'];

if(empty($totalSales))
{
    $totalSales = 0;
}

include('includes/header.php');
?>

<div class="container py-4">

<h2 class="text-danger mb-3">
Welcome Admin
</h2>

<a href="dashboard.php" class="btn btn-outline-danger mb-4">
🔄 Refresh Dashboard
</a>

<div class="row g-4">

<div class="col-md-3">

<div class="card bg-primary text-white shadow p-4">

<h3><?php echo $productCount; ?></h3>

<p>Total Products</p>

<a href="products.php" class="btn btn-light">
Manage Products
</a>

</div>

</div>

<div class="col-md-3">

<div class="card bg-success text-white shadow p-4">

<h3><?php echo $orderCount; ?></h3>

<p>Total Orders</p>

<a href="orders.php" class="btn btn-light">
Manage Orders
</a>

</div>

</div>

<div class="col-md-3">

<div class="card bg-warning text-dark shadow p-4">

<h3><?php echo $customerCount; ?></h3>

<p>Total Customers</p>

<a href="customers.php" class="btn btn-dark">
View Customers
</a>

</div>

</div>

<div class="col-md-3">

<div class="card bg-danger text-white shadow p-4">

<h3>Rs. <?php echo number_format($totalSales,2); ?></h3>

<p>Total Sales</p>

<a href="orders.php" class="btn btn-light">
View Sales
</a>

</div>

</div>

</div>

<hr class="my-5">

<h3 class="text-danger">
Recent Orders
</h3>

<?php

$recentOrders=mysqli_query($conn,"
SELECT *
FROM orders
ORDER BY created_at DESC
LIMIT 5
");

?>

<table class="table table-bordered table-hover">

<tr class="table-dark">

<th>ID</th>
<th>Customer</th>
<th>Total</th>
<th>Status</th>
<th>Date</th>

</tr>

<?php while($order=mysqli_fetch_assoc($recentOrders)){ ?>

<tr>

<td>#<?php echo $order['id']; ?></td>

<td><?php echo $order['customer_name']; ?></td>

<td>Rs. <?php echo number_format($order['total'],2); ?></td>

<td>

<?php

if($order['status']=="Pending")
echo "<span class='badge bg-warning'>Pending</span>";

elseif($order['status']=="Preparing")
echo "<span class='badge bg-primary'>Preparing</span>";

elseif($order['status']=="Delivered")
echo "<span class='badge bg-success'>Delivered</span>";

else
echo "<span class='badge bg-danger'>Cancelled</span>";

?>

</td>

<td><?php echo date("d M Y",strtotime($order['created_at'])); ?></td>

</tr>

<?php } ?>

</table>

<hr class="my-5">

<h3 class="text-danger">
Recent Customer Messages
</h3>

<?php

$messages=mysqli_query($conn,"
SELECT *
FROM contact_messages
ORDER BY id DESC
LIMIT 5
");

?>

<table class="table table-bordered table-hover">

<tr class="table-dark">

<th>ID</th>
<th>Name</th>
<th>Subject</th>
<th>Status</th>
<th>Action</th>

</tr>

<?php while($msg=mysqli_fetch_assoc($messages)){ ?>

<tr>

<td><?php echo $msg['id']; ?></td>

<td><?php echo $msg['name']; ?></td>

<td><?php echo $msg['subject']; ?></td>

<td>

<?php

if(empty($msg['admin_reply']))
echo "<span class='badge bg-danger'>Pending</span>";

else
echo "<span class='badge bg-success'>Replied</span>";

?>

</td>

<td>

<a href="reply-message.php?id=<?php echo $msg['id']; ?>" class="btn btn-sm btn-primary">

Reply

</a>

</td>

</tr>

<?php } ?>

</table>

<div class="text-end">

<a href="messages.php" class="btn btn-primary">

View All Messages

</a>

</div>

<hr class="my-5">

<h3 class="text-danger">
Latest Registered Customers
</h3>

<?php

$customers=mysqli_query($conn,"
SELECT *
FROM users
ORDER BY id DESC
LIMIT 5
");

?>

<table class="table table-bordered table-hover">

<tr class="table-dark">

<th>ID</th>
<th>Name</th>
<th>Email</th>

</tr>

<?php while($user=mysqli_fetch_assoc($customers)){ ?>

<tr>

<td><?php echo $user['id']; ?></td>

<td><?php echo $user['full_name']; ?></td>

<td><?php echo $user['email']; ?></td>

</tr>

<?php } ?>

</table>

<div class="text-end">

<a href="customers.php" class="btn btn-success">

View All Customers

</a>

</div>

<hr class="my-5">

<h3 class="text-danger">
Latest Reviews
</h3>

<?php

$reviews=mysqli_query($conn,"
SELECT reviews.*,users.full_name
FROM reviews
LEFT JOIN users
ON reviews.user_id=users.id
ORDER BY reviews.id DESC
LIMIT 5
");

?>

<table class="table table-bordered table-hover">

<tr class="table-dark">

<th>Customer</th>
<th>Rating</th>
<th>Review</th>

</tr>

<?php while($review=mysqli_fetch_assoc($reviews)){ ?>

<tr>

<td><?php echo $review['full_name']; ?></td>

<td>

<?php

for($i=1;$i<=5;$i++)
{
    if($i<=$review['rating'])
        echo "⭐";
    else
        echo "☆";
}

?>

</td>

<td><?php echo $review['review']; ?></td>

</tr>

<?php } ?>

</table>

<div class="text-end">

<a href="reviews.php" class="btn btn-warning">

View All Reviews

</a>

</div>

<hr class="my-5">

<div class="row">

<div class="col-md-4">

<div class="card shadow text-center p-4">

<h4><?php echo $productCount; ?></h4>

<p>Total Products</p>

</div>

</div>

<div class="col-md-4">

<div class="card shadow text-center p-4">

<h4><?php echo $orderCount; ?></h4>

<p>Total Orders</p>

</div>

</div>

<div class="col-md-4">

<div class="card shadow text-center p-4">

<h4><?php echo $customerCount; ?></h4>

<p>Registered Customers</p>

</div>

</div>

</div>

<hr class="my-5">

<h3 class="text-danger">
Admin Management
</h3>

<div class="row g-3">

<div class="col-md-3">
<a href="products.php" class="btn btn-primary w-100 p-3">🍦 Products</a>
</div>

<div class="col-md-3">
<a href="orders.php" class="btn btn-success w-100 p-3">📦 Orders</a>
</div>

<div class="col-md-3">
<a href="messages.php" class="btn btn-info w-100 p-3">💬 Messages</a>
</div>

<div class="col-md-3">
<a href="reviews.php" class="btn btn-warning w-100 p-3">⭐ Reviews</a>
</div>

<div class="col-md-3">
    <a href="reports.php" class="btn btn-dark w-100 p-3">📊 Reports</a>
</div>

</div>

</div>

<?php include('includes/footer.php'); ?>