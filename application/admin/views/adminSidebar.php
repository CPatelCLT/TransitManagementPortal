<?php
/**
 * Created by PhpStorm.
 * User: benjaminlee
 * Date: 11/14/17
 * Time: 7:57 PM
 */?>


<!DOCTYPE html>
<html>
<div class="container-fluid">
        <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="admin_home.php">Home <span class="sr-only">(Current)</span></a>
                    <a class="nav-link" href="admin_employee.php">Employees</a>
                    <a class="nav-link" href="admin_fleet.php">Fleet</a>
                    <a class="nav-link" href="admin_routes.php">Routes</a>
                    <a class="nav-link" href="admin_schedules.php">Schedule</a>
                </li>
            </ul>
        </nav>
</div>
<!-- This code will highlight the current page -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        // Get current url
        // Select an a element that has the matching href and apply a class of 'active'. Also prepend a - to the content of the link
        var url = window.location.href;
        //alert(url);
        const regex = /[a-zA-Z0-9_]+\.(php)$/g;
        var match = regex.exec(url);
        //alert(match[0]);
        $('a[href="' + match[0] + '"]').addClass('active');


    });
</script>
</html>