<?php
// if (isset($_SESSION['mobile'])) {
include_once('../../../backend/connect.php');
// $mobileno = $_SESSION['mobile'];
$time = time();
$event_id = substr(strval(rand($time, 10000)), 0, 5);
$event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
$event_details = mysqli_real_escape_string($conn, $_POST['event_details']);
$event_date = mysqli_real_escape_string($conn, $_POST['event_date']);
$event_time = mysqli_real_escape_string($conn, $_POST['event_time']);


if ($event_id != null && $event_id != '' && $event_name != null && $event_name != '' && $event_details != null && $event_details != '' && $event_date != null && $event_date != '' && $event_time != null && $event_time != '') {

  // echo $ran_id . ' ' . $fname . ' ' . $mname . ' ' . $lname . ' ' . $call . ' ' . $mobileno . ' ' . $email . ' ' . $gender . ' ' . $marital;

  //     $sql = mysqli_query($conn, "UPDATE `per_details` SET `mobile`='{$mobileno}', `email`='{$email}',`fname`='{$fname}',`mname`='{$mname}',`lname`='{$lname}',`gender`='{$gender}',`martial_status`='{$marital}',`callno`='{$call}' WHERE `id` = '$user_id'") ;

  $insert_query = mysqli_query($conn, "INSERT INTO events (event_id,event_name,event_details,event_date,event_time)
                        VALUES ('{$event_id}','{$event_name}','{$event_details}','{$event_date}','{$event_time}')");

  if ($insert_query) {
    echo "Event Details Updated Successful!";
  } else {
    echo "Error Updating Event Details: " . mysqli_error($conn);
  }
} else {
  echo "Error Updating Event Details, Please Enter All Details!";
}
