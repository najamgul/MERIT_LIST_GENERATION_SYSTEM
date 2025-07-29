<?php
include 'connectdb.php';
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get the selected course and seat values from the form

    $college = $_GET['college'];
    $courseid = $_GET['courseid'];
    $selectedCourse = $_GET['course'];
    $omSeats = $_GET['omseats'];
    $rbaSeats = $_GET['rbaseats'];
    $scSeats = $_GET['scseats'];
    

    // Insert the course and seat data into the table

    
        // Insert the course and seats into the database
        $sql = "INSERT INTO  $college (courseid, course_name, OM, RBA, SC) VALUES ('$courseid', '$selectedCourse', '$omSeats', '$rbaSeats', '$scSeats')";
    
        if ($conn->query($sql) === TRUE) {
            echo "Course added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    // Close the database connection
    $conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
    <div class="container">
        <?php include 'header.php' ?>
        <div class="row">
            <div><h2 class="alert alert-success mt-5 text-center">Course added successfully</h2></div>
        </div>
        <div class="d-grid gap-2 ml-5 mr-5 mt-5 mb-5">
            <a href="admindashboard.php"><button  type="button" class="btn btn-success">Go Back to Dashboard</button></a></div>
        
    </div>
    <footer class="footer mt-auto py-3">
    <div class="container bg-info bg-opacity-10 ">
        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-3">
        <span class="text-muted">Designed By @NaJam</span>
    </div></div>
</footer>
</body>
</html>
