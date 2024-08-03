<?php
session_start();
session_unset();
session_destroy();
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
<div>
    <?php
    require 'header.php';
    ?>
    <br>
    <h1 class="main-title">You have been logged out.</h1>
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="panel panel-primary">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        
                        <div class="text-center">
                            <a href="login.php" class="text-decoration-none btn btn-info">Login again.</a>
                        </div>

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