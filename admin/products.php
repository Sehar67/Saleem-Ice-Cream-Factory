<?php

include('../includes/config.php');
include('includes/header.php');

?>

<div class="container-fluid">

    <h2 class="mb-4 text-danger">
        Manage Products
    </h2>

    <a href="add-product.php" class="btn btn-success mb-3">
        + Add New Product
    </a>

    <table class="table table-bordered table-hover shadow">

        <thead class="table-danger">

            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th width="180">Action</th>
            </tr>

        </thead>

        <tbody>

        <?php

        $query = mysqli_query($conn,"SELECT * FROM products ORDER BY id DESC");

        if(mysqli_num_rows($query) > 0)
        {
            while($product = mysqli_fetch_assoc($query))
            {
        ?>

            <tr>

                <td><?php echo $product['id']; ?></td>

                <td>

                <?php
                if(!empty($product['image']))
                {
                ?>
                    <img src="../images/<?php echo $product['image']; ?>" width="70" height="70" style="object-fit:cover;">
                <?php
                }
                else
                {
                    echo "No Image";
                }
                ?>

                </td>

                <td><?php echo $product['product_name']; ?></td>

                <td>Rs. <?php echo number_format($product['price'],2); ?></td>

                <td><?php echo $product['stock']; ?></td>

                <td>

                    <a href="edit-product.php?id=<?php echo $product['id']; ?>" class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <a href="delete-product.php?id=<?php echo $product['id']; ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure you want to delete this product?');">
                        Delete
                    </a>

                </td>

            </tr>

        <?php

            }
        }
        else
        {
            echo "<tr><td colspan='6' class='text-center text-danger'>No Products Found</td></tr>";
        }

        ?>

        </tbody>

    </table>

</div>

<?php include('includes/footer.php'); ?>