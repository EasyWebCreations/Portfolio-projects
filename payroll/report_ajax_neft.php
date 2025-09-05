<?php
include "connectDB.php";
include "get_month.php";

if ($_POST["site"] != '') {
    $site = $_POST["site"];
    $month = $_POST["month"];
    $query = "SELECT emp_details.EMP_ID, EMP_MOBILE,EMP_NAME, BNK_NAME, PAY_DAYS, BANK_AC_NO, 
        IFSC_CODE, BNK_ADDRESS, NET_SAL FROM 
        emp_details INNER JOIN salary   
        WHERE emp_details.EMP_ID = salary.EMP_ID
        AND salary.MONTH = '$month'
        AND salary.SITE_ID = '$site'";
} else {
    $query = "SELECT emp_details.EMP_ID, EMP_MOBILE, EMP_NAME, BNK_NAME, PAY_DAYS, BANK_AC_NO, 
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
           <td>' . (int)$row["NET_SAL"] * 100  . '</td> 
           <td>' . 'Techno Energy Engineering Pvt Ltd'  . '</td> 
           <td>' . '60116658917' . '</td>
           <td>' . $row["BANK_AC_NO"] . '</td>
           <td>' . $row["BNK_NAME"] . '</td>
           <td>' . $row["BNK_ADDRESS"] . '</td>
           <td>' . '1' . '</td>
           <td>' . $row["EMP_MOBILE"] . '</td>
           <td>' . 'Details as per payment' . '</td>
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