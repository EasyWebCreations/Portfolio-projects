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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Sheet</title>
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
    <div class="row">
        <a href="add_monthly_records.php" style="margin-left: 2%;"><img src="../img/back.png" alt=""
                style="height: 50px;" srcset=""></a>
        <form class="row" style="margin: 1% 25%;width:40%;">
            <div class="col" style="margin: auto">
                <label for="site">Site ID</label>
                <select id="site_id" name="SITE">
                    <?php
                    $result = mysqli_query($conn, $query);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["SITE_ID"] . '">' . $row["SITE_ID"] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <br>
            <div class="col" style="margin: auto">
                <label for="Month">Month</label>
                <select name="Month" id="month" style="width: 140px; ">
                    <option value="<?php echo get_current_month(); ?>">This Month</option>
                    <option value="<?php echo get_previous_month(); ?>">Previous Month</option>
                    <?php include '../reports_12month.php'; ?>
                </select>
            </div>
            <input id="monthly_btn" class="btn btn-primary" style="width: 15%; margin: auto" value=" Go" readonly />
        </form>
    </div>
    <!-- Row of filter ends  -->
    <div class="row">
        <div class="col-12 ">
            <div style="text-align: center;overflow-x: auto;margin: 0px 15px;  ">
                <!-- PF Format -->
                <table style="border-color: black;" id="pf_report_table"
                    class="table table-striped table-primary table-hover table-bordered">
                    <thead>
                        <tr>
                            <th width="7%">Sr</th>
                            <th width="7%">Month&nbsp;Name</th>
                            <th width="10%">UAN </th>
                            <th width="25%">Employee&nbsp;&nbsp;Name</th>
                            <th width="25%">Designation</th>
                            <th width="25%">Fixed Basic+DA</th>
                            <th width="25%">Fixed HRA</th>
                            <th width="25%">Fixed Allowance</th>
                            <th width="25%">Total</th>
                            <th width="8%">Month days</th>
                            <!-- <th width="10%">Company Working&nbsp;Days</th> -->
                            <th width="10%">Attendance</th>
                            <th width="10%">W/o</th>
                            <th width="10%">C_OFF Availed</th>
                            <th width="10%">Absent</th>
                            <th width="10%">Leaves</th>
                            <th width="5%">Pay&nbsp;Days</th>
                            <th width="5%">Gross Basic+DA</th>
                            <th width="5%">Gross HRA</th>
                            <th width="5%">Gross Allowance</th>
                            <th width="5%">Gross Salary</th>
                            <th width="5%">Leave Payment</th>
                            <th width="5%">Total Salary</th>
                            <th width="5%">PF Wages</th>
                            <th width="5%">Basic&nbsp;as per 15K</th>
                            <th width="5%">PF&nbsp;as&nbsp;per 15K</th>
                            <th width="5%">ESIC</th>
                            <th width="5%">PT</th>
                            <th width="5%">Deduction&nbsp;as per&nbsp;15K</th>
                            <th width="5%">Net Amount</th>
                            <th width="5%">OTHER DEDUCTION</th>
                            <th width="5%">Advance</th>
                            <th width="5%">Net Payale</th>
                            <th width="5%">PH</th>
                            <th width="5%">PH Pay</th>
                            <th width="5%">OT Hrs</th>
                            <th width="5%">OT Payable</th>
                            <th width="5%">Employer PF</th>
                            <th width="5%">Employer ESIC</th>
                            <th width="5%">Bonus</th>
                        </tr>

                    </thead>

                    <tbody id="tbody_ss">

                    </tbody>
                </table>
                <!-- Sites Table Ends -->
            </div>
        </div>

    </div>
    <!-- Row ends here -->
    <!-- Download -->
    <!-- Download -->
    <div class="row" style="margin-top: 5%;">

        <div class="col" style="margin-left:40%">
            <svg style="margin-right: 2%;" xmlns="http://www.w3.org/2000/svg" width="40.748" height="39.822"
                viewBox="0 0 50.748 49.822">
                <path id="Icon_simple-microsoftexcel" data-name="Icon simple-microsoftexcel"
                    d="M49.8,6.425h-17V9.571h5.011v4.978H32.8v1.586h5.011v4.984H32.8v1.63h5.011v4.713H32.8V29.35h5.011v4.724H32.8v1.888h5.011v4.751H32.8v3.466h17c.269-.08.493-.4.672-.947a4.637,4.637,0,0,0,.273-1.345V7c0-.271-.093-.433-.273-.491A2.326,2.326,0,0,0,49.8,6.425ZM47.6,40.709H39.442V35.962H47.6v4.747Zm0-6.635H39.442V29.348H47.6Zm0-6.614H39.442V22.767H47.6V27.46Zm0-6.343H39.442V16.139H47.6v4.978Zm0-6.6H39.442V9.573H47.6v4.948ZM0,5.64V44.972L29.941,50.15V.329L0,5.657ZM17.747,35.393q-.171-.463-1.6-3.939c-.949-2.317-1.522-3.667-1.689-4.051H14.4L11.19,35.046,6.9,34.757l5.092-9.515L7.327,15.726,11.7,15.5,14.6,22.941h.057l3.267-7.783,4.523-.285-5.386,10.3,5.551,10.5-4.861-.285Z"
                    transform="translate(0 -0.328)" fill="#098212" />
            </svg>

            <input class="btn btn-success" onclick="exportTableToExcel('pf_report_table','tf')" type="submit"
                value="Donwnload" style="width: 150px;">
        </div>
    </div>
    <!-- Download row ends -->
    <script>
    var filter_button = document.getElementById('monthly_btn');
    filter_button.addEventListener('click', () => {
        var site_id = $('#site_id').val();
        var month = $('#month').val();

        $.ajax({
            url: 'calculation_backend.php',
            method: 'POST',
            data: {
                site_id: site_id,
                month: month
            },
            success: function(data) {
                $('#tbody_ss').html(data);
            }

        });
    });
    </script>
    <script src="../psc_scratch/xls.js"></script>
    <script src="../js/ajax_jquery_3.6.0_jquery.min.js"></script>
    <script src="../js/1.14.3_popper.min.js">
    </script>
    <script src="../js/bootstrap_4.1.3_bootstrap.min.js">
    </script>
    <script src='script.js' type='text/javascript'></script>
</body>

</html>