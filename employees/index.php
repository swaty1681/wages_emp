<?php
session_start();
if (!isset($_SESSION['wages_calc_admin'])) {
    header('location: ../login.php');
}
$admin = $_SESSION['wages_calc_admin'];
include_once "../db_con.php";

$employees = "SELECT * FROM `employee` WHERE `employee`.`is_deleted` = 0;";
$employees = mysqli_query($conn, $employees);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="robots" content="noindex,nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="referrer" content="no-referrer">
    <title>Employees List</title>
    <link rel="icon" href="https://lyncdigit.com/wp-content/uploads/2021/11/logo-icon-png-300x300.png" sizes="192x192" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body {
            position: relative;
        }

        .card img {
            width: 18rem;
            height: 18rem;
            object-fit: cover;
        }

        .logout {
            position: absolute;
            top: 0;
            right: 20px;
        }
    </style>
</head>

<body>

    <button class="btn btn-primary logout" onclick="window.location.href='logout.php'">Logout</button>

    <div class="container-fluid mt-2">
        <h2 class="my-4">Employees List</h2>
        <table class="table table-striped table-responsive-sm table-responsive-md table-responsive-lg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Village</th>
                    <th scope="col">Police Station</th>
                    <th scope="col">District</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(mysqli_num_rows($employees) > 0){
                        $count = 1;
                        while($row = mysqli_fetch_assoc($employees)){
                            echo '
                                <tr>
                                    <th>'.$count.'</th>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['phone'].'</td>
                                    <td>'.$row['village'].'</td>
                                    <td>'.$row['police_station'].'</td>
                                    <td>'.$row['district'].'</td>
                                    <td><a href="./edit-employee.php?id='.$row['id'].'"><i class="fa fa-edit"></i> Edit</a></td>
                                    <td><a href="./delete-employee.php?id='.$row['id'].'"><i class="fa fa-times"></i> Delete</a></td>
                                </tr>
                            ';
                            $count++;
                        }
                    } else {
                        echo '<tr><td colspan="8">No Employees Found! <a href="add-new-employee.php">Add new employee</a></td></tr>';
                    }
                ?>
            </tbody>
        </table>
        <a class="btn btn-primary" href="add-new-employee.php">Add New Employee</a>
    </div>

    <script src="script.js"></script>
</body>

</html>