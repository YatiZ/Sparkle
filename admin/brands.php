<?php
require_once "header.php";

?>
<style>
    .card {
        display: flex;
        /* Flexbox for equal height cards */
        flex-direction: column;
        /* Stack image and other content vertically */
        height: 100%;
        /* Full height for flex container */
    }

    .card-body {
        flex: 1;
        /* Allow card body to take remaining space */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card img {
        height: auto;
        /* Maintain aspect ratio */
        width: 100%;
        /* Full width of container */
        object-fit: contain;
        /* Ensure image fits without cropping */
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        /* Allow cards to wrap into new rows */
        gap: 0;
        /* Remove spacing between cards */
    }

    .col-xl-3,
    .col-md-6 {
        margin-bottom: 0;
        /* Remove default margin-bottom to avoid gaps */
        padding: 0 10px;
        /* Small padding between columns */
        box-sizing: border-box;
        /* Include padding in the element's total width and height */
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Brands</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-body w-100">
                    <img src="https://cdn.britannica.com/94/193794-050-0FB7060D/Adidas-logo.jpg" alt="" class="w-100">
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-body ">
                    <img src="/admin/img/pngegg (12).png" alt="" class="w-100">
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/76/Louis_Vuitton_logo_and_wordmark.svg"
                        alt="" class="w-100">
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-body ">
                    <img src="/admin/img/pngegg (13).png" alt="" class="w-100">
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-body ">
                    <img src="https://www.popticles.com/wp-content/uploads/2024/02/Shein-Logo.png" alt="" class="w-100">
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/Dior_Logo.svg/800px-Dior_Logo.svg.png"
                        alt="" class="w-100">
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

<?php
require_once "footer.php";
?>