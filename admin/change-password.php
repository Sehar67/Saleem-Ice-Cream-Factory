<?php

include('../includes/config.php');
include('includes/header.php');


$admin_id = $_SESSION['admin_id'];


if(isset($_POST['change']))
{

$old = $_POST['old_password'];

$new = $_POST['new_password'];

$confirm = $_POST['confirm_password'];



$query = mysqli_query($conn,
"SELECT * FROM admin WHERE id='$admin_id'"
);


$admin = mysqli_fetch_assoc($query);



if($old == $admin['password'])
{


if($new == $confirm)
{


mysqli_query($conn,
"UPDATE admin SET password='$new' WHERE id='$admin_id'"
);


echo "
<script>
alert('Password Changed Successfully');
window.location='profile.php';
</script>
";


}
else
{

echo "
<script>
alert('New Password and Confirm Password not same');
</script>
";

}


}
else
{

echo "
<script>
alert('Old Password Incorrect');
</script>
";

}


}


?>


<div class="container py-4">


<h2 class="text-danger mb-4">
🔐 Change Password
</h2>



<div class="card shadow p-4 col-md-6">


<form method="POST">


<div class="mb-3">

<label>
Old Password
</label>

<input 
type="password"
name="old_password"
class="form-control"
required>

</div>



<div class="mb-3">

<label>
New Password
</label>

<input 
type="password"
name="new_password"
class="form-control"
required>

</div>



<div class="mb-3">

<label>
Confirm Password
</label>

<input 
type="password"
name="confirm_password"
class="form-control"
required>

</div>



<button 
name="change"
class="btn btn-success">

Update Password

</button>


</form>


</div>


</div>



<?php include('includes/footer.php'); ?>