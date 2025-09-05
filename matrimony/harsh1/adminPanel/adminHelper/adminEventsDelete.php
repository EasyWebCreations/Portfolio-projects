<?php
include_once('../../../backend/connect.php');
if (strlen($_POST['eventIDToDelete']) == 5) {
  $deleteEventsQuery = mysqli_query($conn, "DELETE FROM events WHERE event_id={$_POST['eventIDToDelete']}");
  echo true;
} else {
  $eventsDelList = json_decode($_POST['eventIDToDelete'], true);
  $deleteEventsQuery = '';
  foreach ($eventsDelList as $eventID) {
    $deleteEventsQuery = mysqli_query($conn, "DELETE FROM events WHERE event_id={$eventID}");
  }
  echo true;
}
