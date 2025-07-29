<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datastd";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM students ORDER BY percentage DESC";

// Execute the query
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["rollno"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["percentage"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No results found.</td></tr>";
}

// Close the database connection
$conn->close();
?>