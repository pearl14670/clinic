<?php
// Start the session
session_start();

// Include the database connection
include('db_connection.php');

// Query to fetch student data
$sql = "SELECT student_name, student_id, email, phone, program, year  FROM student";
$result = $conn->query($sql);

// Check for errors
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Student Profiles</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        /* Custom styles for the student profile table */
        .student-profile-image {
            width: 50px;
            height: 50px;
            object-fit: cover;  
            border-radius: 50%;
        }

        .student-table td, .student-table th {
            padding: 10px;
            vertical-align: middle;
        }

        .student-table th {
            background-color: #f8f9fc;
            font-weight: bold;
            color: #4e73df;
        }

        .student-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .student-table td {
            border-top: 1px solid #ddd;
        }

        .card-body {
            padding: 20px;
        }

        .card-header {
            background-color: #f8f9fc;
        }

        .table-responsive {
            margin-top: 20px;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "sidebar.php"; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Name -->
                        <li class="nav-item dropdown no-arrow">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php 
                                    // Display the logged-in user's name
                                    if (isset($_SESSION['full_name'])) {
                                        echo $_SESSION['full_name']; 
                                    } else {
                                        echo "Guest"; 
                                    }
                                ?>
                            </span>
                        </li>
                    </ul>

                </nav>

                <!-- Student Profiles Table -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Student Profiles</h6>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStudentModal">
                                    <i class="fas fa-plus"></i> Add Student
                                </button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="student-table">
                                            <thead>
                                                <tr>
                                                    <th>Student Name</th>
                                                    <th>Student ID</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Program</th>
                                                    <th>Year</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row['student_name'] . "</td>";
                                                        echo "<td>" . $row['student_id'] . "</td>";
                                                        echo "<td>" . $row['email'] . "</td>";
                                                        echo "<td>" . $row['phone'] . "</td>";
                                                        echo "<td>" . $row['program'] . "</td>";
                                                        echo "<td>" . $row['year'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='9'>No students found</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
            <!-- Add Student Modal -->
                <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="add_student.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="student_name">Student Name</label>
                                        <input type="text" class="form-control" id="student_name" name="student_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="student_id">Student ID</label>
                                        <input type="text" class="form-control" id="student_id" name="student_id" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="program">Program or Course</label>
                                         <select class="form-control" id="program" name="program" required>
                                           <option value="" disabled selected>Select Program or Course</option>
                                           <option value="course1">BS in Information Techonology</option>
                                           <option value="course2">BS in Marine Biology</option>
                                           <option value="program1">BS in Fishries</option>
                                           <option value="program2">BS in Agriculture</option>
                                        </select>
                                      </div>
                                    <div class="form-group">
                                    <label for="year">Year</label>
                                    <select class="form-control" id="year" name="year" required>
                                        <option value="">Select Year</option>
                                        <option value="1st Year">1st Year</option>
                                        <option value="2nd Year">2nd Year</option>
                                        <option value="3rd Year">3rd Year</option>
                                        <option value="4th Year">4th Year</option>
                                    </select>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add Student</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php
// Close the database connection
$conn->close();
?>
