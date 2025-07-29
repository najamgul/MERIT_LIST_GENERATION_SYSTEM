<head>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<?php
include "connectdb.php";
include "header.php";
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
$id = $_GET['btn1'];
$college = $_SESSION['college'];
$category = $_SESSION['category'];
$course=$_GET['course'];
$check = "select * from allotedstds where applicationid = ?";

$stmt = mysqli_prepare($conn,$check);
mysqli_stmt_bind_param($stmt, "s", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Entry already exists in the database
    die("<h3 class='text-center alert alert-danger  mt-5'><i class='bi bi-emoji-frown'></i>OOPS! YOU HAVE BEEN GIVEN A SEAT ALREADY</h3>");
}


$sql = "SELECT IF($category = 0, 'true', 'false') AS result FROM kgp where course_name = ?";
$statement_2 = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($statement_2, "s", $course);
$statement_2->execute();
$result = $statement_2->get_result();
if ($result) {
    while ($row = $result->fetch_assoc())
    // Fetch the result
    // Access the result using the alias 'result'
    $resultValue = $row['result'];
} 
    if ($resultValue === 'true') {
        echo "<h3 class='text-center alert alert-danger  mt-5'>sorry! No seats available</h3>";
    }
    else if ($resultValue === 'false') {

// Prepare the insert statement
$query = "INSERT INTO allotedstds (applicationid,course, college, category) VALUES (?, ?, ?, ?)";
$statement = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($statement, "ssss", $id, $course, $college, $category);

// Execute the statement
if (mysqli_stmt_execute($statement)) {
    // Insert query executed successfully
    $_SESSION['course'] = $course;
    header("location: allotedseat.php");
    }
else {
    // Error occurred while executing the insert query
    echo "Error: " . mysqli_error($conn);
}
}


// Close the statement and connection
mysqli_stmt_close($statement_2);

mysqli_close($conn);

?>

