<?php
$con = mysqli_connect("localhost", "root", "", "store") or die(mysqli_error($con));
//$con=mysqli_connect("localhost","root","","store") or die(mysqli_error($con));

?>

<?php
function get_db_connection() {
    $con = mysqli_connect("localhost", "root", "", "store");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}
?>
