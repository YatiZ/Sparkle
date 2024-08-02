<?php

function fetch_all_products()
{
    $con = mysqli_connect("localhost", "root", "", "store") or die(mysqli_error($con));


    $sql = "SELECT items.*, categories.name as category_name
    FROM items
    LEFT JOIN categories ON items.category_id = categories.id;";
    $result = $con->query($sql);


    $con->close();

    return $result;
}

?>