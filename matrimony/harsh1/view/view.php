<?php

session_start();
include_once "conn.php";

$viewedBy = $_SESSION['unique_id'];
$viewedTo = mysqli_real_escape_string($conn, $_POST['viewedTo']);

$sql = mysqli_query($conn, "INSERT INTO views (viewed_to, viewed_by, on_time)
VALUES ({$viewedTo}, {$viewedBy}, NOW())");

?>