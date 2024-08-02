<?php
require_once "header.php";
require_once "product_query.php";

$products = fetch_all_products();


?>
<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">View Products</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Product Data Lists</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php

                        while ($product = $products->fetch_assoc()) {

                            ?>
                            <tr>
                                <td><?php echo $product['name'] ?></td>
                                <td><?php echo $product['description'] ?></td>
                                <td><?php echo $product['price'] ?></td>
                                <td><?php echo $product['category_name'] ?></td>
                                <td>
                                    Edit | Delete
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

<?php
require_once "footer.php";

?>