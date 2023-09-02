<?php

    session_start();

    if(isset($_SESSION['wages_calc_admin'])){
        unset($_SESSION['wages_calc_admin']);
    }

    session_destroy();

    header('location: login.php');

?>