<?php
include('includes/config.php');
include('includes/header.php');
?>

<!-- Hero Section -->

<section class="hero-section"
style="
background:linear-gradient(135deg,#ff416c,#ff4b2b);
min: height 500px;
display:flex;
align-items:center;
">

<div class="container">

<div class="row align-items-center">

<!-- Left Side -->

<div class="col-md-6">

<div class="hero-content">

<h1 class="display-4 fw-bold text-white">
Welcome To
<br>
Saleem's Ice Cream Factory 🍦
</h1>

<p class="lead text-white mt-3">
Fresh, Delicious & Handmade Ice Cream
<br>
Made With Quality Ingredients
</p>

<a href="products.php" class="btn btn-warning btn-lg mt-3">
Explore Ice Creams
</a>

</div>

</div>

<!-- Right Side Slider -->

<div class="col-md-6">

<div id="heroSlider" class="carousel slide" data-bs-ride="carousel">

<div class="carousel-inner rounded shadow">

<div class="carousel-item active">

<img src="images/factory.jpg"
class="d-block w-100 hero-slider-img"
alt="Factory">

</div>

<div class="carousel-item">

<img src="images/packaging.jpg"
class="d-block w-100 hero-slider-img"
alt="Factory 2">

</div>

</div>

<button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">

<span class="carousel-control-prev-icon"></span>

</button>

<button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">

<span class="carousel-control-next-icon"></span>

</button>

</div>

</div>

</div>

</div>

</section>






<!-- Featured Products -->


<section class="bg-light py-5">


<div class="container">


<h2 class="text-center text-danger mb-5">

Our Popular Ice Creams

</h2>



<div class="row">



<div class="col-md-3">


<div class="card shadow">


<img src="images/chocolate.jpg"
class="card-img-top">


<div class="card-body text-center">


<h5>

Chocolate Delight

</h5>


<p>

Rs. 550

</p>


<a href="products.php"
class="btn btn-danger">

Order Now

</a>


</div>


</div>


</div>





<div class="col-md-3">


<div class="card shadow">


<img src="images/vanilla.jpg"
class="card-img-top">


<div class="card-body text-center">


<h5>

Vanilla Classic

</h5>


<p>

Rs. 500

</p>


<a href="products.php"
class="btn btn-danger">

Order Now

</a>


</div>


</div>


</div>





<div class="col-md-3">


<div class="card shadow">


<img src="images/strawberry.jpg"
class="card-img-top">


<div class="card-body text-center">


<h5>

Strawberry Dream

</h5>


<p>

Rs. 580

</p>


<a href="products.php"
class="btn btn-danger">

Order Now

</a>


</div>


</div>


</div>





<div class="col-md-3">


<div class="card shadow">


<img src="images/mango.jpg"
class="card-img-top">


<div class="card-body text-center">


<h5>

Mango Magic

</h5>


<p>

Rs. 530

</p>


<a href="products.php"
class="btn btn-danger">

Order Now

</a>


</div>


</div>


</div>



</div>


</div>


</section>






<!-- Why Choose Us -->


<section class="py-5">


<div class="container">


<h2 class="text-center text-danger mb-5">

Why Choose Us?

</h2>


<div class="row text-center">


<div class="col-md-4">

<h3>🍦</h3>

<h5>

Premium Quality

</h5>


<p>

Fresh ingredients and hygienic production.

</p>


</div>




<div class="col-md-4">

<h3>🚚</h3>

<h5>

Fast Service

</h5>


<p>

Quick order processing and delivery.

</p>


</div>




<div class="col-md-4">

<h3>❤️</h3>

<h5>

Customer Satisfaction

</h5>


<p>

Our customers are our priority.

</p>


</div>



</div>


</div>


</section>

<!-- Reviews -->

<section class="bg-light py-5">

<div class="container">

<h2 class="text-center text-danger mb-5">
Customer Reviews
</h2>

<div class="row">

<?php

$query = mysqli_query($conn, "SELECT * FROM reviews ORDER BY id DESC LIMIT 3");

while($review = mysqli_fetch_assoc($query))
{
?>

<div class="col-md-4">

<div class="card shadow p-3">

<h5><?php echo $review['name']; ?></h5>

<p>
<?php echo str_repeat("⭐",$review['rating']); ?>
</p>

<p><?php echo $review['review']; ?></p>

</div>

</div>

<?php } ?>

</div>

</div>

</section>


<?php include('includes/footer.php'); ?>