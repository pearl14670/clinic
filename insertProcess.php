<?php
// Include the database connection
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $medicine_name = $_POST['medicine_name'];
    $quantity = $_POST['quantity'];

    // Insert the new medicine into the database
    $sql = "INSERT INTO medicines (medicine_name, quantity) VALUES ('$medicine_name', '$quantity')";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the medicine inventory page
        header("Location: inventory.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
