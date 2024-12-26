<?php
// Include the database connection
include('db_connection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $program = $_POST['program'];
    $year = $_POST['year'];

    // SQL query to insert the new student into the database (without the profile_picture column)
    $sql = "INSERT INTO student (student_name, student_id, email, phone, program, year)
            VALUES ('$student_name', '$student_id', '$email', '$phone', '$program', '$year')";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the page with success
        header("Location: students.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
