<?php

require_once('../data/route.php');

$routes = getAllRoutes();
$stops = getAllStops();

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
                <h2 class="col-5">Routes</h2>
                <div class="btn-group col-2" role="group" aria-label="Button group with nested dropdown"
                     style="margin-right: 30px">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addRoute">Add
                        New Route
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addRoute" tabindex="-1" role="dialog"
                     aria-labelledby="addNewRouteLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg w-75" role="document">
                        <div class="modal-content">
                            <form action="#" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add
                                        New Route</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="inputFirst" class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="inputFirst" placeholder="First Name"
                                                   name="firstName">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputLast" class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="inputLast" placeholder="Last Name"
                                                   name="lastName">
                                        </div>
                                    </div>
                                    <script src="//rubaxa.github.io/Sortable/Sortable.js"></script>

                                    <div class="form-group row">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Current Stops</th>
                                                <th class="text-center">Available Stops</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><div id="currentStops" class="list-group border-light" style="padding:20px;">
<!--                                                        <div class="list-group-item">Charlotte</div>-->
<!--                                                        <div class="list-group-item">NYC</div>-->
<!--                                                        <div class="list-group-item">DC</div>-->
<!--                                                        <div class="list-group-item">Miami</div>-->
                                                    </div></td>
                                                <td><div id="availableStops" class="list-group"  style="padding:20px;">
                                                        <?php
                                                        foreach($stops as $stop) {
                                                            echo '<div class="list-group-item" data-id="'.$stop['stopID'].'">'.$stop['name'].'</div>';
                                                        }
                                                        ?>
                                                    </div></td>
                                            </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="hidden" id="stops" name="stops" value=""/>
                                    <button name="action" value="add" type="submit" class="btn btn-primary">Add Route
                                    </button>
                                </div>
                            </form>
                            <script>
                                Sortable.create(currentStops, { group:"stops",
                                    store: {
                                        /**
                                         * Get the order of elements. Called once during initialization.
                                         * @param   {Sortable}  sortable
                                         * @returns {Array}
                                         */
                                        get: function (sortable) {
                                            var order = localStorage.getItem(sortable.options.group.name);
                                            return order ? order.split('|') : [];
                                        },

                                        /**
                                         * Save the order of elements. Called onEnd (when the item is dropped).
                                         * @param {Sortable}  sortable
                                         */
                                        set: function (sortable) {
                                            var order = sortable.toArray();
                                            document.getElementById('stops').setAttribute('value', sortable.toArray());
                                            localStorage.setItem(sortable.options.group.name, order.join('|'));
                                        }
                                    }

                                });

                                Sortable.create(availableStops, { group:"stops" });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="card-columns">
                <?php
                foreach ($routes as $route) {
                    echo '<div class="card">
                    <img class="card-img-top rounded" src="../img/rte' . sprintf('%03d', $route['routeID']) . '.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Route ' . $route['routeID'] . '</h4>
                        <p class="card-text">Distance: ' . $route['distance'] . '</p>
                    </div>
                </div>';
                }
                ?>
            </div>

        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>