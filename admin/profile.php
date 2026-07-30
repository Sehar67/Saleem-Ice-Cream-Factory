<?php

include('../includes/config.php');
include('includes/header.php');

$admin_id = $_SESSION['admin_id'];


$query = mysqli_query($conn,
"SELECT * FROM admin WHERE id='$admin_id'"
);


$admin = mysqli_fetch_assoc($query);


?>


<div class="container py-4">

<h2 class="text-danger mb-4">
    👤 Admin Profile
</h2>


<div class="card shadow p-4 col-md-6">


<div class="mb-3">

<label class="fw-bold">
Username
</label>

<input type="text"
class="form-control"
value="<?php echo $admin['username']; ?>"
readonly>

</div>



<div class="mb-3">

<label class="fw-bold">
Email
</label>

<input type="email"
class="form-control"
value="<?php echo $admin['email']; ?>"
readonly>

</div>



<div class="mb-3">

<label class="fw-bold">
Password
</label>

<input type="password"
class="form-control"
value="<?php echo $admin['password']; ?>"
readonly>

</div>


<a href="change-password.php" class="btn btn-warning">
🔐 Change Password
</a>

<a href="change-email.php" class="btn btn-info text-white">
📧 Change Email
</a>

<a href="dashboard.php" class="btn btn-danger">
Back Dashboard
</a>


</div>


</div>


<?php include('includes/footer.php'); ?>