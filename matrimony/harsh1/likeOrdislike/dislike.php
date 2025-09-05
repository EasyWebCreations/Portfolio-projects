<?php
    session_start();
    include_once "conn.php";
    $dislikedBy = $_SESSION['unique_id'];
    $likeQuery = "SELECT * FROM dislikes WHERE disliked_by= {$dislikedBy}";
   
    $query = mysqli_query($conn, $likeQuery);
$output = "";
if (mysqli_num_rows($query) > 0) {
  include_once "dislikeData.php";
} else {
  $output .= 'No user liked your profile yet:(';
}
echo $output;
?>