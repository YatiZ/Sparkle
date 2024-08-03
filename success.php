<?php
session_start();
require 'connection.php';
if (!isset($_SESSION['email'])) {
    header('location:index.php');
} else {
    $user_id = $_GET['id'];
    $confirm_query = "update users_items set status='Confirmed' where user_id=$user_id";
    $confirm_query_result = mysqli_query($con, $confirm_query) or die(mysqli_error($con));

}
?>
<style>
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
<?php
require 'header.php';
?>
<br>
<h1 class="text-center main-title">Well Done!</h1>
<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-heading"></div>
                <div class="text-center">
                    <p>Your order is confirmed. Thank you for shopping with us. <a href="products.php">Click here</a> to
                        purchase any other item.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'footer.php';
?>
</div>
</body>

</html>