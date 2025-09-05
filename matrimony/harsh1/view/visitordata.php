<?php

while ($row = mysqli_fetch_assoc($query)) {


  include_once "conn.php";
  $query2 = "SELECT * from likes where liked_by={$viewedTo} and liked_to={$row['viewed_by']}";
  $likeResult = mysqli_query($conn, $query2);
  if (mysqli_num_rows($likeResult) > 0) {
    $likeBackColor = '0.9';
  } else {
    $likeBackColor = '0.3';
  }
  $query3 = "SELECT * from dislikes where disliked_by={$viewedTo} and disliked_to={$row['viewed_by']}";
  $dislikeResult = mysqli_query($conn, $query3);
  if (mysqli_num_rows($dislikeResult) > 0) {
    $dislikeBackColor = '0.9';
  } else {
    $dislikeBackColor = '0.3';
  }
  $queryreport = "SELECT * from report where reported_by={$viewedTo} and reported_to={$row['viewed_by']}";
  $reportResult = mysqli_query($conn, $queryreport);
  if (mysqli_num_rows($reportResult) > 0) {
    $reportBackColor = '0.9';
  } else {
    $reportBackColor = '0.3';
  }

  $viewedBy = $row['viewed_by'];
  //echo "viewed by: ".$viewedBy;
  $query4 = "SELECT * FROM per_details WHERE (id = {$viewedBy})";
  $viewResult = mysqli_query($conn, $query4);
  if(mysqli_num_rows($viewResult)){
  $row4 = mysqli_fetch_assoc($viewResult);
  if($row4['id'] != ""){
    $output .= '<div class="card">
          <div class="cardText1">
            <p class="cardText1Text">' . $row4['fname'] . ' ' . $row4['lname'] . '</p>
          </div>
          <img class="cardImg" src="' . $row4['profile_img'] . '" title="FirstName LastName">
          <div class="cardTextOut">
            <p class="cardText cardText2">
              <span class="cardLightText">Occupation</span>: ' . $row4['occupation'] . '
            </p>
            <p class="cardText cardText3">
              <span class="cardLightText">Height(in cm)</span>: ' . $row4['height'] . '
            </p>
            <p class="cardText cardText4">
              <span class="cardLightText">Age</span>: ' . $row4['age'] . '
            </p>
            <p class="cardText cardText5">
              <span class="cardLightText">ID</span>: ' . $row4['id'] . '
            </p>
            <form class="cardMoreOut" method="post" target="frame">
              <div class="viewYourProfileForm">
              <a href="yourProfile.php?passYourID=' . $row4['id'] . '" class="cardMore1" name="cardMore1">
                Full Profile
              </a>
              </div>
              <input name="liked_by" value="' . $viewedTo . '" style="display:none"></input>
              <input name="liked_to" value="' . $row4['id'] . '" style="display:none"></input>
              <button name="cardMore2" class="cardMore2 cardMore" title="Like" onclick="cardMoreFunc(this)" style="opacity:' . $likeBackColor . ';"></button>
              <button name="cardMore3" class="cardMore3 cardMore" title="Dislike" onclick="cardMoreFunc(this)" style="opacity: ' . $dislikeBackColor . ';"></button>
              <button name="cardMore4" class="cardMore4 cardMore" title="Report" onclick="cardMoreFunc(this)" style="opacity: ' . $reportBackColor . ';"></button>
            </form>
          </div>
        </div>';
  }
  }
  // else{
  //   $output .= 'No user viewed your profile :(';
  // }
  
}
