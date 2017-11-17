<?php

require_once ('../data/employee.php');

$employees = getAllEmployees();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/sticky-footer.css">

    <!-- TODO Make this work... -->
    <style>
        @include "../css/bootstrap.css";
        .card-columns {
        @include media-breakpoint-only(xl) {
            column-count: 5;
        }
        @include media-breakpoint-only(lg) {
            column-count: 4;
        }
        @include media-breakpoint-only(md) {
            column-count: 3;
        }
        @include media-breakpoint-only(sm) {
            column-count: 2;
        }
        column-count: 4;
        }
        .card {
            height=100px;
        }
    </style>
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


<div class="container-fluid">
    <div class="row">
        <?php include("views/adminSidebar.php"); ?>
        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
            <h2 data-spy="affix">Employees</h2>
            <div class="card-columns">
                <div class="card text-center">
                    <img class="card-img" src="..." alt="Card image">
                    <div class="card-body">
                        <a href="#" class="btn btn-primary">Add</a>
                    </div>
                </div>
                <?php
                foreach($employees as $employee) {
                    echo '<div class="card">
                    <img class="card-img-top" src="../img/emp'.sprintf('%03d',$employee['employeeID']).'.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">'.$employee['firstname'].' '.$employee['lastname'].'</h4>
                        <p class="card-text">'.$employee['role'].'</p>
                    </div>
                </div>';
                }
                ?>

            </div>

        </main>
    </div>
</div>

</body>
<footer class="footer">
    <div class="container">
        <form method="post">
            <button type="submit" style="width: 100%; height: 80px;">Add Employee</button>
        </form>
    </div>
</footer>
</html>