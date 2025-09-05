<?php
include_once('../../../backend/connect.php');
if (strlen($_POST['userIDToDelete']) == 5) {
  $deleteUserQuery = mysqli_query($conn, "DELETE FROM per_details WHERE id={$_POST['userIDToDelete']}");

  mysqli_query($conn, "DELETE FROM block_user WHERE blocked_by={$_POST['userIDToDelete']} OR blocked_to={$_POST['userIDToDelete']}");
  mysqli_query($conn, "DELETE FROM chat WHERE sender={$_POST['userIDToDelete']} OR receiver={$_POST['userIDToDelete']}");
  mysqli_query($conn, "DELETE FROM dislikes WHERE disliked_by={$_POST['userIDToDelete']} OR disliked_to={$_POST['userIDToDelete']}");
  mysqli_query($conn, "DELETE FROM friends WHERE user_one={$_POST['userIDToDelete']} OR user_two={$_POST['userIDToDelete']}");
  mysqli_query($conn, "DELETE FROM likes WHERE liked_by={$_POST['userIDToDelete']} OR liked_to={$_POST['userIDToDelete']}");
  mysqli_query($conn, "DELETE FROM reports WHERE reported_by={$_POST['userIDToDelete']} OR reported_to={$_POST['userIDToDelete']}");
  mysqli_query($conn, "DELETE FROM request WHERE sender={$_POST['userIDToDelete']} OR receiver={$_POST['userIDToDelete']}");
  mysqli_query($conn, "DELETE FROM views WHERE viewed_by={$_POST['userIDToDelete']} OR viewed_to={$_POST['userIDToDelete']}");
  echo true;
} else {
  $userDelList = json_decode($_POST['userIDToDelete'], true);
  $deleteUserQuery = '';
  foreach ($userDelList as $userID) {
    $deleteUserQuery = mysqli_query($conn, "DELETE FROM per_details WHERE id={$userID}");

    mysqli_query($conn, "DELETE FROM block_user WHERE blocked_by={$userID} OR blocked_to={$userID}");
    mysqli_query($conn, "DELETE FROM chat WHERE sender={$userID} OR receiver={$userID}");
    mysqli_query($conn, "DELETE FROM dislikes WHERE disliked_by={$userID} OR disliked_to={$userID}");
    mysqli_query($conn, "DELETE FROM friends WHERE user_one={$userID} OR user_two={$userID}");
    mysqli_query($conn, "DELETE FROM likes WHERE liked_by={$userID} OR liked_to={$userID}");
    mysqli_query($conn, "DELETE FROM reports WHERE reported_by={$userID} OR reported_to={$userID}");
    mysqli_query($conn, "DELETE FROM request WHERE sender={$userID} OR receiver={$userID}");
    mysqli_query($conn, "DELETE FROM views WHERE viewed_by={$userID} OR viewed_to={$userID}");
  }
  echo true;
}
