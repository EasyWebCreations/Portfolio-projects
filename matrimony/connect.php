<?php
// $hostname = "sql604.main-hosting.eu";
// $username = "u352929645_aksh_user";
// $password = "Ecct@29052000";
// $dbname = "u352929645_akshadaa_main";

// $hostname = "us-cdbr-east-06.cleardb.net";
// $username = "b8b84d6c4dbf2d";
// $password = "3e2c163b";
// $dbname = "heroku_3f7ab1b0ec0022f";

$hostname = "srv1127.hstgr.io";
$username = "u972129759_admin";
$password = "Ecc@2905";
$dbname = "u972129759_akshadaa";


// $hostname = "us-cdbr-east-04.cleardb.com";
// $username = "b14a207143d272";
// $password = "148155f8";
// $dbname = "heroku_47c60d4bda8cc71";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
  echo "Database connection error" . mysqli_connect_error();
}
