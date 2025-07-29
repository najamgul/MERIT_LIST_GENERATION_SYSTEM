<?php
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);

session_start(); // Start a session to store user data

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "datastd";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the form data
    $appID = $_POST['app_id'];
    $password = $_POST['pass'];
    echo "$password";

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT * FROM student_data WHERE applicationid = ?");
    $stmt->bind_param("s", $appID);
    $stmt->execute();
    $result = $stmt->get_result();


    // Check if a row is returned
    if ($result->num_rows === 1) {
        // Retrieve the user's data
        $row = $result->fetch_assoc();
        $storedPassword = $row['pass'];

        // Verify the password
        if (password_verify($password, $storedPassword)) {
            // Authentication successful
            $_SESSION['app_id'] = $appID;
            header('Location: dashboard.php'); // Redirect to a protected page
            exit();
        }
    }

    // Invalid credentials
    $error = "Invalid app ID or password";

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <head><link rel="stylesheet" type="text/css" href="bootstrap.css"></head>
    <h2>Login</h2>
    <div class="container">
    <form class="form-group" method="POST" action="login.php">
        <label>App ID:</label>
        <input class="form-control type="text" name="app_id" required><br><br>
        <label>Password:</label>
        <input class="form-control" type="password" name="pass" required><br><br>
        <input class="btn btn-primary" type="submit" value="Login">
    </form>
