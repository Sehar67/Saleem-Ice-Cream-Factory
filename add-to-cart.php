<?php
session_start();
include('includes/config.php');

if(isset($_POST['product_id']))
{
    $id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);

    if($quantity < 1)
    {
        $quantity = 1;
    }

    $query = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");

    if(mysqli_num_rows($query) > 0)
    {
        $product = mysqli_fetch_assoc($query);

        if(isset($_SESSION['cart'][$id]))
        {
            $_SESSION['cart'][$id]['quantity'] += $quantity;
        }
        else
        {
            $_SESSION['cart'][$id] = array(
                "id"       => $product['id'],
                "name"     => $product['product_name'],
                "price"    => $product['price'],
                "image"    => $product['image'],
                "quantity" => $quantity
            );
        }
    }
}

header("Location: cart.php");
exit();
?>