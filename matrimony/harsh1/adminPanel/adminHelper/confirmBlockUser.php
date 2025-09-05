<?php
include_once('../../../backend/connect.php');
$approved = "Approved";
$confirmBlockTo = mysqli_real_escape_string($conn, $_POST['confirmBlockTo']);
$confirmBlockTo = explode(" ", $confirmBlockTo);
$queryConfirmBlock = "UPDATE report SET report_decision='{$approved}', report_time=now() WHERE reported_by={$confirmBlockTo[0]} AND reported_to={$confirmBlockTo[1]}";
// $stmtConfirmBlock = $conn->prepare($queryConfirmBlock);
// $stmtConfirmBlock->bind_param("s", $approved);
// $blockApproved = $stmtConfirmBlock->execute();
$blockApproved = mysqli_query($conn, $queryConfirmBlock);
if ($blockApproved) {
  echo 'User Blocked Successfully!';
} else {
  echo 'Error Blocking User: ' . mysqli_error($conn);
}
