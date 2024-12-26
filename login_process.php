<?php
// Start session
session_start();

// Include database connection
include('db_connection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate that email and password are not empty
    if (empty($email) || empty($password)) {
        echo "Email and password are required!";
        exit();
    }

    // Prepare SQL query to fetch the user based on the email
    $sql = "SELECT id, full_name, password FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);

    // Check if statement is prepared successfully
    if ($stmt === false) {
        die("SQL error: " . $conn->error);
    }

    // Bind the email parameter
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        // Bind result to variables
        $stmt->bind_result($id, $fullName, $hashedPassword);
        $stmt->fetch();

        // Verify the password (you should use password_hash and password_verify in a real system)
        if ($password === $hashedPassword) { // Direct comparison (not recommended in production)
            // Correct password, start session and redirect to the dashboard
            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $email;
            $_SESSION['full_name'] = $fullName;

            // Redirect to the dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            // Incorrect password
            echo "Invalid password.";
        }
    } else {
        // Email not found
        echo "No user found with that email.";
    }

    // Close statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>
