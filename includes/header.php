<?php

if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}

include('includes/config.php');

?>

<?php

if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Saleem's Ice Cream Factory</title>


<!-- Bootstrap CSS -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Custom CSS -->

<link rel="stylesheet" href="/IceCreamFactory/css/style.css">


</head>


<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-danger">


<div class="container">


<a class="navbar-brand fw-bold" href="index.php">

🍦 Saleem's Ice Cream Factory

</a>



<button class="navbar-toggler" 
type="button" 
data-bs-toggle="collapse" 
data-bs-target="#navbarMenu">

<span class="navbar-toggler-icon"></span>

</button>



<div class="collapse navbar-collapse" id="navbarMenu">


<ul class="navbar-nav ms-auto">


<li class="nav-item">

<a class="nav-link" href="index.php">

Home

</a>

</li>



<li class="nav-item">

<a class="nav-link" href="about.php">

About

</a>

</li>



<li class="nav-item">

<a class="nav-link" href="products.php">

Products

</a>

</li>

<li class="nav-item">

<a class="nav-link" href="gallery.php">

Gallery

</a>

</li>

<li class="nav-item">

<a class="nav-link" href="contact.php">

Contact

</a>

</li>

<li class="nav-item">

<a class="nav-link" href="reviews.php">

Reviews

</a>

</li>




<?php

if(isset($_SESSION['user_id']))

{

?>

<li class="nav-item">

<a class="nav-link" href="profile.php">

Profile

</a>

</li>


<li class="nav-item">

<a class="nav-link" href="logout.php">

Logout

</a>

</li>


<?php

}

else

{

?>


<li class="nav-item">

<a class="nav-link" href="login.php">

Login

</a>

</li>


<li class="nav-item">

<a class="nav-link" href="signup.php">

Sign Up

</a>

</li>


<?php

}

?>



<li class="nav-item">

<a class="nav-link" href="cart.php">

🛒 Cart

</a>

</li>


</ul>


</div>


</div>


</nav>