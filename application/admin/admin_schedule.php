<?php
require_once('../data/schedule.php');
require_once('../data/employee.php');
require_once('../data/route.php');
require_once('../data/fleet.php');

session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user['role'] != 'admin') {
        header("Location:../index.php?logout=true");
    }
} else {
    header("Location: ../index.php");
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "add":
            if (true) {
                $status = insertSchedule($_POST['employeeID'],$_POST['busID'],$_POST['routeID'],$_POST['shiftstart'],$_POST['shiftend']);
                //TODO Add status alert/toast
                header("Refresh:0");
            } else {
                // TODO Add alert for invalid entry
            }
            break;
        case "delete":
            $status = deleteSchedule($_POST['scheduleID']);
            //TODO Add status alert/toast
            header("Refresh:0");
            break;
    }
}

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
            <div class="row justify-content-between" style="padding-right: 15px">
                <h2 class="col-5">Fleet</h2>
                <div class="btn-group col-2" role="group" aria-label="Button group with nested dropdown"
                     style="margin-right: 30px">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSchedule">Create Schedule</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addSchedule" tabindex="-1" role="dialog"
                     aria-labelledby="addNewScheduleLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form action="#" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create Schedule</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="inputRoute" class="col-sm-2 col-form-label">Select Route</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="inputRoute" name="routeID">
                                                <?php
                                                foreach (getAllRoutes() as $route) {
                                                    echo '<option value="'.$route['routeID'].'">'.$route['name'].'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputRoute" class="col-sm-2 col-form-label">Select Driver</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="inputRoute" name="employeeID">
                                                <?php
                                                foreach (getEmployeesByRole('driver') as $driver) {
                                                    echo '<option value="'.$driver['employeeID'].'">'.$driver['username'].'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputRoute" class="col-sm-2 col-form-label">Select Bus</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="inputRoute" name="busID">
                                                <?php
                                                foreach (getBusesByActive(1) as $bus) {
                                                    echo '<option value="'.$bus['busID'].'">Bus '.$bus['busID'].'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputMileage" class="col-sm-2 col-form-label">Start Time</label>
                                        <input class="form-control col-8" type="datetime-local" name="shiftstart"/>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputMileage" class="col-sm-2 col-form-label">End Time</label>
                                        <input class="form-control col-8" type="datetime-local" name="shiftend"/>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button name="action" value="add" type="submit" class="btn btn-primary">Create Schedule</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                                <input type="hidden" name="scheduleID" value="'.$schedule['scheduleID'].'"/>
                                <button class="btn btn-outline-success my-2 my-sm-0" name="action" value="delete">Delete</button>
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