<?php
include('includes/config.php');
include('includes/header.php');
?>

<div class="container py-5">

    <h1 class="text-center text-danger mb-5">
        Our Ice Cream Collection
    </h1>

    <div class="row">

        <?php

        $query = mysqli_query($conn, "SELECT * FROM products ORDER BY id ASC");

        if(mysqli_num_rows($query) > 0)
        {
            while($product = mysqli_fetch_assoc($query))
            {
        ?>

        <div class="col-md-4 mb-4">

            <div class="card h-100 shadow">

                <img src="images/<?php echo $product['image']; ?>"
                     class="card-img-top"
                     alt="<?php echo $product['product_name']; ?>"
                     style="height:250px; object-fit:cover;">

                <div class="card-body text-center">

                    <h4><?php echo $product['product_name']; ?></h4>

                    <h5 class="text-danger">
                        Rs. <?php echo $product['price']; ?>
                    </h5>

                    <p>
                        <?php echo $product['description']; ?>
                    </p>

                    <div class="d-grid gap-2">

                    <a href="product-details.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">
                     View Details
                    </a>

                    <form action="add-to-cart.php" method="POST">

                        <input
                            type="hidden"
                            name="product_id"
                            value="<?php echo $product['id']; ?>">

                        <input
                            type="number"
                            name="quantity"
                            class="form-control mb-2"
                            value="1"
                            min="1">

                        <button type="submit" class="btn btn-danger w-100">
                         🛒 Add To Cart
                        </button>

                    </form>

                    </div>

                </div>

            </div>

        </div>

        <?php
            }
        }
        else
        {
            echo "<div class='col-12'>";
            echo "<div class='alert alert-warning text-center'>";
            echo "No products found in the database.";
            echo "</div>";
            echo "</div>";
        }

        ?>

    </div>

</div>

<?php include('includes/footer.php'); ?>