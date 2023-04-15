<?php
session_start();

include('admin/includes/config.php');

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if(isset($_POST['loginbtn'])){

    $userID = $_POST['UserIDInput'];
    $password = $_POST['UserPasswordInput'];
    $role = $_POST['position'];

    if ($role == "Officer") {
        // $login_query = "SELECT * FROM `officers_record` WHERE `officerID`='$userID' OR `ofEmail`='$userID' AND `ofPassword`='$password' LIMIT 1";
        $login_query = "SELECT * FROM `officers_record` WHERE `officerID`='$userID' AND `ofPassword`='$password' LIMIT 1";
        $login_query_run = mysqli_query($conn, $login_query);
       
        if (mysqli_num_rows($login_query_run) > 0) {
          $row = mysqli_fetch_array($login_query_run);
          
          $lastname = $row['ofLastname'];
          $firstname = $row['ofFirstname'];
          $ofrank = $row['ofRank'];
          $email = $row['ofEmail'];

          if ($row['Verify_Status']=="1") {
              $_SESSION['authenticated'] = TRUE;

              if ($_SESSION['authenticated'] = TRUE) {

                $insert_log = "INSERT INTO `login_record`(`userID`, `lastname`, `firstname`, `email`, `rank`) VALUES ('$userID','$lastname','$firstname','$email','$ofrank')";
                $insert_log_run = mysqli_query($conn, $insert_log);

                $last_id = mysqli_insert_id($conn);

                $_SESSION['auth_user'] = [
                  'user' => $row['ofLastname'],
                  'rank' => $row['ofRank'],
                  'ofpicture' => $row['ofPicture'],
                  'userID' => $last_id,
                ];
                $_SESSION['logged'] = "Logged in successfully";
                $_SESSION['logged_icon'] = "success";
                header("Location: dashboard");
              }
          }else {
            $_SESSION['status'] = "Account not verified!";
            $_SESSION['status_text'] = "Please Verify your Email Address to Log in.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Done";
            header("Location: index");
          }
        }else {
          $_SESSION['status'] = "Invalid User ID or Password.";
          $_SESSION['status_text'] = "Please try again.";
          $_SESSION['status_code'] = "error";
          $_SESSION['status_btn'] = "Done";
          header("Location: index");
        }
    }elseif ($role == "Admin") {
      // $login_query = "SELECT * FROM `admin_record` WHERE `adminID`='$userID' OR `adEmail`='$userID' AND `adPassword`='$password' LIMIT 1";
      $login_query = "SELECT * FROM `admin_record` WHERE `adminID`='$userID' AND `adPassword`='$password' LIMIT 1";
      $login_query_run = mysqli_query($conn, $login_query);
      
      if (mysqli_num_rows($login_query_run) > 0) {
        $row = mysqli_fetch_array($login_query_run);

          $lastname = $row['adLastname'];
          $firstname = $row['adFirstname'];
          $adrank = $row['adRank'];
          $email = $row['adEmail'];

        if ($row['Verify_Status']=="1") {
            $_SESSION['authenticated'] = TRUE;
            
            if ($_SESSION['autheticated'] = TRUE) {
                $insert_log = "INSERT INTO `login_record`(`userID`, `lastname`, `firstname`, `email`, `rank`) VALUES ('$userID','$lastname','$firstname','$email','$adrank')";
                $insert_log_run = mysqli_query($conn, $insert_log);

                $last_id = mysqli_insert_id($conn);

                $_SESSION['auth_user'] = [
                  'user' => $lastname,
                  'rank' => $adrank,
                  'adpicture' => $row['adPicture'],
                  'userID' => $last_id,
                ];
    
                $_SESSION['logged'] = "Logged in successfully";
                $_SESSION['logged_icon'] = "success";
                header("Location:admin/dashboard");
            
            }
          }else {
          $_SESSION['status'] = "Account not verified!";
          $_SESSION['status_text'] = "Please Verify your Email Address to Log in.";
          $_SESSION['status_code'] = "error";
          $_SESSION['status_btn'] = "Done";
          header("Location: index");
        }
      }else {
        $_SESSION['status'] = "Invalid User ID or Password.";
        $_SESSION['status_text'] = "Please try again.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Done";
        header("Location: index");
      }
    }else {
      $_SESSION['status'] = "Record cannot be Found!.";
      $_SESSION['status_text'] = "Please try again.";
      $_SESSION['status_code'] = "error";
      $_SESSION['status_btn'] = "Done";
      header("Location: index");
    }
    

  }

?>