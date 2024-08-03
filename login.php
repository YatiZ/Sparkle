<?php
require 'connection.php';
session_start();
?>
<style>
    .main-title {
        margin-top: 30px;
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

    .custom-alert {
        position: fixed;
        top: 80px;
        right: 20px;
        padding: 15px;
        background-color: #4CAF50;
        /* Green */
        color: white;
        opacity: 1;
        transition: opacity 1s ease-out;
        border-radius: 5px;
        z-index: 1000;
    }
</style>


<?php
require 'header.php';
?>
<h1 class="text-center main-title">Login to make a purchase</h1>
<div class="contact-container">




    <form method="post" action="login_submit.php" class="card">
        <div class=" mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
        </div>
        <div class=" mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)"
                pattern=".{6,}">
        </div>
        <div class=" mb-3">
            <input type="submit" value="Login" class="btn btn-primary">
        </div>

        <div class="card-footer">Don't have an account yet? <a href="signup.php">Register</a></div>

    </form>


</div>

<?php
require 'footer.php';
?>