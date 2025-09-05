z<?php
  include_once('backend/connect.php');
  // $result = mysqli_query($conn, "SELECT * FROM per_details WHERE id = {$_SESSION['unique_id']}");
  $result = mysqli_query($conn, "SELECT * FROM per_details WHERE id = '00001'");
  $row = mysqli_fetch_assoc($result);
  // echo count(array_keys($row, null));

  $nullVals = count(array_filter($row, function ($n) {
    return $n === null;
  }));

  $emptyVals = count(array_filter($row, function ($n) {
    return $n === "";
  }));

  // $zeroVals = count(array_filter($row, function ($n) {
  //   return $n === 0;
  // }));
  // echo $zeroVals;
  // echo $row['profile_img'];
  // https://testing-aws-php.s3.ap-south-1.amazonaws.com/logoimages/profileImg.png
  $extraNulLYN = 0;
  if ($row['mobile_visibility'] === null or $row['mobile_visibility'] === "") {
    $extraNulLYN = 1;
  }
  echo "Null: " . $nullVals;
  echo "Empty: " . $emptyVals;
  // echo "Zero: " . $zeroVals;
  echo "ADD: " . $nullVals + $emptyVals + ($row['profile_img'] === "https://testing-aws-php.s3.ap-south-1.amazonaws.com/logoimages/profileImg.png") - $extraNulLYN;
  echo "TOTAL: " . count($row) - 1;
  // echo "Profile: " . ($row['profile_img'] === "https://testing-aws-php.s3.ap-south-1.amazonaws.com/logoimages/profileImg.png");
  echo "Percent: " . 100 - ((($nullVals + $emptyVals + ($row['profile_img'] === "https://testing-aws-php.s3.ap-south-1.amazonaws.com/logoimages/profileImg.png") - $extraNulLYN) * 100) / (count($row) - 1));

  $add1 = $nullVals + $emptyVals + ($row['profile_img'] === "https://testing-aws-php.s3.ap-south-1.amazonaws.com/logoimages/profileImg.png") - $extraNulLYN;
  $total1 = count($row) - 1;

  echo "Percent: " . 100 - ($add1 * 100 / $total1);




// $nullVals = count(array_filter($row, function ($n) {
//   return $n === null;
// }));

// $emptyVals = count(array_filter($row, function ($n) {
//   return $n === "";
// }));

// $extraNulLYN = 0;
// if ($row['mobile_visibility'] === null or $row['mobile_visibility'] === "") {
//   $extraNulLYN = 1;
// }
// $nullCol = $nullVals + $emptyVals + ($row['profile_img'] === "https://testing-aws-php.s3.ap-south-1.amazonaws.com/logoimages/profileImg.png") - $extraNulLYN;
// $totalCol = count($row) - 1;























// include_once("test1.php");
// $i = 1;
// for ($i = 0; $i < 5; $i++) {
//   echo '<button onclick="func1(' . $i . ')">Submit</button>';
// }
// if (isset($_POST['ajax'])) {
// echo $_POST['data1'];
// }
// echo "Success";
// echo 'response = ' . $_POST['data'];
// echo 'response = ' . $_POST['data1'];
// echo 'response = ' . $_POST['data2'];
