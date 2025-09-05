<?php
// if (isset($_SESSION['mobile'])) {
include_once('../../../backend/connect.php');

// $mobileno = $_SESSION['mobile'];
$time = time();
$story_id = substr(strval(rand($time, 10000)), 0, 5);
$var_name = mysqli_real_escape_string($conn, $_POST['var_name']);
$vadhu_name = mysqli_real_escape_string($conn, $_POST['vadhu_name']);
$var_id = mysqli_real_escape_string($conn, $_POST['var_id']);
$vadhu_id = mysqli_real_escape_string($conn, $_POST['vadhu_id']);
$couple_img = mysqli_real_escape_string($conn, $_POST['couple_img']);
$story_details = mysqli_real_escape_string($conn, $_POST['story_details']);

// echo $story_id . ' ' . $var_name . ' ' . $vadhu_name . ' ' . $var_id . ' ' . $vadhu_id . ' ' . $couple_img . ' ' . $story_details;

if ($var_name != null && $var_name != '' && $vadhu_name != null && $vadhu_name != '' && $var_id != null && $var_id != '' && $vadhu_id != null && $vadhu_id != '' && $couple_img != null && $couple_img != '' && $story_details != null && $story_details != '') {

  //     $sql = mysqli_query($conn, "UPDATE `per_details` SET `mobile`='{$mobileno}', `email`='{$email}',`fname`='{$fname}',`mname`='{$mname}',`lname`='{$lname}',`gender`='{$gender}',`martial_status`='{$marital}',`callno`='{$call}' WHERE `id` = '$user_id'") ;

  $insert_query = mysqli_query($conn, "INSERT INTO our_stories (story_id,var_name,vadhu_name,couple_img,story_details,var_id,vadhu_id) VALUES ('{$story_id}','{$var_name}','{$vadhu_name}','{$couple_img}','{$story_details}','{$var_id}','{$vadhu_id}')");
  if ($insert_query) {
    echo "Story Details Updated Successful!";
  } else {
    echo "Error Updating Story Details: " . mysqli_error($conn);
  }
} else {
  echo "Error Updating Story Details, Please Enter All Details!";
}
