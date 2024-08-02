<?php
require 'connection.php';
//require 'header.php';
session_start();
$item_id = $_GET['id'];
$qty = $_GET['qty'];
$user_id = $_SESSION['id'];

// check items already exits if exists then update 
$check_item_query = "SELECT * FROM users_items WHERE user_id = '$user_id' AND item_id = '$item_id' AND status = 'Added to cart'";
$check_item_result = mysqli_query($con, $check_item_query) or die(mysqli_error($con));

if (mysqli_num_rows($check_item_result) > 0) {
    // Item exists in the cart, update the quantity
    $update_quantity_query = "UPDATE users_items SET qty = qty + $qty WHERE user_id = '$user_id' AND item_id = '$item_id' AND status = 'Added to cart'";
    mysqli_query($con, $update_quantity_query) or die(mysqli_error($con));
} else {
    // Item does not exist in the cart, insert a new record
    $add_to_cart_query = "INSERT INTO users_items (user_id, item_id, qty, status) VALUES ('$user_id', '$item_id', '$qty', 'Added to cart')";
    mysqli_query($con, $add_to_cart_query) or die(mysqli_error($con));
}

header('location: products.php');
?>