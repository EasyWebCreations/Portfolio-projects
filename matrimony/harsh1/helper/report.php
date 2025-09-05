<?php
include_once("../../backend/connect.php");
// $query = "SELECT * from report where reported_by={$_POST['liked_by']} and reported_to={$_POST['liked_to']}";
// $reportResult = mysqli_query($conn, $query);

// if (mysqli_num_rows($reportResult) > 0) {
//   mysqli_query($conn, "DELETE FROM report WHERE reported_by={$_POST['liked_by']} and reported_to={$_POST['liked_to']}");
//   echo "report deleted";
// } else {
$query = "SELECT * from likes where liked_by={$_POST['liked_by']} and liked_to={$_POST['liked_to']}";
$likeResult = mysqli_query($conn, $query);

if (mysqli_num_rows($likeResult) > 0) {
  mysqli_query($conn, "DELETE FROM likes WHERE liked_by={$_POST['liked_by']} and liked_to={$_POST['liked_to']}");
  echo "like deleted";
}
$query = "INSERT INTO report (reported_by, reported_to, report_reason, report_decision) VALUES(?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssss", $_POST['liked_by'], $_POST['liked_to'], $_POST['report_reason'], $_POST['report_decision']);
$stmt->execute();
echo "report done";
// }
