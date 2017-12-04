<?php
require_once('../data/employee.php');

session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user['role'] != 'admin') {
        header("Location:../index.php?logout=true");
    }
} else {
    header("Location: ../index.php");
}

if (isset($_GET['employee'])) {
    showEmployee($_GET['employee']);
}

if (isset($_GET['filter'])) {
    switch ($_GET['filter']) {
        case "all":
            $employees = getAllEmployees();
            break;
        case "admins":
            $employees = getEmployeesByRole("admin");
            break;
        case "drivers":
            $employees = getEmployeesByRole("driver");
            break;
        case "mechanics":
            $employees = getEmployeesByRole("mechanic");
            break;
        default:
            $employees = getAllEmployees();
    }
} else {
    $employees = getAllEmployees();
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "add":
            if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['role']) && isset($_POST['firstName']) && isset($_POST['lastName'])) {
                $status = insertEmployee($_POST['username'], $_POST['password'], $_POST['email'], $_POST['role'], $_POST['firstName'], $_POST['lastName']);
                //TODO Add status alert/toast
            } else {
                // TODO Add alert for invalid entry
            }
            break;
        case "delete":
            $status = deleteEmployee($_POST['employeeID']);
            //TODO Add status alert/toast
            header("Refresh:0");
            break;
        case "update":
            if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['role']) && isset($_POST['firstName']) && isset($_POST['lastName'])) {
                $status = updateEmployee($_POST['employeeID'], $_POST['username'], $_POST['password'], $_POST['email'], $_POST['role'], $_POST['firstName'], $_POST['lastName']);
                //TODO Add status alert/toast
                header("Refresh:0");
            } else {
                // TODO Add alert for invalid entry
            }
            break;
    }
}

function showEmployee($empID)
{
    $employee = getEmployeeByID($empID);
    echo '<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="showEmployee">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Emploee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputFirst" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="inputFirst" placeholder="First Name" name="firstName" value="' . $employee['firstname'] . '">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputLast" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="inputLast" placeholder="Last Name" name="lastName" value="' . $employee['lastname'] . '">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="inputUsername" placeholder="Username" name="username" value="' . $employee['username'] . '">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword" placeholder="Password" name="password" value="' . $employee['password'] . '">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="' . $employee['email'] . '">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Role</label>';
    switch ($employee['role']) {
        case "admin":
            echo '<div class="form-check form-check-inline">
                                      <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="admin" checked>Admin
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="driver">Driver
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="role" id="inlineRadio3" value="mechanic">Mechanic
                            </label>
                        </div>';
            break;
        case "driver":
            echo '<div class="form-check form-check-inline">
                                      <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="admin">Admin
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="driver" checked>Driver
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="role" id="inlineRadio3" value="mechanic">Mechanic
                            </label>
                        </div>';
            break;
        case "mechanic":
            echo '<div class="form-check form-check-inline">
                                      <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="admin" >Admin
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="driver">Driver
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="role" id="inlineRadio3" value="mechanic" checked>Mechanic
                            </label>
                        </div>';
            break;
    }
    echo '</div>
</div>
<div class="modal-footer">
    <input type="hidden" name="employeeID" value="' . $employee['employeeID'] . '">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button name="action" value="update" type="submit" class="btn btn-primary">Update Employee</button>
    <button name="action" value="delete" type="submit" class="btn btn-primary">Delete Employee</button>
</div>
</form>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script>
    $("#showEmployee").modal("show")
</script>';

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/sticky-footer.css">
    <script>
        if(typeof window.history.pushState == 'function') {
            window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
        }
    </script>

    <!-- TODO Use media tags instead of include -->
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
        /*column-count:4;*/
        }
        /*.card {*/
        /*height : 250px;*/
        /*}*/
    </style>
    <title>Dashboard</title>
</head>
<body>

<?php include("admin_header.php"); ?>

<div class="container-fluid">
    <div class="row">
        <?php include("admin_sidebar.php"); ?>
        <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
            <div class="row justify-content-between" style="padding-right: 15px">
                <h2 class="col-5">Employees</h2>
                <div class="btn-group col-2" role="group" aria-label="Button group with nested dropdown"
                     style="margin-right: 30px">
                    <div class="btn-group" role="group">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter Roles
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="?filter=all">All</a>
                            <a class="dropdown-item" href="?filter=admins">Admins</a>
                            <a class="dropdown-item" href="?filter=drivers">Drivers</a>
                            <a class="dropdown-item" href="?filter=mechanics">Mechanics</a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addEmployee">Add
                        New
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addEmployee" tabindex="-1" role="dialog"
                     aria-labelledby="addNewEmployeeLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form action="#" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <!--                          username, pass, first,last, role, email-->
                                    <div class="form-group row">
                                        <label for="inputFirst" class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="inputFirst" placeholder="First Name"
                                                   name="firstName">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputLast" class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="inputLast" placeholder="Last Name"
                                                   name="lastName">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="inputUsername" placeholder="Username"
                                                   name="username">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputPassword"
                                                   placeholder="Password" name="password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email"
                                                   name="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Role</label>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="role"
                                                       id="inlineRadio1" value="admin">Admin
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="role"
                                                       id="inlineRadio2" value="driver">Driver
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="role"
                                                       id="inlineRadio3" value="mechanic">Mechanic
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button name="action" value="add" type="submit" class="btn btn-primary">Add
                                        Employee
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="card-columns">
                <!-- TODO Change color of card text back to normal text instead of link -->
                <?php
                foreach ($employees as $employee) {
                    echo '<a href=?employee=' . $employee['employeeID'] . '><div class="card">
                    <img class="card-img-top rounded" src="../img/emp' . sprintf('%03d', $employee['employeeID']) . '.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">' . $employee['firstname'] . ' ' . $employee['lastname'] . '</h4>
                        <p class="card-text">' . $employee['role'] . '</p>
                    </div>
                </div></a>';
                }
                ?>
            </div>
        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>