<!DOCTYPE html>
<head>
    <title>allocating . . .</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <?php include 'header.php';?>
<?php
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
$conn = new mysqli("localhost", "root", "", "datastd");
$college = $_SESSION['college'];
$course  = $_SESSION['course'];
$category = $_SESSION['category'];
$id = $_SESSION['applicationid'];
?>
    
    <?php
    $query = "UPDATE $college SET $category = $category - 1 WHERE course_name = ?";
    $statement = mysqli_prepare($conn, $query);
    
    // Bind the parameter
    mysqli_stmt_bind_param($statement, "s", $course);
    
    // Execute the statement
    if (mysqli_stmt_execute($statement)) {
        // Update query executed successfully
        echo "<h2 class='text-center alert alert-success mt-5'>Allocation successful.</h2>";
    }
else {
    echo "<h2 class='text-center'>Seat allocation failed.</h2>";
}


$conn->close();
?>
<div class="container">
        <div class="row mt-5 mb-3">
            <div class="col-sm-6 ">
            <div class="card border-success mb-5 float-start" style="max-width: 18rem;">
  <div class="card-header">College Status</div>
  <div class="card-body">
    <h5 class="card-title">Success</h5>
    <p class="card-text text-success"><b>The college allocation is successful!<br>Alloted college is </b> <h4 class="text-success"><strong><?php echo $college;?></strong></h4></p>
  </div>
</div>
</div>
<div class="col-sm-6 ">
<div class="card border-success mb-3 float-end" style="max-width: 18rem;">
  <div class="card-header">Course Status</div>
  <div class="card-body">
    <h5 class="card-title">Success</h5>
    <p class="card-text text-success">The Course allocation is successful!<br>Alloted Course is <h4 class="text-success"><strong> <?php echo $course;?></strong></h4></p>
  </div>
</div>
</div>
</div>
<a href="dashboard.php"><div class="d-grid gap-2 mt-5 mb-5"><button class="btn border bg-info border-success"><strong>GO back to DashBoard</strong></button></div></a>
</div>

</body>
</html>
