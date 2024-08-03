

<?php
require_once "connection.php"; // Include your database connection file

function fetch_all_messages() {
    $conn = mysqli_connect("localhost", "root", "", "store") or die(mysqli_error($conn));

    $sql = "SELECT id, name, email, message, submitted_at FROM contact_submissions ORDER BY submitted_at DESC";
    $result = $conn->query($sql);

    if (!$result) {
        die("Query Failed: " . $conn->error);
    }

    $messages = [];
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }

    $conn->close();
    return $messages;
}
require_once "header.php";


$messages = fetch_all_messages();
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
                        <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Submitted At</th>
            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Submitted At</th>
            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php
                        foreach ($messages as $message) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($message['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($message['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($message['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($message['message']) . "</td>";
                            echo "<td>" . htmlspecialchars($message['submitted_at']) . "</td>";
                            echo "<td><a href='send_reply.php?id=" . $message['id'] . "'>Reply</a></td>";
                            echo "</tr>";
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