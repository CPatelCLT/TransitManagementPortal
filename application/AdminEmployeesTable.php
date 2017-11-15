<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/sticky-footer.css">
    <title>Employees Table</title>
</head>
<body>
    <h2>Employees</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Role</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>This</td>
                    <td>is</td>
                    <td>a</td>
                    <td>test</td>
                    <td>
                        <form method="post">
                            <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Update</button>
                            <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
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
