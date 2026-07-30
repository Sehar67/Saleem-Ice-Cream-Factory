<?php

include('../includes/config.php');


if(isset($_GET['id']))
{

$id=$_GET['id'];


mysqli_query($conn,

"UPDATE orders 
SET status='Delivered'
WHERE id='$id'"

);


}


header("Location: orders.php");

exit();

?>