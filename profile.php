<?php

session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

include('includes/header.php');

?>


<div class="container py-5">

<div class="row">


<!-- Profile Card -->

<div class="col-md-4">

<div class="card shadow p-4 text-center">


<img src="images/profile.png" 
class="rounded-circle mb-3" 
width="150"
height="150">


<h3>
<?php echo $_SESSION['user_name']; ?>
</h3>


<p>
<?php echo $_SESSION['user_email']; ?>
</p>


<a href="order-history.php" class="btn btn-danger mt-3">

📦 My Orders

</a>

<a href="customer-messages.php" class="btn btn-primary mt-3">
📩 My Messages
</a>

</div>

</div>



<!-- Orders Section -->

<div class="col-md-8">


<div class="card shadow p-4">


<h3 class="text-danger">
Welcome <?php echo $_SESSION['user_name']; ?>
</h3>


<p>
Here you can check your profile and order history.
</p>



<a href="order-history.php" class="btn btn-outline-danger">

View Complete Order History

</a>


</div>


</div>


</div>

</div>


<?php include('includes/footer.php'); ?>