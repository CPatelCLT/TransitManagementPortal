<?php
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    echo $user['employeeID'];
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
<?php include("mechanic_header.php"); ?>
<div class="row">
    <?php include("mechanic_sidebar.php"); ?>
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <div class="card w-75"">
        <div class="card-body">
            <!--TODO Fix the text alignment of the title -->
            <img class="rounded float-right clearfix" width="15%" src=<?php echo '../img/emp' .sprintf('%03d', $user['employeeID']) .'.jpg'?> alt="Card image cap">
            <h4 class="card-title align-text-bottom"><?php echo $user['firstname']." ".$user['lastname'] ?> </h4>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">User Name:<span class="float-right"><?php echo $user['username']?></span></li>
            <li class="list-group-item">Password:<span class="float-right"><?php echo $user['password']?></span></li>
            <li class="list-group-item">Email:<span class="float-right"><?php echo $user['email']?></span></li>
        </ul>
        <div class="card-body">
            <!-- TODO make button not look like shit #MAKETHEBUTTONGREATAGAIN -->
            <a href="#" class="btn btn-primary">Edit Profile</a>
        </div>
</div>

</div>
</form>
</div>
</main>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>

