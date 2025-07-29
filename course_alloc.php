

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEAT ALLOCATION IN PROCESS</title>
</head>
<body>
    
    <?php
    
    include "seatalloc.php";
    $_SESSION['college'] = $_GET['college'];
    ?>
<div class="container">
<div class="form-group">
    <form action="course_save.php" method="GET">
            <label for="colleges">Selected College:</label>
            <?php
            $college = $_GET['college'];?>
            <input type="text" class="form-control" value="<?php echo $college;?>" name="college" disabled>
</form>
<form class="form-group" method='GET' action="course_save.php">
<label  for="course">Select a Course:</label>
<select class="form-control form-select" id="course" name="course">
    <option value="">Select</option>
    <?php
    mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
    $conn = new mysqli("localhost", "root", "","datastd");
    
        $selectedCollege = $_GET['college'];
    
        // Fetch courses offered by the selected college
        $courseQuery = "SELECT course_name FROM $selectedCollege";
        $courseResult = mysqli_query($conn, $courseQuery);

        // Check if the query was successful
        if ($courseResult && mysqli_num_rows($courseResult) > 0) {
            // Generate course options dynamically
            while ($courseRow = mysqli_fetch_assoc($courseResult)) {
                $courseName = $courseRow['course_name'];
                echo "<option value='$courseName'>$courseName</option>";
            }
        } else {
            echo "<option value=''>No courses available</option>";
        }
        
    ?>
    </select>
    </div>
   
    <?php

    $id = $_GET['btn'];
    $_SESSION['applicationid'] = $id;
    
    ?>
    <div class="form-group">
    <div class="d-grid gap-2 mt-5 mb-5">
            <button  type="submit" class="btn btn-success mt-5 ml-5 mb-5" name="btn1" value="<?php echo $id;?>">SUBMIT</button></div></div>
            </form>
</div>

</body>
</html> 


