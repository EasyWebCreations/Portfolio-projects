<?php
echo '<header class="navBar">
  <div class="navImgOut" onclick="window.open(\'index.php\', target=\'_top\')">
    <img src="harsh1/AkshadaLogo.png" class="navImg">
  </div>
  <div class="navBtnCont">
  <div id="google_translate_element"></div>
  <a href="../../index.php#endofpage"><button class="navBtn">About Us</button></a>
    <a href="../../index.php#event"><button class="navBtn">Events</button></a>
    <a href="../../index.php#endofpage"><button class="navBtn">Contact Us</button></a>
    <!-- <button class="navBtn">Youth</button> -->
    <button class="hamburgerBtn" onclick="moreOptionsOpenMobile()">
      <img src="harsh1/more.svg">
    </button>
  </div>
</header>
<div class="moreOptionsOutMobile">
    <div class="moreOptionsMobile moreOptionsMobile2">
      <img src="harsh1/aboutUs.svg" class="moreOptionsImgMobile">
      <a href="#" class="moreOptionsTextMobile">About Us</a>
    </div>
    <div class="moreOptionsMobile moreOptionsMobile3">
      <img src="harsh1/events.svg" class="moreOptionsImgMobile">
      <a href="../../../index.php#btnstory" class="moreOptionsTextMobile">Events</a>
    </div>
    <div class="moreOptionsMobile moreOptionsMobile4">
      <img src="harsh1/contactUs.svg" class="moreOptionsImgMobile">
      <a href="#" class="moreOptionsTextMobile">Contact Us</a>
    </div>
  </div>';
