<?php
require 'connection.php';


$total_qty = 0;

if (isset($_SESSION['email'])) {

    $user_id = $_SESSION['id'];

    $user_products_qty_query = "select sum(ut.qty) as total_qty from users_items ut inner join items it on it.id=ut.item_id where ut.user_id='$user_id'";

    $user_products_qty = mysqli_query($con, $user_products_qty_query) or die(mysqli_error($con));

    $total_qty = $user_products_qty->fetch_assoc()['total_qty'] ?? 0;

}


?>
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="img/lifestyleStore.png" />
    <title>Sparkle</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.css" />

    <!-- External CSS -->
    <link rel="stylesheet" href="css/custom.css" type="text/css" />

    <script src="/script.js"></script>
    <script src="https://kit.fontawesome.com/9dca7ae98e.js" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-info fixed-top" id="navbar">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">Sparkle</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownInformation" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"><b>Information</b></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownInformation">
                            <li>
                                <a class="dropdown-item" href="/Information.php#about-us">About Us</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/Information.php#social-risks">Social Tips</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="/Information.php#partnerships">Partnerships</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/help.php">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact.php">Contact</a>
                    </li>


                </ul>
                <div class="d-flex justify-content-end">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php
                        if (isset($_SESSION['email'])) {
                            ?>
                            <li class="nav-item">
                                <!-- <a href="logout.php" class='nav-link'>

                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a> -->
                                <div class="position-relative">
                                    <a href="cart.php" class="nav-link">
                                        <span>Your Cart</span>
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </a>
                                    <span
                                        class="position-absolute mt-2 top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        <?php echo $total_qty ?>
                                    </span>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="settings.php" class="nav-link">Settings</a>
                            </li>

                            <li class="nav-item">
                                <a href="logout.php" class='nav-link'>
                                    Logout
                                </a>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li class="nav-item"><a href="signup.php" class=" nav-link"><span
                                        class="glyphicon glyphicon-user"></span> Sign Up</a>
                            </li>
                            <li class="nav-item"><a href="login.php" class="nav-link"><span
                                        class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>