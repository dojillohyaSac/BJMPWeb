<?php
include 'admin/includes/config.php';

$city_id = $_POST['city_data'];
$brgy = "SELECT * FROM `refbrgy` WHERE `citymunCode` = '$city_id'";
$brgy_query = mysqli_query($conn, $brgy);

$list = '<option value disabled selected>Select Barangay</option>';
while ($brgy_row = mysqli_fetch_assoc($brgy_query)) {
    $list .= '<option value="'.$brgy_row['brgyCode'].'">'.$brgy_row['brgyDesc'].'</option>';
}

echo $list;

?>