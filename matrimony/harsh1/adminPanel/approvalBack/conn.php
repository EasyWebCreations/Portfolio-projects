<?php
// $hostname = "sql604.main-hosting.eu";
// $username = "u352929645_aksh_user";
// $password = "Ecct@29052000";
// $dbname = "u352929645_akshadaa_main";

include '../../../connect.php';

// $hostname = "us-cdbr-east-04.cleardb.com";
// $username = "b14a207143d272";
// $password = "148155f8";
// $dbname = "heroku_47c60d4bda8cc71";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
  echo "Database connection error" . mysqli_connect_error();
}
