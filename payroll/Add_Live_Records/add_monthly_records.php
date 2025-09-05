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
include "config.php";
include "get_month.php";
$query = "SELECT DISTINCT SITE_ID FROM emp_details ORDER BY SITE_ID ASC";
?>

<!doctype html>
<html>

<head>
    <title>Monthly Records</title>
    <link href='style.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css_lib/4.1.3_bootstrap.min.css">
    <link rel="stylesheet" href="../css_lib/w3css_4_w3.css">
    <style>
    ::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */

    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    /* Handle */

    ::-webkit-scrollbar-thumb {
        background: #99aad8;
        border-radius: 15px;
    }

    /* Handle on hover */

    ::-webkit-scrollbar-thumb:hover {
        background: blue;
    }
    </style>
</head>

<body>
    <!-- Header start -->
    <nav class="navbar navbar-dark" style="background-color: #294FCC;width: 100%;">
        <a class="navbar-brand" href="../dashboard.php"><img src="../img/logo.svg" width="60" height="30"
                class="d-inline-block align-top" alt="">Home</a>
    </nav>
    <!-- Header End -->

    <!-- Modal -->
    <div class="modal fade" id="record_mitra" role="dialog">
        <div class="modal-dialog modal-dialog-centered">

            <!-- Modal content-->
            <div class="modal-content" style="border-radius:20px;">
                <div style="background-color: blue;border-radius: 20px; ">
                    <h4 style="text-align: center;font-weight: 700;color: azure;">Record Mitra</h4>
                </div>
                <div class="modal-body">
                    <form action="rm_format.php" id="fupForm" name="form1" method="post">
                        <div class="form-group">
                            <label for="Site_ID">Site ID</label>
                            <select class="form-control" id="Site_ID" name='Site_ID'>
                                <?php
                                $result = mysqli_query($conn, $query);
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="' . $row["SITE_ID"] . '">' . $row["SITE_ID"] . '</option>';
                                }
                                ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="month">Select Month</label>
                            <select class="form-control" id="rm_month" name='rm_month'>
                                <option value="<?php echo get_current_month(); ?>">This Month</option>
                                <option value="<?php echo get_previous_month(); ?>">Previous Month</option>
                                <?php include '../reports_12month.php';
                                ?>
                            </select>
                        </div>
                        <input style="margin-left:35%;" type="submit" name="butformat" class="btn btn-success"
                            value="Download Format" id="butformat">

                    </form>
                    <form id="import_form" action="rm_import.php" method="post" enctype="multipart/form-data">
                        <div class="form-group" style="margin:8% 0% ;">
                            <label for="upload" style="margin-right:4%;font-weight: bolder;">Upload File</label>
                            <input type="file" name="file" id="file">
                        </div>
                        <input type="hidden" name="upload_month" id="upload_month" value="">
                        <input type="hidden" name="upload_site" id="upload_site" value="">
                        <input style="margin-left:35%;" type="button" name="butsave" class="btn btn-success"
                            data-dismiss="modal" value="Upload and Save" id="butsave">
                    </form>


                </div>
            </div>

        </div>
    </div>
    <!-- Modal Ends -->

    <div class="alert alert-success alert-dismissible" id="save_success" style="display:none;">
        <a href="../dashboard.php" class="close" data-dismiss="alert" aria-label="close">×</a>
    </div>

    <div class="row" style="margin-top:20px;margin-left: 2%;">
        <div class='btn' type="button" data-toggle="modal" data-target="#record_mitra" style="display: block;">
            <img src="record_mitra.svg" style="height:100px">
            <h4 style="font-weight: bold;">Record Mitra</h4>
        </div>


        <form class="row" style="margin-left: 20%;margin-top:2%;height:40px">
            <label for="site">Site ID</label>
            <select id="site_id" name="SITE" style="margin-left: 10px;">
                <?php
                $result = mysqli_query($conn, $query);
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["SITE_ID"] . '">' . $row["SITE_ID"] . '</option>';
                }
                ?>
            </select> <br>
            <label for="Month" style="margin-left: 50px;">Month</label>
            <select name="Month" id="Month" style="width: 140px; margin-left:10px; margin-right:10px">
                <option value="<?php echo get_current_month(); ?>">This Month</option>
                <option value="<?php echo get_previous_month(); ?>">Previous Month</option>
                <?php include '../reports_12month.php'; ?>
            </select>
            <input id="monthly_btn" class="btn btn-primary" style="margin-left: 4%;width: 15%;" value="Go" readonly />
        </form>
        <a class='btn' href="salary_sheet.php" type="button" style="display: block;margin-left: 3%;">
            <img src="../img/salary.png" style="height:80px">
            <h4 style="font-weight: bold;">Salary Sheet</h4>
        </a>
    </div>


    <div class='row' style="text-align: center;overflow-x: auto;margin: 0px 15px; overflow-y: auto;max-height: 50vh;">
        <table class="table table-striped table-primary table-hover table-bordered"
            style="margin: 0% 0%;padding-left:0px;">
            <thead>
                <tr>
                    <th style="background-color:#fb74994f;" width="3%">Emp&nbspID</th>

                    <th style="background-color:#fb74994f;" width="7%">&nbspName&nbspof&nbspthe&nbspEmployee&nbsp</th>
                    <th style="background-color:#fb74994f;" width="5%">Designation</th>


                    <th style="background-color:#fb74994f;" width="5%">Month days</th>
                    <th width="5%">Attendance</th>
                    <th width="5%">Weekly off</th>
                    <th width="5%">Paid Holidays</th>

                    <th width="5%">C&nbspOff Available</th>
                    <th width="5%">C&nbspOff Availed</th>
                    <th width="5%">C&nbspOff Earned</th>
                    <th width="5%">C&nbspOff Bal</th>


                    <th width="5%">E&nbspLeave Available</th>
                    <th width="5%">E&nbspLeave Availed</th>
                    <th width="5%">E&nbspLeave Balance</th>


                    <th style="background-color:#fb74994f;" width="5%">LWP</th>
                    <th style="background-color:#fb74994f;" width="5%">Pay Days</th>


                    <th width="5%">Advance</th>
                    <th width="5%">Other Deduction</th>
                    <th width="5%">Overtime</th>
                    <th width="5%">Other Allowance</th>
                    <th style="background-color:#fb74994f;" width="5%">UAN</th>
                    <th style="background-color:#fb74994f;" width="5%">ESIC</th>

                </tr>
            </thead>
            <tbody id="tbody_monthly">
            </tbody>
        </table>

    </div>
    <div class="row">
        <input id="save_btn" class="btn btn-primary" style="margin-left: 80%;float:right;margin-top:3%" value="SAVE"
            readonly />
    </div>

    <script>
    var monthly_button = document.getElementById('monthly_btn');
    monthly_button.addEventListener('click', () => {
        var site_id = $('#site_id').val();
        var month = $('#Month').val();
        $.ajax({
            url: 'monthly_backend.php',
            method: 'POST',
            data: {
                site_id: site_id,
                month: month
            },
            success: function(data) {
                $('#tbody_monthly').html(data);
            }
        });
    });
    var save_button = document.getElementById('save_btn');
    save_button.addEventListener('click', () => {
        var site_id = $('#site_id').val();
        var month = $('#month').val();
        $.ajax({
            url: 'monthly_backend.php',
            method: 'POST',
            data: {
                site_id: site_id,
                month: month
            },
            success: function(data) {
                $('#tbody_monthly').html(data);
                $("#save_success").show();
                $('#save_success').html(
                    'Records saved successfully, refresh once to view!');
            }

        });
    });
    </script>

    <script src="../js/ajax_jquery_3.6.0_jquery.min.js"></script>
    <script src="../js/1.14.3_popper.min.js">
    </script>
    <script src="../js/bootstrap_4.1.3_bootstrap.min.js">
    </script>
    <script src="script.js" type="text/javascript"></script>

</body>

</html>