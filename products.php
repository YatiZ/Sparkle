<?php
session_start();
require 'check_if_added.php';

require 'admin/product_query.php';

$products = fetch_all_products();


?>

<style>
    .main-container {

        text-align: center;
        padding: 40px;
    }


    .product-container {
        margin: auto;
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .main-title {
        margin-top: 80px;
    }

    .main-title {
        margin-bottom: 0.5rem;
        text-align: center;
        font-family: 'Abril Fatface', cursive;
        font-size: 2.32rem;
        color: black;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .main-title:before,
    .main-title:after {
        content: '';
        display: block;
        margin: 0 0.2rem;
        flex: 1;
        border-bottom: 1px solid #2e8074;
    }
</style>


<div>
    <?php
    require 'header.php';
    ?>
    <h1 class="main-title">Welcome to our Sparkle!</h1>
    <div class="main-container">
        <div class="jumbotron">

            <p>Fuel your passion for fitness with our high-performance athletic wear. Designed for athletes and
                fitness enthusiasts, our collections offer style and functionality to keep you moving in comfort.
                Gear up and get active with us!</p>
        </div>
    </div>
    <div class="container">
        <div class="row product-container">
            <?php
            while ($product = $products->fetch_assoc()) {
                ?>
                <div class="col-md-3 col-sm-6 product-card ">
                    <div class="thumbnail">
                        <a href="cart.php">
                            <img src="<?php echo '/admin/img/' . htmlspecialchars($product['image']); ?>"
                                alt="<?php echo htmlspecialchars($product['name']); ?>">
                        </a>
                        <center>
                            <div class="caption">
                                <h3>
                                    <?php echo $product['name'] ?>
                                </h3>
                                <p>Price: $. <?php echo $product['price'] ?></p>

                                <form id="cart_form_<?php echo $product['id'] ?>" action="cart_add.php" method="GET"
                                    class="quantity-form">

                                    <input type="hidden" name="id" value="<?php echo $productId; ?>">

                                    <div class="input-group mb-3">
                                        <button class="btn btn-outline-secondary minus-btn" type="button"
                                            id="minus-btn">-</button>
                                        <input type="text" name="qty" id="qty-input" class="form-control qty-input"
                                            value="1" readonly>
                                        <button class="btn btn-outline-secondary plus-btn" type="button"
                                            id="plus-btn">+</button>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
                                    <?php if (!isset($_SESSION['email'])) { ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                    <?php } else { ?>
                                        <button type="submit" class="btn btn-block btn-primary">Add to cart</button>
                                    <?php } ?>

                                </form>



                            </div>
                        </center>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
    <br><br><br><br><br><br><br><br>
    <?php require 'footer.php' ?>

</div>
<script src="bootstrap/js/jquery-3.2.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
    // Listen for click events on the document
    document.addEventListener('click', function (event) {
        // Check if the clicked element has the class 'minus-btn' or 'plus-btn'
        if (event.target.classList.contains('minus-btn')) {
            // Find the parent form element of the clicked minus button
            let formElement = event.target.closest('form');

            // Find the quantity input within the form element
            let qtyInput = formElement.querySelector('.qty-input');

            // Get the current quantity value
            let currentQty = parseInt(qtyInput.value, 10);

            // Decrease the quantity if greater than 1
            if (currentQty > 1) {
                qtyInput.value = currentQty - 1;
            }
        } else if (event.target.classList.contains('plus-btn')) {
            // Find the parent form element of the clicked plus button
            let formElement = event.target.closest('form');

            // Find the quantity input within the form element
            let qtyInput = formElement.querySelector('.qty-input');

            // Get the current quantity value
            let currentQty = parseInt(qtyInput.value, 10);

            // Increase the quantity
            qtyInput.value = currentQty + 1;
        }
    });

</script>

</body>

</html>