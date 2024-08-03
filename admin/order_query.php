<?php

require_once "connection.php"; // Include your database connection file

function fetch_all_orders() {
    $conn = mysqli_connect("localhost", "root", "", "store") or die(mysqli_error($conn));

    $sql = "
    SELECT 
        u.name as user_name, 
        u.contact as user_contact,
        i.name as item_name,
        ui.qty as quantity,
        (ui.qty * i.price) as total_money
    FROM 
        users_items ui
    JOIN 
        users u ON ui.user_id = u.id
    JOIN 
        items i ON ui.item_id = i.id
    ";

    $result = $conn->query($sql);

    if (!$result) {
        die("Query Failed: " . $conn->error);
    }

    $orders = [];
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }

    $conn->close();
    return $orders;
}
?>
