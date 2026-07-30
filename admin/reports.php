<?php

include('../includes/config.php');
include('includes/header.php');

/*
header.php already checks:
$_SESSION['admin_id']
So no need to call session_start() here.
*/

$totalSalesQuery = mysqli_query($conn, "SELECT SUM(total) AS total FROM orders");
$totalSalesData = mysqli_fetch_assoc($totalSalesQuery);

$totalSales = $totalSalesData['total'];
if (empty($totalSales)) {
    $totalSales = 0;
}

$totalOrders = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders"));
$totalCustomers = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));
$totalProducts = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products"));

$pendingOrders = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders WHERE status='Pending'"));
$preparingOrders = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders WHERE status='Preparing'"));
$deliveredOrders = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders WHERE status='Delivered'"));
$cancelledOrders = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders WHERE status='Cancelled'"));

?>

<div class="container py-4">

    <h2 class="text-danger mb-4">Sales Report</h2>

    <table class="table table-bordered table-striped">

        <tr>
            <th>Total Products</th>
            <td><?php echo $totalProducts; ?></td>
        </tr>

        <tr>
            <th>Total Customers</th>
            <td><?php echo $totalCustomers; ?></td>
        </tr>

        <tr>
            <th>Total Orders</th>
            <td><?php echo $totalOrders; ?></td>
        </tr>

        <tr>
            <th>Pending Orders</th>
            <td><?php echo $pendingOrders; ?></td>
        </tr>

        <tr>
            <th>Preparing Orders</th>
            <td><?php echo $preparingOrders; ?></td>
        </tr>

        <tr>
            <th>Delivered Orders</th>
            <td><?php echo $deliveredOrders; ?></td>
        </tr>

        <tr>
            <th>Cancelled Orders</th>
            <td><?php echo $cancelledOrders; ?></td>
        </tr>

        <tr class="table-success">
            <th>Total Sales</th>
            <td><strong>Rs. <?php echo number_format($totalSales, 2); ?></strong></td>
        </tr>

    </table>

</div>

<?php include('includes/footer.php'); ?>