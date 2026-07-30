<?php

session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

include('includes/config.php');

include('includes/header.php');


$email = $_SESSION['user_email'];

?>

<div class="container py-5">


<h2 class="text-center text-danger mb-5">

My Messages

</h2>



<?php


$query = mysqli_query($conn,

"SELECT * FROM contact_messages 
WHERE email='$email'
ORDER BY id DESC"

);



if(mysqli_num_rows($query)>0)

{


while($msg=mysqli_fetch_assoc($query))

{


?>


<div class="card shadow mb-4">


<div class="card-body">


<h5 class="text-danger">

Subject:

<?php echo $msg['subject']; ?>

</h5>



<p>

<strong>Your Message:</strong>

<br>

<?php echo $msg['message']; ?>

</p>



<hr>



<p>

<strong>Factory Reply:</strong>

<br>


<?php


if($msg['reply'] != "")
{

echo $msg['reply'];

}

else

{

echo "<span class='text-muted'>
No reply yet
</span>";

}


?>


</p>



</div>

</div>



<?php

}

}

else

{

echo "

<div class='alert alert-info text-center'>

You have not sent any messages.

</div>

";

}


?>


</div>


<?php include('includes/footer.php'); ?>