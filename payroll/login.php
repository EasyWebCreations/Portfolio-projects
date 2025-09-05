<?php

$user = $_POST["userid"];
$pass = $_POST["password"];
include_once 'connectDB.php';
session_start();
$sql = "SELECT user_desig FROM users WHERE username='$user' and password='$pass' ";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
    $_SESSION["user"] = $row["user_desig"];
    $conn->close();
    header("Location: dashboard.php");
    exit;
} else {
    echo "<script>alert('Invalid Username or Password')</script>";
}
$conn->close();
header("Location: index.php");
exit;