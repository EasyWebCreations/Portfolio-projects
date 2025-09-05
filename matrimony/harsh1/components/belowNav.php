<?php
include_once("helper/currentUserQuery.php");
// echo '<div class="belowNav">
//   <a href="#" class="belowNavText">
//     Find Matches
//   </a>
//   <button class="filterBtnMobile">
//     <img class="filterBtnImgMobile" src="filter.svg">
//     <p class="filterBtnTextMobile">Filters</p>
//   </button>
//   <div class="belowNavImgCont">
//     <a href="../chat/chat.php" class="belowNavImg belowNavImg1"></a>
//     <a href="../chat/profile.php" style="margin:0px 10px;" class="belowNavImg belowNavImg2">
//     </a>
//     <button class="belowNavImg belowNavImg3" title="' . $row['fname'] . '" onclick="moreOptionsProfileOpen()"></button>
//     <button class="belowNavMoreMobile" onclick="moreOptionsOpenMobile()"></button>
//   </div>
// </div>

// <div class="moreOptionsProfileOut">
//     <div class="moreOptionsProfile moreOptionsProfile">
//       <img src="user.svg" class="moreOptionsImgProfile">
//       <a href="myProfile.php" class="moreOptionsTextProfile">My Profile</a>
//     </div>
//     <div class="moreOptionsProfile moreOptionsProfile2">
//       <img src="oneGear.svg" class="moreOptionsImgProfile">
//       <a href="settings.php" class="moreOptionsTextProfile">Settings</a>
//     </div>
//     <div class="moreOptionsProfile moreOptionsProfile3">
//       <img src="key.svg" class="moreOptionsImgProfile">
//       <a href="../backend/changePass/forgotPass.php" class="moreOptionsTextProfile">Change Password</a>
//     </div>
//     <div class="moreOptionsProfile moreOptionsProfile4">
//       <img src="redo.svg" class="moreOptionsImgProfile">
//       <a href="#" class="moreOptionsTextProfile">Renew Plan</a>
//     </div>
//     <div class="moreOptionsProfile moreOptionsProfile5">
//       <img src="logout.svg" class="moreOptionsImgProfile">
//       <a href="../backend/logout.php" class="moreOptionsTextProfile">Logout</a>
//     </div>
//   </div>

//   <div class="moreOptionsOutMobile">
//     <div class="moreOptionsMobile moreOptionsMobile1">
//       <img src="home.svg" class="moreOptionsImgMobile">
//       <a href="index1.php" class="moreOptionsTextMobile">Home</a>
//     </div>
//     <div class="moreOptionsMobile moreOptionsMobile2">
//       <img src="aboutUs.svg" class="moreOptionsImgMobile">
//       <a href="#" class="moreOptionsTextMobile">About Us</a>
//     </div>
//     <div class="moreOptionsMobile moreOptionsMobile3">
//       <img src="events.svg" class="moreOptionsImgMobile">
//       <a href="#" class="moreOptionsTextMobile">Events</a>
//     </div>
//     <div class="moreOptionsMobile moreOptionsMobile4">
//       <img src="contactUs.svg" class="moreOptionsImgMobile">
//       <a href="#" class="moreOptionsTextMobile">Contact Us</a>
//     </div>
//   </div>';
?>
<div class="belowNav">
  <a href="#" class="belowNavText">
    Find Matches
  </a>
  <button class="filterBtnMobile"  onclick="filterFunction()">
    <img class="filterBtnImgMobile" src="filter.svg">
    <!-- <p class="filterBtnTextMobile">Filters</p> -->
  </button>
  <div class="searchOptMobile" style="height: 100%;">
    <input id="searchTextInPage1" type="text" placeholder="Search" class="filterBtnTextMobile" style="width: 25vw; font-size: 4vw; outline: none; color: black; border-bottom: 0.1vw solid black; border-radius: 0px; border-width: 0px 0px 0.1vw 0px;">
    <a href="#" class="filterBtnImgMobile" onclick="searchTextFunc1()" style="font-size: 5vw; padding: 0px; margin-left: 0.3vw; color: black; text-decoration: none; border: none;">&#128269;</a>
  </div>
  <input id="searchTextInPage" type="text" placeholder="Search" class="navBtn" style="color: black; border-bottom: 0.1vw solid black; border-radius: 0px; border-width: 0px 0px 0.1vw 0px;">
  <a href="#" class="navBtn" onclick="searchTextFunc()" style="color: black; text-decoration: none; border: none;">&#128269;</a>
  <div class="belowNavImgCont">
    <a href="../chat/chat.php" class="belowNavImg belowNavImg1"></a>
    <a href="../chat/profile.php" style="margin:0px 10px;" class="belowNavImg belowNavImg2">
    </a>
    <button class="belowNavImg belowNavImg3" title="<?php echo $row['fname'] ?>" onclick="moreOptionsProfileOpen()"></button>
    <button class="belowNavMoreMobile" onclick="moreOptionsOpenMobile()"></button>
  </div>
</div>

<div class="moreOptionsProfileOut">
  <div class="moreOptionsProfile moreOptionsProfile">
    <img src="user.svg" class="moreOptionsImgProfile">
    <a href="myProfile.php" class="moreOptionsTextProfile">My Profile</a>
  </div>
  <div class="moreOptionsProfile moreOptionsProfile2">
    <img src="oneGear.svg" class="moreOptionsImgProfile">
    <a href="settings.php" class="moreOptionsTextProfile">Settings</a>
  </div>
  <div class="moreOptionsProfile moreOptionsProfile3">
    <img src="key.svg" class="moreOptionsImgProfile">
    <a href="../backend/changePass/forgotPass.php" class="moreOptionsTextProfile">Change Password</a>
  </div>
  <div class="moreOptionsProfile moreOptionsProfile4">
    <img src="redo.svg" class="moreOptionsImgProfile">
    <a href="premium/payment.php" class="moreOptionsTextProfile">Renew Plan</a>
  </div>
  <div class="moreOptionsProfile moreOptionsProfile5">
    <img src="logout.svg" class="moreOptionsImgProfile">
    <a href="../backend/logout.php" class="moreOptionsTextProfile">Logout</a>
  </div>
</div>

<div class="moreOptionsOutMobile">
  <div class="moreOptionsMobile moreOptionsMobile1">
    <img src="home.svg" class="moreOptionsImgMobile">
    <a href="../index.php" class="moreOptionsTextMobile">Home</a>
  </div>
  <div class="moreOptionsMobile moreOptionsMobile2">
    <img src="aboutUs.svg" class="moreOptionsImgMobile">
    <a href="../index.php#about" class="moreOptionsTextMobile">About Us</a>
  </div>
  <div class="moreOptionsMobile moreOptionsMobile3">
    <img src="events.svg" class="moreOptionsImgMobile">
    <a href="../index.php#eventsSection" class="moreOptionsTextMobile">Events</a>
  </div>
  <div class="moreOptionsMobile moreOptionsMobile4">
    <img src="contactUs.svg" class="moreOptionsImgMobile">
    <a href="../index.php#contactUsSection" class="moreOptionsTextMobile">Contact Us</a>
  </div>
</div>