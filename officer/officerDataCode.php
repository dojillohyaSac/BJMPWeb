<?php
 include('includes/config.php');
//  include('includes/script.php');

session_start();


    use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require 'vendor/autoload.php';

	function sendemail_verify($lastname,$email,$verifyCode,$type){
		
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
    	$mail->Subject = "Email Verification";

		$email_template = "
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
                        <p class='text-center fs-4'><b>Dear $lastname,</b></p>
                        <p class='text-center fs-5'>You registered an account on BJMP Log Monitoring Website, before being able to use your account you need to verify that this is your email address by clicking here:</p>
                        <div class='d-grid gap-2 col-6 mx-auto mt-5 mb-5'>
                            <a href='http://localhost/BJMPWebsite/verify_email.php?token=$verifyCode&type=$type' class='btn btn-warning btn-lg'>Verify Your Email</a>
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
		";
		$mail->Body = $email_template;
		$mail->send();
		// echo 'Message has been sent';
	}

//Officer's Registration
if(isset($_POST['signupOf'])){

    $firstname = filter_input(INPUT_POST,'FirstName');
    $lastname = filter_input(INPUT_POST,'LastName');
    $middlename = filter_input(INPUT_POST, 'MiddleName');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $cpassword = filter_input(INPUT_POST, 'Cpassword');
    $sex = filter_input(INPUT_POST, 'Sex');
    $dob = filter_input(INPUT_POST, 'dob');
    $rank = filter_input(INPUT_POST, 'Rank');
    $address =filter_input(INPUT_POST, 'AddressLine');
    $image = filter_input(INPUT_POST,'image');
    $image = $_FILES["image"]['name'];
    $verifyCode = md5(rand());

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    $check_insert_data = "SELECT * FROM `officers_record` WHERE `ofLastname`='$lastname' AND `ofFirstname`='$firstname' AND `ofMiddlename`='$middlename' AND `ofSex`='$sex' AND `ofDOB`='$dob' AND `ofRank`='$rank' LIMIT 1";
    $check_insert_data_run = mysqli_query($conn, $check_insert_data);

    if (mysqli_num_rows($check_insert_data_run) > 0) {

        $_SESSION['register'] = "Data Already Exists!";
        $_SESSION['register_text'] = "Duplicate Data not Accepted.";
        $_SESSION['register_code'] = "error";
        $_SESSION['register_btn'] = "Try Again";
        header("Location: index.php");

    }else {
        $email_check =("SELECT `ofEmail` FROM `officers_record` WHERE `ofEmail` = '$email' LIMIT 1");
        $email_check_run = mysqli_query($conn, $email_check);
    
        if (mysqli_num_rows($email_check_run) > 0) {
            $_SESSION['register'] = "Email Already Exists!";
            $_SESSION['register_text'] = "Please try again with a different Email Address";
            $_SESSION['register_code'] = "warning";
            header("Location: index.php");
        }else{
            $validate_image = $_FILES["image"]['type']=="image/jpg" || $_FILES["image"]['type']=="image/png" || $_FILES["image"]['type']=="image/jpeg";
            if ($validate_image) {
                if(file_exists("upload/officer/".$_FILES["image"]["name"])) {
                    $store = $_FILES["image"]["name"];
                    $_SESSION['image_status'] = "Image already exists.'$store'";
                    header("Location: index.php");
                 }else{
                     if ($password == $cpassword) {
                        $sql =("INSERT INTO `officers_record`(`ofLastname`, `ofFirstname`, `ofMiddlename`, `ofEmail`, `ofPassword`, `ofSex`, `ofDOB`, `ofRank`, `ofAddress`, `ofPicture`, `ofVerification_Code`) VALUES ('$lastname','$firstname' ,'$middlename', '$email','$password','$sex','$dob','$rank','$address','$image','$verifyCode')");
                        if($conn->query($sql)){
                            $last_id = mysqli_insert_id($conn);
                            if ($last_id) {
                                $code = rand(1,99999);
                                $adminID = "BJMP-OI-".$code."-".$last_id;
                                $query = ("UPDATE `officers_record` SET `officerID`='$adminID' WHERE `IDNumber`='$last_id'");
                                $id_insert = mysqli_query($conn,$query);
        
                                $type = "officer_token";
           
                                sendemail_verify("$lastname","$email","$verifyCode","$type");
                    
                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/officer/".$_FILES["image"]["name"]);
                                $_SESSION['register'] = "Registered Successfully!";
                                $_SESSION['register_text'] = "Please check your email for the verification before logging in.";
                                $_SESSION['register_code'] = "success";
                                $_SESSION['register_btn'] = "Done";
                                header("Location: index.php");
                                exit (0);
                            }
                            
                        }
                        else{
            
                            $_SESSION['register'] = "Registration Unsuccessful!";
                            $_SESSION['register_text'] = "Data cannot be Registered! Please check you details again.";
                            $_SESSION['register_code'] = "error";
                            $_SESSION['register_btn'] = "OK";
                            header("Location: index.php");
                        }
                     }else {
                            $_SESSION['register_text'] = "Password and Confirm Password do not match.";
                            $_SESSION['register_code'] = "error";
                            $_SESSION['register_btn'] = "OK";
                            header("Location: index.php");
                     }
                 }
            }else {
                $_SESSION['status'] = "Image File Type Not Accepted!";
                $_SESSION['status_text'] = "Kindly try again.";
                $_SESSION['status_code'] = "error";
                $_SESSION['status_btn'] = "Back";
                header("Location:index.php");
            }
        }
        
    }
    $conn->close();
    
}

//Update Data and Image Query
if(isset($_POST['updateBtn'])){


    $id = filter_input(INPUT_POST,'id');
    $firstname = filter_input(INPUT_POST,'FirstName');
    $lastname = filter_input(INPUT_POST,'LastName');
    $middlename = filter_input(INPUT_POST, 'MiddleName');
    $sex = filter_input(INPUT_POST, 'Sex');
    $dob = filter_input(INPUT_POST, 'dob');
    $rank = filter_input(INPUT_POST, 'Rank');
    $address =filter_input(INPUT_POST, 'Address');
    $email = filter_input(INPUT_POST, 'email');
    $image = $_FILES["image"]['name'];
    
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    $select_query = ("SELECT * FROM `officers_record` WHERE  `IDNumber` = '$id'");
    $select_query_run = mysqli_query($conn, $select_query);
    foreach ($select_query_run as $select_row) {
        if ($image == null) {
            $image_data = $select_row['ofPicture'];
            
        }else {
            if ($image_path = "upload/officers/".$select_row['ofPicture']) {
               unlink($image_path);
               $image_data = $image;
            }
        }
    }

    
    if ($image == null){
        $sql =("UPDATE `officers_record` SET `ofLastname`='$lastname',`ofFirstname`='$firstname',`ofMiddlename`='$middlename',`ofSex`='$sex',`ofEmail`='$email',`ofDOB`='$dob',`ofRank`='$rank',`ofAddress`='$address' WHERE `IDNumber` = '$id'");
        if($conn->query($sql)){
            $_SESSION['status'] = "Data Updated!";
            $_SESSION['status_text'] = " ";
            $_SESSION['status_code'] = "success";
            $_SESSION['status_btn'] = "Done";
            header("Location:officers.php");
            exit (0);
        }
        else{
            $_SESSION['status'] = "Data cannot be Updated!";
            $_SESSION['status_text'] = " ";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
            header("Location:officers.php");
        }
    }else{
        $validate_image = $_FILES["image"]['type']=="image/jpg" || $_FILES["image"]['type']=="image/png" || $_FILES["image"]['type']=="image/jpeg";
        if ($validate_image) {
            $sql =("UPDATE `officers_record` SET `ofLastname`='$lastname',`ofFirstname`='$firstname',`ofMiddlename`='$middlename',`ofSex`='$sex',`ofEmail`='$email',`ofDOB`='$dob',`ofRank`='$rank',`ofAddress`='$address',`ofPicture`='$image_data' WHERE `IDNumber` = '$id'");
            if($conn->query($sql)){
                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/officers/".$_FILES["image"]["name"]);
                $_SESSION['status'] = "Data & Image Updated!";
                $_SESSION['status_text'] = " ";
                $_SESSION['status_code'] = "success";
                $_SESSION['status_btn'] = "Done";
                header("Location:officers.php");
                exit (0);
            }
            else{
                $_SESSION['status'] = "Data cannot be Updated!";
                $_SESSION['status_text'] = " ";
                $_SESSION['status_code'] = "error";
                $_SESSION['status_btn'] = "Back";
                header("Location:officers.php");
            }
        }else {
            $_SESSION['status'] = "Image File Type Not Accepted!";
            $_SESSION['status_text'] = "Kindly try again.";
            $_SESSION['status_code'] = "error";
            $_SESSION['status_btn'] = "Back";
            header("Location: officers.php");
        }
    }
    $conn->close();
    
}

//Search Data Query
if(isset($_POST['input'])) {

    $search = $_POST['input'];

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    $query = "SELECT * FROM `officers_record` WHERE `Status` = 1 AND (`IDNumber` LIKE '{$search}%' OR `officerID` LIKE '{$search}%' OR `ofLastname` LIKE '{$search}%' 
                      OR `ofFirstname` LIKE '{$search}%' OR `ofMiddlename` LIKE '{$search}%' OR `ofRank` LIKE '{$search}%' OR `ofAddress` LIKE '{$search}%')";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run)>0){?>

            
        <table class="table table-striped table-sm">
                    
            <thead class="table table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Officer ID</th>
                <th scope="col">Last name</th>
                <th scope="col">First name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">Rank</th>
                <th scope="col">Address</th>
                <th colspan="3" scope="col" style="text-align: center;">Actions</th>
            </tr>
            </thead>

              <?php
                    if($query_run){
                    foreach($query_run as $row)
                    {
                ?>

            <tbody>
            <tr>
                <td class="idNum"> <?php echo $row['IDNumber']; ?> </td>
                <td> <?php echo $row['officerID']; ?> </td>
                <td> <?php echo $row['ofLastname']; ?> </td>
                <td> <?php echo $row['ofFirstname']; ?> </td>
                <td> <?php echo $row['ofMiddlename']; ?> </td>
                <td> <?php echo $row['ofRank']; ?> </td>
                <td> <?php echo $row['ofAddress']; ?> </td>
                <td class="delete_pic" hidden><?php echo $row['ofPicture']; ?></td>
                
                    <!-- View Modal -->
                    <td style="text-align: center;">
                      <button type="button" class="btn btn-success viewModal" data-bs-toggle="modal" data-bs-target="#ViewModal">
                      <span class="glyphicon glyphicon-name"></span><i class="fa fa-eye"></i> View Record
                      </button>
                    </td>

                    <!-- Show ID MODAL -->
                    <td style="text-align: center;">
                      <button type="button" class="btn btn-primary showID" name="printBtn" data-bs-toggle="modal" data-bs-target="#showModal">
                      <span class="glyphicon glyphicon-name"></span><i class="fa fa-user"></i> Show ID
                      </button>
                    </td>
            </tr>
            </tbody>

        <script>
            $(document).ready(function (){
            $('.viewModal').on('click', function(e){

            e.preventDefault();
            var id = $(this).closest('tr').find('.idNum').text();
            // alert(idNum)
              $.ajax({
                url: "view_OFRecord.php",
                type: "POST",
                data: {id:id},
                success:function(response){
                  $('#viewRecordModal').html(response);
                  $('#ViewModal').modal('show');
                }
              });

            });
            });
        </script>

        <script>
            $(document).ready(function (){
            $('.showID').on('click', function(e){

            e.preventDefault();
            var id = $(this).closest('tr').find('.idNum').text();
            // alert(idNum)
              $.ajax({
                url: "OfficerPrintID.php",
                type: "POST",
                data: {id:id},
                success:function(response){
                  $('#modalID').html(response);
                  $('#showModal').modal('show');
                }
              });

            });
            });
        </script>
    <?php
     }
    }
    }
    else
    {
      echo "No Record Found";
    }
}
if (isset($_POST['releaseBtn'])) {
    
    $id = filter_input(INPUT_POST,'id');
    $release_type = filter_input(INPUT_POST,'release_type');
    $date_issued = filter_input(INPUT_POST,'date_issued');
    $comment = filter_input(INPUT_POST, 'comment');
    $visitorID = filter_input(INPUT_POST, 'visitorID');

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    
    $release_query = "UPDATE `officers_record` SET `Type_of_Release`='$release_type',`date_issued`='$date_issued',`Remarks`='$comment',`Status`='0' WHERE `IDNumber`='$id' LIMIT 1";
    $release_query_run = mysqli_query($conn, $release_query);

    if ($release_query_run) {
        $_SESSION['status'] = "Data Release Confirmed!";
        $_SESSION['status_text'] = "The Officer's Data has been Deactivated.";
        $_SESSION['status_code'] = "success";
        $_SESSION['status_btn'] = "Done";
        header("Location: adminOfficers_enabled.php");

    }else {
        $_SESSION['status'] = "Unknown Error Occurd!";
        $_SESSION['status_text'] = " ";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_btn'] = "Back";
        header("Location: adminOfficers_enabled.php");
    }
}

?>