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
echo '<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="maintenanceRequest">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Request Maintenance</h5>
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
                        <label for="inputMileage" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea placeholder="Please enter the problem with the bus" style="width:100%" rows="5" ></textarea>
                        </div>
                    </div>';
echo '</div>
<div class="modal-footer">
    <input type="hidden" name="busID" value="' . $bus['busID'] . '">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button name="action" value="update" type="submit" class="btn btn-primary">Request Maintenance</button>
</div>
</form>
</div>
</div>
</div>'

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
                    <button data-toggle="modal" data-target="#maintenanceRequest" class="btn btn-info float-right">Request<br/>Maintenance</button>
                    <h2 class="card-title"><?php echo "Bus ".$bus['busID']?></h2>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Mileage:<span class="float-right"><?php echo $bus['mileage']?></span></li>
                    <li class="list-group-item">Miles to service:<span class="float-right"><?php echo $bus['mileage']%15000;?></span></li>
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

