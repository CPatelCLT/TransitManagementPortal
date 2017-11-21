<?php
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    echo $user['employeeID'];
} else {
    //header("Location: ../index.php");
}

include ("../data/route.php");
include ("../data/schedule.php");
$route = getRouteByID(getCurrentEmpSchedule($user['employeeID'])['routeID']);
$routeSeq = getRouteSequence($route['routeID']);
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
        <h1 style="margin-left:15px;margin-right:15px;">Route</h1>

        <div class="row card-group" style="padding-right: 15px; padding-left: 15px;">
            <div class="card border-dark col-6" style="margin-left: 10px;">
                <div class="card-body align-items-center" style="flex: 0;">
                    <h2 class="card-title"><?php echo "Route ".$route['routeID']?></h2>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Distance:<span class="float-right"><?php echo $route['distance']." Miles"?></span></li>
                    <li class="list-group-item">Days of Week:<span class="float-right">All Weekdays</span></li>
                    <li class="list-group-item">Start Time:<span class="float-right"><?php echo $route['start']?></span></li>
                    <li class="list-group-item">End Time:<span class="float-right"><?php echo $route['stop']?></span></li>
                </ul>
            </div>
            <div class="card border-dark col-6" style="margin-right: 15px;">
                <div class="card-body align-items-center"style="flex: 0; padding-bottom: 0px;">
                <h2 class="card-title">Stop Sequence</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="text-left">Stop Name</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter=1;
                            foreach ($routeSeq as $stop) {

                                echo "<tr>
                                    <th scope='row'>$counter</th>
                                    <td>".$stop['name']."</td>
                                </tr>";
                                $counter++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>

