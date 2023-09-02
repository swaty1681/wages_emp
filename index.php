<?php
    session_start();
    if(!isset($_SESSION['wages_calc_admin'])){
        header('location: login.php');
    }
    $admin = $_SESSION['wages_calc_admin'];
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
    <title>Sentinel Mgmt</title>
    <link rel="icon" href="https://lyncdigit.com/wp-content/uploads/2021/11/logo-icon-png-300x300.png" sizes="192x192" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body{
            position: relative;
        }
        .card img{
            width: 18rem;
            height: 18rem;
            object-fit: cover;
        }
        .logout{
            position: absolute;
            top: 0;
            right: 20px;
        }
    </style>
</head>

<body>

<button class="btn btn-primary logout" onclick="window.location.href='logout.php'">Logout</button>

    <div class="container-fluid mt-2">
        <h2 class="my-4">Welcome <strong><?=$admin?></strong>! How do you do today?</h2>
        <div class="row">
            <div class="card mx-3" style="width: 18rem;">
                <img class="card-img-top" src="images/wages.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Wages Calculator</h5>
                    <p class="card-text">This calculator is especially designed for the management of the wages.</p>
                    <a href="wages" target="_blank" class="btn btn-primary">Go &rarr;</a>
                </div>
            </div>
            <div class="card mx-3" style="width: 18rem;">
                <img class="card-img-top" src="images/employees.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Employee List</h5>
                    <p class="card-text">This is designed for managing the basic profile of the employees by the management team.</p>
                    <a href="employees" target="_blank"  class="btn btn-primary">Go &rarr;</a>
                </div>
            </div>
            <div class="card mx-3" style="width: 18rem;">
                <img class="card-img-top" src="images/task-management.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Task Management</h5>
                    <p class="card-text">This is designed for managing the tasks assigned to the members and employees.</p>
                    <a href="https://management.sentinelworkforce.com" target="_blank"  class="btn btn-primary">Go &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>