<?php
session_start();
include('includes/config.php');

if(isset($_POST['login']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($query) > 0)
    {
        $user = mysqli_fetch_assoc($query);

        if(password_verify($password, $user['password']))
        {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['user_email'] = $user['email'];

            echo "<script>
                alert('Login Successful');
                window.location='profile.php';
            </script>";
            exit();
        }
        else
        {
            echo "<script>alert('Incorrect Password');</script>";
        }
    }
    else
    {
        echo "<script>alert('Email not found');</script>";
    }
}
?>

<?php include('includes/header.php'); ?>

<section class="bg-danger text-white py-5">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Customer Login</h1>
        <p class="lead">Login to your account</p>
    </div>
</section>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-5">

            <div class="card shadow p-4">

                <h2 class="text-center text-danger mb-4">
                    Customer Login
                </h2>

                <form method="POST">

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="Enter Email Address"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Enter Password"
                            required>
                    </div>

                    <button
                        type="submit"
                        name="login"
                        class="btn btn-danger w-100">

                        Login

                    </button>

                </form>

                <hr>

                <p class="text-center">
                    Don't have an account?
                    <a href="signup.php">Register Here</a>
                </p>

            </div>

        </div>

    </div>

</div>

<?php include('includes/footer.php'); ?>