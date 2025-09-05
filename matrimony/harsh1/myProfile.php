<?php
session_start();
include_once "../backend/connect.php";
$myDataResult = mysqli_query($conn, "SELECT * FROM per_details WHERE id = {$_SESSION['unique_id']}");
$myRow = mysqli_fetch_assoc($myDataResult);
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
    <title>My Profile</title>
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
    </style>
    <link rel="stylesheet" href="myProfile.css">
    <link rel="stylesheet" href="profileMobile.css">
    <link rel="stylesheet" href="components/navBar.css">
    <link rel="stylesheet" href="components/belowNav.css">
    <link rel="stylesheet" href="components/sideBar.css">
    <link rel="stylesheet" href="components/bottom.css">
    <script type="text/javascript"
        src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <?php include_once("components/sideBar.php"); ?>

    <?php include_once("components/navBar.php"); ?>

    <?php include_once("components/belowNav.php"); ?>

    <div class="contentOut">
        <div class="content">
            <div class="profileContentTopOut">
                <div class="profileContentTop profileContentTop1">
                    <img src="user.svg" class="profileContentTopImg">
                    <p class="profileContentTopText">
                        <?php echo $myRow['fname'] . " " . $myRow['lname'] . ", " . $myRow['age'] ?></p>
                </div>
                <div class="profileContentTop profileContentTop2">
                    <img src="location.svg" class="profileContentTopImg">
                    <p class="profileContentTopText"><?php echo $myRow['c_city'] . ", " . $myRow['c_state'] ?></p>
                </div>
                <!-- <div class="cardMoreOut">
          <button class="cardMore2 cardMore" title="Likes"></button>
          <button class="cardMore3 cardMore" title="Visits"></button>
        </div> -->
                <form action="<?php echo '../backend/pdf.php?id=' . $_SESSION['unique_id'] ?>" method="post">
                    <button class="pdfGet" name="pdf">Get PDF</button>
                </form>
            </div>
            <div class="profileContentTopOut">
                <div class="profileContentHeadOut">
                    <div class="profileContentHead">
                        <img src="info.svg" class="profileContentHeadImg">
                        <p class="profileContentHeadText">Profile Information</p>
                    </div>
                    <button class="profileContentHeadImgR" title="Edit"
                        onclick="window.open('settings.php', target='_top')"></button>
                </div>
                <div class="profileContentOut">
                    <div class="profileContent profileContentLeft">
                        <div class="profileContentTop profileContentTop1">
                            <img src="events.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">Birth
                                Date:<?php echo " " . $myRow['dob'] ?></p>
                        </div>
                        <div class="profileContentTop profileContentTop1">
                            <img src="building.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">
                                Occupation:<?php echo " " . $myRow['occupation'] ?></p>
                        </div>
                        <div class="profileContentTop profileContentTop1">
                            <img src="drop.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">Blood
                                Group:<?php echo " " . $myRow['blood'] ?></p>
                        </div>
                        <div class="profileContentTop profileContentTop1">
                            <img src="location.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">
                                Landmark:<?php echo " " . $myRow['c_landmark'] ?></p>
                        </div>
                        <div class="profileContentTop profileContentTop1">
                            <img src="location.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">
                                City:<?php echo " " . $myRow['c_city'] ?></p>
                        </div>
                        <div class="profileContentTop">
                            <img src="location.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">
                                State:<?php echo " " . $myRow['c_state'] ?></p>
                        </div>
                    </div>
                    <div class="profileContent profileContentRight">
                        <div class="profileContentTop profileContentTop1">
                            <img src="income.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">Income(In Thousands Per
                                Month):<?php echo " " . $myRow['income'] ?></p>
                        </div>
                        <div class="profileContentTop profileContentTop1">
                            <img src="height.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">Height(In cm):
                                <?php echo " " . $myRow['height'] ?></p>
                        </div>
                        <div class="profileContentTop profileContentTop1">
                            <img src="star.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">
                            Gotras: 1st - <?php echo " " . $myRow['gotra1'] ?> , 2nd - <?php echo " " . $myRow['gotra2'] ?></p>
                        </div>
                        <div class="profileContentTop profileContentTop1">
                            <img src="location.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">
                                Locality:<?php echo " " . $myRow['c_locality'] ?></p>
                        </div>
                        <div class="profileContentTop profileContentTop1">
                            <img src="location.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">
                                District:<?php echo " " . $myRow['c_district'] ?></p>
                        </div>
                        <div class="profileContentTop">
                            <img src="location.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">Pin
                                Code:<?php echo " " . $myRow['c_pincode'] ?></p>
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
                    <button class="profileContentHeadImgR" title="Edit"
                        onclick="window.open('settings.php', target='_top')"></button>
                </div>
                <div class="profileContentOut">
                    <div class="profileContent profileContentLeft">
                        <div class="profileContentTop profileContentTop1">
                            <img src="female.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">Mother
                                Name:<?php echo " " . $myRow['mother_name'] . " " . $myRow['lname'] ?></p>
                        </div>
                        <div class="profileContentTop profileContentTop1">
                            <img src="building.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">Mother
                                Occupation:<?php echo " " . $myRow['mother_occupation'] ?></p>
                        </div>
                        <div class="profileContentTop">
                            <img src="matches.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">
                                Siblings:<?php echo " " . $myRow['siblings'] ?></p>
                        </div>
                    </div>
                    <div class="profileContent profileContentRight">
                        <div class="profileContentTop profileContentTop1">
                            <img src="male.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">Father
                                Name:<?php echo " " . $myRow['mname'] . " " . $myRow['lname']; ?></p>
                        </div>
                        <div class="profileContentTop profileContentTop1">
                            <img src="building.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">Father
                                Occupation:<?php echo " " . $myRow['father_occupation'] ?></p>
                        </div>
                        <div class="profileContentTop">
                            <img src="income.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">Family
                                Income:<?php echo " " . $myRow['family_income'] ?></p>
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
                    <button class="profileContentHeadImgR" title="Edit"
                        onclick="window.open('settings.php', target='_top')"></button>
                </div>
                <div class="profileContentOut">
                    <div class="profileContent profileContentLeft">
                        <div class="profileContentTop profileContentTop1">
                            <img src="star.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">Janma
                                Tithi:<?php echo " " . $myRow['janma_tithi'] ?></p>
                        </div>
                        <div class="profileContentTop profileContentTop1">
                            <img src="clock.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">Birth
                                Time:<?php echo " " . $myRow['birth_time'] ?></p>
                        </div>
                        <div class="profileContentTop">
                            <img src="location.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">Birth
                                Place:<?php echo " " . $myRow['birth_place'] ?></p>
                        </div>
                    </div>
                    <div class="profileContent profileContentRight">
                        <div class="profileContentTop profileContentTop1">
                            <img src="star.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">
                                Zodiac/Rashi:<?php echo " " . $myRow['zodiac'] ?></p>
                        </div>
                        <div class="profileContentTop profileContentTop1">
                            <img src="star.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">
                            Gotras: 1st - <?php echo " " . $myRow['gotra1'] ?> , 2nd - <?php echo " " . $myRow['gotra2'] ?></p>
                        </div>
                        <div class="profileContentTop">
                            <img src="user.svg" class="profileContentTopImg profileContentImg">
                            <p class="profileContentTopText profileContentText">Birth
                                Name:<?php echo " " . $myRow['birth_name'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="profileGoBack" onclick="window.open('index1.php', target='_top')">
                Back
            </button>
        </div>
    </div>

    <!-- <?php //include_once("components/bottom.php"); 
        ?> -->

    <iframe name="frame" style="display: none;"></iframe>

    <script src="../chat/dropDowns.js"></script>











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

    <script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,
            includedLanguages: "en,hi,mr,te,kn"
        }, 'google_translate_element');
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
    </script>
</body>

</html>