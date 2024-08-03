<style>
    .card {
        margin: 30px;
        padding: 20px;
    }
</style>
<?php
include "connection.php"; // Ensure the database connection is included

// Check if the form has been submitted for updating an item
if (isset($_POST['update'])) {
    $i = $_POST['id'];
    $n = $_POST['name']; // Adjust to match the form input name
    $img = $_FILES['image']['name']; // Using $_FILES for file uploads
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];

    // Handle image upload
    if ($img) {
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // Check if image file is a real image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
        }
    }

    // Update query
    $sql = "UPDATE `items` SET `name`='$n', `image`='$img', `price`='$price', `description`='$description', `category_id`='$category_id' WHERE `id`='$i'";
    $result = $con->query($sql);
    if ($result == TRUE) {
        echo "Record updated successfully.";
        header('Location: /admin/products.php'); // Redirect to admin page
        exit(); // Ensure no further code is executed
    } else {
        echo "Error:" . $sql . "<br>" . $con->error;
    }
}

// Check if the id is provided to load existing data
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM items WHERE id='$id'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $image = $row['image'];
        $price = $row['price'];
        $description = $row['description'];
        $category_id = $row['category_id'];
    } else {
        echo "Item not found.";
    }
} else {
    echo "Invalid request.";
    exit();
}

require_once "header.php";
?>

<div class="mb-4 container-fluid">
    <form class="card shadow" method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>" required>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control" value="<?php echo htmlspecialchars($image); ?>">
            <?php if ($image): ?>
                <img src="uploads/<?php echo htmlspecialchars($image); ?>" alt="Current Image"
                    style="max-width: 100px; max-height: 100px;">
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control"><?php echo htmlspecialchars($description); ?></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" class="form-control"
                value="<?php echo htmlspecialchars($price); ?>" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" class="form-control" required>
                <?php
                $sql = "SELECT * FROM categories";
                $categories_result = $con->query($sql);
                while ($category = $categories_result->fetch_assoc()) {
                    $selected = ($category['id'] == $category_id) ? 'selected' : '';
                    echo "<option value='" . $category['id'] . "' $selected>" . $category['name'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" name="update" class="btn btn-primary">Update Product</button>
        </div>
    </form>
</div>

<?php require_once "footer.php"; ?>