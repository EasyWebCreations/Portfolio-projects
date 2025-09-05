<?php
session_start();
include_once "../backend/connect.php";
if (!isset($_SESSION['unique_id'])) {
  header("location: ../index.php");
  // echo "false";
}
header('Access-Control-Allow-Origin: *');
// $result = mysqli_query($conn, "SELECT * FROM per_details WHERE id = {$_SESSION['unique_id']}");
// $row = mysqli_fetch_assoc($result);
// $pathForCache = "../";
// $pathForLikedCache = "../../";
include_once("helper/currentUserQuery.php");

$nullVals = count(array_filter($row, function ($n) {
  return $n === null;
}));

$emptyVals = count(array_filter($row, function ($n) {
  return $n === "";
}));

$extraNulLYN = 0;
if ($row['mobile_visibility'] === null or $row['mobile_visibility'] === "") {
  $extraNulLYN = 1;
}
$nullCol = $nullVals + $emptyVals + ($row['profile_img'] === "https://testing-aws-php.s3.ap-south-1.amazonaws.com/logoimages/profileImg.png") - $extraNulLYN;
$totalCol = count($row) - 1;
// $profileComPer = 100 - ($nullCol * 100 / $totalCol);
$profileComPer = round(100 - ($nullCol * 100 / $totalCol), 2);
$profileComMsg;
if ($profileComPer < 50) {
  $profileComMsg = "Complete Your Profile";
} else {
  $profileComMsg = "Profile: " . $profileComPer . "%";
}
$_SESSION['profileComPer'] = $profileComPer;
$_SESSION['profileComMsg'] = $profileComMsg;
?>

<?php
if (isset($_POST['cardMore2'])) {
  $query = "SELECT * from likes where liked_by={$_POST['liked_by']} and liked_to={$_POST['liked_to']}";
  $likeResult = mysqli_query($conn, $query);

  if (mysqli_num_rows($likeResult) > 0) {
    $checkLiked = mysqli_query($conn, "DELETE FROM likes WHERE liked_by={$_POST['liked_by']} and liked_to={$_POST['liked_to']}");
    // echo "like deleted";
    // if ($checkLiked) {
    //   echo '<script>alert("Like deleted");</script>';
    // }
  } else {
    $query = "SELECT * from dislikes where disliked_by={$_POST['liked_by']} and disliked_to={$_POST['liked_to']}";
    $dislikeResult = mysqli_query($conn, $query);

    if (mysqli_num_rows($dislikeResult) > 0) {
      mysqli_query($conn, "DELETE FROM dislikes WHERE disliked_by={$_POST['liked_by']} and disliked_to={$_POST['liked_to']}");
      // echo "dislike deleted";
    }


    $query = "SELECT * from report where reported_by={$_POST['liked_by']} and reported_to={$_POST['liked_to']}";
    $reportResult = mysqli_query($conn, $query);

    if (mysqli_num_rows($reportResult) > 0) {
      mysqli_query($conn, "DELETE FROM report WHERE reported_by={$_POST['liked_by']} and reported_to={$_POST['liked_to']}");
      // echo "report deleted";
    }


    $query = "INSERT INTO likes (liked_by, liked_to) VALUES(?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $_POST['liked_by'], $_POST['liked_to']);
    $checkLiked = $stmt->execute();
    // echo "like done";
    // if ($checkLiked) {
    //   echo '<script>alert("Like Added");</script>';
    // }
  }
} else if (isset($_POST['cardMore3'])) {
  $query = "SELECT * from dislikes where disliked_by={$_POST['liked_by']} and disliked_to={$_POST['liked_to']}";
  $dislikeResult = mysqli_query($conn, $query);

  if (mysqli_num_rows($dislikeResult) > 0) {
    mysqli_query($conn, "DELETE FROM dislikes WHERE disliked_by={$_POST['liked_by']} and disliked_to={$_POST['liked_to']}");
    // echo "dislike deleted";
  } else {
    $query = "SELECT * from likes where liked_by={$_POST['liked_by']} and liked_to={$_POST['liked_to']}";
    $likeResult = mysqli_query($conn, $query);

    if (mysqli_num_rows($likeResult) > 0) {
      mysqli_query($conn, "DELETE FROM likes WHERE liked_by={$_POST['liked_by']} and liked_to={$_POST['liked_to']}");
      // echo "like deleted";
    }
    $query = "INSERT INTO dislikes (disliked_by, disliked_to) VALUES(?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $_POST['liked_by'], $_POST['liked_to']);
    $stmt->execute();
    // echo "dislike done";
    // echo '<script>alert("Dislike Added");</script>';
  }
} else if (isset($_POST['cardMore4'])) {
  echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>';
  $query = "SELECT * from report where reported_by={$_POST['liked_by']} and reported_to={$_POST['liked_to']}";
  $reportResult = mysqli_query($conn, $query);

  if (mysqli_num_rows($reportResult) > 0) {
    mysqli_query($conn, "DELETE FROM report WHERE reported_by={$_POST['liked_by']} and reported_to={$_POST['liked_to']}");
    // echo "report deleted";
  } else {
    echo '<script type="text/javascript">
        $(document).ready(function() {
          var report_reason = prompt("Why Do You Want To Block/Report This User?", "");
          if (report_reason === null) {
            report_reason = "";
          }
          $.ajax({
            url: "helper/report.php",
            type: "POST",
            dataType: "text",
            data: {
              liked_by: ' . $_POST['liked_by'] . ',
              liked_to: ' . $_POST['liked_to'] . ',
              report_reason: report_reason,
              report_decision: "Pending"
            },
            success: function(response) {
              console.log(response);
            }
          });
        });
      </script>';
    // echo "Flag done";
    // echo '<script>alert("Report Added");</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>Akshadaa</title>
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
    a,
    select {
      -webkit-tap-highlight-color: transparent;
    }

    .goog-te-banner-frame.skiptranslate {
      display: none !important;
    }

    body {
      top: 0px !important;
    }
  </style>
  <link rel="stylesheet" href="wide.css">
  <link rel="stylesheet" href="mobile.css">
  <link rel="stylesheet" href="components/navBar.css">
  <link rel="stylesheet" href="components/belowNav.css">
  <link rel="stylesheet" href="components/sideBar.css">
  <link rel="stylesheet" href="components/bottom.css">
  <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
  <style>
    .rowForUploadImg {
      /* border: 1px solid red; */
      /* margin-top: 0.5vw; */
      /* background: aqua; */
      background: white;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: center;
      visibility: hidden;
      position: fixed;
      top: 1vh;
      left: 1vw;
      z-index: 5;
      /* height: 98vh;
      width: 98vw; */
      height: 0vh;
      width: 0vw;
      max-height: 98vh;
      overflow-y: scroll;
      border-radius: 1vw;
      box-shadow: 0.1vw 0.1vw 0.7vw rgb(0, 0, 0, 0.3);
      /* display: none; */
    }
    .bottom {
display:none;
    }
    #upload-demo {
      /* border: 1px solid blue; */
      display: inline-block;
      margin-top: 0.5vw;
      position: relative;
      height: 555px;
      /* width: 50vw; */
    }

    .uploadImgOpt {
      /* border: 1px solid blue; */
      display: flex;
      flex-direction: row;
      /* justify-content: space-evenly; */
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      margin-bottom: 0.5vw;
      position: relative;
      padding: 5px;
    }
.bottom{
  bottom:0;
}
    .uploadBoxBtns {
      color: white;
      outline: none;
      border: 0.1vw solid transparent;
      padding: 0.5vw;
      font-size: 1.2vw;
      border-radius: 0.3vw;
    }

    .uploadBoxBtns:hover {
      background: white;
      color: black;
      border: 0.1vw solid black;
    }

    .uploadBoxBtns:active {
      filter: blur(0.1vw);
    }

    .uploadImgBtn {
      background: #28A745;
      margin: 10px 0px;
      /* background: red; */
      color: white;
      border-radius: 4px;
      border: none;
      font-weight: bold;
      padding: 5px;
    }

    .closeUpload {
      /* position: absolute;
      top: 1vw;
      right: 1vw; */
      background: green;
      margin: 10px 0px;
      /* background: red; */
      color: white;
      border-radius: 4px;
      border: none;
      font-weight: bold;
      padding: 5px;
    }
  </style>
</head>

<body>
  <div class="rowForUploadImg">
    <div id="upload-demo" style="position: relative;"></div>
    <div class="uploadImgOpt">
      <strong>Select Image:</strong>
      <br />
      <input type="file" id="upload">
      <br />
      <button class="uploadImgBtn">Upload Image</button>
    </div>
    <button type="button" class="closeUpload" onclick="clickDetect()">Save</button>
  </div>

  <?php include_once("components/sideBar.php"); ?>

  <?php include_once("components/navBar.php"); ?>

  <?php include_once("components/belowNav.php"); ?>

  <!-- <?php //include_once("components/bottom.php"); ?> -->

  <div class="contentOut">

    <div class="content" id="profiles">
      <div class="filterBarOut">
        <div class="filterBar" id="filter">
          <p class="filterText1 filterText">Use Filters For Better options</p>
          <div class="filterBarRightOut">
            <p class="filterText2 filterText">Apply Filters</p>
            <div class="filterImgBack">
              <button class="filterImg" onclick="filterFunction()" title="Filters"></button>
            </div>
          </div>
        </div>
      </div>
      <div id="filterissue">
        <div id="filterOpen">
          <div class="filterOptionOut">
            <button class="filterOption filterOption1" onclick="filterChoice(0)">
              <div class="filterOptionImg filterOptionImg1"></div>
              <p class="filterOptionText filterOptionText1">
                Basic
              </p>
            </button>
            <button class="filterOption filterOption2" onclick="filterChoice(1)">
              <div class="filterOptionImg filterOptionImg2"></div>
              <p class="filterOptionText filterOptionText2">
                Profession
              </p>
            </button>
            <button class="filterOption filterOption3" onclick="filterChoice(2)">
              <div class="filterOptionImg filterOptionImg3"></div>
              <p class="filterOptionText filterOptionText3">
                Background
              </p>
            </button>
            <button class="filterOption filterOption4" onclick="filterChoice(3)">
              <div class="filterOptionImg filterOptionImg4"></div>
              <p class="filterOptionText filterOptionText4">
                Location
              </p>
            </button>
            <button class="filterOption filterOption5" onclick="filterChoice(4)">
              <div class="filterOptionImg filterOptionImg5"></div>
              <p class="filterOptionText filterOptionText5">
                More
              </p>
            </button>
          </div>
          <form method="POST" target="frame" class="filterForm">
            <div class="filterOptionDetailsOut">
              <div class="filterOptionDetails filterOptionDetails1">
                <div class="genderOut basicOptionsOut">
                  <p class="basicOptionsHeading">GENDER</p>
                  <!--span><input type="radio" id="male" name="gender" class="gender gender1" value="male"><label for="male">Male</label><br></span>
                <span><input type="radio" id="female" name="gender" class="gender gender2" value="female"><label for="female">Female</label><br></span>
                <span><input type="radio" id="other" name="gender" class="gender gender3" value="other"><label for="other">Other</label></span-->
                  <select name="gender" id="gender" class="selectLanguage">
                    <option value="">Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                  </select>



                </div>
                <div class="basicOptionsOut">
                  <p class="basicOptionsHeading">AGES</p>
                  <div>
                    <select name="minage" id="minAge" class="selectAge" onclick="ageOptions(0)">
                      <option value="">Min. Age</option>
                    </select>
                    <select name="maxage" id="maxAge" class="selectAge" onclick="ageOptions(1)">
                      <option value="">Max. Age</option>
                    </select>
                  </div>
                </div>
                <div class="basicOptionsOut">
                  <p class="basicOptionsHeading">Height (Tentative)</p>
                  <div class="rangeValueOut">
                    <select name="height" id="height" class="selectHeight" onclick="HeightOptions(0)">
                      <option value="">Height</option>
                    </select>
                  </div>
                  <!--input class="rangeSlider" name="height" type="range" value="0" min="0" max="272" onmousemove="rangeSlider(this.value)" onchange="rangeSlider(this.value)"-->
                </div>
              </div>
              <div class="filterOptionDetails filterOptionDetails2">
                <div class="looksOptionsOut">
                  <p class="basicOptionsHeading">Qualification</p>
                  <div>
                    <select name="qualification" id="qualification" class="selectAge">
                      <option value="">Qualification</option>
                      <option value="ssc">SSC</option>
                      <option value="hsc">HSC</option>
                      <option value="diploma">Diploma</option>
                      <option value="degree">Degree(Arts or Commerce)</option>
                      <option value="ug">Under Graduation</option>
                      <option value="pg">Post Graduation</option>
                      <option value="phd">PhD</option>
                    </select>
                  </div>
                </div>
                <div class="looksOptionsOut">
                  <p class="basicOptionsHeading">Work Type</p>
                  <div>
                    <select name="worktype" id="worktype" class="selectAge">
                      <option value="">Work Type</option>
                      <option value="job">Job</option>
                      <option value="buissiness">Buisiness</option>
                      <option value="company">Company(own)</option>
                    </select>
                  </div>
                </div>
                <div class="looksOptionsOut">
                  <p class="basicOptionsHeading">Salary</p>
                  <div>
                    <select name="salary" id="salary" class="selectAge">
                      <option value="">Salary</option>
                      <option value="1">1L Rs.</option>
                      <option value="5">5L Rs.</option>
                      <option value="15">15L Rs.</option>
                      <option value="30">30L Rs.</option>
                      <option value="50">50L Rs.</option>
                      <option value="70">70L Rs.</option>
                      <option value="71">71L Rs. and above</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="filterOptionDetails filterOptionDetails3">
                <div class="backgroundOptionsOut backgroundOptionsOut1">
                  <p class="basicOptionsHeading">LANGUAGE</p>
                  <select name="language" id="language" class="selectLanguage">
                    <option value="">Language</option>

                    <option value="bengali">Bengali</option>
                    <option value="english">English</option>
                    <option value="gujarati">Gujarati</option>
                    <option value="hindi">Hindi</option>
                    <option value="kannadaa">Kannada</option>
                    <option value="marathi">Marathi</option>
                    <option value="punjabi">Punjabi</option>
                    <option value="tamil">Tamil</option>
                    <option value="telugu">Telugu</option>
                    <option value="urdu">Urdu</option>

                  </select>
                </div>
                <div class="backgroundOptionsOut backgroundOptionsOut2">
                  <a class="backgroundDetailsRightSide">First Gotram <br>
                    <select name="gotra1" id="gotra1" class="selectLanguage">
                      <option value="">First Gotram</option>
                      <option value='Aankul'>Aankul</option><option value='Abhimanchkul'>Abhimanchkul</option><option value='Abhimankul'>Abhimankul</option><option value='Abhimanyukul'>Abhimanyukul</option><option value='Akumanchal'>Akumanchal</option><option value='Anantkul'>Anantkul</option><option value='Ankul'>Ankul</option><option value='Antakul'>Antakul</option><option value='Ayankul'>Ayankul</option><option value='Balshishta'>Balshishta</option><option value='Balshatal'>Balshatal</option><option value='Bhanukul'>Bhanukul</option><option value='Bibshatla'>Bibshatla</option><option value='Bomadshatla'>Bomadshatla</option><option value='Budhankul'>Budhankul</option><option value='Chandkul'>Chandkul</option><option value='Chandrakul'>Chandrakul</option><option value='Chandrashil'>Chandrashil</option><option value='Chidrupkul'>Chidrupkul</option><option value='Chilkul'>Chilkul</option><option value='Chilshil'>Chilshil</option><option value='Chinnakul'>Chinnakul</option><option value='Chitrapil'>Chitrapil</option><option value='Chennakul'>Chennakul</option><option value='Channakul'>Channakul</option><option value='Deokul'>Deokul</option><option value='Deoshatla'>Deoshatla</option><option value='Deoshetti'>Deoshetti</option><option value='Devshishta'>Devshishta</option><option value='Deshatla'>Deshatla</option><option value='Dhankul'>Dhankul</option><option value='Dhanshil'>Dhanshil</option><option value='Dikshkul'>Dikshkul</option><option value='Ebhrashatla'>Ebhrashatla</option><option value='Ebishatla'>Ebishatla</option><option value='Ekshakul'>Ekshakul</option><option value='Enkol'>Enkol</option><option value='Enkul'>Enkul</option><option value='Ennakul'>Ennakul</option><option value='Eshashishta'>Eshashishta</option><option value='Eshpal'>Eshpal</option><option value='Eshwakul'>Eshwakul</option><option value='Gandheshwar'>Gandheshwar</option><option value='Ganshatla'>Ganshatla</option><option value='Gaurshatla'>Gaurshatla</option><option value='Gondakulla'>Gondakulla</option><option value='Gondkul'>Gondkul</option><option value='Gontakul'>Gontakul</option><option value='Gunai'>Gunai</option><option value='Gundkul'>Gundkul</option><option value='Guntkul'>Guntkul</option><option value='Gandheshil'>Gandheshil</option><option value='Janukul'>Janukul</option><option value='Jenchkul'>Jenchkul</option><option value='Khushal'>Khushal</option><option value='Komarshatla'>Komarshatla</option><option value='Kumshatla'>Kumshatla</option><option value='Madankul'>Madankul</option><option value='Malshet'>Malshet</option><option value='Mandkul'>Mandkul</option><option value='Mankul'>Mankul</option><option value='Masantkul'>Masantkul</option><option value='Minkul'>Minkul</option><option value='Mithunkul'>Mithunkul</option><option value='Molukul'>Molukul</option><option value='Moonkul'>Moonkul</option><option value='Morkul'>Morkul</option><option value='Mulkul'>Mulkul</option><option value='Munikul'>Munikul</option><option value='Murkul'>Murkul</option><option value='Munjikula'>Munjikula</option><option value='Nabhilkul'>Nabhilkul</option><option value='Nabhilla'>Nabhilla</option><option value='Narali'>Narali</option><option value='Navshil'>Navshil</option><option value='Pabhal'>Pabhal</option><option value='Prabhal'>Prabhal</option><option value='Padgeshil'>Padgeshil</option><option value='Padgeshwar'>Padgeshwar</option><option value='Padmashatla'>Padmashatla</option><option value='Padmashil'>Padmashil</option><option value='Padmashishta'>Padmashishta</option><option value='Pagadikul'>Pagadikul</option><option value='Paidikul'>Paidikul</option><option value='Paidkul'>Paidkul</option><option value='Paitkul'>Paitkul</option><option value='Panaskul'>Panaskul</option><option value='Panchkul'>Panchkul</option><option value='Panshil'>Panshil</option><option value='Pansul'>Pansul</option><option value='Parashar'>Parashar</option><option value='Paulshishta'>Paulshishta</option><option value='Pawanshil'>Pawanshil</option><option value='Pendakul'>Pendakul</option><option value='Pendalkul'>Pendalkul</option><option value='Pendlikul'>Pendlikul</option><option value='Penlikul'>Penlikul</option><option value='Pennakul'>Pennakul</option><option value='Polishatla'>Polishatla</option><option value='Polshatla'>Polshatla</option><option value='Pongeshil'>Pongeshil</option><option value='Puchhakul'>Puchhakul</option><option value='Pulashatla'>Pulashatla</option><option value='Pulkul'>Pulkul</option><option value='Pulshetal'>Pulshetal</option><option value='Punavshil'>Punavshil</option><option value='Pungeshil'>Pungeshil</option><option value='Pungwshwar'>Pungwshwar</option><option value='Punjashil'>Punjashil</option><option value='Punyashil'>Punyashil</option><option value='Punyeshwar'>Punyeshwar</option><option value='Pushpal'>Pushpal</option><option value='Perushatla'>Perushatla</option><option value='Parishatla'>Parishatla</option><option value='Punsakul'>Punsakul</option><option value='Rankul'>Rankul</option><option value='Rantkul'>Rantkul</option><option value='Rentkul'>Rentkul</option><option value='Runtakul'>Runtakul</option><option value='Renukul'>Renukul</option><option value='Rontakul'>Rontakul</option><option value='Sankul'>Sankul</option><option value='Senshatla'>Senshatla</option><option value='Shaigol'>Shaigol</option><option value='Shaivgol'>Shaivgol</option><option value='Shankul'>Shankul</option><option value='Shayankul'>Shayankul</option><option value='Sheelkul'>Sheelkul</option><option value='Shirsal'>Shirsal</option><option value='Shirshatla'>Shirshatla</option><option value='Shrinikul'>Shrinikul</option><option value='Shrishal'>Shrishal</option><option value='Shrishatla'>Shrishatla</option><option value='Shrisheel'>Shrisheel</option><option value='Shrishishta'>Shrishishta</option><option value='Shrishreshta'>Shrishreshta</option><option value='Sirsal'>Sirsal</option><option value='Sirshatla'>Sirshatla</option><option value='Sudarshan'>Sudarshan</option><option value='Surkul'>Surkul</option><option value='Sursal'>Sursal</option><option value='Suryakul'>Suryakul</option><option value='Susal'>Susal</option><option value='Totkul'>Totkul</option><option value='Tulshishta'>Tulshishta</option><option value='Tulshitla'>Tulshitla</option><option value='Tulashatla'>Tulashatla</option><option value='Upankul'>Upankul</option><option value='Utkul'>Utkul</option><option value='Utkalkul'>Utkalkul</option><option value='Vachhakul'>Vachhakul</option><option value='Vastrakul'>Vastrakul</option><option value='Vatsakul'>Vatsakul</option><option value='Vinukul'>Vinukul</option><option value='Viparishatla'>Viparishatla</option><option value='Viparishishta'>Viparishishta</option><option value='Viprashatla'>Viprashatla</option><option value='Vishnukul'>Vishnukul</option><option value='Vishwakul'>Vishwakul</option><option value='Vishwapal'>Vishwapal</option><option value='Vikramshishta'>Vikramshishta</option><option value='Vikramshil'>Vikramshil</option><option value='Yalkul'>Yalkul</option><option value='Yalshat'>Yalshat</option><option value='Yalshatla'>Yalshatla</option><option value='Yalshatti'>Yalshatti</option><option value='Yalshishta'>Yalshishta</option><option value='Yankul'>Yankul</option><option value='Yannukul'>Yannukul</option><option value='Yenkul'>Yenkul</option><option value='Yetakul'>Yetakul</option>
                    </select>
                  </a>
                  <a class="backgroundDetailsRightSide">Second Gotram <br>
                    <select name="gotra2" id="gotra2" class="selectLanguage">
                      <option value="">Second Gotram</option>
                      <option value='Aankul'>Aankul</option><option value='Abhimanchkul'>Abhimanchkul</option><option value='Abhimankul'>Abhimankul</option><option value='Abhimanyukul'>Abhimanyukul</option><option value='Akumanchal'>Akumanchal</option><option value='Anantkul'>Anantkul</option><option value='Ankul'>Ankul</option><option value='Antakul'>Antakul</option><option value='Ayankul'>Ayankul</option><option value='Balshishta'>Balshishta</option><option value='Balshatal'>Balshatal</option><option value='Bhanukul'>Bhanukul</option><option value='Bibshatla'>Bibshatla</option><option value='Bomadshatla'>Bomadshatla</option><option value='Budhankul'>Budhankul</option><option value='Chandkul'>Chandkul</option><option value='Chandrakul'>Chandrakul</option><option value='Chandrashil'>Chandrashil</option><option value='Chidrupkul'>Chidrupkul</option><option value='Chilkul'>Chilkul</option><option value='Chilshil'>Chilshil</option><option value='Chinnakul'>Chinnakul</option><option value='Chitrapil'>Chitrapil</option><option value='Chennakul'>Chennakul</option><option value='Channakul'>Channakul</option><option value='Deokul'>Deokul</option><option value='Deoshatla'>Deoshatla</option><option value='Deoshetti'>Deoshetti</option><option value='Devshishta'>Devshishta</option><option value='Deshatla'>Deshatla</option><option value='Dhankul'>Dhankul</option><option value='Dhanshil'>Dhanshil</option><option value='Dikshkul'>Dikshkul</option><option value='Ebhrashatla'>Ebhrashatla</option><option value='Ebishatla'>Ebishatla</option><option value='Ekshakul'>Ekshakul</option><option value='Enkol'>Enkol</option><option value='Enkul'>Enkul</option><option value='Ennakul'>Ennakul</option><option value='Eshashishta'>Eshashishta</option><option value='Eshpal'>Eshpal</option><option value='Eshwakul'>Eshwakul</option><option value='Gandheshwar'>Gandheshwar</option><option value='Ganshatla'>Ganshatla</option><option value='Gaurshatla'>Gaurshatla</option><option value='Gondakulla'>Gondakulla</option><option value='Gondkul'>Gondkul</option><option value='Gontakul'>Gontakul</option><option value='Gunai'>Gunai</option><option value='Gundkul'>Gundkul</option><option value='Guntkul'>Guntkul</option><option value='Gandheshil'>Gandheshil</option><option value='Janukul'>Janukul</option><option value='Jenchkul'>Jenchkul</option><option value='Khushal'>Khushal</option><option value='Komarshatla'>Komarshatla</option><option value='Kumshatla'>Kumshatla</option><option value='Madankul'>Madankul</option><option value='Malshet'>Malshet</option><option value='Mandkul'>Mandkul</option><option value='Mankul'>Mankul</option><option value='Masantkul'>Masantkul</option><option value='Minkul'>Minkul</option><option value='Mithunkul'>Mithunkul</option><option value='Molukul'>Molukul</option><option value='Moonkul'>Moonkul</option><option value='Morkul'>Morkul</option><option value='Mulkul'>Mulkul</option><option value='Munikul'>Munikul</option><option value='Murkul'>Murkul</option><option value='Munjikula'>Munjikula</option><option value='Nabhilkul'>Nabhilkul</option><option value='Nabhilla'>Nabhilla</option><option value='Narali'>Narali</option><option value='Navshil'>Navshil</option><option value='Pabhal'>Pabhal</option><option value='Prabhal'>Prabhal</option><option value='Padgeshil'>Padgeshil</option><option value='Padgeshwar'>Padgeshwar</option><option value='Padmashatla'>Padmashatla</option><option value='Padmashil'>Padmashil</option><option value='Padmashishta'>Padmashishta</option><option value='Pagadikul'>Pagadikul</option><option value='Paidikul'>Paidikul</option><option value='Paidkul'>Paidkul</option><option value='Paitkul'>Paitkul</option><option value='Panaskul'>Panaskul</option><option value='Panchkul'>Panchkul</option><option value='Panshil'>Panshil</option><option value='Pansul'>Pansul</option><option value='Parashar'>Parashar</option><option value='Paulshishta'>Paulshishta</option><option value='Pawanshil'>Pawanshil</option><option value='Pendakul'>Pendakul</option><option value='Pendalkul'>Pendalkul</option><option value='Pendlikul'>Pendlikul</option><option value='Penlikul'>Penlikul</option><option value='Pennakul'>Pennakul</option><option value='Polishatla'>Polishatla</option><option value='Polshatla'>Polshatla</option><option value='Pongeshil'>Pongeshil</option><option value='Puchhakul'>Puchhakul</option><option value='Pulashatla'>Pulashatla</option><option value='Pulkul'>Pulkul</option><option value='Pulshetal'>Pulshetal</option><option value='Punavshil'>Punavshil</option><option value='Pungeshil'>Pungeshil</option><option value='Pungwshwar'>Pungwshwar</option><option value='Punjashil'>Punjashil</option><option value='Punyashil'>Punyashil</option><option value='Punyeshwar'>Punyeshwar</option><option value='Pushpal'>Pushpal</option><option value='Perushatla'>Perushatla</option><option value='Parishatla'>Parishatla</option><option value='Punsakul'>Punsakul</option><option value='Rankul'>Rankul</option><option value='Rantkul'>Rantkul</option><option value='Rentkul'>Rentkul</option><option value='Runtakul'>Runtakul</option><option value='Renukul'>Renukul</option><option value='Rontakul'>Rontakul</option><option value='Sankul'>Sankul</option><option value='Senshatla'>Senshatla</option><option value='Shaigol'>Shaigol</option><option value='Shaivgol'>Shaivgol</option><option value='Shankul'>Shankul</option><option value='Shayankul'>Shayankul</option><option value='Sheelkul'>Sheelkul</option><option value='Shirsal'>Shirsal</option><option value='Shirshatla'>Shirshatla</option><option value='Shrinikul'>Shrinikul</option><option value='Shrishal'>Shrishal</option><option value='Shrishatla'>Shrishatla</option><option value='Shrisheel'>Shrisheel</option><option value='Shrishishta'>Shrishishta</option><option value='Shrishreshta'>Shrishreshta</option><option value='Sirsal'>Sirsal</option><option value='Sirshatla'>Sirshatla</option><option value='Sudarshan'>Sudarshan</option><option value='Surkul'>Surkul</option><option value='Sursal'>Sursal</option><option value='Suryakul'>Suryakul</option><option value='Susal'>Susal</option><option value='Totkul'>Totkul</option><option value='Tulshishta'>Tulshishta</option><option value='Tulshitla'>Tulshitla</option><option value='Tulashatla'>Tulashatla</option><option value='Upankul'>Upankul</option><option value='Utkul'>Utkul</option><option value='Utkalkul'>Utkalkul</option><option value='Vachhakul'>Vachhakul</option><option value='Vastrakul'>Vastrakul</option><option value='Vatsakul'>Vatsakul</option><option value='Vinukul'>Vinukul</option><option value='Viparishatla'>Viparishatla</option><option value='Viparishishta'>Viparishishta</option><option value='Viprashatla'>Viprashatla</option><option value='Vishnukul'>Vishnukul</option><option value='Vishwakul'>Vishwakul</option><option value='Vishwapal'>Vishwapal</option><option value='Vikramshishta'>Vikramshishta</option><option value='Vikramshil'>Vikramshil</option><option value='Yalkul'>Yalkul</option><option value='Yalshat'>Yalshat</option><option value='Yalshatla'>Yalshatla</option><option value='Yalshatti'>Yalshatti</option><option value='Yalshishta'>Yalshishta</option><option value='Yankul'>Yankul</option><option value='Yannukul'>Yannukul</option><option value='Yenkul'>Yenkul</option><option value='Yetakul'>Yetakul</option>
                    </select>
                  </a>
                </div>
              </div>
              <div class="filterOptionDetails filterOptionDetails4" style="font-size: 1.2vw;">
                <div class="backgroundOptionsOut backgroundOptionsOut1">
                  <p class="basicOptionsHeading">Country</p>
                  <select name="country" class="selectLanguage" id="country">
                    <option value="">Country</option>
                  </select>
                </div>
                <div class="backgroundOptionsOut backgroundOptionsOut2">
                  <a class="backgroundDetailsRightSide">State<br>
                    <select name="state" id="state" class="selectLanguage">
                      <option value="">State</option>

                    </select>
                  </a>
                  <a class="backgroundDetailsRightSide">City<br>
                    <select name="city" id="city" class="selectLanguage">
                      <option value="">City</option>

                    </select>
                  </a>
                </div>
              </div>
              <div class="filterOptionDetails filterOptionDetails5" style="font-size: 10px;">
                More
              </div>
            </div>
            <button id="sendBtn" class="filterSubmit">
              Submit
            </button>
          </form>

        </div>
      </div>


      <!-- <script src="location.js"></script> -->



      <div class="cardTopSpaceAdjust"></div>
      <!-- <div class="card">
        <img class="cardImg" src="user1.png" title="FirstName LastName">
        <div class="cardTextOut">
          <p class="cardText cardText1">
            Name: FirstName LastName
          </p>
          <p class="cardText cardText2">
            ID: 000000
          </p>
          <p class="cardText cardText3">
            Age: 00
          </p>
          <p class="cardText cardText4">
            Occupation: Occupation
          </p>
          <p class="cardText cardText5">
            Height: 0'0"
          </p>
          <div class="cardMoreOut">
            <button class="cardMore1">
              Full Profile
            </button>
            <button class="cardMore2 cardMore" title="Like"></button>
            <button class="cardMore3 cardMore" title="Dislike"></button>
            <button class="cardMore4 cardMore" title="Report"></button>
          </div>
        </div>
        <div class="cardMoreOutMobile">
          <button class="cardMore1">
            Full Profile
          </button>
          <button class="cardMore2 cardMore" title="Like"></button>
          <button class="cardMore3 cardMore" title="Dislike"></button>
          <button class="cardMore4 cardMore" title="Report"></button>
        </div>
      </div>
      <div class="partition"></div> -->
      <?php
      $myValidity = $row['Validity'];
      $myValidity = strtotime($myValidity);
      $currentDate = new DateTime();
      $today = $currentDate->format('d M Y');
      $today = strtotime($today);
      // $today = new DateTime(date('d M Y',strtotime(date('Y-m-d', time()))));
      if($myValidity > $today){
        $validityStatus = "yes";
      }else{
        $validityStatus = "no";
      }
      ?>
      <div id="peoplecards">
        <?php
        $cachefile = 'cache/' . $_SESSION['unique_id'] . 'index1.php';
        $cachetime = 1 * 60;
        $output = NULL;
        if (file_exists($cachefile) && (time() - $cachetime < filemtime($cachefile))) {
          include($cachefile);
          echo "<!-- Cached " . date('jS F Y H:i', filemtime($cachefile)) . " -->";
          exit;
        } else {

          ob_start();



          $stmt = $conn->prepare("SELECT id, fname, lname, profile_img, occupation, height, age,Validity FROM per_details WHERE gender<>? AND approval_status = 'approved' AND id != '11111'");
          $stmt->bind_param("s", $row['gender']);
          $stmt->execute();
          $result1 = $stmt->get_result();
          // $row = $result->fetch_assoc();
          // while ($row = mysqli_fetch_assoc($result)) {
          if($validityStatus == "yes" && $myValidity != ""){
          while ($row1 = $result1->fetch_assoc()) {
            $query = "SELECT * from likes where liked_by={$row['id']} and liked_to={$row1['id']}";
            $likeResult = mysqli_query($conn, $query);
            if (mysqli_num_rows($likeResult) > 0) {
              $likeBackColor = '0.9';
            } else {
              $likeBackColor = '0.3';
            }

            $query = "SELECT * from dislikes where disliked_by={$row['id']} and disliked_to={$row1['id']}";
            $dislikeResult = mysqli_query($conn, $query);
            if (mysqli_num_rows($dislikeResult) > 0) {
              $dislikeBackColor = '0.9';
            } else {
              $dislikeBackColor = '0.3';
            }

            $query = "SELECT * from report where reported_by={$row['id']} and reported_to={$row1['id']}";
            $reportResult = mysqli_query($conn, $query);
            if (mysqli_num_rows($reportResult) > 0) {
              $reportBackColor = '0.9';
            } else {
              $reportBackColor = '0.3';
            }
            $block = "SELECT * FROM block_user WHERE blocked_by = {$row1['id']} AND blocked_to = {$_SESSION['unique_id']}";
            $blockquery = mysqli_query($conn, $block);
            if (mysqli_num_rows($blockquery) > 0) {
              $display = 'none';
            } else {
              $display = 'inline-flex';
            }

            
            // $date1 = $row1['Validity'];
            // $currentDate = new DateTime();
            // $date2 = $currentDate->format('d/m/Y h:i a');
            // $date2 = new DateTime(date('d M Y',strtotime(date('Y-m-d', time()))));
           
            if (!(mysqli_num_rows($dislikeResult) > 0) && !(mysqli_num_rows($reportResult) > 0)){
              $output .= '<div class="card" style="display:' . $display . '">
                    <div class="cardText1">
                      <p class="cardText1Text">' . $row1['fname'] . ' ' . $row1['lname'] . '</p>
                    </div>
                    <img class="cardImg" src="' . $row1['profile_img'] . '">
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
                      <form class="cardMoreOut" id="cardForm" method="POST" target="frame">
                        <div class="viewYourProfileForm">
                        <a href="yourProfile.php?passYourID=' . $row1['id'] . '" class="cardMore1" name="cardMore1" id="viewprofile">
                          Full Profile
                        </a>
                        </div>
                        <input name="liked_by" id="viewedBy" value="' . $row['id'] . '" style="display:none"></input>
                        <input name="liked_to" id="viewedTo" value="' . $row1['id'] . '" style="display:none"></input>
                        <button name="cardMore2" class="cardMore2 cardMore" title="Like" onclick="cardMoreFunc(this)" style="opacity: ' . $likeBackColor . ';"></button>
                        <button name="cardMore3" class="cardMore3 cardMore" title="Dislike" onclick="cardMoreFunc(this)" style="opacity: ' . $dislikeBackColor . ';"></button>
                        <button name="cardMore4" class="cardMore4 cardMore" title="Report" onclick="cardMoreFunc(this)" style="opacity: ' . $reportBackColor . ';"></button>
                      </form>
                    </div>
                  </div>';
            }
          }
          }else{
            $output .= "Your plan has been expired!";
          }
          // My html/php code here
          $output .= '<?php include_once("index1js.php"); ?>
                        <iframe name="frame" style="display: none;"></iframe>
                        <script src="location.js"></script>
                        <script src="chat.js"></script>
                        <script src="../chat/dropDowns.js"></script>';
          echo $output;
          $fp = fopen($cachefile, 'w'); // open the cache file for writing
          fwrite($fp, $output); // save the contents of output buffer to the file
          fclose($fp); // close
          ob_end_flush(); // Send to browser
        }

        ?>
      </div>
    </div>
  </div>

  <!-- <span class="closeUpload">Close</span> -->


  <!-- </div>
    </div>
  </div> -->

  <script>
    function searchTextFunc() {
      let searchText = document.getElementById('searchTextInPage').value;
      // window.find(searchTextInPage.value);
      $(document).ready(function() {
        $.ajax({
          url: "helper/searchPeople.php",
          type: "POST",
          dataType: "text",
          data: {
            searchPeople: searchText,
          },
          success: function(response) {
            peoplecards.innerHTML = response;
            // console.log(response);
          }
        });
      });
    }

    function searchTextFunc1() {
      let searchText1 = document.getElementById('searchTextInPage1').value;
      // window.find(searchTextInPage1.value);
      $(document).ready(function() {
        $.ajax({
          url: "helper/searchPeople.php",
          type: "POST",
          dataType: "text",
          data: {
            searchPeople: searchText1,
          },
          success: function(response) {
            peoplecards.innerHTML = response;
            // console.log(response);
          }
        });
      });
    }
  </script>

  <script>
    var clickDetectVal;
    let rowForUploadImg = document.getElementsByClassName("rowForUploadImg");

    function clickDetect() {
      clickDetectVal = 1;
      // alert("before");
      console.log("clickDetectVal " + clickDetectVal);
      console.log("Style: " + rowForUploadImg[0].style.visibility);
      // alert("after");

      // function uploadImageOpen() {
      if (rowForUploadImg[0].style.visibility == "hidden" || rowForUploadImg[0].style.visibility == "") {
        rowForUploadImg[0].style.visibility = "visible";
        rowForUploadImg[0].style.width = "98vw";
        rowForUploadImg[0].style.height = "98vh";
      } else {
        rowForUploadImg[0].style.width = "0vw";
        rowForUploadImg[0].style.width = "0vw";
        rowForUploadImg[0].style.visibility = "hidden";
      }
      // }
    }
  </script>

  <script type="text/javascript">
    var fileExt = '';
    $uploadCrop = $('#upload-demo').croppie({
      enableExif: true,
      viewport: {
        width: 300,
        height: 300,
        type: 'square'
      },
      boundary: {
        width: 320,
        height: 320
      }
    });

    // 
    // $('#upload').on('change', function() {
    // $('#upload').load(function() {
    //   var reader = new FileReader();
    //   reader.onload = function(e) {
    //     // var filePath = $("#upload").val();
    //     var filePath = "";
    //     fileExt = filePath.substr(filePath.lastIndexOf('.') + 1, filePath.length);
    //     $uploadCrop.croppie('bind', {
    //       url: ""
    //     }).then(function() {
    //       console.log('jQuery bind complete');
    //     });

    //   }
    //   reader.readAsDataURL(this.files[0]);
    // });
    var filePath = "<?php echo $row['profile_img']; ?>";
    fileExt = filePath.substr(filePath.lastIndexOf('.') + 1, filePath.length);
    $uploadCrop.croppie('bind', {
      url: "<?php echo $row['profile_img']; ?>"
    }).then(function() {
      console.log('jQuery bind complete');
    });
    // 

    $('#upload').on('change', function() {
      var reader = new FileReader();
      reader.onload = function(e) {
        // fileExt = e.target.files[0].type;
        var filePath = $("#upload").val();
        fileExt = filePath.substr(filePath.lastIndexOf('.') + 1, filePath.length);
        // console.log("File Extension ->-> " + file_ext);
        $uploadCrop.croppie('bind', {
          url: e.target.result
        }).then(function() {
          console.log('jQuery bind complete');
        });

      }
      reader.readAsDataURL(this.files[0]);
    });

    // 
    $('.uploadImgBtn').on('click', function(ev) {
      if ($('#upload').val() != '') {
        $uploadCrop.croppie('result', {
          type: 'canvas',
          size: 'viewport'
        }).then(function(resp) {


          $.ajax({
            url: "helper/profileImg.php",
            type: "POST",
            data: {
              "image": resp,
              "fileExt": fileExt
            },
            success: function(response) {
              // html = '<img src="' + resp + '" />';
              // $("#upload-demo-i").html(html);
              // alert("Profile Image Uploaded Successfully!");
              // alert(response);
              if (response.slice(0, 1) == "1") {
                // document.getElementById('sideBarTopImgWide').src = response.slice(1, response.length);
                // document.getElementById('sideBarTopImgMobile').src = response.slice(1, response.length);
                alert("Profile Image Uploaded Successfully! It Might Take Some Time To Reflect The Changes...");
              } else {
                alert("Error Occured While Uploading Profile Image, Please Try Again!");
              }
            }
          });
        });
      } else {
        alert('Please Select The Image!');
      }
    });
  </script>

  <iframe name="frame" style="display: none;"></iframe>

  <!-- <script>
    // var clickDetectVal;

    // function clickDetect() {
    //   clickDetectVal = 1;
    //   console.log("clickDetectVal " + clickDetectVal);
    // }
    var sideBarTopImgWide = document.getElementById("sideBarTopImgWide");
    var sideBarTopImgMobile = document.getElementById("sideBarTopImgMobile");

    function gImage(event) {
      // alert("onchange called");
      // filePath = URL.createObjectURL(event.target.files[0]) + ".png";
      console.log("filePath");
      var fd = new FormData();
      var files;
      var viewWidthForImgUpload = window.matchMedia("(max-width: 720px)");
      if (viewWidthForImgUpload.matches) {
        files = $('#sideBarTopImgEditMobile')[0].files;
      } else {
        files = $('#sideBarTopImgEditWide')[0].files;
      }
      console.log("clickDetectVal Before If " + clickDetectVal);
      if (files.length > 0 && clickDetectVal == 1) {
        clickDetectVal = 0;
        console.log("clickDetectVal after If " + clickDetectVal);
        fd.append('file', files[0]);
        // $('#sideBarTopImgEditMobile').value = null;
        // $('#sideBarTopImgEditWide').value = null;
        $(document).ready(function() {
          $.ajax({
            url: "helper/profileImg.php",
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,
            success: function(response) {
              console.log(response);
              if (response.slice(0, 1) == "1") {
                sideBarTopImgWide.src = response.slice(1, response.length);
                sideBarTopImgMobile.src = response.slice(1, response.length);
                alert("Profile Image Uploaded Successfully!");
              } else {
                alert("Error Occured While Uploading Profile Image, Please Try Again!");
              }
            }
          });
        });
      }
    }
  </script> -->

  <!-- People I liked / disliked -->
  <script type="text/javascript">
    var peoplecards = document.getElementById('peoplecards');
    peoplecards.innrHTML = "";
    let ILikedDisliked = "";

    function peopleILiked(ILikedDisliked) {
      $(document).ready(function() {
        $.ajax({
          url: "helper/peopleILiked.php",
          type: "POST",
          dataType: "text",
          data: {
            ILikedDisliked: ILikedDisliked,
          },
          success: function(response) {
            peoplecards.innerHTML = response;
            // console.log(response);
          }
        });
      });
    }
  </script>

  <!-- likesToMe -->
  <script type="text/javascript">
    var peoplecards = document.getElementById('peoplecards');
    peoplecards.innrHTML = "";
    // let ILikedDisliked = "";

    function likesToMe() {
      $(document).ready(function() {
        $.ajax({
          url: "helper/likesToMe.php",
          type: "POST",
          // dataType: "text",
          // data: {
          //   ILikedDisliked: ILikedDisliked,
          // },
          success: function(response) {
            peoplecards.innerHTML = response;
            // console.log(response);
          }
        });
      });
    }
  </script>

  <!-- <script>
    var visitor = document.getElementById('sideBarText3');
    var peoplecards = document.getElementById('peoplecards');

    function PeopleIDisLiked() {
      console.log("success!");
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "likeOrdislike/dislike.php", true);
      xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            let data = xhr.response;
            peoplecards.innerHTML = data;
            console.log("success!");
          }
        }
      }
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send();
    }
  </script> -->
  <!-- <script>
    var visitor = document.getElementById('sideBarText3');
    var peoplecards = document.getElementById('peoplecards');

    function PeopleILiked() {
      console.log("success!");
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "likeOrdislike/like.php", true);
      xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            let data = xhr.response;
            peoplecards.innerHTML = data;
            console.log("success!");
          }
        }
      }
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send();
    }
  </script> -->
  <script>
    var visitor = document.getElementById('sideBarText3');
    var peoplecards = document.getElementById('peoplecards');

    function visitorsFunc() {
      console.log("success!");
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "view/visitor.php", true);
      xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            let data = xhr.response;
            peoplecards.innerHTML = data;
            console.log("success!");
          }
        }
      }

      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send();

    }
  </script>
  <script>
    const form = document.querySelector(".filterForm");
    var gender = document.getElementById('gender');
    var minAge = document.getElementById('minAge');
    var maxAge = document.getElementById('maxAge');
    var sendBtn = document.getElementById("sendBtn");
    var height = document.getElementById('height');
    var qualification = document.getElementById('qualification');
    var worktype = document.getElementById('worktype');
    var salary = document.getElementById('salary');
    var language = document.getElementById('language');
    var gotra1 = document.getElementById('gotra1');
    var gotra2 = document.getElementById('gotra2');
    var country = document.getElementById('country');
    var state = document.getElementById('state');
    var city = document.getElementById('city');
    var filter = document.getElementById("filterissue");
    var peoplecards = document.getElementById('peoplecards');
    peoplecards.innrHTML = "hello";
    form.onsubmit = (e) => {
      e.preventDefault();
    }
    sendBtn.onclick = () => {
      console.log("success!");
      let xhr = new XMLHttpRequest();
      if (gender.value != "" || minAge.value != "" || maxAge.value != "" || height.value != "" || qualification.value != "" || worktype.value != "" || salary.value != "" || language.value != "" || gotra1.value != "" || gotra2.value != "" || country.value != "" || state.value != "" || city.value != "") {
        filter.classList.add("act2ive");
      } else {
        filter.classList.remove("act2ive");
      }
      xhr.open("POST", "filter/filter.php", true);
      xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            let data = xhr.response;
            peoplecards.innerHTML = data;
            console.log("success!");
          }
        }
      }

      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("gender=" + gender.value + "&minAge=" + minAge.value + "&maxAge=" + maxAge.value + "&height=" + height.value + "&qualification=" + qualification.value + "&worktype=" + worktype.value + "&salary=" + salary.value + "&language=" + language.value + "&gotra1=" + gotra1.value + "&gotra2=" + gotra2.value + "&country=" + country.value + "&state=" + state.value + "&city=" + city.value);

    }
  </script>

  <script>
    window.onload = () => {
      setInterval(googleTranslateElementInit(), 0);
    }

    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en',
        layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,
        includedLanguages: "en,hi,mr,te,kn"
      }, 'google_translate_element');
    }
  </script>

  <!-- <script src="../chat/dropDowns.js"></script> -->

  <script>
    let choice = -1,
      i;
    let filterOpen = document.getElementById("filterOpen");
    let filterOption = document.getElementsByClassName("filterOption");
    let filterOptionDetails = document.getElementsByClassName("filterOptionDetails");
    filterOpen.style.visibility = "hidden";

    function filterFunction() {
      // console.log("Filter");
      if (filterOpen.style.visibility == "hidden") {
        filterOpen.style.visibility = "visible";
        filterOpen.style.display= "block";
        filterOpen.style.height = "20vw";
      } else {
        filterOpen.style.height = "0vw";
        filterOpen.style.visibility = "hidden";
        filterOpen.style.display= "none";
      }
      if (choice == -1) {
        filterChoice(0);
      }
    }

    // let filterOptionImg = document.getElementsByClassName("filterOptionImg");

    function filterChoice(choice) {
      for (i = 0; i < 5; i++) {
        if (i != choice) {
          filterOption[i].style.borderBottom = "none";
          filterOption[i].style.opacity = "70%";
          // filterOptionImg[i].style.backgroundColor = "rgba(0, 0, 0, 0.8)";
          filterOptionDetails[i].style.display = "none";
        } else {
          filterOption[i].style.borderBottom = "0.2vw solid rgba(0, 0, 0, 0.8)";
          filterOption[i].style.opacity = "100%";
          // filterOptionImg[i].style.backgroundColor = "#200116";
          filterOptionDetails[i].style.display = "flex";
        }
      }
    }

    let selectAge = document.getElementsByClassName("selectAge");
    let whichList;

    function ageOptions(whichList) {
      for (i = 18; i < 101; i++) {
        let newAgeOption = new Option(i);
        selectAge[whichList].add(newAgeOption);
        newAgeOption.value = i;
      }
    }

    let rangeValue = document.getElementsByClassName("rangeValue");

    function rangeSlider(value) {
      rangeValue[0].innerHTML = value;
    }

    let selectHeight = document.getElementsByClassName("selectHeight");

    function HeightOptions(whichList) {
      for (i = 54; i < 273; i++) {
        let inchHeight = Math.round(0.394 * i);

        let newHeightOption = new Option(i + " cm (" + ((inchHeight - ((inchHeight) % 12)) / 12) + "' " + (inchHeight) % 12 + "'')");
        selectHeight[whichList].add(newHeightOption);
        newHeightOption.value = i;
      }
    }

    let cardMoreIndex;

    function cardMoreFunc(cardMoreIndex) {
      console.log(cardMoreIndex.style.opacity);
      if (cardMoreIndex.style.opacity == "" || cardMoreIndex.style.opacity == "0.3") {
        cardMoreIndex.style.opacity = "0.9";
        if (cardMoreIndex.className == "cardMore2 cardMore") {
          cardMoreIndex.nextElementSibling.style.opacity = "0.3";
          cardMoreIndex.nextElementSibling.nextElementSibling.style.opacity = "0.3";
        } else if (cardMoreIndex.className == "cardMore3 cardMore") {
          cardMoreIndex.previousElementSibling.style.opacity = "0.3";
        } else if (cardMoreIndex.className == "cardMore4 cardMore") {
          cardMoreIndex.previousElementSibling.previousElementSibling.style.opacity = "0.3";
        }
      } else {
        cardMoreIndex.style.opacity = "0.3";
      }
    }

    function openYourProfile(i) {
      sessionStorage.setItem("yourID", i);
      window.open('yourProfile.php', target = '_top');
    }
  </script>

  <!-- <script src="../chat/dropDowns.js"></script> -->

  <iframe name="frame" style="display: none;"></iframe>

  <script>
    var profileComPer = <?php echo $_SESSION['profileComPer']; ?>;
    var sideBarCapsuleWide = document.getElementById("sideBarCapsuleWide");
    var sideBarCapsuleMobile = document.getElementById("sideBarCapsuleMobile");
    if (profileComPer < 50) {
      sideBarCapsuleWide.classList.add('profileComAnClass');
      sideBarCapsuleWide.style.border = "0.1vw solid rgba(0, 0, 0, 0.1);";
      sideBarCapsuleMobile.classList.add('profileComAnClass');
      sideBarCapsuleMobile.style.border = "0.1vw solid rgba(0, 0, 0, 0.2);";
    } else {
      sideBarCapsuleWide.classList.remove('profileComAnClass');
      sideBarCapsuleWide.style.border = "0.1vw solid rgba(0, 0, 0, 0.2);";
      sideBarCapsuleMobile.classList.remove('profileComAnClass');
      sideBarCapsuleMobile.style.border = "0.1vw solid rgba(0, 0, 0, 0.4);";
    }
  </script>


  <!-- <script src="location.js"></script>
  <script src="chat.js"></script> -->
</body>

</html>