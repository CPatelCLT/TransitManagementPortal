<?php

require_once('../data/route.php');
require_once('../data/customer.php');

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

<?php include("customer_header.php"); ?>


<div class="container-fluid">
    <div class="row">
        <?php include("customer_sidebar.php"); ?>
        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
            <div class="row" style="padding-right: 15px">
                <h2 class="col-9">Routes</h2>
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
            <div class="card-columns">
                <!-- TODO Change color of card text back to normal text instead of link -->
                <?php
                foreach ($employees as $employee) {
                    echo '<a href=?employee=' . $employee['employeeID'] . '><div class="card">
                    <img class="card-img-top rounded" src="../img/emp' . sprintf('%03d', $employee['employeeID']) . '.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">' . $employee['firstname'] . ' ' . $employee['lastname'] . '</h4>
                        <p class="card-text">' . $employee['role'] . '</p>
                    </div>
                </div></a>';
                }
                ?>
            </div>

        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>