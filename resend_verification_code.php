<?php

include('admin/includes/config.php');

session_start();

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function resend_email_verify($Lastname, $email, $token, $type){
    
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
    $mail->Subject = "Resend Verification";

    $email_template = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>

        <!-- CSS only -->
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>

        <!-- JavaScript Bundle with Popper -->
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3' crossorigin='anonymous'></script>

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css'
            integrity='sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=='
            crossorigin='anonymous' referrerpolicy='no-referrer' />
    </head>
    <body>
        <div class='container '>
            <div class='row'>
                <div class='col-12'>
                    <!-- <img class='img-fluid' src='images/id-banner.png' alt='> -->
                </div>
            </div>
            <div class='row bg-primary'>
                <div class='col-12'>
                    <div class='mt-5 mb-5'>
                    </div>
                    <p class='text-center fs-6 text-white'><strong>T H A N K S   F O R   S I G N I N G   U P !</strong></p>
                    <p class='text-center fs-2 text-white'><strong>Verify Your E-mail Address</strong></p>
                </div>
            </div>
            <div class='row mt-5'>
                <div class='col-12'>
                    <p class='text-center fs-4'><b>Dear $Lastname,</b></p>
                    <p class='text-center fs-5'>You registered an account on BJMP Log Monitoring Website, before being able to use your account you need to verify that this is your email address by clicking here:</p>
                    <div class='d-grid gap-2 col-6 mx-auto mt-5 mb-5'>
                        <a href='http://localhost/BJMPWebsite/verify_email.php?token=$token&type=$type' class='btn btn-warning btn-lg'>Verify Your Email</a>
                    </div>
                </div>
            </div>
            <div class='row'>
                <p class='text-center fs-5'>Thanks,</p>
                <p class='text-center fs-5'>BJMP Log Monitoring Website</p>
            </div>
            <div class='row bg-secondary'>
                <div class='col-12'>
                    <p class='text-center fs-5 text-white mt-5'><strong>Get in touch</strong></p>
                    <p class='text-center fs-6 text-white'><strong>+11 111 333 4444</strong></p>
                    <p class='text-center fs-6 text-white'>official.bjmp@gmail.com</p>
                </div>
            </div>
            <div class='row bg-primary'>
                <div class='col-12'>
                    <p class='text-center fs-6 text-white'>Copyrights © BJMP Log Monitoring Website. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </body>
    </html>
    ";
    $mail->Body = $email_template;
    $mail->send();
    // echo 'Message has been sent';
}


if (isset($_POST['resendBtn'])) {

    $email = $_POST['resendEmail'];
    $position = $_POST['position'];
    
        if ($position == 'officer_token') {
        $checkEmail = "SELECT * FROM `officers_record` WHERE `ofEmail`='$email' LIMIT 1";
        $checkEmail_run = mysqli_query($conn, $checkEmail);
        
        if (mysqli_num_rows($checkEmail_run) > 0) {
                $row = mysqli_fetch_array($checkEmail_run);
                if ($row['Status'] == '0') {
                    $Lastname = $row['ofLastname'];
                    $token = $row['ofVerification_Code'];
                    $type = $position;
        
                    resend_email_verify("$Lastname", "$email", "$token","$type");
        
                    $_SESSION['status'] = "Email Verification Sent!";
                    $_SESSION['status_text'] = "Please check your email for the new verification link";
                    $_SESSION['status_code'] = "success";
                    $_SESSION['status_btn'] = "Done";
                    header("Location: index.php");
                }else {
                    $_SESSION['status'] = "Email is Already Verified.";
                    $_SESSION['status_text'] = "Your Account has been verified already. Please Log in.";
                    $_SESSION['status_code'] = "warning";
                    $_SESSION['status_btn'] = "OK";
                    header("Location: resend_verification.php");
                    exit (0);
                }
        }else {
            $_SESSION['status'] = "Email is not Registered!";
            $_SESSION['status_text'] = "Make sure to register first.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "OK";
            header("Location: resend_verification.php");
            exit (0);
        }
        
        }elseif ($position == 'admin_token') {
            $checkEmail = "SELECT * FROM `admin_record` WHERE `adEmail`='$email' LIMIT 1";
            $checkEmail_run = mysqli_query($conn, $checkEmail);
        
            if (mysqli_num_rows($checkEmail_run) > 0) {
                $row = mysqli_fetch_array($checkEmail_run);
                if ($row['Status'] == '0') {
                    $Lastname = $row['adLastname'];
                    $token = $row['adVerification_Code'];
                    $type = $position;
        
                    resend_email_verify("$Lastname", "$email", "$token", "$type");
        
                    $_SESSION['status'] = "Email Verification Sent!";
                    $_SESSION['status_text'] = "Please check your email for the new verification link";
                    $_SESSION['status_code'] = "success";
                    $_SESSION['status_btn'] = "Done";
                    header("Location: index.php");
                }else {
                    $_SESSION['status'] = "Email is Already Verified.";
                    $_SESSION['status_text'] = "Your Account has been verified already. Please Log in.";
                    $_SESSION['status_code'] = "warning";
                    $_SESSION['status_btn'] = "OK";
                    header("Location: resend_verification.php");
                    exit (0);
                }
            }else {
                $_SESSION['status'] = "Email is not Registered!";
                $_SESSION['status_code'] = "error";
                $_SESSION['status_text'] = "Make sure to register first.";
                $_SESSION['status_btn'] = "OK";
                header("Location: resend_verification.php");
                exit (0);
            }
        }else {
            $_SESSION['status'] = "Email is not Registered!";
            $_SESSION['status_text'] = "Make sure to register first.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "OK";
            header("Location: resend_verification.php");
            exit (0);
        }
    }

?>