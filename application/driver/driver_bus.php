<?php
include ("../data/fleet.php");
include ("../data/schedule.php");
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    echo $user['employeeID'];
} else {
    //header("Location: ../index.php");
}

if(isset($_GET['bus'])) {
    $bus = getBusByID($_GET['bus']);
} else {
    $bus = getBusByID(getCurrentEmpSchedule($user['employeeID'])['busID']);
}

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
        <h1 style="margin-left:15px;margin-right:15px;">Bus</h1>
        <div class="row card-group" style="padding-right: 15px; padding-left: 15px;">
            <div class="card border-dark col-8" style="margin-left: 10px;">
                <div class="card-body align-items-center">
                    <!-- TODO Add the modal to request maintenance -->
                    <button class="btn btn-info float-right">Request<br/>Maintenance</button>
                    <h2 class="card-title"><?php echo "Bus ".$bus['busID']?></h2>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Mileage:<span class="float-right"><?php echo $bus['mileage']?></span></li>
                    <li class="list-group-item">Miles to service:<span class="float-right"><?php echo $bus['checkinterval']?></span></li>
                </ul>
            </div>
            <div class="card border-dark col-4" style="margin-right: 15px;">
                <div class="card-body">
                    <img class="card-img" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" src=<?php echo '../img/bus' .sprintf('%03d', $bus['busID']) .'.jpg'?>>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>

