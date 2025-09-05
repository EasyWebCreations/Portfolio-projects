<?php
include "connectDB.php";
include "get_month.php";

if ($_POST["site"] != '') {
    $site = $_POST["site"];
    $month = $_POST["month"];
    $query = "SELECT emp_details.ESIC_NO, EMP_NAME, leaves.WORKING_DAYS, NET_SAL 
        FROM emp_details INNER JOIN salary INNER JOIN leaves 
        WHERE emp_details.EMP_ID = salary.EMP_ID 
        AND salary.MONTH = leaves.MONTH 
        AND salary.SITE_ID = leaves.SITE_ID
        AND salary.MONTH = '$month'
        AND salary.SITE_ID = '$site'";
} else {
    $query = "SELECT emp_details.ESIC_NO, EMP_NAME, leaves.WORKING_DAYS, NET_SAL 
        FROM emp_details INNER JOIN salary INNER JOIN leaves
        WHERE emp_details.EMP_ID = salary.EMP_ID
        AND salary.MONTH = leaves.MONTH 
        AND salary.SITE_ID = leaves.SITE_ID LIMIT 25";
}
$output = '';
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $num = 1;

    while ($row = $result->fetch_assoc()) {

        $output .= '
<tr class="table-light">
    <td>' . $row["ESIC_NO"] . '</td>
    <td>' . $row["EMP_NAME"] . '</td>
    <td>' . $row["WORKING_DAYS"] . '</td>
    <td>' . (int)$row["NET_SAL"] . '</td>
    <td>' . 0 . '</td>
    <td>' . 0 . '</td>
</tr>
';
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