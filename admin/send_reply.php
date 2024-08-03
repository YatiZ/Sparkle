<?php
require_once "connection.php"; // Include your database connection file

function get_message_by_id($id)
{
    $conn = mysqli_connect("localhost", "root", "", "store") or die(mysqli_error($conn));

    $sql = "SELECT id, name, email, message, submitted_at FROM contact_submissions WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $message = $result->fetch_assoc();

    $stmt->close();
    $conn->close();
    return $message;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $to = $_POST['email'];
    $subject = "Reply to your message";
    $reply = $_POST['reply'];
    $headers = "From: admin@example.com"; // Change to your admin email

    if (mail($to, $subject, $reply, $headers)) {
        echo "<script>
		window.alert('Email sent successfully.');
		window.location='/admin/view_messages.php';
		</script>";
    } else {
        echo "Failed to send email.";
    }
    exit();
}

if (!isset($_GET['id'])) {
    die("ID not provided.");
}

$message = get_message_by_id($_GET['id']);
?>
<style>
    .card {
        margin: 30px;
        padding: 20px;
    }
</style>

<?php require_once "header.php" ?>
<div class=" mb-4 container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reply to Messages</h1>

    </div>
    <form class="card shadow" method="post" action="send_reply.php" enctype="multipart/form-data">
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($message['email']); ?>">
        <p><strong>Name:</strong> <?php echo htmlspecialchars($message['name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($message['email']); ?></p>
        <p><strong>Message:</strong> <?php echo nl2br(htmlspecialchars($message['message'])); ?></p>
        <p><strong>Submitted At:</strong> <?php echo htmlspecialchars($message['submitted_at']); ?></p>
        <p><textarea name="reply" rows="10" cols="50" required></textarea></p>
        <p><button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Send Reply</button></p>


    </form>

</div>


<?php
require_once "footer.php";
?>