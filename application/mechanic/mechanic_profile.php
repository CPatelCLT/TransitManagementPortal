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

<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="../dashboard.html">Dashboard</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"> <a class="nav-link" href="#"> item1 </a></li>
                <li class="nav-item"> <a class="nav-link" href="#"> item2 </a></li>
            </ul>
            <form class="form-inline mt-2 mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</header>







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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>

