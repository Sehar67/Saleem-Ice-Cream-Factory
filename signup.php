<?php

include('includes/config.php');

if(isset($_POST['register']))
{

$name = mysqli_real_escape_string($conn,$_POST['name']);

$email = mysqli_real_escape_string($conn,$_POST['email']);

$phone = mysqli_real_escape_string($conn,$_POST['phone']);

$password = password_hash($_POST['password'],PASSWORD_DEFAULT);

$sql="INSERT INTO users(full_name,email,phone,password)
VALUES('$name','$email','$phone','$password')";

if(mysqli_query($conn,$sql))
{

echo "<script>
alert('Registration Successful');
window.location='login.php';
</script>";

}
else{

echo "<script>alert('Email already exists');</script>";

}

}

?>

<?php include('includes/header.php'); ?>

<section class="bg-danger text-white py-5">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Create Account</h1>
        <p class="lead">Register to start ordering</p>
    </div>
</section>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-6">

<div class="card shadow p-4">

<h2 class="text-center text-danger mb-4">
Customer Registration
</h2>

<form method="POST">

<div class="mb-3">

<label>Full Name</label>

<input
type="text"
name="name"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Phone Number</label>

<input
type="text"
name="Phone Number"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Confirm Password</label>

<input
type="password"
class="form-control"
placeholder="Confirm Password">

</div>

<button
type="submit"
name="register"
class="btn btn-danger w-100">

Create Account

</button>

</form>

<hr>

<p class="text-center">

Already have an account?

<a href="login.php">

Login Here

</a>

</p>

</div>

</div>

</div>

</div>

<?php include('includes/footer.php'); ?>