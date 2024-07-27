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

// Get form data
$id = intval($_POST['id']);
$nama = $conn->real_escape_string($_POST['nama']);
$nim = $conn->real_escape_string($_POST['nim']);
$fakultas = $conn->real_escape_string($_POST['fakultas']);
$status = $conn->real_escape_string($_POST['status']);

// Handle file upload
$profile = $_FILES['profile']['name'];
if ($profile) {
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["profile"]["name"]);
    move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);
} else {
    // Use old profile image if no new file is uploaded
    $sql = "SELECT profile FROM mahasiswa WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $target_file = $row['profile'];
}

// SQL to update data
$sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', fakultas='$fakultas', status='$status', profile='$target_file' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    header("Location: mahasiswa.php"); // Redirect to the main page
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
