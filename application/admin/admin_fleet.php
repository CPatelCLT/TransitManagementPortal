<?php
require_once('../data/fleet.php');
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    echo $user['employeeID'];
} else {
    //header("Location: ../index.php");
}

if (isset($_GET['bus'])) {
    showBus($_GET['bus']);
}

if (isset($_GET['filter'])) {
    switch ($_GET['filter']) {
        case "all":
            $buses = getAllBuses();
            break;
        case "active":
            $buses = getBusesByActive("1");
            break;
        case "inactive":
            $buses = getBusesByActive("0");
            break;
        default:
            $buses = getAllBuses();
    }
} else {
    $buses = getAllBuses();
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "add":
            if (isset($_POST['mileage'])) {
                $status = insertBus($_POST['mileage']);
                //TODO Add status alert/toast
            } else {
                // TODO Add alert for invalid entry
            }
            break;
        case "delete":
            $status = deleteBus($_POST['busID']);
            //TODO Add status alert/toast
            header("Refresh:0");
            break;
        case "update":
            if (isset($_POST['mileage']) && isset($_POST['busID'])) {
                $status = updateBus($_POST['busID'], $_POST['mileage']);
                //TODO Add status alert/toast
                header("Refresh:0");
            } else {
                // TODO Add alert for invalid entry
            }
            break;
    }
}

$nextBus=getNextBus();

function showBus($busID)
{
    $bus = getBusByID($busID);
    echo '<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="showBus">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Emploee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputBusNo" class="col-sm-2 col-form-label">Bus Number</label>
                        <div class="col-sm-10">
                            '.$bus['busID'].'
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputMileage" class="col-sm-2 col-form-label">Mileage</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="inputMileage" placeholder="mileage"
                                   name="mileage" value="'.$bus['mileage'].'">
                        </div>
                    </div>';
    echo '</div>
<div class="modal-footer">
    <input type="hidden" name="busID" value="' . $bus['busID'] . '">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button name="action" value="update" type="submit" class="btn btn-primary">Update Bus</button>
    <button name="action" value="delete" type="submit" class="btn btn-primary">Delete Bus</button>
</div>
</form>
</div>
</div>
</div>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script>
    $("#showBus").modal("show")
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
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap.js"></script>

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

<?php include("admin_header.php"); ?>


<div class="container-fluid">
    <div class="row">
        <?php include("admin_sidebar.php"); ?>
        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
            <div class="row justify-content-between" style="padding-right: 15px">
                <h2 class="col-5">Fleet</h2>
                <div class="btn-group col-2" role="group" aria-label="Button group with nested dropdown"
                     style="margin-right: 30px">
                    <div class="btn-group" role="group">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter Buses
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="?filter=all">All</a>
                            <a class="dropdown-item" href="?filter=active">Active</a>
                            <a class="dropdown-item" href="?filter=inactive">Inactive</a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addBus">Add
                        New
                    </button>
                </div>
                <!-- Modal -->
                <!-- TODO Change this to be for buses -->
                <div class="modal fade" id="addBus" tabindex="-1" role="dialog"
                     aria-labelledby="addNewBusLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form action="#" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Bus</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="inputBusNo" class="col-sm-2 col-form-label">Bus Number</label>
                                        <div class="col-sm-10">
                                            <?php echo $nextBus;?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputMileage" class="col-sm-2 col-form-label">Mileage</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="inputMileage" placeholder="mileage"
                                                   name="mileage">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button name="action" value="add" type="submit" class="btn btn-primary">Add
                                        Bus
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="card-columns">

                <?php
                foreach ($buses as $bus) {
                    echo '<a href="?bus='.$bus['busID'].'"><div class="card">';
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