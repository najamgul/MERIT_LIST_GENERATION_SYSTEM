<!DOCTYPE html>
<html>
<head>
    <title>Student Form</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
    <div class="container">
<?php
session_start();
$id = $_SESSION['applicationid']; 
$conn = new mysqli("localhost", "root", "", "datastd");
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
$sql = "SELECT name, applicationid, email, phone,dob FROM student_data where applicationid = '$id'";
$result = $conn->query($sql);
if ($result){

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Fetch each row and store the values in variables
    while ($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $id = $row["applicationid"];
        $email = $row["email"];
        $phone = $row["phone"];
        $dob = $row["dob"];
    }
}
}
 
$sqll = "SELECT category, applicationid, marks, percent, passyear FROM detailstd WHERE applicationid = '$id'";
$resultt = $conn->query($sqll);
if ($resultt){

// Check if any rows were returned
if ($resultt->num_rows > 0) {
    // Fetch each row and store the values in variables
    while ($roww = $resultt->fetch_assoc()) {
        $category = $roww["category"];
        $obtained = $roww["marks"];
        $percent  = $roww["percent"];
        $passyear = $roww["passyear"];
        ?>
        <?php
        $_SESSION['category'] = $category;
        
        ?>


        <form method="GET" action="course_alloc.php">
        <div class="form-group">
           
            <h4 class="text-center mt-5 mb-2"> your application ID is <?php echo $id;?>
        </div>
            <h2 class="text-center">Personal Information</h2>

            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="contactNumber">Contact Number</label>
                <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>" disabled>
            </div>
            <?php
    }
}
}
$conn->close();
?>
            <div class="form-group">
            <label for="category">Choose Category</label>
            <select class="form-control form-select" id="category" name="category" value="<?php echo $category;?>" disabled>
                <option value="<?php $category;?>"><?php echo $category;?></option>
                
    </select>
    </div>
            

            <h2> academic details</h2>
            <div class="form-group">
                <label for="marks">obtained Marks</label>
                <input type="number" class="form-control" id="obtained" name="obtained" value="<?php echo $obtained; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="percent">Percentage</label>
                <input type="number" class="form-control" id="percent" name="percent" value="<?php echo $percent; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="passing year">Passing Year</label>
                <input type="number" class="form-control" id="passyear" name="passyear" value="<?php echo $passyear; ?>" disabled>
            </div>
            <h2> College selection </h2>
            <?php
            mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
    // Connect to the MySQL database
    $connection = new mysqli("localhost", "root", "", "datastd");

    // Check if the connection was successful
    if (!$connection) {
        die("Connection failed: " . $conn->error);
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
            <div class="form-group">
            <div class="d-grid gap-2 mt-5 mb-5">
            <button  type="submit" class="btn btn-success mt-5 ml-5 mb-5" name="btn" value="<?php echo $id; ?>">NEXT</button></div></div>
        </form>
    </div>
</body>
</html>


