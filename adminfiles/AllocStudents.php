<?php
include '../connectdb.php';
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
// Fetch student information from the database using JOIN
$sql = "SELECT * FROM student_data INNER JOIN allotedstds ON student_data.applicationid = allotedstds.applicationid INNER JOIN detailstd
 ON student_data.applicationid = detailstd.applicationid ORDER BY detailstd.percent DESC;";
$result = $conn->query($sql);
$students = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Registered Student Information</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
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
    opacity: 0.2; /* Adjust the opacity as needed */
    z-index: -1;
}
        </style>
</head>
<body>
    <div class="bckimg"></div>
    <div class="container">
        <?php include 'header.php'; ?>
        <h1>Student Information</h1>
        <table class="table table-info table-striped border-primary table-bordered">
            <thead>
                <tr>
                    <th>Application ID</th>
                    <th>Name</th>
                    <th>college</th>
                    <th>course</th>
                    <th>category</th>
                    <th>Percentage</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($students as $student) { ?>
                    <tr>
                        <td><?php echo $student['applicationid']; ?></td>
                        <td><?php echo $student['name']; ?></td>
                        <td><?php echo $student['college']; ?></td>
                        <td><?php echo $student['course']; ?></td>
                        <td><?php echo $student['category']; ?></td>
                        <td><?php echo $student['percent']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
         <a href="admindashboard.php" class="btn btn-primary text-center ml-5 pr-1"><i class="fa fa-dashboard" aria-hidden="true"></i>BACK TO DASHBOARD</a> 
    </div>

        
    </div>
</body>
</html>