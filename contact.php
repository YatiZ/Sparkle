<?php
session_start();

// Database configuration
$db_host = 'localhost'; // Database host
$db_user = 'root';      // Database username
$db_pass = '';          // Database password
$db_name = 'store'; // Database name

// Create connection
$con = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// Initialize variables
$name = $email = $message = '';
$name_err = $email_err = $message_err = '';
$form_submitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate name
  if (empty(trim($_POST["name"]))) {
    $name_err = "Please enter your name.";
  } else {
    $name = trim($_POST["name"]);
  }

  // Validate email
  if (empty(trim($_POST["email"]))) {
    $email_err = "Please enter your email address.";
  } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
    $email_err = "Invalid email address.";
  } else {
    $email = trim($_POST["email"]);
  }

  // Validate message
  if (empty(trim($_POST["message"]))) {
    $message_err = "Please enter a message.";
  } else {
    $message = trim($_POST["message"]);
  }

  // Check input errors before sending email and saving to database
  if (empty($name_err) && empty($email_err) && empty($message_err)) {
    $to = "your-email@example.com"; // Replace with your email
    $subject = "Contact Form Submission from $name";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
      // Prepare an insert statement
      $sql = "INSERT INTO contact_submissions (name, email, message) VALUES (?, ?, ?)";
      if ($stmt = $con->prepare($sql)) {
        // Bind variables to the prepared statement
        $stmt->bind_param("sss", $name, $email, $message);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
          $form_submitted = true;
        } else {
          echo "Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
      }
    } else {
      echo "Failed to send email. Please try again later.";
    }
  }
}

// Close connection
$con->close();
?>

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
<h2 class="text-center main-title">Contact Us</h2>
<div class="contact-container">

  <form class="card" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" id="name"
        name="name" value="<?php echo $name; ?>">
      <div class="invalid-feedback">
        <?php echo $name_err; ?>
      </div>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" id="email"
        name="email" value="<?php echo $email; ?>">
      <div class="invalid-feedback">
        <?php echo $email_err; ?>
      </div>
    </div>

    <div class="mb-3">
      <label for="message" class="form-label">Message</label>
      <textarea class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>" id="message"
        name="message" rows="4"><?php echo $message; ?></textarea>
      <div class="invalid-feedback">
        <?php echo $message_err; ?>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Send</button>
  </form>
</div>

<?php
require 'footer.php';
?>

<?php if ($form_submitted): ?>
  <script>
    window.onload = function () {
      var alertBox = document.createElement("div");
      alertBox.className = "custom-alert";
      alertBox.innerText = "Your message has been sent successfully!";
      document.body.appendChild(alertBox);

      setTimeout(function () {
        alertBox.style.opacity = "0";
        setTimeout(function () {
          document.body.removeChild(alertBox);
        }, 1000); // Wait for 1 second to remove the alert box after fading out
      }, 5000); // 10 seconds
    }
  </script>
<?php endif; ?>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var alert = document.getElementById('successAlert');
    if (alert) {
      setTimeout(function () {
        alert.style.opacity = '0';
        setTimeout(function () {
          alert.style.display = 'none';
        }, 500); // Match the transition duration
      }, 10000); // 10 seconds
    }
  });
</script>
</body>

</html>