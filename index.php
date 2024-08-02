<?php
session_start();
?>
<style>
    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        /* Space between cards */
    }

</style>
<div>
    <?php
    require_once 'header.php';
    ?>
    <div id="bannerImage" class="bannerImage">
        <div class="container">
            <center>
                <div id="bannerContent">
                    <h1>Welcome!</h1>
                    <p>Explore our new arrivals and find your perfect look today!</p>
                    <a href="products.php" class="btn btn-danger">Shop Now</a>
                </div>
            </center>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-4 card">
                <div class="thumbnail">
                    <a href="products.php">
                        <img src="img/clothes.png" alt="Clothes">
                    </a>
                    <center>
                        <div class="caption">
                            <p id="autoResize">Clothes</p>
                            <p>Choose among the best available in the world.</p>
                        </div>
                    </center>
                </div>
            </div>
            <div class="col-xs-4 card">
                <div class="thumbnail">
                    <a href="products.php">
                        <img src="img/handbag.png" alt="Watch">
                    </a>
                    <center>
                        <div class="caption">
                            <p id="autoResize">Bags</p>
                            <p>Original watches from the best brands.</p>
                        </div>
                    </center>
                </div>
            </div>
            <div class="col-xs-4 card">
                <div class="thumbnail">
                    <a href="products.php">
                        <img src="img/accessories.png" alt="Shirt">
                    </a>
                    <center>
                        <div class="caption">
                            <p id="autoResize">Accessories</p>
                            <p>Our exquisite collection of shirts.</p>
                        </div>
                    </center>
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