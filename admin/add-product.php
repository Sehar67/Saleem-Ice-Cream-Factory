<?php

include('../includes/config.php');

include('includes/header.php');


if(isset($_POST['add_product']))
{

$name = mysqli_real_escape_string($conn,$_POST['name']);

$description = mysqli_real_escape_string($conn,$_POST['description']);

$price = $_POST['price'];

$stock = $_POST['stock'];

$image = $_FILES['image']['name'];

$tmp_name = $_FILES['image']['tmp_name'];


// image upload

move_uploaded_file(
    $tmp_name,
    "../images/".$image
);



$query = mysqli_query($conn,

"INSERT INTO products
(product_name,description,price,image,stock)

VALUES

('$name','$description','$price','$image','$stock')"

);



if($query)
{

echo "<script>

alert('Product Added Successfully');

window.location='products.php';

</script>";

}

else
{

echo "Error Adding Product";

}


}

?>


<h2 class="mb-4">
Add New Ice Cream
</h2>


<div class="card shadow p-4">


<form method="POST" enctype="multipart/form-data">


<div class="mb-3">

<label>
Product Name
</label>

<input
type="text"
name="name"
class="form-control"
required>

</div>



<div class="mb-3">

<label>
Description
</label>

<textarea
name="description"
class="form-control"
required></textarea>

</div>




<div class="mb-3">

<label>
Price
</label>

<input
type="number"
name="price"
class="form-control"
required>

</div>




<div class="mb-3">

<label>
Stock
</label>

<input
type="number"
name="stock"
class="form-control"
required>

</div>




<div class="mb-3">

<label>
Product Image
</label>

<input
type="file"
name="image"
class="form-control"
required>

</div>



<button
type="submit"
name="add_product"
class="btn btn-success">

Add Product

</button>



</form>


</div>


<?php include('includes/footer.php'); ?>