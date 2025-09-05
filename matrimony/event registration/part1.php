<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Event Registration</title>
    <style>
        .btn-primary {
    color: #fff;
    background-color: #5f0449;
    border-color: #660350;
        }
        .btn-primary:hover{
            background-color: #660350;
            border-color: #660350;
        }
    </style>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <!--====== HEADER PART START ======-->

  <header class="header-area">
        <div class="navbar-area navbar-two">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="assets/images/logo.png" alt="Logo">
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTwo" aria-controls="navbarTwo" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarTwo">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#event">Schedules</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#team">Speakers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#gallery">Gallery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#pricing">Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">Contact</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="navbar-btn d-none d-sm-inline-block">
                                <a class="main-btn" href="#">Get a Ticket</a>
                            </div>
                        </nav>
                        <!-- navbar -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>

        <div id="home" class="header-content-area bg_cover d-flex align-items-center" style="background-image: url(assets/images/header-bg.png)">
            <div class="container my-5 " id="mainForm">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        
  <?php

$MERCHANT_KEY = "LZEaygOA";

$txnid = "Txn" . rand(10000,99999999);

?>
    <div class="container my-5">
        <form class="row g-3 needs-validation" method="post" action="eventPay.php">
          <input type="hidden" name="surl" id="surl" value="https://test-akshadaa.herokuapp.com/harsh1/premium/success.php" />
<input type="hidden" name="furl" id="furl" value="https://test-akshadaa.herokuapp.com/harsh1/premium/fail.php" />
            <div class="col-md-4">
              <label for="validationCustom01" class="form-label">First Name</label>
              <input type="text" name="firstname"  class="form-control" pattern="([^\s][A-z0-9À-ž\s]+)" id="validationCustom01" required>
            </div>
            <div class="col-md-4">
              <label for="validationCustom02" class="form-label">Last Name</label>
              <input type="text" name="lastname" class="form-control" pattern="([^\s][A-z0-9À-ž\s]+)" id="validationCustom02" required>
            </div>
            <div class="col-md-4">
              <label for="validationCustomUsername" class="form-label">Akshadaa Id</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" pattern="([^\s][A-z0-9À-ž\s]+)" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
              </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom04" class="form-label">First Gotram</label>
                <select class="form-select" id="validationCustom04" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="airan">Airan/Aeron</option>
                    <option value="bansal">Bansal</option>
                    <option value="bindal">Bindal/Vindal</option>
                    <option value="dharan">Dharan/Deran</option>
                    <option value="garg">Garg/Gargeya</option>
                    <option value="goyal">Goyal/Goel</option>
                  </select>
                
            </div>
            <div class="col-md-6">
                <label for="validationCustom044" class="form-label">Second Gotram</label>
                <select class="form-select" id="validationCustom044" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="airan">Airan/Aeron</option>
                    <option value="bansal">Bansal</option>
                    <option value="bindal">Bindal/Vindal</option>
                    <option value="dharan">Dharan/Deran</option>
                    <option value="garg">Garg/Gargeya</option>
                    <option value="goyal">Goyal/Goel</option>
                  </select>
            </div>
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Date of Birth </label>
                <input type="date" class="form-control" id="validationCustom03" required>
            </div>
            <div class="col-md-4">
              <label for="validationCustom031" class="form-label">Blood Group</label>
              <select class="form-select" id="validationCustom031" required>
                  <option selected disabled value="">Choose...</option>
                  <option value="a+">A+</option>
                  <option value="a-">A-</option>
                  <option value="b+">B+</option>
                  <option value="b-">B-</option>
                  <option value="ab+">AB+</option>
                  <option value="ab-">AB-</option>
                  <option value="o+">O+</option>
                  <option value="o-">O-</option>
                </select>
          </div>
          <div class="col-md-4">
            <input type="hidden" name="productinfo" id="productinfo" value="Event Registration" />
            <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY;?>">
            <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
            <input type="hidden" name="txnid" value="<?php echo $txnid;?>">
            <label for="validationCustom032" class="form-label">Birth Name</label>
            <input type="text" class="form-control" pattern="([^\s][A-z0-9À-ž\s]+)" id="validationCustom032" required>
        </div>
            <div class="col-md-4">
                <label for="validationCustom033" class="form-label">Email Id</label>
                <input type="email" name="email" class="form-control" id="validationCustom033" required>
            </div>
            <div class="col-md-4">
                <label for="validationCustom034" class="form-label">Contact Number</label>
                <input type="text" pattern="[6789][0-9]{9}" class="form-control" id="validationCustom034" required>
            </div>
            <div class="col-md-4">
                <label for="validationCustom035" class="form-label">WhatsApp Number</label>
                <input type="text" name="phone" pattern="[6789][0-9]{9}" class="form-control" id="validationCustom035" required>
            </div>
            <div class="col-md-4">
                <label for="formFile"  class="form-label">Image File</label>
                <input class="form-control" type="file" accept="image/*" id="formFile" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Education</label>
              <input class="form-control" pattern="([^\s][A-z0-9À-ž\s]+)" type="text" id="formFile" required>
          </div>
          <div class="col-md-4">
            <label class="form-label">Profession</label>
            <input class="form-control" pattern="([^\s][A-z0-9À-ž\s]+)" type="text" id="formFile" required>
        </div>
            <div class="col-md-12">
              <label for="validationCustom037" class="form-label">Permenant Address</label>
              <input type="text" pattern="([^\s][A-z0-9À-ž\s]+)" class="form-control" id="validationCustom037" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Partner's Education</label>
              <input class="form-control" pattern="([^\s][A-z0-9À-ž\s]+)" type="text" id="formFile" required>
          </div>
          <div class="col-md-4">
            <label class="form-label">Partner's Expectations</label>
            <input class="form-control" pattern="([^\s][A-z0-9À-ž\s]+)" type="text" id="formFile" required>
        </div>
        <div class="col-md-4">
          <label class="form-label">Number of parent/relatives attending the event</label>
          <select class="form-select" id="numberParent" required>
            <option selected value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
          </select>
      </div>
      <div class="col-md-4">
        <label class="form-label">Default Rate</label>
        <input type="button"  class="form-control"  value="₹ 4400" disabled>
    </div>
    <div class="col-md-4">
      <label  class="form-label">Rate for parents (₹ 1200/- per head)</label>
      <input type="button"  id="parentRate" class="form-control"  value="₹ 3600" disabled>
  </div>
  <div class="col-md-4">
    <label class="form-label">Total Price</label>
    <input type="button"  id="grandTotal" class="form-control btn btn-danger"  value="₹ 8000" disabled>
    <input type="number" name="amount" id="amount" hidden>
</div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Pay & Register</button>
            </div>
          </form>
    </div>
                        <!-- header content -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- header content -->
    </header>

    <!--====== HEADER PART ENDS ======-->


    <script>
      setInterval(() =>{
        var numberParent = document.getElementById("numberParent");
        var parentRate = document.getElementById("parentRate");
        var grandTotal = document.getElementById("grandTotal");
        var parentRateLast = (numberParent).value * 1200;
        parentRate.value = '₹ ' + parentRateLast;
        var grandTotalLast = parentRateLast + 4400;
        grandTotal.value = '₹ ' + grandTotalLast;
        var amount = document.getElementById("amount");
        amount.value = grandTotalLast;
      },500);

    </script>
</body>
</html>