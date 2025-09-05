<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Risk management</title>
  <script src="index.js"></script>
  <link rel="stylesheet" href="style.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&family=Varela+Round&display=swap" rel="stylesheet"> -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora:wght@500&display=swap" rel="stylesheet">
  <style>
    /* #myTab-1{
  
  padding: 2px;
  font-family: 'Josefin Sans', sans-serif;
} */
    body {
      background-image: url("background.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
      background-position: center;
      text-align: center;
    }

    .heading {
      margin-left: 20%;
      margin-top: 5%;
      margin-right: 4%;
      font-family: 'Lora', serif;
      margin-bottom: 3%;
      font-size: 6vw;
      color: #864000;
      /* font-size: 70px; */
    }

    .nav {
      /* padding: 2px; */
      font-size: 20px;
      /* border-bottom: 0px; */
      /* margin-top: 20px; */
    }

    .nav .nav-tabs {
      /* border-bottom: 0px;
  border: 1px solid transparent; */
    }

    #myTab-1 {
      border-bottom: 0px;
      font-family: 'Oswald', sans-serif;
    }

    #myTab-2 {
      border-bottom: 0px;
      font-family: 'Oswald', sans-serif;
    }

    #myTab-3 {
      border-bottom: 0px;
      font-family: 'Oswald', sans-serif;
    }

    #myTab-4 {
      border-bottom: 0px;
      font-family: 'Oswald', sans-serif;
    }

    #myTab-5 {
      border-bottom: 0px;
      font-family: 'Oswald', sans-serif;
    }

    /* .mine {
      border: 1px solid rgb(170, 168, 168);
      background-color: #F0ECE3;

      box-shadow: 5px 10px #888888;
      
      margin: 20px;
      padding: 10px;
    } */

    .nav .nav-link {
      color: #1d1d1d;
      /* padding: 0; */
      padding: 0;
      margin: 6%;
      /* align-items: center; */
      vertical-align: middle;
    }

    .nav .nav-link:hover {
      transform: scale(1.1);
      color: black;
    }

    /* .nav .nav-link .active {
  border-bottom: 3px solid black;
} */

    .demo {
      font-family: 'Orelega One', cursive;
      font-size: 25px;
    }

    .nav-item {
      display: inline-block;
      width: 250px;
      height: 85px;
      background-color: #92A9BD !important;
      color: #F7F7F7 !important;
      padding: 10px;
      margin: 0%;
      vertical-align: middle;
      text-decoration: none;
      text-align: center;
      /* font: normal 18px/20px Roboto, san-serf; */
      /* Font: Font-style Font-weight Font-size/line-height Font-family */
      cursor: pointer;
      /* margin-left: -4px; */
      /* transition: all .3s ease-in-out; */
    }

    p {
      font-size: 1.5rem;
      font-weight: 370;
    }

    #body6-tab {
      margin: 2%;
    }

    #body7-tab {
      margin: 2%;
    }

    #body11-tab {
      margin: 2%;
    }

    input[type="number"] {

      font-size: 1.3rem;
      font-weight: 370;
      color: black;
    }

    input[type="text"] {

      font-size: 1.3rem;
      font-weight: 370;
      color: black;
    }

    @media (max-width: 825px) {
      img#yourImage {
        display: none;
      }
    }

    .pdf {
      visibility: hidden;
    }

    .pdf-1 {
      border: 2px solid black;
      margin: 10%;
    }

    table,
    td,
    tr {
      border: 1px solid black;
      padding: 1%;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    .p1 {
      border: 1px solid black;
      text-align: center;
    }

    .p2 {
      border: 1px solid black;
    }

    #pro {
      width: 50%;
    }

    .header {
      background-color: orange;
      text-align: center;
    }

    .option {
      background-color: #f2f2f2;
    }

    .button-print {
      appearance: none;
      background-color: #FFFFFF;
      border-radius: 0.5em;
      border-style: none;
      box-shadow: #C9CCD5 0 -12px 6px inset;
      box-sizing: border-box;
      color: #000000;
      cursor: pointer;
      display: inline-block;
      font-family: 'Raleway', sans-serif;
      /* font-family: -apple-system, sans-serif;*/
      font-size: 1.2rem;
      font-weight: 600;
      letter-spacing: -.24px;
      margin: 0;
      outline: none;
      padding: 1rem 1.3rem;
      quotes: auto;
      text-align: center;
      text-decoration: none;
      transition: all .15s;
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
    }

    .button-print:hover {
      background-color: #92A9BD;
      box-shadow: #92A9BD 0 -6px 8px inset;
      transform: scale(1.125);
    }

    .button-print:active {
      transform: scale(1.025);
    }

    @media (min-width: 768px) {
      .button-print {
        font-size: 1.5rem;
        padding: .75rem 2rem;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="color: cyan">Risk management</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ">
          <a class="nav-link active" aria-current="page" href="#" style="color: #fff"></a>
          <a class="nav-link active" aria-current="page" href="creative.html" style="color: #fff">Creative Mode</a>
          <a class="nav-link active" aria-current="page" onclick="PrintElem()"
            style="color: #fff; cursor: pointer;">Print pdf</a>

        </div>
      </div>
    </div>
  </nav>


  <div class="container">
    <div style="display:flex">
      <h1 class="heading">
        Risk Management</h1>
      <img src="risk icon.svg" id="yourImage" style="width:150px;height:130px;margin-top:2%">
    </div>
    <!-- <ul class="nav nav-tabs justify-content-center " id="myTab-1" role="tablist">
      <li class="nav-item" role="presentation" id="tab-0">
        <a class="nav-link active" id="body0-tab" data-bs-toggle="tab" data-bs-target="#body0" type="bottom" role="tab"
          aria-controls="body0" aria-selected="true">
          Details
        </a>
      </li>
      <li class="nav-item" role="presentation" id="tab-1">
        <a class="nav-link" id="body1-tab" data-bs-toggle="tab" data-bs-target="#body1" type="bottom" role="tab"
          aria-controls="body1" aria-selected="false">
          Base Cover
        </a>
      </li>

    </ul> -->
    <!-- <div class="container col-xxl-8 px-4 py-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
          <img src="bootstrap-themes.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
            height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
          <h1 class="display-5 fw-bold lh-1 mb-3">Responsive left-aligned hero with image</h1>
          <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most
            popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system,
            extensive prebuilt components, and powerful JavaScript plugins.</p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
            <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
          </div>
        </div>
      </div>
    </div> -->
    <div class="container col-xxl-10">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">

          <h1 class="display-5 fw-bold" style="text-align: center;">Base cover rate</h1>

          <div class="mine" style="text-align: center;" id="data1">
            <p class="mb-4">Select your risk class</p>
            <select class="form-select form-select-lg mb-5" aria-label=".form-select-sm example" id="risk-class"
              onchange="myFunction2()">
              <option value="">Risk Class</option>
              <option value="1">I</option>
              <option value="2">II</option>
              <option value="3">III</option>
            </select>
            <p class="mb-4">Select category</p>
            
            <select class="form-select form-select-lg mb-5" id="category" onchange="myFunction2()">
              <option value="">Category</option>
              <option value="1">Death</option>
              <option value="2">Permanent Total Disability</option>
              <option value="3">Permanent Partial Disability</option>
            </select>
        
            <p class="demo" id="demo1"></p>
          </div>
        </div>

        <div class="col-lg-6">
          <h1 class="display-5 fw-bold" style="text-align: center;">Details</h1>
          <div class="mine" id="data0">
            <p class="mb-4" style="text-align: center;">Enter Your Name</p>
            <input class="form-control" type="text" placeholder="Full Name" id="full-name"><br><br>
            <p class="mb-4" style="text-align: center;"> Enter yearly income of last 3 years</p>
            <div class="input-group input-group-lg mb-3">
              <input class="form-control" type="number" placeholder="1st year Income" id="first_income"><br><br>
            </div>
            <div class="input-group input-group-lg mb-3">
              <input class="form-control" type="number" placeholder="2nd year Income" id="second_income"><br><br>
            </div>
            <div class="input-group input-group-lg mb-3">
              <input class="form-control" type="number" placeholder="3rd year Income" id="third_income"><br><br>
            </div>
            <br>
            <center>
              <button class="btn btn-secondary btn-lg" onclick="display()">Submit</button>
            </center>
          </div>



        </div>
      </div>

    </div>
    <!-- <div class="tab-content" id="tab-content-1">
      <div class="tab-pane fade in active show" id="body0" role="tabpanel" aria-labelledby="body0-tab">
        <div class="px-4 py-3 my-1 text-center ">
          <h1 class="display-5 fw-bold">Details</h1>
          <div class="col-lg-4 mx-auto">
            <div class="mine" id="data0">
              <p class="mb-4">Enter Your Name</p>
              <input class="form-control" type="text" placeholder="Full Name" id="full-name"><br><br>
              <p class="mb-4"> Enter yearly income of last 3 years</p>
              <div class="input-group input-group-lg mb-3">
                <input class="form-control" type="number" placeholder="1st year Income" id="first_income"><br><br>
              </div>
              <div class="input-group input-group-lg mb-3">
                <input class="form-control" type="number" placeholder="2nd year Income" id="second_income"><br><br>
              </div>
              <div class="input-group input-group-lg mb-3">
                <input class="form-control" type="number" placeholder="3rd year Income" id="third_income"><br><br>
              </div>
              <br>
              <button class="btn btn-secondary btn-lg" onclick="display()">Submit</button>
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="body1" role="tabpanel" aria-labelledby="body1-tab">
        <div class="px-4 py-3 my-1 text-center ">
          <h1 class="display-5 fw-bold">Base cover rate</h1>
          <div class="col-lg-4 mx-auto">
            <div class="mine" id="data1">
              <p class="mb-4">Select your risk class</p>
              <select class="form-select form-select-lg mb-5" aria-label=".form-select-sm example" id="risk-class"
                onchange="myFunction2()">
                <option value="">Risk Class</option>
                <option value="1">I</option>
                <option value="2">II</option>
                <option value="3">III</option>
              </select>
              <p class="mb-4">Select category</p>
              <select class="form-select form-select-lg mb-5" id="category" onchange="myFunction2()">
                <option value="">Category</option>
                <option value="1">Death</option>
                <option value="2">Permanent Total Disability</option>
                <option value="3">Permanent Partial Disability</option>
              </select>
              <p class="demo" id="demo1"></p>
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            </div>
          </div>
        </div>
      </div>




    </div> -->


    <h1 class="display-5 fw-bold" style="text-align: center;">Add On Cover</h1>

    <ul class="nav nav-tabs justify-content-center" id="myTab-2" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="body2-tab" data-bs-toggle="tab" data-bs-target="#body2" type="button" role="tab"
          aria-controls="body2" aria-selected="true">
          Accidental Hospitalization

        </a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="body4-tab" data-bs-toggle="tab" data-bs-target="#body4" type="button" role="tab"
          aria-controls="body4" aria-selected="false">
          Air Ambulance Cover
        </a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="body5-tab" data-bs-toggle="tab" data-bs-target="#body5" type="button" role="tab"
          aria-controls="body5" aria-selected="false">
          Children Education Benefit
        </a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent-2">
      <div class="tab-pane fade in active show" id="body2" role="tabpanel" aria-labelledby="body2-tab">
        <div class="px-4 py-3 my-3 text-center ">
          <h1 class="display-5 fw-bold">Accidental Hospitalization Expenses</h1>
          <div class="col-lg-4 mx-auto">
            <div class="mine" id="data2">
              <p class="mb-4">Select the Sum Insured</p>
              <select class="form-select form-select-lg mb-5" aria-label=".form-select-sm example" id="mySelect"
                onchange="myFunction()">
                <option value="0">Select Amount</option>
                <option value="441">200000</option>
                <option value="509">300000</option>
                <option value="628">400000</option>
                <option value="695">500000</option>
                <option value="729">600000</option>
                <option value="763">700000</option>
                <option value="794">800000</option>
                <option value="821">900000</option>
                <option value="848">1000000</option>
                <option value="875">1100000</option>
                <option value="902">1200000</option>
                <option value="930">1300000</option>
                <option value="957">1400000</option>
                <option value="984">1500000</option>
                <option value="1011">1600000</option>
                <option value="1038">1700000</option>
                <option value="1065">1800000</option>
                <option value="1092">1900000</option>
                <option value="1120">2000000</option>
                <option value="1147">2100000</option>
                <option value="1174">2200000</option>
                <option value="1201">2300000</option>
                <option value="1228">2400000</option>
                <option value="1255">2500000</option>
              </select>

              <p class="demo" id="demo2"></p>
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="body4" role="tabpanel" aria-labelledby="body4-tab">
        <div class="px-4 py-3 my-3 text-center ">
          <h1 class="display-5 fw-bold">Air Ambulance Cover</h1>
          <div class="col-lg-4 mx-auto">
            <div class="mine" id="data4">
              <p class="mb-4">Select the Sum Insured</p>
              <select class="form-select form-select-lg mb-5" aria-label=".form-select-sm example" id="mySelect2"
                onchange="myFunction4()">
                <option value="0">Select Amount</option>
                <option value="65">500000</option>
                <option value="130">100000</option>
                <option value="195">1500000</option>
                <option value="260">2000000</option>
                <option value="325">2500000</option>
              </select>
              <p class="demo" id="demo4"></p>
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="body5" role="tabpanel" aria-labelledby="body5-tab">
        <div class="px-4 py-3 my-3 text-center ">
          <h1 class="display-5 fw-bold">Children Education Benefit</h1>
          <div class="col-lg-4 mx-auto">
            <div class="mine" id="data5">
              <p class="mb-4">Select your risk class</p>
              <select class="form-select form-select-lg mb-5" aria-label=".form-select-sm example" id="risk-class5"
                onchange="myFunction5()">
                <option value="">Risk Class</option>
                <option value="1">I</option>
                <option value="2">II</option>
                <option value="3">III</option>
              </select>
              <p class="mb-4">Select Sum Insured</p>
              <select class="form-select form-select-lg mb-5" aria-label=".form-select-sm example" id="sum5"
                onchange="myFunction5()">
                <option value="0">Sum Insured</option>
                <option value="1">100000</option>
                <option value="2">200000</option>
                <option value="3">300000</option>
                <option value="4">400000</option>
                <option value="5">500000</option>
                <option value="6">600000</option>
                <option value="7">700000</option>
                <option value="8">800000</option>
                <option value="9">900000</option>
                <option value="10">1000000</option>
              </select>
              <p class="demo" id="demo5"></p>
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            </div>
          </div>
        </div>
      </div>
    </div>


    <ul class="nav nav-tabs justify-content-center" id="myTab-3" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="body6-tab" data-bs-toggle="tab" data-bs-target="#body6" role="tab"
          aria-controls="body6" aria-selected="true">
          Accidental Bodily Injury(Coma)
        </a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="body7-tab" data-bs-toggle="tab" data-bs-target="#body7" role="tab" aria-controls="body7"
          aria-selected="false">
          EMI payment Cover (For 3 EMI)
        </a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="body8-tab" data-bs-toggle="tab" data-bs-target="#body8" type="button" role="tab"
          aria-controls="body8" aria-selected="false">
          Fracture Care
        </a>
      </li>
    </ul>

    <div class="tab-content" id="myTabContent-3">
      <div class="tab-pane fade in active show" id="body6" role="tabpanel" aria-labelledby="body6-tab">
        <div class="px-4 py-3 my-3 text-center ">
          <h1 class="display-5 fw-bold">Coma due to Accidental Bodily Injury</h1>
          <div class="col-lg-4 mx-auto">
            <div class="mine" id="data6">
              <p class="mb-4">Select the Sum Insured</p>
              <select class="form-select form-select-lg mb-5" aria-label=".form-select-sm example" id="Sum-6"
                onchange="myFunction6()">
                <option value="0">Select Amount</option>
                <option value="26">100000</option>
                <option value="52">200000</option>
                <option value="78">300000</option>
                <option value="104">400000</option>
                <option value="130">500000</option>
                <option value="156">600000</option>
                <option value="182">700000</option>
                <option value="208">800000</option>
                <option value="234">900000</option>
                <option value="260">1000000</option>
              </select>
              <p class="demo" id="demo-6"></p>
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="body7" role="tabpanel" aria-labelledby="body7-tab">
        <div class="px-4 py-3 my-3 text-center ">
          <h1 class="display-5 fw-bold">EMI payment Cover (For 3 EMI)</h1>
          <div class="col-lg-4 mx-auto">
            <div class="mine" id="data7">
              <p class="mb-4">Select your risk class</p>
              <select class="form-select form-select-lg mb-5" aria-label=".form-select-sm example" id="risk-class7"
                onchange="myFunction7()">
                <option value="0">Risk Class</option>
                <option value="1">I</option>
                <option value="2">II</option>
                <option value="3">III</option>
              </select>
              <p class="mb-4">Select Sum Insured</p>
              <select class="form-select form-select-lg mb-5" aria-label=".form-select-sm example" id="sum7"
                onchange="myFunction7()">
                <option value="0">Sum Insured</option>
                <option value="1">50000</option>
                <option value="2">75000</option>
                <option value="3">100000</option>
                <option value="4">200000</option>
                <option value="5">300000</option>
                <option value="6">400000</option>
                <option value="7">500000</option>
              </select>
              <p class="demo" id="demo7"></p>
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="body8" role="tabpanel" aria-labelledby="body8-tab">
        <div class="px-4 py-3 my-3 text-center ">
          <h1 class="display-5 fw-bold">Fracture Care</h1>
          <div class="col-lg-4 mx-auto">
            <div class="mine" id="data8">
              <p class="mb-4">Select the Sum Insured</p>
              <select class="form-select form-select-lg mb-5" aria-label=".form-select-sm example" id="Sum-8"
                onchange="myFunction8()">
                <option value="0">Select Amount</option>
                <option value="173">50000</option>
                <option value="260">75000</option>
                <option value="347">100000</option>
                <option value="694">200000</option>
                <option value="1041">300000</option>
                <option value="1388">400000</option>
                <option value="1735">500000</option>
              </select>
              <p class="demo" id="demo-8"></p>
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            </div>
          </div>
        </div>
      </div>
    </div>


    <ul class="nav nav-tabs justify-content-center" id="myTab-4" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="body9-tab" data-bs-toggle="tab" data-bs-target="#body9" type="button" role="tab"
          aria-controls="body9" aria-selected="true">
          Hospital Cash Benefit
        </a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link " id="body3-tab" data-bs-toggle="tab" data-bs-target="#body3" type="button" role="tab"
          aria-controls="body3" aria-selected="false">
          Adventure Sport Benefits
        </a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="body10-tab" data-bs-toggle="tab" data-bs-target="#body10" type="button" role="tab"
          aria-controls="body10" aria-selected="false">
          Loan Protector Cover
        </a>
      </li>
    </ul>

    <div class="tab-content" id="tab-content-4">
      <div class="tab-pane fade in active show" id="body9" role="tabpanel" aria-labelledby="body9-tab">
        <div class="px-4 py-3 my-3 text-center ">
          <h1 class="display-5 fw-bold">Hospital Cash Benefit</h1>
          <div class="col-lg-4 mx-auto">
            <div class="mine" id="data9">

              <!-- <p class="mb-4"> Enter yearly income of last 3 years</p>
              <div class="input-group input-group-lg mb-3">
                <input class="form-control" type="number" placeholder="1st year Income" id="first_income"><br><br>
              </div>
              <div class="input-group input-group-lg mb-3">
                <input class="form-control" type="number" placeholder="2nd year Income" id="second_income"><br><br>
              </div>
              <div class="input-group input-group-lg mb-3">
                <input class="form-control" type="number" placeholder="3rd year Income" id="third_income" onclick="myFunction14()"><br><br>
              </div> -->
              <br>
              <button class="btn btn-secondary btn-lg" onclick="myFunction14()">Know Premium !</button>
              <br><br>
              <!-- <p class="mb-4">Select the Sum Insured</p>
               -->
              <!-- <select class="form-select form-select-lg mb-5" aria-label=".form-select-sm example" id="Sum-9"
                onchange="myFunction9()">
                <option value="">Select Amount</option>
                <option value="204">1000</option>
                <option value="408">2000</option>
                <option value="612">3000</option>
                <option value="816">4000</option>
                <option value="1020">5000</option>
                <option value="1224">6000</option>
                <option value="1428">7000</option>
                <option value="1632">8000</option>
                <option value="1836">9000</option>
                <option value="2040">10000</option>
              </select> -->
              <p class="demo" id="demo-9"></p>
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="body3" role="tabpanel" aria-labelledby="body3-tab">
        <div class="px-4 py-3 my-3 text-center ">
          <h1 class="display-5 fw-bold">Adventure Sport Benefits</h1>
          <div class="col-lg-4 mx-auto">
            <div class="mine" id="data3">
              <p class="mb-4">Select Rate</p>
              <select class="form-select form-select-lg mb-5" aria-label=".form-select-sm example" id="rate3"
                onchange="myFunction3()">
                <option value="">Rate</option>
                <option value="1">25%</option>
                <option value="2">50%</option>
                <option value="3">100%</option>
              </select>
              <p class="mb-4">Select your risk class</p>
              <select class="form-select form-select-lg mb-5" aria-label=".form-select-sm example" id="risk-class3"
                onchange="myFunction3()">
                <option value="">Risk Class</option>
                <option value="1">I</option>
                <option value="2">II</option>
                <option value="3">III</option>
              </select>
              <p class="mb-4">Select Cover</p>
              <select class="form-select form-select-lg mb-5" aria-label=".form-select-sm example" id="cover3"
                onchange="myFunction3()">
                <option value="">Cover</option>
                <option value="1">Death</option>
                <option value="2">Permanent Total Disability</option>
              </select>
              <p class="demo" id="demo3"></p>
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="body10" role="tabpanel" aria-labelledby="body10-tab">
        <div class="px-4 py-3 my-3 text-center ">
          <h1 class="display-5 fw-bold">Loan Protector Cover</h1>
          <div class="col-lg-4 mx-auto">
            <div class="mine" id="data10">
              <p class="mb-4" style="text-align: center;"> Enter the loan Amount</p>
              <div class="input-group input-group-lg mb-3">
                <input class="form-control" type="number" placeholder="Enter Amount" id="loan"><br><br>
              </div>
              <p class="mb-4">Select Risk Class</p>
              <select class="form-select form-select-lg mb-5" aria-label=".form-select-sm example" id="risk-class10"
                onchange="myFunction10()">
                <option value="0">Risk Class</option>
                <option value="0.48">1</option>
                <option value="0.86">2</option>
                <option value="1.3">3</option>
              </select>
              <p class="demo" id="demo-10"></p>
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            </div>
          </div>
        </div>
      </div>

    </div>

    <ul class="nav nav-tabs justify-content-center" id="myTab-5" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="body11-tab" data-bs-toggle="tab" data-bs-target="#body11" type="button"
          role="tab" aria-controls="body11" aria-selected="false">
          Loss of Income due to Disability from Accident
        </a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="body12-tab" data-bs-toggle="tab" data-bs-target="#body12" type="button" role="tab"
          aria-controls="body12" aria-selected="false">
          Road Ambulance Cover
        </a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="body13-tab" data-bs-toggle="tab" data-bs-target="#body13" type="button" role="tab"
          aria-controls="body13" aria-selected="false">
          Travel Expenses Benefit
        </a>
      </li>
    </ul>

    <div class="tab-content" id="tab-content-5">
      <div class="tab-pane fade in active show" id="body11" role="tabpanel" aria-labelledby="body11-tab">
        <div class="px-4 py-3 my-3 text-center ">
          <h1 class="display-5 fw-bold">Loss of Income due to <br> Disability from Accident</h1>
          <div class="col-lg-4 mx-auto">
            <div class="mine" id="data11">
              <p class="mb-4">Select Risk Class</p>
              <select class="form-select form-select-lg mb-5" aria-label=".form-select-sm example" id="risk-class11"
                onchange="myFunction15()">

                <option value="0">Risk Class</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>

              <!-- <p class="mb-4"> Enter yearly income of last 3 years</p>
              <div class="input-group input-group-lg mb-3">
                <input class="form-control" type="number" placeholder="1st year Income" id="first_income"><br><br>
              </div>
              <div class="input-group input-group-lg mb-3">
                <input class="form-control" type="number" placeholder="2nd year Income" id="second_income"><br><br>
              </div>
              <div class="input-group input-group-lg mb-3">
                <input class="form-control" type="number" placeholder="3rd year Income" id="third_income"><br><br>
              </div>
              <br> -->
              <!-- <button class="btn btn-secondary btn-lg" onclick="myFunction15()">Click me</button>
              <br><br> -->
              <p class="demo" id="demo-11"></p>
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="body12" role="tabpanel" aria-labelledby="body12-tab">
        <div class="px-4 py-3 my-3 text-center ">
          <h1 class="display-5 fw-bold">Road Ambulance Cover</h1>
          <div class="col-lg-4 mx-auto">
            <div class="mine" id="data12">
              <p class="mb-4">Select Sum Insured</p>
              <select class="form-select form-select-lg mb-5" aria-label=".form-select-sm example" id="Sum-12"
                onchange="myFunction12()">
                <option value="0">Sum Insured</option>
                <option value="55">25000</option>
              </select>
              <p class="demo" id="demo-12"></p>
            </div>
          </div>
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          </div>
        </div>
      </div>


      <div class="tab-pane fade" id="body13" role="tabpanel" aria-labelledby="body13-tab">
        <div class="px-4 py-3 my-3 text-center ">
          <h1 class="display-5 fw-bold">Travel Expenses Benefit</h1>
          <div class="col-lg-4 mx-auto">
            <div class="mine" id="data12">
              <p class="mb-4">Select Sum Insured</p>
              <select class="form-select form-select-lg mb-5" aria-label=".form-select-sm example" id="Sum-13"
                onchange="myFunction13()">
                <option value="0">Sum Insured</option>
                <option value="71">25000</option>
              </select>
              <p class="demo" id="demo-13"></p>
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a class="button-print" onclick="PrintElem()">Print</a>
  <div class="pdf" id="pdf">
    <div class="pdf-1">
      <table>
        <tr>
          <th class="header" colspan="3" scope="colgroup">The Way for Risk Management</th>
        </tr>
        <tr>
          <td class="option">Name :</td>
          <td id="name-dis" colspan="2">NULL</td>
        </tr>

        <tr>
          <td class="option">Monthly Average income :</td>
          <td id="inc-1" colspan="2">0</td>
        </tr>


        <tr>
          <th class="header" colspan="3" scope="colgroup" style="background-color: orange;"> BASE COVER (II)</th>
        </tr>

        <tr>
          <td class="option">Death </td>
          <td id="inc-2">0</td>
          <td id="pre-1">0</td>
        </tr>
        <tr>
          <td class="option">PTD</td>
          <td id="inc-3">0</td>
          <td id="pre-2">0</td>
        </tr>
        <tr>
          <td class="option">PPD</td>
          <td id="inc-4">0</td>
          <td id="pre-3">0</td>
        </tr>

        <tr class="header">
          <th class="header" colspan="3" scope="colgroup">ADD ON COVER</th>
        </tr>

        <tr>
          <td class="option">1] Accidental Hospitalisation</td>
          <td id="select1">0</td>
          <td id="value1">0</td>
        </tr>
        <tr>
          <td class="option">2] Air Ambulance</td>
          <td id="select2">0</td>
          <td id="value2">0</td>
        </tr>
        <tr>
          <td class="option">3] Child Education</td>
          <td id="select3">0</td>
          <td id="value3">0</td>
        </tr>
        <tr>
          <td class="option">4] COMA dut to Accident</td>
          <td id="select4">0</td>
          <td id="value4">0</td>
        </tr>
        <tr>
          <td class="option">5] EMI Payment</td>
          <td id="select5">0</td>
          <td id="value5">0</td>
        </tr>
        <tr>
          <td class="option">6] Fracture Care</td>
          <td id="select6">0</td>
          <td id="value6">0</td>
        </tr>
        <tr>
          <td class="option">7] Hospital Cash</td>
          <td id="select7">0</td>
          <td id="value7">0</td>
        </tr>
        <tr>
          <td class="option">8] Loan Protector</td>
          <td id="select8">0</td>
          <td id="value8">0</td>
        </tr>
        <tr>
          <td class="option">9] Loss of income <br>
            (Weekly upto 100 Week)
          </td>
          <td id="select9">0</td>
          <td id="value9">0</td>
        </tr>
        <tr>
          <td class="option">10] Travel Expences Benefit</td>
          <td id="select10">0</td>
          <td id="value10">0</td>
        </tr>
        <tr>
          <td class="option">11] Road Ambulance</td>
          <td id="select11">0</td>
          <td id="value11">0</td>
        </tr>
        <tbody>
          <tr>
            <th rowspan="3">
              <img id="pro" src="promotion.jpeg" alt="" srcset="">
            </th>
            <td>Premium Rs.</td>
            <td id="premium-value">0</td>
          </tr>
          <tr>
            <td>GST 18%</td>
            <td id="gst">0</td>
          </tr>
          <tr>
            <td>Final Amt Rs.</td>
            <td id="total-amount">0</td>
          </tr>

        </tbody>
      </table>
      <div class="p1 header">
        <h5> Considering the value of exprience deposit your trust with us</h5>
      </div>
      <div class="p1 header">
        <h5> Suresh G. Lahoti - Mobile No.9422176882</h5>
        <h5> Email - suresh.lahoti@rediffmail.com</h5>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script>
  <script type="text/javascript">
    // $("#btnPrint").live("click", function () {
    //   var divContents = $("#text").html();
    //   var printWindow = window.open('', '', 'height=400,width=800');
    //   printWindow.document.write('<html><head><title></title>');
    //   printWindow.document.write('</head><body>');
    //   printWindow.document.write('');
    //   printWindow.document.write('</body></html>');
    //   printWindow.document.close();
    //   printWindow.print();
    // });
    function PrintElem() {
      var a1 = display();
      var a2 = myFunction();
      var a3 = myFunction4();
      var a4 = myFunction5();
      var a5 = myFunction6();
      var a6 = myFunction7();
      var a7 = myFunction8();
      var a8 = myFunction10();
      var a9 = myFunction12();
      var a10 = myFunction13();
      var a11 = myFunction14();
      var a12 = myFunction15();
      var b = Math.round(a1 + a2 + a3 + a4 + a5 + a6 + a7 + a8 + a9 + a10 + a11 + a12);
      var numb = (b * 18) / 100;
      var rounded = Math.round(((numb + Number.EPSILON) * 100) / 100);
      var numb2 = b + rounded;
      document.getElementById("premium-value").innerHTML = b;
      document.getElementById("gst").innerHTML = rounded;
      document.getElementById("total-amount").innerHTML = numb2;
      // var mywindow = window.open('', 'PRINT', 'height=400,width=600');
      var mywindow = window.open('', '', 'height=500,width=600');

      mywindow.document.write('<html><head><title></title>');

      mywindow.document.write('<style>' +
        ".pdf{padding: 15%;border:1px solid black;}" +
        "table,td,tr {border: 1px solid black;padding: 1%;}" +
        "table {border-collapse: collapse;width: 100%;}" +
        ".p1{border: 1px solid black;}" +
        ".p2 {border: 1px solid black;}" +
        "#pro {width: 20%;}" +
        ".header{background-color: orange;text-align: center;}" +
        ".option{background-color:  #f2f2f2;}" +
        '</style>');
      mywindow.document.write('</head><body >');
      mywindow.document.write(document.getElementById("pdf").innerHTML);
      mywindow.document.write('</body></html>');

      mywindow.document.close(); // necessary for IE >= 10
      mywindow.focus(); // necessary for IE >= 10*/
      setTimeout(function () {
        mywindow.print();
        mywindow.close();
      }, 1000);
      // mywindow.print();
      // mywindow.close();
      // mywindow.close();
      return false;
    }
  </script>

</body>

</html>