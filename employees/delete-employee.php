<?php

    session_start();
    if (!isset($_SESSION['wages_calc_admin'])) {
        header('location: ../login.php');
    }
    $admin = $_SESSION['wages_calc_admin'];
    include_once "../db_con.php";

    $id = isset($_GET['id']) ? $_GET['id'] : '';

    $query = "UPDATE `employee` SET `is_deleted` = 1, `updated_by` = '$admin' WHERE `employee`.`id` = $id;";
    $run_query = mysqli_query($conn, $query);

    header('location: .');

?>