<?php



// $hostname = 'us-cdbr-east-04.cleardb.com';
// $username = 'b61dd8a7546b84';
// $password = 'df074217';
// $dbname = 'heroku_ea6a4a6818fa893';

$hostname = 'srv1127.hstgr.io';
$dbname = 'u972129759_payroll';
$username = 'u972129759_payroll';
$password = 'Ecct@29052000';


$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
    echo "connection error" . mysqli_connect_error();
} else {
    // echo "Succesfully Connected";
}
