<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../bootstrap.css">
</head>
<body>
    <div class="container">
        <?php include 'header.php' ?>
        
        <form method="GET" action="add_course_back.php">
        <h2>Select a college </h2>
            <?php
            mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
    // Connect to the MySQL database
    $connection = new mysqli("localhost", "root", "", "datastd");

    // Check if the connection was successful
    if (!$connection) {
        die("Connection failed: " . $connection->error);
    }

    // Fetch colleges from the database
    $collegeQuery = "SELECT colleges FROM seat_matrix";
    $collegeResult = $connection->query($collegeQuery);

    // Check if the query was successful
    if ($collegeResult && mysqli_num_rows($collegeResult) > 0) {
        ?>
        <div class="form-group">
            <label for="colleges">Select a College:</label>
            <select class="form-control form-select" id="colleges" name="college">
                <option value="">Select a College</option>
        <?php
                // Generate college options dynamically
                while ($collegeRow = mysqli_fetch_assoc($collegeResult)) {
                    
                    $collegeName = $collegeRow['colleges'];
                    echo "<option value='$collegeName'>$collegeName</option>";
                }
            }
            $connection->close();
        ?>
            </select>
            </div>
            <h2>Add a Course</h2>
            <div class="form-group">
                <label for="course">Course ID</label>
                <input type="text" class="form-control" id="courseid" name="courseid">
            </div>
            <div class="form-group">
                <label for="course">Course Name:</label>
                <input type="text" class="form-control" id="course" name="course">
            </div>
            <div class="form-group">
                <label for="omSeats">OM Seats:</label>
                <input type="number" class="form-control" id="omseats" name="omseats">
            </div>
            <div class="form-group">
                <label for="rbaSeats">RBA Seats:</label>
                <input type="number" class="form-control" id="rbaseats" name="rbaseats">
            </div>
            <div class="form-group">
                <label for="scSeats">SC Seats:</label>
                <input type="number" class="form-control" id="scseats" name="scseats">
            </div>
            <button type="submit" class="btn btn-primary mt-5 mb-5" name="submit">Add Course</button>
        </form>
    </div>
    <footer class="footer mt-auto py-3">
    <div class="container bg-info bg-opacity-10 ">
        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-3">
        <span class="text-muted">Designed By @NaJam</span>
    </div></div>
</footer>

</body>
</html>
