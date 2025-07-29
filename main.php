<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Student List</h1>
    <table>
        <thead>
            <tr>
                <th>Roll Number</th>
                <th>Name</th>
                <th>Percentage</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "connectdb.php"; 
            // Create a connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            $sql = "SELECT * FROM students ORDER BY percentage DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // Output data for each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["rollno"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["percentage"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No results found.</td></tr>";
            }
            
            // Close the database connection
            $conn->close();
            ?>
        </tbody>
    </table> 
    <button><a href="main.php?file=gfgpdf" download>DOWNLOAD PDF</a></button>
</body>
</html>
