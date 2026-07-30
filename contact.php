<?php

include('includes/config.php');


if(isset($_POST['send_message']))
{

$name = mysqli_real_escape_string($conn,$_POST['name']);

$email = mysqli_real_escape_string($conn,$_POST['email']);

$phone = mysqli_real_escape_string($conn,$_POST['phone']);

$subject = mysqli_real_escape_string($conn,$_POST['subject']);

$message = mysqli_real_escape_string($conn,$_POST['message']);



$query = mysqli_query($conn,

"INSERT INTO contact_messages
(name,email,phone,subject,message)

VALUES

('$name','$email','$phone','$subject','$message')"

);



if($query)
{

echo "<script>

alert('Message Sent Successfully');

window.location='contact.php';

</script>";

}

else
{

echo "<script>

alert('Something went wrong');

</script>";

}


}



include('includes/header.php');

?>


<div class="container py-5">


<h1 class="text-center text-danger mb-5">

Contact Saleem's Ice Cream Factory

</h1>



<div class="row g-4">



<!-- Contact Form -->

<div class="col-md-6">


<div class="card shadow p-4">


<h3 class="text-danger mb-3">

Send Us Message

</h3>



<form method="POST">


<div class="mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
placeholder="Enter Your Name"
required>

</div>



<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
placeholder="Enter Your Email"
required>

</div>



<div class="mb-3">

<label>Phone</label>

<input
type="text"
name="phone"
class="form-control"
placeholder="Enter Phone Number"
required>

</div>



<div class="mb-3">

<label>Subject</label>

<input
type="text"
name="subject"
class="form-control"
placeholder="Message Subject"
required>

</div>



<div class="mb-3">

<label>Message</label>

<textarea
name="message"
class="form-control"
rows="5"
placeholder="Write Your Message"
required></textarea>

</div>



<button
type="submit"
name="send_message"
class="btn btn-danger w-100">

Send Message

</button>



</form>


</div>


</div>





<!-- Factory Information -->

<div class="col-md-6">


<div class="card shadow p-4">


<h3 class="text-danger">

Factory Information

</h3>



<p class="mt-3">

🍦 <b>Saleem's Ice Cream Factory</b>

</p>



<p>

📍 Shakargarh, Pakistan

</p>



<p>

📞 Contact: 03056132394

</p>



<p>

🕘 Opening Hours:

<br>

05 AM - 10 PM

</p>



<!-- WhatsApp Button -->

<a href="https://wa.me/923056132394" 
target="_blank"
class="btn btn-success w-100 mt-3">

💬 Order on WhatsApp

</a>



<hr>



<h4>

📍 Our Location

</h4>


<p>

Saleem's Ice Cream Factory

<br>

Shakargarh, Pakistan

</p>



<!-- Google Map -->

<iframe

src="https://maps.google.com/maps?q=Shakargarh%20Pakistan&t=&z=13&ie=UTF8&iwloc=&output=embed"

width="100%"

height="300"

style="border:0;"

allowfullscreen=""

loading="lazy">

</iframe>



</div>


</div>




</div>


</div>



<?php include('includes/footer.php'); ?>