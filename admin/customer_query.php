<?php
// customer_query.php

require_once "connection.php"; // Include your database connection file

function fetch_all_customers() {
    $conn = mysqli_connect("localhost", "root", "", "store") or die(mysqli_error($conn));

    $sql = "SELECT id, name, email, contact,city, address FROM users";
    $result = $conn->query($sql);

    return $result;
}
?>
