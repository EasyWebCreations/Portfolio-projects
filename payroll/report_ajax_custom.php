<?php
include "connectDB.php";
$query = "SELECT salary.MONTH,emp_details.EMP_ID, emp_details.SITE_ID, 
            emp_details.DESIGNATION, emp_details.EMP_NAME, salary.GROSS_SAL, 
            salary.NET_SAL, leaves.C_OFF_AVAILED, leaves.E_LEAVE_AVAILED, 
            leaves.LEAVE_WITHOUT_PAY FROM emp_details,salary,leaves 
            WHERE emp_details.EMP_ID = salary.EMP_ID AND 
            salary.EMP_ID=leaves.EMP_ID LIMIT 25";
if ($_POST["site"] != '' || $_POST["month"] != '' || $_POST["designation"] != '') {
    $site =  $_POST["site"];
    // echo $site;
    $month = $_POST["month"];
    // echo $month;
    $designation =   $_POST["designation"];

    if ($designation != 'All_designations') {
        $query .= " AND emp_details.DESIGNATION = '$designation'";
    }
    if ($site != 'All_sites') {
        $query .= " AND emp_details.SITE_ID = '$site'";
    }
    if ($month != 'All_months') {
        $query .= " AND salary.MONTH ='$month'";
    }
}
$output = '';
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $num = 1;

    while ($row = $result->fetch_assoc()) {

        $output .= '
        <tr  class="table-light">
            <td>' . date('m-Y', strtotime($row["MONTH"])) . '</td> 
            <td>' . $row["EMP_ID"] . '</td> 
            <td>' . $row["SITE_ID"] . '</td> 
            <td>' . $row["DESIGNATION"] . '</td>
            <td>' . $row["EMP_NAME"] . '</td>
            <td>' . (int)$row["GROSS_SAL"] . '</td>
            <td>' . (int)$row["NET_SAL"] . '</td>
            <td>' . (int)$row["C_OFF_AVAILED"] . '</td>
            <td>' . (int)$row["E_LEAVE_AVAILED"] . '</td>
            <td>' . (int)$row["LEAVE_WITHOUT_PAY"] . '</td>
        </tr>';
    }
} else {
    $output .= '
        <tr>
        <td colspan="5" align="center">No Data Found</td>
        </tr>
        ';
}

echo $output;
mysqli_close($conn);