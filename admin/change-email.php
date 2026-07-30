<?php

include('../includes/config.php');
include('includes/header.php');


$admin_id = $_SESSION['admin_id'];



$query = mysqli_query($conn,
"SELECT * FROM admin WHERE id='$admin_id'"
);


$admin = mysqli_fetch_assoc($query);



if(isset($_POST['change']))
{


$new_email = mysqli_real_escape_string(
$conn,
$_POST['email']
);



$check = mysqli_query($conn,
"SELECT * FROM admin WHERE email='$new_email' AND id!='$admin_id'"
);



if(mysqli_num_rows($check)>0)
{


echo "
<script>
alert('Email already exists');
</script>
";


}

else
{


mysqli_query($conn,
"UPDATE admin SET email='$new_email' WHERE id='$admin_id'"
);



$_SESSION['admin_email'] = $new_email;



echo "
<script>
alert('Email Updated Successfully');
window.location='profile.php';
</script>
";


}



}


?>



<div class="container py-4">


<h2 class="text-danger mb-4">
📧 Change Admin Email
</h2>



<div class="card shadow p-4 col-md-6">



<form method="POST">



<div class="mb-3">

<label class="fw-bold">
New Email
</label>


<input 
type="email"
name="email"
class="form-control"
value="<?php echo $admin['email']; ?>"
required>


</div>



<button 
name="change"
class="btn btn-success">

Update Email

</button>


<a href="profile.php" class="btn btn-danger">
Cancel
</a>



</form>



</div>


</div>



<?php include('includes/footer.php'); ?>