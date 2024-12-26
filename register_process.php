<?php
// Include the database connection
include('db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form input values
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $terms = isset($_POST['terms']) ? 1 : 0; // Check if terms are agreed to

    // Validate that passwords match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit();
    }

    // Prepare SQL query to check if the email already exists
    $sql = "SELECT id FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);

    // Check if prepare failed
    if ($stmt === false) {
        die("SQL error: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // If email exists, show an error
    if ($stmt->num_rows > 0) {
        echo "Email is already taken.";
        exit();
    }

    // Insert the new user data into the database (without password hashing)
    $sql = "INSERT INTO user (full_name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if prepare failed
    if ($stmt === false) {
        die("SQL error: " . $conn->error);
    }

    $stmt->bind_param("sss", $fullName, $email, $password);  // Do not hash password here

    // Execute the query and check if insertion is successful
    if ($stmt->execute()) {
        echo "Registration successful!";
        // Redirect to login page
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
