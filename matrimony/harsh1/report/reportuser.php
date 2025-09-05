<?php

session_start();
include_once "conn.php";

$reporter = $_SESSION['unique_id'];
$reason = mysqli_real_escape_string($conn, $_POST['Reason']);
$reportTo = mysqli_real_escape_string($conn, $_POST['reportTo']);
$report_decision = 'Pending';

$sql = "INSERT INTO report (reported_by, reported_to, report_reason, report_decision) VALUES ({$reporter},{$reportTo},'{$reason}','{$report_decision}')";

$query = mysqli_query($conn, $sql);

if ($query) {
    echo "success!";
} else {
    echo "something went wrong!";
}
