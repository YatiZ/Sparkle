<?php
require 'connection.php';
session_start();
if (isset($_SESSION['email'])) {
    header('location: products.php');
}
?>

<style>
    .main-title {
        margin-top: 40px;
    }
</style>

<style>
    .contact-container {
        display: flex;
        justify-content: center;
        margin: 20px;
    }


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
<h1 class="text-center main-title"> Create New Account</h1>
<div class="contact-container">
    <form method="post" class="card" action="user_registration_script.php">
        <div class="form-group mb-3">
            <input type="text" class="form-control" name="name" placeholder="Name" required="true">
        </div>
        <div class="form-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" required="true"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
        </div>
        <div class="form-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)"
                required="true" pattern=".{6,}">
        </div>
        <div class="form-group mb-3">
            <input type="tel" class="form-control" name="contact" placeholder="Contact" required="true">
        </div>
        <div class="form-group mb-3">
            <input type="text" class="form-control" name="city" placeholder="City" required="true">
        </div>
        <div class="form-group mb-3">
            <input type="text" class="form-control" name="address" placeholder="Address" required="true">
        </div>
        <div class="form-group mb-3">
            <input type="submit" class="btn btn-primary" value="Sign Up">
        </div>
    </form>

</div>

<?php
require 'footer.php';
?>