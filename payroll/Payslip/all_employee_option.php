<?php
include'../connectDB.php';
$sql = "SELECT DISTINCT EMP_ID, EMP_NAME FROM emp_details";
$res = mysqli_query($conn,$sql);
$options='';
while ($row = $res->fetch_assoc()) {
    $options.='<option value="'.$row["EMP_ID"].'">'.$row["EMP_NAME"].'</option>';
}

$options = ($options==='') ? 'No Employees' : $options ;
echo $options;