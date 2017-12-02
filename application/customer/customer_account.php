<?php
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    echo $user['userID'];
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

<?php include("customer_header.php"); ?>

<div class="row">
    <?php include("customer_sidebar.php"); ?>
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1 style="margin-left:15px;margin-right:15px;">Profile</h1>
        <div class="row card-group" style="padding-right: 15px; padding-left: 15px;">
            <div class="card border-dark col-8" style="margin-left: 10px;">
                <div class="card-body align-items-center">
                    <!-- TODO Add the modal to edit the profile -->
                    <button class="btn btn-info float-right">Edit Profile</button>
                    <h2 class="card-title"><?php echo $user['firstname']." ".$user['lastname'] ?></h2>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">User Name:<span class="float-right"><?php echo $user['username']?></span></li>
                    <li class="list-group-item">Password:<span class="float-right"><?php echo $user['password']?></span></li>
                    <li class="list-group-item">Email:<span class="float-right"><?php echo $user['email']?></span></li>
                </ul>
            </div>
            <div class="card border-dark col-4" style="margin-right: 15px;">
                <div class="card-body">
                    <img class="card-img" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" src=<?php echo '../img/cus' .sprintf('%03d', $user['userID']) .'.jpg'?>>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>

