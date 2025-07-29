<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="bootstrap.css">
    <title>REGISTRATION</title>

</head>
<body>
<?php
$conn = new mysqli("localhost","root","","datastd");   
// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->error);
}
$appid = generateApplicationID();
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$category = $_POST['category'];
$marks = $_POST['obtained'];
$passyear = $_POST['passyear'];
$percent = $_POST['percent'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$pin = $_POST['pincode'];
$dist = $_POST['district'];
$hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
$sql2 = ("SELECT * FROM student_data WHERE email = '$email'");
$resultt = $conn->query($sql2);
if ($resultt) {
    if ($resultt->num_rows > 0) {
        die ("<div class='alert alert-danger mt-5 rounded'><h1 style='text-align:center;'>Dear ".$name." your Email ".$email ." is already Registered.</h1></div>");
    }
    // Handle the duplicate email case
}
$sql3 = ("SELECT * FROM student_data WHERE phone = '$phone'");
$result = $conn->query($sql3);
if($result){
    if ($result->num_rows > 0) {
        die ("<div class='alert alert-danger'><h1 style='text-align:center;'>Dear ".$name." your phone number ".$phone ." already exists.1</h1></div>");
    }
}
$sql = ("INSERT INTO student_data (applicationid, name, email, pass, phone,gender, dob) VALUES 
('$appid', '$name', '$email', '$hashedPassword', '$phone', '$gender', '$dob')");
$sql1 = ("INSERT INTO detailstd (applicationid, category, address, pincode, district, marks, passyear, percent) VALUES('$appid', '$category', '$address', '$pin', '$dist', '$marks', '$passyear', '$percent')");
// Prepare and execute the SQL statement
if ($conn->query($sql)) {
    if($conn->query($sql1)){
    
        echo "<div class='alert alert-success mt-5'><h1  style='text-align:center;'>Dear ".$name." you have been registered successfully<br>";
        echo "your application id is <div class='user-select-all'>".$appid."</div></h1></div>";
        ?>
        <div class="row justify-content-center mt-5">
        <div class="col-md-6">
        <a href="loginformsession.php" class="btn btn-primary btn-lg btn-block">Student Login</a>
      </div></div><?php
    }
}
else {
    echo "Sorry ".$name." an error occurred".$conn->error;
}

$conn->close();

function generateApplicationID() {
    // Add your custom logic here to generate a unique ID
    // For example, you can use a combination of a timestamp and a random number
    $timestamp = time();
    $randomNumber = mt_rand(1000, 9999);
    $appid = "stu-" . $timestamp . "-" . $randomNumber;
    return $appid;
}

// Redirect to a success page or display a success message

?>
</body>
</html>
