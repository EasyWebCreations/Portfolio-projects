<?php
include 'config.php';
if (isset($_POST["site_id"]) && isset($_POST["month"])) {
    $siteid = $_POST["site_id"];
    $month = $_POST["month"];


    $query = "SELECT * from emp_details INNER JOIN leaves 
             on emp_details.EMP_ID=leaves.EMP_ID and 
             leaves.SITE_ID='$siteid' and leaves.MONTH='$month'";

    $result = mysqli_query($con, $query);
    if ($result->num_rows === 0) {
        $query0 = "INSERT INTO `salary`(`EMP_ID`, `SITE_ID`,`BASIC_SAL`, `HRA_SAL`, `SPL_ALLOW`) 
                    select EMP_ID, SITE_ID, BASIC_SAL, HRA_SAL, SPL_ALLOW from emp_details";
        $query1 = "UPDATE salary set MONTH='$month' where MONTH=0000-00-00";
        $query2 = "INSERT INTO `leaves`(`EMP_ID`, `SITE_ID`) select EMP_ID, SITE_ID from emp_details";
        $query3 = "UPDATE leaves set MONTH='$month' where MONTH=0000-00-00";
        mysqli_query($con, $query0);
        mysqli_query($con, $query1);
        mysqli_query($con, $query2);
        mysqli_query($con, $query3);
        $result = mysqli_query($con, $query);
    } else {
        $result = mysqli_query($con, $query);
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
            $c_off_bal = $row['C_OFF_BAL'];



            $EL_available = $row['E_LEAVE_AVAILABLE'];
            $EL_availed = $row['E_LEAVE_AVAILED'];
            $EL_bal = $row['E_LEAVE_BAL'];

            $lwp = $row['LEAVE_WITHOUT_PAY'];
            $pay_days = $row['PAY_DAYS'];

            $output .= "    
        <tr class='table-light'>
            <td>
                <div contentEditable='false' class='edit' id='SITE_ID__" . $id . "'> " . $siteId . "</div>
            </td>
            <td>" . $id . "</td>
            <td>
                <div contentEditable='false' class='edit' id='EMP_NAME__" . $id . "'> " . $name . "</div>
            </td>
            <td>
                <div contentEditable='false' class='edit' id='DESIGNATION__" . $id . "'> " . $designation . "</div>
            </td>
            <td>
                <div contentEditable='false' class='edit' id='UAN__" . $id . "'> " . $uan . "</div>
            </td>
            <td>
                <div contentEditable='false' class='edit' id='ESIC__" . $id . "'> " . $esic . "</div>
            </td>
            <td>
                <div contentEditable='false' class='edit' id='MONTH_DAYS__" . $id . "'> " . $month . "</div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='WORKING_DAYS__" . $id . "'> " . $working_days . "</div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='WEEKLY_OFF__" . $id . "'> " . $weekly_off . "</div>
            </td>
            <td>
                <div contentEditable='false' class='edit' id='C_OFF_AVAILABLE__" . $id . "'> " . $c_off_available . "</div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='C_OFF_AVAILED__" . $id . "'> " . $c_off_availed . "</div>
            </td>
            <td>
                <div contentEditable='false' class='edit' id='C_OFF_BAL__" . $id . "'> " . $c_off_bal . "</div>
            </td>
            <td>
                <div contentEditable='false' class='edit' id='E_LEAVE_AVAILABLE__" . $id . "'> " . $EL_available . "</div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='E_LEAVE_AVAILED__" . $id . "'> " . $EL_availed . "</div>
            </td>
            <td>
                <div contentEditable='false' class='edit' id='E_LEAVE_BAL__" . $id . "'> " . $EL_bal . "</div>
            </td>
            <td>
                <div contentEditable='true' class='edit' id='LEAVE_WITHOUT_PAY__" . $id . "'> " . $lwp . "</div>
            </td>
            <td>
                <div contentEditable='false' class='edit' id='PAY_DAYS__" . $id . "'> " . $pay_days . "</div>
            </td>
        </tr>";
        }
        echo $output;
    } else {
        echo "No record found";
    }
} else {
    echo "Please select a month and site";
}