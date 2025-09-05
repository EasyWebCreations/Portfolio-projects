<?php
$result = "";
$row = array();
$myRowCookieName = 'myRow';

if (isset($_COOKIE[$myRowCookieName])) {
  // echo "cookie found<br>";
  $row = json_decode($_COOKIE[$myRowCookieName], true);
} else {
  // echo "cookie not found<br>";
  // include_once "conn.php";
  $result = mysqli_query($conn, "SELECT * FROM per_details WHERE id = {$_SESSION['unique_id']}");
  if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);
    setcookie($myRowCookieName, json_encode($row), time() + 300, "/");
  }
}
