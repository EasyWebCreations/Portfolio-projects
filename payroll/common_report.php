<?php
include "connectDB.php";
include "get_month.php";

if ($_POST["site"] != '') {
    $site = $_POST["site"];
    $month = $_POST["month"];
    $query = "SELECT emp_details.EMP_ID, EMP_NAME, BNK_NAME, PAY_DAYS, 
    BANK_AC_NO, IFSC_CODE, BNK_ADDRESS, NET_SAL FROM emp_details INNER JOIN salary   
    WHERE emp_details.EMP_ID = salary.EMP_ID
    AND salary.MONTH = '$month'
    AND salary.SITE_ID = '$site' ";
} else {
    $month = get_current_month();
    $query = "SELECT emp_details.EMP_ID, EMP_NAME, BNK_NAME, PAY_DAYS, 
    BANK_AC_NO, IFSC_CODE, BNK_ADDRESS, NET_SAL FROM emp_details INNER JOIN salary   
    WHERE emp_details.EMP_ID = salary.EMP_ID
    AND salary.MONTH = '$month'";
}
$output = '';
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $num = 1;

    while ($row = $result->fetch_assoc()) {
        $output .= '<tr  class="table-light">
                        <td>'.$row["EMP_ID"].'</td> 
                        <td>'.$row["EMP_NAME"].'</td>
                        <td>'.$row["BNK_NAME"].'</td>
                        <td>'.$row["PAY_DAYS"].'</td>
                        <td>'.$row["BANK_AC_NO"].'</td>
                        <td>'.$row["IFSC_CODE"].'</td>
                        <td>'.$row["BNK_ADDRESS"].'</td>
                        <td>'.$row["NET_SAL"].'</td>
                        <td>'.$row["NET_SAL"].'</td>
                    </tr>';
    }
} 
else {
    $output .= '
 <tr>
  <td colspan="5" align="center">No Data Found</td>
 </tr>
 ';
}

echo $output;
mysqli_close($conn);

?>