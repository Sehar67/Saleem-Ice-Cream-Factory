<?php

session_start();

include('../includes/config.php');


// Admin check

if(!isset($_SESSION['admin_id']))
{
    header("Location: login.php");
    exit();
}



// Delete Review

if(isset($_GET['delete']))
{

$id = $_GET['delete'];


mysqli_query($conn,

"DELETE FROM reviews WHERE id='$id'"

);


echo "<script>

alert('Review Deleted');

window.location='reviews.php';

</script>";

}



include('includes/header.php');

?>


<div class="container py-5">


<h2 class="text-center text-danger mb-5">

Customer Reviews Management

</h2>



<table class="table table-bordered shadow">


<tr class="table-danger">

<th>ID</th>

<th>Customer Name</th>

<th>Rating</th>

<th>Review</th>

<th>Date</th>

<th>Action</th>

</tr>



<?php


$query=mysqli_query($conn,

"SELECT * FROM reviews ORDER BY id DESC"

);



while($review=mysqli_fetch_assoc($query))

{


?>


<tr>


<td>

<?php echo $review['id']; ?>

</td>



<td>

<?php echo $review['name']; ?>

</td>



<td>

<?php

echo str_repeat("⭐",$review['rating']);

?>

</td>



<td>

<?php echo $review['review']; ?>

</td>



<td>

<?php echo $review['created_at']; ?>

</td>



<td>


<a href="reviews.php?delete=<?php echo $review['id']; ?>"

onclick="return confirm('Delete this review?')"

class="btn btn-danger btn-sm">


Delete


</a>


</td>



</tr>



<?php

}

?>


</table>


</div>



<?php include('includes/footer.php'); ?>