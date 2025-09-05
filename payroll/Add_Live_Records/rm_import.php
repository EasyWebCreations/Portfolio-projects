<?php
include 'wait.php';
include 'config.php';
include 'get_month.php';
include 'fetch_leave_bal.php';
include 'salary_calculations.php';
$answer = 1;
$month = $_POST['upload_month'];
$site = $_POST['upload_site'];
// $file_from_form = $_POST['file'];
// echo $month . $site;
$sql = "select * from leaves where MONTH='$month' and SITE_ID='$site'";
// echo $sql;
$result = mysqli_query($conn, $sql);
// echo 
$filename = $_FILES["file"]["tmp_name"];
// echo $_FILES["file"]["type"]; 
if ($_FILES["file"]["size"] > 0) {
    $file = fopen($filename, "r");
    $emapData = fgetcsv($file, 10000, ",");
    while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {

        $empid = $emapData[0];
        $working_days = $emapData[4];
        $weekly_off = $emapData[5];
        $paid_holidays = $emapData[6];
        $cl_availed = $emapData[8];
        // new addition (earn c off) start
        $cl_earned = $emapData[9];
        // new addition ends
        $el_availed = $emapData[11];
        $lwp = $emapData[12];
        $paydays = $emapData[13];
        $advance = $emapData[14];
        $other_deduction = $emapData[15];
        $overtime = $emapData[16];

        $update_query = "UPDATE `leaves` SET `WORKING_DAYS`=$working_days,`WEEKLY_OFF`=$weekly_off,`C_OFF_AVAILED`=$cl_availed,`C_OFF_EARNED`=$cl_earned,`E_LEAVE_AVAILED`=$el_availed,
        `LEAVE_WITHOUT_PAY`=$lwp,`PAID_HOLIDAYS`=$paid_holidays,`ADV`=$advance,`OVER_TIME`=$overtime,`OTHER_DEDUCTION`=$other_deduction
         WHERE EMP_ID=$empid and SITE_ID='$site' and MONTH='$month';";
        // echo "update1:" . $update_query;
        if (mysqli_query($conn, $update_query)) {
            if (fetch_leave_bal($conn, $month, $empid)) {
                $query2 = "SELECT * FROM `leaves` WHERE EMP_ID='$empid' and MONTH='$month'";
                // echo "q2  " . $query2;
                $res = mysqli_query($conn, $query2);
                if ($res->num_rows === 1) {
                    $row = $res->fetch_assoc();
                    $u_c_off_bal = (int)$row["C_OFF_AVAILABLE"] - (int)$row["C_OFF_AVAILED"] + $row["C_OFF_EARNED"];
                    $u_e_l_bal = (int)$row["E_LEAVE_AVAILABLE"] - (int)$row["E_LEAVE_AVAILED"];
                    $u_pay_days = (int)$row["WORKING_DAYS"] + (int)$row["C_OFF_AVAILED"] + (int)$row["E_LEAVE_AVAILED"] - (int)$row["LEAVE_WITHOUT_PAY"];
                    $query3 = "UPDATE `leaves` SET C_OFF_BAL=$u_c_off_bal, E_LEAVE_BAL=$u_e_l_bal, PAY_DAYS=$u_pay_days WHERE EMP_ID='$empid' and MONTH='$month'";
                    $query4 = "UPDATE `salary` SET PAY_DAYS=$u_pay_days WHERE EMP_ID='$empid' and MONTH='$month'";
                    $salary_calculation = calculateSalary($conn, $month, $empid);
                    if (mysqli_query($conn, $query3) and mysqli_query($conn, $query4) and $salary_calculation) {
                        $answer = 1;
                    }
                }
            } else {
                $answer =  -1;
                break;
            }
        } else {
            $answer = 0;
        }
    }
}

if ($answer === 1) {
    echo "<script src='../js/sweetalert.min.js'></script>
    <script>
    swal('Operation Completed','Records added successfully','success');
    setTimeout(function()
    {
        window.location.href = 'add_monthly_records.php';
    }, 7000);
    </script>";
    // header('Location: add_monthly_records.php');
} else {
    echo "<script src='../js/sweetalert.min.js'></script>
    <script>
    swal('Operation Failed','Please upload in correct format','error');
    setTimeout(function()
    {
        window.location.href = 'add_monthly_records.php';
    }, 9000);
    </script>";
}

// echo $Site.$month;