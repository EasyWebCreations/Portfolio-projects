<div class="card" style="display:inline-flex">
                    <div class="cardText1">
                      <p class="cardText1Text">Admin Person</p>
                    </div>
                    <img class="cardImg" src="https://testing-aws-php.s3.ap-south-1.amazonaws.com/logoimages/profileImg.png" title="FirstName LastName">
                    <div class="cardTextOut">
                      <p class="cardText cardText2">
                        <span class="cardLightText">Occupation</span>: 
                      </p>
                      <p class="cardText cardText3">
                        <span class="cardLightText">Height(in cm)</span>: 0
                      </p>
                      <p class="cardText cardText4">
                        <span class="cardLightText">Age</span>: 0
                      </p>
                      <p class="cardText cardText5">
                        <span class="cardLightText">ID</span>: 11111
                      </p>
                      <form class="cardMoreOut" id="cardForm" method="POST" target="frame">
                        <div class="viewYourProfileForm">
                        <a href="yourProfile.php?passYourID=11111" class="cardMore1" name="cardMore1" id="viewprofile">
                          Full Profile
                        </a>
                        </div>
                        <input name="liked_by" id="viewedBy" value="94312" style="display:none"></input>
                        <input name="liked_to" id="viewedTo" value="11111" style="display:none"></input>
                        <button name="cardMore2" class="cardMore2 cardMore" title="Like" onclick="cardMoreFunc(this)" style="opacity: 0.3;"></button>
                        <button name="cardMore3" class="cardMore3 cardMore" title="Dislike" onclick="cardMoreFunc(this)" style="opacity: 0.3;"></button>
                        <button name="cardMore4" class="cardMore4 cardMore" title="Report" onclick="cardMoreFunc(this)" style="opacity: 0.3;"></button>
                      </form>
                    </div>
                  </div><div class="card" style="display:inline-flex">
                    <div class="cardText1">
                      <p class="cardText1Text">Test Two</p>
                    </div>
                    <img class="cardImg" src="https://testing-aws-php.s3.ap-south-1.amazonaws.com/logoimages/profileImg.png" title="FirstName LastName">
                    <div class="cardTextOut">
                      <p class="cardText cardText2">
                        <span class="cardLightText">Occupation</span>: buissiness
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
                        <input name="liked_by" id="viewedBy" value="94312" style="display:none"></input>
                        <input name="liked_to" id="viewedTo" value="12560" style="display:none"></input>
                        <button name="cardMore2" class="cardMore2 cardMore" title="Like" onclick="cardMoreFunc(this)" style="opacity: 0.3;"></button>
                        <button name="cardMore3" class="cardMore3 cardMore" title="Dislike" onclick="cardMoreFunc(this)" style="opacity: 0.3;"></button>
                        <button name="cardMore4" class="cardMore4 cardMore" title="Report" onclick="cardMoreFunc(this)" style="opacity: 0.3;"></button>
                      </form>
                    </div>
                  </div><div class="card" style="display:inline-flex">
                    <div class="cardText1">
                      <p class="cardText1Text">testc testcl</p>
                    </div>
                    <img class="cardImg" src="https://testing-aws-php.s3.ap-south-1.amazonaws.com/logoimages/profileImg.png" title="FirstName LastName">
                    <div class="cardTextOut">
                      <p class="cardText cardText2">
                        <span class="cardLightText">Occupation</span>: 
                      </p>
                      <p class="cardText cardText3">
                        <span class="cardLightText">Height(in cm)</span>: 0
                      </p>
                      <p class="cardText cardText4">
                        <span class="cardLightText">Age</span>: 0
                      </p>
                      <p class="cardText cardText5">
                        <span class="cardLightText">ID</span>: 92114
                      </p>
                      <form class="cardMoreOut" id="cardForm" method="POST" target="frame">
                        <div class="viewYourProfileForm">
                        <a href="yourProfile.php?passYourID=92114" class="cardMore1" name="cardMore1" id="viewprofile">
                          Full Profile
                        </a>
                        </div>
                        <input name="liked_by" id="viewedBy" value="94312" style="display:none"></input>
                        <input name="liked_to" id="viewedTo" value="92114" style="display:none"></input>
                        <button name="cardMore2" class="cardMore2 cardMore" title="Like" onclick="cardMoreFunc(this)" style="opacity: 0.3;"></button>
                        <button name="cardMore3" class="cardMore3 cardMore" title="Dislike" onclick="cardMoreFunc(this)" style="opacity: 0.3;"></button>
                        <button name="cardMore4" class="cardMore4 cardMore" title="Report" onclick="cardMoreFunc(this)" style="opacity: 0.3;"></button>
                      </form>
                    </div>
                  </div> <?php include_once("components/bottom.php"); ?>
                        <?php include_once("index1js.php"); ?>
                        <iframe name="frame" style="display: none;"></iframe>
                        <script src="location.js"></script>