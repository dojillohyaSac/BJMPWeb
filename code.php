<?php
session_start();

if (isset($_POST['send'])) {
    $dob = filter_input(INPUT_POST,'dob');
    $date = date('Y-m-d');
    
    // $age = $date - $dob;
    // echo $dob;
    // echo $date;

    $diff = date_diff(date_create($dob), date_create($date));

    if ($diff->format('%y') >= 18) {
        $_SESSION['result'] = "Your age is ".$diff->format('%y').". This is a Legal Age to be registered.";
        header("Location: testAge.php");
    }else{
        $_SESSION['result'] = "Your still under the age of 18. This means that your registration is not valid.";
        header("Location: testAge.php");

    }
    
}

?> 