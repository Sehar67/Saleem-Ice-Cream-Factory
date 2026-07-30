<?php

session_start();
include('../includes/config.php');

if(isset($_POST['login']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");

    if(mysqli_num_rows($query) > 0)
    {
        $admin = mysqli_fetch_assoc($query);

        if($password == $admin['password'])
        {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['username'];
            $_SESSION['admin_email'] = $admin['email'];

            if(isset($_SESSION['redirect_page']))
            {
                $page = $_SESSION['redirect_page'];
                unset($_SESSION['redirect_page']);

                header("Location: " . $page);
            }
            else
            {
                header("Location: dashboard.php");
            }
            exit();
        }
        else
        {
            echo "<script>alert('Incorrect Password');</script>";
        }
    }
    else
    {
        echo "<script>alert('Admin Email Not Found');</script>";
    }
}

include('../includes/header.php');

?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow p-4">

                <h2 class="text-center text-danger mb-4">
                    Admin Login
                </h2>

                <form method="POST">

                    <div class="mb-3">
                        <label>Email</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required>
                    </div>

                    <button
                        type="submit"
                        name="login"
                        class="btn btn-danger w-100">
                        Login
                    </button>

                </form>

            </div>

        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>