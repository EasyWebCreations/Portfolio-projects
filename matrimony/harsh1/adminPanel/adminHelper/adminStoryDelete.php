<?php
include_once('../../../backend/connect.php');
if (strlen($_POST['storyIDToDelete']) == 5) {
  $deleteStoryQuery = mysqli_query($conn, "DELETE FROM our_stories WHERE story_id={$_POST['storyIDToDelete']}");
  echo true;
} else {
  $storyDelList = json_decode($_POST['storyIDToDelete'], true);
  $deleteStoryQuery = '';
  foreach ($storyDelList as $storyID) {
    $deleteStoryQuery = mysqli_query($conn, "DELETE FROM our_stories WHERE story_id={$storyID}");
  }
  echo true;
}
