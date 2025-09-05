<?php
session_start();
include_once "../backend/connect.php";
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
$sql = mysqli_query($conn, "INSERT INTO views (viewed_to, viewed_by, on_time)
  VALUES ({$_GET['passYourID']}, {$_SESSION['unique_id']}, NOW())");
$myDataResult = mysqli_query($conn, "SELECT * FROM per_details WHERE id = {$_SESSION['unique_id']}");
$myRow = mysqli_fetch_assoc($myDataResult);
$yourDataResult = mysqli_query($conn, "SELECT * FROM per_details WHERE id = {$_GET['passYourID']}");
$yourRow = mysqli_fetch_assoc($yourDataResult);
// $yourFirstName = $yourRow['fname'];
// $yourLastName = $yourRow['lname'];
// }
?>
<?php
if (isset($_POST['cardMore2'])) {
  $query = "SELECT * from likes where liked_by={$_POST['liked_by']} and liked_to={$_POST['liked_to']}";
  $likeResult = mysqli_query($conn, $query);

  if (mysqli_num_rows($likeResult) > 0) {
    mysqli_query($conn, "DELETE FROM likes WHERE liked_by={$_POST['liked_by']} and liked_to={$_POST['liked_to']}");
    echo "like deleted";
  } else {
    $query = "SELECT * from dislikes where disliked_by={$_POST['liked_by']} and disliked_to={$_POST['liked_to']}";
    $dislikeResult = mysqli_query($conn, $query);

    if (mysqli_num_rows($dislikeResult) > 0) {
      mysqli_query($conn, "DELETE FROM dislikes WHERE disliked_by={$_POST['liked_by']} and disliked_to={$_POST['liked_to']}");
      echo "dislike deleted";
    }


    $query = "SELECT * from report where reported_by={$_POST['liked_by']} and reported_to={$_POST['liked_to']}";
    $reportResult = mysqli_query($conn, $query);

    if (mysqli_num_rows($reportResult) > 0) {
      mysqli_query($conn, "DELETE FROM report WHERE reported_by={$_POST['liked_by']} and reported_to={$_POST['liked_to']}");
      echo "report deleted";
    }


    $query = "INSERT INTO likes (liked_by, liked_to) VALUES(?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $_POST['liked_by'], $_POST['liked_to']);
    $stmt->execute();
    echo "like done";
    echo "<script>console.log('Liked');</script>";
  }
} else if (isset($_POST['cardMore3'])) {
  $query = "SELECT * from dislikes where disliked_by={$_POST['liked_by']} and disliked_to={$_POST['liked_to']}";
  $dislikeResult = mysqli_query($conn, $query);

  if (mysqli_num_rows($dislikeResult) > 0) {
    mysqli_query($conn, "DELETE FROM dislikes WHERE disliked_by={$_POST['liked_by']} and disliked_to={$_POST['liked_to']}");
    echo "dislike deleted";
  } else {
    $query = "SELECT * from likes where liked_by={$_POST['liked_by']} and liked_to={$_POST['liked_to']}";
    $likeResult = mysqli_query($conn, $query);

    if (mysqli_num_rows($likeResult) > 0) {
      mysqli_query($conn, "DELETE FROM likes WHERE liked_by={$_POST['liked_by']} and liked_to={$_POST['liked_to']}");
      echo "like deleted";
    }
    $query = "INSERT INTO dislikes (disliked_by, disliked_to) VALUES(?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $_POST['liked_by'], $_POST['liked_to']);
    $stmt->execute();
    echo "dislike done";
    echo "<script>console.log('Disliked');</script>";
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
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <title>Profile</title>
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
    .bottom {
display:none;
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
  <!-- <link rel="stylesheet" href="wide.css">
  <link rel="stylesheet" href="mobile.css"> -->
  <link rel="stylesheet" href="myProfile.css">
  <link rel="stylesheet" href="profileMobile.css">
  <link rel="stylesheet" href="components/navBar.css">
  <link rel="stylesheet" href="components/belowNav.css">
  <link rel="stylesheet" href="components/sideBar.css">
  <link rel="stylesheet" href="components/bottom.css">
  <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

  <script>
    function reportReason() {
      let text;
      let reason = prompt("Why do you want to report '<?php echo $yourRow['fname'] . " " . $yourRow['lname']; ?>' : ", "Reason");
      if (reason == null || reason == "") {
        text = "You cancelled to report!";
        alert(text);
      } else {
        text = "Your report has been submitted succssfully!";
        alert(text);
        console.log(reason);
      }
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "report/reportuser.php", true);
      xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            let data = xhr.response;
            //peoplecards.innerHTML = data;
            console.log("success!");
          }
        }
      }

      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("Reason=" + reason + "&reportTo=" + <?php echo $yourRow['id']; ?>);

    }
  </script>

  <?php include_once("components/sideBar.php"); ?>

  <?php include_once("components/navBar.php"); ?>

  <?php include_once("components/belowNav.php"); ?>

  <?php
  $condition = $yourRow['mobile_visibility'];

  if ($condition == 'toAll') {
    $result = $yourRow['mobile'];
  } elseif ($condition == 'toLiked') {
    $like = "SELECT * FROM likes WHERE (liked_by = {$yourRow['id']} AND liked_to = {$myRow['id']} )";
    $likeQuery = mysqli_query($conn, $like);
    if ($likeQuery) {
      $result = $yourRow['mobile'];
    } else {
      $result = 'Protected';
    }
  } else {
    $result = 'Protected';
  }
  ?>

  <div class="contentOut" id="peoplecards">
    <div class="content" id="content">
      <div class="profileContentTopOut" id="yourProfileTop">
        <div class="topleft">
          <div class="ProfileImage">
            <img src="<?php echo $yourRow['profile_img'] ?>" class="sideBarTopImgContent" id="img">
          </div>
          <div class="ProfileTop">
            <div class="profileContentTop profileContentTop1">
              <img src="user.svg" class="profileContentTopImg">
              <p class="profileContentTopText"><?php echo $yourRow['fname'] . " " . $yourRow['lname'] . ", " . $yourRow['age'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop2">
              <img src="location.svg" class="profileContentTopImg">
              <p class="profileContentTopText"><?php echo $yourRow['c_city'] . ", " . $yourRow['c_state'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop2" style="margin-top: 1vw;">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#009688" class="bi bi-telephone-fill profileContentTopImg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
              </svg>
              <p class="profileContentTopText"><?php echo " " . $result; ?></p>
            </div>
          </div>
        </div>
        <div class="ProfileOption">
          <div class="profileContentTop profileContentTop2"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#2196F3" class="bi bi-chat-dots-fill profileContentTopImg" viewBox="0 0 16 16">
              <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
            </svg><a href="../chat/chatbox.php?id=<?php echo $yourRow['id']; ?>" class="profileContentTopText" id="sideBarText3" title="Messages">Message</a>
          </div>
          <div class="profileContentTop profileContentTop2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-flag-fill profileContentTopImg" viewBox="0 0 16 16">
              <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001" />
            </svg><a href="#" onclick="reportReason()" class="profileContentTopText" id="sideBarText2">Report</a></div>
          <div class="profileContentTop profileContentTop2">
            <input type="checkbox" name="check" id="reportCheck" hidden>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#F44336" class="bi bi-person-x-fill profileContentTopImg" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z" />
            </svg><a href="#" class="profileContentTopText" id="sideBarText3">Block</a></label>
            <label for="reportCheck" onclick="reportCheckfun()">
          </div>
        </div>
      </div>
      <div class="profileContentTopOut">
        <div class="profileContentHeadOut">
          <div class="profileContentHead">
            <img src="info.svg" class="profileContentHeadImg">
            <p class="profileContentHeadText">Profile Information</p>
          </div>
          <!-- <button class="profileContentHeadImgR" title="Edit" onclick="window.open('settings.php', target='_top')"></button> -->
        </div>
        <div class="profileContentOut">
          <div class="profileContent profileContentLeft">
            <div class="profileContentTop profileContentTop1">
              <img src="events.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Birth Date:<?php echo " " . $yourRow['dob'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="building.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Occupation:<?php echo " " . $yourRow['occupation'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="drop.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Blood Group:<?php echo " " . $yourRow['blood'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Landmark:<?php echo " " . $yourRow['c_landmark'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">City:<?php echo " " . $yourRow['c_city'] ?></p>
            </div>
            <div class="profileContentTop">
              <img src="location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">State:<?php echo " " . $yourRow['c_state'] ?></p>
            </div>
          </div>
          <div class="profileContent profileContentRight">
            <div class="profileContentTop profileContentTop1">
              <img src="income.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Income(In Thousands Per Month):<?php echo " " . $yourRow['income'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="height.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Height(In cm): <?php echo " " . $yourRow['height'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="star.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Gotras: 1st - <?php echo " " . $yourRow['gotra1'] ?> , 2nd - <?php echo " " . $yourRow['gotra2'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Locality:<?php echo " " . $yourRow['c_locality'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">District:<?php echo " " . $yourRow['c_district'] ?></p>
            </div>
            <div class="profileContentTop">
              <img src="location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Pin Code:<?php echo " " . $yourRow['c_pincode'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="profileContentTopOut">
        <div class="profileContentHeadOut">
          <div class="profileContentHead">
            <img src="aboutUs.svg" class="profileContentHeadImg">
            <p class="profileContentHeadText">Family Details</p>
          </div>
          <!-- <button class="profileContentHeadImgR" title="Edit" onclick="window.open('settings.php', target='_top')"></button> -->
        </div>
        <div class="profileContentOut">
          <div class="profileContent profileContentLeft">
            <div class="profileContentTop profileContentTop1">
              <img src="female.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Mother Name:<?php echo " " . $yourRow['mother_name'] . " " . $yourRow['lname'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="building.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Mother Occupation:<?php echo " " . $yourRow['mother_occupation'] ?></p>
            </div>
            <div class="profileContentTop">
              <img src="matches.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Siblings:<?php echo " " . $yourRow['siblings'] ?></p>
            </div>
          </div>
          <div class="profileContent profileContentRight">
            <div class="profileContentTop profileContentTop1">
              <img src="male.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Father Name:<?php echo " " . $yourRow['mname'] . " " . $yourRow['lname'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="building.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Father Occupation:<?php echo " " . $yourRow['father_occupation'] ?></p>
            </div>
            <div class="profileContentTop">
              <img src="income.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Family Income(In Thousands Per Month):<?php echo " " . $yourRow['family_income'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="profileContentTopOut">
        <div class="profileContentHeadOut">
          <div class="profileContentHead">
            <img src="star.svg" class="profileContentHeadImg">
            <p class="profileContentHeadText">Birth & Zodiac</p>
          </div>
          <!-- <button class="profileContentHeadImgR" title="Edit" onclick="window.open('settings.php', target='_top')"></button> -->
        </div>
        <div class="profileContentOut">
          <div class="profileContent profileContentLeft">
            <div class="profileContentTop profileContentTop1">
              <img src="star.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Janma Tithi:<?php echo " " . $yourRow['janma_tithi'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="clock.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Birth Time:<?php echo " " . $yourRow['birth_time'] ?></p>
            </div>
            <div class="profileContentTop">
              <img src="location.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Birth Place:<?php echo " " . $yourRow['birth_place'] ?></p>
            </div>
          </div>
          <div class="profileContent profileContentRight">
            <div class="profileContentTop profileContentTop1">
              <img src="star.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Zodiac/Rashi:<?php echo " " . $yourRow['zodiac'] ?></p>
            </div>
            <div class="profileContentTop profileContentTop1">
              <img src="star.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Gotras: 1st - <?php echo " " . $yourRow['gotra1'] ?> , 2nd - <?php echo " " . $yourRow['gotra2'] ?></p>
            </div>
            <div class="profileContentTop">
              <img src="user.svg" class="profileContentTopImg profileContentImg">
              <p class="profileContentTopText profileContentText">Birth Name:<?php echo " " . $yourRow['birth_name'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <button class="profileGoBack" onclick="window.open('index1.php', target='_top')">
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

  <!-- <?php //include_once("components/bottom.php"); ?> -->

  <iframe name="frame" style="display: none;"></iframe>

  <script src="../chat/dropDowns.js"></script>

  <script>
    function searchTextFunc() {
      var content = document.getElementsByClassName('content');
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
            content[0].innerHTML = response;
            // peoplecards.innerHTML = response;
            // console.log(response);
          }
        });
      });
    }

    function searchTextFunc1() {
      var content = document.getElementsByClassName('content');
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
            content[0].innerHTML = response;
            // peoplecards.innerHTML = response;
            // console.log(response);
          }
        });
      });
    }
  </script>
  <script>
    var clickDetectVal;

    function clickDetect() {
      clickDetectVal = 1;
      console.log("clickDetectVal " + clickDetectVal);
    }
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
  </script>

  <script>
    var reportCheck = document.getElementById('reportCheck');

    function reportCheckfun() {
      if (reportCheck.checked) {
        displayProfile();

      } else {

        displayReport();
      }
    }
    var reportArea = document.getElementById('reportsection');
    var fullProfileArea = document.getElementById('content');

    function displayReport() {
      reportArea.style.display = "block";
      fullProfileArea.style.display = "none";
    }

    function displayProfile() {
      reportArea.style.display = "none";
      fullProfileArea.style.display = "block";
    }
  </script>

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

  <!-- People I liked / disliked -->
  <script type="text/javascript">
    var content = document.getElementsByClassName('content');
    content.innerHTML = "";
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
            content[0].innerHTML = response;
            // console.log(response);
          }
        });
      });
    }
  </script>

  <!-- likesToMe -->
  <script type="text/javascript">
    var content = document.getElementsByClassName('content');
    content.innerHTML = "";
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
            content[0].innerHTML = response;
            // console.log(response);
          }
        });
      });
    }
  </script>

  <script>
    var visitor = document.getElementById('sideBarText3');
    var content = document.getElementsByClassName('content');
    content.innerHTML = "";

    function visitorsFunc() {
      console.log("success!");
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "view/visitor.php", true);
      xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            let data = xhr.response;
            content[0].innerHTML = data;
            console.log("success!");
          }
        }
      }

      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send();

    }
  </script>

  <!-- <script>
    let sideBarMobile = document.getElementsByClassName("sideBarMobile");

    function hamburgerOpen() {
      if (sideBarMobile[0].style.visibility == "hidden" || sideBarMobile[0].style.visibility == "") {
        sideBarMobile[0].style.visibility = "visible";
        sideBarMobile[0].style.width = "100vw";
      } else {
        sideBarMobile[0].style.width = "0vw";
        sideBarMobile[0].style.visibility = "hidden";
      }
    }

    let moreOptionsOutMobile = document.getElementsByClassName("moreOptionsOutMobile");

    function moreOptionsOpenMobile() {
      if (moreOptionsOutMobile[0].style.visibility == "hidden" || moreOptionsOutMobile[0].style.visibility == "") {
        moreOptionsOutMobile[0].style.visibility = "visible";
        moreOptionsOutMobile[0].style.width = "45vw";
        moreOptionsOutMobile[0].style.height = "46vw";
      } else {
        moreOptionsOutMobile[0].style.width = "0vw";
        moreOptionsOutMobile[0].style.height = "0vw";
        moreOptionsOutMobile[0].style.visibility = "hidden";
      }
    }

    let moreOptionsProfileOut = document.getElementsByClassName("moreOptionsProfileOut");
    let viewWidth = window.matchMedia("(max-width: 720px)");

    function moreOptionsProfileOpen() {
      if (viewWidth.matches) {
        if (moreOptionsProfileOut[0].style.visibility == "hidden" || moreOptionsProfileOut[0].style.visibility == "") {
          moreOptionsProfileOut[0].style.visibility = "visible";
          moreOptionsProfileOut[0].style.width = "50vw";
          moreOptionsProfileOut[0].style.height = "62vw";
        } else {
          moreOptionsProfileOut[0].style.width = "0vw";
          moreOptionsProfileOut[0].style.height = "0vw";
          moreOptionsProfileOut[0].style.visibility = "hidden";
        }
      } else {
        if (moreOptionsProfileOut[0].style.visibility == "hidden" || moreOptionsProfileOut[0].style.visibility == "") {
          moreOptionsProfileOut[0].style.visibility = "visible";
          moreOptionsProfileOut[0].style.width = "16vw";
          moreOptionsProfileOut[0].style.height = "15vw";
        } else {
          moreOptionsProfileOut[0].style.width = "0vw";
          moreOptionsProfileOut[0].style.height = "0vw";
          moreOptionsProfileOut[0].style.visibility = "hidden";
        }
      }
    }
  </script> -->

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
</body>

</html>