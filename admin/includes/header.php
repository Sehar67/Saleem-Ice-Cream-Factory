<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin_id'])) {
    $_SESSION['redirect_page'] = basename($_SERVER['PHP_SELF']);
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Ice Cream Factory - Admin Panel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

body{
    background:#f8f9fa;
    margin:0;
    padding:0;
}

.sidebar{
    width:250px;
    min-height:100vh;
    background:#dc3545;
    position:fixed;
    left:0;
    top:0;
}

.sidebar h3{
    color:#fff;
    text-align:center;
    padding:20px 0;
    margin:0;
}

.sidebar hr{
    color:#fff;
}

.sidebar a{
    display:block;
    color:#fff;
    text-decoration:none;
    padding:15px 20px;
    font-weight:bold;
    transition:.3s;
}

.sidebar a:hover{
    background:#fff;
    color:#dc3545;
}

.main-content{
    margin-left:250px;
    padding:25px;
}

.topbar{
    background:#fff;
    padding:15px 20px;
    border-radius:10px;
    box-shadow:0 2px 10px rgba(0,0,0,.1);
    margin-bottom:25px;
}

</style>

</head>

<body>

<div class="sidebar">

    <h3>🍦 Admin Panel</h3>

    <hr>

    <a href="dashboard.php">
        <i class="fas fa-home"></i> Dashboard
    </a>

    <a href="products.php">
        <i class="fas fa-ice-cream"></i> Products
    </a>

    <a href="orders.php">
        <i class="fas fa-shopping-cart"></i> Orders
    </a>

    <a href="customers.php">
        <i class="fas fa-users"></i> Customers
    </a>

    <a href="messages.php">
        <i class="fas fa-envelope"></i> Messages
    </a>

    <a href="reviews.php">
        <i class="fas fa-star"></i> Reviews
    </a>

    <a href="reports.php">
        <i class="fas fa-chart-bar"></i> Reports
    </a>

    <a href="profile.php">
    <i class="fas fa-user"></i> My Profile
</a>

    <a href="logout.php">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>

</div>

<div class="main-content">

<div class="topbar d-flex justify-content-between align-items-center">

    <h4 class="mb-0">
        Welcome,
        <?php echo $_SESSION['admin_name']; ?>
    </h4>

    <span class="badge bg-success p-2">
        Logged In
    </span>

</div>