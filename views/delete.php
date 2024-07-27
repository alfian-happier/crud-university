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

// SQL to delete data
$sql = "DELETE FROM mahasiswa WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    // Redirect to mahasiswa.php after deletion
    header("Location: mahasiswa.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
