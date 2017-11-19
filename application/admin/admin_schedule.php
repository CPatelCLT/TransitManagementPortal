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

    <!-- TODO Make this work... -->
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

<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="../dashboard.html">Dashboard</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="#"> item1 </a></li>
                <li class="nav-item"><a class="nav-link" href="#"> item2 </a></li>
            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</header>


<div class="container-fluid">
    <div class="row">
        <?php include("adminSidebar.php"); ?>
        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
            <div class="row" style="padding-right: 15px">
                <h2 class="col-9">Employees</h2>
                <!-- TODO Get filtered results, make dropdown actually show options -->
                <div class="btn-group col-2">
                    <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        Filter Roles
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
                                <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Update</button>
                                <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Delete</button>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>