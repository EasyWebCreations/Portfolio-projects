<?php
$pathForCache = "../";
include_once("../harsh1/helper/currentUserQuery.php");
// echo '<div class="belowNav">
//   <a href="#" class="belowNavText">
//     Find Matches
//   </a>
//   <button class="filterBtnMobile">
//     <img class="filterBtnImgMobile" src="../harsh1/filter.svg">
//     <p class="filterBtnTextMobile">Filters</p>
//   </button>
//   <div class="belowNavImgCont">
//     <a href="chat.php" class="belowNavImg belowNavImg1"></a>
//     <a href="profile.php" style="margin:0px 10px;" class="belowNavImg belowNavImg2">
//     </a>
//     <button class="belowNavImg belowNavImg3" title="' . $row['fname'] . ' ' . $row['lname'] . '" onclick="moreOptionsProfileOpen()"></button>
//     <button class="belowNavMoreMobile" onclick="moreOptionsOpenMobile()"></button>
//   </div>
// </div>

// <div class="moreOptionsProfileOut">
//     <div class="moreOptionsProfile moreOptionsProfile">
//       <img src="../harsh1/user.svg" class="moreOptionsImgProfile">
//       <a href="../harsh1/myProfile.php" class="moreOptionsTextProfile">My Profile</a>
//     </div>
//     <div class="moreOptionsProfile moreOptionsProfile2">
//       <img src="../harsh1/oneGear.svg" class="moreOptionsImgProfile">
//       <a href="../harsh1/settings.php" class="moreOptionsTextProfile">Settings</a>
//     </div>
//     <div class="moreOptionsProfile moreOptionsProfile3">
//       <img src="../harsh1/key.svg" class="moreOptionsImgProfile">
//       <a href="../backend/changePass/forgotPass.php" class="moreOptionsTextProfile">Change Password</a>
//     </div>
//     <div class="moreOptionsProfile moreOptionsProfile4">
//       <img src="../harsh1/redo.svg" class="moreOptionsImgProfile">
//       <a href="#" class="moreOptionsTextProfile">Renew Plan</a>
//     </div>
//     <div class="moreOptionsProfile moreOptionsProfile5">
//       <img src="../harsh1/logout.svg" class="moreOptionsImgProfile">
//       <a href="../backend/logout.php" class="moreOptionsTextProfile">Logout</a>
//     </div>
//   </div>

//   <div class="moreOptionsOutMobile">
//     <div class="moreOptionsMobile moreOptionsMobile1">
//       <img src="../harsh1/home.svg" class="moreOptionsImgMobile">
//       <a href="../harsh1/index1.php" class="moreOptionsTextMobile">Home</a>
//     </div>
//     <div class="moreOptionsMobile moreOptionsMobile2">
//       <img src="../harsh1/aboutUs.svg" class="moreOptionsImgMobile">
//       <a href="#" class="moreOptionsTextMobile">About Us</a>
//     </div>
//     <div class="moreOptionsMobile moreOptionsMobile3">
//       <img src="../harsh1/events.svg" class="moreOptionsImgMobile">
//       <a href="#" class="moreOptionsTextMobile">Events</a>
//     </div>
//     <div class="moreOptionsMobile moreOptionsMobile4">
//       <img src="../harsh1/contactUs.svg" class="moreOptionsImgMobile">
//       <a href="#" class="moreOptionsTextMobile">Contact Us</a>
//     </div>
//   </div>';
?>
<div class="belowNav">
  <a href="#" class="belowNavText">
    Find Matches
  </a>
  <!-- <button class="filterBtnMobile">
    <img class="filterBtnImgMobile" src="../harsh1/filter.svg">
    <p class="filterBtnTextMobile">Filters</p>
  </button> -->
  <div class="belowNavImgCont">
    <a href="chat.php" class="belowNavImg belowNavImg1"></a>
    <a href="profile.php" style="margin:0px 10px;" class="belowNavImg belowNavImg2">
    </a>
    <button class="belowNavImg belowNavImg3" title="<?php echo $row['fname'] . ' ' . $row['lname'] ?>" onclick="moreOptionsProfileOpen()"></button>
    <button class="belowNavMoreMobile" onclick="moreOptionsOpenMobile()"></button>
  </div>
</div>

<div class="moreOptionsProfileOut">
  <div class="moreOptionsProfile moreOptionsProfile">
    <img src="../harsh1/user.svg" class="moreOptionsImgProfile">
    <a href="../harsh1/myProfile.php" class="moreOptionsTextProfile">My Profile</a>
  </div>
  <div class="moreOptionsProfile moreOptionsProfile2">
    <img src="../harsh1/oneGear.svg" class="moreOptionsImgProfile">
    <a href="../harsh1/settings.php" class="moreOptionsTextProfile">Settings</a>
  </div>
  <div class="moreOptionsProfile moreOptionsProfile3">
    <img src="../harsh1/key.svg" class="moreOptionsImgProfile">
    <a href="../backend/changePass/forgotPass.php" class="moreOptionsTextProfile">Change Password</a>
  </div>
  <div class="moreOptionsProfile moreOptionsProfile4">
    <img src="../harsh1/redo.svg" class="moreOptionsImgProfile">
    <a href="../harsh1/premium/payment.php" class="moreOptionsTextProfile">Renew Plan</a>
  </div>
  <div class="moreOptionsProfile moreOptionsProfile5">
    <img src="../harsh1/logout.svg" class="moreOptionsImgProfile">
    <a href="../backend/logout.php" class="moreOptionsTextProfile">Logout</a>
  </div>
</div>

<div class="moreOptionsOutMobile">
  <div class="moreOptionsMobile moreOptionsMobile1">
    <img src="../harsh1/home.svg" class="moreOptionsImgMobile">
    <a href="../index.php" class="moreOptionsTextMobile">Home</a>
  </div>
  <div class="moreOptionsMobile moreOptionsMobile2">
    <img src="../harsh1/aboutUs.svg" class="moreOptionsImgMobile">
    <a href="../index.php#about" class="moreOptionsTextMobile">About Us</a>
  </div>
  <div class="moreOptionsMobile moreOptionsMobile3">
    <img src="../harsh1/events.svg" class="moreOptionsImgMobile">
    <a href="../index.php#eventsSection" class="moreOptionsTextMobile">Events</a>
  </div>
  <div class="moreOptionsMobile moreOptionsMobile4">
    <img src="../harsh1/contactUs.svg" class="moreOptionsImgMobile">
    <a href="../index.php#contactUsSection" class="moreOptionsTextMobile">Contact Us</a>
  </div>
</div>