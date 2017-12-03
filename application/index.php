<?php
require_once('data/employee.php');
require_once('data/customer.php');

if(isset($_POST['type'])) {
    switch ($_POST['type']){
        case "customer":
            $user = doCustomerLogin($_POST['username'], $_POST['password']);
            break;
        case "employee":
            $user = doEmployeeLogin($_POST['username'], $_POST['password']);
            break;
    }
    if ($user != false) {
        session_start();
        $_SESSION['user'] = $user;
        switch ($user['role']) {
            case 'admin':
                header("Location: admin/admin_home.php");
                break;
            case 'driver':
                header("Location: driver/driver_home.php");
                break;
            case 'mechanic':
                header("Location: mechanic/mechanic_home.php");
                break;
            default:
                header("Location: customer/customer_home.php");
                break;
        }
    }
    else {
        echo "wrong username or password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/signin.css">

    <script>
        if(typeof window.history.pushState == 'function') {
            window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
        }
    </script>

    <title>Login</title>
</head>
<body style="background-image: url('img/loginBackground.jpg'); background-size: 100% auto;">
<div class="jumbotron  d-flex align-items-center" style="background:transparent;">
    <div class="container">
        <form class="form-signin bg-light" method="post" action="#">
            <h1 class="text-center">Transit Portal</h1>
            <hr/>
            <h3 class="form-signin-heading text-center">Please Sign In</h3>
            <label for="inputUsername" class="sr-only">Email Address</label>
            <input id="inputUsername" class="form-control" placeholder="Username" required autofocus name="username">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
            <div class="btn-group" role="group">
                <button class="btn btn-outline-primary" name="type" value="customer">Customer Sign In</button>
                <button class="btn btn-outline-success" name="type" value="employee">Employee Sign In</button>
            </div>
        </form>
    </div>
</div>
</body>
<script src="../js/bootstrap.bundle.min.js"></script>
</html>