<?php
include_once('backend/connect.php');
// include_once('backend/connect.php');

session_start();
$eventsSQL = "SELECT * FROM events";
$eventsQuery = mysqli_query($conn, $eventsSQL);
$storySQL = "SELECT * FROM our_stories";
$storyQuery = mysqli_query($conn, $storySQL);
$maleuserSQL = "SELECT * FROM per_details WHERE gender = 'male' and approval_status = 'approved' ORDER BY RAND() limit 3";
$femaleuserSQL = "SELECT * FROM per_details WHERE gender = 'female' and approval_status = 'approved' ORDER BY RAND() limit 3";
$maleQuery = mysqli_query($conn, $maleuserSQL);
$femaleQuery = mysqli_query($conn, $femaleuserSQL);

if (!isset($_SESSION['unique'])) {
  $Infostaus = 'hideInfo';
  // echo "false";
} else {
  $Infostaus = 'showInfo';
  // echo "true";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-v4-rtl/4.6.0-2/css/bootstrap-grid.min.css">
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <title>Home</title>
  <style>
    * {
      margin: 0px;
      padding: 0px;
      box-sizing: border-box;
      text-decoration: none;
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    /*#load{
  font-size: 50px;
  text-align: center;
  color: #000000;
  position: fixed;
  width: 100%;
  height: 100vh;
  z-index: 99999;
  background: rgb(255, 254, 254) url("https://cdn.dribbble.com/users/406059/screenshots/1430999/dribbble_orange.gif") no-repeat center;
}*/
    .wrapper {
      background: #000000;
      position: relative;
      width: 100%;
    }

    .row {
      margin: 0px;
    }

    .wrapper nav {
      position: relative;
      display: flex;
      max-width: calc(100% - 200px);
      margin: 0 auto;
      height: 70px;
      align-items: center;
      justify-content: space-between;
    }

    nav .content {
      display: flex;
      align-items: center;
    }

    nav .content .links {
      margin-left: 80px;
      display: flex;
    }

    .content .logo a {
      color: #fff;
      font-size: 30px;
      font-weight: 400;
    }

    .content .links li {
      list-style: none;
      line-height: 70px;
    }

    .content .links li a,
    .content .links li label {
      color: #fff;
      font-size: 18px;
      font-weight: 500;
      padding: 9px 17px;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .content .links li label {
      display: none;
    }

    .content .links li a:hover,
    .content .links li label:hover {
      background: #ffffff;
      color: #7D3668;
      font-weight: bolder;
    }

    .wrapper .search-icon,
    .wrapper .menu-icon {
      color: #fff;
      font-size: 18px;
      cursor: pointer;
      line-height: 70px;
      width: 70px;
      text-align: center;
    }

    .wrapper .menu-icon {
      display: none;
    }

    .wrapper #show-search:checked~.search-icon i::before {
      content: "\f00d";
    }

    .wrapper .search-box {
      position: absolute;
      height: 100%;
      max-width: calc(100% - 50px);
      width: 100%;
      opacity: 0;
      pointer-events: none;
      transition: all 0.3s ease;
    }

    .wrapper #show-search:checked~.search-box {
      opacity: 1;
      pointer-events: auto;
    }

    .search-box input {
      width: 100%;
      height: 100%;
      border: none;
      outline: none;
      font-size: 17px;
      color: #fff;
      background: #330a1e;
      padding: 0 100px 0 15px;
    }

    .search-box input::placeholder {
      color: #f2f2f2;
    }

    .search-box .go-icon {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      line-height: 60px;
      width: 70px;
      background: #8b1577;
      border: none;
      outline: none;
      color: #fff;
      font-size: 20px;
      cursor: pointer;
    }

    .wrapper input[type="checkbox"] {
      display: none;
    }

    /* Dropdown Menu code start */
    .content .links ul {
      position: absolute;
      background: #181717;
      top: 80px;
      z-index: -1;
      opacity: 0;
      visibility: hidden;
    }

    .content .links li:hover>ul {
      top: 70px;
      opacity: 1;
      visibility: visible;
      transition: all 0.3s ease;
    }

    .content .links ul li a {
      display: block;
      width: 100%;
      line-height: 30px;
      border-radius: 0px !important;
    }

    .content .links ul ul {
      position: absolute;
      top: 0;
      right: calc(-100% + 8px);
    }

    .content .links ul li {
      position: relative;
    }

    .content .links ul li:hover ul {
      top: 0;
    }

    /* Responsive code start */
    @media screen and (max-width: 1250px) {
      .samajsevak .carousel-cell {
        width: 80% !important;
      }

      .wrapper nav {
        max-width: 100%;
        padding: 0 20px;
      }

      .looking {
        margin-top: 50% !important;
        margin-left: 10% !important;
        margin-right: 10% !important;
        font-size: 20px !important;
        margin-bottom: 30px !important;
      }

      .log-regis {
        margin-left: 13% !important;
        margin: -3% 13% !important;
      }

      .poplet {
        margin-left: 10% !important;
      }

      nav .content .links {
        margin-top: 0px;
        margin-left: 30px;
      }

      .content .links li a {
        padding: 8px 13px;
      }

      .wrapper .search-box {
        max-width: calc(100% - 100px);
      }

      .wrapper .search-box input {
        padding: 0 100px 0 15px;
      }
    }

    @media screen and (max-width: 900px) {
      .log-regis {
        position: relative;
        /*margin-top: -150px;*/
        margin: -150px 0px 0px 0px !important;
      }

      .looking .row {
        margin: -400px 10px 20px -100px;
      }

      .samajsevak #citysearch {
        height: 30px !important;
        width: 300px !important;
        margin-left: 10% !important;
        margin-top: 10px !important;
        padding: 10px !important;
      }

      .samajsevak .carousel-cell img {
        height: 100px !important;
        margin-left: 50px !important;
        width: 100px !important;
      }

      .samajsevak .carousel-cell {
        width: 60% !important;
      }

      .members .carousel-cell {
        width: 95% !important;
      }

      .members .carousel-cell img {
        margin-left: 10% !important;
        width: 100px !important;
        height: 100px !important;
      }

      .members .carousel-cell .memberdetail {
        margin-left: 20px !important;
      }

      .stories .carousel .carousel-cell img {
        margin-left: 15% !important;
      }

      .wrapper .menu-icon {
        display: block;
      }

      .content .logo a {
        text-align: center !important;
      }

      .wrapper #show-menu:checked~.menu-icon i::before {
        content: "\f00d";
      }

      .looking {
        margin-top: 120% !important;
        margin-left: 20% !important;
        margin-right: 10% !important;
        font-size: 15px !important;
      }

      .log-regis {
        margin-left: 13% !important;
        margin: -3% 13% !important;
      }

      .poplet {
        margin-left: 10% !important;
      }

      nav .content .links {
        display: block;
        position: fixed;
        background: #202020;
        height: 100%;
        width: 100%;
        top: 70px;
        left: -100%;
        margin-left: 0;
        max-width: 350px;
        overflow-y: auto;
        padding-bottom: 100px;
        transition: all 0.3s ease;

      }

      nav #show-menu:checked~.content .links {
        left: 0%;
      }

      .content .links li {
        margin: 15px 20px;
      }

      .content .links li a,
      .content .links li label {
        line-height: 40px;
        font-size: 20px;
        display: block;
        padding: 8px 18px;
        cursor: pointer;
      }

      .content .links li a.desktop-link {
        display: none;
      }

      /* dropdown responsive code start */
      .content .links ul,
      .content .links ul ul {
        position: static;
        opacity: 1;
        visibility: visible;
        background: none;
        max-height: 0px;
        overflow: hidden;
        margin-top: 5px;
      }

      .content .links #show-features:checked~ul,
      .content .links #show-services:checked~ul,
      .content .links #show-items:checked~ul {
        max-height: 100vh;
      }

      .content .links ul li {
        margin: 7px 20px;
      }

      .content .links ul li a {
        font-size: 18px;
        line-height: 30px;
        border-radius: 5px !important;
      }
    }

    @media screen and (max-width: 400px) {
      .members .flickity-prev-next-button {
        display: none;
      }

      nav .container-fluid {
        height: 100% !important;
      }

      nav {
        line-height: 20px !important;
        position: fixed !important;
        width: 100%;
        top: 0px;
      }

      .event {
        padding: 10px;
      }

      .event .row .col-md-5 {
        margin-left: 10px !important;
      }

      .looking .row {
        width: 100% !important;
        margin: 450px 30px 0px 0px !important;
      }

      .stories .carousel-cell {
        width: 65% !important;
      }

      .stories #btnstory,
      .samajsevak #samajsevak {
        margin-left: 18% !important;
      }

      .about #btnabout,
      .event #event,
      .members #members {
        margin-left: 30% !important;
      }

      .log-regis {
        position: relative;
        /*margin-top: -150px;*/
        margin: -160px 0px 120px 0px !important;
        box-shadow: 1px 2px 2px,
          1px 0px 2px black;
      }

      .samajsevak #citysearch {
        height: 40px !important;
        width: 200px !important;
        margin-left: 10% !important;
        padding: 10px !important;
      }

      .samajsevak .carousel-cell img {
        height: 120px !important;
        margin-left: 30px !important;
        width: 120px !important;
      }

      .samajsevak .carousel-cell {
        width: 60% !important;
      }

      .members .carousel-cell img {
        margin-left: 10%;
      }

      .members .carousel-cell .memberdetail {
        margin-left: 20px !important;
      }

      .stories .carousel .carousel-cell img {
        margin-left: 10% !important;
      }

      .samajsevak #citysearch {
        margin-top: 20px !important;
        margin-left: 30px !important;
      }

      .members .carousel-cell {
        width: 80% !important;
      }

      .members .carousel-cell {
        display: block !important;
      }

      .poplet {
        margin-left: 10% !important;
      }

      .wrapper nav {
        padding: 10px 10px;
      }

      .content .logo a {
        text-align: center !important;
        margin-right: 20%;
      }

      .content .logo a {
        font-size: 22px;
      }

      .wrapper .search-box {
        max-width: calc(100% - 70px);
      }

      .wrapper .search-box .go-icon {
        width: 30px;
        right: 0;
      }

      .wrapper .search-box input {
        padding-right: 30px;
      }

      .log-regis {
        top: 100px !important;
        margin-left: 13% !important;
        margin: -3% 13% !important;
      }

      .poplet {
        font-size: 16px !important;
        margin-right: 10px !important;
      }

      .looking {
        width: 90%;
        margin-top: 80% !important;
        margin-left: 7% !important;
        margin-right: 12% !important;
        font-size: 15px !important;
      }

      .looking .row .col-md-3 {
        padding: 10px !important;
      }

      .looking #age,
      .looking #to {
        width: 25% !important;
      }

      .looking #to {
        margin-left: 18px !important;
      }

      .looking .row {
        font-size: 20px;
      }

      .looking .row select {
        margin-left: 0px !important;
        width: 80% !important;
      }

      .looking .row .col-md-3 button {
        padding: 15px;
        width: 100%;
      }
    }

    .log-regis {
      padding: 5% 0;
      position: absolute;
      top: 100px;
      width: 280px;
      transition: .5s;
      height: 350px;
      margin-left: 70%;
      padding: 5px;
      background-color: white;
      border-radius: 20px;
      padding: 10px;
    }

    .input {
      top: 180px;
      transition: .5s;
    }

    #input,
    #passInput,
    #otp,
    #mobile {
      color: rgb(29, 14, 4);
      width: 100%;
      padding: 10px 10px;
      margin: 5px 0;
      border: 1px solid rgb(247, 0, 255);
      outline: none;
      background: transparent;
    }

    #submit,
    #regtr,
    #regtr1 {
      color: white;
      padding: 10px 30px;
      display: block;
      cursor: pointer;
      margin: auto;
      background: linear-gradient(to right, rgb(65, 2, 37), rgb(128, 0, 96));
      border: 0;
      outline: none;
      border-radius: 30px;
    }

    #submit:hover,
    #regtr:hover {
      opacity: 0.8;
    }

    .button-box .toggle {
      margin: 10px 0px;
      padding: 5px 0px;
    }

    form #forgotpass {
      padding: 10px;
      margin-right: 10px;
    }

    form #forgotpass:hover {
      text-decoration: underline;
    }

    .button-box {
      width: 220px;
      margin: 35px auto;
      position: relative;
      box-shadow: rgba(0, 0, 0, 0.35) 0px -20px 36px -28px inset;
      display: flex;
      border-radius: 30px;
    }

    .toggle {
      color: rgb(97, 92, 92);
      cursor: pointer;
      padding: 0px 30px !important;
      position: relative;
      background: transparent;
      outline: none;
      border: 0;
    }

    #btn {
      top: 0;
      left: 0;
      position: absolute;
      width: 110px;
      height: 100%;
      background: linear-gradient(to right, rgb(85, 18, 71), rgb(53, 7, 39));
      border-radius: 30px;
      transition: .5s;
    }

    form .forlog {
      display: flex;
      justify-content: space-between;
      margin: 2px;
    }

    /*.button-box button{
            background: linear-gradient(to right, rgb(75, 2, 71),rgb(65, 27, 61));
            outline: none;
            color: rgb(255, 255, 255);
            font-weight: bolder;
            padding: 10px !important;
            border: none;
            border-radius: 10px;
            font-size: 15px;
        }
        .button-box button a{
            color: rgb(255, 255, 255);
        }
        .button-box #tar:hover{
            opacity: 0.75;
        }*/
    body {
      background-image: url("images/background.jpeg");
      width: 100%;
      height: 100%;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .looking {
      margin-top: 30%;
      margin-left: 20%;
      margin-right: 20%;
      font-size: 20px;
    }

    .looking select {
      margin: 10px 10px 10px 20px;
      height: 30px;
      outline: none;
    }

    .looking .row {
      padding: 30px;
      width: 120%;
      color: white;
      background-color: rgba(0, 0, 0, 0.603);
    }

    .looking .row .col-md-3 {
      padding: 20px;
    }

    .looking .row .col-md-3 button:hover {
      opacity: 0.85;
      cursor: pointer;
    }

    .looking .row .col-md-3 button {
      padding: 20px;
      color: white;
      outline: none;
      border: none;
      border-radius: 20px;
      background-image: linear-gradient(to right, rgb(85, 18, 71), rgb(53, 7, 39));
    }

    .about {
      background-color: white;
      width: 101%;
    }

    .about #btnabout,
    .event #event,
    .samajsevak #samajsevak {
      background-color: #E8E8E8 !important;
    }

    .about #btnabout,
    .stories #btnstory,
    .event #event,
    .members #members,
    .samajsevak #samajsevak {
      margin-top: 20px;
      text-align: center;
      color: rgb(0, 0, 0);
      background-color: #FFFFFF;
      border-radius: 20px;
      outline: none;
      border: none;
      margin-left: 45%;
      width: fit-content;
      font-size: 30px;
      padding: 5px 30px;
    }

    .about .row {
      padding: 30px;
    }

    .about .row #title1:hover+.about .row #data1 {
      display: block !important;
    }

    /* .about .row p{
          font-size: 20px;
          background-image: linear-gradient(to right,rgb(80, 80, 80),silver);
          padding: 5px;
          color: #fff;
          cursor: no-drop;
          border-radius: 20px 0 20px 0;
        }*/
    .poplet {
      padding-left: 10px;
      font-size: 18px;
      text-align: center;
      background-color: gold;
      line-height: 70px;

    }

    .state {
      text-align: center;
      color: rgb(161, 40, 40);
      font-weight: bolder;
      padding: 10px;
      font-size: 35px;
    }

    .stories {
      background-color: rgba(85, 85, 85, 0.26);
    }

    /* .stories .row img{
          border-radius: 50%;
          padding: 10px;
          height: 150px;
          /*margin-left: 80px;*/
    /*  width: 150px;
          object-fit: cover;
        }
        .stories .row b{
          font-size: 25px;
          text-align: center;
          /*margin-left: 30px;*/
    /* }
        .stories .row p{
          font-size: 15px;
          padding: 1px;
        }
        .stories .row .col-md-3{
          background-image: linear-gradient(to right, gold,pink);
          margin-left: 15px;
          margin-top: 20px;
          padding: 10px;
          border-radius: 10px;
        }*/
    .carousel {
      margin-top: 20px;
      padding: 10px;
    }

    .stories .carousel .carousel-cell img {
      border-radius: 50%;
      padding: 10px;
      height: 150px;
      margin-left: 42%;
      width: 150px;
      object-fit: cover;
    }

    .carousel .carousel-cell img {
      object-fit: cover;
      width: 150px;
      height: 150px;
      border-radius: 2%;
    }

    .stories .carousel-cell .storydetail {
      text-align: center;
    }

    .stories .carousel b {
      font-size: 25px;
      text-align: center;
    }

    .stories .carousel p {
      font-size: 15px;
      padding: 1px;
    }

    .carousel .carousel-cell:hover {
      box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
    }

    .stories .carousel-cell {
      width: 50%;
      margin-right: 1%;
      background-image: linear-gradient(to right, rgb(248, 248, 247), rgb(255, 240, 242));
      margin-left: 15px;
      margin-top: 20px;
      padding: 10px;
      border-radius: 10px;
    }

    .members .carousel-cell {
      width: 35%;
      margin-right: 1%;
      background-image: linear-gradient(to right, rgb(248, 248, 247), rgb(231, 251, 255));
      margin-left: 15px;
      margin-top: 20px;
      padding: 10px;
      border-radius: 10px;
    }

    .carousel-cell:before {
      display: block;
    }

    .event .row .col-md-5 svg {
      color: #330a1e;
      margin-left: 200px;
    }

    .event .row .col-md-5 {
      margin-top: 10px;
      background-image: linear-gradient(to right, rgb(211, 211, 211), rgb(226, 220, 220));
      padding: 10px;
      border-radius: 30px;
      margin-right: 50px;
      margin-left: 50px;
    }

    .event .row .col-md-5 .eventdetail {
      display: flex;
      justify-content: center;
      padding: 10px;
    }

    .event .row .col-md-5 .eventdetail b {
      font-size: 25px;
      color: #181717;
      padding: 0 10px;
    }

    .event .row {
      margin-left: 20px;
    }

    .event .row .col-md-5 .eventdetail p {
      font-size: 15px;
    }

    .members .carousel-cell {
      display: flex;
      width: 35%;
      margin-left: 20px;
    }

    .members .carousel-cell .memberdetail {
      margin-left: 50px;
      color: rgb(46, 63, 0);
      font-size: 20px;

    }

    .members .carousel-cell #hideInfo {
      -webkit-filter: blur(10px);
    }

    .members .carousel-cell #showInfo {
      -webkit-filter: blur(0px);
    }

    .members .carousel-cell .memberdetail .optionmem button:hover {
      cursor: pointer;
    }

    .members .carousel-cell .memberdetail .optionmem button {
      padding: 8px;
      margin-right: 10px;
      background: none;
      outline: none;
      border: none;
      border-radius: 10px;
    }

    .members {
      background-color: rgba(85, 85, 85, 0.26);
    }

    .members .carousel-cell .memberdetail .optionmem #fullpro a {
      color: white;
    }

    .members .carousel-cell .memberdetail .optionmem #fullpro:hover {
      background-image: linear-gradient(to right, rgb(0, 0, 0), rgb(5, 63, 8));
      transition: 0.5s;
    }

    .members .carousel-cell .memberdetail .optionmem #fullpro {
      background-image: linear-gradient(to right, rgb(5, 48, 30), rgb(4, 196, 84));
      margin-top: 5px;
    }

    .samajsevak #citysearch {
      width: 200px;
      margin-left: 70%;
      padding: 10px;
    }

    .samajsevak .carousel-cell img {
      margin-left: 15%;
      width: 180px;
      border-radius: 5px !important;
      height: 180px;
      border-radius: 0%;
    }

    .samajsevak .carousel-cell {
      width: 20%;
      margin-right: 0%;
      background-image: linear-gradient(to right, rgb(255, 255, 255), rgb(255, 255, 255));
      margin-left: 50px;
      margin-top: 20px;
      padding: 10px;
      border-radius: 10px;
    }

    .samajsevak .carousel-cell .sevakdetail {
      text-align: center;
      font-size: 20px;
    }

    .footer {
      margin-top: 30px;
      background-color: #F4F4F5;
      color: rgb(0, 0, 0);
      padding: 30px;
    }

    .footer .row a {
      color: rgb(0, 0, 0);
      font-size: 25px;

    }

    .footer .row a:hover {
      text-decoration: underline;
    }

    .footer .row .col-md-4 svg {
      margin: 10px 20px 10px 0px;
      color: rgb(0, 0, 0) !important;
    }

    .stories .flickity-button {
      display: none;
    }

    .stories .flickity-page-dots {
      display: none;
    }

    .logo {
      margin-top: -10px;
    }

    nav span {
      color: white;
    }

    select {
      color: #000000;
    }

    .hidnot {
      visibility: hidden;
    }

    .navbar {
      line-height: 35px;
      position: fixed;
      width: 100%;
      z-index: 10000;
    }

    .about .row #body1 #data1,
    .about .row #body2 #data2,
    .about .row #body3 #data3,
    .about .row #body4 #data4 {
      display: none;
      padding: 10px;
      margin-top: -60px;
    }

    /*.about .row #body1,.about .row #body2,.about .row #body3,.about .row #body4{
    background-color: #97A8BD;
  /*  border: 30px solid transparent;
    border-image: url('data:image/jpeg;base64,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') 30 stretch;
    
    color: white;
    margin-top: 20px;
    font-size: 20px;
    margin-left: 50px;
    width: 200px;
    padding: 10px;
    border-radius: 90px/30px;
  }*/
    .about .row #title1,
    .about .row #title2,
    .about .row #title3,
    .about .row #title4 {
      padding: 10px 20px 55px 10px;
      font-size: 30px;
      font-weight: 500;
      cursor: pointer;
      display: block;
    }

    .about .row #body1,
    .about .row #body2,
    .about .row #body3,
    .about .row #body4 {
      border-radius: 55% 0 55% 0;
      height: 150px;
      font-size: 18px;
      padding: 10px 10px 0px 15px;
      cursor: pointer;
      transition: 0.25s;
      background-color: #97A8BD;
    }

    .about .row #body2 {
      background-color: #A197BD !important;
    }

    .about .row #body3 {
      background-color: #BCA797;
    }

    .about .row #body4 {
      background-color: #96BDAA;
    }

    .about .row svg {
      float: right;
      margin-left: 150px !important;
      color: white;
    }

    .members .carousel,
    .stories .carousel {
      margin-top: -10px !important;
    }

    .poplet a {
      border: 2px solid rgb(0, 0, 0);
      padding: 10px;
      margin-left: 5%;
      color: black;
      border-radius: 5px;
      box-shadow: rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px, rgba(17, 17, 26, 0.1) 0px 24px 80px;
      transition: 0.5s;
    }

    .poplet a:hover {
      color: gold;
      text-decoration: none;
      background-color: rgb(0, 0, 0);
    }

    .navbar-brand>img {
      display: block;

    }

    nav .container-fluid {
      height: 80px;
    }

    #login {
      left: 0px !important;
    }

    #register {
      left: 450px !important;
      display: none;
    }

    #optstatus p {
      padding-top: 10px;
      line-height: 20px;
      font-size: 15px;
      color: rgb(19, 37, 0);
    }

    a:hover {
      cursor: pointer;
    }

    #sendotp {
      display: none;
    }

    #google_translate_element select {
      outline: none;
      border: 0.1vw solid rgba(196, 186, 186, 0.301);
      color: white;
      padding: 0.2vw 0.5vw;
      font-size: 1.2vw;
      border-radius: 0.7vw;
      font-weight: bold;
      margin: 0vw 0.5vw;
      cursor: pointer;
      background: none;
    }

    #google_translate_element select:hover {
      border: 0.1vw solid black;
      background: white;
      color: black;
    }

    .nav>li>a {
      border: 0.1vw solid rgba(196, 186, 186, 0.301);
      color: white;
      padding: 0.2vw 0.5vw;
      font-size: 1.2vw;
      border-radius: 0.7vw;
      font-weight: bold;
      margin: 0vw 0.5vw;
      cursor: pointer;
    }

    .navbar-inverse .navbar-nav>li>a:hover {
      background-color: white;
      color: black;
      border: 0.1vw solid black;
    }

    #google_translate_element select:active {
      filter: blur(0.1vw);
    }

    #google_translate_element select option {
      color: black;
    }

    #google_translate_element .goog-logo-link {
      display: none;
    }

    #google_translate_element .goog-te-gadget {
      font-size: 0vw;
    }

    .navbar-inverse .navbar-nav>li>a {
      color: white;
    }

    .navbar-brand>img {
      display: block;
      margin-top: 0px;
      border-radius: 10px;
      height: 48px;
      width: 100%;
    }

    @media screen and (max-width: 400px) {
      .nav>li>a {
        border: none;
        color: white;
        padding: 10px;
        font-size: 18px;
        font-weight: bold;
      }

      #google_translate_element select {
        font-size: 18px;
      }
    }

    .goog-te-banner-frame.skiptranslate {
      display: none !important;
    }

    body {
      top: 0px !important;
    }

    @media screen and (min-width: 721px) {
      .eventDetails1 {
        /* border: 1px solid red; */
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        font-size: 1.4vw;
        font-weight: bold;
        padding: 0.5vw 1vw;
      }

      .eventDetails1 div {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
      }

      .eventDetails1 img {
        height: 1.5vw;
        margin-right: 0.7vw;
      }
    }

    @media screen and (max-width: 720px) {
      .eventDetails1 {
        /* border: 1px solid red; */
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        font-size: 4vw;
        font-weight: bold;
        padding: 2vw 2vw;
      }

      .eventDetails1 div {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
      }

      .eventDetails1 img {
        height: 4.5vw;
        margin-right: 1.5vw;
      }
    }
  </style>
  <link rel="stylesheet" href="navBar.css">
  <link rel="stylesheet" href="bottom.css">
  <style>
    .flickity-page-dots {
      width: 97%;
    }

    .about {
      width: 100%;
    }

    .looking .row {
      width: 120%;
    }

    .ourStoryOut {
      min-height: 100%;
    }

    .eventsOut {
      min-height: 100%;
    }

    /* * {
      border: 1px solid blue;
    } */

    @media screen and (min-width: 721px) {

      .samajsevak {
        /* border: 1px solid red; */
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
        background: #F8F8F8;
      }

      .contactLeftOut {
        /* border: 1px solid blue; */
        width: 35vw;
        margin: 2vw 0vw;
      }

      .contactRightOut {
        /* border: 1px solid green; */
        width: 45%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
      }

      .leftOptionOut {
        /* border: 1px solid green; */
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        margin: 1.5vw 0vw;
        width: 35vw;
        background: white;
        border-radius: 0.2vw;
      }

      .leftOptionImgOut {
        /* border: 1px solid red; */
        width: 3.5vw;
        height: 3.5vw;
        /* padding: 0.5vw; */
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        /* background: black; */
        margin-left: 1vw;
      }

      .leftOptionImgOut1 {
        background: #A396C1;
      }

      .leftOptionImgOut2 {
        background: #C0A695;
      }

      .leftOptionImgOut3 {
        background: #8FBFA9;
      }

      .leftOptionOut img {
        width: 1.3vw;
        height: 1.3vw;
        filter: brightness(0) invert(1);
      }

      .leftOptionTextOut {
        /* border: 1px solid yellow; */
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        margin-left: 1vw;
      }

      .leftOptionText {
        /* border: 1px solid red; */
        font-size: 1.3vw;
      }

      .leftOptionText1 {
        margin: 0.5vw 0vw 0.1vw 0vw;
      }

      .leftOptionText2 {
        margin: 0vw 0vw 0.5vw 0vw;
      }

      .rightOptionHead {
        font-size: 1.5vw;
        font-weight: bold;
        margin: 1vw 0vw;
      }

      .rightOptionName {
        font-size: 1.4vw;
        border: 1px solid rgb(0, 0, 0, 0.07);
        background: white;
        width: 30vw;
        border-radius: 0.2vw;
        padding: 0.5vw;
        outline: none;
        margin: 1vw 0vw;
      }

      .rigthOptionMail {
        font-size: 1.4vw;
        border: 1px solid rgb(0, 0, 0, 0.07);
        background: white;
        width: 30vw;
        border-radius: 0.2vw;
        padding: 0.5vw;
        outline: none;
        margin: 1vw 0vw;
      }

      .rightOptionSubmit {
        background: slategrey;
        color: white;
        padding: 0.3vw 1vw;
        font-size: 1.4vw;
        border: none;
        outline: none;
        border-radius: 0.2vw;
        margin: 1vw 0vw;
        border: 0.1vw solid transparent;
      }

      .rightOptionSubmit:hover {
        border: 0.1vw solid black;
        color: black;
        background: none;
      }

      .rightOptionSubmit:active {
        filter: blur(0.1vw);
      }
    }

    @media screen and (max-width: 720px) {
      .samajsevak {
        /* border: 1px solid red; */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background: #F8F8F8;
      }

      .contactLeftOut {
        /* border: 1px solid blue; */
        width: 90vw;
        margin: 4vw 0vw;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }

      .contactRightOut {
        /* border: 1px solid green; */
        width: 90%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 4vw;
      }

      .leftOptionOut {
        /* border: 1px solid green; */
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        margin: 2vw 0vw;
        width: 90vw;
        background: white;
        border-radius: 1vw;
      }

      .leftOptionImgOut {
        /* border: 1px solid red; */
        width: 12vw;
        height: 12vw;
        /* padding: 0.5vw; */
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        /* background: black; */
        margin-left: 3vw;
      }

      .leftOptionImgOut1 {
        background: #A396C1;
      }

      .leftOptionImgOut2 {
        background: #C0A695;
      }

      .leftOptionImgOut3 {
        background: #8FBFA9;
      }

      .leftOptionOut img {
        width: 4.7vw;
        height: 4.7vw;
        filter: brightness(0) invert(1);
      }

      .leftOptionTextOut {
        /* border: 1px solid yellow; */
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        margin-left: 3vw;
      }

      .leftOptionText {
        /* border: 1px solid red; */
        font-size: 4.5vw;
      }

      .leftOptionText1 {
        margin: 2vw 0vw 0.4vw 0vw;
      }

      .leftOptionText2 {
        margin: 0vw 0vw 2vw 0vw;
      }

      .rightOptionHead {
        font-size: 5vw;
        font-weight: bold;
        margin: 1vw 0vw;
      }

      .rightOptionName {
        font-size: 4.5vw;
        border: 0.1vw solid rgb(0, 0, 0, 0.07);
        background: white;
        width: 90vw;
        border-radius: 1vw;
        padding: 2vw;
        outline: none;
        margin: 2vw 0vw;
      }

      .rigthOptionMail {
        font-size: 4.5vw;
        border: 0.1vw solid rgb(0, 0, 0, 0.07);
        background: white;
        width: 90vw;
        border-radius: 1vw;
        padding: 2vw;
        outline: none;
        margin: 2vw 0vw;
      }

      .rightOptionSubmit {
        background: slategrey;
        color: white;
        padding: 1vw 3vw;
        font-size: 4.5vw;
        border: none;
        outline: none;
        border-radius: 1vw;
        margin: 4vw 0vw;
        border: 0.1vw solid transparent;
      }

      /* .rightOptionSubmit:hover {
        border: 0.1vw solid black;
        color: black;
        background: none;
      } */

      .rightOptionSubmit:active {
        filter: blur(0.3vw);
      }
    }
  </style>
  <link rel="stylesheet" href="navBar.css">
  <link rel="stylesheet" href="bottom.css">
</head>

<body>
  <!-- nav bar starts -->
  <?php include_once("navBar.php"); ?>
  <!-- nav bar ends -->

  <!--Login and register option-->
  <div class="log-regis" id="loginHere">
    <div class="button-box">
      <div id="btn"></div>
      <button type="button" class="toggle" id="log" style="color: #fff;" onclick="register()">Login</button>
      <button type="button" class="toggle" id="tar" onclick="login()">Register</button>
    </div>
    <div class="input" id="login">
      <form method="POST" action="backend/login.php">
        Email ID<input type="text" name="userid" id="input" placeholder="Enter Email ID" required><br>
        Password<input type="password" name="pass" id="passInput" placeholder="Enter Password" required><br>
        <div style="display: flex; justify-content: flex-start; align-items: center; font-size: 14px;">
          <input style="margin: auto 0px; cursor: pointer;" type="checkbox" onclick="showHidePass()">
          <span style="margin-left: 7px;">Show Password</span>
        </div>
        <div class="forlog"><a href="backend/changePass/forgotPass.php" id="forgotpass">forgot password</a><span><input type="submit" value="Login" id="submit" name="submit"></span></div>
      </form>
    </div>
    <div class="input" id="register">
      <form method="POST">
        Mobile Number<input type="text" title="Please enter valid phone number" pattern="[6789][0-9]{9}" name="mobile" id="mobile" placeholder="Enter valid mobile number" required><br>
        <span id="optstatus"><input type="button" onclick="optstatus()" value="Send OTP" id="regtr1" name="send_otp"></span>
      </form>
      <form action="backend/otp.php" method="post">
        OTP<input type="number" name="inotp" id="otp" placeholder="Enter OTP" required><br>
        <span><input type="submit" value="Register" id="regtr" name="register"></span>
      </form>
    </div>
    <br>
  </div>
  <script type="text/JavaScript">


    var area = document.getElementById('optstatus');
    var initbtn = document.getElementById('regtr1');

    function optstatus() {
      // console.log('Layout Clicked');
      var mobile = document.getElementById("mobile");
      var otp = document.getElementById("otp");
      var btn = document.getElementById("regtr1");
      if (mobile.value != '' && mobile.value.length == 10) {
        $(document).ready(function () {
          var mobile = $("#mobile").val();
          $.post("backend/sendotp.php", {
            mobile: mobile,
          }).always(function() {
              console.log("Success");
            });
        });
        var resentPassTime = 30;
        var resetPassInterval = setInterval(() => {
          if (resentPassTime > 0) {
            area.innerHTML = '<span id="optstatus"><input type="button" onclick="optstatus()" value="Resend OTP in ' + resentPassTime + 's" id="regtr1" name="send_otp" disabled></span>';
            resentPassTime = resentPassTime - 1;
          } else {
            area.innerHTML = '<span id="optstatus"><input type="button" onclick="optstatus()" value="Resend OTP" id="regtr1" name="send_otp"></span>';
            clearInterval(resetPassInterval);
          }
        }, 1000);
        initbtn.style.display = "none";
      } else {
        alert("Kindly enter valid details!");
      }
    }

//     $(document).ready(function () {
//   // Listen to click event on the submit button
//   $('#regtr1').click(function (e) {
//     e.preventDefault();
//     console.log('OTP Clicked');
//     var mobile = $("#mobile").val();
//     $.post("backend/sendotp.php", {
//       mobile: mobile,
//     }).always(function() {
//         console.log("Success");
//       });
//   });
// });
function showHidePass(){
  let passInput = document.getElementById('passInput');
  if(passInput.type === 'password'){
    passInput.type = 'text';
  }
  else{
    passInput.type = 'password';
  }
}
</script>
  <div class="looking" id="look">
    <div class="row">
      <div class="col-md-3">
        I am looking for<select name="sex" id="sex" style="margin-left: 0px; width: 100px;">
          <option value="woman">Woman</option>
          <option value="man">Man</option>
        </select>
      </div>
      <div class="col-md-3">
        Aged (in yrs) <br><select name="age" id="age" style="margin-left: 0px; width: 60px;">
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
          <option value="32">32</option>
          <option value="33">33</option>
        </select>
        <label id="age_issue">To</label><select name="age" id="to" style="width: 60px;">
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
          <option value="32">32</option>
          <option value="33">33</option>
          <option value="34">34</option>
        </select>
      </div>
      <div class="col-md-3">
        Gotra <br><select name="gotra" id="gotra" style="margin-left: 0px;">
          <option value='Aankul'>Aankul</option>
          <option value='Abhimanchkul'>Abhimanchkul</option>
          <option value='Abhimankul'>Abhimankul</option>
          <option value='Abhimanyukul'>Abhimanyukul</option>
          <option value='Akumanchal'>Akumanchal</option>
          <option value='Anantkul'>Anantkul</option>
          <option value='Ankul'>Ankul</option>
          <option value='Antakul'>Antakul</option>
          <option value='Ayankul'>Ayankul</option>
          <option value='Balshishta'>Balshishta</option>
          <option value='Balshatal'>Balshatal</option>
          <option value='Bhanukul'>Bhanukul</option>
          <option value='Bibshatla'>Bibshatla</option>
          <option value='Bomadshatla'>Bomadshatla</option>
          <option value='Budhankul'>Budhankul</option>
          <option value='Chandkul'>Chandkul</option>
          <option value='Chandrakul'>Chandrakul</option>
          <option value='Chandrashil'>Chandrashil</option>
          <option value='Chidrupkul'>Chidrupkul</option>
          <option value='Chilkul'>Chilkul</option>
          <option value='Chilshil'>Chilshil</option>
          <option value='Chinnakul'>Chinnakul</option>
          <option value='Chitrapil'>Chitrapil</option>
          <option value='Chennakul'>Chennakul</option>
          <option value='Channakul'>Channakul</option>
          <option value='Deokul'>Deokul</option>
          <option value='Deoshatla'>Deoshatla</option>
          <option value='Deoshetti'>Deoshetti</option>
          <option value='Devshishta'>Devshishta</option>
          <option value='Deshatla'>Deshatla</option>
          <option value='Dhankul'>Dhankul</option>
          <option value='Dhanshil'>Dhanshil</option>
          <option value='Dikshkul'>Dikshkul</option>
          <option value='Ebhrashatla'>Ebhrashatla</option>
          <option value='Ebishatla'>Ebishatla</option>
          <option value='Ekshakul'>Ekshakul</option>
          <option value='Enkol'>Enkol</option>
          <option value='Enkul'>Enkul</option>
          <option value='Ennakul'>Ennakul</option>
          <option value='Eshashishta'>Eshashishta</option>
          <option value='Eshpal'>Eshpal</option>
          <option value='Eshwakul'>Eshwakul</option>
          <option value='Gandheshwar'>Gandheshwar</option>
          <option value='Ganshatla'>Ganshatla</option>
          <option value='Gaurshatla'>Gaurshatla</option>
          <option value='Gondakulla'>Gondakulla</option>
          <option value='Gondkul'>Gondkul</option>
          <option value='Gontakul'>Gontakul</option>
          <option value='Gunai'>Gunai</option>
          <option value='Gundkul'>Gundkul</option>
          <option value='Guntkul'>Guntkul</option>
          <option value='Gandheshil'>Gandheshil</option>
          <option value='Janukul'>Janukul</option>
          <option value='Jenchkul'>Jenchkul</option>
          <option value='Khushal'>Khushal</option>
          <option value='Komarshatla'>Komarshatla</option>
          <option value='Kumshatla'>Kumshatla</option>
          <option value='Madankul'>Madankul</option>
          <option value='Malshet'>Malshet</option>
          <option value='Mandkul'>Mandkul</option>
          <option value='Mankul'>Mankul</option>
          <option value='Masantkul'>Masantkul</option>
          <option value='Minkul'>Minkul</option>
          <option value='Mithunkul'>Mithunkul</option>
          <option value='Molukul'>Molukul</option>
          <option value='Moonkul'>Moonkul</option>
          <option value='Morkul'>Morkul</option>
          <option value='Mulkul'>Mulkul</option>
          <option value='Munikul'>Munikul</option>
          <option value='Murkul'>Murkul</option>
          <option value='Munjikula'>Munjikula</option>
          <option value='Nabhilkul'>Nabhilkul</option>
          <option value='Nabhilla'>Nabhilla</option>
          <option value='Narali'>Narali</option>
          <option value='Navshil'>Navshil</option>
          <option value='Pabhal'>Pabhal</option>
          <option value='Prabhal'>Prabhal</option>
          <option value='Padgeshil'>Padgeshil</option>
          <option value='Padgeshwar'>Padgeshwar</option>
          <option value='Padmashatla'>Padmashatla</option>
          <option value='Padmashil'>Padmashil</option>
          <option value='Padmashishta'>Padmashishta</option>
          <option value='Pagadikul'>Pagadikul</option>
          <option value='Paidikul'>Paidikul</option>
          <option value='Paidkul'>Paidkul</option>
          <option value='Paitkul'>Paitkul</option>
          <option value='Panaskul'>Panaskul</option>
          <option value='Panchkul'>Panchkul</option>
          <option value='Panshil'>Panshil</option>
          <option value='Pansul'>Pansul</option>
          <option value='Parashar'>Parashar</option>
          <option value='Paulshishta'>Paulshishta</option>
          <option value='Pawanshil'>Pawanshil</option>
          <option value='Pendakul'>Pendakul</option>
          <option value='Pendalkul'>Pendalkul</option>
          <option value='Pendlikul'>Pendlikul</option>
          <option value='Penlikul'>Penlikul</option>
          <option value='Pennakul'>Pennakul</option>
          <option value='Polishatla'>Polishatla</option>
          <option value='Polshatla'>Polshatla</option>
          <option value='Pongeshil'>Pongeshil</option>
          <option value='Puchhakul'>Puchhakul</option>
          <option value='Pulashatla'>Pulashatla</option>
          <option value='Pulkul'>Pulkul</option>
          <option value='Pulshetal'>Pulshetal</option>
          <option value='Punavshil'>Punavshil</option>
          <option value='Pungeshil'>Pungeshil</option>
          <option value='Pungwshwar'>Pungwshwar</option>
          <option value='Punjashil'>Punjashil</option>
          <option value='Punyashil'>Punyashil</option>
          <option value='Punyeshwar'>Punyeshwar</option>
          <option value='Pushpal'>Pushpal</option>
          <option value='Perushatla'>Perushatla</option>
          <option value='Parishatla'>Parishatla</option>
          <option value='Punsakul'>Punsakul</option>
          <option value='Rankul'>Rankul</option>
          <option value='Rantkul'>Rantkul</option>
          <option value='Rentkul'>Rentkul</option>
          <option value='Runtakul'>Runtakul</option>
          <option value='Renukul'>Renukul</option>
          <option value='Rontakul'>Rontakul</option>
          <option value='Sankul'>Sankul</option>
          <option value='Senshatla'>Senshatla</option>
          <option value='Shaigol'>Shaigol</option>
          <option value='Shaivgol'>Shaivgol</option>
          <option value='Shankul'>Shankul</option>
          <option value='Shayankul'>Shayankul</option>
          <option value='Sheelkul'>Sheelkul</option>
          <option value='Shirsal'>Shirsal</option>
          <option value='Shirshatla'>Shirshatla</option>
          <option value='Shrinikul'>Shrinikul</option>
          <option value='Shrishal'>Shrishal</option>
          <option value='Shrishatla'>Shrishatla</option>
          <option value='Shrisheel'>Shrisheel</option>
          <option value='Shrishishta'>Shrishishta</option>
          <option value='Shrishreshta'>Shrishreshta</option>
          <option value='Sirsal'>Sirsal</option>
          <option value='Sirshatla'>Sirshatla</option>
          <option value='Sudarshan'>Sudarshan</option>
          <option value='Surkul'>Surkul</option>
          <option value='Sursal'>Sursal</option>
          <option value='Suryakul'>Suryakul</option>
          <option value='Susal'>Susal</option>
          <option value='Totkul'>Totkul</option>
          <option value='Tulshishta'>Tulshishta</option>
          <option value='Tulshitla'>Tulshitla</option>
          <option value='Tulashatla'>Tulashatla</option>
          <option value='Upankul'>Upankul</option>
          <option value='Utkul'>Utkul</option>
          <option value='Utkalkul'>Utkalkul</option>
          <option value='Vachhakul'>Vachhakul</option>
          <option value='Vastrakul'>Vastrakul</option>
          <option value='Vatsakul'>Vatsakul</option>
          <option value='Vinukul'>Vinukul</option>
          <option value='Viparishatla'>Viparishatla</option>
          <option value='Viparishishta'>Viparishishta</option>
          <option value='Viprashatla'>Viprashatla</option>
          <option value='Vishnukul'>Vishnukul</option>
          <option value='Vishwakul'>Vishwakul</option>
          <option value='Vishwapal'>Vishwapal</option>
          <option value='Vikramshishta'>Vikramshishta</option>
          <option value='Vikramshil'>Vikramshil</option>
          <option value='Yalkul'>Yalkul</option>
          <option value='Yalshat'>Yalshat</option>
          <option value='Yalshatla'>Yalshatla</option>
          <option value='Yalshatti'>Yalshatti</option>
          <option value='Yalshishta'>Yalshishta</option>
          <option value='Yankul'>Yankul</option>
          <option value='Yannukul'>Yannukul</option>
          <option value='Yenkul'>Yenkul</option>
          <option value='Yetakul'>Yetakul</option>
        </select>
      </div>
      <div class="col-md-3">
        <button><a href="harsh1/index1.php" style="color: white;">Let's Begin</a></button>
      </div>
    </div><br>
  </div>
  <div class="about" id="about">
    <button id="btnabout">About</button>
    <div class="row" style="background-color: #fff;color: black;">
      <div class="col-md-3">
        <p>
        <div id="body1">
          <div id="title1"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z" />
              <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
              <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
            </svg> Stories </div>
          <div id="data1">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
        </div>
        </p>
      </div>
      <div class="col-md-3">
        <p>
        <div id="body2">
          <div id="title2"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-calendar2-event-fill" viewBox="0 0 16 16">
              <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zM11.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
            </svg> Events </div>
          <div id="data2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
        </div>
        </p>
      </div>
      <div class="col-md-3">
        <p>
        <div id="body3">
          <div id="title3"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
              <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
              <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
              <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
            </svg> Members </div>
          <div id="data3">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
        </div>
        </p>
      </div>
      <div class="col-md-3">
        <p>
        <div id="body4">
          <div id="title4"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
              <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg> Mission </div>
          <div id="data4">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
        </div>
        </p>
      </div>
    </div>
  </div>

  <div class="poplet">
    Lorem, ipsum dolor sit amet consectetur! <a href="#">Get Started</a>
  </div>
  <div class="state">
    Best matches aren't created, they are found!!
  </div>
  <div class="stories" name="story">
    <button id="btnstory">Our Stories 💖</button>
    <div class="carousel" data-flickity='{ "wrapAround": true, "autoPlay":1800 , "imagesLoaded":true }'>
      <?php
      while ($storyRow = mysqli_fetch_assoc($storyQuery)) {
        echo '
      <div class="carousel-cell ourStoryOut">
        <img src="' . $storyRow['couple_img'] . '" alt="Unable to load"><br>
        <div class="storydetail" id="event1">
          <b>' . $storyRow['var_name'] . ' & ' . $storyRow['vadhu_name'] . '</b><br>
          <p>' . $storyRow['story_details'] . '</p>
        </div>
      </div>
      ';
      }
      ?>

      <!-- <div class="carousel-cell">
        <img src="images/couple.jpeg" alt="Unable to load"><br>
        <div class="storydetail">
          <b>Shankarshan Karhade,<br> Marathi Actor</b><br>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, ratione. Illum sed voluptatem, doloremque mollitia fugiat dignissimos quod ab ducimus recusandae culpa accusamus et corrupti dicta quaerat molestiae obcaecati quia!
          </p>
        </div>
      </div> -->

    </div>
  </div>
  </div>
  <div class="event" name="event" id="eventsSection">
    <button style="margin-top: 30px;" id="event">Events</button>
    <div class="row" style="margin-bottom: 20px;">
      <?php
      while ($eventsRow = mysqli_fetch_assoc($eventsQuery)) {
        echo '
              <div class="col-md-5 eventsOut">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-calendar2-event-fill" viewBox="0 0 16 16">
                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zM11.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
                </svg>
                <div class="eventdetail">
                  <b>' . $eventsRow['event_name'] . '</b>
                  <p>' . $eventsRow['event_details'] . '</p>
                </div>
                <div class="eventDetails1">
                  <div><img src="harsh1/events.svg"><span>' . $eventsRow['event_date'] . '</span></div>
                  <div><img src="harsh1/clock.svg"><span>' . $eventsRow['event_time'] . '</span></div>
                </div>
              </div>
            ';
      }
      ?>
      <!-- <div class="col-md-5">
        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-calendar2-event-fill" viewBox="0 0 16 16">
          <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zM11.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z" />
        </svg>
        <div class="eventdetail">
          <b>Event Title</b>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic eos facere, quas sed deleniti culpa obcaecati laboriosam quaerat nihil reprehenderit debitis, quo, ipsam quisquam. Nulla obcaecati tenetur praesentium iure quidem.</p>
        </div>
      </div> -->
    </div>
  </div>
  <div class="members" name="members">
    <button id="members">Members</button>
    <div class="carousel" data-flickity='{ "wrapAround": true, "autoPlay":2000 , "imagesLoaded":true }'>
      <?php
      while ($maleRow = mysqli_fetch_assoc($maleQuery)) {
        echo '
        <div class="carousel-cell">
        <img src="' . $maleRow['profile_img'] . '" alt="Unable to load">
        <div class="memberdetail" href="#loginHere" onclick="askToLogin()"><div id="' . $Infostaus . '"><b>Name:</b>' . $maleRow['fname'] . " " . $maleRow['lname'] . '<br><b>ID:</b>' . $maleRow['id'] . ' <br><b>Age:</b>' . $maleRow['age'] . '  yrs<br><b>Occupation:</b>' . $maleRow['occupation'] . '  <br><b>Height:</b>' . $maleRow['height'] . ' cm </div><br>
          <div class="optionmem"><button id="fullpro"><a href="#">Full Profile</a></button>
              </svg></label></div>
        </div>
      </div>';
      }
      ?>
      <?php
      while ($femaleRow = mysqli_fetch_assoc($femaleQuery)) {
        echo '
      <div class="carousel-cell">
        <img src="' . $femaleRow['profile_img'] . '" alt="Unable to load">
        <div class="memberdetail" href="#loginHere" onclick="askToLogin()"><div id="' . $Infostaus . '"><b>Name:</b>' . $femaleRow['fname'] . " " . $femaleRow['lname'] . '<br><b>ID:</b>' . $femaleRow['id'] . ' <br><b>Age:</b>' . $femaleRow['age'] . '  yrs<br><b>Occupation:</b>' . $femaleRow['occupation'] . '  <br><b>Height:</b>' . $femaleRow['height'] . ' cm </div><br>
          <div class="optionmem"><button id="fullpro"><a href="#">Full Profile</a></button>
              </svg></label></div>
        </div>
      </div>';
      }
      ?>

      <!-- <div class="carousel-cell">
       <img src="images/prabhas.jpeg" alt="Unable to load">
        <div  class="memberdetail"> <b>Name:</b>Prabhas Pattewar <br><b>ID:</b>10948 <br><b>Age:</b>23 yrs<br><b>Occupation:</b>Engineer <br><b>Height:</b>6'4"<br>
          <div class="optionmem"><button id="fullpro"><a href="#">Full Profile</a></button><input type="checkbox" id="likecheck1" hidden onclick="colorchange()" style="font-size: 25px;"><label for="likecheck1" id="like1">🤍</label><input type="checkbox" id="flagcheck1" hidden onclick="colorchange()"><label for="flagcheck1" id="flag1" style="font-size: 25px;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-flag" viewBox="0 0 16 16">
                <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z" />
              </svg></label></div>
        </div>
      </div> -->

    </div>
  </div>
  <!-- <div class="samajsevak" style="margin-top: 30px;">
    <button id="samajsevak">Samaj Sevak</button><br>
    <div class="carousel" data-flickity='{ "wrapAround": true, "autoPlay":2000 , "imagesLoaded":true }'>
      <div class="carousel-cell">
        <img src="images/sevak.jpeg" alt="">
        <div class="sevakdetail">Gajanan Parsewar <br>Pune</div>
      </div>
      <div class="carousel-cell">
        <img src="images/sevak.jpeg" alt="">
        <div class="sevakdetail">Gajanan Parsewar <br>Pune</div>
      </div>
      <div class="carousel-cell">
        <img src="images/sevak.jpeg" alt="">
        <div class="sevakdetail">Gajanan Parsewar <br>Pune</div>
      </div>
      <div class="carousel-cell">
        <img src="images/sevak.jpeg" alt="">
        <div class="sevakdetail">Gajanan Parsewar <br>Pune</div>
      </div>
      <div class="carousel-cell">
        <img src="images/sevak.jpeg" alt="">
        <div class="sevakdetail">Gajanan Parsewar <br>Pune</div>
      </div>
      <div class="carousel-cell">
        <img src="images/sevak.jpeg" alt="">
        <div class="sevakdetail">Gajanan Parsewar <br>Pune</div>
      </div>
      <div class="carousel-cell">
        <img src="images/sevak.jpeg" alt="">
        <div class="sevakdetail">Gajanan Parsewar <br>Pune</div>
      </div>
    </div>
  </div> -->
  <!-- <<<<<<< HEAD -->
  <!-- <div class="samajsevak" id="contactUsSection" style="margin-top: 30px;">
    <div class="contactLeftOut"> -->
  <!-- <div class="leftOptionOut">
        <div class="leftOptionImgOut leftOptionImgOut1">
          <img src="harsh1/phone.svg">
        </div>
        <div class="leftOptionTextOut">
          <div class="leftOptionText leftOptionText1" style="font-weight: bold;">
            Give Us A Call At:
          </div>
          <div class="leftOptionText leftOptionText2">
            0000000000
          </div>
        </div>
      </div> -->
  <!-- <div class="leftOptionOut"> -->
  <!-- <div class="leftOptionOut">
        <div class="leftOptionImgOut leftOptionImgOut2">
          <img src="harsh1/envelope.svg">
        </div>
        <div class="leftOptionTextOut">
          <div class="leftOptionText leftOptionText1" style="font-weight: bold;">
            Send Us A Mail At:
          </div>
          <div class="leftOptionText leftOptionText2">
            akshadaasite@gmail.com
          </div>
        </div>
      </div> -->
  <!-- </div> -->
  <!-- <div class="leftOptionOut"> -->
  <!-- <div class="leftOptionOut">
        <div class="leftOptionImgOut leftOptionImgOut3">
          <img src="harsh1/location.svg" class="leftOptionImg"> -->
  <!-- ======= -->
  <div class="samajsevak" style="margin-top: 30px;" id="contactUsSection">
    <div class="contactLeftOut">
      <div class="leftOptionOut">
        <div class="leftOptionImgOut leftOptionImgOut1">
          <img src="harsh1/phone.svg">
        </div>
        <div class="leftOptionTextOut">
          <div class="leftOptionText leftOptionText1" style="font-weight: bold;">
            Give Us A Call At:
          </div>
          <div class="leftOptionText leftOptionText2">
            0000000000
          </div>
        </div>
      </div>
      <!-- <div class="leftOptionOut"> -->
      <div class="leftOptionOut">
        <div class="leftOptionImgOut leftOptionImgOut2">
          <img src="harsh1/envelope.svg">
        </div>
        <div class="leftOptionTextOut">
          <div class="leftOptionText leftOptionText1" style="font-weight: bold;">
            Send Us A Mail At:
          </div>
          <div class="leftOptionText leftOptionText2">
            akshadaasite@gmail.com
          </div>
        </div>
      </div>
      <!-- </div> -->
      <!-- <div class="leftOptionOut"> -->
      <div class="leftOptionOut">
        <div class="leftOptionImgOut leftOptionImgOut3">
          <img src="harsh1/location.svg" class="leftOptionImg">
        </div>
        <div class="leftOptionTextOut">
          <div class="leftOptionText leftOptionText1" style="font-weight: bold;">
            Come Visit Us At:
          </div>
          <div class="leftOptionText leftOptionText2">
            Location
          </div>
        </div>
      </div>
    </div>
    <!-- >>>>>>> 415e7ddc083a76a37847e240f2b285a680e36316 -->
    <!-- </div> -->
    <div class="contactRightOut" id="contactusportion">
      <div class="rightOptionHead">
        For Any Further Enquiries, Submit Your Infomation Below
      </div>
      <input type="text" id="enq_name" class="rightOptionName" placeholder="Name" />
      <input type="email" id="enq_email" class="rigthOptionMail" placeholder="Email" />
      <button class="rightOptionSubmit" id="enquirySubmit">Submit</button>
    </div>
  </div>
  <!-- <<<<<<< HEAD  -->
  <!-- </div> -->
  <!-- <div class="footer" id="endofpage"> -->
  <script>
    $(document).ready(function() {
      $("#enquirySubmit").click(function(e) {
        e.preventDefault();
        let enq_name = $("#enq_name").val();
        let enq_email = $("#enq_email").val();
        if (enq_name != null && enq_name.trim() != "" && enq_email != null && enq_email.trim() != "") {
          // console.log(enq_name, ' ', enq_email)
          // if ((mobile.trim()).length == 10) {
          $.ajax({
            url: "enquiry.php",
            type: "POST",
            dataType: "text",
            data: {
              enq_name: enq_name,
              enq_email: enq_email
            },
            success: function(response) {
              // peoplecards.innerHTML = response;
              console.log(response);
              alert("Your Details For Enquiry Are Submitted Successfully, We Will Reach Out To You Soon!");
              $("#enq_name").val('');
              $("#enq_email").val('');
            }
          });
          // } else {
          //   alert("Please Enter A Valid Mobile No.!");
          // }
        } else {
          alert("Please Fill All Details!");
          // console.log(fname + " " + lname + " " + c_country + " " + mobile + " " + gender + " " + dob);
        }
      });
    });
  </script>
  <!-- <div class="footer">
    <div class="row" name="footer">
      <div class="col-md-4">
        <a href="#">akshadaa.com</a><br>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate fugit nam nesciunt quae reiciendis deserunt non ducimus voluptatem magni, maxime iure voluptatibus doloribus autem odio molestiae, dolorum expedita laborum vero. <br>
        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-facebook" viewBox="0 0 16 16">
            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
          </svg></a>
        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-instagram" viewBox="0 0 16 16">
            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
          </svg></a>
        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-google" viewBox="0 0 16 16">
            <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
          </svg></a>
        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-youtube" viewBox="0 0 16 16">
            <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
          </svg></a>
      </div>
      <div class="col-md-3">
        <b><a href="#">Upcoming Events</a></b><br><br>
        <b><a href="#">Our Members</a></b><br><br>
        <b><a href="#">Samaj Sevak Members</a></b><br><br>
      </div>
      <div class="col-md-4">
        <b style="font-size: 30px;">Event Detail</b><br>
        <img src="../images/event.jpeg" alt="Unable to load" style="width: 60%; height: 150px;">
      </div>
    </div>
  </div> -->

  <?php //include_once("bottom.php"); 
  ?>
  <!-- <script>
    function askToLogin() {
      alert("You need to login first to see profile of people!");
    }
  </script> -->
  <!-- <script>
    let moreOptionsOutMobile = document.getElementsByClassName("moreOptionsOutMobile");

    function moreOptionsOpenMobile() {
      if (moreOptionsOutMobile[0].style.visibility == "hidden" || moreOptionsOutMobile[0].style.visibility == "") {
        moreOptionsOutMobile[0].style.visibility = "visible";
        moreOptionsOutMobile[0].style.width = "45vw";
        moreOptionsOutMobile[0].style.height = "40vw";
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
        if (moreOptionsOutMobile[0].style.visibility == "visible" && !document.getElementsByClassName('hamburgerBtn')[0].contains(e.target)) {
          moreOptionsOutMobile[0].style.width = "0vw";
          moreOptionsOutMobile[0].style.height = "0vw";
          moreOptionsOutMobile[0].style.visibility = "hidden";
        }
      }
    });
  </script> -->

  <!-- <script>
    var area = document.getElementById('optstatus');
    var initbtn = document.getElementById('regtr1');

    function optstatus() {
      console.log('OTP Clicked');
      var mobile = document.getElementById("mobile");
      var otp = document.getElementById("otp");
      var btn = document.getElementById("regtr1");
      if (mobile.value != '' && mobile.value.length == 10) {
        // area.innerHTML = '<p>OTP sent!</p><input type="button" value="Resend OTP" onclick="optstatus()" id="regtr1" name="send_otp">';
        initbtn.style.display = "none";
        var resendTime = 30;
        var resendInterval = setInterval(() => {
          if (resendTime > 0) {
            console.log(resendTime);
            resendTime = resendTime - 1;
            area.innerHTML = '<p>OTP sent!</p><input type="button" value="Resend OTP ' + resendTime + '"' + ' onclick="optstatus()" id="regtr1" name="send_otp" disabled>';
          } else {
            console.log('Done');
            area.innerHTML = '<p>OTP sent!</p><input type="button" value="Resend OTP" onclick="optstatus()" id="regtr1" name="send_otp">';
            clearInterval(resendInterval);
          }
        }, 800);
      } else {
        alert("Kindly enter valid details!");
      }
    }
  </script> -->
  <!-- <script>
    document.getElementById('body1').onmouseover = function() {
      document.getElementById('data1').style.display = "block";
      document.getElementById('title1').style.fontSize = "45px";
      document.getElementById("title1").style.fontWeight = "bolder";
      document.getElementById("body1").style.height = "250px";
    }
    document.getElementById('body1').onmouseout = function() {
      document.getElementById('data1').style.display = "none";
      document.getElementById('title1').style.fontSize = "30px";
      document.getElementById("body1").style.height = "150px";
      document.getElementById("title1").style.fontWeight = "500";
    }
    document.getElementById('body2').onmouseover = function() {
      document.getElementById('data2').style.display = "block";
      document.getElementById('title2').style.fontSize = "45px";
      document.getElementById("title2").style.fontWeight = "bolder";
      document.getElementById("body2").style.height = "250px";
    }
    document.getElementById('body2').onmouseout = function() {
      document.getElementById('data2').style.display = "none";
      document.getElementById('title2').style.fontSize = "30px";
      document.getElementById("body2").style.height = "150px";
      document.getElementById("title2").style.fontWeight = "500";
    }
    document.getElementById('body3').onmouseover = function() {
      document.getElementById('data3').style.display = "block";
      document.getElementById('title3').style.fontSize = "45px";
      document.getElementById("title3").style.fontWeight = "bolder";
      document.getElementById("body3").style.height = "250px";
    }
    document.getElementById('body3').onmouseout = function() {
      document.getElementById('data3').style.display = "none";
      document.getElementById('title3').style.fontSize = "30px";
      document.getElementById("body3").style.height = "150px";
      document.getElementById("title3").style.fontWeight = "500";
    }
    document.getElementById('body4').onmouseover = function() {
      document.getElementById('data4').style.display = "block";
      document.getElementById('title4').style.fontSize = "45px";
      document.getElementById("title4").style.fontWeight = "bolder";
      document.getElementById("body4").style.height = "250px";
    }
    document.getElementById('body4').onmouseout = function() {
      document.getElementById('data4').style.display = "none";
      document.getElementById('title4').style.fontSize = "30px";
      document.getElementById("body4").style.height = "150px";
      document.getElementById("title4").style.fontWeight = "500";
    }
  </script> -->
  <!-- <script>
    function searchTextFunc() {
      let searchText = document.getElementById('searchTextInPage');
      window.find(searchTextInPage.value);
    }
  </script> -->
  <!-- <script>
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en',
        layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,
        includedLanguages: "en,hi,mr,te,kn"
      }, 'google_translate_element');
    }
  </script> -->
  <!-- <script src="code/index.js"></script>
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script> -->
  <!-- ======= -->
  <!-- <div class="footer" id="endofpage"> -->
  <script>
    $(document).ready(function() {
      $("#enquirySubmit").click(function(e) {
        e.preventDefault();
        let enq_name = $("#enq_name").val();
        let enq_email = $("#enq_email").val();
        if (enq_name != null && enq_name.trim() != "" && enq_email != null && enq_email
          .trim() != "") {
          // console.log(enq_name, ' ', enq_email)
          // if ((mobile.trim()).length == 10) {
          $.ajax({
            url: "enquiry.php",
            type: "POST",
            dataType: "text",
            data: {
              enq_name: enq_name,
              enq_email: enq_email
            },
            success: function(response) {
              // peoplecards.innerHTML = response;
              console.log(response);
              alert(
                "Your Details For Enquiry Are Submitted Successfully, We Will Reach Out To You Soon!"
              );
              $("#enq_name").val('');
              $("#enq_email").val('');
            }
          });
          // } else {
          //   alert("Please Enter A Valid Mobile No.!");
          // }
        } else {
          alert("Please Fill All Details!");
          // console.log(fname + " " + lname + " " + c_country + " " + mobile + " " + gender + " " + dob);
        }
      });
    });
  </script>
  <div class="footer">
    <div class="row" name="footer">
      <div class="col-md-4">
        <a href="#">akshadaa.com</a><br>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate fugit nam nesciunt quae
        reiciendis deserunt non ducimus voluptatem magni, maxime iure voluptatibus doloribus autem odio
        molestiae, dolorum expedita laborum vero. <br>
        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-facebook" viewBox="0 0 16 16">
            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
          </svg></a>
        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-instagram" viewBox="0 0 16 16">
            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
          </svg></a>
        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-google" viewBox="0 0 16 16">
            <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
          </svg></a>
        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-youtube" viewBox="0 0 16 16">
            <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
          </svg></a>
      </div>
      <div class="col-md-3">
        <b><a href="#">Upcoming Events</a></b><br><br>
        <b><a href="#">Our Members</a></b><br><br>
        <b><a href="#">Samaj Sevak Members</a></b><br><br>
      </div>
      <div class="col-md-4">
        <b style="font-size: 30px;">Event Detail</b><br>
        <img src="images/event.jpeg" alt="Unable to load" style="width: 60%; height: 150px;">
      </div>
    </div>
  </div>

  <?php include_once("bottom.php"); ?>
  <script>
    function askToLogin() {
      alert("You need to login first to see profile of people!");
    }
  </script>
  <script>
    let moreOptionsOutMobile = document.getElementsByClassName("moreOptionsOutMobile");

    function moreOptionsOpenMobile() {
      if (moreOptionsOutMobile[0].style.visibility == "hidden" || moreOptionsOutMobile[0].style.visibility ==
        "") {
        moreOptionsOutMobile[0].style.visibility = "visible";
        moreOptionsOutMobile[0].style.width = "45vw";
        moreOptionsOutMobile[0].style.height = "40vw";
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
        if (moreOptionsOutMobile[0].style.visibility == "visible" && !document.getElementsByClassName(
            'hamburgerBtn')[0].contains(e.target)) {
          moreOptionsOutMobile[0].style.width = "0vw";
          moreOptionsOutMobile[0].style.height = "0vw";
          moreOptionsOutMobile[0].style.visibility = "hidden";
        }
      }
    });
  </script>

  <!-- <script>
    var area = document.getElementById('optstatus');
    var initbtn = document.getElementById('regtr1');

    function optstatus() {
      console.log('LAyout Clicked');
      var mobile = document.getElementById("mobile");
      var otp = document.getElementById("otp");
      var btn = document.getElementById("regtr1");
      if (mobile.value != '' && mobile.value.length == 10) {
        var resentPassTime = 15;
        var resetPassInterval = setInterval(() => {
          if (resentPassTime > 0) {
            area.innerHTML = '<span id="optstatus"><input type="button" onclick="optstatus()" value="Resend OTP in ' + resentPassTime + 's" id="regtr1" name="send_otp" disabled></span>';
            resentPassTime = resentPassTime - 1;
          } else {
            area.innerHTML = '<span id="optstatus"><input type="button" onclick="optstatus()" value="Resend OTP" id="regtr1" name="send_otp"></span>';
            clearInterval(resetPassInterval);
          }
        }, 1000);
        initbtn.style.display = "none";
      } else {
        alert("Kindly enter valid details!");
      }
    }
  </script> -->
  <script>
    document.getElementById('body1').onmouseover = function() {
      document.getElementById('data1').style.display = "block";
      document.getElementById('title1').style.fontSize = "45px";
      document.getElementById("title1").style.fontWeight = "bolder";
      document.getElementById("body1").style.height = "250px";
    }
    document.getElementById('body1').onmouseout = function() {
      document.getElementById('data1').style.display = "none";
      document.getElementById('title1').style.fontSize = "30px";
      document.getElementById("body1").style.height = "150px";
      document.getElementById("title1").style.fontWeight = "500";
    }
    document.getElementById('body2').onmouseover = function() {
      document.getElementById('data2').style.display = "block";
      document.getElementById('title2').style.fontSize = "45px";
      document.getElementById("title2").style.fontWeight = "bolder";
      document.getElementById("body2").style.height = "250px";
    }
    document.getElementById('body2').onmouseout = function() {
      document.getElementById('data2').style.display = "none";
      document.getElementById('title2').style.fontSize = "30px";
      document.getElementById("body2").style.height = "150px";
      document.getElementById("title2").style.fontWeight = "500";
    }
    document.getElementById('body3').onmouseover = function() {
      document.getElementById('data3').style.display = "block";
      document.getElementById('title3').style.fontSize = "45px";
      document.getElementById("title3").style.fontWeight = "bolder";
      document.getElementById("body3").style.height = "250px";
    }
    document.getElementById('body3').onmouseout = function() {
      document.getElementById('data3').style.display = "none";
      document.getElementById('title3').style.fontSize = "30px";
      document.getElementById("body3").style.height = "150px";
      document.getElementById("title3").style.fontWeight = "500";
    }
    document.getElementById('body4').onmouseover = function() {
      document.getElementById('data4').style.display = "block";
      document.getElementById('title4').style.fontSize = "45px";
      document.getElementById("title4").style.fontWeight = "bolder";
      document.getElementById("body4").style.height = "250px";
    }
    document.getElementById('body4').onmouseout = function() {
      document.getElementById('data4').style.display = "none";
      document.getElementById('title4').style.fontSize = "30px";
      document.getElementById("body4").style.height = "150px";
      document.getElementById("title4").style.fontWeight = "500";
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
  <script src="code/index.js"></script>
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  <!-- >>>>>>> 415e7ddc083a76a37847e240f2b285a680e36316 -->
</body>

</html>
