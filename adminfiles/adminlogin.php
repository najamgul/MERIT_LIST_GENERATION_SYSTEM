<?php
// Start a session
session_start();

// Check if the user is already logged in, redirect to the secure page if true


// Establish a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datastd";
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['pass'];

  // Prepare the SQL query to fetch user details
    $stmt = $conn->prepare("SELECT * FROM adminlogin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $storedPassword = $row['pass'];
    if(password_verify($password, $storedPassword)){
    // Authentication successful
    $_SESSION['username'] = $username;
    header("Location: admindashboard.php");
    }
  } 
  else {
    // Authentication failed
    $error_message = "Invalid credentials. Please try again.";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    
  <div class="container">
  <?php include "header_Wel.php";?>
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <h2 class="text-center mb-4">Login for Administrator</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <div class="form-group">
            <label for="app_id">username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="pass" required>
          </div>
          <?php if (isset($error_message)): ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
          <?php endif; ?>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/js/bootstrap.min.js"></script>
</body>
</html>