<?php
include_once('../../backend/connect.php');
// $sql = "SELECT COUNT('id') AS count FROM TABLE";
// $query = mysqli_query($conn, $sql);
// echo var_dump($query);
$onlineCount = 0;
$result = mysqli_query($conn, "SELECT COUNT('id') AS count FROM per_details WHERE id <> '11111' GROUP BY logged_in HAVING logged_in='1'");
$row = mysqli_fetch_assoc($result);
if ($row) {
  $onlineCount = $row['count'];
} else {
  $onlineCount = 0;
}
$result = mysqli_query($conn, "SELECT COUNT('id') AS count FROM per_details WHERE id <> '11111'");
$row = mysqli_fetch_assoc($result);
$totalCount = $row['count'];
$result = mysqli_query($conn, "SELECT COUNT('id') AS count FROM per_details WHERE id <> '11111' GROUP BY gender HAVING gender='Male'");
$row = mysqli_fetch_assoc($result);
$maleCount = $row['count'];
$result = mysqli_query($conn, "SELECT COUNT('id') AS count FROM per_details WHERE id <> '11111' GROUP BY gender HAVING gender='Female'");
$row = mysqli_fetch_assoc($result);
$femaleCount = $row['count'];
$result = mysqli_query($conn, "SELECT COUNT('reported_by') AS count FROM report  WHERE report_decision <> 'Approved'");
$row = mysqli_fetch_assoc($result);
$reportCount = $row['count'];

$reqApproQuery = mysqli_query($conn, "SELECT count('id') As count FROM per_details WHERE approval_status = 'pending'");
$req = mysqli_fetch_assoc($reqApproQuery);
$reqApproCount = $req['count'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
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
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
  <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
  <div id="visitGraphScript"></div>
  <div id="registerGraphScript"></div>
  <div id="maleFemaleGraphScript"></div>
  <div id="chatGraphScript"></div>
  <header class="navBar">
    <div class="navImgOut">
      <img src="../AkshadaLogo.png" class="navImg">
    </div>
    <div class="navBtnCont">
      <div id="google_translate_element"></div>
      <button class="navBtn" onclick="window.open('../../index.php', target='_top')">Home</button>
      <button class="navBtn" onclick="window.open('../../index.php#about', target='_top')">About Us</button>
      <button class="navBtn" onclick="window.open('../../index.php#eventsSection', target='_top')">Events</button>
      <button class="navBtn" onclick="window.open('../../index.php#contactusportion', target='_top')">Contact Us</button>
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
    <div class="sideBarContent">
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
      <!-- <div class="sideBarTextOut">
        <img src="../message.svg">
        <a href="#">Chat</a>
      </div> -->
      <div class="sideBarTextOut">
        <img src="../events.svg">
        <a href="#" onclick="adminPanelPartLoad('ADMIN_EVENTS')">Events</a>
      </div>
      <div class="sideBarTextOut">
        <img src="../star.svg">
        <a href="#" onclick="adminPanelPartLoad('ADMIN_OUR_STORIES')">Our Stories</a>
      </div>
      <div class="sideBarTextOut">
        <img src="../question.svg">
        <a href="#" onclick="adminPanelPartLoad('ADMIN_ENQUIRY')">Enquiries</a>
      </div>
      <!-- <div class="sideBarTextOut">
        <img src="../message.svg">
        <a href="#">Chats</a>
      </div> -->
    </div>
  </div>

  <div class="belowNav">
    <div class="belowNavUpper">
    <form class="row g-3" method="post" action="paymentMethod.php" style="margin-right:10px">
  <div class="col-auto">
    <label for="staticEmail2" class="visually-hidden">Payment method</label>
    <select name="paymentmethod" class="form-control-plaintext" id="staticEmail2">
      <option value="Paytm">Paytm</option>
      <option value="payU">payU</option>
      <option value="txn">Txn Id</option>
    </select>
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Save</button>
  </div>
</form>
      <a href="#" class="addUser" onclick="adminPanelPartLoad('ADMIN_REGISTER')">
        <img src="../findMatch.svg">
        <div>Add User</div>
      </a>
      <a href="#" class="belowNavImg" onclick="adminPanelPartLoad('ADMIN_USER_REQ_APPRO')"><span><?php echo $reqApproCount; ?></span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black" class="bi bi-bell-fill" viewBox="0 0 16 16">
          <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
        </svg></a>
    </div>
    <div class="belowNavLower">
      <div class="liveInfo liveInfo1">
        <div class="liveInfoImgOut liveInfoImgOut1">
          <img src="../user.svg">
        </div>
        <div class="liveInfoTextOut">
          <p class="liveInfoText">Online Now</p>
          <p class="liveInfoText"><?php echo $onlineCount; ?></p>
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

    <!-- <div class="graphContainer visitGraph" id="visitGraph"></div>
    <div class="graphContainer" id="registerGraph"></div>
    <div class="graphContainer"></div>
    <div class="graphContainer"></div> -->


  </div>

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


  <script>
    var contentOut = document.getElementById('contentOut');
    // var visitGraph = document.getElementById('visitGraph');
    // var registerGraph = document.getElementById('registerGraph');

    var adminPanelPart = sessionStorage.getItem('adminPanelPart');

    function adminPanelPartLoad(adminPanelPart) {
      sessionStorage.setItem('adminPanelPart', adminPanelPart);
      contentOut.innerHTML = '';
      $(document).ready(function() {
        switch (adminPanelPart) {
          case 'ADMIN_GRAPHS':
            var visitGraph = document.createElement('div');
            visitGraph.setAttribute("id", "visitGraph");
            contentOut.appendChild(visitGraph);
            var visitGraphCanvas = document.createElement('canvas');
            visitGraphCanvas.setAttribute("id", "visitGraphCanvas");
            visitGraph.appendChild(visitGraphCanvas);

            var maleFemaleGraph = document.createElement('div');
            maleFemaleGraph.setAttribute("id", "maleFemaleGraph");
            contentOut.appendChild(maleFemaleGraph);
            var maleFemaleGraphCanvas = document.createElement('canvas');
            maleFemaleGraphCanvas.setAttribute("id", "maleFemaleGraphCanvas");
            maleFemaleGraph.appendChild(maleFemaleGraphCanvas);

            var registerGraph = document.createElement('div');
            registerGraph.setAttribute("id", "registerGraph");
            contentOut.appendChild(registerGraph);
            var registerGraphCanvas = document.createElement('canvas');
            registerGraphCanvas.setAttribute("id", "registerGraphCanvas");
            registerGraph.appendChild(registerGraphCanvas);

            var chatGraph = document.createElement('div');
            chatGraph.setAttribute("id", "chatGraph");
            contentOut.appendChild(chatGraph);
            var chatGraphCanvas = document.createElement('canvas');
            chatGraphCanvas.setAttribute("id", "chatGraphCanvas");
            chatGraph.appendChild(chatGraphCanvas);

            visitGraph.style.marginTop = "0.5vw";
            registerGraph.style.marginTop = "0.5vw";
            maleFemaleGraph.style.marginTop = "0.5vw";
            chatGraph.style.marginTop = "0.5vw";
            // contentOut.appendChild(document.createElement('div').setAttribute("id", "registerGraph"));

            // $.ajax({
            //   url: "PHPfusioncharts/visitGraph.php",
            //   type: "POST",
            //   dataType: "text",
            //   data: {
            //     data: '',
            //   },
            //   success: function(response) {
            //     $("#visitGraph").html(response);
            //     $("#visitGraph").find("script").each(function() {
            //       eval($(this).text());
            //     });
            //     // console.log(response)
            //     $.ajax({
            //       url: "PHPfusioncharts/chatGraph.php",
            //       type: "POST",
            //       dataType: "text",
            //       data: {
            //         data: '',
            //       },
            //       success: function(response) {
            //         $("#chatGraph").html(response);
            //         $("#chatGraph").find("script").each(function() {
            //           eval($(this).text());
            //         });
            //         // console.log(response);
            //         $.ajax({
            //           url: "PHPfusioncharts/registerGraph.php",
            //           type: "POST",
            //           dataType: "text",
            //           data: {
            //             data: '',
            //           },
            //           success: function(response) {
            //             $("#registerGraph").html(response);
            //             $("#registerGraph").find("script").each(function() {
            //               eval($(this).text());
            //             });
            //             // console.log(response);
            //             $.ajax({
            //               url: "PHPfusioncharts/maleFemaleGraph.php",
            //               type: "POST",
            //               dataType: "text",
            //               data: {
            //                 data: '',
            //               },
            //               success: function(response) {
            //                 $("#maleFemaleGraph").html(response);
            //                 $("#maleFemaleGraph").find("script").each(function() {
            //                   eval($(this).text());
            //                 });
            //                 // console.log(response);
            //               }
            //             });
            //           }
            //         });
            //       }
            //     });
            //   }
            // });

            $.ajax({
              url: "PHPfusioncharts/visitGraph.php",
              type: "POST",
              dataType: "text",
              data: {
                data: '',
              },
              success: function(response) {
                $("#visitGraphScript").html(response);
                $("#visitGraphScript").find("script").each(function() {
                  eval($(this).text());
                });
                var visitGraphChart = new Chart(
                  document.getElementById('visitGraphCanvas'),
                  visitGraphConfig
                );

                $.ajax({
                  url: "PHPfusioncharts/maleFemaleGraph.php",
                  type: "POST",
                  dataType: "text",
                  data: {
                    data: '',
                  },
                  success: function(response) {
                    $("#maleFemaleGraphScript").html(response);
                    $("#maleFemaleGraphScript").find("script").each(function() {
                      eval($(this).text());
                    });
                    var maleFemaleGraphChart = new Chart(
                      document.getElementById('maleFemaleGraphCanvas'),
                      maleFemaleGraphConfig
                    );

                    $.ajax({
                      url: "PHPfusioncharts/registerGraph.php",
                      type: "POST",
                      dataType: "text",
                      data: {
                        data: '',
                      },
                      success: function(response) {
                        $("#registerGraphScript").html(response);
                        $("#registerGraphScript").find("script").each(function() {
                          eval($(this).text());
                        });
                        var registerGraphChart = new Chart(
                          document.getElementById('registerGraphCanvas'),
                          registerGraphConfig
                        );

                        $.ajax({
                          url: "PHPfusioncharts/chatGraph.php",
                          type: "POST",
                          dataType: "text",
                          data: {
                            data: '',
                          },
                          success: function(response) {
                            $("#chatGraphScript").html(response);
                            $("#chatGraphScript").find("script").each(function() {
                              eval($(this).text());
                            });
                            // console.log(response);
                            var chatGraphChart = new Chart(
                              document.getElementById('chatGraphCanvas'),
                              chatGraphConfig
                            );

                          }
                        });
                      }
                    });
                  }
                });
              }
            });

            // $.ajax({
            //   url: "PHPfusioncharts/visitGraph.php",
            //   type: "POST",
            //   dataType: "text",
            //   data: {
            //     data: '',
            //   },
            //   success: function(response) {
            //     $("#visitGraph").html(response);
            //     $("#visitGraph").find("script").each(function() {
            //       eval($(this).text());
            //     });
            //     $.ajax({
            //       url: "PHPfusioncharts/registerGraph.php",
            //       type: "POST",
            //       dataType: "text",
            //       data: {
            //         data: '',
            //       },
            //       success: function(response) {
            //         $("#registerGraph").html(response);
            //         $("#registerGraph").find("script").each(function() {
            //           eval($(this).text());
            //         });
            //         // console.log(response);

            //         $.ajax({
            //           url: "PHPfusioncharts/maleFemaleGraph.php",
            //           type: "POST",
            //           dataType: "text",
            //           data: {
            //             data: '',
            //           },
            //           success: function(response) {
            //             $("#maleFemaleGraph").html(response);
            //             $("#maleFemaleGraph").find("script").each(function() {
            //               eval($(this).text());
            //             });
            //             // console.log(response);
            //             $.ajax({
            //               url: "PHPfusioncharts/chatGraph.php",
            //               type: "POST",
            //               dataType: "text",
            //               data: {
            //                 data: '',
            //               },
            //               success: function(response) {
            //                 $("#chatGraph").html(response);
            //                 $("#chatGraph").find("script").each(function() {
            //                   eval($(this).text());
            //                 });
            //                 // console.log(response);

            //               }
            //             });
            //           }
            //         });
            //       }
            //     });
            //   }
            // });
            break;

          case 'ADMIN_USERS':
            // $(document).ready(function() {
            $searchVal = '';
            var query = '';

            load_data_adminUsers(1);

            function load_data_adminUsers(page, query = '') {
              // $('#search_box').val() = $searchVal;
              $.ajax({
                url: "adminUsers.php",
                method: "POST",
                data: {
                  page: page,
                  query: query
                },
                success: function(data) {
                  $('#contentOut').html(data);
                  $('#search_box').val($searchVal);
                  // document.getElementById("search_box").value = $searchVal;
                }
              });
            }

            // $(document).ready(function() {

            $(document).on('click', '.page-link-adminUsers', function() {
              var page = $(this).data('page_number');
              // var query = '';
              query = $('#search_box').val();
              // $searchVal = $('#search_box').val();
              load_data_adminUsers(page, query);
            });

            // $('#searchBtn').click(function() {
            //   alert("Search1");
            //   var query = $('#search_box').val();
            //   load_data_adminUsers(1, query);
            // });

            $(document).on('click', '#searchBtn', function(e) {
              e.preventDefault;
              query = $('#search_box').val();
              $searchVal = query;
              load_data_adminUsers(1, query);
            });

            // function searchBtn() {
            //   alert("Search");
            //   var query = $('#search_box').val();
            //   load_data_adminUsers(1, query);
            // }
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
            load_data_adminBlockedUsers(1);

            function load_data_adminBlockedUsers(page, query = '') {
              $.ajax({
                url: "adminBlockedUsers.php",
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

            $(document).on('click', '.page-link-adminBlockedUsers', function() {
              var page = $(this).data('page_number');
              var query = '';
              // var query = $('#search_box').val();
              load_data_adminBlockedUsers(page, query);
            });
            // $.ajax({
            //   url: "adminBlockedUsers.php",
            //   type: "POST",
            //   dataType: "text",
            //   data: {
            //     data: '',
            //   },
            //   success: function(response) {
            //     contentOut.innerHTML = response;
            //     // console.log(response);
            //   }
            // });
            break;

          case 'ADMIN_EVENTS':
            load_data_adminEvents(1);

            function load_data_adminEvents(page, query = '') {
              $.ajax({
                url: "adminEvents.php",
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

            $(document).on('click', '.page-link-adminEvents', function() {
              var page = $(this).data('page_number');
              var query = '';
              // var query = $('#search_box').val();
              load_data_adminEvents(page, query);
            });
            // $.ajax({
            //   url: "adminEvents.php",
            //   type: "POST",
            //   dataType: "text",
            //   data: {
            //     data: '',
            //   },
            //   success: function(response) {
            //     contentOut.innerHTML = response;
            //     // console.log(response);
            //   }
            // });
            break;

          case 'ADMIN_OUR_STORIES':
            load_data_adminOurStories(1);

            function load_data_adminOurStories(page, query = '') {
              $.ajax({
                url: "adminOurStories.php",
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

            $(document).on('click', '.page-link-adminOurStories', function() {
              var page = $(this).data('page_number');
              var query = '';
              // var query = $('#search_box').val();
              load_data_adminOurStories(page, query);
            });
            // $.ajax({
            //   url: "adminOurStories.php",
            //   type: "POST",
            //   dataType: "text",
            //   data: {
            //     data: '',
            //   },
            //   success: function(response) {
            //     contentOut.innerHTML = response;
            //     // console.log(response);
            //   }
            // });
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
            load_data(1);

            function load_data(page, query = '') {
              $.ajax({
                url: "adminUserReqAppro.php",
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
            break;

          case 'ADMIN_REPORT':
            load_data_adminReport(1);

            function load_data_adminReport(page, query = '') {
              $.ajax({
                url: "adminReport.php",
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

            $(document).on('click', '.page-link-adminReport', function() {
              var page = $(this).data('page_number');
              var query = '';
              // var query = $('#search_box').val();
              load_data_adminReport(page, query);
            });
            // $.ajax({
            //   url: "adminReport.php",
            //   type: "POST",
            //   dataType: "text",
            //   data: {
            //     data: '',
            //   },
            //   success: function(response) {
            //     contentOut.innerHTML = response;
            //     // console.log(response);
            //   }
            // });
            break;

          case 'ADMIN_ENQUIRY':
            load_data_adminEnquiry(1);

            function load_data_adminEnquiry(page, query = '') {
              $.ajax({
                url: "adminEnquiry.php",
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

            $(document).on('click', '.page-link-adminEnquiry', function() {
              var page = $(this).data('page_number');
              var query = '';
              // var query = $('#search_box').val();
              load_data_adminEnquiry(page, query);
            });
            break;
        }
      });


    }





    function blockUser(e) {
      $(document).ready(function() {
        var confirmBlockTo = e.value;
        $.ajax({
          url: "adminHelper/confirmBlockUser.php",
          type: "POST",
          dataType: "text",
          data: {
            confirmBlockTo: confirmBlockTo
          },
          success: function(response) {
            alert(response);
            adminPanelPartLoad('ADMIN_REPORT');
          }
        });
      });
    }

    function unblockUser(e) {
      $(document).ready(function() {
        var confirmBlockTo = e.value;
        $.ajax({
          url: "adminHelper/adminUnblockUser.php",
          type: "POST",
          dataType: "text",
          data: {
            confirmBlockTo: confirmBlockTo
          },
          success: function(response) {
            alert(response);
            adminPanelPartLoad('ADMIN_BLOCKED_USERS');
          }
        });
      });
    }





    function adminUserRegForm() {
      $(document).ready(function() {
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
            adminPanelPartLoad('ADMIN_REGISTER');
          }
        });
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
  </script>
  <script src="adminHelper/adminUserDelete.js"></script>
  <script src="adminHelper/adminEvents.js"></script>
  <script src="adminHelper/adminStory.js"></script>
  <script src="adminHelper/adminEnquiry.js"></script>
</body>

</html>