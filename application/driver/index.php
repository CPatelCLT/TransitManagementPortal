<?php

header('Location:driver_home.php');

session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user['role'] != 'driver') {
        header("Location:../index.php?logout=true");
    }
} else {
    header("Location: ../index.php");
}