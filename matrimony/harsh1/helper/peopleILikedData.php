<?php
// session_start();
// $result = mysqli_query($conn, "SELECT id, gender FROM per_details WHERE id = {$_SESSION['unique_id']}");
// $row = mysqli_fetch_assoc($result);
include_once "../../backend/connect.php";
if ($_POST['ILikedDisliked'] == '0') {

  // $sql1 = "SELECT id, fname, lname, profile_img, occupation, height, age FROM per_details WHERE id={$row2['liked_to']}";
  // $querycard = mysqli_query($conn, $sql1);
  // $row1 = mysqli_fetch_assoc($querycard);

  // $query2 = "SELECT * from likes where liked_by={$_SESSION['unique_id']} and liked_to={$row1['id']}";
  // $likeResult = mysqli_query($conn, $query2);
  // if (mysqli_num_rows($likeResult) > 0) {
  $likeBackColor = '0.9';
  // } else {
  //   $likeBackColor = 'rgba(0, 0, 0, 0.3)';
  // }

  // $query3 = "SELECT * from dislikes where disliked_by={$_SESSION['unique_id']} and disliked_to={$row1['disliked_to']}";
  // $dislikeResult = mysqli_query($conn, $query3);
  // if (mysqli_num_rows($dislikeResult) > 0) {
  //   $dislikeBackColor = 'rgba(0, 0, 0, 0.9)';
  // } else {
  $dislikeBackColor = '0.3';
  // }
  // //}

  // $queryreport = "SELECT * from report where reported_by={$_SESSION['unique_id']} and reported_to={$row1['reported_to']}";
  // $reportResult = mysqli_query($conn, $queryreport);
  // if (mysqli_num_rows($reportResult) > 0) {
  //   $reportBackColor = 'rgba(0, 0, 0, 0.9)';
  // } else {
  $reportBackColor = '0.3';
  // }


  // while ($row1 = mysqli_fetch_assoc($query)) {
  foreach ($likedResult as $row1) {

    $output .= '<div class="card">
    <div class="cardText1">
      <p class="cardText1Text">' . $row1['fname'] . ' ' . $row1['lname'] . '</p>
    </div>
    <img class="cardImg" src="' . $row1['profile_img'] . '" title="FirstName LastName">
    <div class="cardTextOut">
      <p class="cardText cardText2">
        <span class="cardLightText">Occupation</span>: ' . $row1['occupation'] . '
      </p>
      <p class="cardText cardText3">
        <span class="cardLightText">Height(in cm)</span>: ' . $row1['height'] . '
      </p>
      <p class="cardText cardText4">
        <span class="cardLightText">Age</span>: ' . $row1['age'] . '
      </p>
      <p class="cardText cardText5">
        <span class="cardLightText">ID</span>: ' . $row1['id'] . '
      </p>
      <form class="cardMoreOut" method="post" target="frame">
        <div class="viewYourProfileForm">
        <a href="yourProfile.php?passYourID=' . $row1['id'] . '" class="cardMore1" name="cardMore1">
          Full Profile
        </a>
        </div>
        <input name="liked_by" value="' . $_SESSION['unique_id'] . '" style="display:none"></input>
        <input name="liked_to" value="' . $row1['id'] . '" style="display:none"></input>
        <button name="cardMore2" class="cardMore2 cardMore" title="Like" onclick="cardMoreFunc(this)" style="opacity:  ' . $likeBackColor . ';"></button>
        <button name="cardMore3" class="cardMore3 cardMore" title="Dislike" onclick="cardMoreFunc(this)" style="opacity: ' . $dislikeBackColor . ';"></button>
        <button name="cardMore4" class="cardMore4 cardMore" title="Report" onclick="cardMoreFunc(this)" style="opacity: ' . $reportBackColor . ';"></button>
      </form>
    </div>
  </div>';
  }
} else {
  // $sql1 = "SELECT id, fname, lname, profile_img, occupation, height, age FROM per_details WHERE id={$row2['disliked_to']}";
  // $querycard = mysqli_query($conn, $sql1);
  // $row1 = mysqli_fetch_assoc($querycard);

  // $query2 = "SELECT * from likes where liked_by={$_SESSION['unique_id']} and liked_to={$row1['id']}";
  // $likeResult = mysqli_query($conn, $query2);
  // if (mysqli_num_rows($likeResult) > 0) {
  // $likeBackColor = 'rgba(0, 0, 0, 0.9)';
  // } else {
  $likeBackColor = '0.3';
  // }

  // $query3 = "SELECT * from dislikes where disliked_by={$_SESSION['unique_id']} and disliked_to={$row1['disliked_to']}";
  // $dislikeResult = mysqli_query($conn, $query3);
  // if (mysqli_num_rows($dislikeResult) > 0) {
  $dislikeBackColor = '0.9';
  // } else {
  //   $dislikeBackColor = 'rgba(0, 0, 0, 0.3)';
  // }
  // //}

  // while ($row1 = mysqli_fetch_assoc($query)) {
  foreach ($dislikedResult as $row1) {

    $queryreport = "SELECT * from report where reported_by={$_SESSION['unique_id']} and reported_to={$row1['id']}";
    $reportResult = mysqli_query($conn, $queryreport);
    if (mysqli_num_rows($reportResult) > 0) {
      $reportBackColor = '0.9';
    } else {
      $reportBackColor = '0.3';
    }





    $output .= '<div class="card">
    <div class="cardText1">
      <p class="cardText1Text">' . $row1['fname'] . ' ' . $row1['lname'] . '</p>
    </div>
    <img class="cardImg" src="' . $row1['profile_img'] . '" title="FirstName LastName">
    <div class="cardTextOut">
      <p class="cardText cardText2">
        <span class="cardLightText">Occupation</span>: ' . $row1['occupation'] . '
      </p>
      <p class="cardText cardText3">
        <span class="cardLightText">Height(in cm)</span>: ' . $row1['height'] . '
      </p>
      <p class="cardText cardText4">
        <span class="cardLightText">Age</span>: ' . $row1['age'] . '
      </p>
      <p class="cardText cardText5">
        <span class="cardLightText">ID</span>: ' . $row1['id'] . '
      </p>
      <form class="cardMoreOut" method="post" target="frame">
        <div class="viewYourProfileForm">
        <a href="yourProfile.php?passYourID=' . $row1['id'] . '" class="cardMore1" name="cardMore1">
          Full Profile
        </a>
        </div>
        <input name="liked_by" value="' . $_SESSION['unique_id'] . '" style="display:none"></input>
        <input name="liked_to" value="' . $row1['id'] . '" style="display:none"></input>
        <button name="cardMore2" class="cardMore2 cardMore" title="Like" onclick="cardMoreFunc(this)" style="opacity:  ' . $likeBackColor . ';"></button>
        <button name="cardMore3" class="cardMore3 cardMore" title="Dislike" onclick="cardMoreFunc(this)" style="opacity: ' . $dislikeBackColor . ';"></button>
        <button name="cardMore4" class="cardMore4 cardMore" title="Report" onclick="cardMoreFunc(this)" style="opacity: ' . $reportBackColor . ';"></button>
      </form>
    </div>
  </div>';
  }
}
