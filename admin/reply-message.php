<?php

include('../includes/config.php');


if(isset($_POST['send_reply']))
{

$id = $_POST['id'];

$reply = mysqli_real_escape_string($conn,$_POST['reply']);


mysqli_query($conn,

"UPDATE contact_messages 
SET 
reply='$reply',
status='Replied'
WHERE id='$id'"

);


echo "<script>

alert('Reply Sent Successfully');

window.location='messages.php';

</script>";

}


$id=$_GET['id'];


$message = mysqli_fetch_assoc(

mysqli_query($conn,

"SELECT * FROM contact_messages WHERE id='$id'"

)

);


include('includes/header.php');

?>


<div class="container">


<h2>
Reply To Customer
</h2>


<div class="card p-4 shadow">


<p>
<strong>Name:</strong>

<?php echo $message['name']; ?>

</p>


<p>
<strong>Email:</strong>

<?php echo $message['email']; ?>

</p>


<p>
<strong>Message:</strong>

<?php echo $message['message']; ?>

</p>



<form method="POST">


<input type="hidden" name="id"
value="<?php echo $message['id']; ?>">



<label>
Your Reply
</label>


<textarea
name="reply"
class="form-control"
rows="5"
required></textarea>


<br>


<button
name="send_reply"
class="btn btn-success">

Send Reply

</button>


</form>


</div>


</div>


<?php include('includes/footer.php'); ?>