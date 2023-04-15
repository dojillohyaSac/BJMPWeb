<?php

include('admin/includes/config.php');
// include('includes/script.php');

session_start();

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendemail_verified($Lastname,$email,$userID){
    
    $mail = new PHPMailer(true);

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "official.bjmp@gmail.com";
    $mail->Password   = "glkomubcobkovjnm";

    $mail->SMTPSecure = "tls";
    $mail->Port       = "587";

    
    $mail->setFrom("official.bjmp@gmail.com", "BJMP Log Monitoring System");
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "Email Verified";

    $email_template = "
        <h2> Dear $Lastname,</h2>
        <h3>You account on BJMP Website has been verified, please use your user credentials to log in.</h3>

        <h2>User ID = $userID</h2>
        
        <h5>Kind Regards, BJMP Log Monitoring Website</h5>
    ";
    $mail->Body = $email_template;
    $mail->send();
    // echo 'Message has been sent';
}
function sendemail_not_Verified($Lastname,$email){
    
    $mail = new PHPMailer(true);

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "official.bjmp@gmail.com";
    $mail->Password   = "glkomubcobkovjnm";

    $mail->SMTPSecure = "tls";
    $mail->Port       = "587";

    
    $mail->setFrom("official.bjmp@gmail.com", "BJMP Log Monitoring System");
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "Email Verified";

    $email_template = "
        <h2> Dear $Lastname,</h2>
        <h3>You account on BJMP Website cannot be verified, Please Reuquest again to verify</h3>

        <a href='http://localhost/BJMPWebsite/resend_verification.php'> Verify Email </a>
        
        <h5>Kind Regards, BJMP Log Monitoring Website</h5>
    ";
    $mail->Body = $email_template;
    $mail->send();
    // echo 'Message has been sent';
}


if (isset($_GET['token']) && ($_GET['type'])) {
    if ($_GET['type']=="admin_token") {
        $token = $_GET['token'];
        $verify_query = "SELECT * FROM `admin_record` WHERE `adVerification_Code` = '$token' LIMIT 1";
        $verify_query_run = mysqli_query($conn, $verify_query);

        if (mysqli_num_rows($verify_query_run) > 0) {
            $row = mysqli_fetch_array($verify_query_run);
            $verify_status = $row['Verify_Status'];
            $Lastname = $row['adLastname'];
            $email= $row['adEmail'];
            $userID = $row['adminID'];

            if ($verify_status == 0) {
                $clicked_token = $row['adVerification_Code'];
                $update_query = "UPDATE `admin_record` SET `Verify_Status`='1' WHERE `adVerification_Code`='$clicked_token' LIMIT 1";
                $update_query_run = mysqli_query($conn, $update_query);

                if ($update_query_run) {

                    sendemail_verified("$Lastname","$email","$userID");

                    $_SESSION['status'] = "Account Verified!";
                    $_SESSION['status_text'] = "Your Account has been verified Successfully.";
                    $_SESSION['status_code'] = "success";
                    $_SESSION['status_btn'] = "Done";
                    header("Location: index.php");
                    exit (0);
                }else {

                    sendemail_not_Verified("$Lastname","$email");

                    $_SESSION['status'] = "Verification Failed.";
                    $_SESSION['status_text'] = "Account cannot be verified. Request Again.";
                    $_SESSION['status_code'] = "error";
                    $_SESSION['status_btn'] = "OK";
                    header("Location: index.php");
                    exit (0);
                }
            }else {
                $_SESSION['status'] = "Email is Already Verified.";
                $_SESSION['status_text'] = "Your Account has been verified already. Please Log in.";
                $_SESSION['status_code'] = "warning";
                $_SESSION['status_btn'] = "OK";
                header("Location: index.php");
                exit (0);
            }
        }else {
            $_SESSION['status'] = "Token Invalid";
            $_SESSION['status_text'] = "This token does not exists. Try Again.";
            $_SESSION['status_code'] = "warning";
            $_SESSION['status_btn'] = "OK";
            header("Location: index.php");
            exit (0);
        }
    }  elseif ($_GET['type']=="officer_token") {
        $token = $_GET['token'];
        $verify_query = "SELECT * FROM `officers_record` WHERE `ofVerification_Code` = '$token' LIMIT 1";
        $verify_query_run = mysqli_query($conn, $verify_query);

        if (mysqli_num_rows($verify_query_run) > 0) {
            $row = mysqli_fetch_array($verify_query_run);
            $verify_status = $row['Verify_Status'];
            $Lastname = $row['ofLastname'];
            $email= $row['ofEmail'];
            $userID = $row['officerID'];

            if ($verify_status == 0) {
                $clicked_token = $row['ofVerification_Code'];
                $update_query = "UPDATE `officers_record` SET `Verify_Status`='1' WHERE `ofVerification_Code`='$clicked_token' LIMIT 1";
                $update_query_run = mysqli_query($conn, $update_query);

                if ($update_query_run) {
                    sendemail_verified("$Lastname","$email","$userID");

                    $_SESSION['status'] = "Account Verified!";
                    $_SESSION['status_text'] = "Your Account has been verified Successfully.";
                    $_SESSION['status_code'] = "success";
                    $_SESSION['status_btn'] = "Done";
                    header("Location: index.php");
                    exit (0);
                }else {
                    sendemail_not_verified("$Lastname","$email","$userID");

                    $_SESSION['status'] = "Verification Failed.";
                    $_SESSION['status_text'] = "Account cannot be verified. Request Again.";
                    $_SESSION['status_code'] = "error";
                    $_SESSION['status_btn'] = "OK";
                    header("Location: index.php");
                    exit (0);
                }
            }else {
                $_SESSION['status'] = "Email is Already Verified.";
                $_SESSION['status_text'] = "Your Account has been verified already. Please Log in.";
                $_SESSION['status_code'] = "warning";
                $_SESSION['status_btn'] = "OK";
                header("Location: index.php");
                exit (0);
            }
        }else {
            $_SESSION['status'] = "Token Invalid";
            $_SESSION['status_text'] = "This token does not exists. Try Again.";
            $_SESSION['status_code'] = "warning";
            $_SESSION['status_btn'] = "OK";
            header("Location: index.php");
            exit (0);
        }
    } else {
        $_SESSION['status'] = "Token Invalid";
        $_SESSION['status_text'] = "This token does not exists. Try Again.";
        $_SESSION['status_code'] = "warning";
        $_SESSION['status_btn'] = "OK";
        header("Location: index.php");
        exit (0);
    }
}else {
    $_SESSION['status'] = "Error Verification";
    $_SESSION['status_text'] = "Unknown error has occured. Please Try Again.";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_btn'] = "OK";
    header("Location: index.php");
    exit (0);
}


?>