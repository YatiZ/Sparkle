<?php
require 'connection.php';
session_start();

// Sanitize and validate email
$email = mysqli_real_escape_string($con, $_POST['email']);
$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
if (!preg_match($regex_email, $email)) {
    echo "Incorrect email. Redirecting you back to login page...";
    ?>
    <meta http-equiv="refresh" content="2;url=login.php" />
    <?php
    exit();
}

// Sanitize and validate password
$password = md5(md5(mysqli_real_escape_string($con, $_POST['password'])));
if (strlen($password) < 6) {
    echo "Password should have at least 6 characters. Redirecting you back to login page...";
    ?>
    <meta http-equiv="refresh" content="2;url=login.php" />
    <?php
    exit();
}

// Authenticate user
$user_authentication_query = "SELECT id, email FROM users WHERE email = ? AND password = ?";
$stmt = $con->prepare($user_authentication_query);
$stmt->bind_param('ss', $email, $password);
$stmt->execute();
$user_authentication_result = $stmt->get_result();

$rows_fetched = $user_authentication_result->num_rows;
if ($rows_fetched == 0) {
    // No user found
    ?>
    <script>
        window.alert("Wrong username or password");
    </script>
    <meta http-equiv="refresh" content="1;url=login.php" />
    <?php
    exit();
} else {
    $row = $user_authentication_result->fetch_array();
    $_SESSION['email'] = $email;
    $_SESSION['id'] = $row['id'];  // User id

    // Check if user is admin
    if ($email === 'admin@admin.com') {
        echo "<div class=\"alert\" id=\"noti\">
              <h2>Success!</h2>
              <div>You've successfully logged in as an admin. Welcome back!</div>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = '/admin/index.php'; 
                }, 2000); 
              </script>";
    } else {
        echo "<div class=\"alert\" id=\"noti\">
              <h2>Success!</h2>
              <div>You've successfully logged in. Nice to have you back!</div>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = '../products.php'; 
                }, 2000); 
              </script>";
    }
}
?>