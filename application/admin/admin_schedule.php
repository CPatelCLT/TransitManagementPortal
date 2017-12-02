<?php

require_once('../data/schedule.php');
require_once('../data/employee.php');
$schedules = getAllSchedule();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/sticky-footer.css">

    <!-- TODO Make column change work... -->
    <style>
        @include "../css/bootstrap.css";
        .card-columns {

        @include media-breakpoint-only(xl) {
            column-count: 5;
        }
        @include media-breakpoint-only(lg) {
            column-count: 4;
        }
        @include media-breakpoint-only(md) {
            column-count: 3;
        }
        @include media-breakpoint-only(sm) {
            column-count: 2;
        }
        column-count:4;
        }
        .card {
            height = 100px;
        }
    </style>
    <title>Dashboard</title>
</head>
<body>

<?php include("admin_header.php"); ?>


<div class="container-fluid">
    <div class="row">
        <?php include("admin_sidebar.php"); ?>
        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
            <div class="row" style="padding-right: 15px">
                <h2 class="col-9">Schedule</h2>
                <div class="btn-group col-2">
                    <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        Filter
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
                <button class="btn btn-success col-1">Add New</button>
            </div>
            <hr/>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Route Number</th>
                        <th>Bus Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Shift Start</th>
                        <th>Shift End</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($schedules as $schedule) {
                        $employee = getEmployeeByID($schedule['employeeID']);
                        echo '<tr>
                        <td>' . $schedule['routeID'] . '</td>
                        <td>' . $schedule['busID'] . '</td>
                        <td>' . $employee['firstname'] . '</td>
                        <td>' . $employee['lastname'] . '</td>
                        <td>' . $schedule['shiftstart'] . '</td>
                        <td>' . $schedule['shiftend'] . '</td>
                        <td>
                            <form method="post">
                                <button class="btn btn-outline-success my-2 my-sm-0">Update</button>
                                <button class="btn btn-outline-success my-2 my-sm-0">Delete</button>
                            </form>
                        </td>
                    </tr>';
                    }?>
                    </tbody>
                </table>
            </div>

        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>