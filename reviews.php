<?php

session_start();

include('includes/config.php');


if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}



if(isset($_POST['submit_review']))
{

$name = $_SESSION['user_name'];

$user_id = $_SESSION['user_id'];

$rating = $_POST['rating'];

$review = mysqli_real_escape_string($conn,$_POST['review']);



mysqli_query($conn,

"INSERT INTO reviews

(user_id,name,rating,review)

VALUES

('$user_id','$name','$rating','$review')"

);



echo "<script>

alert('Thank you for your review');

window.location='index.php';

</script>";

}



include('includes/header.php');

?>



<div class="container py-5">


<h2 class="text-center text-danger mb-5">

Give Your Review

</h2>



<div class="card shadow p-4">


<form method="POST">



<label>
Rating
</label>


<select name="rating" class="form-control mb-3">


<option value="5">
⭐⭐⭐⭐⭐
</option>


<option value="4">
⭐⭐⭐⭐
</option>


<option value="3">
⭐⭐⭐
</option>


<option value="2">
⭐⭐
</option>


<option value="1">
⭐
</option>


</select>




<label>
Your Review
</label>


<textarea
name="review"
class="form-control mb-3"
rows="5"
required></textarea>




<button
name="submit_review"
class="btn btn-danger">

Submit Review

</button>



</form>


</div>


</div>



<?php include('includes/footer.php'); ?>