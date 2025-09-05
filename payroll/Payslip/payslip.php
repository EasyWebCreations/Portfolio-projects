<?php
session_start();
if (!isset($_SESSION["user"])) {
    header('Location: ../index.php');
}
$now = time();
if ($now > $_SESSION['expire']) {
    echo "<script src='../js/sweetalert.min.js'></script>
    <script>swal('Operation Failed','Please upload in correct format','error');</script>";
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="reports.css">
    <title>Payslip</title>
</head>


<body>
    <!-- Header start -->
    <nav class="navbar navbar-dark" style="background-color: #294FCC;width: 100%;">
        <a class="navbar-brand" href="../dashboard.php"><img src="../img/logo.svg" width="60" height="30" class="d-inline-block align-top" alt="">Home</a>
    </nav>
    <!-- Header End -->
    <form action="export.php" method="post" style="width:40%;background-color: #F1F0EC;margin:5%;margin-left:30%;border-radius: 30px;" action="export.php" method="post">

        <div style="height:100px;background-color: #294FCC;color:White;padding:10px;border-top-left-radius: 30px;border-top-right-radius: 30px">
            <img src="img/payslip.png" style="width:10%;height:60%;margin-left:43%">
            <h3 style="font-weight: bolder;text-align: center;">Generate Payslip</h3>
        </div>
        <div style="padding-top: 5%;padding-left:24%;padding-bottom: 1%;">
            <?php include_once "../get_month.php"; ?>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Month</label>
                <div class="col-sm-8">
                    <select name="SLIP_MONTH" id="SLIP_MONTH" style="height:35px;width:50%;">
                        <option value="<?php echo get_current_month(); ?>">This Month</option>
                        <option value="<?php echo get_previous_month(); ?>">Previous Month</option>
                        <?php include_once "../reports_12month.php"; ?>

                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-4 col-form-label">Employee ID</label>
                <div class="col-sm-8">
                    <select id="country" name="EMPID" style=height:35px;width:50%>
                        <option value="">All Employees</option>
                        <?php include 'all_employee_option.php'; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">SITE ID</label>
                <div class="col-sm-8">
                    <select id="select" name="SITEID" style=height:35px;width:50%>
                        <option value="">Select Site</option>
                        <?php include 'all_site_option.php'; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Company</label>
                <div class="col-sm-8">
                    <select id="select" name="FIRM" style=height:35px;width:50%>
                        <option value="">Select Company</option>
                        <option value="TEE">TEE</option>
                        <option value="SS">SS</option>
                    </select>
                </div>
            </div>

            <!-- <div class="form-group row" >
    <label for="inputPassword3" class="col-sm-4 col-form-label">Month</label>
    <div class="col-sm-8">
      <select id="select" name="SITEID1" style=height:35px;width:50%>
        <option value="TESTSITE">TESTSITE</option>
        <option value="TESTSITE1">TESTSITE1</option>
        <option value="TESTSITE2">TESTSITE2</option>
      </select>
    </div>
  </div> -->

            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-4 col-form-label">Format</label>
                <div class="col-sm-8">
                    <select id="select" name="FORMAT" style=height:35px;width:50%>
                        <option value="EXCEL">EXCEL</option>
                        <option value="PDF">PDF</option>
                    </select>
                </div>
            </div>


        </div>

        <input type="submit" class=btn value="Export" btn-primary style="background-color: #294FCC;color:white;margin-left:45%;margin-bottom:3%" />

        </div>
    </form>


    <!-- Footer starts -->
    <!-- <nav class="navbar" style="background-color: #294FCC; z-index: 1;color:white;margin-top:4.5% ">
        <a href="# " class="navbar-brand ">Copyright @ 2021 All rights reserved</a>
        <a href="# " class="navbar-brand " style="float: right; ">
            This portal is managed by Easy Techs
        </a>
    </nav> -->
    <!-- Footer Ends -->





    <!-- JS for sidde bar -->

    <script src="../js/jquery_3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous ">
    </script>
    <script src="../js/1.14.3_popper.min.js">
    </script>
    <script src="../css_lib/4.1.3_bootstrap.min.css">
    </script>


</body>


</html>

</html>