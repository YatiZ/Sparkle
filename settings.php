<?php
session_start();
require 'connection.php';
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}
?>
<style>
    .pw-container {
        display: flex;
        justify-content: center;
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
<h1 class="main-title">Change Password</h1>
<div class="pw-main">

    <div class="pw-container">
        <div class="row card">
            <div class="col-xs-4 col-xs-offset-4">

                <form method="post" action="setting_script.php">
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" name="oldPassword" placeholder="Old Password">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" name="newPassword" placeholder="New Password">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" name="retype" placeholder="Re-type new password">
                    </div>
                    <div class="form-group mb-3">
                        <input type="submit" class="btn btn-primary" value="Change">
                    </div>
                </form>
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