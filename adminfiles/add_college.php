<?php
include "../connectdb.php";
if($_SERVER['REQUEST_METHOD'] === 'POST'){

$college = $_POST['college'];
$total_seats = $_POST['total_seats'];

$sql = "insert into seat_matrix (colleges , total_seats ) values ( '$college','$total_seats')";
if ($conn->query($sql) === TRUE) {
    echo "<h3 class='text-center alert alert-success'>College added successfully</h3>";
} else {
    echo "<h2 class='text-center alert alert-danger'>Error: " . $sql . "<br>" . $conn->error."</h2>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../bootstrap.css">
</head>
<body>
    <div class="container">
        <?php include 'header.php' ?>
        
        <form method="POST" action="">
        <div class="form-group">
                <label for="course">Enter College name</label>
                <input type="text" class="form-control" id="course" name="college">
            </div>
            <div class="form-group">
                <label for="omSeats">Add total Seats:</label>
                <input type="number" class="form-control" id="omseats" name="total_seats">
            </div>
            <div class="form-group">
            <div class="d-grid gap-2 mt-5 mb-5">
            <button  type="submit" class="btn btn-success mt-5 ml-5 mb-5">ADD college</button>
        </div>
    </div>
    </form>
    <footer class="footer mt-auto py-3">
    <div class="container bg-info bg-opacity-10 ">
        <div class="position-absolute bottom-0 start-50 translate-middle-x mb-3">
        <span class="text-muted">Designed By @NaJam</span>
    </div></div>
</footer>
