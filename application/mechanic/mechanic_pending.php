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
    maintainBus($_POST['busID'], 0);
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
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">Bus</th>
                        <th class="text-justify">Description</th>
                        <th>Claim</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($jobs as $job) {
                        echo '<tr> <form method="post" action="#">
                        <td class="text-center">' . $job['busID'] . '</td>
                        <td>' . $job['maintItem'] . '</td>
                        <td class="text-center">
                                <input type="hidden" name="maintID" value="'.$job['maintenanceID'].'"/>
                                <input type="hidden" name="busID" value="'.$job['busID'].'"/>
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>