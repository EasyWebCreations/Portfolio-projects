<?php

$hostname = 'srv1127.hstgr.io';
$dbname = 'u972129759_payroll';
$username = 'u972129759_payroll';
$password = 'Ecct@29052000';


// $hostname = 'us-cdbr-east-04.cleardb.com';
// $username = 'b61dd8a7546b84';
// $password = 'df074217';
// $dbname = 'heroku_ea6a4a6818fa893';


$connect = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
