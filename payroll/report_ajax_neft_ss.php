<?php
include "connectDB.php";
include "get_month.php";

if ($_POST["site"] != '') {
    $site = $_POST["site"];
    $month = $_POST["month"];
    $query = "SELECT emp_details.EMP_ID, EMP_NAME, BNK_NAME, PAY_DAYS, BANK_AC_NO, 
        IFSC_CODE, BNK_ADDRESS, NET_SAL FROM 
        emp_details INNER JOIN salary   
        WHERE emp_details.EMP_ID = salary.EMP_ID
        AND salary.MONTH = '$month'
        AND salary.SITE_ID = '$site'";
} else {
    $query = "SELECT emp_details.EMP_ID, EMP_NAME, BNK_NAME, PAY_DAYS, BANK_AC_NO, 
        IFSC_CODE, BNK_ADDRESS, NET_SAL FROM 
        emp_details INNER JOIN salary   
        WHERE emp_details.EMP_ID = salary.EMP_ID LIMIT 25";
}
$output = '';
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $num = 1;

    while ($row = $result->fetch_assoc()) {

        $output .= '
        <tr  class="table-light">
           <td>' . (int)$row["NET_SAL"] . '</td> 
           <td>0515102000015987</td> 
           <td>' . $row["IFSC_CODE"] . '</td>
           <td>' . $row["BANK_AC_NO"] . '</td>
           <td>10</td> 
           <td>' . $row["EMP_NAME"] . '</td>
           <td>' . $row["BNK_ADDRESS"] . '</td>
           <td>PAYMENT</td>
           <td>' . $row["BNK_NAME"] . '</td>
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