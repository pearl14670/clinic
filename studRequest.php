<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Student Requests</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
        include "sidebar.php";
        ?>
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

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>

                <!-- Student Requests Section -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Student Requests</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Request Table -->
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Request ID</th>
                                                <th>Student Name</th>
                                                <th>Request Type</th>
                                                <th>Status</th>
                                                <th>Date Submitted</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Mock Data of Requests -->
                                            <tr>
                                                <td>REQ-001</td>
                                                <td>VISMARK M. COTANDA</td>
                                                <td>PARACETAMOL</td>
                                                <td><span class="badge badge-warning">Pending</span></td>
                                                <td>2024-11-10</td>
                                            </tr>
                                            <tr>
                                                <td>REQ-002</td>
                                                <td>JELOU RANA</td>
                                                <td>IBUPROFEN</td>
                                                <td><span class="badge badge-success">Resolved</span></td>
                                                <td>2024-11-09</td>
                                            </tr>
                                            <tr>
                                                <td>REQ-003</td>
                                                <td>ERIKA OLAYVAR</td>
                                                <td>AMOXICILLIN</td>
                                                <td><span class="badge badge-danger">Urgent</span></td>
                                                <td>2024-11-08</td>
                                            </tr>
                                            <tr>
                                                <td>REQ-004</td>
                                                <td>PERLAS DE PAZ</td>
                                                <td>PARACETAMOL</td>
                                                <td><span class="badge badge-info">In Progress</span></td>
                                                <td>2024-11-07</td>
                                                <tr>
                                                <td>REQ-005</td>
                                                <td>RUBY TOMON</td>
                                                <td>IBUPROFEN</td>
                                                <td><span class="badge badge-info">In Progress</span></td>
                                                <td>2024-11-07</td>
                                                <tr>
                                                <td>REQ-006</td>
                                                <td>JESSICA TOMON</td>
                                                <td>AMOXICILLIN</td>
                                                <td><span class="badge badge-info">In Progress</span></td>
                                                <td>2024-11-07</td>
                                            </tr>
                                            </tr>   
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
