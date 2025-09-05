<?php
session_start();
if (!isset($_SESSION['adminEmail'])) {
  header("location: adminLogin.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Akshadaa Events</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="userManagement.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <style>
    .contentOut {
      /* border: 1px solid red; */
      /* border-top: 0.1vw solid rgba(0, 0, 0, 0.1); */
      /* width: 78vw; */
      /* position: fixed; */
      display: flex;
      flex-direction: row;
      justify-content: space-evenly;
      align-items: flex-start;
      flex-wrap: wrap;
      margin-top: 6vw;
      /* top: 17vw; */
      /* right: 1vw; */
      /* max-height: calc(100vh - 19.5vw); */
      /* overflow-y: scroll; */
    }

    @media screen and (min-width: 721px) {
      .navImgOut {
        height: 80%;
        border-radius: 1vw;
        margin-left: 1vw;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: 0.2s;
      }

      .navImgOut:hover {
        opacity: 0.85;
      }

      .navImgOut:active {
        filter: blur(0.1vw);
      }

      .navImg {
        height: 100%;
      }
    }

    @media screen and (max-width: 720px) {
      .navImgOut {
        height: 80%;
        border-radius: 3vw;
        margin-left: 2vw;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
      }

      .navImg {
        height: 100%;
      }
    }
  </style>
  <link rel="stylesheet" href="adminPrice.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" style="background: #7D3668;">

    <div class="navImgOut" onclick="window.open('../../index.php', target='_top')">
      <img src="../../assets/images/logo.png" class="navImg">
    </div>
    <div class="d-flex align-items-center justify-content-between">
      <!-- <a href="index.php" class="logo d-flex align-items-center navImgOut"> -->
      <!-- <img src="../../images/AkshadaLogo.png" alt="" style="margin-right: 0vw; width: 200px; height: 100px;"> -->
      <!-- <img src="../../images/AkshadaLogo.png" class="navImg"> -->
      <!-- </a> -->
      <i class="bi bi-list toggle-sidebar-btn" style="color: white;"></i>
    </div><!-- End Logo -->


    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li> -->
        <!-- End Search Icon-->

        <li class="nav-item dropdown">

          <!-- <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a> -->
          <!-- End Notification Icon -->

          <!-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul> -->
          <!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <!-- <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a> -->
          <!-- End Messages Icon -->

          <!-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul> -->
          <!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <!-- <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a> -->
          <!-- End Profile Iamge Icon -->

          <!-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul> -->
          <!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->
   
    <div class="search-bar">
          <form class="row g-3" method="post" action="paymentMethod.php" style="margin-right:10px">
  <div class="col-auto">
    <label for="staticEmail2" class="visually-hidden">Payment method</label>
    <select name="paymentmethod"  style="color:white" class="form-control-plaintext" id="staticEmail2">
    <option value="Paytm" style="color:black">Paytm</option>  
    <option value="payU" style="color:black">payU</option>
      <option value="txn" style="color:black">Txn Id</option>
    </select>
  </div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Save</button>
  </div>
</form>
    </div>

    <button type="button" class="btn btn-light btn-sm" onclick="window.open('adminLogout.php', '_top')">Logout</button>

    <div class="navImgOut" style="margin-right: 2%;">
      <img src="../../images/youthLogo.png" class="navImg">
    </div>
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="#" onclick="adminPanelPartLoad('ADMIN_USERS')">
          <!-- <i class="bi bi-grid"></i> -->
          <i class="bi bi-person"></i>
          <span>Users</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#" onclick="adminPanelPartLoad('ADMIN_ENQUIRY')">
          <!-- <i class="bi bi-grid"></i> -->
          <i class="bi bi-question-lg"></i>
          <span>Enquiries</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#" onclick="adminPanelPartLoad('ADMIN_PRICE')">
          <!-- <i class="bi bi-grid"></i> -->
          <i class="bi bi-cash"></i>
          <span>Pricing</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="../../pdf/allUsers.php">
          <!-- <i class="bi bi-grid"></i> -->
          <i class="bi bi-person"></i>
          <span>Download User PDF</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#" onclick="adminPanelPartLoad('ADMIN_HOME_CONTENT')">
          <!-- <i class="bi bi-grid"></i> -->
          <i class="bi bi-card-text"></i>
          <span>Set Melava Details</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->
  </aside><!-- End Sidebar-->



  <div class="contentOut" id="contentOut">

  </div>

  <script>
    var contentOut = document.getElementById('contentOut');
    var adminPanelPart = sessionStorage.getItem('adminPanelPart');
    // contentOut.innerHTML = '';
    // $searchVal = '';
    // var query = '';

    // load_data_adminUsers(1);

    // function load_data_adminUsers(page, query = '') {
    //   $.ajax({
    //     url: "adminUsers.php",
    //     method: "POST",
    //     data: {
    //       page: page,
    //       query: query
    //     },
    //     success: function(data) {
    //       $('#contentOut').html(data);
    //       $('#search_box').val($searchVal);
    //     }
    //   });
    // }

    // $(document).on('click', '.page-link-adminUsers', function() {
    //   var page = $(this).data('page_number');
    //   query = $('#search_box').val();
    //   load_data_adminUsers(page, query);
    // });

    // $(document).on('click', '#searchBtn', function(e) {
    //   e.preventDefault;
    //   query = $('#search_box').val();
    //   $searchVal = query;
    //   load_data_adminUsers(1, query);
    // });



    function adminPanelPartLoad(adminPanelPart) {
      sessionStorage.setItem('adminPanelPart', adminPanelPart);
      contentOut.innerHTML = '';
      $(document).ready(function() {
        switch (adminPanelPart) {
          case 'ADMIN_USERS':
            // $(document).ready(function() {
            $searchVal = '';
            var query = '';

            load_data_adminUsers(1);

            function load_data_adminUsers(page, query = '') {
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
                }
              });
            }
            $(document).on('click', '.page-link-adminUsers', function() {
              var page = $(this).data('page_number');
              query = $('#search_box').val();
              load_data_adminUsers(page, query);
            });

            $(document).on('click', '#searchBtn', function(e) {
              e.preventDefault;
              query = $('#search_box').val();
              $searchVal = query;
              load_data_adminUsers(1, query);
            });
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
          case 'ADMIN_PRICE':
            $.ajax({
              url: "adminPrice.php",
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
          case 'ADMIN_HOME_CONTENT':
            $.ajax({
              url: "adminSetHomeContent.php",
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
        }
      });


    }




    var userIDToDelete;

    function adminUserDelete(delEl) {
      userIDToDelete = $(delEl).data("custom-value");
      console.log(userIDToDelete);
      $(document).ready(function() {
        $.ajax({
          url: "adminUserDelete.php",
          method: "POST",
          data: {
            userIDToDelete: userIDToDelete,
          },
          success: function(data) {
            if (data) {
              swal('User Removed Succesfully!');
              // swal(data);
              adminPanelPartLoad('ADMIN_USERS');
          }
          }
        });
      });
    }

    function adminMultiUserDel() {
      var checkedValue = document.querySelector('.form-check-input:checked').value;
      var markedCheckbox = document.querySelectorAll('input[type="checkbox"]:checked');
      let checkedValues = [];
      for (var checkbox of markedCheckbox) {
        checkedValues.push(checkbox.value);
      }
      // console.log(checkedValues);
      userIDToDelete = JSON.stringify(checkedValues);
      $(document).ready(function() {
        $.ajax({
          url: "adminUserDelete.php",
          method: "POST",
          data: {
            userIDToDelete: userIDToDelete,
          },
          success: function(data) {
            if (data) {
              swal('User(s) Removed Succesfully!');
              // swal(data);
              adminPanelPartLoad('ADMIN_USERS');
          }
          }
        });
      });
    }

    var enqIDToDelete;

    function adminEnqDel(enqDelEl) {
      enqIDToDelete = $(enqDelEl).data("custom-value");
      console.log(enqIDToDelete);
      $(document).ready(function() {
        $.ajax({
          url: "adminEnqDelete.php",
          method: "POST",
          data: {
            enqIDToDelete: enqIDToDelete,
          },
          success: function(data) {
            if (data) {
              swal('Row Removed Succesfully!');
              adminPanelPartLoad('ADMIN_ENQUIRY');
          }
          }
        });
      });
    }

    function adminMultiEnqDel() {
      var checkedValue = document.querySelector('.form-check-input:checked').value;
      var markedCheckbox = document.querySelectorAll('input[type="checkbox"]:checked');
      let checkedValues = [];
      for (var checkbox of markedCheckbox) {
        checkedValues.push(checkbox.value);
      }
      // console.log(checkedValues);
      enqIDToDelete = JSON.stringify(checkedValues);
      $(document).ready(function() {
        $.ajax({
          url: "adminEnqDelete.php",
          method: "POST",
          data: {
            enqIDToDelete: enqIDToDelete,
          },
          success: function(data) {
            if (data) {
              swal('Row(s) Removed Succesfully!');
              adminPanelPartLoad('ADMIN_ENQUIRY');
            } else {
              swal('Error Removing Row(s)! Please Try Again...');
            }
          }
        });
      });
    }

    function adminUserRegForm() {
      $(document).ready(function() {
        let fname = $("#fname").val();
        let mname = $("#mname").val();
        let lname = $("#lname").val();
        if (fname.trim() != "" && mname.trim() != "" && lname.trim() != "") {
          $.ajax({
            type: 'post',
            url: 'adminPriceQ.php',
            // url: 'fetch.php',
            data: {
              fname: fname,
              mname: mname,
              lname: lname,
            },
            success: function(response) {
              swal(response);
              adminPanelPartLoad('ADMIN_PRICE');
            }
          });
        } else {
          swal('Please Enter All Details!');
        }
      });
    }

    function adminSetHomeContent() {
      $(document).ready(function() {
        let melDetails = $("#melDetails").val();
        let melDate = $("#melDate").val();
        if (melDetails.trim() != "" && melDate.trim() != "") {
          $.ajax({
            type: 'post',
            url: 'adminSetHomeContentQ.php',
            // url: 'fetch.php',
            data: {
              melDetails: melDetails,
              melDate: melDate
            },
            success: function(response) {
              swal('Details Updated Successfully!');
              adminPanelPartLoad('ADMIN_HOME_CONTENT');
            }
          });
        } else {
          swal('Please Enter All Details!');
        }
      });
    }

    window.onload = () => {
      if (adminPanelPart === null || adminPanelPart === '') {
        adminPanelPart = 'ADMIN_USERS';
      }
      adminPanelPartLoad(adminPanelPart);
      // new google.translate.TranslateElement({
      //   pageLanguage: 'en',
      //   layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,
      //   includedLanguages: "en,hi,mr,te,kn"
      // }, 'google_translate_element');
    }
  </script>



  <!-- ======= Footer ======= -->
  <!-- <footer id="footer" class="footer"> -->
  <!-- <div class="copyright"> -->
  <!-- &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved -->
  <!-- </div> -->
  <!-- <div class="credits"> -->
  <!-- All the links in the footer should remain intact. -->
  <!-- You can delete the links only if you purchased the pro version. -->
  <!-- Licensing information: https://bootstrapmade.com/license/ -->
  <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
  <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
  <!-- </div> -->
  <!-- </footer> -->
  <!-- End Footer -->

  <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <!-- <script src="assets/vendor/chart.js/chart.min.js"></script> -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>