<?php
include '../connectDB.php';
$sql = "SELECT DISTINCT SITE_ID, SITE_NAME FROM sites";
$res = mysqli_query($conn, $sql);
$options = '';
while ($row = $res->fetch_assoc()) {
    $options .= '<option value="' . $row["SITE_ID"] . '">' . $row["SITE_NAME"] . '</option>';
}

$options = ($options === '') ? 'No Employees' : $options;
echo $options;