<?php
include '../connectDB.php';
function fetch_leave_bal($conn, $month, $emp)
{
    $prev_month = Date("Y-m-d", strtotime($month . " -1 Month"));
    $two_month_back = Date("Y-m-d", strtotime($prev_month . " -1 Month"));
    $query_two_month_back = "SELECT C_OFF_BAL, E_LEAVE_BAL FROM leaves WHERE MONTH='$two_month_back' and EMP_ID='$emp'";
    $query = "SELECT C_OFF_BAL, E_LEAVE_BAL,WORKING_DAYS FROM leaves WHERE MONTH='$prev_month' and EMP_ID='$emp'";
    $res = mysqli_query($conn, $query);
    $res_tmb = mysqli_query($conn, $query_two_month_back);
    $m = Date("m", strtotime($prev_month));
    $EL_tmb = 0;
    if ($res->num_rows > 0) {
        if ($res_tmb->num_rows > 0) {
            $row_tmb = $res_tmb->fetch_assoc();
            $EL_tmb = $row_tmb["E_LEAVE_BAL"];
        }
        $row = mysqli_fetch_assoc($res);
        $new_c_avlbl = $row["C_OFF_BAL"];
        $new_el_avlbl = $row["E_LEAVE_BAL"] + $row["WORKING_DAYS"] * 0.05 - $EL_tmb;
        if ($m === '12') {
            $new_c_avlbl += 20;
        }
        $query = "UPDATE `leaves` SET C_OFF_AVAILABLE=$new_c_avlbl, E_LEAVE_AVAILABLE=$new_el_avlbl WHERE EMP_ID='$emp' and MONTH='$month'";
        if ((mysqli_query($conn, $query))) {
            return true;
        } else {
            return false;
        }
    }
    return true;
}
