<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    // Handle image upload
    $image = $_FILES['image']['name'];
    $target_dir = "img/";
    $target_file = $target_dir . basename($image);
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES['image']['size'] > 500000) { // 500KB
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $con = get_db_connection();

            $img_full_path = '/admin/img/' . $image;

            $sql = "INSERT INTO items (name, image, description, price, category_id) 
                    VALUES ('$name', '$image', '$description', '$price', '$category_id')";

            if (mysqli_query($con, $sql)) {
                mysqli_close($con);
                header("Location: products.php"); // Redirect to products.php
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }

            mysqli_close($con);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
<style>
    .card {
        margin: 30px;
        padding: 20px;
    }
</style>

<?php require_once "header.php" ?>
<div class=" mb-4 container-fluid">
    <form class="card shadow" method="post" action="add_product.php" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="image">Image:</label>
        <input type="file" name="image" required><br>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br>

        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" required><br>

        <label for="category_id">Category:</label>
        <select name="category_id" required>
            <?php
            $con = get_db_connection();
            $sql = "SELECT * FROM categories";
            $result = $con->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
            $con->close();
            ?>
        </select><br>

        <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Add Product</button>
    </form>
    <!-- <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Development Approach</h6>
                </div>
                <div class="card-body">
                    <p>Our approach is rooted in understanding and serving our customers' needs. By prioritizing
                        customer feedback, adapting to changing trends, and offering personalized shopping experiences,
                        we strive to develop a brand that resonates with every customer.</p>
                    <p class="mb-0">Always greet customers with a friendly smile and try to personalize their shopping
                        experience. Use their name when possible, remember repeat customers' preferences, and offer
                        tailored recommendations.</p>
                </div> -->
</div>

</body>

</html>