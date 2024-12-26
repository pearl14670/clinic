<?php
$servername = "localhost";
$username = "root"; // Replace with your DB username
$password = ""; // Replace with your DB password
$dbname = "med"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $medicine_name = $_POST['medicine_name'];
    $quantity = $_POST['quantity'];

    // Update query
    $sql = "UPDATE medicines SET medicine_name = '$medicine_name', quantity = '$quantity', updated_at = NOW() WHERE ID = $id";

    if ($conn->query($sql) === TRUE) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>