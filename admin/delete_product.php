​<?php
include "connection.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM items WHERE id ='$id'";
     $result = $con->query($sql);
     if ($result == TRUE) {
        echo "<script>
		window.alert('Delete Successfully');
		window.location='/admin/products.php';
		</script>";
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}
?>