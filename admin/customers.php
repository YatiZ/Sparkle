<?php
require_once "header.php";
require_once "customer_query.php"; // Use the new file for customer data

$users = fetch_all_customers(); // Fetch customers instead of products
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">View Customers</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Customer Data Lists</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>City</th>
                            <th>Address</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>City</th>
                            <th>Address</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                        while ($user = $users->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user['id']); ?></td>
                                <td><?php echo htmlspecialchars($user['name']); ?></td>
                                <td><?php echo htmlspecialchars($user['email']); ?></td>
                                <td><?php echo htmlspecialchars($user['contact']); ?></td>
                                <td><?php echo htmlspecialchars($user['city']); ?></td>
                                <td><?php echo htmlspecialchars($user['address']); ?></td>
                                <!-- <td>
                                    <a href="edit_customer.php?id=<?php echo $user['id']; ?>">Edit</a> | 
                                    <a href="delete_customer.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure you want to delete this customer?');">Delete</a>
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
<!-- /.container-fluid -->

<?php
require_once "footer.php";
?>