<?php
session_start();
require 'check_if_added.php';

// Include the database connection
require 'connection.php'; // Ensure this is the correct path to your connection file

// Initialize query parameters
$category_id = isset($_GET['category']) ? $_GET['category'] : '';
$min_price = isset($_GET['min_price']) ? $_GET['min_price'] : '';
$max_price = isset($_GET['max_price']) ? $_GET['max_price'] : '';

// Prepare the SQL query with filtering conditions
$query = "SELECT items.id, items.name, items.price, items.image, categories.name as category_name FROM items
          JOIN categories ON items.category_id = categories.id WHERE 1";

// Arrays to hold query parameters and their types
$params = [];
$param_types = '';

// Add conditions based on filters
if (!empty($category_id)) {
    $query .= " AND items.category_id = ?";
    $params[] = $category_id;
    $param_types .= 'i'; // 'i' for integer
}

if (!empty($min_price)) {
    $query .= " AND items.price >= ?";
    $params[] = $min_price;
    $param_types .= 'd'; // 'd' for double (decimal)
}

if (!empty($max_price)) {
    $query .= " AND items.price <= ?";
    $params[] = $max_price;
    $param_types .= 'd'; // 'd' for double (decimal)
}

// Prepare and execute the statement
$stmt = $con->prepare($query); // Use $con for the connection

if ($stmt === false) {
    die("Error preparing statement: " . $con->error);
}

// Bind the parameters if there are any
if (!empty($params)) {
    $stmt->bind_param($param_types, ...$params);
}

$stmt->execute();
$filtered_items = $stmt->get_result();

// Fetch categories for dropdown
$category_query = "SELECT id, name FROM categories";
$category_result = $con->query($category_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Filtered Products</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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
</head>

<body>

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

        <!-- Filtering Form -->
        <form method="GET" action="test.php">
            <label for="category">Category:</label>
            <select name="category" id="category">
                <option value="">All</option>
                <?php while ($category = $category_result->fetch_assoc()) { ?>
                    <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $category_id)
                           echo 'selected'; ?>>
                        <?php echo $category['name']; ?>
                    </option>
                <?php } ?>
            </select>

            <label for="min_price">Min Price:</label>
            <input type="number" name="min_price" id="min_price" step="0.01" min="0"
                value="<?php echo htmlspecialchars($min_price); ?>">

            <label for="max_price">Max Price:</label>
            <input type="number" name="max_price" id="max_price" step="0.01" min="0"
                value="<?php echo htmlspecialchars($max_price); ?>">

            <button type="submit">Filter</button>
        </form>

        <!-- Products Display -->
        <div class="container">
            <div class="row product-container">
                <?php
                while ($product = $filtered_items->fetch_assoc()) {
                    ?>
                    <div class="col-md-3 col-sm-6 product-card">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="<?php echo '/admin/img/' . htmlspecialchars($product['image']); ?>"
                                    alt="<?php echo htmlspecialchars($product['name']); ?>">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3><?php echo $product['name']; ?></h3>
                                    <p>Price: $. <?php echo $product['price']; ?></p>

                                    <form id="cart_form_<?php echo $product['id']; ?>" action="cart_add.php" method="GET"
                                        class="quantity-form">
                                        <input type="hidden" name="id"
                                            value="<?php echo htmlspecialchars($product['id']); ?>">

                                        <div class="input-group mb-3">
                                            <button class="btn btn-outline-secondary minus-btn" type="button"
                                                id="minus-btn">-</button>
                                            <input type="text" name="qty" id="qty-input" class="form-control qty-input"
                                                value="1" readonly>
                                            <button class="btn btn-outline-secondary plus-btn" type="button"
                                                id="plus-btn">+</button>
                                        </div>

                                        <?php if (!isset($_SESSION['email'])) { ?>
                                            <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a>
                                            </p>
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
        <?php require 'footer.php'; ?>
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