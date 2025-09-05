<div class="card" style="display:inline-flex">
                    <div class="cardText1">
                      <p class="cardText1Text">Test Two 2022-10-14</p>
                    </div>
                    <img class="cardImg" src="https://testing-aws-php.s3.ap-south-1.amazonaws.com/test/45ffd9ae5a64c6f03898546b11160baa.png">
                    <div class="cardTextOut">
                      <p class="cardText cardText2">
                        <span class="cardLightText">Occupation</span>: Computers / IT
                      </p>
                      <p class="cardText cardText3">
                        <span class="cardLightText">Height(in cm)</span>: 200
                      </p>
                      <p class="cardText cardText4">
                        <span class="cardLightText">Age</span>: 27
                      </p>
                      <p class="cardText cardText5">
                        <span class="cardLightText">ID</span>: 12560
                      </p>
                      <form class="cardMoreOut" id="cardForm" method="POST" target="frame">
                        <div class="viewYourProfileForm">
                        <a href="yourProfile.php?passYourID=12560" class="cardMore1" name="cardMore1" id="viewprofile">
                          Full Profile
                        </a>
                        </div>
                        <input name="liked_by" id="viewedBy" value="14565" style="display:none"></input>
                        <input name="liked_to" id="viewedTo" value="12560" style="display:none"></input>
                        <button name="cardMore2" class="cardMore2 cardMore" title="Like" onclick="cardMoreFunc(this)" style="opacity: 0.3;"></button>
                        <button name="cardMore3" class="cardMore3 cardMore" title="Dislike" onclick="cardMoreFunc(this)" style="opacity: 0.3;"></button>
                        <button name="cardMore4" class="cardMore4 cardMore" title="Report" onclick="cardMoreFunc(this)" style="opacity: 0.3;"></button>
                      </form>
                    </div>
                  </div><?php include_once("index1js.php"); ?>
                        <iframe name="frame" style="display: none;"></iframe>
                        <script src="location.js"></script>
                        <script src="chat.js"></script>
                        <script src="../chat/dropDowns.js"></script>