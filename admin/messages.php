<?php

include('../includes/config.php');

include('includes/header.php');

?>


<h2 class="mb-4">
Customer Messages
</h2>



<table class="table table-bordered table-hover">


<thead class="table-danger">

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Phone</th>

<th>Subject</th>

<th>Message</th>

<th>Date</th>

<th>Action</th>

<th>Status</th>

</tr>

</thead>



<tbody>


<?php


$query = mysqli_query($conn,

"SELECT * FROM contact_messages ORDER BY id DESC"

);



while($message = mysqli_fetch_assoc($query))

{


?>


<tr>


<td>
<?php echo $message['id']; ?>
</td>


<td>
<?php echo $message['name']; ?>
</td>


<td>
<?php echo $message['email']; ?>
</td>


<td>
<?php echo $message['phone']; ?>
</td>


<td>
<?php echo $message['subject']; ?>
</td>


<td>
<?php echo $message['message']; ?>
</td>


<td>
<?php echo $message['created_at']; ?>
</td>

<td>

<?php

if($message['status']=="Replied")

{

?>

<button class="btn btn-secondary btn-sm" disabled>

Reply Sent ✅

</button>


<?php

}

else

{

?>

<a href="reply-message.php?id=<?php echo $message['id']; ?>"
class="btn btn-success btn-sm">

Reply

</a>


<?php

}

?>

</td>

<td>

<?php

if($message['status']=="Replied")
{

echo "<span class='badge bg-success'>
Replied
</span>";

}

else

{

echo "<span class='badge bg-warning'>
Pending
</span>";

}

?>

</td>



</tr>



<?php

}

?>


</tbody>


</table>



<?php include('includes/footer.php'); ?>