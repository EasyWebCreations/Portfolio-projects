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
  // var reader = new FileReader();
  // reader.onload = function(e) {
  //   // fileExt = e.target.files[0].type;
  //   // var filePath = $("#upload").val();
  //   var filePath = "";
  //   fileExt = filePath.substr(filePath.lastIndexOf('.') + 1, filePath.length);
  //   // console.log("File Extension ->-> " + file_ext);
  //   $uploadCrop.croppie('bind', {
  //     url: ""
  //   }).then(function() {
  //     console.log('jQuery bind complete');
  //   });

  // }
  // reader.readAsDataURL(this.files[0]);
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
          success: function(data) {
            // // html = '<img src="' + resp + '" />';
            // // $("#upload-demo-i").html(html);
            // alert("Profile Image Uploaded Successfully!");

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
      includedLanguages: "en,mr,hi,te"
    }, 'google_translate_element');
  }
</script>

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
      filterOpen.style.height = "20vw";
    } else {
      filterOpen.style.height = "0vw";
      filterOpen.style.visibility = "hidden";
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

  // To Open Close Elements

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

  window.addEventListener('click', function(e) {
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

  window.addEventListener('click', function(e) {
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

  // let sideBarMobile = document.getElementsByClassName("sideBarMobile");

  // function hamburgerOpen() {
  //   if (sideBarMobile[0].style.visibility == "hidden" || sideBarMobile[0].style.visibility == "") {
  //     sideBarMobile[0].style.visibility = "visible";
  //     sideBarMobile[0].style.width = "100vw";
  //   } else {
  //     sideBarMobile[0].style.width = "0vw";
  //     sideBarMobile[0].style.visibility = "hidden";
  //   }
  // }

  // let moreOptionsOutMobile = document.getElementsByClassName("moreOptionsOutMobile");

  // function moreOptionsOpenMobile() {
  //   if (moreOptionsOutMobile[0].style.visibility == "hidden" || moreOptionsOutMobile[0].style.visibility == "") {
  //     moreOptionsOutMobile[0].style.visibility = "visible";
  //     moreOptionsOutMobile[0].style.width = "45vw";
  //     moreOptionsOutMobile[0].style.height = "46vw";
  //   } else {
  //     moreOptionsOutMobile[0].style.width = "0vw";
  //     moreOptionsOutMobile[0].style.height = "0vw";
  //     moreOptionsOutMobile[0].style.visibility = "hidden";
  //   }
  // }

  // let moreOptionsProfileOut = document.getElementsByClassName("moreOptionsProfileOut");
  // let viewWidth = window.matchMedia("(max-width: 720px)");

  // function moreOptionsProfileOpen() {
  //   if (viewWidth.matches) {
  //     if (moreOptionsProfileOut[0].style.visibility == "hidden" || moreOptionsProfileOut[0].style.visibility == "") {
  //       moreOptionsProfileOut[0].style.visibility = "visible";
  //       moreOptionsProfileOut[0].style.width = "50vw";
  //       moreOptionsProfileOut[0].style.height = "62vw";
  //     } else {
  //       moreOptionsProfileOut[0].style.width = "0vw";
  //       moreOptionsProfileOut[0].style.height = "0vw";
  //       moreOptionsProfileOut[0].style.visibility = "hidden";
  //     }
  //   } else {
  //     if (moreOptionsProfileOut[0].style.visibility == "hidden" || moreOptionsProfileOut[0].style.visibility == "") {
  //       moreOptionsProfileOut[0].style.visibility = "visible";
  //       moreOptionsProfileOut[0].style.width = "16vw";
  //       moreOptionsProfileOut[0].style.height = "15vw";
  //     } else {
  //       moreOptionsProfileOut[0].style.width = "0vw";
  //       moreOptionsProfileOut[0].style.height = "0vw";
  //       moreOptionsProfileOut[0].style.visibility = "hidden";
  //     }
  //   }
  // }

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