<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BJMP VISITOR'S LOG MONITORING SYSTEM</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- <link rel="stylesheet" href="admin/css/hereos.css"> -->

</head>
<body class="bg-dark">
    <header class="p-2 text-end">
        <div class="row">
            <div class="col">
                <a class="btn btn-dark" role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><span class="glyphicon glyphicon-name"></span><i class="fa fa-bars"></i></a>
            </div>
        </div>
    </header>
    <div class="offcanvas offcanvas-end text-bg-dark" data-bs-backdrop="static" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="d-flex flex-column mb-3 ">
                <a class="btn btn-dark p-2" role="button" href="index"> Return to Homepage</i></a>
            </div>
        </div>
    </div>

    <main>
        <div class="container col-xl-10 col-xxl-8 px-4 mt-5 mb-5">
            <div class="row g-lg-5">
                <div class="col-lg-5 align-self-center text-white">
                    <center><img src="admin/images/bjmp-logo.png" alt="" height="150" width="150"></center>
                    <h4 class=" fs-3 fw-bold lh-1 text-center pt-2">Bureau of Jail and Penology Managaement</h4>
                    <p class="fs-5 text-center">Log Monitoring System</p>
                </div>

                <div class="col-md-10 mx-auto col-lg-7">
                    <div class="card shadow">
                        <div class="card-header">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="register-admin">Admininistrator</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="register-officer">Officer</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Admininistrator Registration Form</h5>
                            <form class="rounded-3 bg-light" action="admin/adminDataCode.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-floating mt-3">
                                            <input for="floatingInput" class="form-control" type="text" name="FirstName" placeholder="First Name" required>
                                            <label class="form-text" id="floatingInput">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-floating mt-3">
                                            <input for="floatingInput" class="form-control" type="text" name="MiddleName" placeholder="Middle Name" required>
                                            <label class="form-text" id="floatingInput">Middle Name</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-floating mt-3">
                                            <input for="InputLname" class="form-control" type="text" name="LastName" placeholder="Last Name" required>
                                            <label class="form-text" id="InputLname">Last Name</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-floating mt-3">
                                            <input for="InputEmailAdress" class="form-control" type="email" name="email" id="ademail" placeholder="Email" required>
                                            <label class="form-text" id="InputEmailAdress">Email Address</label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-floating mt-3">
                                            <input for="InputPassword" class="form-control" type="password" name="password" id="adminpassword" placeholder="Password" required>
                                            <label class="form-text" id="InputPassword">Password</label>
                                            <div class="" id="ad-password-label">
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mt-3">
                                            <input for="InputCpassword" class="form-control" type="password" name="Cpassword" id="adminCpassword" placeholder="Confirm Password" required>
                                            <label class="form-text" id="InputCpassword">Confirm Password</label>
                                            <div class="" id="ad-Cpassword-label">
                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mb-2 mt-1">
                                <input class="form-check-input showAdminPassword" type="checkbox">
                                <label class="form-check-label" for="showPassword">
                                Show Password
                                </label>
                                </div>
                                <script>
                                        var toggleAdmin = document.querySelector('.showAdminPassword');
                                        var adPassword = document.querySelector('#adminpassword');
                                        var adCpassword = document.querySelector('#adminCpassword');

                                        toggleAdmin.addEventListener("click", handleToggleClick, false);

                                        function handleToggleClick(event) {
                                        if (this.checked) {
                                            console.warn("Change input 'type' to: text")
                                            adPassword.type = 'text';
                                            adCpassword.type = 'text';
                                        }else{
                                            console.warn("Change input 'type' to: password")
                                            adPassword.type = 'password';
                                            adCpassword.type = 'password';
                                        }
                                        }
                                    </script>
                                </div>
                    
                                <div class="row mt-3 mb-3">
                                    <div class="col-4">
                                        <select class="form-select form-select pb-3 pt-3" name="Sex" id="adSex" required>
                                            <option value="" selected>Select Sex</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-floating">
                                            <input for="InputDOB" class="form-control" type="date" name="dob" id="adDOB" placeholder="Date of Birth" required>
                                            <label class="form-text" id="InputDOB">Date of Birth</label>
                                            <div class="" id="date-label-admin">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-floating">
                                            <select class="form-select form-select pb-3 pt-3" name="Rank" id="adRank" required>
                                                <option value="" selected>Select Rank</option>
                                                <optgroup label="COMMISSIONED OFFICERS">
                                                <option value="Director">Director</option>
                                                <option value="Chief Superintendent">Chief Superintendent</option>
                                                <option value="Senior Superintendent">Senior Superintendent</option>
                                                <option value="Superintendent">Superintendent</option>
                                                <option value="Chief Inspector">Chief Inspector</option>
                                                <option value="Senior Inspector">Senior Inspector</option>
                                                <option value="Inspector">Inspector</option>
                                                <optgroup label="NON-COMMISSIONED OFFICERS">
                                                <option value="Senior Jail Officer 4">Senior Jail Officer 4</option>
                                                <option value="Senior Jail Officer 3">Senior Jail Officer 3</option>
                                                <option value="Senior Jail Officer 2">Senior Jail Officer 2</option>
                                                <option value="Senior Jail Officer 1">Senior Jail Officer 1</option>
                                                <option value="Jail Officer 3">Jail Officer 3</option>
                                                <option value="Jail Officer 2">Jail Officer 2</option>
                                                <option value="Jail Officer 1">Jail Officer 1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input for="InputAddress" class="form-control" type="text" name="AddressLine" id="adAddressLine" placeholder="Address" required>
                                            <label class="form-text" id="InputAddress">Address Line</label>
                                        </div>
                                    </div>
                                    <?php
                                    include 'admin/includes/config.php';

                                    $region = "SELECT * FROM `refregion`";
                                    $region_query = mysqli_query($conn, $region);
                                ?>
                                    <div class="col-4">
                                        <select class="form-select form-select pb-3 pt-3" name="region" id="region" required>
                                            <option value disabled selected>Select Region</option>
                                            <?php while ($row = mysqli_fetch_assoc($region_query)) : ?>
                                                <option value="<?php echo $row['regCode']?>"><?php echo $row['regDesc'];?></option>
                                            <?php endwhile;?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-4">
                                        <select class="form-select form-select pb-3 pt-3" name="province" id="province" required>
                                            <option value disabled selected>Select State/Province</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select form-select pb-3 pt-3" name="city" id="city" required>
                                            <option value disabled selected>Select City/Municipality</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-select form-select pb-3 pt-3" name="brgy" id="brgy" required>
                                            <option value disabled selected>Select Barangay</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 mt-3 mb-3">
                                            <label for="formFile" class="form-label"><span class="glyphicon glyphicon-name"></span><i class="fa fa-upload"></i> Upload Officer Picture:</label>
                                            <input class="form-control" type="file" name="image" id="formFile" required>
                                            <div class="" id="image-feedback">
                            
                                            </div>
                                    </div>
                                </div>
                            <!-- <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                            </div> -->
                        <button class="d-grid gap-2 col-10 mx-auto btn btn-lg btn-dark" type="submit" name="signupAd" id="signupAd">Sign Up</button>
                    <hr class="my-4">
                    <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>   
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<!-- File Extension Validation -->
<script type="text/javascript">
    document.getElementById('formFile').addEventListener('change', function () {
        filepath = (this.value);
        fileclass = document.getElementById("formFile");
        feedback = document.getElementById("image-feedback");

        function getExtension(filepath) {
        var basename = filepath.split(/[\\/]/).pop(),  // extract file name from full path ...
                                                // (supports `\\` and `/` separators)
            pos = basename.lastIndexOf(".");       // get last position of `.`

        if (basename === "" || pos < 1)            // if file name is empty or ...
            return "";                             //  `.` not found (-1) or comes first (0)

        return basename.slice(pos + 1);            // extract extension ignoring `.`
        }

        file = getExtension(filepath);

        var ext = ['png', 'jpg', 'jpeg'];
        
        if(ext.indexOf(file) == -1) {
            fileclass.classList = "form-control is-invalid";
            feedback.classList = "invalid-feedback";
            feedback.innerHTML = "Only PNG, JPG and JPEG file image/s is accepted.";
            document.getElementById("signupAd").type = "button";
        }else{
            fileclass.classList.remove("is-invalid");
            feedback.classList.remove("invalid-feedback");
            feedback.innerHTML = null;
            document.getElementById("signupAd").type = "submit";
        }
    })

</script>

<!-- Admin Age and Birthdate Checker -->
<script type="text/javascript">
        document.getElementById('adDOB').addEventListener('change', function(){
            dob = new Date(this.value);
            // console.log(dob);

            const day = dob.getDate();
            const month = dob.getMonth()+1;
            const year = dob.getFullYear();
            // console.log(year);

            const birthdate = new Date(year, month, day); 

            function age(birthdate) {

            const today = new Date();
            
            let currentYear = today.getFullYear();
            let currentMonth = today.getMonth();
            let currentDate = today.getDate();

                if (valid = (year > currentYear || (month > currentMonth && year == currentYear) || (day > currentDate && month == currentMonth && year == currentYear))) {
                    document.getElementById("adDOB").classList = "form-control is-invalid";
                    document.getElementById("date-label-admin").classList = "invalid-feedback";
                    document.getElementById("date-label-admin").innerHTML = "Invalid Date. Not Born Yet!";
                    document.getElementById("signupAd").type = "button";
                    // alert("Not Born Yet. Please input a valid Date.");
                } else{
                    const age = currentYear - birthdate.getFullYear() - 
                                (currentMonth < birthdate.getMonth() || 
                                (currentMonth === birthdate.getMonth() && currentDate < birthdate.getDate()));

                    document.getElementById("signupAd").type = "submit";
                    return age;
                }
            }
            const ageValue = age(birthdate);
            // console.log(ageValue);

            if (valid != true){
                if (ageValue >= 18 && ageValue < 70) {
                    document.getElementById("adDOB").classList.remove("is-invalid");
                    document.getElementById("date-label-admin").classList.remove("valid-feedback");
                    document.getElementById("age").value = ageValue;
                    document.getElementById("signupAd").type = "submit";
                    // alert("Legal Age. Your age is accepted!");
                    
                }else if(ageValue < 18  || ageValue > 70){
                    // alert("Invalid! You are still under the age of 18.");
                    document.getElementById("adDOB").classList = "form-control is-invalid";
                    document.getElementById("date-label-admin").classList = "invalid-feedback";
                    document.getElementById("date-label-admin").innerHTML = "Invalid Age. You are not Eligible!";
                    document.getElementById("signupAd").type = "button";

                } 
                else {
                    document.getElementById("adDOB").classList = "form-control is-invalid";
                    document.getElementById("date-label-admin").classList = "invalid-feedback";
                    document.getElementById("date-label-admin").innerHTML = "Error! Age undefined.";
                    document.getElementById("signupAd").type = "button";
                    // alert("Invalid! Age cannot be calculated.");
                }
            }
            
        });
</script>

<!-- Password Validator for Admin-->
<script type="text/javascript">
    $(document).ready(function(){
        $("#adminpassword").keyup(function(){
            var password = $(this).val();
            var passwordBox = document.getElementById("adminpassword");
            var label = document.getElementById("ad-password-label");

            // Validations
            var regex = new Array();
            regex.push("[A-Z]"); //Uppercase Alphabet.
            regex.push("[a-z]"); //Lowercase Alphabet.
            regex.push("[0-9]"); //Digit.
            regex.push("[$@$!%*#?&_-]"); //Special Character.

            var passed = 0;

            for (var i = 0; i < regex.length; i++) {
                if (new RegExp(regex[i]).test(password)) {
                passed++;
                }
            }
            //Password Length.
            if (password.length >= 8 && passed == 4) {
                var passed = 5;
            }

            //Progress Bar
            switch (passed) {
                case 0:
                    
                case 1:
                    
                case 2:
                        passwordBox.classList = "form-control border border-danger"
                        label.classList = "form-label fs-6 text-danger";
                        label.innerHTML = "Strenght: Weak";
                    break;
                case 3:
                        passwordBox.classList = "form-control border border-warning"
                        label.classList ="form-label fs-6 text-warning";
                        label.innerHTML = "Strenght: Medium";
                    break;
                case 4:
                        passwordBox.classList = "form-control border border-primary"
                        label.classList ="form-label fs-6 text-primary";
                        label.innerHTML = "Strenght: Strong";
                    break;
                case 5:
                        passwordBox.classList = "form-control is-valid"
                        label.classList ="form-label fs-6 text-success";
                        label.innerHTML = "Strenght: Very Strong";
                    break;
                default:
                    break;
            }
            
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#adminCpassword").keyup(function(){
            var cPassword = $(this).val();
            var password = document.getElementById("adminpassword").value;
            var confirmPassword = document.getElementById("adminCpassword");
            var label = document.getElementById("ad-Cpassword-label");

            if (cPassword == null || cPassword == "") {
                
            }
            else if (cPassword == password) {
               confirmPassword.classList="form-control is-valid";
                label.innerHTML = "Password matched!";
                label.classList = "form-label fs-6 text-success";
                document.getElementById("signupAd").type = "submit";


            }else{
                confirmPassword.classList="form-control is-invalid";
                label.innerHTML = "Password Do not matched!";
                label.classList = "form-label fs-6 text-danger";
                document.getElementById("signupAd").type = "button";
            }
        });
    });
</script>

<!-- Address Dropdown List -->
<script type="text/javascript">
    //Region State
    $('#region').on('change', function () {
        var region_id = this.value;
        // console.log(region_id);
        $.ajax({
            url: 'getState.php',
            type: "POST",
            data:{
                region_data:region_id
            },
            success: function (result) {
                $('#province').html(result);
            }
        })
    });

    //State/Province City
    $('#province').on('change', function () {
        var state_id = this.value;
        console.log(state_id);
        $.ajax({
            url: 'getCity.php',
            type: "POST",
            data:{
                state_data:state_id
            },
            success: function (data) {
                $('#city').html(data);
            }
        })
    });

    //City/Municipality Barangay
    $('#city').on('change', function () {
        var city_id = this.value;
        // console.log(city_id);
        $.ajax({
            url: 'getBrgy.php',
            type: "POST",
            data:{
                city_data:city_id
            },
            success: function (res) {
                $('#brgy').html(res);
            }
        })
    });
</script>
</html>