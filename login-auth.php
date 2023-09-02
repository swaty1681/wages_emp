<?php

    include_once "db_con.php";

    $user = isset($_POST['user'])?$_POST['user']:'';
    $password = isset($_POST['password'])?$_POST['password']:'';

    $query = "SELECT * FROM `admin` WHERE `admin`.`user` = '$user';";
    $run_query = mysqli_query($conn, $query);

    if(mysqli_num_rows($run_query) == 0){
        header('location: login.php?login_status=failed');
    }

    $fetch = mysqli_fetch_assoc($run_query);

    define("PASSWORD", $fetch['password']);

    if(password_verify($password, PASSWORD)){
        session_start();
        $_SESSION['wages_calc_admin'] = 'admin';
    } else {
        header('location: login.php?login_status=failed');
    }

    header('location: .');
