<?php

include "config.php";
include "salary_calculations.php";
include "fetch_leave_bal.php";
if (isset($_POST['field']) && isset($_POST['month']) && isset($_POST['value']) && isset($_POST['id'])) {
    $field = mysqli_real_escape_string($conn, $_POST['field']);
    $value = mysqli_real_escape_string($conn, $_POST['value']);
    $editid = mysqli_real_escape_string($conn, $_POST['id']);
    $month = mysqli_real_escape_string($conn, $_POST['month']);

    //$query = "UPDATE emp_details SET ".$field."='".$value."' WHERE EMP_ID=".$editid;
    // $validation_query  = "SELECT * FROM leaves WHERE EMP_ID='$editid' and MONTH='$month'";
    // $validation_result = mysqli_query($conn, $validation_query);
    // $validation_row = mysqli_fetch_assoc($validation_result);
    // if ($field === 'C_OFF_AVAILED' and (int)$validation_row['C_OFF_AVAILABLE'] < (int)$value) {
    //     $lwp = $validation_row["LWP"] + $value - $validation_row['C_OFF_AVAILABLE'];

    //     echo 0;
    //     exit;
    // }
    // if ($field === 'E_LEAVE_AVAILED' and (int)$validation_row['E_LEAVE_AVAILABLE'] < (int)$value) {
    //     echo 0;
    //     exit;
    // }

    $query = "UPDATE `leaves` SET $field='$value' WHERE EMP_ID='$editid' and MONTH='$month'";
    fetch_leave_bal($conn, $month, $editid);
    if (mysqli_query($conn, $query)) {
        $query2 = "SELECT * FROM `leaves` WHERE EMP_ID='$editid' and MONTH='$month'";
        $res = mysqli_query($conn, $query2);
        if ($res->num_rows === 1) {
            $row = $res->fetch_assoc();
            $lwp = $row["LEAVE_WITHOUT_PAY"];
            $u_c_off_bal = (int)$row["C_OFF_AVAILABLE"] - (int)$row["C_OFF_AVAILED"] + $row["C_OFF_EARNED"];
            $u_e_l_bal = (float)$row["E_LEAVE_AVAILABLE"] - (float)$row["E_LEAVE_AVAILED"];
            $c_avld = $row["C_OFF_AVAILED"];
            $el_avld = $row["E_LEAVE_AVAILED"];
            if ($u_c_off_bal < 0) {
                $lwp += -1 * $u_c_off_bal;
                $u_c_off_bal = 0;
                $c_avld = $row["C_OFF_AVAILABLE"];
            }
            if ($u_e_l_bal < 0) {
                $lwp += -1 * $u_e_l_bal;
                $u_e_l_bal = 0;
                $el_avld = $row["E_LEAVE_AVAILABLE"];
            }
            // if ($field === 'C_OFF_AVAILED' and (int)$row['C_OFF_AVAILABLE'] < (int)$value) {
            //     $lwp = $lwp + $value - $row['C_OFF_AVAILABLE'];
            //     $u_c_off_bal = 0;
            // }
            // if ($field === 'E_LEAVE_AVAILED' and (int)$row['E_LEAVE_AVAILABLE'] < (int)$value) {
            //     $lwp = $row["LEAVE_WITHOUT_PAY"] + $value - $row['C_OFF_AVAILABLE'];
            //     $u_e_l_bal = 0;
            // }

            // $u_pay_days = (int)$row["WORKING_DAYS"] + (int)$row["C_OFF_AVAILED"] + (int)$row["E_LEAVE_AVAILED"] - (int)$row["LEAVE_WITHOUT_PAY"] + (int)$row["WEEKLY_OFF"];
            $u_pay_days = (int)$row["WORKING_DAYS"] + (int)$c_avld + (int)$el_avld  + (int)$row["WEEKLY_OFF"];
            $query3 = "UPDATE `leaves` SET C_OFF_AVAILED=$c_avld, C_OFF_BAL=$u_c_off_bal,E_LEAVE_AVAILED=$el_avld, E_LEAVE_BAL=$u_e_l_bal, PAY_DAYS=$u_pay_days, LEAVE_WITHOUT_PAY=$lwp WHERE EMP_ID='$editid' and MONTH='$month'";
            $query4 = "UPDATE `salary` SET PAY_DAYS=$u_pay_days WHERE EMP_ID='$editid' and MONTH='$month'";
            $salary_calculation = calculateSalary($conn, $month, $editid);
            if (mysqli_query($conn, $query3) and mysqli_query($conn, $query4) and $salary_calculation) {
                echo 1;
            }
        }
    } else {
        echo 0;
    }
} else {
    echo -1;
}