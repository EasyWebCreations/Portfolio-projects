<?php
include 'config.php';
if (isset($_POST["site_id"]) and isset($_POST["month"])) {
    $siteid = $_POST["site_id"];
    $month = $_POST["month"];
    $query = "select * from emp_details INNER JOIN leaves 
             on emp_details.EMP_ID=leaves.EMP_ID and 
             leaves.SITE_ID='$siteid' and leaves.MONTH='$month'";

    $result = mysqli_query($conn, $query);
    if ($result->num_rows === 0) {
        include_once 'fetch_leave_bal.php';
        include_once 'get_month.php';

        $prev_month = get_previous_month();
        $query1 = "INSERT INTO `leaves`(`EMP_ID`, `SITE_ID`) select EMP_ID, SITE_ID from emp_details";
        $query2 = "UPDATE leaves set MONTH='$month'  where MONTH=0000-00-00";
        mysqli_query($conn, $query1);
        mysqli_query($conn, $query2);

        $query2_1 = "SELECT EMP_ID FROM leaves where MONTH='$month'";
        $cascade_result = mysqli_query($conn, $query2_1);
        while ($row_cascade = mysqli_fetch_assoc($cascade_result)) {
            fetch_leave_bal($conn, $month, $row_cascade["EMP_ID"]);
        }

        $query3 = "UPDATE salary set MONTH='$month' where MONTH=0000-00-00";


        mysqli_query($conn, $query3);
        $result = mysqli_query($conn, $query);
    } else {
        $result = mysqli_query($conn, $query);
    }

    if ($result->num_rows > 0) {
        $output = '';
        $count = 1;
        while ($row = mysqli_fetch_array($result)) {
            $siteId = $row['SITE_ID'];
            $id = $row['EMP_ID'];

            $name = $row['EMP_NAME'];
            $designation = $row['DESIGNATION'];
            $uan = $row['UAN_NO'];
            $esic = $row['ESIC_NO'];

            $working_days = $row['WORKING_DAYS'];
            $weekly_off = $row['WEEKLY_OFF'];

            $c_off_available = $row['C_OFF_AVAILABLE'];
            $c_off_availed = $row['C_OFF_AVAILED'];
            $c_off_earned = 0; //$row['C_OFF_EARNED'];
            $c_off_bal = $row['C_OFF_BAL'];



            $EL_available = $row['E_LEAVE_AVAILABLE'];
            $EL_availed = $row['E_LEAVE_AVAILED'];
            $EL_bal = $row['E_LEAVE_BAL'];

            $lwp = $row['LEAVE_WITHOUT_PAY'];
            $pay_days = $row['PAY_DAYS'];
            $paid_holidays = $row['PAID_HOLIDAYS'];
            $adv = $row['ADV'];
            $other_deduction = $row['OTHER_DEDUCTION'];
            $over_time = $row['OVER_TIME'];
            $spl_allow = $row['SPL_ALLOW'];
            // echo $month;
            $month_days = cal_days_in_month(CAL_GREGORIAN, substr($month, 5, 2), substr($month, 0, 4));
            $id .= '__' . $month;
            $output .= "    
        <tr class='table-light'>
        <td style='background-color:#fb74994f;'>" . $row['EMP_ID'] . "</td>
       
            <td style='background-color:#fb74994f;'>
                <div contentEditable='false' class='edit' id='EMP_NAME__" . $id . "'> " . substr($name, 0, 18) . "..</div>
            </td>
            <td style='background-color:#fb74994f;'>
            <div contentEditable='false' class='edit' id='DESIGNATION__" . $id . "'> " . substr($designation, 0, 10) . "..</div>
        </td>
            <td style='background-color:#fb74994f;'>
                <div contentEditable='false' class='edit' id='MONTH_DAYS__" . $id . "'> " . $month_days . "</div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='WORKING_DAYS__" . $id . "'> " . $working_days . "</div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='WEEKLY_OFF__" . $id . "'> " . $weekly_off . "</div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='PAID_HOLIDAYS__" . $id . "'> " . $paid_holidays . "</div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='C_OFF_AVAILABLE__" . $id . "'> " . $c_off_available . "</div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='C_OFF_AVAILED__" . $id . "'> " . $c_off_availed . "</div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='C_OFF_EARNED__" . $id . "'> " . $c_off_earned . "</div>
            </td>
            
            <td>
                <div contentEditable='true' class='edit' id='C_OFF_BAL__" . $id . "'> " . $c_off_bal . "</div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='E_LEAVE_AVAILABLE__" . $id . "'> " . $EL_available . "</div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='E_LEAVE_AVAILED__" . $id . "'> " . $EL_availed . "</div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='E_LEAVE_BAL__" . $id . "'> " . $EL_bal . "</div>
            </td>
            <td style='background-color:#fb74994f;'>
                <div contentEditable='true' class='edit' id='LEAVE_WITHOUT_PAY__" . $id . "'> " . $lwp . "</div>
            </td>
            <td style='background-color:#fb74994f;'>
                <div contentEditable='true' class='edit' id='PAY_DAYS__" . $id . "'> " . $pay_days . "</div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='ADV__" . $id . "'> " . $adv . "</div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='OTHER_DEDUCTION__" . $id . "'> " . $other_deduction . "</div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='OVER_TIME__" . $id . "'> " . $over_time . "</div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='SPL_ALLOW__" . $id . "'> " . $spl_allow . "</div>
            </td>
            <td style='background-color:#fb74994f;'>
                <div contentEditable='false' class='edit' id='UAN_NO__" . $id . "'> " . $uan . "</div>
            </td>
            <td style='background-color:#fb74994f;'>
                <div contentEditable='false' class='edit' id='ESIC_NO__" . $id . "'> " . $esic . "</div>
            </td>
        </tr>";
        }
        echo $output;
    } else {
        echo "No record found";
    }
} else {
    // echo "Please select a month and site";
}