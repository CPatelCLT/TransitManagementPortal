<?php
require_once('../data/maintenance.php');
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

$buses = getBusesByActive("1");

    if (isset($_POST['busID']) && isset($_POST['reason'])) {
        $maintID = addJob($_POST['busID'], $_POST['reason']);
        $status = updateJob($maintID,$user['employeeID'], 'claim');
        if($status == 1){
            header("Location:mechanic_active.php");
        }
    }


function showBus($busID)
{
    $bus = getBusByID($busID);
    echo '<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="addJob" xmlns="http://www.w3.org/1999/html">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pull for Maintenance: Bus #' .$bus['busID'].'</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="addJob" class="col-sm-2 col-form-label">Reason</label>
                        <div class="col-sm-10">
                         <textarea class="form-control" id="addJob" placeholder="Please Describe the problem."
                                name="reason"></textarea>
                        </div>
                    </div>';
    echo '</div>
<div class="modal-footer">
<input type="hidden" name="busID" value="'.$bus['busID'].'"
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Add</button>
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
    $("#addJob").modal("show")
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

<?php include("mechanic_header.php"); ?>


<div class="container-fluid">
    <div class="row">
        <?php include("mechanic_sidebar.php"); ?>
        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
            <div class="row justify-content-between" style="padding-right: 15px">
                <h2 class="col-5">Fleet</h2>
                <!-- Modal -->
                <!-- TODO Change this to be for buses -->
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