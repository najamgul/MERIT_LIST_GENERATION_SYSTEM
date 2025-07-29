<?php
// Database connection parameters
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
include '../connectdb.php';

// Check the connection
if ($conn->error) {
    die("Connection failed: " . $conn->error);
}

// Fetch total number of students registered
$sqlStudents = "SELECT COUNT(*) as totalStudents FROM student_data";
$resultStudents = $conn->query($sqlStudents);
$rowStudents = $resultStudents->fetch_assoc();
$totalStudents = $rowStudents['totalStudents'];

$sqlalloc = "SELECT COUNT(*) as totalalloc FROM allotedstds";
$resultStudent = $conn->query($sqlalloc);
$rowStudent = $resultStudent->fetch_assoc();
$totalStudent = $rowStudent['totalalloc'];


// Fetch total number of colleges
$sqlColleges = "SELECT COUNT(*) as totalColleges FROM seat_matrix";
$resultColleges = $conn->query($sqlColleges);
$rowColleges = $resultColleges->fetch_assoc();
$totalColleges = $rowColleges['totalColleges'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        .bckimg {
    background-image: url('../imgs/image.jpg');
    background-size: cover;
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    filter: blur(5px); /* Adjust the blur radius as needed */
    opacity: 0.3; /* Adjust the opacity as needed */
    z-index: -1;
}
        </style>
</head>
<body>
    <div class="bckimg"></div>
    <?php include 'header.php'; ?>
    

<!-- Sidebar -->
<div class="container">
    <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-transparent sidebar mb-4 mt-5">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <!-- Add sidebar links here -->
                    <li class="nav-item">
                        <a class="nav-link border border-success-subtle bg-success rounded bg-opacity-25 mb-2" href="admindashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border border-success-subtle bg-info rounded bg-opacity-25 mb-2" href="RegisteredStudents.php">Check Registered Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border border-success-subtle bg-info rounded bg-opacity-25 mb-2" href="AllocStudents.php">seat Allocation list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border border-success-subtle bg-info rounded bg-opacity-25 mb-2" href="add_course.php">Add Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border border-success-subtle bg-info rounded bg-opacity-25 mb-2" href="add_college.php">Add college</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Header -->
            <div class="py-2 ml-5 mt-4 mb-4 border-bottom">
                <h2>Welcome to Dashboard</h2></div>
                <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card bg-transparent">
                    <div class="card-body">
                        <h5 class="card-title">Total Students</h5>
                        <p class="card-text"><i class="fa fa-users"></i> <?php echo $totalStudents; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card bg-transparent">
                    <div class="card-body">
                        <h5 class="card-title">total number of allocations  </h5>
                        <p class="card-text"><i class="fa fa-book"></i> <?php echo $totalStudent; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card bg-transparent">
                    <div class="card-body">
                        <h5 class="card-title">Total Colleges</h5>
                        <p class="card-text"><i class="fa fa-university"></i> <?php echo $totalColleges; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


            <!-- Add dashboard content here -->
            <!-- For example, you can add charts, tables, or other widgets here -->

        </main>
        </div> 
</div>
        <footer class="footer mt-auto py-3">
    <div class="container bg-info bg-opacity-10 ">
        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-3">
        <span class="text-muted">Designed By @NaJam</span>
    </div></div>
</footer>
    
<!-- Include Bootstrap JS (jQuery is required) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
<?php
// Close the database connection
$conn->close();
?>