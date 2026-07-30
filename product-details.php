<?php include('includes/header.php'); ?>

<div class="container py-5">

    <div class="row">

        <div class="col-md-6">
            <img src="images/chocolate.jpg" class="img-fluid rounded shadow">
        </div>

        <div class="col-md-6">

            <h2 class="text-danger">Chocolate Delight</h2>

            <h3>Rs. 550</h3>

            <p class="mt-4">
                Chocolate Delight is made with fresh milk, premium chocolate,
                and natural ingredients. It is creamy, delicious, and perfect
                for every ice cream lover.
            </p>

            <label class="mb-2"><strong>Quantity</strong></label>

            <input type="number" class="form-control w-25 mb-3" value="1" min="1">

            <button class="btn btn-danger btn-lg">
                🛒 Add To Cart
            </button>

        </div>

    </div>

</div>

<?php include('includes/footer.php'); ?>