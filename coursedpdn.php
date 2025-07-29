<div class="form-group">
<label for="course">Select a Course:</label>
<select class="form-control" id="course" name="course_name">
    <option value="">Select</option>
    <?php
    $connection = mysqli_connect("localhost", "root", "", "datastd");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if(isset($_POST['hello'])){
        $college = $_POST['college'];
        // Fetch courses offered by the selected college
    $courseQuery = "SELECT courseID, course_name FROM $college";
    $courseResult = mysqli_query($conn, $courseQuery);
        // Check if the query was successful
    if ($courseResult && mysqli_num_rows($courseResult) > 0){

            // Generate course options dynamically
        while ($courseRow = mysqli_fetch_assoc($courseResult)) {
            $courseId = $courseRow['courseID'];
            $courseName = $courseRow['course_name'];
            echo "<option value='$courseId'>$courseName</option>";
        }
    }
}
else {
    echo "<option value=''>No courses available</option>";
}    
echo "</select>";
mysqli_close($connection);
?>
</div>