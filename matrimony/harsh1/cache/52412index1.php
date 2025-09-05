<div class="card" style="display:inline-flex">
                    <div class="cardText1">
                      <p class="cardText1Text">Easy Code</p>
                    </div>
                    <img class="cardImg" src="https://testing-aws-php.s3.ap-south-1.amazonaws.com/logoimages/profileImg.png">
                    <div class="cardTextOut">
                      <p class="cardText cardText2">
                        <span class="cardLightText">Occupation</span>: Business
                      </p>
                      <p class="cardText cardText3">
                        <span class="cardLightText">Height(in cm)</span>: 1 ft 4 inc
                      </p>
                      <p class="cardText cardText4">
                        <span class="cardLightText">Age</span>: 17
                      </p>
                      <p class="cardText cardText5">
                        <span class="cardLightText">ID</span>: 77178
                      </p>
                      <form class="cardMoreOut" id="cardForm" method="POST" target="frame">
                        <div class="viewYourProfileForm">
                        <a href="yourProfile.php?passYourID=77178" class="cardMore1" name="cardMore1" id="viewprofile">
                          Full Profile
                        </a>
                        </div>
                        <input name="liked_by" id="viewedBy" value="52412" style="display:none"></input>
                        <input name="liked_to" id="viewedTo" value="77178" style="display:none"></input>
                        <button name="cardMore2" class="cardMore2 cardMore" title="Like" onclick="cardMoreFunc(this)" style="opacity: 0.3;"></button>
                        <button name="cardMore3" class="cardMore3 cardMore" title="Dislike" onclick="cardMoreFunc(this)" style="opacity: 0.3;"></button>
                        <button name="cardMore4" class="cardMore4 cardMore" title="Report" onclick="cardMoreFunc(this)" style="opacity: 0.3;"></button>
                      </form>
                    </div>
                  </div><div class="card" style="display:inline-flex">
                    <div class="cardText1">
                      <p class="cardText1Text">vedangi deshpande</p>
                    </div>
                    <img class="cardImg" src="https://testing-aws-php.s3.ap-south-1.amazonaws.com/logoimages/profileImg.png">
                    <div class="cardTextOut">
                      <p class="cardText cardText2">
                        <span class="cardLightText">Occupation</span>: Job
                      </p>
                      <p class="cardText cardText3">
                        <span class="cardLightText">Height(in cm)</span>: 6 ft 0 inc
                      </p>
                      <p class="cardText cardText4">
                        <span class="cardLightText">Age</span>: 22
                      </p>
                      <p class="cardText cardText5">
                        <span class="cardLightText">ID</span>: 88346
                      </p>
                      <form class="cardMoreOut" id="cardForm" method="POST" target="frame">
                        <div class="viewYourProfileForm">
                        <a href="yourProfile.php?passYourID=88346" class="cardMore1" name="cardMore1" id="viewprofile">
                          Full Profile
                        </a>
                        </div>
                        <input name="liked_by" id="viewedBy" value="52412" style="display:none"></input>
                        <input name="liked_to" id="viewedTo" value="88346" style="display:none"></input>
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