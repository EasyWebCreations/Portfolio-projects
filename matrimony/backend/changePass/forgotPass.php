<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="UTF-8">
  <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">

<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">

<meta name="theme-color" content="#7952b3">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-v4-rtl/4.6.0-2/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Forgot / Change Passsword</title>
  <style>
    .form-control{
      border:1px solid #460351;
    }
    .btn-primary {
    color: #fff;
    background-color: #460351;
    border-color: #460452;}
    .btn-primary:hover {
    color: #fff;
    background-color: #660351;
    border-color: #660452;}
     .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    .b-example-divider {
  height: 3rem;
  background-color: rgba(0, 0, 0, .1);
  border: solid rgba(0, 0, 0, .15);
  border-width: 1px 0;
  box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
}

.bi {
  vertical-align: -.125em;
  fill: currentColor;
}

.rounded-4 { border-radius: .5rem; }
.rounded-5 { border-radius: .75rem; }
.rounded-6 { border-radius: 1rem; }

.modal-sheet .modal-dialog {
  width: 380px;
  transition: bottom .75s ease-in-out;
}
.modal-sheet .modal-footer {
  padding-bottom: 2rem;
}

.modal-alert .modal-dialog {
  width: 380px;
}

.border-right { border-right: 1px solid #eee; }

.modal-tour .modal-dialog {
  width: 380px;
}
.modal {
    position: relative;
    /* top: 0; */
    /* right: 0; */
    /* bottom: 0; */
    /* left: 0; */
    z-index: 2;
    /* display: none; */
    /* overflow: hidden; */
    -webkit-overflow-scrolling: touch;
    outline: 0;
}
  </style>
  <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>

<body>
<?php include_once("harsh1/navBar.php"); ?>
<div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Forget Password?</h2>
        <link rel="stylesheet" href="harsh1/navBar.css">
      </div>

      <div class="modal-body p-5 pt-0">
        <div class="input" id="register">
        <form  action="otpF.php" method="POST">
          <div class="form-floating mb-3">
          <label for="floatingInput">Email address</label>
            <input type="email" class="form-control rounded-4" name="email" required placeholder="Enter Email Id">
            
          </div>
          <div class="form-floating mb-3">
          <label for="floatingPassword">Mobile Number</label>
            <input type="text" class="form-control rounded-4"pattern="[6789][0-9]{9}" required name="mobile" id="mobile" placeholder="Enter mobile number">
          </div>
          <div class="form-floating mb-3">
          <label for="floatingPassword">OTP</label>
            <input type="text" class="form-control rounded-4" name="inotp" id="otp" required placeholder="Enter OTP sent to your mobile number">
          </div>
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" onclick="optstatus()" id="regtr1" name="send_otp" type="button">Send OTP</button>
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" id="regtr" name="register" type="submit">Verify</button>
         
        </form>
</div>
      </div>
    </div>
  </div>
</div>
  <!--Login and register option-->
  <!-- <div class="input" id="register">
    <form method="POST">
      Mobile Number<input type="text" title="Please enter valid phone number" pattern="[6789][0-9]{9}" name="mobile" id="mobile" placeholder="Enter valid mobile number" required><br>
      <span id="optstatus"><input type="button" value="Send OTP" onclick="optstatus()" id="regtr1" name="send_otp"></span>
    </form>
    <form action="otpF.php" method="post">
      <input type="email" name="email" placeholder="Enter Email ID" required>
      OTP<input type="number" name="inotp" id="otp" placeholder="Enter OTP" required><br>
      <span><input type="submit" value="Verify" id="regtr" name="register"></span>
    </form>
  </div> -->
  <br>
  <script type="text/JavaScript">
    $(document).ready(function () {
  // Listen to click event on the submit button
  $('#regtr1').click(function (e) {

    e.preventDefault();

    var mobile = $("#mobile").val();

    $.post("../sendotp.php", {
      mobile: mobile,
    }).complete(function() {
        console.log("Success");
      });
  });
});
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
  <script>
    var area = document.getElementById('optstatus');
    var initbtn = document.getElementById('regtr1');

    function optstatus() {
      var mobile = document.getElementById("mobile");
      var otp = document.getElementById("otp");
      var btn = document.getElementById("regtr1");
      if (mobile.value != '' && mobile.value.length == 10) {
        area.innerHTML = '<p>OTP sent!</p>';
        initbtn.style.display = "none";
      } else {
        alert("Kindly enter valid details!");
      }
    }
  </script>
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>



  <script>
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
  </script>
</body>

</html>