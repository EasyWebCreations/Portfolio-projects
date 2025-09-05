<?php
include 'config.php';


// header('Location: pdf.php');
require_once '../Payslip/vendor/autoload.php';
if (isset($_POST["Site_ID"]) and isset($_POST["rm_month"])) {
    $month = $_POST['rm_month'];
    $site = $_POST['Site_ID'];
    $query = "select * from emp_details INNER JOIN leaves 
             on emp_details.EMP_ID=leaves.EMP_ID and 
             leaves.SITE_ID='$site' and leaves.MONTH='$month'";
    $result = mysqli_query($conn, $query);
}
if ($result->num_rows === 0) {
    include_once 'get_month.php';
    $prev_month = get_previous_month();
    $query1 = "INSERT INTO `leaves`(`EMP_ID`, `SITE_ID`) select EMP_ID, SITE_ID from emp_details";
    $query2 = "UPDATE leaves set MONTH='$month'  where MONTH=0000-00-00";
    $query2_1 = "UPDATE `leaves` AS l1 JOIN `leaves` AS l2 ON l1.EMP_ID=l2.EMP_ID
    SET    l2.E_LEAVE_AVAILABLE = l1.E_LEAVE_BAL
    WHERE  l1.MONTH = '$prev_month' AND l2.MONTH = '$month'";
    $query3 = "UPDATE salary set MONTH='$month' where MONTH=0000-00-00";

    mysqli_query($conn, $query1);
    mysqli_query($conn, $query2);
    mysqli_query($conn, $query2_1);
    mysqli_query($conn, $query3);
    $result = mysqli_query($conn, $query);
} else {
    $result = mysqli_query($conn, $query);
}

// $pdfcontent = $_POST['pdf_table'];
// $filename = $_POST['filename'];
$ppp = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>' . $site . $month . '</title>
    <style>
        table {
            width: 96%;
            margin: 2% 2%;
            border-collapse: collapse;
            font-family: Arial, Helvetica, sans-serif;
        }
        tr:nth-of-type(odd) {
            background: #eee;
        }
        
        th {
            background: blue;
            color: white;
            font-weight: bold;
        }
        
        td,
        th {
            padding: 6px;
            border: 1px solid #ccc;
            text-align: left;
        }
    </style>
</head>

<body>
<div style="text-align: center;overflow-x: auto;">
        <table class="table table-striped table-primary table-hover table-bordered"
            style="margin: 3%;padding-left:0px;">
            <thead >
                <tr>
                    <th style="background-color:rgb(74, 25, 209);color:white" width="3%">Employee ID</th>
                    <th style="background-color:rgb(74, 25, 209);color:white"  width="7%">Employee Name</th>
                    <th style="background-color:rgb(74, 25, 209);color:white"  width="5%">Designation</th>
                    <th style="background-color:rgb(74, 25, 209);color:white"  width="5%">Month days</th>
                    <th style="background-color:rgb(74, 25, 209);color:white"  width="5%">Working days</th>
                    <th style="background-color:rgb(74, 25, 209);color:white"  width="5%">Weekly off</th>
                    <th style="background-color:rgb(74, 25, 209);color:white"  width="5%">Paid Holidays</th>
                    <th style="background-color:rgb(74, 25, 209);color:white"  width="5%">Casual Leave Available</th>
                    <th style="background-color:rgb(74, 25, 209);color:white"  width="5%">Casual Leave Availed</th>
                    <th style="background-color:rgb(74, 25, 209);color:white"  width="5%">Earn Leave Available</th>
                    <th style="background-color:rgb(74, 25, 209);color:white"  width="5%">Earn Leave Availed</th>
                    <th style="background-color:rgb(74, 25, 209);color:white"  width="5%">Leave Without Pay</th>
                    <th style="background-color:rgb(74, 25, 209);color:white"  width="5%">Pay Days</th>
                    <th style="background-color:rgb(74, 25, 209);color:white"  width="5%">Advance</th>
                    <th style="background-color:rgb(74, 25, 209);color:white"  width="5%">Other Deduction</th>
                    <th style="background-color:rgb(74, 25, 209);color:white"  width="5%">Overtime</th>
                    <th style="background-color:rgb(74, 25, 209);color:white"  width="5%">UAN</th>
                    <th style="background-color:rgb(74, 25, 209);color:white"  width="5%">ESIC</th>
                </tr>
            </thead>
            <tbody id="tbody_monthly">';
if ($result->num_rows > 0) {
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
        $paid_holidays = $row['PAID_HOLIDAYS'];
        $adv = $row['ADV'];
        $other_deduction = $row['OTHER_DEDUCTION'];
        $over_time = $row['OVER_TIME'];

        $month_days = cal_days_in_month(CAL_GREGORIAN, substr($month, 5, 2), substr($month, 0, 4));
        $ppp .=
            '<tr class="table-light">
                <td style="color: brown;" width="3%">' . $id . '</td>
                <td style="color: brown;" width="7%">' . $name . '</td>
                <td style="color: brown;" width="5%">' . $designation . '</td>
                <td style="color: brown;" width="5%">' . $month_days . '</td>
                <td width="5%">' . $working_days . '</td>
                <td width="5%">' . $weekly_off . ' </td>
                <td width="5%">' . $paid_holidays . '</td>
                <td style="color: brown;" width="5%">' . $c_off_available . '</td>
                <td width="5%">' . $c_off_availed . '</td>
                <td style="color: brown;" width="5%">' . $EL_available . '</td>
                <td width="5%">' . $EL_availed . '</td>
                <td width="5%">' . $lwp . '</td>
                <td width="5%">' . $pay_days . '</td>
                <td width="5%">' . $adv . '</td>
                <td width="5%">' . $other_deduction . '</td>
                <td width="5%">' . $over_time . '</td>
                <td style="color: brown;" width="5%">' . $uan . '</td>
                <td style="color: brown;" width="5%">' . $esic . '</td>
            </tr>';
    }

    $ppp .= '</tbody>
        </table>
    </div>
    </body>
</html>';
}
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=Format_' . $site . '_' . $month . '.xls');
echo $ppp;