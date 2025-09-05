<?php
session_start();
include_once "connect.php";
setcookie('myRow', '', time() - 3600, "/");
if (isset($_SESSION['unique_id'])) {
  $setLoggedIn = "UPDATE per_details SET logged_in='0' WHERE id={$_SESSION['unique_id']}";
  mysqli_query($conn, $setLoggedIn);
  session_destroy();
  header("location: ../index.php");
}
