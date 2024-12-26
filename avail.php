<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Requests Calendar</title>

    <!-- Custom fonts and Bootstrap for styling -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        /* Calendar container */
        .calendar-container {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
            margin-top: 20px;
        }

        /* Styling each day cell */
        .calendar-day {
            position: relative;
            background-color: #ffffff;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            cursor: pointer;
        }

        /* Day number */
        .calendar-day h5 {
            font-weight: bold;
            color: #333;
            margin: 0;
            font-size: 16px;
        }

        /* Hover effect for day cells */
        .calendar-day:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
        }

        /* Badge styling for different statuses */
        .badge {
            position: absolute;
            bottom: 8px;
            left: 8px;
            padding: 4px 8px;
            font-size: 12px;
            color: white;
            border-radius: 12px;
            text-transform: capitalize;
        }

        .badge-warning { background-color: #f6c23e; }
        .badge-success { background-color: #1cc88a; }
        .badge-danger { background-color: #e74a3b; }
        .badge-info { background-color: #36b9cc; }

        /* Calendar navigation header */
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #4e73df;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
        }

        .calendar-header .calendar-month {
            font-size: 18px;
            font-weight: bold;
        }

        /* Navigation button styling */
        .calendar-navigation button {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .calendar-navigation button:hover {
            color: #d1d1d1;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .calendar-container {
                grid-template-columns: repeat(4, 1fr);
            }
            .calendar-header .calendar-month {
                font-size: 16px;
            }
        }

        @media (max-width: 576px) {
            .calendar-container {
                grid-template-columns: repeat(2, 1fr);
            }
            .calendar-header {
                flex-direction: column;
                text-align: center;
            }
            .calendar-header .calendar-month {
                font-size: 14px;
            }
        }
    </style>

</head>

<body id="page-top">

    <div id="wrapper">
        <!-- Sidebar -->
        <?php include "sidebar.php"; ?>
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>

                <!-- Calendar Section -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Student Requests Calendar</h6>
                                </div>
                                <div class="card-body">
                                    <div class="calendar-header">
                                        <button id="prev-month"><i class="fas fa-chevron-left"></i></button>
                                        <div class="calendar-month" id="calendar-month">November 2024</div>
                                        <button id="next-month"><i class="fas fa-chevron-right"></i></button>
                                    </div>

                                    <div class="calendar-container" id="calendar-days">
                                        <!-- Days will be dynamically generated -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Student Request Modal -->
    <div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="requestModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="requestModalLabel">Request Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 id="modal-request-type"></h5>
                    <p><strong>Student Name:</strong> <span id="modal-student-name"></span></p>
                    <p><strong>Status:</strong> <span id="modal-status"></span></p>
                    <p><strong>Date:</strong> <span id="modal-date"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        // Sample data (requests with dates)
        const requests = [
            { studentName: "John Doe", requestType: "Leave", status: "Approved", date: "2024-11-10" },
            { studentName: "Jane Smith", requestType: "Meeting", status: "Pending", date: "2024-11-12" },
            { studentName: "Alex Brown", requestType: "Leave", status: "Denied", date: "2024-11-15" }
        ];
        
        const renderCalendar = (month, year) => {
            const calendarContainer = document.getElementById("calendar-days");
            const calendarMonth = document.getElementById("calendar-month");
            calendarMonth.innerHTML = `${new Date(year, month - 1).toLocaleString('default', { month: 'long' })} ${year}`;

            const firstDay = new Date(year, month - 1, 1).getDay();
            const lastDate = new Date(year, month, 0).getDate();

            calendarContainer.innerHTML = '';

            // Add empty spaces for the first few days of the month
            for (let i = 0; i < firstDay; i++) {
                calendarContainer.innerHTML += `<div class="calendar-day"></div>`;
            }

            Array.from({ length: lastDate }, (_, i) => i + 1).forEach(day => {
                const dayDiv = document.createElement("div");
                dayDiv.classList.add("calendar-day");
                dayDiv.innerHTML = `<h5>${day}</h5>`;

                requests.forEach(request => {
                    if (new Date(request.date).getDate() === day && new Date(request.date).getMonth() + 1 === month) {
                        const badge = document.createElement("span");
                        badge.classList.add("badge", `badge-${request.status.toLowerCase().replace(' ', '-')}`);
                        badge.innerText = request.requestType;
                        dayDiv.appendChild(badge);

                        // Add event listener for clicking the day
                        dayDiv.addEventListener('click', () => {
                            // Populate modal with request details
                            document.getElementById('modal-request-type').innerText = request.requestType;
                            document.getElementById('modal-student-name').innerText = request.studentName;
                            document.getElementById('modal-status').innerText = request.status;
                            document.getElementById('modal-date').innerText = request.date;

                            // Show modal
                            $('#requestModal').modal('show');
                        });
                    }
                });

                calendarContainer.appendChild(dayDiv);
            });
        };

        let currentMonth = new Date().getMonth() + 1;
        let currentYear = new Date().getFullYear();
        renderCalendar(currentMonth, currentYear);

        document.getElementById("prev-month").addEventListener("click", () => {
            currentMonth--;
            if (currentMonth < 1) {
                currentMonth = 12;
                currentYear--;
            }
            renderCalendar(currentMonth, currentYear);
        });

        document.getElementById("next-month").addEventListener("click", () => {
            currentMonth++;
            if (currentMonth > 12) {
                currentMonth = 1;
                currentYear++;
            }
            renderCalendar(currentMonth, currentYear);
        });
    </script>

</body>
</html>
