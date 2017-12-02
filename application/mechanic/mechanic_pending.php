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

if(isset($_POST['action'])) {
    $status = updateJob($_POST['maintID'], $user['employeeID'], "claim");
}

$jobs = getAllPending();

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
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Bus</th>
                        <th>Description</th>
                        <th>Claim</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($jobs as $job) {
                        echo '<tr> <form method="post" action="#">
                        <td class="align-content-center">' . $job['busID'] . '</td>
                        <td>' . $job['maintItem'] . '</td>
                        <td>
                                <input type="hidden" name="maintID" value="'.$job['maintenanceID'].'"/>
                                <button class="btn btn-outline-success my-2 my-sm-0" name="action" value="claim">Claim</button>
                            
                        </td>
                        </form>
                    </tr>';
                    }?>
                    </tbody>
                </table>
            </div>

        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>