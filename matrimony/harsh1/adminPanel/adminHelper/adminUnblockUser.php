<?php
include_once('../../../backend/connect.php');
// $approved = "Approved";
$confirmBlockTo = mysqli_real_escape_string($conn, $_POST['confirmBlockTo']);
$confirmBlockTo = explode(" ", $confirmBlockTo);
$queryConfirmBlock = "DELETE FROM report WHERE reported_by={$confirmBlockTo[0]} AND reported_to={$confirmBlockTo[1]}";
// $stmtConfirmBlock = $conn->prepare($queryConfirmBlock);
// $stmtConfirmBlock->bind_param("s", $approved);
// $blockApproved = $stmtConfirmBlock->execute();
$blockApproved = mysqli_query($conn, $queryConfirmBlock);
if ($blockApproved) {
  echo 'User Unlocked Successfully!';
} else {
  echo 'Error unblocking User: ' . mysqli_error($conn);
}
