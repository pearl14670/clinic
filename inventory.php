<?php
// Start the session
session_start();

// Include the database connection
include('db_connection.php');

// Query to fetch medicine data
$sql = "SELECT ID, medicine_name, quantity, created_at, updated_at FROM medicines";
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

    <title>SB Admin 2 - Medicine Inventory</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        /* Custom styles for the inventory table */
        .inventory-table td, .inventory-table th {
            padding: 12px;
            vertical-align: middle;
        }

        .inventory-table th {
            background-color: #f8f9fc;
            font-weight: bold;
            color: #4e73df;
        }

        .inventory-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .inventory-table td {
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

                <!-- Medicine Inventory Table -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Medicine Inventory</h6>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMedicineModal">
                                    <i class="fas fa-plus"></i> Add Medicine
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="inventory-table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Medicine Name</th>
                                                    <th>Quantity</th>
                                                    <th>Created At</th>
                                                    <th>Updated At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row['ID'] . "</td>";
                                                        echo "<td>" . $row['medicine_name'] . "</td>";
                                                        echo "<td>" . $row['quantity'] . "</td>";
                                                        echo "<td>" . $row['created_at'] . "</td>";
                                                        echo "<td>" . $row['updated_at'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='5'>No medicines found</td></tr>";
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
            <!-- Add Medicine Modal -->
            <div class="modal fade" id="addMedicineModal" tabindex="-1" role="dialog" aria-labelledby="addMedicineModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addMedicineModalLabel">Add New Medicine</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="insertprocess.php" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="medicine_name">Medicine Name</label>
                                    <input type="text" class="form-control" id="medicine_name" name="medicine_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Medicine</button>
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
