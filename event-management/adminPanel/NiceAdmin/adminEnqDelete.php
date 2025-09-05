<?php
include_once('../../connect.php');
if (strlen($_POST['enqIDToDelete']) == 5) {
  $deleteEventsQuery = mysqli_query($conn, "DELETE FROM enquiry WHERE enq_id={$_POST['enqIDToDelete']}");
  echo true;
} else {
  $eventsDelList = json_decode($_POST['enqIDToDelete'], true);
  $deleteEventsQuery = '';
  foreach ($eventsDelList as $eventID) {
    $deleteEventsQuery = mysqli_query($conn, "DELETE FROM enquiry WHERE enq_id={$eventID}");
  }
  echo true;
}
