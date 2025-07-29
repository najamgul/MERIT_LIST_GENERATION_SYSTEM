<?php
// Database connection parameters
session_start();
include 'connectdb.php';

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a student is present in the database
$studentId = $_SESSION['applicationid']; // Replace with the actual student ID you want to check
$sql = "SELECT * FROM allotedstds WHERE applicationid = $studentId";
$result = $conn->query($sql);
$studentFound = $result->num_rows > 0;

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Card</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Student Information</h5>
                <?php if ($studentFound) { ?>
                    <p class="card-text">you have been allocated a seat</p>
                <?php } else { ?>
                    <p class="card-text">you are yet to take a college.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>
