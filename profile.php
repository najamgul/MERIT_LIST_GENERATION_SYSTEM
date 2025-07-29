<?php 
include 'header.php';
include 'connectdb.php';

$appid = $_SESSION['applicationid'];
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
$sql = "SELECT * FROM student_data WHERE applicationid = '$appid'";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result && $result->num_rows > 0) {
    // Fetch each row and store the values in variables
    while ($row = $result->fetch_assoc()) {
        $fname = $row["name"];
        $email = $row["email"];
        $phone = $row["phone"];
        $dob = $row["dob"];
    }
}
$sqll = "SELECT * FROM detailstd WHERE applicationid = '$appid'";
$resultt = $conn->query($sqll);
// Check if any rows were returned
if ($resultt && $resultt->num_rows > 0) {
    // Fetch each row and store the values in variables
    while ($roww = $resultt->fetch_assoc()) {
        $category = $roww["category"];
        $obtained = $roww["marks"];
        $percent  = $roww["percent"];
        $passyear = $roww["passyear"];
        $address = $roww["address"];
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2 class="text-center mt-5 mb-5 border border-info">Student Profile</h2>
    <hr class="border border-danger border-2 opacity-50">
    <table class="table table-bordered">
        <tbody>
            <h3> Personal Details </h3>
            <tr>
                <th>ID</th>
                <td><?php echo $appid ;?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo $fname ;?></td>
            </tr>
            <tr>
            <th>Email</th>
                <td><?php echo $email ;?></td>
            </tr>
            <tr>
            <th>Phone</th>
                <td><?php echo $phone ;?></td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td><?php echo $dob ;?></td>
            </tr>
            <tr>
                <th>Category</th>
                <td><?php echo $category ;?></td>
            </tr>
            
                <th>Address</th>
                <td><?php echo $address ;?></td>
            </tr>
            </tbody>
    </table>
    <table class="table table-bordered">
        <tbody>
            <h3> Acdemic Details</h3>
            <tr>
                <th>Obtained Marks</th>
                <td><?php echo $obtained;?></td>
            </tr>
            <tr>
                <th>Total percentage</th>
                <td><?php echo $percent ;?></td>
            </tr>
            <th>Passing Year</th>
                <td><?php echo $passyear ;?></td>
            </tr>
            <tr>
        </tbody>
    </table>
    <a href="dashboard.php"><div class="d-grid gap-2 mt-5 mb-5"><button type="button"  class="btn btn-info border border-danger mt-5 mb-5">Go Back</button></a>
</div></div>

<!-- Include Bootstrap JS (jQuery is required) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>