<?php
require 'includes/init.php';
// $pathForCache = "../";
// include_once("../harsh1/helper/currentUserQuery.php");
if (isset($_SESSION['unique_id'])) {
  if (isset($_GET['id'])) {
    $user_data = $user_obj->find_user_by_id($_GET['id']);
    if ($user_data ===  false) {
      header('Location: profile.php');
      exit;
    } else {
      if ($user_data->id == $_SESSION['unique_id']) {
        header('Location: profile.php');
        exit;
      }
    }
  }
} else {
  header('Location: logout.php');
  exit;
}
// CHECK FRIENDS
$is_already_friends = $frnd_obj->is_already_friends($_SESSION['unique_id'], $user_data->id);
//  IF I AM THE REQUEST SENDER
$check_req_sender = $frnd_obj->am_i_the_req_sender($_SESSION['unique_id'], $user_data->id);
// IF I AM THE REQUEST RECEIVER
$check_req_receiver = $frnd_obj->am_i_the_req_receiver($_SESSION['unique_id'], $user_data->id);
// TOTAL REQUESTS
$get_req_num = $frnd_obj->request_notification($_SESSION['unique_id'], false);
// TOTAL FRIENDS
$get_frnd_num = $frnd_obj->get_all_friends($_SESSION['unique_id'], false);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>CHAT HERE</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      margin: 0vw;
      padding: 0vw;
      box-sizing: border-box;
      font-family: arial, sans-serif;
    }

    body {
      background: #F8F8F8;
    }

    button,
    a,
    select {
      -webkit-tap-highlight-color: transparent;
    }

    .goog-te-banner-frame.skiptranslate {
      display: none !important;
    }

    body {
      top: 0px !important;
    }
  </style>
  <link rel="stylesheet" href="wide.css">
  <link rel="stylesheet" href="mobile.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="navBar.css">
  <link rel="stylesheet" href="belowNav.css">
  <link rel="stylesheet" href="sideBar.css">
  <link rel="stylesheet" href="bottom.css">
  <style>
    body {
      margin: 0vw;
      padding: 0vw;
      box-sizing: border-box;
    }
  </style>
  <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>

<body>

  <?php include_once("sideBar.php"); ?>

  <?php include_once("navBar.php"); ?>

  <?php include_once("belowNav.php"); ?>

  <div class="contentOut">


    <!-- chat start -->
    <div class="profile_container">

      <!--div class="inner_profile">
            <div class="img">
                <img src="profile.jpeg" alt="Profile image">
            </div>
            <h1><?php //echo  $user_data->fname ." ".$user_data->lname;
                ?></h1>
  </div-->
      <nav>
        <ul>
          <li><a href="../harsh1/index1.php" style=" margin-bottom: -5px; padding: 0px 10px;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
              </svg></a></li>
          <li><a href="chat.php" rel="noopener noreferrer">Chat<span class="badge <?php
                                                                                  if ($get_req_num > 0) {
                                                                                    echo 'redBadge';
                                                                                  }
                                                                                  ?>"><?php echo $get_req_num; ?></span></a></li>
          <li><a href="friends.php" rel="noopener noreferrer">Friends<span class="badge"><?php echo $get_frnd_num; ?></span></a></li>

          <li><a href="notifications.php" rel="noopener noreferrer">Requests<span class="badge <?php
                                                                                                if ($get_req_num > 0) {
                                                                                                  echo 'redBadge';
                                                                                                }
                                                                                                ?>"><?php echo $get_req_num; ?></span></a></li>
          <li><a href="profile.php" rel="noopener noreferrer">All People</a></li>

        </ul>
      </nav>
      <div class="actions">
        <?php
        if ($is_already_friends) {
          echo '<a href="functions.php?action=unfriend_req&id=' . $user_data->id . '" class="req_actionBtn unfriend">Unfriend</a>';
        } elseif ($check_req_sender) {
          echo '<a href="functions.php?action=cancel_req&id=' . $user_data->id . '" class="req_actionBtn cancleRequest">Cancel Request</a>';
        } elseif ($check_req_receiver) {
          echo '<a href="functions.php?action=ignore_req&id=' . $user_data->id . '" class="req_actionBtn ignoreRequest">Ignore</a>&nbsp;
                    <a href="functions.php?action=accept_req&id=' . $user_data->id . '" class="req_actionBtn acceptRequest">Accept</a>';
        } else {
          echo '<a href="functions.php?action=send_req&id=' . $user_data->id . '" class="req_actionBtn sendRequest">Send Request</a>';
        }
        ?>

      </div>
    </div>


  </div>
  <script>
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en',
        layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,
        includedLanguages: "en,hi,mr,te,kn"
      }, 'google_translate_element');
    }
  </script>
  <script src="dropDowns.js"></script>


  </div>

  <?php include_once("bottom.php"); ?>

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

</body>

</html>