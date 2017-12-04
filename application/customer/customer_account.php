<?php
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    //header("Location: ../index.php");
}

echo '<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="showEmployee">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Your Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputFirst" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="inputFirst" placeholder="First Name" name="firstName" value="' . $user['firstname'] . '">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputLast" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="inputLast" placeholder="Last Name" name="lastName" value="' . $user['lastname'] . '">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="inputUsername" placeholder="Username" name="username" value="' . $user['username'] . '">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" placeholder="Password" name="password" value="' . $user['password'] . '">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="' . $user['email'] . '">
                        </div>
                    </div>
                    <div class="form-group row">';

echo '</div>
</div>
<div class="modal-footer">
    <input type="hidden" name="employeeID" value="' . $user['userID'] . '">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button name="action" value="update" type="submit" class="btn btn-primary">Update Employee</button>
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

<?php include("customer_header.php"); ?>

<div class="row">
    <?php include("customer_sidebar.php"); ?>
    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1 style="margin-left:15px;margin-right:15px;">Profile</h1>
        <div class="row card-group" style="padding-right: 15px; padding-left: 15px;">
            <div class="card border-dark col-8" style="margin-left: 10px;">
                <div class="card-body align-items-center">
                    <button class="btn btn-info float-right" data-toggle="modal" data-target="#showEmployee">Edit Profile</button>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>

