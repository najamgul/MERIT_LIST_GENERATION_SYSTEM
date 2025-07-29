
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .bckimg {
    background-image: url('imgs/image.jpg');
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
                        <a class="nav-link border border-success-subtle bg-success rounded bg-opacity-25 mb-2" href="dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border border-success-subtle bg-info rounded bg-opacity-25 mb-2" href="profile.php">View Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border border-success-subtle bg-info rounded bg-opacity-25 mb-2" href="seatalloc.php">seat allocation</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Header -->
            <div class="py-2 ml-5 mt-4 mb-4 border-bottom">
                <h2>Welcome to Dashboard</h2></div>
<?php
// Database connection parameters

include 'connectdb.php';

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a student is present in the database
$studentId = $_SESSION['applicationid']; 

$sql = "SELECT * FROM allotedstds WHERE applicationid = '$studentId'";
$result = $conn->query($sql);
if($result && $result->num_rows > 0){
while ($row = $result->fetch_assoc()) {
    $college= $row["college"];
    $course= $row["course"];
}?>
<div class="container">
        <div class="card bg-primary bg-opacity-25">
            <div class="card-body">
                <h5 class="card-title">Student Information</h5>
                    <p class="card-text">you have been allocated a seat</p>
                    <p class="card-text"><strong>alloted college is <?php echo $college ; ?></strong></p>
                    <p class="card-text"><strong>alloted course is <?php echo $course ; ?></strong></p>
<?php } else { ?>
                    <p class="card-text">you are yet to take a college.</p>
                <?php } ?>
            </div>
        </div>
    </div>

<?php
// Close the database connection
$conn->close();
?>


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
