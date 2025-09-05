<?php
include 'config.php';
if (isset($_POST["site_id"]) and isset($_POST["month"])) {
    $siteid = $_POST["site_id"];
    $month = $_POST["month"];
    $query = "select emp_details.EMP_NAME,emp_details.DESIGNATION,emp_details.UAN_NO,
    emp_details.BASIC_SAL as f_basic,emp_details.HRA_SAL as f_hra,
    emp_details.ALLOW as f_allow, salary.* from 
    emp_details INNER JOIN salary on emp_details.EMP_ID=salary.EMP_ID 
    and salary.SITE_ID='$siteid' and salary.MONTH='$month'";


    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        $output = '';
        $count = 1;
        while ($row = mysqli_fetch_array($result)) {
            // $siteId = $row['SITE_ID'];
            $id = $row['EMP_ID'];
            $query_L = "SELECT * FROM leaves WHERE MONTH='$month' AND EMP_ID='$id'";
            $res_L = mysqli_query($conn, $query_L);
            $row_L = mysqli_fetch_array($res_L);
            // $name = $row['EMP_NAME'];
            // $designation = $row['DESIGNATION'];
            // $uan = $row['UAN_NO'];
            // $esic = $row['ESIC_NO'];

            // $working_days = $row['WORKING_DAYS'];
            // $weekly_off = $row['WEEKLY_OFF'];

            // $c_off_available = $row['C_OFF_AVAILABLE'];
            // $c_off_availed = $row['C_OFF_AVAILED'];
            // $c_off_bal = $row['C_OFF_BAL'];



            // $EL_available = $row['E_LEAVE_AVAILABLE'];
            // $EL_availed = $row['E_LEAVE_AVAILED'];
            // $EL_bal = $row['E_LEAVE_BAL'];

            // $lwp = $row['LEAVE_WITHOUT_PAY'];
            $pay_days = $row['PAY_DAYS'];
            // $paid_holidays = $row['PAID_HOLIDAYS'];
            // $adv = $row['ADV'];
            // $other_deduction = $row['OTHER_DEDUCTION'];
            // $over_time = $row['OVER_TIME'];
            // $spl_allow = $row['SPL_ALLOW'];
            $f_gross = (int)$row["f_basic"] + (int)$row["f_hra"] + (int)$row["f_allow"];
            $a_gross = $row["BASIC_SAL"] + $row["HRA_SAL"] + $row["PDA"];
            $month_days = cal_days_in_month(CAL_GREGORIAN, substr($month, 5, 2), substr($month, 0, 4));
            $company_working_days = $month_days  - $row_L["PAID_HOLIDAYS"];  //#
            $attendance = $row_L["WORKING_DAYS"] + $row_L["WEEKLY_OFF"]; //30
            //$leaves = $row_L["C_OFF_AVAILED"] + $row_L["E_LEAVE_AVAILED"];
            $leaves = $row_L["E_LEAVE_AVAILED"];
            $net_without_OT = $a_gross - $row["D_15"]; //22500
            $net_payable_without_OT = $net_without_OT - $row["ADV"];
            $output .= '<tr  class="table-light">
            <td>' . $count++ . '</td> 
            <td>' . date('M-y', strtotime($month)) . '</td>
            <td>' . $row["UAN_NO"] . '</td>
            <td>' . $row["EMP_NAME"] . '</td>
            <td>' . $row["DESIGNATION"] . '</td>
            <td>' . round($row["f_basic"]) . '</td>
            <td>' . round($row["f_hra"]) . '</td>
            <td>' . round($row["f_allow"]) . '</td>
            <td>' . round($f_gross) . '</td>
            <td>' . $month_days . '</td>
            <td>' . $row_L["WORKING_DAYS"] . '</td>
            <td>' . $row_L["WEEKLY_OFF"] . '</td>
            <td>' . $row_L["C_OFF_AVAILED"] . '</td>
            <td>' . $row_L["LEAVE_WITHOUT_PAY"] . '</td>
            <td>' . round($leaves) . '</td>
            <td>' . round($pay_days) . '</td>
            <td>' . round($row["BASIC_SAL"]) . '</td>
            <td>' . round($row["HRA_SAL"]) . '</td>
            <td>' . round($row["PDA"]) . '</td>
            <td>' . round(($row["BASIC_SAL"] + $row["HRA_SAL"] + $row["PDA"])) . '</td>
            <td>' . round($row["LEAVE_PAY"]) . '</td>
            <td>' . round(($a_gross + $row["LEAVE_PAY"])) . '</td>
            <td>' . round($row["PF_WAGES"]) . '</td>
            <td>' . round($row["A_BASIC_15"]) . '</td>
            <td>' . round($row["A_PF_15"]) . '</td>
            <td>' . round($row["ESIC"]) . '</td>
            <td>' . round($row["PT"]) . '</td>
            <td>' . round($row["D_15"]) . '</td>
            <td>' . round(($a_gross + $row["LEAVE_PAY"] - $row["D_15"])) . '</td>
            <td>' . round($row["OTHER_DEDUCTION"]) . '</td>
            <td>' . round($row["ADV"]) . '</td>
            <td>' . round(($a_gross + $row["LEAVE_PAY"] - $row["D_15"] - $row["OTHER_DEDUCTION"] - $row["ADV"])) . '</td>
            <td>' . round($row_L["PAID_HOLIDAYS"]) . '</td>
            <td>' . round($row["PH_PAY"]) . '</td>
            <td>' . round($row_L["OVER_TIME"]) . '</td>
            <td>' . round($row["OVER_TIME_PAY"]) . '</td>
            <td>' . round(($row["A_PF_15"] / 12 * 12.65)) . '</td>
            <td>' . round(($row["BASIC_SAL"] + $row["HRA_SAL"] + $row["PDA"]) * 3.25 / 100) . '</td>
            <td>' . round($row["f_basic"] * 12 / 305 * $row_L["WORKING_DAYS"] * 8.33 / 100) . '</td>
        </tr>';
        }
        echo $output;
    } else {
        echo "No record found";
    }
} else {
    // echo "Please select a month and site";
}