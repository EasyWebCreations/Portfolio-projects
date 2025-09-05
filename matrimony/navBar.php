<?php
// echo '<header class="navBar">
//   <div class="navImgOut" onclick="window.open(\'index.php\', target=\'_top\')">
//     <img src="harsh1/AkshadaLogo.png" class="navImg">
//   </div>
//   <div class="navBtnCont">
//   <div id="google_translate_element"></div>
//     <button class="navBtn">About Us</button>
//     <button class="navBtn">Events</button>
//     <button class="navBtn">Contact Us</button>
//     <!-- <button class="navBtn">Youth</button> -->
//     <button class="hamburgerBtn" onclick="moreOptionsOpenMobile()">
//       <img src="harsh1/more.svg">
//     </button>
//   </div>
// </header>
// <div class="moreOptionsOutMobile">
//     <div class="moreOptionsMobile moreOptionsMobile2">
//       <img src="harsh1/aboutUs.svg" class="moreOptionsImgMobile">
//       <a href="#" class="moreOptionsTextMobile">About Us</a>
//     </div>
//     <div class="moreOptionsMobile moreOptionsMobile3">
//       <img src="harsh1/events.svg" class="moreOptionsImgMobile">
//       <a href="#" class="moreOptionsTextMobile">Events</a>
//     </div>
//     <div class="moreOptionsMobile moreOptionsMobile4">
//       <img src="harsh1/contactUs.svg" class="moreOptionsImgMobile">
//       <a href="#" class="moreOptionsTextMobile">Contact Us</a>
//     </div>
//   </div>';
?>
<header class="navBar">
  <div class="navImgOut" onclick="window.open('index.php', target='_top')">
    <img src="harsh1/AkshadaLogo.png" class="navImg">
  </div>
  <div class="navBtnCont">
    <div id="google_translate_element"></div>
    <!-- <input id="searchTextInPage" type="text" placeholder="Search" class="navBtn">
    <a href="#" class="navBtn" onclick="searchTextFunc()" style="color: white; text-decoration: none;">&#128269;</a> -->
    <a href="#about" class="navBtn">About Us</a>
    <a href="#eventsSection" class="navBtn">Events</a>
    <a href="#contactUsSection" class="navBtn">Contact Us</a>
    <button class="hamburgerBtn" onclick="moreOptionsOpenMobile()">
      <img src="harsh1/more.svg">
    </button>
  </div>
</header>
<div class="moreOptionsOutMobile">
  <!-- <div class="moreOptionsMobile moreOptionsMobile4">
    <input type="text" placeholder="Search" class="moreOptionsTextMobile">
    <a href="#" class="moreOptionsImgMobile">&#128269;</a>
  </div> -->
  <div class="moreOptionsMobile moreOptionsMobile2">
    <img src="harsh1/aboutUs.svg" class="moreOptionsImgMobile">
    <a href="#about" class="moreOptionsTextMobile">About Us</a>
  </div>
  <div class="moreOptionsMobile moreOptionsMobile3">
    <img src="harsh1/events.svg" class="moreOptionsImgMobile">
    <a href="#eventsSection" class="moreOptionsTextMobile">Events</a>
  </div>
  <div class="moreOptionsMobile moreOptionsMobile4">
    <img src="harsh1/contactUs.svg" class="moreOptionsImgMobile">
    <a href="#contactUsSection" class="moreOptionsTextMobile">Contact Us</a>
  </div>
</div>