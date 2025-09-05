<?php
include 'connectDB.php';
$EMP_ID = $_POST["empId"];
$del_emp = "DELETE FROM `emp_details` WHERE EMP_ID = $EMP_ID";
$del_leave = "DELETE FROM `leaves` WHERE EMP_ID = $EMP_ID";
$del_sal = "DELETE FROM `salary` WHERE EMP_ID = $EMP_ID";

$res1 = mysqli_query($conn, $del_emp);
$res2 = mysqli_query($conn, $del_leave);
$res3 = mysqli_query($conn, $del_sal);
if ($res1 && $res2 && $res3) {
    echo 1;
} else {
    echo 0;
}