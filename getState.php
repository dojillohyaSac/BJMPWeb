<?php
include 'admin/includes/config.php';

$region_id = $_POST['region_data'];
$state = "SELECT * FROM `refprovince` WHERE `regCode` = '$region_id'";
$state_query = mysqli_query($conn, $state);

$list = '<option value disabled selected>Select State/Province</option>';
while ($state_row = mysqli_fetch_assoc($state_query)) {
    $list .= '<option value="'.$state_row['provCode'].'">'.$state_row['provDesc'].'</option>';
}

echo $list;

?>