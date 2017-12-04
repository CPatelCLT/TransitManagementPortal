<?php
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user['role'] != 'admin') {
        header("Location:../index.php?logout=true");
    }
} else {
    header("Location: ../index.php");
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

<?php include("admin_header.php"); ?>

<div class="container-fluid">
    <div class="row">
        <?php include("admin_sidebar.php"); ?>
        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
            <h1>Welcome to the manager/admin homepage</h1>

            <figure style="width:50%;display:block; margin: auto">
                <img width="100%" src="https://www.fluencecorp.com/wp-content/uploads/2017/07/henry-j-charrabe.png" alt="">
                <figcaption Style="text-align: center; font-size:35px">This is Jim<br/>He's the boss!</figcaption>
            </figure>
        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>