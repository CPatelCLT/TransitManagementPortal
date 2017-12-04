<?php
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user['role'] != 'driver') {
        header("Location:../index.php?logout=true");
    }
} else {
    header("Location: ../index.php");
}

include ("../data/route.php");
include ("../data/schedule.php");
$currSchedule = getCurrentEmpSchedule($user['employeeID']);
$nextSchedule = getNextEmpSchedule($user['employeeID']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/sticky-footer.css">
    <title>Dashboard</title>
</head>
<body>

<?php include("driver_header.php"); ?>

<div class="row">
    <?php include("driver_sidebar.php"); ?>
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1 style="margin-left:15px;margin-right:15px;">Schedule</h1>

        <div class="row card-group" style="padding-right: 15px; padding-left: 15px;">
            <div class="card border-dark col-6" style="margin-left: 10px;">
                <div class="card-body align-items-center" style="flex: 0;">
                    <h2 class="card-title">Current Schedule</h2>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Shift Start:<span class="float-right"><?php echo $currSchedule['shiftstart']?></span></li>
                    <li class="list-group-item">Shift End:<span class="float-right"><?php echo $currSchedule['shiftend']?></span></li>
                    <li class="list-group-item">Bus:<?php echo '<a href="driver_bus.php?bus='.$currSchedule['busID'].'" class="float-right">Bus '.$currSchedule['busID'].'</a>';?></li>
                    <li class="list-group-item">Route:<?php echo '<a href="driver_route.php?route='.$currSchedule['routeID'].'" class="float-right">Route '.$currSchedule['routeID'].'</a>';?></li>
                </ul>
            </div>
            <div class="card border-dark col-6" style="margin-right: 10px;">
                <div class="card-body align-items-center" style="flex: 0;">
                    <h2 class="card-title">Next Schedule</h2>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Shift Start:<span class="float-right"><?php echo $nextSchedule['shiftstart']?></span></li>
                    <li class="list-group-item">Shift End:<span class="float-right"><?php echo $nextSchedule['shiftend']?></span></li>
                    <li class="list-group-item">Bus:<?php echo '<a href="driver_bus.php?bus='.$nextSchedule['busID'].'" class="float-right">Bus '.$nextSchedule['busID'].'</a>';?></li>
                    <li class="list-group-item">Route:<?php echo '<a href="driver_route.php?route='.$nextSchedule['routeID'].'" class="float-right">Route '.$nextSchedule['routeID'].'</a>';?></li>
                </ul>
            </div>
        </div>
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>

