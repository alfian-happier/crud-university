<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "university";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get ID from query string
$id = intval($_GET['id']);

// SQL to fetch data
$sql = "SELECT * FROM mahasiswa WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Output data as JSON
echo json_encode($row);

$conn->close();
?>
