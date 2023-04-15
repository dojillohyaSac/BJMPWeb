<?php
include 'admin/includes/config.php';

$state_id = $_POST['state_data'];
$city = "SELECT * FROM `refcitymun` WHERE `provCode` = '$state_id'";
$city_query = mysqli_query($conn, $city);

$list = '<option value disabled selected>Select City</option>';
while ($city_row = mysqli_fetch_assoc($city_query)) {
    $list .= '<option value="'.$city_row['citymunCode'].'">'.$city_row['citymunDesc'].'</option>';
}

echo $list;

?>