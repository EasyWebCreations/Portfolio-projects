<?php
session_start();
include_once("../../backend/connect.php");
// $sql = "";
// if ($_POST['ILikedDisliked'] == '0') {
$sql = "SELECT liked_by FROM likes WHERE liked_to={$_SESSION['unique_id']}";
// $sql = "SELECT * FROM per_details INNER JOIN likes ON per_details.id = likes.liked_to WHERE likes.liked_by={$_SESSION['unique_id']}";
// } else {
// $sql = "SELECT disliked_to FROM dislikes WHERE disliked_by={$_SESSION['unique_id']}";
// $sql = "SELECT * FROM per_details INNER JOIN dislikes ON per_details.id = dislikes.disliked_to WHERE dislikes.disliked_by={$_SESSION['unique_id']}";
// }
$query = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($query) > 0) {
  include_once "likesToMeData.php";
  if ($output == '') {
    $output .= 'No User Liked Your Profile Yet!';
  }
} else {
  $output .= 'No User Liked Your Profile Yet!';
}
echo $output;
