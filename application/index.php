<?php
require_once('../data/employee.php');
require_once('../data/customer.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <title>Login</title>
</head>
<body background="pics/loginBackground.jpg">
<div class="jumbotron  d-flex align-items-center">
    <div class="container">
        <form class="form-signin">
            <h2 class="form-signin-heading">Please Sign In</h2>
            <label for="inputEmail" class="sr-only">Email Address</label>
            <input type="text" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <div class="btn-group" role="group">
                <button class="btn btn-outline-primary" type="submit">Customer Sign In</button>
                <button class="btn btn-outline-success" type="submit">Employee Sign In</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>