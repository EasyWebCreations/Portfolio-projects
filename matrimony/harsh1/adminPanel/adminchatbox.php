<?php
include_once('../../backend/connect.php');
// $sql = "SELECT COUNT('id') AS count FROM TABLE";
// $query = mysqli_query($conn, $sql);
// echo var_dump($query);
$result = mysqli_query($conn, "SELECT COUNT('id') AS count FROM per_details WHERE id <> '00000'");
$row = mysqli_fetch_assoc($result);
$totalCount = $row['count'];
$result = mysqli_query($conn, "SELECT COUNT('id') AS count FROM per_details WHERE id <> '00000' GROUP BY gender HAVING gender='Male'");
$row = mysqli_fetch_assoc($result);
$maleCount = $row['count'];
$result = mysqli_query($conn, "SELECT COUNT('id') AS count FROM per_details WHERE id <> '00000' GROUP BY gender HAVING gender='Female'");
$row = mysqli_fetch_assoc($result);
$femaleCount = $row['count'];
$result = mysqli_query($conn, "SELECT COUNT('reported_by') AS count FROM report");
$row = mysqli_fetch_assoc($result);
$reportCount = $row['count'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Chat Panel</title>
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

    /* * {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    *::-webkit-scrollbar {
      display: none;
    } */

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
  <link rel="stylesheet" href="navBar.css">
  <link rel="stylesheet" href="sideBar.css">
  <link rel="stylesheet" href="belowNav.css">
  <link rel="stylesheet" href="contentOut.css">
  <link rel="stylesheet" href="bottom.css">

  <!-- <link rel="stylesheet" href="regForm.css"> -->
  <!-- <link rel="stylesheet" href="ourStories.css"> -->
  <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


  <!-- User Management Table Start -->



  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
  <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
  <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>

  <link rel="stylesheet" href="userManagement.css">
  <link rel="stylesheet" href="regForm.css">
  <link rel="stylesheet" href="ourStories.css">


  <script>
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>


  <!-- User Management Table End -->


  <style>
    button:focus {
      outline: none;
      box-shadow: none;
    }

    a:hover {
      text-decoration: none;
      color: black;
    }

    a:active {
      text-decoration: none;
      color: black;
      filter: blur(0.1vw);
    }
  </style>
</head>

<body>
  <header class="navBar">
    <div class="navImgOut">
      <img src="../AkshadaLogo.png" class="navImg">
    </div>
    <div class="navBtnCont">
      <div id="google_translate_element"></div>
      <button class="navBtn">Home</button>
      <button class="navBtn">About Us</button>
      <button class="navBtn">Events</button>
      <button class="navBtn">Contact Us</button>
      <!-- <button class="navBtn">Youth</button> -->
      <button class="hamburgerBtn" onclick="hamburgerOpen()">
        <div class="hamburgerLine hamburgerLine1"></div>
        <div class="hamburgerLine hamburgerLine2"></div>
        <div class="hamburgerLine hamburgerLine3"></div>
      </button>
    </div>
  </header>




  <div class="sideBar">
    <div class="sideBarTopOut">
      <div class="sideBarTopImg">
        <img src="../user3.png" class="sideBarTopImgContent" id="sideBarTopImgWide">
        <div class="sideBarTopImgEditOut">
          <input type="file" accept="image/*" class="sideBarTopImgEdit" id="sideBarTopImgEditWide" title="Edit Image" onchange="gImage()" onclick="clickDetect()">
          <img src="../camera.svg" class="sideBarTopImgEdit1">
        </div>
      </div>
      <div class="sideBarTopTextout">
        <div class="sideBarTopText sideBarTopText1">Welcome Back Admin</div>
        <div class="sideBarTopText sideBarTopText2">Logged As Administrator</div>
      </div>
    </div>
    <!-- <div class="sideBarContent">
      <div class="sideBarTextOut">
        <img src="../basic.svg">
        <a href="#" onclick="adminPanelPartLoad('ADMIN_GRAPHS')">Dashboard</a>
      </div>
      <div class="sideBarTextOut">
        <img src="../oneGear.svg">
        <a href="#">Settings</a>
      </div>
      <div class="sideBarTextOut">
        <img src="../user.svg">
        <a href="#" onclick="adminPanelPartLoad('ADMIN_USERS')">Users</a>
      </div>
      <div class="sideBarTextOut">
        <img src="../blocked.svg">
        <a href="#" onclick="adminPanelPartLoad('ADMIN_BLOCKED_USERS')">Blocked Users</a>
      </div>
      <-- <div class="sideBarTextOut">
        <img src="../message.svg">
        <a href="#">Chat</a>
      </div> -->
    <!-- <div class="sideBarTextOut">
        <img src="../events.svg">
        <a href="#" onclick="adminPanelPartLoad('ADMIN_EVENTS')">Events</a>
      </div>
      <div class="sideBarTextOut">
        <img src="../star.svg">
        <a href="#" onclick="adminPanelPartLoad('ADMIN_OUR_STORIES')">Our Stories</a>
      </div> -->
    <!-- <div class="sideBarTextOut">
        <img src="../message.svg">
        <a href="#">Chats</a>
      </div>
    </div> -->
  </div>

  <div class="belowNav">
    <div class="belowNavUpper">
      <a href="#" class="addUser" onclick="adminPanelPartLoad('ADMIN_REGISTER')">
        <img src="../findMatch.svg">
        <div>Add User</div>
      </a>
      <a href="#" class="belowNavImg" onclick="adminPanelPartLoad('ADMIN_USER_REQ_APPRO')"></a>
    </div>
    <div class="belowNavLower">
      <div class="liveInfo liveInfo1">
        <div class="liveInfoImgOut liveInfoImgOut1">
          <img src="../user.svg">
        </div>
        <div class="liveInfoTextOut">
          <p class="liveInfoText">Online Now</p>
          <p class="liveInfoText">00</p>
        </div>
      </div>
      <div class="liveInfo liveInfo2">
        <div class="liveInfoImgOut liveInfoImgOut2">
          <img src="../maleFemale.svg">
        </div>
        <div class="liveInfoTextOut">
          <p class="liveInfoText">Male</p>
          <p class="liveInfoText"><?php echo $maleCount; ?></p>
        </div>
        <div class="liveInfoTextOut">
          <p class="liveInfoText">Female</p>
          <p class="liveInfoText"><?php echo $femaleCount; ?></p>
        </div>
      </div>
      <div class="liveInfo liveInfo3">
        <div class="liveInfoImgOut liveInfoImgOut3">
          <img src="../aboutUs.svg">
        </div>
        <div class="liveInfoTextOut">
          <p class="liveInfoText">Total Users</p>
          <p class="liveInfoText"><?php echo $totalCount; ?></p>
        </div>
      </div>
      <a href="#" class="liveInfo liveInfo4" onclick="adminPanelPartLoad('ADMIN_REPORT')">
        <div class="liveInfoImgOut liveInfoImgOut4">
          <img src="../blocked.svg">
        </div>
        <div class="liveInfoTextOut">
          <p class="liveInfoText">Reports</p>
          <p class="liveInfoText"><?php echo $reportCount; ?></p>
        </div>
      </a>
    </div>
  </div>

  <div class="contentOut" id="contentOut">

    <!-- <div id="chart-container">Chart will render here!</div> -->


    <?php

    $user_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = mysqli_query($conn, "SELECT * FROM per_details WHERE id = {$user_id}");

    $sql1 = mysqli_query($conn, "SELECT * FROM per_details WHERE id = 0");
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
                <a class="backtolist" href="adminPanel.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                  </svg></a><img src="<?php echo $row['profile_img']; ?>" style="width: 50px;padding:10px; height: 50px; border-radius: 50%;" alt="" id="dp">
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

        // $sql2 = "SELECT * FROM friends WHERE (user_one = {$_SESSION['unique_id']} AND  user_two = {$user_id}) OR (user_one = {$user_id} AND user_two = {$_SESSION['unique_id']})";

        // $query2 = mysqli_query($conn, $sql2);
        // $row2 = mysqli_fetch_assoc($query2);
        // if ($row2 > 0 OR $user_id == 0) {
        //   $stid = 'areFRND';
        //   $newFrdid = 'msg_hide';
        // } else {
        //   $stid = 'notFRND';
        //   $newFrdid = 'msg_show';
        // }

        ?>
        <form action="#" method="post" class="typing-area">
          <div class="footer" id="textbox">
            <!-- <p id="<?php //echo $newFrdid; 
                        ?>">You need to add '<?php //echo $row['fname'] . " " . $row['lname']; 
                                                                      ?>' as friend to start message!</p> -->
            <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
            <input type="text" class="outgoing_id" name="outgoing_id" value="<?php echo 0; ?>" hidden>
            <input type="text" name="message" class="msg" placeholder="Type here to send message..." required autocomplete="off">
            <button class="send"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="31.5" height="27" viewBox="0 0 31.5 27">
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
      xhr.open("POST", "adminchat/insert-chat.php", true);
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
      xhr.open("POST", "adminchat/get-chat.php", true);
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



  <footer class="bottom">
    <p class="copyright">Copyright &#169; 2021 Social. All Rights Reserved</p>
    <div class="bottomOptionsOut">
      <a href="#" class="bottomOptions bottomOptions1">About Us</a>
      <a href="#" class="bottomOptions bottomOptions2">Terms</a>
      <a href="#" class="bottomOptions bottomOptions3">Privacy policy</a>
      <a href="#" class="bottomOptions bottomOptions4">Contact</a>
      <a href="#" class="bottomOptions bottomOptions5">Language</a>
    </div>
  </footer>

  <script>
    function exportIdforPdf() {


      var checkedValue = document.querySelector('.form-check-input:checked').value;
      //alert(checkedValue);
      var markedCheckbox = document.querySelectorAll('input[type="checkbox"]:checked');
      let checkedValues = '';
      for (var checkbox of markedCheckbox) {
        checkedValues += checkbox.value + ' ';
      }

      console.log(checkedValues);
      var arr = checkedValues.split(' ', 5);
      //   //alert(arr);

      for (let i = 0; i < arr.length - 1; i++) {

        var userPdf = document.getElementById('userPdf');
        var createDiv = document.createElement('div' + arr[i] + '');
        createDiv.innerHTML = '<a href="pdf.php?id=' + arr[i] + '" target="_blank" id="pdfURL' + arr[i] + '"> </a>';
        userPdf.appendChild(createDiv);
        document.getElementById('pdfURL' + arr[i]).click();
        console.log(createDiv);

      }

    }
  </script>


  <!-- <script>
    var contentOut = document.getElementById('contentOut');
    var adminPanelPart = sessionStorage.getItem('adminPanelPart');

    function adminPanelPartLoad(adminPanelPart) {
      sessionStorage.setItem('adminPanelPart', adminPanelPart);
      contentOut.innerHTML = '';
      $(document).ready(function() {
        switch (adminPanelPart) {
          case 'ADMIN_GRAPHS':
            // contentOut.innerHTML = '<div id="chart-container">Chart will render here!</div>';
            // var chartContainer = document.createElement('div');
            // chartContainer.className += 'chart-container';
            // contentOut.appendChild(chartContainer);
            // setTimeout(() => {
            $.ajax({
              url: "PHPfusioncharts/index.php",
              type: "POST",
              dataType: "text",
              data: {
                data: '',
              },
              success: function(response) {
                // contentOut.innerHTML = "<script>eval(" + response + ")<//script>";
                // // eval(response);
                $("#contentOut").html(response);
                $("#contentOut").find("script").each(function() {
                  eval($(this).text());
                });
                // console.log(response);
              }
            });
            // }, 1000);
            break;

          case 'ADMIN_USERS':
            // $(document).ready(function() {

            load_data(1);

            function load_data(page, query = '') {
              $.ajax({
                url: "adminUsers.php",
                method: "POST",
                data: {
                  page: page,
                  query: query
                },
                success: function(data) {
                  $('#contentOut').html(data);
                }
              });
            }

            $(document).on('click', '.page-link', function() {
              var page = $(this).data('page_number');
              var query = '';
              // var query = $('#search_box').val();
              load_data(page, query);
            });

            // $('#search_box').keyup(function() {
            // var query = $('#search_box').val();
            // load_data(1, query);
            // });

            // });
            // $.ajax({
            // url: "adminUsers.php",
            // type: "POST",
            // dataType: "text",
            // data: {
            // data: '',
            // },
            // success: function(response) {
            // contentOut.innerHTML = response;
            // }
            // });
            break;

          case 'ADMIN_BLOCKED_USERS':
            $.ajax({
              url: "adminBlockedUsers.php",
              type: "POST",
              dataType: "text",
              data: {
                data: '',
              },
              success: function(response) {
                contentOut.innerHTML = response;
                // console.log(response);
              }
            });
            break;

          case 'ADMIN_EVENTS':
            $.ajax({
              url: "adminEvents.php",
              type: "POST",
              dataType: "text",
              data: {
                data: '',
              },
              success: function(response) {
                contentOut.innerHTML = response;
                // console.log(response);
              }
            });
            break;

          case 'ADMIN_OUR_STORIES':
            $.ajax({
              url: "adminOurStories.php",
              type: "POST",
              dataType: "text",
              data: {
                data: '',
              },
              success: function(response) {
                contentOut.innerHTML = response;
                // console.log(response);
              }
            });
            break;

          case 'ADMIN_REGISTER':
            $.ajax({
              url: "adminRegister.php",
              type: "POST",
              dataType: "text",
              data: {
                data: '',
              },
              success: function(response) {
                contentOut.innerHTML = response;
                // console.log(response);
              }
            });
            break;

          case 'ADMIN_USER_REQ_APPRO':
            $.ajax({
              url: "adminUserReqAppro.php",
              type: "POST",
              dataType: "text",
              data: {
                data: '',
              },
              success: function(response) {
                contentOut.innerHTML = response;
                // console.log(response);
              }
            });
            break;

          case 'ADMIN_REPORT':
            $.ajax({
              url: "adminReport.php",
              type: "POST",
              dataType: "text",
              data: {
                data: '',
              },
              success: function(response) {
                contentOut.innerHTML = response;
                // console.log(response);
              }
            });
            break;
        }
      });


    }











    function adminUserRegForm() {
      let fname = $("#fname").val();
      let mname = $("#mname").val();
      let lname = $("#lname").val();
      let call = $("#call").val();
      let mobileno = $("#phone").val();
      let email = $("#email").val();
      let gender = $("#gender").val();
      let marital = $("#marital").val();
      // console.log("Form Submit Called2");
      // console.log(fname + ' ' + mname + ' ' + lname + ' ' + call + ' ' + mobileno + ' ' + email + ' ' + gender + ' ' + marital);

      $.ajax({
        type: 'post',
        url: 'adminRegFormQ.php',
        // url: 'fetch.php',
        data: {
          fname: fname,
          mname: mname,
          lname: lname,
          call: call,
          mobileno: mobileno,
          email: email,
          gender: gender,
          marital: marital
        },
        success: function(response) {
          alert(response);
        }
      });
    }













    window.onload = () => {
      if (adminPanelPart === null || adminPanelPart === '') {
        adminPanelPart = 'ADMIN_GRAPHS';
      }
      adminPanelPartLoad(adminPanelPart);
      new google.translate.TranslateElement({
        pageLanguage: 'en',
        layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,
        includedLanguages: "en,hi,mr,te,kn"
      }, 'google_translate_element');
    }
    // function googleTranslateElementInit() {
    // new google.translate.TranslateElement({ pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL, includedLanguages: "en,mr,hi,te" }, 'google_translate_element');
    // }
  </script> -->
</body>

</html>