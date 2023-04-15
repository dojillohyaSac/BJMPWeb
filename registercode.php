<?php

include 'admin/includes/config.php';

session_start();

if (isset($_POST['confirm'])) {
    $adminID = filter_input(INPUT_POST,'adminCode');
    $password = filter_input(INPUT_POST,'password');

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    $login =("SELECT * FROM `admin_record` WHERE `adminID` = '$adminID' LIMIT 1");
    $login_run = mysqli_query($conn, $login);

    if (mysqli_num_rows($login_run) > 0) {
        $row = mysqli_fetch_array($login_run);

        $getPassword = $row['adPassword'];

        if ($getPassword != $password) {
            $_SESSION['set'] = "show";
            $_SESSION['id'] = $adminID;
            $_SESSION['status'] = "Password Incorrect!";
            $_SESSION['status_text'] = "You have entered the wrong password. Try again.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Done";
            header("Location: index");
        }else {
            header("Location: register-admin");
        }
    }else {
        $_SESSION['status'] = "Access Denied!";
        $_SESSION['status_text'] = "You don't have the authority to access the next page.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Done";
        header("Location: index");
    }
}


?>