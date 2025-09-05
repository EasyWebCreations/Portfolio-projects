<?php
// session_start();
include_once "../../backend/connect.php";
?>

<?php

// echo '<script>
// var yourIDVar = eval(sessionStorage.getItem("yourID"));
// console.log(yourIDVar);
// </script>';

// echo '<script>console.log("Before Var");</script>';
// $yourID = "<script>document.writeln(yourIDVar);</script>";
// // echo '<script>console.log(' . $yourID . ');</script>';
// echo $yourID;
// // $yourID = 93704;
// if (isset($_POST['cardMore1'])) {
// $sql = mysqli_query($conn, "INSERT INTO views (viewed_to, viewed_by, on_time)
//   VALUES ({$_GET['passYourID']}, {$_SESSION['unique_id']}, NOW())");
// $myDataResult = mysqli_query($conn, "SELECT * FROM per_details WHERE id = {$_SESSION['unique_id']}");
// $myRow = mysqli_fetch_assoc($myDataResult);
$yourDataResult = mysqli_query($conn, "SELECT * FROM per_details WHERE id = {$_GET['passYourID']}");
$yourRow = mysqli_fetch_assoc($yourDataResult);
// $yourFirstName = $yourRow['fname'];
// $yourLastName = $yourRow['lname'];
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
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

    #reportsection {
      display: none;
      padding: 60px;
    }

    #reportsection h3 {
      margin-top: 20px;
    }

    #reportsection form {

      padding: 10px;
    }

    #reportsection form select {
      padding: 5px;
      height: 30px;
      margin: 20px 0px;
      width: 300px;
      font-size: 15px;
    }

    #reportsection form #preport {
      margin-left: 10px;
    }

    #reportsection form #blocksubmit {
      padding: 10px;
      background: red;
      color: white;
      border: none;
      outline: none;
      margin-top: 10px;
      width: 100px;
      font-size: 20px;
      border-radius: 10px;
    }

    #reportsection form #blocksubmit:hover {
      cursor: pointer;
      background: orangered;
    }
  </style>
  <!-- <link rel="stylesheet" href="wide.css"> -->
  <!-- <link rel="stylesheet" href="mobile.css"> -->
  <link rel="stylesheet" href="userProfileAdmin.css">
  <!-- <link rel="stylesheet" href="profileMobile.css"> -->
  <!-- <link rel="stylesheet" href="components/navBar.css"> -->
  <!-- <link rel="stylesheet" href="components/belowNav.css"> -->
  <!-- <link rel="stylesheet" href="components/sideBar.css"> -->
  <!-- <link rel="stylesheet" href="components/bottom.css"> -->
  <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

  <header class="navBar">
    <div class="navImgOut">
      <img src="../AkshadaLogo.png" class="navImg">
    </div>
    <div class="navBtnCont">
      <div id="google_translate_element"></div>
      <button class="navBtn">Home</button>
      <button class="navBtn">About Us</button>
      <button class="navBtn">Events</button>
      <button class="navBtn">Contact Us</button>
      <!-- <button class="navBtn">Youth</button> -->
    </div>
  </header>

  <div class="contentOut" id="peoplecards">
    <div class="content" id="content">
      <div class="profileContentTopOut" id="yourProfileTop">
        <!-- <div class="topleft"> -->
        <div class="ProfileImage">
          <img src="<?php echo $yourRow['profile_img'] ?>" class="sideBarTopImgContent" id="img">
        </div>
        <div class="ProfileTop">
          <div class="profileContentTop profileContentTop1">
            <img src="../user.svg" class="profileContentTopImg">
            <p class="profileContentTopText"><?php echo $yourRow['fname'] . " " . $yourRow['lname'] . ", " . $yourRow['age'] ?></p>
          </div>
          <div class="profileContentTop profileContentTop2">
            <img src="../location.svg" class="profileContentTopImg">
            <p class="profileContentTopText"><?php echo $yourRow['c_city'] . ", " . $yourRow['c_state'] ?></p>
          </div>
          <div class="profileContentTop profileContentTop2" style="margin-top: 1vw;">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-fill profileContentTopImg" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
            </svg>
            <p class="profileContentTopText"><?php echo $yourRow['mobile']; ?></p>
          </div>
        </div>
        <!-- </div> -->
      </div>
      <div class="profileContentTopOut">
        <div class="profileContentHeadOut">
          <div class="profileContentHead">
            <img src="../info.svg" class="profileContentHeadImg">
            <p class="profileContentHeadText">Profile Information</p>
          </div>
          <!-- <button class="profileContentHeadImgR" title="Edit" onclick="window.open('settings.php', target='_top')"></button> -->
        </div>
        <div class="profileContentOut">
          <div class="profileContent profileContentLeft">
            <div class="profileContentTop profileContentTop1">
              <img src="../events.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Birth Date:<?php echo " " . $yourRow['dob'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../building.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Occupation:<?php echo " " . $yourRow['occupation'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../drop.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Blood Group:<?php echo " " . $yourRow['blood'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Landmark:<?php echo " " . $yourRow['c_landmark'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">City:<?php echo " " . $yourRow['c_city'] ?></p>
            </div>
            <div class="profileContentTop">
              <img src="../location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">State:<?php echo " " . $yourRow['c_state'] ?></p>
            </div>
          </div>
          <div class="profileContent profileContentRight">
            <div class="profileContentTop profileContentTop1">
              <img src="../income.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Income(In Thousands Per Month):<?php echo " " . $yourRow['income'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../height.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Height(In cm): <?php echo " " . $yourRow['height'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../star.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Gotras:<?php echo " " . $yourRow['gotra1'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Locality:<?php echo " " . $yourRow['c_locality'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">District:<?php echo " " . $yourRow['c_district'] ?></p>
            </div>
            <div class="profileContentTop">
              <img src="../location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Pin Code:<?php echo " " . $yourRow['c_pincode'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="profileContentTopOut">
        <div class="profileContentHeadOut">
          <div class="profileContentHead">
            <img src="../aboutUs.svg" class="profileContentHeadImg">
            <p class="profileContentHeadText">Family Details</p>
          </div>
          <!-- <button class="profileContentHeadImgR" title="Edit" onclick="window.open('settings.php', target='_top')"></button> -->
        </div>
        <div class="profileContentOut">
          <div class="profileContent profileContentLeft">
            <div class="profileContentTop profileContentTop1">
              <img src="../female.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Mother Name:<?php echo " " . $yourRow['mother_name'] . " " . $yourRow['lname'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../building.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Mother Occupation:<?php echo " " . $yourRow['mother_occupation'] ?></p>
            </div>
            <div class="profileContentTop">
              <img src="../matches.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Siblings:<?php echo " " . $yourRow['siblings'] ?></p>
            </div>
          </div>
          <div class="profileContent profileContentRight">
            <div class="profileContentTop profileContentTop1">
              <img src="../male.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Father Name:<?php echo " " . $yourRow['mname'] . " " . $yourRow['lname'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../building.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Father Occupation:<?php echo " " . $yourRow['father_occupation'] ?></p>
            </div>
            <div class="profileContentTop">
              <img src="../income.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Family Income(In Thousands Per Month):<?php echo " " . $yourRow['family_income'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="profileContentTopOut">
        <div class="profileContentHeadOut">
          <div class="profileContentHead">
            <img src="../star.svg" class="profileContentHeadImg">
            <p class="profileContentHeadText">Birth & Zodiac</p>
          </div>
          <!-- <button class="profileContentHeadImgR" title="Edit" onclick="window.open('settings.php', target='_top')"></button> -->
        </div>
        <div class="profileContentOut">
          <div class="profileContent profileContentLeft">
            <div class="profileContentTop profileContentTop1">
              <img src="../star.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Janma Tithi:<?php echo " " . $yourRow['janma_tithi'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../clock.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Birth Time:<?php echo " " . $yourRow['birth_time'] ?></p>
            </div>
            <div class="profileContentTop">
              <img src="../location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Birth Place:<?php echo " " . $yourRow['birth_place'] ?></p>
            </div>
          </div>
          <div class="profileContent profileContentRight">
            <div class="profileContentTop profileContentTop1">
              <img src="../star.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Zodiac/Rashi:<?php echo " " . $yourRow['zodiac'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../star.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Gotras:<?php echo " " . $yourRow['gotra1'] ?></p>
            </div>
            <div class="profileContentTop">
              <img src="../user.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Birth Name:<?php echo " " . $yourRow['birth_name'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <button class="profileGoBack" onclick="window.open('adminPanel.php', target='_top')">
        Back
      </button>
    </div>

    <div id="reportsection">
      <div>
        <div class="sideBarTextImgOut">
          <input type="checkbox" name="check" id="reportCheck" hidden>
          <label for="reportCheck" onclick="reportCheckfun()">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z" />
            </svg><a class="sideBarText" id="sideBarText3">Cancel to Block?</a></label>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="red" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
      </svg>
      <h1>Report User</h1>
      <div class="reportdetails">
        <h3>
          If you block any user then, he/him is not able to seen your profile. And the this report will be sent to admin panel to take action!
        </h3><br><br>

        <div class="reportForm">
          <h3>
            Caution! you are blocking to <?php echo $yourRow['fname'] . " " . $yourRow['lname']; ?>
          </h3><br><br>
          <form action="block/blockuser.php" method="post">
            <input type="text" name="blockTo" value="<?php echo $yourRow['id']; ?>" hidden>
            <select name="blockreason" id="blockreason">
              <option value="suspicious">Suspicious behaviour</option>
              <option value="other" default>Other</option>
            </select><br>
            <div style="display:flex;">
              <input type="checkbox" name="recheck" id="recheck" required>
              <p id="preport"> Are you sure to block user? </p>
            </div>
            <input type="submit" id="blocksubmit" value="Block">
          </form>
        </div>

      </div>
    </div>
  </div>

  <footer class="bottom">
    <p class="copyright">Copyright &#169; 2021 Social. All Rights Reserved</p>
    <div class="bottomOptionsOut">
      <a href="#" class="bottomOptions bottomOptions1">About Us</a>
      <a href="#" class="bottomOptions bottomOptions2">Terms</a>
      <a href="#" class="bottomOptions bottomOptions3">Privacy policy</a>
      <a href="#" class="bottomOptions bottomOptions4">Contact</a>
      <a href="#" class="bottomOptions bottomOptions5">Language</a>
    </div>
  </footer>

  <iframe name="frame" style="display: none;"></iframe>

  <script>
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en',
        layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,
        includedLanguages: "en,hi,mr,te,kn"
      }, 'google_translate_element');
    }
  </script>
</body>

</html>