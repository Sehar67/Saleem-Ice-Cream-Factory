<?php

include('../includes/config.php');


$id=$_GET['id'];


$product=mysqli_fetch_assoc(
mysqli_query($conn,"SELECT * FROM products WHERE id='$id'")
);



if(isset($_POST['update']))
{

$name=$_POST['name'];

$description=$_POST['description'];

$price=$_POST['price'];

$stock=$_POST['stock'];



mysqli_query($conn,

"UPDATE products SET

product_name='$name',
description='$description',
price='$price',
stock='$stock'

WHERE id='$id'

"

);



echo "<script>

alert('Product Updated');

window.location='products.php';

</script>";

}


include('includes/header.php');

?>


<h2>Edit Product</h2>


<div class="card p-4 shadow">


<form method="POST">


<label>Product Name</label>

<input 
type="text"
name="name"
class="form-control mb-3"
value="<?php echo $product['product_name']; ?>">



<label>Description</label>

<textarea
name="description"
class="form-control mb-3">

<?php echo $product['description']; ?>

</textarea>



<label>Price</label>

<input
type="number"
name="price"
class="form-control mb-3"
value="<?php echo $product['price']; ?>">



<label>Stock</label>

<input
type="number"
name="stock"
class="form-control mb-3"
value="<?php echo $product['stock']; ?>">



<button
name="update"
class="btn btn-primary">

Update Product

</button>


</form>


</div>


<?php include('includes/footer.php'); ?>