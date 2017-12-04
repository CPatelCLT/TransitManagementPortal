<?php

require_once('../data/route.php');
require_once('../data/customer.php');
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $userID = $user['userID'];
    if (isset($user['role'])) {
        header("Location:../index.php?logout=true");
    }
} else {
    header("Location: ../index.php");
}

$favorites = getCustomerFavorites($userID);


if (isset($_GET['route'])) {
    showFavorite($_GET['route']);
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "add":
            if (isset($_POST['routeID'])) {
                $status = insertFavorite($user['userID'],$_POST['routeID']);
                //TODO Add status alert/toast
                header("Refresh:0");
            } else {
                // TODO Add alert for invalid entry
            }
            break;
        case "delete":
            $status = deleteFavorite($user['userID'],$_POST['routeID']);
            //TODO Add status alert/toast
            header("Refresh:0");
            break;
    }
}

function showFavorite($routeID)
{
    $route = getRouteByID($routeID);
    $stops = getRouteSequence($routeID);
    echo '<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="showRoute">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Favorited Route</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputBusNo" class="col-sm-4">Route Name</label>
                        <div class="col-sm-8">
                            '.$route['name'].'
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputBusNo" class="col-sm-4">Route Number</label>
                        <div class="col-sm-8">
                            '.$route['routeID'].'
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputMileage" class="col-sm-4">Days of Week</label>
                        <div class="col-sm-6">
                            '.$route['DoW'].'
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="inputMileage" class="col-sm-4">Start Time</label>
                        <div class="col-sm-6">
                            '.$route['start'].'
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputMileage" class="col-sm-4">End Time</label>
                        <div class="col-sm-6">
                            '.$route['stop'].'
                        </div>
                    </div>
                                    <div class="form-group row">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th class="text-center" style="font-size:2em;">Route Stops</th>
                                            </tr>
                                            </thead>
                                            <tbody>';
                                                foreach ($stops as $stop) {
                                                    echo '<tr class="text-center"><td>'.$stop['name'].'</td></tr>';
                                                }
                                            echo '</tbody>
                                        </table>
                                    </div>';
    echo '</div>
<div class="modal-footer">
    <input type="hidden" name="routeID" value="' . $route['routeID'] . '">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button name="action" value="delete" type="submit" class="btn btn-primary">Remove Favorite</button>
</div>
</form>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script>
    $("#showRoute").modal("show")
</script>';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/sticky-footer.css">
    <script>
        if(typeof window.history.pushState == 'function') {
            window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
        }
    </script>
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
            <div class="row justify-content-between" style="padding-right: 15px">
                <h2 class="col-5">Favorite Routes</h2>
                <div class="btn-group col-2" role="group" aria-label="Button group with nested dropdown"
                     style="margin-right: 30px">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addFav">Add
                        Favorite
                    </button>
                </div>
                <!-- Modal -->
                <!-- TODO Change this to be for buses -->
                <div class="modal fade" id="addFav" tabindex="-1" role="dialog"
                     aria-labelledby="addNewBusLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form action="#" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Favorite</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="inputRoute" class="col-sm-2 col-form-label">Route Name</label>
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
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button name="action" value="add" type="submit" class="btn btn-primary">Add Favorite
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="container-fluid">
                <div class="row">
                <!-- TODO Change color of card text back to normal text instead of link -->
                <!-- TODO Add pill for if route is active right now or not -->
                <?php
                foreach ($favorites as $favorite) {
                    echo '<div class="col-6"><a href=?route=' . $favorite['routeID'] . '><div class="card">
                    <img class="card-img-top rounded" src="../img/rte' . sprintf('%03d', $favorite['routeID']) . '.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">' . $favorite['name'] . ' Route</h4>
                        <p class="card-text">Days of week: <br/>' . $favorite['DoW'] . '</p>
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