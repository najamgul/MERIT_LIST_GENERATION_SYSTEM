<!DOCTYPE html>
<html>
<head>
    <title>College Seat Allotment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Connect to the MySQL database
            $connection = mysqli_connect("localhost", "root", "", "datastd");

            // Check if the connection was successful
            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Retrieve form data
            $fullName = $_POST['fullName'];
            $email = $_POST['email'];
            $contactNumber = $_POST['contactNumber'];
            $dob = $_POST['dob'];
            $coursePreference = $_POST['coursePreference'];
            $educationalQualifications = $_POST['educationalQualifications'];
            $category = $_POST['category'];
            $allottedSeat = $_POST['allottedSeat'];
            
            // Check if the query was successful
            if ($result) {
                echo "<div class='alert alert-success' role='alert'>Data stored successfully!</div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error storing data: " . mysqli_error($connection) . "</div>";
            }

            // Close the database connection
            mysqli_close($connection);
        }
        ?>
        <h1>College Seat Allotment</h1>

        <form method="POST">
            <h2>Personal Information</h2>
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="contactNumber">Contact Number</label>
                <input type="tel" class="form-control" id="contactNumber" name="contactNumber" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" required>
            </div>

            <h1>College and Course Selection</h1>
            <div class="form-group">

    
            <div class="form-group>
            <label for="course">Select a Course:</label>
            <select id="course" name="course">
                <option value="">Select</option>
                <?php
                if (isset($_POST['college']) && !empty($_POST['college'])) {
                    $selectedCollege = $_POST['college'];
                    
                    // Fetch courses offered by the selected college
                    $courseQuery = "SELECT courseID, course_name FROM $selectedCollege";
                    $courseResult = mysqli_query($connection, $courseQuery);

                    // Check if the query was successful
                    if ($courseResult && mysqli_num_rows($courseResult) > 0) {
                        // Generate course options dynamically
                        while ($courseRow = mysqli_fetch_assoc($courseResult)) {
                            $courseId = $courseRow['courseID'];
                            $courseName = $courseRow['course_name'];
                            echo "<option value='$courseId'>$courseName</option>";
                        }
                    } else {
                        echo "<option value=''>No courses available</option>";
                    }
                }
                ?>
            </select>
            </div>
        <?php
    else {
        echo "No colleges available.";
    }

    // Close the database connection
    mysqli_close($connection);
    ?>
            <h2>Category/Reservation</h2>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="dropdown" required>     
                        <option value="">Select Category</option>
                        <option value="General">General</option>
                        <option value="SC/ST">SC/ST</option>
                        <option value="OBC">OBC</option>
                    </select>
                </div>
            <h2>Allotment Details</h2>
            <div class="form-group">
                <label for="allottedSeat">Allotted Seat</label>
                <input type="text" class="form-control" id="allottedSeat" name="allottedSeat">
            </div>
            <div class="form-group">
                <label for="allotmentLetter">Allotment Letter</label>
                <input type="file" class="form-control-file" id="allotmentLetter" name="allotmentLetter">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>