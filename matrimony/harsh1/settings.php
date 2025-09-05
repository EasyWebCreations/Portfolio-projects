<?php
session_start();
include_once("../backend/connect.php");
$sqlSettings = "SELECT * FROM per_details WHERE id={$_SESSION['unique_id']}";
$resultSetting = mysqli_query($conn, $sqlSettings);
$rowSetting = mysqli_fetch_assoc($resultSetting);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings</title>
  <link rel="stylesheet" href="components/navBar.css">
  <link rel="stylesheet" href="components/bottom.css">
  <style>
    * {
      margin: 0vw;
      padding: 0vw;
      box-sizing: border-box;
      font-family: arial, sans-serif;
    }

    body {
      background: #F8F8F8;
    }

    button,
    a {
      -webkit-tap-highlight-color: transparent;
    }

    .goog-te-banner-frame.skiptranslate {
      display: none !important;
    }

    body {
      top: 0px !important;
    }

    .hamburgerBtn {
      display: none;
    }

    .bottom {
      position: fixed;
      bottom: 0vw;
    }
  </style>
  <link rel="stylesheet" href="settings.css">
  <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <?php include_once("components/navBar.php"); ?>

  <div class="contentOut">
    <div class="contentTop">
      <div class="filterOptionOut">
        <button class="filterOption filterOption1" onclick="filterChoice(0)">
          <div class="filterOptionImg filterOptionImg1"></div>
          <p class="filterOptionText filterOptionText1">
            General Settings
          </p>
        </button>
        <button class="filterOption filterOption2" onclick="filterChoice(1)">
          <div class="filterOptionImg filterOptionImg2"></div>
          <p class="filterOptionText filterOptionText2">
            Profile Settings
          </p>
        </button>
        <button class="filterOption filterOption3" onclick="filterChoice(2)">
          <div class="filterOptionImg filterOptionImg3"></div>
          <p class="filterOptionText filterOptionText3">
            Privacy Settings
          </p>
        </button>
        <button class="filterOption filterOption4" onclick="filterChoice(3)">
          <div class="filterOptionImg filterOptionImg4"></div>
          <p class="filterOptionText filterOptionText4">
            Blocked Settings
          </p>
        </button>
        <button class="filterOption filterOption5" onclick="filterChoice(4)">
          <div class="filterOptionImg filterOptionImg5"></div>
          <p class="filterOptionText filterOptionText5">
            More Settings
          </p>
        </button>
      </div>
    </div>
    <div class="content">
      <form class="generalSetting settingOptionOut" method="post" target="frame">
        <div class="generalSettingOptionOut">
          <label class="generalSettingOptionLabel">First Name</label>
          <input type="text" class="generalSettingOption generalSettingOption1" id="fname" name="fname" value="<?php echo $rowSetting['fname'] ?>" required>
        </div>
        <div class="settingPartition"></div>
        <div class="generalSettingOptionOut">
          <label class="generalSettingOptionLabel">Last Name</label>
          <input type="text" class="generalSettingOption generalSettingOption2" id="lname" name="lname" value="<?php echo $rowSetting['lname'] ?>">
        </div>
        <!-- <div class="generalSettingOptionOut">
          <label class="generalSettingOptionLabel">Username</label>
          <input type="text" class="generalSettingOption generalSettingOption3">
        </div>
        <div class="settingPartition"></div>
        <div class="generalSettingOptionOut">
          <label class="generalSettingOptionLabel">Email</label>
          <input type="email" class="generalSettingOption generalSettingOption4">
        </div> -->
        <div class="generalSettingOptionOut">
          <label class="generalSettingOptionLabel">Blood Group</label>
          <!-- <input type="text" class="generalSettingOption generalSettingOption5" id="blood" name="blood" value="<?php
                                                                                                                    // echo $rowSetting['blood'] 
                                                                                                                    ?>"> -->
          <select class="generalSettingOption generalSettingOption7" id="blood" name="blood" value="<?php echo $rowSetting['blood'] ?>">
            <option value="<?php echo $rowSetting['blood'] ?>" selected hidden><?php echo $rowSetting['blood'] ?></option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
          </select>
        </div>
        <div class="settingPartition"></div>
        <div class="generalSettingOptionOut">
          <label class="generalSettingOptionLabel">Phone Number</label>
          <input type="text" class="generalSettingOption generalSettingOption6" id="mobile" name="mobile" value="<?php echo $rowSetting['mobile'] ?>">
        </div>
        <div class="generalSettingOptionOut">
          <label class="generalSettingOptionLabel">Gender</label>
          <select type="select" class="generalSettingOption generalSettingOption7" id="gender" name="gender" value="<?php echo $rowSetting['gender'] ?>">
            <option value="<?php echo $rowSetting['gender'] ?>" selected hidden><?php echo $rowSetting['gender'] ?></option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="settingPartition"></div>
        <div class="generalSettingOptionOut">
          <label class="generalSettingOptionLabel">Birth Day (mm/dd/yyyy)</label>
          <input type="date" class="generalSettingOption generalSettingOption8" id="dob" name="dob" value="<?php echo $rowSetting['dob'] ?>">
        </div>
        <button class=" saveSetting" id="saveGeneralSetting">Save <b>&#8594</b></button>
      </form>




      <div class="profileSettingOut settingOptionOut">
        <form class="profileSettingForm">
          <div class="profileSetting">
            <div class="profileContentHeadOut">
              <div class="profileContentHead">
                <img src="user.svg" class="profileContentHeadImg">
                <p class="profileContentHeadText">Profile Information</p>
              </div>
            </div>
            <!-- <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Birth Date</label>
              <input type="date" class="generalSettingOption generalSettingOption1">
            </div> -->
            <!-- <div class="settingPartition"></div> -->
            <div class="aboutMeOut">
              <label class="generalSettingOptionLabel">About Me</label>
              <textarea wrap="soft" class="detailText" id="about_me" value="<?php echo $rowSetting['about_me'] ?>"><?php echo $rowSetting['about_me'] ?></textarea>
            </div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Height (Inches)</label>
              <input type="text" class="generalSettingOption generalSettingOption4" id="height" name="height" value="<?php echo $rowSetting['height'] ?>">
            </div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Age</label>
              <input type="text" class="generalSettingOption generalSettingOption4" id="age" name="age" value="<?php echo $rowSetting['age'] ?>">
            </div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Income (LPA)</label>
              <!-- <input type="text" class="generalSettingOption generalSettingOption2" id="income" name="income" value="<?php
                                                                                                                          // echo $rowSetting['income']
                                                                                                                          ?>"> -->
              <select type="select" class="generalSettingOption generalSettingOption7" id="income" name="income" value="<?php echo $rowSetting['income'] ?>">
                <option value="<?php echo $rowSetting['income'] ?>" selected hidden><?php echo $rowSetting['income'] ?></option>
                <option value="Under - ₹ 50,000">Under - ₹ 50,000</option>
                <option value="₹ 50,001 - 1,00,000">₹ 50,001 - 1,00,000</option>
                <option value="₹ 1,00,001 - 2,00,000">₹ 1,00,001 - 2,00,000</option>
                <option value="₹ 2,00,001 - 3,00,000">₹ 2,00,001 - 3,00,000</option>
                <option value="₹ 3,00,001 - 4,00,000">₹ 3,00,001 - 4,00,000</option>
                <option value="₹ 4,00,001 - 5,00,000">₹ 4,00,001 - 5,00,000</option>
                <option value="₹ 5,00,001 - 6,00,000">₹ 5,00,001 - 6,00,000</option>

                <option value="₹ 6,00,001 - 7,00,000">₹ 6,00,001 - 7,00,000</option>
                <option value="₹ 7,00,001 - 8,00,000"> ₹ 7,00,001 - 8,00,000 </option>
                <option value="₹ 8,00,001 - 9,00,000"> ₹ 8,00,001 - 9,00,000 </option>
                <option value="₹ 9,00,001 - 10,00,000"> ₹ 9,00,001 - 10,00,000 </option>
                <option value="₹ 10,00,001 - 12,00,000"> ₹ 10,00,001 - 12,00,000</option>

                <option value="₹ 12,00,001 - 15,00,000"> ₹ 12,00,001 - 15,00,000</option>
                <option value="₹ 15,00,001 - 20,00,000"> ₹ 15,00,001 - 20,00,000</option>
                <option value="₹ 20,00,001 - 25,00,000"> ₹ 20,00,001 - 25,00,000</option>
                <option value="₹ 25,00,001 - 30,00,000"> ₹ 25,00,001 - 30,00,000</option>
                <option value="₹ 30,00,001 - and above"> ₹ 30,00,001 - and above</option>

                <option value="Under $25,000"> Under $25,000</option>
                <option value="$25,001 - 50,000"> $25,001 - 50,000 </option>
                <option value="$50,000 - 75000 "> $50,000 - 75000 </option>
                <option value="$75,001 - 1,00,000"> $75,001 - 1,00,000 </option>
                <option value=" $1,00,001 - 1,25,000"> $1,00,001 - 1,25,000 </option>

                <option value="$1,25,001 - 1,50,000"> $1,25,001 - 1,50,000</option>
                <option value="$1,50,001 - 1,75,000"> $1,50,001 - 1,75,000 </option>
                <option value="$1,75,001 - 2,00,000"> $1,75,001 - 2,00,000 </option>
                <option value="$2,00,001 - and above"> $2,00,001 - and above </option>

              </select>
            </div>

            <!-- <div class="settingPartition"></div> -->
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Country</label>
              <select class="generalSettingOption generalSettingOption7" id="country" name="country" value="<?php echo $rowSetting['c_country'] ?>">
                <option value="<?php echo $rowSetting['c_country'] ?>" selected hidden><?php echo $rowSetting['c_country'] ?></option>
              </select>
            </div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">State</label>
              <!-- <input type="select" class="generalSettingOption generalSettingOption10" id="c_state" name="c_state" value="<?php
                                                                                                                                // echo $rowSetting['c_state']
                                                                                                                                ?>"> -->
              <select class="generalSettingOption generalSettingOption7" id="state" name="state" value="<?php echo $rowSetting['c_state'] ?>">
                <option value="<?php echo $rowSetting['c_state'] ?>" selected hidden><?php echo $rowSetting['c_state'] ?></option>
              </select>
            </div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">City</label>
              <!-- <input type="text" class="generalSettingOption generalSettingOption8" id="c_city" name="c_city" value="<?php
                                                                                                                          // echo $rowSetting['c_city']
                                                                                                                          ?>"> -->
              <select class="generalSettingOption generalSettingOption7" id="city" name="city" value="<?php echo $rowSetting['c_city'] ?>">
                <option value="<?php echo $rowSetting['c_city'] ?>" selected hidden><?php echo $rowSetting['c_city'] ?></option>
              </select>
            </div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">District</label>
              <input type="text" class="generalSettingOption generalSettingOption9" id="c_district" name="c_district" value="<?php echo $rowSetting['c_district'] ?>">
            </div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Locality</label>
              <input type="text" class="generalSettingOption generalSettingOption7" id="c_locality" name="c_locality" value="<?php echo $rowSetting['c_locality'] ?>">
            </div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Landmark</label>
              <input type="text" class="generalSettingOption generalSettingOption6" id="c_landmark" name="c_landmark" value="<?php echo $rowSetting['c_landmark'] ?>">
            </div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Pin Code</label>
              <input type="text" class="generalSettingOption generalSettingOption11" id="c_pincode" name="c_pincode" value="<?php echo $rowSetting['c_pincode'] ?>">
            </div>
            <!-- <div class="settingPartition"></div> -->
            <!-- <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Gotras</label>
              <input type="text" class="generalSettingOption generalSettingOption6">
            </div> -->
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Education</label>
              <select type="select" class="generalSettingOption generalSettingOption7" id="education" name="education" value="<?php echo $rowSetting['education'] ?>">
                <option value="<?php echo $rowSetting['education'] ?>" selected hidden><?php echo $rowSetting['education'] ?></option>
                <option value="SSC">SSC</option>
                <option value="HSC">HSC</option>
                <option value="Bachelor">Bachelor</option>
                <option value="Master">Master</option>
                <option value="PhD">PhD</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Education Details</label>
              <textarea wrap="soft" class="generalSettingOption detailText" id="det_education" value="<?php echo $rowSetting['det_education'] ?>"><?php echo $rowSetting['det_education'] ?></textarea>
            </div>

            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Occupation</label>
              <!-- <input type="text" class="generalSettingOption generalSettingOption3" id="occupation" name="occupation" value="<?php
                                                                                                                                  // echo $rowSetting['occupation'] 
                                                                                                                                  ?>
              "> -->
              <select class="generalSettingOption generalSettingOption7" id="occupation" name="occupation" value="<?php echo $rowSetting['occupation'] ?>">
                <option value="<?php echo $rowSetting['occupation'] ?>" selected hidden><?php echo $rowSetting['occupation'] ?></option>
                <option value="Business">Business</option>
                <option value="Job">Job</option>
                <option value="Doctor">Doctor</option>
                <option value="Medical">Medical</option>
                <option value="Bank">Bank</option>

                <option value="Insurance">Insurance</option>
                <option value="Computers / IT">Computers / IT</option>
                <option value="Advertising / Marketing ">Advertising / Marketing </option>
                <option value="Civil">Civil</option>
                <option value="Professional (CA, CS, CMA)">Professional (CA, CS, CMA)</option>

                <option value="Architecture">Architecture</option>
                <option value="Administration Services">Administration Services</option>
                <option value="Armed Forces">Armed Forces</option>
                <option value="Fashion">Fashion</option>
                <option value="Engineering / Technology">Engineering / Technology</option>

                <option value="Arts">Arts</option>
                <option value="Finance">Finance</option>
                <option value="Fine Arts">Fine Arts</option>
                <option value="Home Sciences">Home Sciences</option>
                <option value="Management">Management</option>

                <option value="Nursing / Health Sciences">Nursing / Health Sciences</option>
                <option value="Science">Science</option>
                <option value="Travel / Tourism">Travel / Tourism</option>
                <option value="Office Administration">Office Administration</option>
                <option value="Design">Design</option>
              </select>
            </div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Occupation Details</label>
              <textarea wrap="soft" class="generalSettingOption detailText" id="det_occupation" value="<?php echo $rowSetting['det_occupation'] ?>"><?php echo $rowSetting['det_occupation'] ?></textarea>
            </div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Complexion</label>
              <input type="text" class="generalSettingOption generalSettingOption6" id="complexion" name="complexion" value="<?php echo $rowSetting['complexion']; ?>">
            </div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Mother Tongue</label>
              <input type="text" class="generalSettingOption generalSettingOption11" id="mother_tongue" name="mother_tongue" value="<?php echo $rowSetting['mother_tongue']; ?>">
            </div>
          </div>

          <div class="profileSetting">
            <div class="profileContentHeadOut">
              <div class="profileContentHead">
                <img src="aboutUs.svg" class="profileContentHeadImg">
                <p class="profileContentHeadText">Family Details</p>
              </div>
            </div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Mother Name</label>
              <input type="text" class="generalSettingOption generalSettingOption1" id="mother_name" name="mother_name" value="<?php echo $rowSetting['mother_name'] ?>">
            </div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Father Name</label>
              <input type="text" class="generalSettingOption generalSettingOption2" id="mname" name="mname" value="<?php echo $rowSetting['mname'] ?>">
            </div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Mother Occupation</label>
              <input type="text" class="generalSettingOption generalSettingOption3" id="mother_occupation" name="mother_occupation" value="<?php echo $rowSetting['mother_occupation'] ?>">
            </div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Father Occupation</label>
              <input type="text" class="generalSettingOption generalSettingOption4" id="father_occupation" name="father_occupation" value="<?php echo $rowSetting['father_occupation'] ?>">
            </div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Siblings</label>
              <input type="text" class="generalSettingOption generalSettingOption5" id="siblings" name="siblings" value="<?php echo $rowSetting['siblings'] ?>">
            </div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Family Income (LPA)</label>
              <input type="text" class="generalSettingOption generalSettingOption6" id="family_income" name="family_income" value="<?php echo $rowSetting['family_income'] ?>">
            </div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Brother(s)</label>
              <input type="text" class="generalSettingOption generalSettingOption5" id="no_of_brothers" name="no_of_brothers" value="<?php echo $rowSetting['no_of_brothers'] ?>">
            </div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Sister(s)</label>
              <input type="text" class="generalSettingOption generalSettingOption6" id="no_of_sisters" name="no_of_sisters" value="<?php echo $rowSetting['no_of_sisters'] ?>">
            </div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Brother's Details</label>
              <textarea maxlength="15" wrap="soft" class="generalSettingOption detailText" id="brother_details" value="<?php echo $rowSetting['brother_details'] ?>"><?php echo $rowSetting['brother_details'] ?></textarea>
            </div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Sister's Details</label>
              <textarea maxlength="15" wrap="soft" class="generalSettingOption detailText" id="sister_details" value="<?php echo $rowSetting['sister_details'] ?>"><?php echo $rowSetting['sister_details'] ?></textarea>
            </div>
          </div>

          <div class="profileSetting">
            <div class="profileContentHeadOut">
              <div class="profileContentHead">
                <img src="star.svg" class="profileContentHeadImg">
                <p class="profileContentHeadText">Birth & Zodiac</p>
              </div>
            </div>

            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Birth Name</label>
              <input type="text" class="generalSettingOption generalSettingOption6" id="birth_name" name="birth_name" value="<?php echo $rowSetting['birth_name'] ?>">
            </div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Birth Time</label>
              <input type="time" class="generalSettingOption generalSettingOption3" id="birth_time" name="birth_time" value="<?php echo $rowSetting['birth_time'] ?>">
            </div>



            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Birth Place</label>
              <input type="text" class="generalSettingOption generalSettingOption5" id="birth_place" name="birth_place" value="<?php echo $rowSetting['birth_place'] ?>">
            </div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Zodiac/Rashi</label>
              <input type="text" class="generalSettingOption generalSettingOption2" id="zodiac" name="zodiac" value="<?php echo $rowSetting['zodiac'] ?>">
            </div>





            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Gotra 1</label>
              <select class="generalSettingOption generalSettingOption4" id="gotra1" name="gotra1" value="<?php echo $rowSetting['gotra1'] ?>">
                <option value='Aankul'>Aankul</option>
                <option value='Abhimanchkul'>Abhimanchkul</option>
                <option value='Abhimankul'>Abhimankul</option>
                <option value='Abhimanyukul'>Abhimanyukul</option>
                <option value='Akumanchal'>Akumanchal</option>
                <option value='Anantkul'>Anantkul</option>
                <option value='Ankul'>Ankul</option>
                <option value='Antakul'>Antakul</option>
                <option value='Ayankul'>Ayankul</option>
                <option value='Balshishta'>Balshishta</option>
                <option value='Balshatal'>Balshatal</option>
                <option value='Bhanukul'>Bhanukul</option>
                <option value='Bibshatla'>Bibshatla</option>
                <option value='Bomadshatla'>Bomadshatla</option>
                <option value='Budhankul'>Budhankul</option>
                <option value='Chandkul'>Chandkul</option>
                <option value='Chandrakul'>Chandrakul</option>
                <option value='Chandrashil'>Chandrashil</option>
                <option value='Chidrupkul'>Chidrupkul</option>
                <option value='Chilkul'>Chilkul</option>
                <option value='Chilshil'>Chilshil</option>
                <option value='Chinnakul'>Chinnakul</option>
                <option value='Chitrapil'>Chitrapil</option>
                <option value='Chennakul'>Chennakul</option>
                <option value='Channakul'>Channakul</option>
                <option value='Deokul'>Deokul</option>
                <option value='Deoshatla'>Deoshatla</option>
                <option value='Deoshetti'>Deoshetti</option>
                <option value='Devshishta'>Devshishta</option>
                <option value='Deshatla'>Deshatla</option>
                <option value='Dhankul'>Dhankul</option>
                <option value='Dhanshil'>Dhanshil</option>
                <option value='Dikshkul'>Dikshkul</option>
                <option value='Ebhrashatla'>Ebhrashatla</option>
                <option value='Ebishatla'>Ebishatla</option>
                <option value='Ekshakul'>Ekshakul</option>
                <option value='Enkol'>Enkol</option>
                <option value='Enkul'>Enkul</option>
                <option value='Ennakul'>Ennakul</option>
                <option value='Eshashishta'>Eshashishta</option>
                <option value='Eshpal'>Eshpal</option>
                <option value='Eshwakul'>Eshwakul</option>
                <option value='Gandheshwar'>Gandheshwar</option>
                <option value='Ganshatla'>Ganshatla</option>
                <option value='Gaurshatla'>Gaurshatla</option>
                <option value='Gondakulla'>Gondakulla</option>
                <option value='Gondkul'>Gondkul</option>
                <option value='Gontakul'>Gontakul</option>
                <option value='Gunai'>Gunai</option>
                <option value='Gundkul'>Gundkul</option>
                <option value='Guntkul'>Guntkul</option>
                <option value='Gandheshil'>Gandheshil</option>
                <option value='Janukul'>Janukul</option>
                <option value='Jenchkul'>Jenchkul</option>
                <option value='Khushal'>Khushal</option>
                <option value='Komarshatla'>Komarshatla</option>
                <option value='Kumshatla'>Kumshatla</option>
                <option value='Madankul'>Madankul</option>
                <option value='Malshet'>Malshet</option>
                <option value='Mandkul'>Mandkul</option>
                <option value='Mankul'>Mankul</option>
                <option value='Masantkul'>Masantkul</option>
                <option value='Minkul'>Minkul</option>
                <option value='Mithunkul'>Mithunkul</option>
                <option value='Molukul'>Molukul</option>
                <option value='Moonkul'>Moonkul</option>
                <option value='Morkul'>Morkul</option>
                <option value='Mulkul'>Mulkul</option>
                <option value='Munikul'>Munikul</option>
                <option value='Murkul'>Murkul</option>
                <option value='Munjikula'>Munjikula</option>
                <option value='Nabhilkul'>Nabhilkul</option>
                <option value='Nabhilla'>Nabhilla</option>
                <option value='Narali'>Narali</option>
                <option value='Navshil'>Navshil</option>
                <option value='Pabhal'>Pabhal</option>
                <option value='Prabhal'>Prabhal</option>
                <option value='Padgeshil'>Padgeshil</option>
                <option value='Padgeshwar'>Padgeshwar</option>
                <option value='Padmashatla'>Padmashatla</option>
                <option value='Padmashil'>Padmashil</option>
                <option value='Padmashishta'>Padmashishta</option>
                <option value='Pagadikul'>Pagadikul</option>
                <option value='Paidikul'>Paidikul</option>
                <option value='Paidkul'>Paidkul</option>
                <option value='Paitkul'>Paitkul</option>
                <option value='Panaskul'>Panaskul</option>
                <option value='Panchkul'>Panchkul</option>
                <option value='Panshil'>Panshil</option>
                <option value='Pansul'>Pansul</option>
                <option value='Parashar'>Parashar</option>
                <option value='Paulshishta'>Paulshishta</option>
                <option value='Pawanshil'>Pawanshil</option>
                <option value='Pendakul'>Pendakul</option>
                <option value='Pendalkul'>Pendalkul</option>
                <option value='Pendlikul'>Pendlikul</option>
                <option value='Penlikul'>Penlikul</option>
                <option value='Pennakul'>Pennakul</option>
                <option value='Polishatla'>Polishatla</option>
                <option value='Polshatla'>Polshatla</option>
                <option value='Pongeshil'>Pongeshil</option>
                <option value='Puchhakul'>Puchhakul</option>
                <option value='Pulashatla'>Pulashatla</option>
                <option value='Pulkul'>Pulkul</option>
                <option value='Pulshetal'>Pulshetal</option>
                <option value='Punavshil'>Punavshil</option>
                <option value='Pungeshil'>Pungeshil</option>
                <option value='Pungwshwar'>Pungwshwar</option>
                <option value='Punjashil'>Punjashil</option>
                <option value='Punyashil'>Punyashil</option>
                <option value='Punyeshwar'>Punyeshwar</option>
                <option value='Pushpal'>Pushpal</option>
                <option value='Perushatla'>Perushatla</option>
                <option value='Parishatla'>Parishatla</option>
                <option value='Punsakul'>Punsakul</option>
                <option value='Rankul'>Rankul</option>
                <option value='Rantkul'>Rantkul</option>
                <option value='Rentkul'>Rentkul</option>
                <option value='Runtakul'>Runtakul</option>
                <option value='Renukul'>Renukul</option>
                <option value='Rontakul'>Rontakul</option>
                <option value='Sankul'>Sankul</option>
                <option value='Senshatla'>Senshatla</option>
                <option value='Shaigol'>Shaigol</option>
                <option value='Shaivgol'>Shaivgol</option>
                <option value='Shankul'>Shankul</option>
                <option value='Shayankul'>Shayankul</option>
                <option value='Sheelkul'>Sheelkul</option>
                <option value='Shirsal'>Shirsal</option>
                <option value='Shirshatla'>Shirshatla</option>
                <option value='Shrinikul'>Shrinikul</option>
                <option value='Shrishal'>Shrishal</option>
                <option value='Shrishatla'>Shrishatla</option>
                <option value='Shrisheel'>Shrisheel</option>
                <option value='Shrishishta'>Shrishishta</option>
                <option value='Shrishreshta'>Shrishreshta</option>
                <option value='Sirsal'>Sirsal</option>
                <option value='Sirshatla'>Sirshatla</option>
                <option value='Sudarshan'>Sudarshan</option>
                <option value='Surkul'>Surkul</option>
                <option value='Sursal'>Sursal</option>
                <option value='Suryakul'>Suryakul</option>
                <option value='Susal'>Susal</option>
                <option value='Totkul'>Totkul</option>
                <option value='Tulshishta'>Tulshishta</option>
                <option value='Tulshitla'>Tulshitla</option>
                <option value='Tulashatla'>Tulashatla</option>
                <option value='Upankul'>Upankul</option>
                <option value='Utkul'>Utkul</option>
                <option value='Utkalkul'>Utkalkul</option>
                <option value='Vachhakul'>Vachhakul</option>
                <option value='Vastrakul'>Vastrakul</option>
                <option value='Vatsakul'>Vatsakul</option>
                <option value='Vinukul'>Vinukul</option>
                <option value='Viparishatla'>Viparishatla</option>
                <option value='Viparishishta'>Viparishishta</option>
                <option value='Viprashatla'>Viprashatla</option>
                <option value='Vishnukul'>Vishnukul</option>
                <option value='Vishwakul'>Vishwakul</option>
                <option value='Vishwapal'>Vishwapal</option>
                <option value='Vikramshishta'>Vikramshishta</option>
                <option value='Vikramshil'>Vikramshil</option>
                <option value='Yalkul'>Yalkul</option>
                <option value='Yalshat'>Yalshat</option>
                <option value='Yalshatla'>Yalshatla</option>
                <option value='Yalshatti'>Yalshatti</option>
                <option value='Yalshishta'>Yalshishta</option>
                <option value='Yankul'>Yankul</option>
                <option value='Yannukul'>Yannukul</option>
                <option value='Yenkul'>Yenkul</option>
                <option value='Yetakul'>Yetakul</option>
              </select>
            </div>
            <div class="settingPartition"></div>
            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Gotra 2</label>
              <select class="generalSettingOption generalSettingOption7" id="gotra2" name="gotra2" value="<?php echo $rowSetting['gotra2'] ?>">
                <option value='Aankul'>Aankul</option>
                <option value='Abhimanchkul'>Abhimanchkul</option>
                <option value='Abhimankul'>Abhimankul</option>
                <option value='Abhimanyukul'>Abhimanyukul</option>
                <option value='Akumanchal'>Akumanchal</option>
                <option value='Anantkul'>Anantkul</option>
                <option value='Ankul'>Ankul</option>
                <option value='Antakul'>Antakul</option>
                <option value='Ayankul'>Ayankul</option>
                <option value='Balshishta'>Balshishta</option>
                <option value='Balshatal'>Balshatal</option>
                <option value='Bhanukul'>Bhanukul</option>
                <option value='Bibshatla'>Bibshatla</option>
                <option value='Bomadshatla'>Bomadshatla</option>
                <option value='Budhankul'>Budhankul</option>
                <option value='Chandkul'>Chandkul</option>
                <option value='Chandrakul'>Chandrakul</option>
                <option value='Chandrashil'>Chandrashil</option>
                <option value='Chidrupkul'>Chidrupkul</option>
                <option value='Chilkul'>Chilkul</option>
                <option value='Chilshil'>Chilshil</option>
                <option value='Chinnakul'>Chinnakul</option>
                <option value='Chitrapil'>Chitrapil</option>
                <option value='Chennakul'>Chennakul</option>
                <option value='Channakul'>Channakul</option>
                <option value='Deokul'>Deokul</option>
                <option value='Deoshatla'>Deoshatla</option>
                <option value='Deoshetti'>Deoshetti</option>
                <option value='Devshishta'>Devshishta</option>
                <option value='Deshatla'>Deshatla</option>
                <option value='Dhankul'>Dhankul</option>
                <option value='Dhanshil'>Dhanshil</option>
                <option value='Dikshkul'>Dikshkul</option>
                <option value='Ebhrashatla'>Ebhrashatla</option>
                <option value='Ebishatla'>Ebishatla</option>
                <option value='Ekshakul'>Ekshakul</option>
                <option value='Enkol'>Enkol</option>
                <option value='Enkul'>Enkul</option>
                <option value='Ennakul'>Ennakul</option>
                <option value='Eshashishta'>Eshashishta</option>
                <option value='Eshpal'>Eshpal</option>
                <option value='Eshwakul'>Eshwakul</option>
                <option value='Gandheshwar'>Gandheshwar</option>
                <option value='Ganshatla'>Ganshatla</option>
                <option value='Gaurshatla'>Gaurshatla</option>
                <option value='Gondakulla'>Gondakulla</option>
                <option value='Gondkul'>Gondkul</option>
                <option value='Gontakul'>Gontakul</option>
                <option value='Gunai'>Gunai</option>
                <option value='Gundkul'>Gundkul</option>
                <option value='Guntkul'>Guntkul</option>
                <option value='Gandheshil'>Gandheshil</option>
                <option value='Janukul'>Janukul</option>
                <option value='Jenchkul'>Jenchkul</option>
                <option value='Khushal'>Khushal</option>
                <option value='Komarshatla'>Komarshatla</option>
                <option value='Kumshatla'>Kumshatla</option>
                <option value='Madankul'>Madankul</option>
                <option value='Malshet'>Malshet</option>
                <option value='Mandkul'>Mandkul</option>
                <option value='Mankul'>Mankul</option>
                <option value='Masantkul'>Masantkul</option>
                <option value='Minkul'>Minkul</option>
                <option value='Mithunkul'>Mithunkul</option>
                <option value='Molukul'>Molukul</option>
                <option value='Moonkul'>Moonkul</option>
                <option value='Morkul'>Morkul</option>
                <option value='Mulkul'>Mulkul</option>
                <option value='Munikul'>Munikul</option>
                <option value='Murkul'>Murkul</option>
                <option value='Munjikula'>Munjikula</option>
                <option value='Nabhilkul'>Nabhilkul</option>
                <option value='Nabhilla'>Nabhilla</option>
                <option value='Narali'>Narali</option>
                <option value='Navshil'>Navshil</option>
                <option value='Pabhal'>Pabhal</option>
                <option value='Prabhal'>Prabhal</option>
                <option value='Padgeshil'>Padgeshil</option>
                <option value='Padgeshwar'>Padgeshwar</option>
                <option value='Padmashatla'>Padmashatla</option>
                <option value='Padmashil'>Padmashil</option>
                <option value='Padmashishta'>Padmashishta</option>
                <option value='Pagadikul'>Pagadikul</option>
                <option value='Paidikul'>Paidikul</option>
                <option value='Paidkul'>Paidkul</option>
                <option value='Paitkul'>Paitkul</option>
                <option value='Panaskul'>Panaskul</option>
                <option value='Panchkul'>Panchkul</option>
                <option value='Panshil'>Panshil</option>
                <option value='Pansul'>Pansul</option>
                <option value='Parashar'>Parashar</option>
                <option value='Paulshishta'>Paulshishta</option>
                <option value='Pawanshil'>Pawanshil</option>
                <option value='Pendakul'>Pendakul</option>
                <option value='Pendalkul'>Pendalkul</option>
                <option value='Pendlikul'>Pendlikul</option>
                <option value='Penlikul'>Penlikul</option>
                <option value='Pennakul'>Pennakul</option>
                <option value='Polishatla'>Polishatla</option>
                <option value='Polshatla'>Polshatla</option>
                <option value='Pongeshil'>Pongeshil</option>
                <option value='Puchhakul'>Puchhakul</option>
                <option value='Pulashatla'>Pulashatla</option>
                <option value='Pulkul'>Pulkul</option>
                <option value='Pulshetal'>Pulshetal</option>
                <option value='Punavshil'>Punavshil</option>
                <option value='Pungeshil'>Pungeshil</option>
                <option value='Pungwshwar'>Pungwshwar</option>
                <option value='Punjashil'>Punjashil</option>
                <option value='Punyashil'>Punyashil</option>
                <option value='Punyeshwar'>Punyeshwar</option>
                <option value='Pushpal'>Pushpal</option>
                <option value='Perushatla'>Perushatla</option>
                <option value='Parishatla'>Parishatla</option>
                <option value='Punsakul'>Punsakul</option>
                <option value='Rankul'>Rankul</option>
                <option value='Rantkul'>Rantkul</option>
                <option value='Rentkul'>Rentkul</option>
                <option value='Runtakul'>Runtakul</option>
                <option value='Renukul'>Renukul</option>
                <option value='Rontakul'>Rontakul</option>
                <option value='Sankul'>Sankul</option>
                <option value='Senshatla'>Senshatla</option>
                <option value='Shaigol'>Shaigol</option>
                <option value='Shaivgol'>Shaivgol</option>
                <option value='Shankul'>Shankul</option>
                <option value='Shayankul'>Shayankul</option>
                <option value='Sheelkul'>Sheelkul</option>
                <option value='Shirsal'>Shirsal</option>
                <option value='Shirshatla'>Shirshatla</option>
                <option value='Shrinikul'>Shrinikul</option>
                <option value='Shrishal'>Shrishal</option>
                <option value='Shrishatla'>Shrishatla</option>
                <option value='Shrisheel'>Shrisheel</option>
                <option value='Shrishishta'>Shrishishta</option>
                <option value='Shrishreshta'>Shrishreshta</option>
                <option value='Sirsal'>Sirsal</option>
                <option value='Sirshatla'>Sirshatla</option>
                <option value='Sudarshan'>Sudarshan</option>
                <option value='Surkul'>Surkul</option>
                <option value='Sursal'>Sursal</option>
                <option value='Suryakul'>Suryakul</option>
                <option value='Susal'>Susal</option>
                <option value='Totkul'>Totkul</option>
                <option value='Tulshishta'>Tulshishta</option>
                <option value='Tulshitla'>Tulshitla</option>
                <option value='Tulashatla'>Tulashatla</option>
                <option value='Upankul'>Upankul</option>
                <option value='Utkul'>Utkul</option>
                <option value='Utkalkul'>Utkalkul</option>
                <option value='Vachhakul'>Vachhakul</option>
                <option value='Vastrakul'>Vastrakul</option>
                <option value='Vatsakul'>Vatsakul</option>
                <option value='Vinukul'>Vinukul</option>
                <option value='Viparishatla'>Viparishatla</option>
                <option value='Viparishishta'>Viparishishta</option>
                <option value='Viprashatla'>Viprashatla</option>
                <option value='Vishnukul'>Vishnukul</option>
                <option value='Vishwakul'>Vishwakul</option>
                <option value='Vishwapal'>Vishwapal</option>
                <option value='Vikramshishta'>Vikramshishta</option>
                <option value='Vikramshil'>Vikramshil</option>
                <option value='Yalkul'>Yalkul</option>
                <option value='Yalshat'>Yalshat</option>
                <option value='Yalshatla'>Yalshatla</option>
                <option value='Yalshatti'>Yalshatti</option>
                <option value='Yalshishta'>Yalshishta</option>
                <option value='Yankul'>Yankul</option>
                <option value='Yannukul'>Yannukul</option>
                <option value='Yenkul'>Yenkul</option>
                <option value='Yetakul'>Yetakul</option>
              </select>
            </div>


            <div class="generalSettingOptionOut">
              <label class="generalSettingOptionLabel">Janma Tithi</label>
              <input type="text" class="generalSettingOption generalSettingOption1" id="janma_tithi" name="janma_tithi" value="<?php echo $rowSetting['janma_tithi'] ?>">
            </div>
          </div>
          <div class="settingPartition"></div>

          <button class="saveSetting" id="saveProfileSetting">Save <b>&#8594</b></button>
        </form>
      </div>


      <div class="privacySettingOut settingOptionOut">
        <!-- <div class="privacySettingOption privacySettingOption1">
          <p class="privacySettingOptionText">Show my profile on search engines?</p>
          <button class="privacySettingOptionButton" onclick="togglePrivacySetting(0)">
            <div class="privacySettingOptionButtonPart"></div>
          </button>
        </div>
        <div class="privacySettingOption privacySettingOption2">
          <p class="privacySettingOptionText">Show my profile in random users?</p>
          <button class="privacySettingOptionButton" onclick="togglePrivacySetting(1)">
            <div class="privacySettingOptionButtonPart"></div>
          </button>
        </div>
        <div class="privacySettingOption privacySettingOption3">
          <p class="privacySettingOptionText">Show my profile in find match page?</p>
          <button class="privacySettingOptionButton" onclick="togglePrivacySetting(2)">
            <div class="privacySettingOptionButtonPart"></div>
          </button>
        </div> -->
        <form action="privacy/mobilevisibilty.php" method="POST" id="mobileForm">
          <div class="mobileNoVisibleOut">
            <span>
              My Mobile No. Is Visible:
            </span>
            <select class="mobileNoVisibleSelect" name="mobilepri" id="mobilepri">

              <option value="toAll">To everyone</option>
              <option value="toLiked">To people I liked</option>
              <option value="toNobody">To nobody</option>
            </select>
          </div>
          <div class="changePassSetOut">
            <img src="key.svg" class="changePassSetImg">
            <a href="../backend/changePass/forgotPass.php" class="changePassSet">
              Change Password
            </a>
          </div>
          <button type="submit" class=" saveSetting" id="mobile_visibility">Save <b>&#8594</b></button>
        </form>
      </div>

      <div class="blockedSettingOut settingOptionOut">
        <img src="aboutUs.svg" class="blockedSettingOptionImg">
        <p class="blockedSettingOptionText">No more users to show</p>
      </div>

      <!-- <div class="moreSettingOut generalSetting settingOptionOut"> -->
      <form class="generalSetting settingOptionOut" method="post" target="frame">
        <div class="generalSettingOptionOut">
          <label class="generalSettingOptionLabel">Partner's Expected Country</label>
          <select class="generalSettingOption generalSettingOption7" id="pe_country" name="pe_country" value="<?php echo $rowSetting['pe_country'] ?>">
            <option value="<?php echo $rowSetting['pe_country'] ?>" selected hidden><?php echo $rowSetting['pe_country'] ?></option>
          </select>
        </div>
        <div class="settingPartition"></div>
        <div class="generalSettingOptionOut">
          <label class="generalSettingOptionLabel">Partner's Expected State</label>
          <select class="generalSettingOption generalSettingOption7" id="pe_state" name="pe_state" value="<?php echo $rowSetting['pe_state'] ?>">
            <option value="<?php echo $rowSetting['pe_state'] ?>" selected hidden><?php echo $rowSetting['pe_state'] ?></option>
          </select>
        </div>
        <div class="generalSettingOptionOut">
          <label class="generalSettingOptionLabel">Partner's Expected City</label>
          <select class="generalSettingOption generalSettingOption7" id="pe_city" name="pe_city" value="<?php echo $rowSetting['pe_city'] ?>">
            <option value="<?php echo $rowSetting['pe_city'] ?>" selected hidden><?php echo $rowSetting['pe_city'] ?></option>
          </select>
        </div>
        <div class="settingPartition"></div>
        <div class="generalSettingOptionOut">
          <label class="generalSettingOptionLabel">Partner's Expected Education</label>
          <select type="select" class="generalSettingOption generalSettingOption7" id="pe_education" name="pe_education" value="<?php echo $rowSetting['pe_education'] ?>">
            <option value="<?php echo $rowSetting['pe_education'] ?>" selected hidden><?php echo $rowSetting['pe_education'] ?></option>
            <option value="SSC">SSC</option>
            <option value="HSC">HSC</option>
            <option value="Bachelor">Bachelor</option>
            <option value="Master">Master</option>
            <option value="PhD">PhD</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="generalSettingOptionOut">
          <label class="generalSettingOptionLabel">Partner's Expected Occupation</label>
          <select class="generalSettingOption generalSettingOption7" id="pe_occupation" name="pe_occupation" value="<?php echo $rowSetting['pe_occupation'] ?>">
            <option value="<?php echo $rowSetting['pe_occupation'] ?>" selected hidden><?php echo $rowSetting['pe_occupation'] ?></option>
            <option value="Self Employeed">Self Employed</option>
            <option value="Job">Job</option>
            <option value="House Wife">House Wife</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div class="settingPartition"></div>
        <div class="generalSettingOptionOut">
          <label class="generalSettingOptionLabel">Partner's Expected Age Range(in years)</label>
          <select class="generalSettingOption generalSettingOption7" id="pe_age" name="pe_age" value="<?php echo $rowSetting['pe_age'] ?>">
            <option value="<?php echo $rowSetting['pe_age'] ?>" selected hidden><?php echo $rowSetting['pe_age'] ?></option>
            <option value="18 - 20">18 - 20</option>
            <option value="21 - 24">21 - 24</option>
            <option value="25 - 30">25 - 30</option>
            <option value="30 - 35">30 - 35</option>
            <option value="36 - 40">36 - 40</option>
            <option value="41 - 45 +">41 - 45 +</option>
          </select>
        </div>
        <div class="generalSettingOptionOut">
          <label class="generalSettingOptionLabel">Partner's Expected Height(in inches)</label>
          <input type="text" class="generalSettingOption generalSettingOption1" id="pe_height" name="pe_height" value="<?php echo $rowSetting['pe_height'] ?>" required>
        </div>
        <div class="settingPartition"></div>
        <div class="generalSettingOptionOut">
          <label class="generalSettingOptionLabel">Partner's Expected Income (LPA)</label>
          <select type="select" class="generalSettingOption generalSettingOption7" id="pe_income" name="pe_income" value="<?php echo $rowSetting['pe_income'] ?>">
            <option value="<?php echo $rowSetting['pe_income'] ?>" selected hidden><?php echo $rowSetting['pe_income'] ?></option>
            <option value="1L ₹ ">1L ₹ </option>
            <option value="5L ₹ ">5L ₹ </option>
            <option value="15L ₹ ">15L ₹ </option>
            <option value="30L ₹ ">30L ₹ </option>
            <option value="50L ₹ ">50L ₹ </option>
            <option value="70L ₹ ">70L ₹ </option>
            <option value="71L ₹  and above">71L ₹ and above</option>
          </select>
        </div>
        <a href="premium/payment.php" id="completePayment" class="sideBarText"><button hidden>Payment</button></a>
        <button class=" saveSetting" id="saveMoreSetting">Save <b>&#8594</b></button>
      </form>
      <!-- </div> -->
    </div>
  </div>

  <!-- <?php //include_once("components/bottom.php"); 
        ?> -->
  <!-- General Setting -->
  <script>
    var dataFillingStatus = ''; 
    $(document).ready(function() {
      $("#saveGeneralSetting").click(function(e) {
        e.preventDefault();
        let fname = $("#fname").val();
        let lname = $("#lname").val();
        let blood = $("#blood").val();
        let mobile = $("#mobile").val();
        let gender = $("#gender").val();
        let dob = $("#dob").val();
        if (fname != null && fname.trim() != "" && lname != null && lname.trim() != "" && blood != null && blood.trim() != "" && mobile != null && mobile.trim() != "" && gender != null && gender.trim() != "" && dob != null && dob.trim() != "") {
          if ((mobile.trim()).length == 10) {
            $.ajax({
              url: "helper/generalSettingSubmit.php",
              type: "POST",
              dataType: "text",
              data: {
                fname: fname,
                lname: lname,
                blood: blood,
                mobile: mobile,
                gender: gender,
                dob: dob
              },
              success: function(response) {
                // peoplecards.innerHTML = response;
                console.log(response);
                dataFillingStatus += "s";
                alert("Your Details Are Updated Succesfully!");
              }
            });
          } else {
            alert("Please Enter A Valid Mobile No.!");
          }
        } else {
          alert("Please Fill All Details!");
          // console.log(fname + " " + lname + " " + c_country + " " + mobile + " " + gender + " " + dob);
        }
      });
    });



    $(document).ready(function() {
      $("#saveProfileSetting").click(function(e) {
        e.preventDefault();
        let complexion = $("#complexion").val();
        let mother_tongue = $("#mother_tongue").val();
        let brother_details = $("#brother_details").val();
        let sister_details = $("#sister_details").val();

        let age = $("#age").val();
        let about_me = $("#about_me").val();
        let education = $("#education").val();
        let det_education = $("#det_education").val();
        let det_occupation = $("#det_occupation").val();
        let no_of_brothers = $("#no_of_brothers").val();
        let no_of_sisters = $("#no_of_sisters").val();

        let income = $("#income").val();
        let occupation = $("#occupation").val();
        let height = $("#height").val();
        let c_country = $("#country").val();

        let c_landmark = $('#c_landmark').val();
        let c_locality = $('#c_locality').val();
        let c_city = $('#city').val();
        let c_district = $('#c_district').val();
        let c_state = $('#state').val();
        let c_pincode = $('#c_pincode').val();

        let mother_name = $("#mother_name").val();
        let mname = $("#mname").val();
        let mother_occupation = $("#mother_occupation").val();
        let father_occupation = $("#father_occupation").val();
        let siblings = $("#siblings").val();
        let family_income = $("#family_income").val();
        let janma_tithi = $("#janma_tithi").val();
        let zodiac = $("#zodiac").val();
        let birth_time = $("#birth_time").val();
        let gotra1 = $("#gotra1").val();
        let gotra2 = $("#gotra2").val();
        let birth_place = $("#birth_place").val();
        let birth_name = $("#birth_name").val();
        if (complexion != null && complexion.trim() != "" && mother_tongue != null && mother_tongue.trim() != "" && brother_details != null && brother_details.trim() != "" && sister_details != null && sister_details.trim() != "" && about_me != null && about_me.trim() != "" && education != null && education.trim() != "" && no_of_brothers != null && no_of_brothers.trim() != "" && no_of_sisters != null && no_of_sisters.trim() != "" && income != null && income.trim() != "" && occupation != null && occupation.trim() != "" && height != null && height.trim() != "" && c_country != null && c_country.trim() != "" && c_landmark != null && c_landmark.trim() != "" && c_locality != null && c_locality.trim() != "" && c_city != null && c_city.trim() != "" && c_district != null && c_district.trim() != "" && c_state != null && c_state.trim() != "" && c_pincode != null && c_pincode.trim() != "" && mother_name != null && mother_name.trim() != "" && mname != null && mname.trim() != "" && mother_occupation != null && mother_occupation.trim() != "" && father_occupation != null && father_occupation.trim() != "" && siblings != null && siblings.trim() != "" && family_income != null && family_income.trim() != "" && janma_tithi != null && janma_tithi.trim() != "" && zodiac != null && zodiac.trim() != "" && birth_time != null && birth_time.trim() != "" && gotra1 != null && gotra1.trim() != "" && birth_place != null && birth_place.trim() != "" && birth_name != null && birth_name.trim() != "") {
          $.ajax({
            url: "helper/profileSettingSubmit.php",
            type: "POST",
            dataType: "text",
            data: {
              complexion: complexion,
              mother_tongue: mother_tongue,
              brother_details: brother_details,
              sister_details: sister_details,

              age: age,
              about_me: about_me,
              education: education,
              det_education: det_education,
              det_occupation: det_occupation,
              no_of_brothers: no_of_brothers,
              no_of_sisters: no_of_sisters,

              income: income,
              occupation: occupation,
              height: height,
              c_country: c_country,

              c_landmark: c_landmark,
              c_locality: c_locality,
              c_city: c_city,
              c_district: c_district,
              c_state: c_state,
              c_pincode: c_pincode,

              mother_name: mother_name,
              mname: mname,
              mother_occupation: mother_occupation,
              father_occupation: father_occupation,
              siblings: siblings,
              family_income: family_income,
              janma_tithi: janma_tithi,
              zodiac: zodiac,
              birth_time: birth_time,
              gotra1: gotra1,
              gotra2: gotra2,
              birth_place: birth_place,
              birth_name: birth_name
            },
            success: function(response) {
              // peoplecards.innerHTML = response;
              console.log(response);
              dataFillingStatus += "s";
              alert("Your Details Are Updated Succesfully!");
            }
          });
        } else {
          alert("Please Fill All Details!");
        }
      });
    });




    let auth_token;
    $(document).ready(function() {
      $('#country').on('click', function(e) {
        // alert("clicked");
        $.ajax({
          type: "get",
          url: "https://www.universal-tutorial.com/api/getaccesstoken",
          success: function(data) {
            auth_token = data.auth_token;
            getCountry(data.auth_token);
          },
          error: function(error) {
            console.log(error);
          },
          headers: {
            "Accept": "application/json",
            "api-token": "3H4soPbzTdy9fH61jpsQmhB3Sw5SZskYPVd3BOUWQXF23NEkS-rLtu0TLMcQ5b6VZms",
            "user-email": "mahajansangmeshwar024@gmail.com"
          }
        });
        e.preventDefault();
      });
    });
    $('#country').change(function() {
      getState();
    });
    $('#state').change(function() {
      getCity();
    });

    function getCountry() {
      $.ajax({

        type: "get",
        url: "https://www.universal-tutorial.com/api/countries/",
        success: function(data) {
          data.forEach(element => {
            $('#country').append('<option value="' + element.country_name + '">' + element.country_name + '</option>');
          });
          getState(auth_token);
        },
        error: function(error) {
          console.log(error);
        },
        headers: {
          "Authorization": "Bearer " + auth_token,
          "Accept": "application/json"
        }
      });

    }

    function getState() {
      var country_name = $('#country').val();
      //var country_name = 'India';
      $.ajax({

        type: "get",
        url: "https://www.universal-tutorial.com/api/states/" + country_name,
        success: function(data) {
          //getCity(auth_token);
          $('#state').empty();
          data.forEach(element => {
            $('#state').append('<option value="' + element.state_name + '">' + element.state_name + '</option>');
          });
        },
        error: function(error) {
          console.log(error);
        },
        headers: {
          "Authorization": "Bearer " + auth_token,
          "Accept": "application/json"
        }
      });
    }

    function getCity() {
      var state_name = $('#state').val();
      //var state_name = 'Goa';
      $.ajax({

        type: "get",
        url: "https://www.universal-tutorial.com/api/cities/" + state_name,
        success: function(data) {
          //console.log('ajax');
          $('#city').empty();
          data.forEach(element => {
            $('#city').append('<option value="' + element.city_name + '">' + element.city_name + '</option>');
          });
        },
        error: function(error) {
          console.log(error);
        },
        headers: {
          "Authorization": "Bearer " + auth_token,
          "Accept": "application/json"
        }
      });
    }







    $(document).ready(function() {
      $("#saveMoreSetting").click(function(e) {
        e.preventDefault();
        let pe_country = $("#pe_country").val();
        let pe_state = $("#pe_state").val();
        let pe_city = $("#pe_city").val();
        let pe_education = $("#pe_education").val();
        let pe_occupation = $("#pe_occupation").val();
        let pe_income = $("#pe_income").val();
        let pe_height = $("#pe_height").val();
        let pe_age = $("#pe_age").val();
        if (pe_age != null && pe_age.trim() != "" && pe_height != null && pe_height.trim() != "" && pe_country != null && pe_country.trim() != "" && pe_state != null && pe_state.trim() != "" && pe_city != null && pe_city.trim() != "" && pe_education != null && pe_education.trim() != "" && pe_occupation != null && pe_occupation.trim() != "" && pe_income != null && pe_income.trim() != "") {
          // if ((mobile.trim()).length == 10) {
          $.ajax({
            url: "helper/moreSettingSubmit.php",
            type: "POST",
            dataType: "text",
            data: {
              pe_country: pe_country,
              pe_state: pe_state,
              pe_city: pe_city,
              pe_education: pe_education,
              pe_occupation: pe_occupation,
              pe_income: pe_income,
              pe_height: pe_height,
              pe_age: pe_age
            },
            success: function(response) {
              // peoplecards.innerHTML = response;
              console.log(response);
              dataFillingStatus += "s";
              alert("Your Details Are Updated Succesfully!");
            }
          });
          // } else {
          // alert("Please Enter A Valid Mobile No.!");
          // }
        } else {
          alert("Please Fill All Details!");
          // console.log(fname + " " + lname + " " + c_country + " " + mobile + " " + gender + " " + dob);
        }
      });
    });




    let pe_auth_token;
    $(document).ready(function() {
      $('#pe_country').click(function(e) {
        $.ajax({
          type: "get",
          url: "https://www.universal-tutorial.com/api/getaccesstoken",
          success: function(data) {
            pe_auth_token = data.auth_token;
            pe_getCountry(data.auth_token);
          },
          error: function(error) {
            console.log(error);
          },
          headers: {
            "Accept": "application/json",
            "api-token": "3H4soPbzTdy9fH61jpsQmhB3Sw5SZskYPVd3BOUWQXF23NEkS-rLtu0TLMcQ5b6VZms",
            "user-email": "mahajansangmeshwar024@gmail.com"
          }
        });
        e.preventDefault();
      });
    });
    $('#pe_country').change(function() {
      pe_getState();
    });
    $('#pe_state').change(function() {
      pe_getCity();
    });

    function pe_getCountry() {
      $.ajax({

        type: "get",
        url: "https://www.universal-tutorial.com/api/countries/",
        success: function(data) {
          data.forEach(element => {
            $('#pe_country').append('<option value="' + element.country_name + '">' + element.country_name + '</option>');
          });
          pe_getState(pe_auth_token);
        },
        error: function(error) {
          console.log(error);
        },
        headers: {
          "Authorization": "Bearer " + pe_auth_token,
          "Accept": "application/json"
        }
      });

    }

    function pe_getState() {
      var country_name = $('#pe_country').val();
      //var country_name = 'India';
      $.ajax({

        type: "get",
        url: "https://www.universal-tutorial.com/api/states/" + country_name,
        success: function(data) {
          //getCity(auth_token);
          $('#pe_state').empty();
          data.forEach(element => {
            $('#pe_state').append('<option value="' + element.state_name + '">' + element.state_name + '</option>');
          });
        },
        error: function(error) {
          console.log(error);
        },
        headers: {
          "Authorization": "Bearer " + pe_auth_token,
          "Accept": "application/json"
        }
      });
    }

    function pe_getCity() {
      var state_name = $('#pe_state').val();
      //var state_name = 'Goa';
      $.ajax({

        type: "get",
        url: "https://www.universal-tutorial.com/api/cities/" + state_name,
        success: function(data) {
          //console.log('ajax');
          $('#pe_city').empty();
          data.forEach(element => {
            $('#pe_city').append('<option value="' + element.city_name + '">' + element.city_name + '</option>');
          });
        },
        error: function(error) {
          console.log(error);
        },
        headers: {
          "Authorization": "Bearer " + pe_auth_token,
          "Accept": "application/json"
        }
      });
    }
  </script>

  <script>
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en',
        layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,
        includedLanguages: "en,hi,mr,te,kn"
      }, 'google_translate_element');
    }
  </script>
  <script>
    let choice = -1,
      i;
    let filterOption = document.getElementsByClassName("filterOption");
    // let filterOptionImg = document.getElementsByClassName("filterOptionImg");
    let settingOptionOut = document.getElementsByClassName("settingOptionOut");

    function filterChoice(choice) {
      for (i = 0; i < 5; i++) {
        if (i != choice) {
          filterOption[i].style.borderBottom = "none";
          filterOption[i].style.opacity = "70%";
          // filterOptionImg[i].style.backgroundColor = "rgba(0, 0, 0, 0.8)";
          settingOptionOut[i].style.display = "none";
        } else {
          filterOption[i].style.borderBottom = "0.2vw solid rgba(0, 0, 0, 0.8)";
          filterOption[i].style.opacity = "100%";
          // filterOptionImg[i].style.backgroundColor = "#200116";
          settingOptionOut[i].style.display = "flex";
        }
      }
    }

    window.onload = () => {
      filterChoice(1);
    };



    function togglePrivacySetting(i) {
      let privacySettingOptionButton = document.getElementsByClassName("privacySettingOptionButton");
      let privacySettingOptionButtonPart = document.getElementsByClassName("privacySettingOptionButtonPart");
      if (privacySettingOptionButton[i].style.justifyContent == "" || privacySettingOptionButton[i].style.justifyContent == "flex-start") {
        privacySettingOptionButton[i].style.justifyContent = "flex-end";
        privacySettingOptionButton[i].style.background = "rgb(67,4,39,0.4)";
        privacySettingOptionButtonPart[i].style.background = "rgb(67,4,39)";
      } else {
        privacySettingOptionButton[i].style.justifyContent = "flex-start";
        privacySettingOptionButton[i].style.background = "#e2e2e2b9";
        privacySettingOptionButtonPart[i].style.background = "#cfcfcf"
      }
    }
  </script>
  <!-- <script src="location.js"></script> -->
</body>

</html>