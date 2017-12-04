<?php

require_once('../data/route.php');
require_once('../data/customer.php');

session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $favorites = getCustomerFavorites($user['userID']);
}
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


<div class="container-fluid" style="text-align:match-parent;">
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
            <div class="container-fluid">
                <div class="row">
                <!-- TODO Change color of card text back to normal text instead of link -->
                <!-- TODO Add pill for if route is active right now or not -->
                <?php
                foreach ($favorites as $favorite) {
                    echo '<div class="col-4"><a href=?route=' . $favorite['routeID'] . '><div class="card">
                    <img class="card-img-top rounded" src="../img/rte' . sprintf('%03d', $favorite['routeID']) . '.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Route  ' . $favorite['routeID'] . '</h4>
                        <p class="card-text">Days of week: M,W,F</p>
                    </div>
                </div></a></div>';
                }
                ?>
                </div>
            </div>

        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>