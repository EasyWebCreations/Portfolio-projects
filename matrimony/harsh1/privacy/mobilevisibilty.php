<?php

session_start();

include_once "conn.php";

$user = $_SESSION['unique_id'];
$priCondition = mysqli_real_escape_string($conn, $_POST['mobilepri']);
/*
$sql = "SELECT * FROM per_details WHERE (id = {$user})";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$MobilePrivacy = $row['mobile_visibility'];
if($MobilePrivacy !=""){
    echo $MobilePrivacy;
}else{
    echo "empty";
}
*/
$sql1 = "UPDATE per_details SET `mobile_visibility`='{$priCondition}' WHERE (id = {$user})";
$query = mysqli_query($conn, $sql1);
if($query){
    echo 'Changed privacy condition successfully!';
    header("refresh:1;url= ../settings.php");
}else{
    echo"ERROR!";
}
/*
if($MobilePrivacy != ""){
    $sql1 = "UPDATE per_details SET `mobile_visibility`='{$priCondition}' WHERE (id = {$user})";
    if($sql1){
        echo `<script>
        alert("Changed privacy condition successfully!");
      </script>`;
    }else{
        echo `<script>
  alert("Problem to update condition! Please try again later!");
</script>`;
    }
}else{
    $sql1 = "INSERT INTO per_details (mobile_visibility) VALUE '{$priCondition}' WHERE (id = {$user})";
    if($sql1){
        echo `<script>
        alert("Changed privacy condition successfully!");
      </script>`;
    }else{
        echo `<script>
  alert("Problem to change condition! Please try again later!");
</script>`;
    }
}
echo '<script>
alert("Problem to change condition! Please try again later!")
</script>';*/
?>