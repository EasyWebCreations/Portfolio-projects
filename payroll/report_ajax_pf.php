<?php
include "connectDB.php";
include "get_month.php";

if ($_POST["site"] != '' && $_POST["month"]) {
    $site = $_POST["site"];
    $month = $_POST["month"];
    $query = "SELECT salary.MONTH,emp_details.UAN_NO, emp_details.EMP_NAME, salary.GROSS_SAL, salary.BASIC_SAL
        FROM emp_details INNER JOIN salary   
        WHERE emp_details.EMP_ID = salary.EMP_ID
        AND salary.MONTH = '$month'
        AND salary.SITE_ID = '$site'";
} else {
    $query = "SELECT salary.MONTH,emp_details.UAN_NO, emp_details.EMP_NAME, salary.GROSS_SAL, salary.BASIC_SAL
    FROM emp_details INNER JOIN salary   
    WHERE emp_details.EMP_ID = salary.EMP_ID LIMIT 25";
}
$output = '';
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $num = 1;
    $sum_basic_as_per_15 = 0;
    $sum_gross = 0;
    while ($row = $result->fetch_assoc()) {
        $basic_as_per_15K = $row["BASIC_SAL"];
        $sum_basic_as_per_15 += $basic_as_per_15K;
        $sum_gross += $row["GROSS_SAL"];
        $sum_month = date('M-y', strtotime($row["MONTH"]));
        $output .= '
        <tr  class="table-light">
           <td>' . date('M-y', strtotime($row["MONTH"])) . '</td> 
           <td>' . $row["UAN_NO"] . '</td>
           <td>' . $row["EMP_NAME"] . '</td>
           <td>' . (int)$row["GROSS_SAL"] . '</td>
           <td>' . (int)$basic_as_per_15K . '</td>
           <td>' . (int)($basic_as_per_15K * (0.12)) . '</td>
           <td>' . (int)($basic_as_per_15K * (0.0833)) . '</td>
           <td>' . (int)($basic_as_per_15K * (0.0367)) . '</td>
           <td>0</td>
           <td>0</td>
        </tr>';
    }
    $output .= '<tr  class="table-light">
    <td> </td> 
    <td>Total</td>
    <td>' . $sum_month . '</td>
    <td>' . (int)$sum_gross . '</td>
    <td>' . (int)$sum_basic_as_per_15 . '</td>
    <td>' . (int)($sum_basic_as_per_15 * (0.12)) . '</td>
    <td>' . (int)($sum_basic_as_per_15 * (0.0833)) . '</td>
    <td>' . (int)($sum_basic_as_per_15 * (0.0367)) . '</td>
    <td>0</td>
    <td>0</td>
 </tr>';
} else {
    $output .= '
        <tr>
        <td colspan="5" align="center">No Data Found</td>
        </tr>
        ';
}

echo $output;
mysqli_close($conn);