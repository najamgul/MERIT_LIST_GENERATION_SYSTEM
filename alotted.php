<?php
include "course_alloc.php";
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
$conn = new mysqli("localhost", "root", "", "datastd");
$stmt = $conn->query("SELECT * FROM `allotedstds`");    
// Retrieve the form data
if($stmt-> num_rows === 1){
    $row=$stmt->fetch_assoc();
    $appid = $row["applicationid"];
    $category = $row['category'];
    $college = $row['college'];
    $course = $row['course'];
    ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <h1 class="text-center"><?php echo $college;?> SELECTED COLLEGE</h1>
</div>
<div class="col-xs-6">
    <h1 class="text-center"><?php echo $course;?> SELECTED COURSE</h1>
</div>
</div>
</div>
    <?php
}
else{
    echo "Error in retrieving form data";
}


// Prepare and execute the SQL query to update the allocated seats
$stmt = $conn->query("UPDATE $college SET $category = $category - 1 WHERE  course_name= $course");
// Check if the update was successful
if ($stmt->num_rows > 0) {
    echo "Seat allocated successfully!";
} else {
    echo "Seat allocation failed.";
}

$conn->close();
?>