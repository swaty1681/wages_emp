<?php

    session_start();
    if (!isset($_SESSION['wages_calc_admin'])) {
        header('location: ../login.php');
    }
    $admin = $_SESSION['wages_calc_admin'];
    include_once "../db_con.php";

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $alternate_phone = isset($_POST['alternate_phone']) ? $_POST['alternate_phone'] : '';
    $village = isset($_POST['village']) ? $_POST['village'] : '';
    $police_station = isset($_POST['police_station']) ? $_POST['police_station'] : '';
    $district = isset($_POST['district']) ? $_POST['district'] : '';
    $adhaar_no = isset($_POST['adhaar_no']) ? $_POST['adhaar_no'] : '';

    $adhaar_card = $_FILES['adhaar_card']['name'];
    $adhaar_card_tmp = $_FILES['adhaar_card']['tmp_name'];
    $ext = pathinfo($adhaar_card, PATHINFO_EXTENSION);

    if ($ext == '') {
        $image_location = 'uploads/default_aadhaar.jpg';
    } else {
        $image_location = "uploads/adhaar_card_" . date('dmYhis') . "." . $ext;
        move_uploaded_file($adhaar_card_tmp, $image_location);
    }

    $query = "INSERT INTO `employee` (`name`, `phone`, `alternate_phone`, `village`, `police_station`, `district`, `adhaar_no`, `adhaar_card`, `updated_by`) VALUES ('$name', '$phone', '$alternate_phone', '$village', '$police_station', '$district', '$adhaar_no', '$image_location', '$admin');";
    $run_query = mysqli_query($conn, $query);

    header('location: .');

?>