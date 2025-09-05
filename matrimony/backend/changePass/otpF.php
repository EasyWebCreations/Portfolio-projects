<?php
session_start();
include_once "../connect.php";

// header("refresh:1; url = changePass.php");


if (isset($_POST['register'])) {
  $in_otp = $_POST['inotp'];


  if ($in_otp == $_COOKIE['otp']) {
    // if (true) {
    echo "Success!";
    $_SESSION['mobile'] = $_COOKIE['mobile'];
    $_SESSION['email'] = $_POST['email'];
    $email = $_SESSION['email'];
    $sql = mysqli_query($conn, "SELECT mobile FROM per_details WHERE email = '{$email}'");
    if (mysqli_num_rows($sql) > 0) {
      $row = mysqli_fetch_assoc($sql);
      if ($_SESSION['mobile'] == $row['mobile']) {
        header("refresh:1; url = changePass.php");
      } else {
        echo "Email ID And Mobile No. Not Matched";
      }
    } else {
      echo "Something went wrong. Please try again!";
    }
  } else {
    echo "Otp didn't matched!";
    header("refresh:2; url= ../../index.php");
  }
} else {
  echo "something went wrong!";
  header("refresh:2; url = ../../index.php");
}
