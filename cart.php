<?php
session_start();
require 'connection.php';
if (!isset($_SESSION['email'])) {
    header('location: login.php');
    exit();
}

$user_id = $_SESSION['id'];
$user_products_query = "SELECT it.id, it.name, it.image, it.price, ut.qty FROM users_items ut INNER JOIN items it ON it.id = ut.item_id WHERE ut.user_id = '$user_id'";
$user_products_result = mysqli_query($con, $user_products_query) or die(mysqli_error($con));
$no_of_user_products = mysqli_num_rows($user_products_result);
$sum = 0;
$discount = 0; // Default discount
$codeInvalidMessage = '';
$loading = false;

if ($no_of_user_products == 0) {
    echo '<script>alert("No items in the cart!!");</script>';
} else {
    while ($row = mysqli_fetch_array($user_products_result)) {
        $sum += $row['price'] * $row['qty'];
    }
}

// Handle promo code submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['code'])) {
    $codeValue = strtoupper($_POST['code']);
    $loading = true;

    // Simulate API call
    sleep(2); // Simulate network delay
    // Replace this with actual promo code validation
    if ($codeValue === 'SPARKLE10') {
        $discount = 0.10; // 10% discount
        $codeInvalidMessage = '';
    } else {
        $discount = 0;
        $codeInvalidMessage = 'Invalid promo code';
    }
    $loading = false;
}

function calculateTax($total)
{
    return $total * 0.07;
}

function estimatedTotal($total, $discount)
{
    $discountAmount = $total * $discount;
    $tax = calculateTax($total);
    return $total - $discountAmount + $tax;
}

$tax = calculateTax($sum);
$estimatedTotal = estimatedTotal($sum, $discount);
?>


<style>
    .container {
        margin-top: 80px;
    }

    img {
        width: 100%;
        object-fit: contain;
    }

    .cart-img {
        width: 100px;
    }
</style>
</head>

<body>
    <div>
        <?php require 'header.php'; ?>

        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <?php
                    $user_products_result = mysqli_query($con, $user_products_query) or die(mysqli_error($con));

                    if (mysqli_num_rows($user_products_result) > 0) {
                        // There are results, so display them
                        $counter = 1;
                        while ($row = mysqli_fetch_array($user_products_result)) {
                            ?>
                            <div class="card mb-3">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-danger btn-sm"
                                        onclick="handleRemove(<?php echo $row['id']; ?>)">Remove</button>
                                </div>
                                <div class="d-flex">
                                    <div class="py-2 cart-img">
                                        <!-- <img  src="<?php echo $row['image']; ?>" alt="item"> -->
                                        <img class="rounded-circle"
                                            src="<?php echo '/admin/img/' . htmlspecialchars($row['image']); ?>"
                                            alt="<?php echo htmlspecialchars($row['name']); ?>">
                                    </div>
                                    <div class="ms-3">
                                        <div class="font-weight-bold"><?php echo $row['name']; ?></div>
                                        <div class="mt-2"><span>Each: </span><b>$<?php echo $row['price']; ?></b></div>
                                        <div class="mt-2 d-flex align-items-center">
                                            <span>Quantity: </span>
                                            <div class="d-flex">

                                                <span class="mx-2"><?php echo $row['qty']; ?></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $counter++;
                        }
                    } else {
                        // No results found
                        ?>
                        <div class="alert alert-info" role="alert">
                            No products found.
                        </div>
                        <?php
                    }
                    ?>


                </div>


                <div class="col-md-6">
                    <div class="p-4 border rounded shadow-sm">
                        <h1 class="text-center font-weight-bold mb-3">Order Summary</h1>
                        <hr />
                        <form method="post" action="">
                            <div class="form-group mb-3">
                                <label for="code" class="form-label">ENTER PROMO CODE</label>
                                <div class="d-flex">
                                    <input type="text" id="code" name="code" placeholder="Promo Code"
                                        class="form-control me-2" />
                                    <button class="btn btn-dark" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                        <?php if ($codeInvalidMessage): ?>
                            <div class="alert alert-danger mt-3">
                                <?php echo htmlspecialchars($codeInvalidMessage); ?>
                            </div>
                        <?php endif; ?>

                        <div class="row g-3 mb-4">
                            <div class="col-6">Shopping cost</div>
                            <div class="col-6 text-end">Rs <?php echo number_format($sum, 2); ?>/-</div>
                            <div class="col-6">Discount</div>
                            <div class="col-6 text-end"><?php echo $discount * 100; ?>%</div>
                            <div class="col-6">Tax</div>
                            <div class="col-6 text-end">Rs <?php echo number_format($tax, 2); ?>/-</div>
                            <div class="col-6 font-weight-bold">Estimated Total</div>
                            <div class="col-6 font-weight-bold text-end">
                                Rs <?php echo number_format($estimatedTotal, 2); ?>/-
                            </div>
                        </div>

                        <div class="mb-4">
                            <p class="text-muted">
                                or 4 interest-free payments of $10.00 with
                                <button class="btn text-bg-info rounded-3 ms-2">
                                    <i class="fa-regular fa-credit-card"></i>
                                    otherpay
                                </button>
                            </p>
                        </div>

                        <div class="d-flex justify-content-center mb-4">
                            <p class="text-center">
                                You're <b class="text-danger">$10.01</b> away from free shipping!
                            </p>
                            <!-- <a href="/help-center">
                                <img src="img/cloud-black-clouds-message.png" alt="help" class="w-25 ms-2" />
                            </a> -->
                        </div>

                        <div class="d-flex justify-content-center mb-3">


                            <a href="success.php?id=<?php echo $user_id ?>" class="btn btn-primary">Confirm
                                Order</a>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require 'footer.php'; ?>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        function handleRemove(itemId) {
            if (confirm('Are you sure you want to remove this item?')) {
                window.location.href = 'cart_remove.php?id=' + itemId;
            }
        }

        function updateQuantity(itemId, change) {
            // Create a form and submit it to update the quantity
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'cart_update.php'; // Your PHP script for updating cart

            const itemInput = document.createElement('input');
            itemInput.type = 'hidden';
            itemInput.name = 'item_id';
            itemInput.value = itemId;
            form.appendChild(itemInput);

            const changeInput = document.createElement('input');
            changeInput.type = 'hidden';
            changeInput.name = 'quantity_change';
            changeInput.value = change;
            form.appendChild(changeInput);

            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>

</html>