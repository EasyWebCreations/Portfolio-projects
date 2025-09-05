<?php
include"connectDB.php";

$sal_desigation = $_POST['sal_designation'];
$sql = "DELETE FROM `sal_profile` WHERE DESIGNATION='$sal_desigation'";

if (mysqli_query($conn,$sql)) {
    echo json_encode(array("statusCode"=>200));
}
else {
    echo json_encode(array("statusCode"=>201));
}

?>