<?php
require 'includes/init.php';
include_once "php/conn.php";
$pathForCache = "../";
include_once("../harsh1/helper/currentUserQuery.php");
if (isset($_SESSION['unique_id'])) {
  $user_data = $user_obj->find_user_by_id($_SESSION['unique_id']);
  if ($user_data ===  false) {
    header('Location: logout.php');
    exit;
  }
  // FETCH ALL USERS WHERE ID IS NOT EQUAL TO MY ID
  //$all_users = $user_obj->all_users($_SESSION['user_id']);
} else {
  header('Location: logout.php');
  exit;
}
//$all_users = $user_obj->all_users($_SESSION['user_id']);
// REQUEST NOTIFICATION NUMBER
$get_req_num = $frnd_obj->request_notification($_SESSION['unique_id'], false);
// TOTAL FRIENDS
$get_frnd_num = $frnd_obj->get_all_friends($_SESSION['unique_id'], false);
// GET MY($_SESSION['user_id']) ALL FRIENDS
$get_all_friends = $frnd_obj->get_all_friends($_SESSION['unique_id'], true);

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

    #msg_show {
      display: block;
      padding: 20px 10px;
    }

    #areFRND {
      display: block;
    }

    #notFRND,
    #msg_hide {
      display: none;
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
            <h1><?php //echo  $user_data->fname ." ". $user_data->lname;
                ?></h1>
        </div-->
      <nav>
        <ul>
          <li><a href="../harsh1/index1.php" style=" margin-bottom: -5px; padding: 0px 10px;"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
              </svg></a></li>
          <li><a href="chat.php" rel="noopener noreferrer" class="active">Chat<span class="badge <?php
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
      <?php

      $user_id = mysqli_real_escape_string($conn, $_GET['id']);
      $sql = mysqli_query($conn, "SELECT * FROM per_details WHERE id = {$user_id}");

      $sql1 = mysqli_query($conn, "SELECT * FROM per_details WHERE id = {$_SESSION['unique_id']}");
      $row1 = mysqli_fetch_assoc($sql1);
      if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
      } else {
        header("location: index.php");
      }

      ?>
      <div class="all_users">
        <div class="usersWrapper">
          <div class="space">
            <div id="receiver">
              <div class="top">
                <div class="to-whom">
                  <a class="backtolist" href="chat.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg></a><img src="../images/profile.jpeg" style="width: 50px;padding:10px; height: 50px; border-radius: 50%;" alt="" id="dp">
                  <div class="details"><span style="font-size: 25px;font-weight: bolder;"><?php echo $row['fname'] . " " . $row['lname']; ?></span>
                    <p style="font-weight: lighter;color: gray;margin:-5px;"><?php echo $row['isActive']; ?></p>
                  </div>
                </div>
              </div>
              <div class="bodypart">
                <div class="chat-area">
                  <!--div class="incoming">
                          <div class="details">
                            <p>Hello</p><time>12 sept 2021 12:06 PM</time>
                          </div>
                        </div>
                        <div class="outgoing">
                          <div class="details">
                            <p>Shree Ganesh..!</p><time>12 sept 2021 12:08 PM</time>
                          </div>
                        </div-->



                </div>
              </div>
            </div>
          </div>
          <?php

          $sql2 = "SELECT * FROM friends WHERE (user_one = {$_SESSION['unique_id']} AND  user_two = {$user_id}) OR (user_one = {$user_id} AND user_two = {$_SESSION['unique_id']})";

          $query2 = mysqli_query($conn, $sql2);
          $row2 = mysqli_fetch_assoc($query2);
          if ($row2 > 0 or $user_id == 11111) {
            $stid = 'areFRND';
            $newFrdid = 'msg_hide';
          } else {
            $stid = 'notFRND';
            $newFrdid = 'msg_show';
          }

          ?>
          <form action="#" method="post" class="typing-area">
            <div class="footer" id="textbox">
              <p id="<?php echo $newFrdid; ?>">You need to add '<?php echo $row['fname'] . " " . $row['lname']; ?>' as friend to start message!</p>
              <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
              <input type="text" class="outgoing_id" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
              <input type="text" name="message" id="<?php echo $stid; ?>" class="msg" placeholder="Type here to send message..." required autocomplete="off">
              <button class="send" id="<?php echo $stid; ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="31.5" height="27" viewBox="0 0 31.5 27">
                  <path id="Icon_material-send" data-name="Icon material-send" d="M3.015,31.5,34.5,18,3.015,4.5,3,15l22.5,3L3,21Z" transform="translate(-3 -4.5)" />
                </svg>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      const form = document.querySelector(".typing-area"),
        incoming_id = form.querySelector(".incoming_id").value,
        inputField = form.querySelector(".msg"),
        sendBtn = form.querySelector("button"),
        chatBox = document.querySelector(".chat-area");

      form.onsubmit = (e) => {
        e.preventDefault();
      }

      inputField.focus();
      inputField.onkeyup = () => {
        if (inputField.value != "") {
          sendBtn.classList.add("act1ive");
        } else {
          sendBtn.classList.remove("act1ive");
        }
      }

      sendBtn.onclick = () => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/insert-chat.php", true);
        xhr.onload = () => {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              inputField.value = "";
              scrollToBottom();
            }
          }
        }
        let formData = new FormData(form);
        xhr.send(formData);
      }
      chatBox.onmouseenter = () => {
        chatBox.classList.add("act1ive");
      }

      chatBox.onmouseleave = () => {
        chatBox.classList.remove("act1ive");
      }


      setInterval(() => {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/get-chat.php", true);
        xhr.onload = () => {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              let data = xhr.response;
              chatBox.innerHTML = data;
              if (!chatBox.classList.contains("act1ive")) {
                scrollToBottom();
              }
            }
          }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("incoming_id=" + incoming_id);
      }, 500);

      function scrollToBottom() {
        chatBox.scrollTop = chatBox.scrollHeight;
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