<?php
    session_start();
    include_once "conn.php";
    $likedBy = $_SESSION['unique_id'];
    $likeQuery = "SELECT * FROM likes WHERE liked_by= {$likedBy}";
   
    $query = mysqli_query($conn, $likeQuery);
$output = "";
if (mysqli_num_rows($query) > 0) {
  include_once "likeData.php";
} else {
  $output .= 'No user liked your profile yet:(';
}
echo $output;
?>