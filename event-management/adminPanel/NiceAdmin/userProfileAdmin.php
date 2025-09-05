<?php
// session_start();
include_once "../../connect.php";
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
$yourDataResult = mysqli_query($conn, "SELECT * FROM users WHERE id = {$_GET['passYourID']}");
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

  <!-- <header class="navBar">
    <div class="navImgOut">
      <img src="../../images/AkshadaLogo.png" class="navImg">
    </div>
    <div class="navBtnCont">
      <div id="google_translate_element"></div>
      <button class="navBtn">Home</button>
      <button class="navBtn">About Us</button>
      <button class="navBtn">Events</button>
      <button class="navBtn">Contact Us</button>
    </div>
  </header> -->

  <div class="navBar">
    <div class="navImgOut" onclick="window.open('../../index.php', target='_top')">
      <img src="../../assets/images/logo.png" class="navImg">
    </div>
    <div class="navImgOut" style="margin-right: 2%;">
      <img src="../../images/youthLogo.png" class="navImg">
    </div>
  </div>

  <div class="contentOut" id="peoplecards">
    <div class="content" id="content">
      <div class="profileContentTopOut" id="yourProfileTop">
        <!-- <div class="topleft"> -->
        <div class="ProfileImage">
          <img src="<?php echo $yourRow['biodata'] ?>" class="sideBarTopImgContent" id="img">
        </div>
        <div class="ProfileTop">
          <div class="profileContentTop profileContentTop1">
            <img src="../../images/user.svg" class="profileContentTopImg">
            <p class="profileContentTopText"><?php echo $yourRow['firstname'] . " " . $yourRow['lastname'] ?></p>
          </div>
          <div class="profileContentTop profileContentTop1">
            <img src="../../images/user.svg" class="profileContentTopImg">
            <p class="profileContentTopText"><?php echo $yourRow['id'] ?></p>
          </div>
          <div class="profileContentTop profileContentTop2">
            <img src="../../images/location.svg" class="profileContentTopImg">
            <p class="profileContentTopText"><?php echo $yourRow['permentantAddress'] ?></p>
          </div>
          <div class="profileContentTop profileContentTop2" style="margin-top: 1vw;">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-fill profileContentTopImg" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
            </svg>
            <p class="profileContentTopText"><?php echo $yourRow['contactnumber']; ?></p>
          </div>
        </div>
        <!-- </div> -->
      </div>
      <div class="profileContentTopOut">
        <div class="profileContentHeadOut">
          <div class="profileContentHead">
            <img src="../../images/info.svg" class="profileContentHeadImg">
            <p class="profileContentHeadText">Profile Information</p>
          </div>
          <!-- <button class="profileContentHeadImgR" title="Edit" onclick="window.open('settings.php', target='_top')"></button> -->
        </div>
        <div class="profileContentOut">
          <div class="profileContent profileContentLeft">
            <div class="profileContentTop profileContentTop1">
              <img src="../../images/events.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Birth Date:<?php echo " " . $yourRow['DOB'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../../images/location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Education:<?php echo " " . $yourRow['education'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../../images/building.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Profession:<?php echo " " . $yourRow['profession'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../../images/drop.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Blood Group:<?php echo " " . $yourRow['bloodgroup'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../../images/location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Email:<?php echo " " . $yourRow['email'] ?></p>
            </div>
            <div class="profileContentTop">
              <img src="../../images/location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Whatsapp No.:<?php echo " " . $yourRow['whatsappnumber'] ?></p>
            </div>
          </div>
          <div class="profileContent profileContentRight">
            <div class="profileContentTop profileContentTop1">
              <img src="../../images/income.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Gender:<?php echo " " . $yourRow['gender'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../../images/height.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Birth Name: <?php echo " " . $yourRow['birthname'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../../images/star.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">First Gotram:<?php echo " " . $yourRow['firstGotram'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../../images/location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Second Gotram:<?php echo " " . $yourRow['secondGotram'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../../images/location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Partner's Expected Education:<?php echo " " . $yourRow['partnerEdu'] ?></p>
            </div>
            <div class="profileContentTop">
              <img src="../../images/location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Partner's Expected Profession:<?php echo " " . $yourRow['partnerExpect'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="profileContentTopOut">
        <div class="profileContentHeadOut">
          <div class="profileContentHead">
            <img src="../../images/aboutUs.svg" class="profileContentHeadImg">
            <p class="profileContentHeadText">Other Details</p>
          </div>
          <!-- <button class="profileContentHeadImgR" title="Edit" onclick="window.open('settings.php', target='_top')"></button> -->
        </div>
        <div class="profileContentOut">
          <div class="profileContent profileContentLeft">
            <div class="profileContentTop profileContentTop1">
              <img src="../../images/female.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">No. of Vaccine Doses Done:<?php echo " " . $yourRow['candidateNVD'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../../images/building.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Total Candidate Amount:<?php echo " " . $yourRow['candidateAmount'] ?></p>
            </div>
          </div>
          <div class="profileContent profileContentRight">
            <div class="profileContentTop profileContentTop1">
              <img src="../../images/building.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">No. of non parent attendees:<?php echo " " . $yourRow['NoParent'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="../../images/building.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Total Parent/Relative Amount:<?php echo " " . $yourRow['parentAmount'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <button class="profileGoBack" onclick="window.open('index.php', target='_top')">
        Back
      </button>
    </div>
  </div>


  <!-- <footer class="bottom">
    <p class="copyright">Copyright &#169; 2021 Social. All Rights Reserved</p>
    <div class="bottomOptionsOut">
      <a href="#" class="bottomOptions bottomOptions1">About Us</a>
      <a href="#" class="bottomOptions bottomOptions2">Terms</a>
      <a href="#" class="bottomOptions bottomOptions3">Privacy policy</a>
      <a href="#" class="bottomOptions bottomOptions4">Contact</a>
      <a href="#" class="bottomOptions bottomOptions5">Language</a>
    </div>
  </footer> -->

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