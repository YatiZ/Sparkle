<?php
require_once "header.php";
require_once "order_query.php";

$orders = fetch_all_orders();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">View Purchased Products</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Order Data Lists</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Contact</th>
                            <th>Purchased Items</th>
                            <th>Total Qty</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>User Name</th>
                            <th>Contact</th>
                            <th>Purchased Items</th>
                            <th>Total Qty</th>
                            <th>Total Price</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                        foreach ($orders as $order) {
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['user_name']); ?></td>
                                <td><?php echo htmlspecialchars($order['user_contact']); ?></td>
                                <td><?php echo htmlspecialchars($order['item_name']); ?></td>
                                <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                                <td><?php echo htmlspecialchars($order['total_money']); ?></td>
                                <!-- <td>
                                    <a href="edit_customer.php?id=<?php echo $order['user_name']; ?>">Edit</a> | 
                                    <a href="delete_customer.php?id=<?php echo $order['user_name']; ?>" onclick="return confirm('Are you sure you want to delete this customer?');">Delete</a>
                                </td> -->
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



<?php
require_once "footer.php";
?>