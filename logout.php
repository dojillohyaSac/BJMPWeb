<?php

session_start();

include('admin/includes/config.php');

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (isset($_SESSION['authenticated'])) {
    $user = $_SESSION['auth_user']['userID'];

    // echo $user;

        $update_log = "UPDATE `login_record` SET `logged_out`=now() WHERE `id` = '$user'";
        $update_log_run = mysqli_query($conn, $update_log);

        if ($update_log_run) {
            $_SESSION['register'] = "Logged Out Successfully!";
            $_SESSION['register_text'] = "You have been logged out.";
            $_SESSION['register_code'] = "success";
            $_SESSION['register_btn'] = "Done";

            unset($_SESSION['authenticated']);
            unset($_SESSION['auth_user']);
            header("Location: index");
            exit(0);
        }
}

?>