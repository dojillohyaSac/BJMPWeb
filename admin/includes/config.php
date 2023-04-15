<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'bjmpdb');

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bjmpdb";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_errno) {
    echo "$conn->connect_error";
    die("Connection Failed: ".$conn->connect_error);
}

// $email_password = "fsnlqxnvqqhqrxli";
// $phpmailer_email ="official.bjmp@gmail.com";
?>