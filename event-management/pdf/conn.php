<?php
// $hostname = "217.21.74.90";
// $username = "u352929645_easytechs";
// $password = "Ecct@29052000";
// $dbname = "u352929645_akshadaaevent";

$hostname = "srv1127.hstgr.io";
$username = "u972129759_event_akshadaa";
$password = "Ecct@29052000";
$dbname = "u972129759_event_akshadaa";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
  echo "Database connection error" . mysqli_connect_error();
}
