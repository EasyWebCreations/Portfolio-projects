<?php
session_start();
include_once("../../backend/connect.php");
$output = '';
$likedResult = '';
$dislikedResult = '';
$pathForCache = '';
$pathForLikedCache = '../../';
$likedCache = $pathForLikedCache . "cache/liked.cache.json";
$dislikedCache = $pathForLikedCache . "cache/disliked.cache.json";

if ($_POST['ILikedDisliked'] == '0') {
  if (file_exists($likedCache) && filemtime($likedCache) > time() - 60) {
    // echo "Liked cache found<br>";
    $likedResult = json_decode(file_get_contents($likedCache), true);
  } else {
    // echo "Liked cache not found<br>";
    $likedSQL = "SELECT per_details.id, per_details.fname, per_details.lname, per_details.profile_img, per_details.occupation, per_details.height, per_details.age FROM per_details INNER JOIN likes ON per_details.id=likes.liked_to WHERE likes.liked_by={$_SESSION['unique_id']}";
    $likedQuery = mysqli_query($conn, $likedSQL);
    $likedResult = mysqli_fetch_all($likedQuery, MYSQLI_ASSOC);

    $handler = fopen($likedCache, 'w');
    fwrite($handler, json_encode($likedResult));
    fclose($handler);
  }
  if (count($likedResult) > 0) {
    include_once "peopleILikedData.php";
  } else {
    $output .= 'You Have Not Liked Any User Yet!';
  }
  echo $output;
} else {
  // $dislkeSQL = "SELECT per_details.id, per_details.fname, per_details.lname, per_details.profile_img, per_details.occupation, per_details.height, per_details.age FROM per_details INNER JOIN dislikes ON per_details.id=dislikes.disliked_to WHERE dislikes.disliked_by={$_SESSION['unique_id']}";

  if (file_exists($dislikedCache) && filemtime($dislikedCache) > time() - 60) {
    // echo "Disiked cache found<br>";
    $dislikedResult = json_decode(file_get_contents($dislikedCache), true);
  } else {
    // echo "Disiked cache not found<br>";
    $dislkeSQL = "SELECT per_details.id, per_details.fname, per_details.lname, per_details.profile_img, per_details.occupation, per_details.height, per_details.age FROM per_details INNER JOIN dislikes ON per_details.id=dislikes.disliked_to WHERE dislikes.disliked_by={$_SESSION['unique_id']}";
    $dislikedQuery = mysqli_query($conn, $dislkeSQL);
    $dislikedResult = mysqli_fetch_all($dislikedQuery, MYSQLI_ASSOC);

    $handler = fopen($dislikedCache, 'w');
    fwrite($handler, json_encode($dislikedResult));
    fclose($handler);
  }
  if (count($dislikedResult) > 0) {
    // echo 'Inside disliked';
    include_once "peopleILikedData.php";
  } else {
    $output .= 'You Have Not Disiked Any User Yet!';
  }
  echo $output;
}

// $output = "";
// if (mysqli_num_rows($query) > 0) {
//   include_once "peopleILikedData.php";
// } else {
//   $output .= 'No user found related to your search :(';
// }
// echo $output;
