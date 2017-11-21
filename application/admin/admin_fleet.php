<?php

require_once('../data/fleet.php');

$buses = getAllBuses();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/sticky-footer.css">
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.js"></script>


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
                <h2 class="col-9">Buses</h2>
                <div class="btn-group col-2">
                    <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        Filter
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">All</a>
                        <a class="dropdown-item" href="#">Active</a>
                        <a class="dropdown-item" href="#">Inactive</a>
                    </div>
                </div>
                <button type="button" class="btn btn-success col-1" data-toggle="modal" data-target="#addBusModal">
                    Add New
                </button>
                <div class="modal fade" id="addBusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Bus #<?php echo getLastBus(); ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label>Mileage</label>
                                        <input class="form-control" id="inputMiles" aria-describedby="milesHelp" placeholder="Enter miles">
                                        <small id="Mileage hint" class="form-text text-muted">Please enter the number of miles the bus has.</small>

                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="card-columns">

                <?php
                foreach ($buses as $bus) {
                    echo '<div class="card">';
                    echo '<img class="card-img-top rounded" src="../img/bus' . sprintf('%03d', $bus['busID']) . '.jpg" alt="Card image cap">
                    <div class="card-body">';
                    if ($bus['active'] == "1"){
                        echo '<span class="badge badge-pill badge-success float-right" style="font-size: 1.5em;">Active</span>';
                    } else {
                        echo '<span class="badge badge-pill badge-danger float-right" style="font-size: 1.5em;">Inactive</span>';
                    }
                        echo '<h4 class="card-title">Bus ' .$bus['busID'].'</h4>
                        <p class="card-text">' . $bus['mileage'] . ' miles</p>
                    </div>
                </div>';
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