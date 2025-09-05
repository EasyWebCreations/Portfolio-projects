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

window.addEventListener('click', function (e) {
  if (moreOptionsOutMobile[0].contains(e.target)) {
    // Clicked inside the box
    console.log('Inside menu');
  } else {
    // Clicked outside the box
    if (moreOptionsOutMobile[0].style.visibility == "visible" && !document.getElementsByClassName('belowNavMoreMobile')[0].contains(e.target)) {
      moreOptionsOutMobile[0].style.width = "0vw";
      moreOptionsOutMobile[0].style.height = "0vw";
      moreOptionsOutMobile[0].style.visibility = "hidden";
    }
  }
});

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

window.addEventListener('click', function (e) {
  if (moreOptionsProfileOut[0].contains(e.target)) {
    // Clicked inside the box
    console.log('Inside menu');
  } else {
    // Clicked outside the box
    if (moreOptionsProfileOut[0].style.visibility == "visible" && !document.getElementsByClassName('belowNavImg3')[0].contains(e.target)) {
      moreOptionsProfileOut[0].style.width = "0vw";
      moreOptionsProfileOut[0].style.height = "0vw";
      moreOptionsProfileOut[0].style.visibility = "hidden";
    }
  }
});