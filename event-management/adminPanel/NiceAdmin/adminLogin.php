<?php
// session_start();
// // session_destroy();
// include_once('../../connect.php');
// echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//   if (empty(trim($_POST['adminEmail'])) || empty(trim($_POST['adminPass']))) {
//     echo "<script>alert('Please Enter Username And Password');</script>";
//     // header('Refresh:0');
//   } else {
//     // echo "<script>alert('Email ID: " . trim($_POST['adminEmail']) . " Password: " . trim($_POST['adminPass']) . "');</script>";

//     $userid = mysqli_real_escape_string($conn, $_POST['adminEmail']);
//     $password = mysqli_real_escape_string($conn, $_POST['adminPass']);

//     $sql = mysqli_query($conn, "SELECT * FROM admin WHERE email = '{$userid}'");
//     if (mysqli_num_rows($sql) > 0) {
//       $row = mysqli_fetch_assoc($sql);
//       if ($password === $row['password']) {
//         $_SESSION['unique_id'] = $row['id'];
//         echo "<script>alert('Inside True');</script>";
//         echo "<script>alert('isset = '" . isset($_SESSION['unique_id']) . ");</script>";
//         echo isset($_SESSION['unique_id']);
//         // header("refresh:1;url=index.php");
//         header("location: index.php");
//       } else {
//         echo "<script>alert('Email or Password is Incorrect!');</script>";
//         // header("refresh:1;url=adminLogin.php");
//         header('Refresh:0');
//       }
//     } else {
//       echo "<script>alert('This Email ID is Not Registered');</script>";
//       header('Refresh:0');
//     }
//   }
// }
echo '
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Akshadaa Events</title>
  <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  
</body>
</html>';
include_once("../../connect.php");
session_start();
if (isset($_SESSION['adminEmail'])) {
  header('location: index.php');
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $adminEmail = mysqli_real_escape_string($conn, $_POST['adminEmail']);
  $adminPass = mysqli_real_escape_string($conn, $_POST['adminPass']);
  $sql = mysqli_query($conn, "SELECT * FROM admin WHERE email = '{$adminEmail}'");
  if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
    if ($row['password'] == $adminPass) {
      $_SESSION['adminEmail'] = $adminEmail;
      header('location: index.php');
    } else {
      try {
        session_destroy();
      } catch (Exception $e) {
      }
      echo "<script>swal('Incorrect Password!');</script>";
    }
  } else {
    try {
      session_destroy();
    } catch (Exception $e) {
    }
    echo "<script>swal('This Email ID is Not Registered!');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Akshadaa Events</title>
  <link href="assets/img/favicon.png" rel="icon">
  <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <style>
    * {
      box-sizing: border-box;
      margin: 0vw;
      padding: 0vw;
    }

    body {
      background: lavenderblush;
    }

    .container {
      width: 100vw;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .adminLoginForm {
      background: white;
      padding: 25px;
      margin-top: 30px;
      border-radius: 15px;
    }

    .navBar {
      height: 70px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #790556;
    }

    @media screen and (min-width: 721px) {
      .adminLoginForm {
        width: 60%;
      }

      /* .navBar {
        height: 5vw;
      } */

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
      .adminLoginForm {
        width: 90%;
      }

      /* .navBar {
        height: 15vw;
      } */

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
</head>

<body>

  <!-- <header id="header" class="header fixed-top d-flex align-items-center" style="background: #7D3668;">
    <div class="navImgOut" onclick="window.open('index.php', target='_top')">
      <img src="../../assets/images/logo.png" class="navImg">
    </div>
    <div class="navImgOut" style="margin-right: 2%;">
      <img src="../../images/youthLogo.png" class="navImg">
    </div>
  </header> -->
  <div class="navBar">
    <div class="navImgOut" onclick="window.open('../../index.php', target='_top')">
      <img src="../../assets/images/logo.png" class="navImg">
    </div>
    <div class="navImgOut" style="margin-right: 2%;">
      <img src="../../images/youthLogo.png" class="navImg">
    </div>
  </div>

  <div class="container">
    <form action="" class="adminLoginForm" name="adminLoginForm" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="adminEmail" name="adminEmail" aria-describedby="emailHelp" placeholder="Email ID" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="adminPass" name="adminPass" placeholder="Password" required>
      </div>
      <button type="submit" class="btn btn-primary" style="background: #790556; border: none;">Login</button>
    </form>
  </div>
</body>

</html>