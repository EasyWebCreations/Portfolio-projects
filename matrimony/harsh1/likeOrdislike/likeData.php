<?php
    while($row = mysqli_fetch_assoc($query)){
        // echo $row['liked_to'];
        $sql1 = "SELECT * FROM per_details WHERE id={$row['liked_to']}";
        $querycard = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($querycard);
        $likeBackColor = '0.9';
  
        $dislikeBackColor = '0.3';
   
        $reportBackColor = '0.3';
        $output .= 
                  
                '<div class="card">
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
?>