<?php
session_start();
if (!isset($_SESSION["user"])) {
    header('Location: index.php');
}
$now = time();
if ($now > $_SESSION['expire']) {
    echo "<script src='js/sweetalert.min.js'></script>
    <script>swal('Operation Failed','Please upload in correct format','error');</script>";
    session_destroy();
}
include_once "connectDB.php";

$current_month = date("Y-m-01");

//index.php

// include_once "connectDB_ajax.php";


$query = "SELECT DISTINCT SITE_ID FROM emp_details ORDER BY SITE_ID ASC";
$query_d = "SELECT DISTINCT DESIGNATION FROM emp_details ORDER BY DESIGNATION ASC";

// $statement = $connect->prepare($query);

// $statement->execute();

// $result = $statement->fetchAll();



// $sql = "SELECT salary.EMP_ID, EMP_NAME, BNK_NAME, PAY_DAYS, BANK_AC_NO , IFSC_CODE, BNK_ADDRESS, NET_SAL from emp_details INNER JOIN salary where emp_details.emp_ID = salary.emp_id and salary.month  = '$month' ";
// $result = $conn->query($sql);

// while ($output =  $result->fetch_assoc()) {
//     echo $output["PAY_DAYS"];
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/ajax_jquery_2.1.3_jquery.min.js"></script>
    <link rel="stylesheet" href="css_lib/4.1.3_bootstrap.min.css">
    <link rel="stylesheet" href="css_lib/w3css_4_w3.css">
    <link rel="stylesheet" href="reports.css">
    <title>Reports</title>
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
    <nav style="position: fixed;width:100%;margin-bottom: 2%;" class="navbar navbar-dark w3-blue">
        <a class="navbar-brand" href="dashboard.php"><img src="img/logo.svg" width="60" height="30" class="d-inline-block align-top" alt="">Home</a>
    </nav>
    <!-- Header End -->

    <!-- Sidebar Menu-->
    <div class="w3-sidebar w3-bar-block w3-card " style="width:300px; position:fixed;margin-top:7vh">
        <div class="report-image" style="background-color: #D8DBF2; text-align: center; ">
            <img src="img/report.png" alt="" style="width:200px; margin:20px 45px">
            <h3 style="margin-top: -15px;padding-bottom:15px;color: black;"><b>Reports</b></h3>
        </div>

        <button id="PF" class="w3-bar-item w3-button tablink svg-class" onclick="openCity(event, 'London ')">
            <svg class="" xmlns="http://www.w3.org/2000/svg" width="20" height="36" viewBox="0 0 30.07 36">
                <path id="Icon_simple-sitepoint" data-name="Icon simple-sitepoint" d="M3.707,15.8l2.656,2.532,8.4,7.712,3.6-3.437a1.206,1.206,0,0,0-.069-1.477l-3.306-2.853L15,18.268l-3.556-3.4a1.182,1.182,0,0,1,.031-1.618L21.06,4.137,16.719,0,3.713,12.357a2.357,2.357,0,0,0,0,3.443ZM32.291,20.2l-2.655-2.537L21.243,9.955l-3.617,3.437a1.16,1.16,0,0,0,.067,1.477L21,17.706h-.009l3.553,3.4a1.155,1.155,0,0,1-.044,1.6l-9.587,9.112L19.282,36l13-12.357a2.354,2.354,0,0,0,0-3.442l0,0Z" transform="translate(-2.965)" />
            </svg>
            PF Format
        </button>

        <button id="ESIC" class="w3-bar-item w3-button tablink svg-class" onclick="openCity(event, 'Paris ')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="36" viewBox="0 0 31.5 36">
                <path id="Icon_awesome-user-tie" data-name="Icon awesome-user-tie" d="M15.75,18a9,9,0,1,0-9-9A9,9,0,0,0,15.75,18Zm6.736,2.292L19.125,33.75l-2.25-9.562,2.25-3.937h-6.75l2.25,3.938-2.25,9.563L9.014,20.292A9.434,9.434,0,0,0,0,29.7v2.925A3.376,3.376,0,0,0,3.375,36h24.75A3.376,3.376,0,0,0,31.5,32.625V29.7a9.434,9.434,0,0,0-9.014-9.408Z" />
            </svg>
            ESIC Format
        </button>

        <button class="w3-bar-item w3-button tablink svg-class" onclick="openCity(event, 'Tokyo ')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="36" viewBox="0 0 31.5 36">
                <path id="Icon_awesome-unlock-alt" data-name="Icon awesome-unlock-alt" d="M28.125,18H10.688V10.751a5.063,5.063,0,1,1,10.125-.063v1.125A1.683,1.683,0,0,0,22.5,13.5h2.25a1.683,1.683,0,0,0,1.688-1.687V10.688a10.688,10.688,0,1,0-21.375.105V18H3.375A3.376,3.376,0,0,0,0,21.375v11.25A3.376,3.376,0,0,0,3.375,36h24.75A3.376,3.376,0,0,0,31.5,32.625V21.375A3.376,3.376,0,0,0,28.125,18ZM18.563,28.688a2.813,2.813,0,0,1-5.625,0V25.313a2.813,2.813,0,0,1,5.625,0Z" transform="translate(0 0)" />
            </svg>

            NEFT Format
        </button>

        <button class="w3-bar-item w3-button tablink svg-class" onclick="openCity(event, 'Mumbai ')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="36" viewBox="0 0 34.992 24.494">
                <path id="Icon_awesome-money-bill-wave" data-name="Icon awesome-money-bill-wave" d="M33.962,3.478A16.191,16.191,0,0,0,27.6,2.25c-6.734,0-13.468,3.408-20.2,3.408a16.589,16.589,0,0,1-5.066-.75,1.869,1.869,0,0,0-.566-.089A1.74,1.74,0,0,0,0,6.559V23.905a1.739,1.739,0,0,0,1.03,1.611,16.182,16.182,0,0,0,6.365,1.229c6.734,0,13.469-3.409,20.2-3.409a16.589,16.589,0,0,1,5.066.75,1.87,1.87,0,0,0,.566.089,1.74,1.74,0,0,0,1.763-1.739V5.089a1.741,1.741,0,0,0-1.031-1.611ZM2.624,7.73a19.027,19.027,0,0,0,3.429.488,3.5,3.5,0,0,1-3.429,2.818Zm0,15.582V20.7a3.5,3.5,0,0,1,3.483,3.357A13.208,13.208,0,0,1,2.624,23.312ZM17.5,19.746c-2.416,0-4.374-2.35-4.374-5.249S15.08,9.248,17.5,9.248,21.87,11.6,21.87,14.5,19.911,19.746,17.5,19.746Zm14.872,1.519A18.8,18.8,0,0,0,29.4,20.8a3.492,3.492,0,0,1,2.97-2.694Zm0-12.909A3.492,3.492,0,0,1,29.316,4.99a13.143,13.143,0,0,1,3.051.692Z" transform="translate(0 -2.25)" />
            </svg>
            Custom Report
        </button>

        <button class="w3-bar-item w3-button tablink svg-class" onclick="openCity(event, 'Nagpur ')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="36" viewBox="0 0 31.5 36">
                <path id="Icon_awesome-unlock-alt" data-name="Icon awesome-unlock-alt" d="M28.125,18H10.688V10.751a5.063,5.063,0,1,1,10.125-.063v1.125A1.683,1.683,0,0,0,22.5,13.5h2.25a1.683,1.683,0,0,0,1.688-1.687V10.688a10.688,10.688,0,1,0-21.375.105V18H3.375A3.376,3.376,0,0,0,0,21.375v11.25A3.376,3.376,0,0,0,3.375,36h24.75A3.376,3.376,0,0,0,31.5,32.625V21.375A3.376,3.376,0,0,0,28.125,18ZM18.563,28.688a2.813,2.813,0,0,1-5.625,0V25.313a2.813,2.813,0,0,1,5.625,0Z" transform="translate(0 0)" />
            </svg>

            NEFT Format SS
        </button>

        <a class="w3-bar-item w3-button tablink svg-class" href="logout.php">
            <svg xmlns="http://www.w3.org/2000/svg " width="20 " height="36 " viewBox="0 0 26.992 30.849 ">
                <path id="Icon_metro-switch " data-name="Icon metro-switch " d="M21.851,6.344v4.1a9.624,9.624,0,1,1-7.712,0v-4.1a13.5,13.5,0,1,0,7.712,0ZM16.067,1.928h3.856V17.352H16.067Z " transform="translate(-4.499 -1.928) " />
            </svg> Log Out
        </a>
    </div>
    <!-- Sidebar menu ends -->

    <!-- Sidebar body -->
    <div style="margin-left:330px ">
        <div id="London " class="w3-container city " style="display:none ">
            <!-- Site Filter for PF Format -->
            <div class="row " style="margin-top: 10%;margin-left: 24%; ">
                <select name="site_pf" id="site_pf" style="width: 140px; margin-left:10px; margin-right:10px">
                    <?php
                    include_once "get_month.php";
                    $result = mysqli_query($conn, $query);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["SITE_ID"] . '">' . $row["SITE_ID"] . '</option>';
                    }
                    ?>
                </select>
                <select name="month_pf" id="month_pf" style="width: 140px; margin-left:10px; margin-right:10px">

                    <option value="<?php echo get_current_month(); ?>">This Month</option>
                    <option value="<?php echo get_previous_month(); ?>">Previous Month</option>
                    <?php include 'reports_12month.php'; ?>
                </select>

                <input class="btn btn-primary" id="site_button_pf" name="site_button_pf" type="submit" style="width: 150px;">
            </div>
            <div class="row " style="overflow-x: auto ">
                <div class="col-12 ">
                    <div style="margin-left: 1%;margin-top:5% ">
                        <!-- PF Format -->
                        <table id="pf_report_table" class="table table-striped table-primary table-hover table-bordered">
                            <th width="7%">Month</th>
                            <th width="10%">UAN </th>
                            <th width="25%">Employee Name</th>
                            <th width="8%">Gross Wages</th>
                            <th width="10%">EPF Wages</th>
                            <th width="10%">EPF CR</th>
                            <th width="10%">EPS CR</th>
                            <th width="10%">EPF EPS DR</th>
                            <th width="5%">NCP DAYS</th>
                            <th width="5%">REFUND OF ADV</th>

                            <tbody id="tbody_pf"></tbody>
                        </table>
                        <!-- Sites Table Ends -->
                    </div>
                </div>

            </div>
            <!-- Row ends here -->
            <!-- Download -->
            <!-- Download -->
            <div class="row" style="margin-top: 5%;">
                <div class="col">
                    <svg style="margin-right: 2%;" xmlns="http://www.w3.org/2000/svg" width="27.366" height="39.822" viewBox="0 0 37.366 49.822">
                        <path id="Icon_awesome-file-pdf" data-name="Icon awesome-file-pdf" d="M17.7,24.921c-.487-1.557-.477-4.564-.195-4.564C18.323,20.357,18.245,23.947,17.7,24.921Zm-.165,4.593a44.9,44.9,0,0,1-2.764,6.1,35.831,35.831,0,0,1,6.121-2.131A12.605,12.605,0,0,1,17.535,29.513ZM8.378,41.658c0,.078,1.284-.525,3.4-3.912C11.122,38.359,8.943,40.13,8.378,41.658ZM24.132,15.569H37.366V47.486a2.33,2.33,0,0,1-2.335,2.335H2.335A2.33,2.33,0,0,1,0,47.486V2.335A2.33,2.33,0,0,1,2.335,0H21.8V13.234A2.342,2.342,0,0,0,24.132,15.569Zm-.778,16.717A9.766,9.766,0,0,1,19.2,27.052c.438-1.8,1.129-4.535.6-6.247-.457-2.861-4.126-2.579-4.651-.662-.487,1.781-.039,4.291.788,7.493a91.375,91.375,0,0,1-3.97,8.349c-.01,0-.01.01-.019.01-2.637,1.353-7.162,4.33-5.3,6.617a3.024,3.024,0,0,0,2.092.973c1.742,0,3.474-1.752,5.946-6.014a55.467,55.467,0,0,1,7.687-2.258,14.747,14.747,0,0,0,6.228,1.9,2.519,2.519,0,0,0,1.917-4.223C29.163,31.664,25.232,32.043,23.354,32.287ZM36.685,10.217,27.149.681A2.334,2.334,0,0,0,25.495,0h-.584V12.455H37.366v-.594A2.328,2.328,0,0,0,36.685,10.217ZM29.475,35.06c.4-.263-.243-1.158-4.165-.876C28.92,35.722,29.475,35.06,29.475,35.06Z" fill="#ff0007" />
                    </svg>
                    <input class="btn btn-danger" onclick="generatePDF('pf_report_table','PF')" type="submit" value="Donwnload" style="width: 150px;">


                </div>
                <div class="col" style="margin-left:60%">
                    <svg style="margin-right: 2%;" xmlns="http://www.w3.org/2000/svg" width="40.748" height="39.822" viewBox="0 0 50.748 49.822">
                        <path id="Icon_simple-microsoftexcel" data-name="Icon simple-microsoftexcel" d="M49.8,6.425h-17V9.571h5.011v4.978H32.8v1.586h5.011v4.984H32.8v1.63h5.011v4.713H32.8V29.35h5.011v4.724H32.8v1.888h5.011v4.751H32.8v3.466h17c.269-.08.493-.4.672-.947a4.637,4.637,0,0,0,.273-1.345V7c0-.271-.093-.433-.273-.491A2.326,2.326,0,0,0,49.8,6.425ZM47.6,40.709H39.442V35.962H47.6v4.747Zm0-6.635H39.442V29.348H47.6Zm0-6.614H39.442V22.767H47.6V27.46Zm0-6.343H39.442V16.139H47.6v4.978Zm0-6.6H39.442V9.573H47.6v4.948ZM0,5.64V44.972L29.941,50.15V.329L0,5.657ZM17.747,35.393q-.171-.463-1.6-3.939c-.949-2.317-1.522-3.667-1.689-4.051H14.4L11.19,35.046,6.9,34.757l5.092-9.515L7.327,15.726,11.7,15.5,14.6,22.941h.057l3.267-7.783,4.523-.285-5.386,10.3,5.551,10.5-4.861-.285Z" transform="translate(0 -0.328)" fill="#098212" />
                    </svg>

                    <input class="btn btn-success" onclick="exportTableToExcel('pf_report_table','PF')" type="submit" value="Donwnload" style="width: 150px;">
                </div>
            </div>
            <!-- Download row ends -->
            <!-- Download row ends -->
        </div>
        <!-- PF Choice  ends -->

        <!-- Choice 2 of sidebar begins (ESIC)-->
        <div id="Paris " class="w3-container city " style="display:none ">
            <!-- Site Filter for ESIC Format -->
            <div class="row " style="margin-top: 10%;margin-left: 24%; ">
                <select name="site_esic" id="site_esic" style="width: 140px; margin-left:10px; margin-right:10px">
                    <?php
                    include_once "get_month.php";
                    $result = mysqli_query($conn, $query);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["SITE_ID"] . '">' . $row["SITE_ID"] . '</option>';
                    }
                    ?>
                </select>
                <select name="month_esic" id="month_esic" style="width: 140px; margin-left:10px; margin-right:10px">

                    <option value="<?php echo get_current_month(); ?>">This Month</option>
                    <option value="<?php echo get_previous_month(); ?>">Previous Month</option>
                    <?php include 'reports_12month.php'; ?>
                </select>

                <input class="btn btn-primary" id="site_button_esic" name="site_button_esic" type="submit" style="width: 150px;">
            </div>
            <div class="row " style="overflow-x: auto ">
                <div class="col-12 ">
                    <div style="margin-left: 1%;margin-top:5% ">
                        <!----------------- ESIC Format ----------------->
                        <table id="esic_report_table" class="table table-striped table-primary table-hover table-bordered">
                            <thead>
                                <th width="5%">IP No.</th>
                                <th width="20%">IP Name</th>
                                <th width="5%">No. of Days</th>
                                <th width="10%">Total Monthly Wages</th>
                                <th width="10%">Reason Code For 0 Working Days</th>
                                <th width="10%">Last Working Day</th>
                            </thead>
                            <tbody id="tbody_esic">
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
                <div class="col">
                    <svg style="margin-right: 2%;" xmlns="http://www.w3.org/2000/svg" width="27.366" height="39.822" viewBox="0 0 37.366 49.822">
                        <path id="Icon_awesome-file-pdf" data-name="Icon awesome-file-pdf" d="M17.7,24.921c-.487-1.557-.477-4.564-.195-4.564C18.323,20.357,18.245,23.947,17.7,24.921Zm-.165,4.593a44.9,44.9,0,0,1-2.764,6.1,35.831,35.831,0,0,1,6.121-2.131A12.605,12.605,0,0,1,17.535,29.513ZM8.378,41.658c0,.078,1.284-.525,3.4-3.912C11.122,38.359,8.943,40.13,8.378,41.658ZM24.132,15.569H37.366V47.486a2.33,2.33,0,0,1-2.335,2.335H2.335A2.33,2.33,0,0,1,0,47.486V2.335A2.33,2.33,0,0,1,2.335,0H21.8V13.234A2.342,2.342,0,0,0,24.132,15.569Zm-.778,16.717A9.766,9.766,0,0,1,19.2,27.052c.438-1.8,1.129-4.535.6-6.247-.457-2.861-4.126-2.579-4.651-.662-.487,1.781-.039,4.291.788,7.493a91.375,91.375,0,0,1-3.97,8.349c-.01,0-.01.01-.019.01-2.637,1.353-7.162,4.33-5.3,6.617a3.024,3.024,0,0,0,2.092.973c1.742,0,3.474-1.752,5.946-6.014a55.467,55.467,0,0,1,7.687-2.258,14.747,14.747,0,0,0,6.228,1.9,2.519,2.519,0,0,0,1.917-4.223C29.163,31.664,25.232,32.043,23.354,32.287ZM36.685,10.217,27.149.681A2.334,2.334,0,0,0,25.495,0h-.584V12.455H37.366v-.594A2.328,2.328,0,0,0,36.685,10.217ZM29.475,35.06c.4-.263-.243-1.158-4.165-.876C28.92,35.722,29.475,35.06,29.475,35.06Z" fill="#ff0007" />
                    </svg>
                    <input class="btn btn-danger" onclick="generatePDF('esic_report_table','ESIC')" type="submit" value="Donwnload" style="width: 150px;">


                </div>
                <div class="col" style="margin-left:60%">
                    <svg style="margin-right: 2%;" xmlns="http://www.w3.org/2000/svg" width="40.748" height="39.822" viewBox="0 0 50.748 49.822">
                        <path id="Icon_simple-microsoftexcel" data-name="Icon simple-microsoftexcel" d="M49.8,6.425h-17V9.571h5.011v4.978H32.8v1.586h5.011v4.984H32.8v1.63h5.011v4.713H32.8V29.35h5.011v4.724H32.8v1.888h5.011v4.751H32.8v3.466h17c.269-.08.493-.4.672-.947a4.637,4.637,0,0,0,.273-1.345V7c0-.271-.093-.433-.273-.491A2.326,2.326,0,0,0,49.8,6.425ZM47.6,40.709H39.442V35.962H47.6v4.747Zm0-6.635H39.442V29.348H47.6Zm0-6.614H39.442V22.767H47.6V27.46Zm0-6.343H39.442V16.139H47.6v4.978Zm0-6.6H39.442V9.573H47.6v4.948ZM0,5.64V44.972L29.941,50.15V.329L0,5.657ZM17.747,35.393q-.171-.463-1.6-3.939c-.949-2.317-1.522-3.667-1.689-4.051H14.4L11.19,35.046,6.9,34.757l5.092-9.515L7.327,15.726,11.7,15.5,14.6,22.941h.057l3.267-7.783,4.523-.285-5.386,10.3,5.551,10.5-4.861-.285Z" transform="translate(0 -0.328)" fill="#098212" />
                    </svg>

                    <input class="btn btn-success" onclick="exportTableToExcel('esic_report_table','ESIC')" type="submit" value="Donwnload" style="width: 150px;">
                </div>
            </div>
            <!-- Download row ends -->
            <!-- Download row ends -->
        </div>
        <!-- Choice 2 of sidebar ends-->

        <!-- Choice 3 NEFT of sidebar begins -->
        <div id="Tokyo " class="w3-container city " style="display:none ">

            <!-- Site Filter for NEFT Format -->
            <div class="row " style="margin-top: 10%;margin-left: 24%; ">
                <select name="site_neft" id="site_neft" style="width: 140px; margin-left:10px; margin-right:10px">
                    <?php
                    include_once "get_month.php";
                    $result = mysqli_query($conn, $query);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["SITE_ID"] . '">' . $row["SITE_ID"] . '</option>';
                    }
                    ?>
                </select>
                <select name="month_neft" id="month_neft" style="width: 140px; margin-left:10px; margin-right:10px">

                    <option value="<?php echo get_current_month(); ?>">This Month</option>
                    <option value="<?php echo get_previous_month(); ?>">Previous Month</option>
                    <?php include 'reports_12month.php'; ?>
                </select>

                <input class="btn btn-primary" id="site_button_neft" name="site_button_neft" type="submit" style="width: 150px;">
            </div>
            <!-- Row 1 ends and 2 begins -->
            <div class="row " style="overflow-x: auto ">
                <div class="col-12 ">
                    <div style="margin-left: 1%;margin-top:5% ">
                        <!--NEFT Format -->
                        <table id="neft_report_table" class="table table-striped table-primary table-hover table-bordered">
                            <thead>
                                <th width="5%">AMOUNT IN PAISA</th>
                                <th width="25%">SENDER</th>
                                <th width="20%">SENDER ACCOUNT NO</th>
                                <th width="5%">BENEF ACCOUNT NO</th>
                                <th width="5%">BEN NAME</th>
                                <th width="5%">BEN ADDRESS</th>
                                <th width="5%">MOBILE/ EMAIL</th>
                                <th width="5%">MOBILE NO E MAIL ID</th>
                                <th width="10%">Heads</th>
                            </thead>
                            <tbody id="tbody_neft">
                            </tbody>

                        </table>
                        <!-- NEFT Table Ends -->
                    </div>
                </div>
            </div>
            <!-- Row 2 ends here -->
            <!-- Download -->
            <!-- Download -->
            <div class="row" style="margin-top: 5%;">
                <div class="col">
                    <svg style="margin-right: 2%;" xmlns="http://www.w3.org/2000/svg" width="27.366" height="39.822" viewBox="0 0 37.366 49.822">
                        <path id="Icon_awesome-file-pdf" data-name="Icon awesome-file-pdf" d="M17.7,24.921c-.487-1.557-.477-4.564-.195-4.564C18.323,20.357,18.245,23.947,17.7,24.921Zm-.165,4.593a44.9,44.9,0,0,1-2.764,6.1,35.831,35.831,0,0,1,6.121-2.131A12.605,12.605,0,0,1,17.535,29.513ZM8.378,41.658c0,.078,1.284-.525,3.4-3.912C11.122,38.359,8.943,40.13,8.378,41.658ZM24.132,15.569H37.366V47.486a2.33,2.33,0,0,1-2.335,2.335H2.335A2.33,2.33,0,0,1,0,47.486V2.335A2.33,2.33,0,0,1,2.335,0H21.8V13.234A2.342,2.342,0,0,0,24.132,15.569Zm-.778,16.717A9.766,9.766,0,0,1,19.2,27.052c.438-1.8,1.129-4.535.6-6.247-.457-2.861-4.126-2.579-4.651-.662-.487,1.781-.039,4.291.788,7.493a91.375,91.375,0,0,1-3.97,8.349c-.01,0-.01.01-.019.01-2.637,1.353-7.162,4.33-5.3,6.617a3.024,3.024,0,0,0,2.092.973c1.742,0,3.474-1.752,5.946-6.014a55.467,55.467,0,0,1,7.687-2.258,14.747,14.747,0,0,0,6.228,1.9,2.519,2.519,0,0,0,1.917-4.223C29.163,31.664,25.232,32.043,23.354,32.287ZM36.685,10.217,27.149.681A2.334,2.334,0,0,0,25.495,0h-.584V12.455H37.366v-.594A2.328,2.328,0,0,0,36.685,10.217ZM29.475,35.06c.4-.263-.243-1.158-4.165-.876C28.92,35.722,29.475,35.06,29.475,35.06Z" fill="#ff0007" />
                    </svg>
                    <input class="btn btn-danger" onclick="generatePDF('neft_report_table','NEFT')" type="submit" value="Donwnload" style="width: 150px;">


                </div>
                <div class="col" style="margin-left:60%">
                    <svg style="margin-right: 2%;" xmlns="http://www.w3.org/2000/svg" width="40.748" height="39.822" viewBox="0 0 50.748 49.822">
                        <path id="Icon_simple-microsoftexcel" data-name="Icon simple-microsoftexcel" d="M49.8,6.425h-17V9.571h5.011v4.978H32.8v1.586h5.011v4.984H32.8v1.63h5.011v4.713H32.8V29.35h5.011v4.724H32.8v1.888h5.011v4.751H32.8v3.466h17c.269-.08.493-.4.672-.947a4.637,4.637,0,0,0,.273-1.345V7c0-.271-.093-.433-.273-.491A2.326,2.326,0,0,0,49.8,6.425ZM47.6,40.709H39.442V35.962H47.6v4.747Zm0-6.635H39.442V29.348H47.6Zm0-6.614H39.442V22.767H47.6V27.46Zm0-6.343H39.442V16.139H47.6v4.978Zm0-6.6H39.442V9.573H47.6v4.948ZM0,5.64V44.972L29.941,50.15V.329L0,5.657ZM17.747,35.393q-.171-.463-1.6-3.939c-.949-2.317-1.522-3.667-1.689-4.051H14.4L11.19,35.046,6.9,34.757l5.092-9.515L7.327,15.726,11.7,15.5,14.6,22.941h.057l3.267-7.783,4.523-.285-5.386,10.3,5.551,10.5-4.861-.285Z" transform="translate(0 -0.328)" fill="#098212" />
                    </svg>

                    <input class="btn btn-success" onclick="exportTableToExcel('neft_report_table','NEFT')" type="submit" value="Donwnload" style="width: 150px;">
                </div>
            </div>
            <!-- Download row ends -->
            <!-- Download row ends -->
        </div>
        <!-- NEFT Choice Body Ends here -->

        <!-- Custom Report Choice Begins here-->
        <div id="Mumbai " class="w3-container city " style="display:none ">
            <!-- Site Filter for Cutson Format -->
            <div class="row " style="margin-top: 10%;margin-left: 22%; ">
                <select name="month_custom" id="month_custom" style="width: 140px; margin-left:10px; margin-right:10px">
                    <option value="All_months">All Months</option>
                    <option value="<?php echo get_current_month(); ?>">This Month</option>
                    <option value="<?php echo get_previous_month(); ?>">Previous Month</option>
                    <?php include 'reports_12month.php'; ?>
                </select>
                <select name="site_custom" id="site_custom" style="width: 140px; margin-left:10px; margin-right:10px">
                    <option value="All_sites">All Sites</option>
                    <?php
                    $result = mysqli_query($conn, $query);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["SITE_ID"] . '">' . $row["SITE_ID"] . '</option>';
                    }
                    ?>
                </select>
                <select name="designation_custom" id="designation_custom" style="width: 140px; margin-left:10px; margin-right:10px">
                    <option value="All_designations">All Designations</option>
                    <?php
                    include_once "get_month.php";
                    $result = mysqli_query($conn, $query_d);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["DESIGNATION"] . '">' . $row["DESIGNATION"] . '</option>';
                    }
                    ?>
                </select>


                <input class="btn btn-primary" id="site_button_custom" name="site_button_custom" type="submit" value="Go" style="width: 50px;">

            </div>
            <!-- Row 1 ends and 2 begins -->
            <div class="row " style="overflow-x: auto ">
                <div class="col-12 ">
                    <div style="margin-left: 1%;margin-top:5% ">
                        <!--Custom Format -->
                        <table id="custom_report_table" class="table table-striped table-primary table-hover table-bordered">
                            <th width="5%">Month</th>
                            <th width="5%">Employee ID</th>
                            <th width="5%">Site ID</th>
                            <th width="7%">Designation</th>
                            <th width="18%">Employee Name</th>
                            <th width="5%">CTC</th>
                            <th width="5%">Monthly</th>
                            <th width="3%">CL</th>
                            <th width="3%">EL</th>
                            <th width="3%">LWP</th>


                            <tbody id='tbody_custom'>
                            </tbody>
                        </table>
                        <!-- Custom Report Table Ends -->
                    </div>
                </div>
            </div>
            <!-- Row 2 ends here -->

            <!-- Download -->
            <div class="row" style="margin-top: 5%;">
                <div class="col">
                    <svg style="margin-right: 2%;" xmlns="http://www.w3.org/2000/svg" width="27.366" height="39.822" viewBox="0 0 37.366 49.822">
                        <path id="Icon_awesome-file-pdf" data-name="Icon awesome-file-pdf" d="M17.7,24.921c-.487-1.557-.477-4.564-.195-4.564C18.323,20.357,18.245,23.947,17.7,24.921Zm-.165,4.593a44.9,44.9,0,0,1-2.764,6.1,35.831,35.831,0,0,1,6.121-2.131A12.605,12.605,0,0,1,17.535,29.513ZM8.378,41.658c0,.078,1.284-.525,3.4-3.912C11.122,38.359,8.943,40.13,8.378,41.658ZM24.132,15.569H37.366V47.486a2.33,2.33,0,0,1-2.335,2.335H2.335A2.33,2.33,0,0,1,0,47.486V2.335A2.33,2.33,0,0,1,2.335,0H21.8V13.234A2.342,2.342,0,0,0,24.132,15.569Zm-.778,16.717A9.766,9.766,0,0,1,19.2,27.052c.438-1.8,1.129-4.535.6-6.247-.457-2.861-4.126-2.579-4.651-.662-.487,1.781-.039,4.291.788,7.493a91.375,91.375,0,0,1-3.97,8.349c-.01,0-.01.01-.019.01-2.637,1.353-7.162,4.33-5.3,6.617a3.024,3.024,0,0,0,2.092.973c1.742,0,3.474-1.752,5.946-6.014a55.467,55.467,0,0,1,7.687-2.258,14.747,14.747,0,0,0,6.228,1.9,2.519,2.519,0,0,0,1.917-4.223C29.163,31.664,25.232,32.043,23.354,32.287ZM36.685,10.217,27.149.681A2.334,2.334,0,0,0,25.495,0h-.584V12.455H37.366v-.594A2.328,2.328,0,0,0,36.685,10.217ZM29.475,35.06c.4-.263-.243-1.158-4.165-.876C28.92,35.722,29.475,35.06,29.475,35.06Z" fill="#ff0007" />
                    </svg>
                    <input class="btn btn-danger" onclick="generatePDF('custom_report_table','CUSTOM')" type="submit" value="Donwnload" style="width: 150px;">


                </div>
                <div class="col" style="margin-left:60%">
                    <svg style="margin-right: 2%;" xmlns="http://www.w3.org/2000/svg" width="40.748" height="39.822" viewBox="0 0 50.748 49.822">
                        <path id="Icon_simple-microsoftexcel" data-name="Icon simple-microsoftexcel" d="M49.8,6.425h-17V9.571h5.011v4.978H32.8v1.586h5.011v4.984H32.8v1.63h5.011v4.713H32.8V29.35h5.011v4.724H32.8v1.888h5.011v4.751H32.8v3.466h17c.269-.08.493-.4.672-.947a4.637,4.637,0,0,0,.273-1.345V7c0-.271-.093-.433-.273-.491A2.326,2.326,0,0,0,49.8,6.425ZM47.6,40.709H39.442V35.962H47.6v4.747Zm0-6.635H39.442V29.348H47.6Zm0-6.614H39.442V22.767H47.6V27.46Zm0-6.343H39.442V16.139H47.6v4.978Zm0-6.6H39.442V9.573H47.6v4.948ZM0,5.64V44.972L29.941,50.15V.329L0,5.657ZM17.747,35.393q-.171-.463-1.6-3.939c-.949-2.317-1.522-3.667-1.689-4.051H14.4L11.19,35.046,6.9,34.757l5.092-9.515L7.327,15.726,11.7,15.5,14.6,22.941h.057l3.267-7.783,4.523-.285-5.386,10.3,5.551,10.5-4.861-.285Z" transform="translate(0 -0.328)" fill="#098212" />
                    </svg>

                    <input class="btn btn-success" onclick="exportTableToExcel('custom_report_table','CUSTOM')" type="submit" value="Donwnload" style="width: 150px;">
                </div>
            </div>
            <!-- Download row ends -->
        </div>
        <div id="Nagpur " class="w3-container city " style="display:none ">

            <!-- Site Filter for SS NEFT Format -->
            <div class="row " style="margin-top: 10%;margin-left: 24%; ">
                <select name="site_neft_ss" id="site_neft_ss" style="width: 140px; margin-left:10px; margin-right:10px">
                    <?php
                    include_once "get_month.php";
                    $result = mysqli_query($conn, $query);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["SITE_ID"] . '">' . $row["SITE_ID"] . '</option>';
                    }
                    ?>
                </select>
                <select name="month_neft_ss" id="month_neft_ss" style="width: 140px; margin-left:10px; margin-right:10px">

                    <option value="<?php echo get_current_month(); ?>">This Month</option>
                    <option value="<?php echo get_previous_month(); ?>">Previous Month</option>
                    <?php include 'reports_12month.php'; ?>
                </select>

                <input class="btn btn-primary" id="site_button_neft_ss" name="site_button_neft_ss" type="submit" style="width: 150px;">
            </div>
            <!-- Row 1 ends and 2 begins -->
            <div class="row " style="overflow-x: auto ">
                <div class="col-12 ">
                    <div style="margin-left: 1%;margin-top:5% ">
                        <!--NEFT Format -->
                        <table id="neft_ss_report_table" class="table table-striped table-primary table-hover table-bordered">
                            <thead>
                                <th width="5%">Amount</th>
                                <th width="5%">DEBIT AC/NO</th>
                                <th width="5%">IFSC Code</th>
                                <th width="5%">BENIFICIARY A/C NO</th>
                                <th width="5%">10</th>
                                <th width="25%">BENIFICIARY NAME</th>
                                <th width="20%">PLACE</th>
                                <th width="20%">PAYMENT</th>
                                <th width="10%">REMARKS</th>
                            </thead>
                            <tbody id="tbody_neft_ss">
                            </tbody>

                        </table>
                        <!-- NEFT Table Ends -->
                    </div>
                </div>
            </div>
            <!-- Row 2 ends here -->
            <!-- Download -->
            <!-- Download -->
            <div class="row" style="margin-top: 5%;">
                <div class="col">
                    <svg style="margin-right: 2%;" xmlns="http://www.w3.org/2000/svg" width="27.366" height="39.822" viewBox="0 0 37.366 49.822">
                        <path id="Icon_awesome-file-pdf" data-name="Icon awesome-file-pdf" d="M17.7,24.921c-.487-1.557-.477-4.564-.195-4.564C18.323,20.357,18.245,23.947,17.7,24.921Zm-.165,4.593a44.9,44.9,0,0,1-2.764,6.1,35.831,35.831,0,0,1,6.121-2.131A12.605,12.605,0,0,1,17.535,29.513ZM8.378,41.658c0,.078,1.284-.525,3.4-3.912C11.122,38.359,8.943,40.13,8.378,41.658ZM24.132,15.569H37.366V47.486a2.33,2.33,0,0,1-2.335,2.335H2.335A2.33,2.33,0,0,1,0,47.486V2.335A2.33,2.33,0,0,1,2.335,0H21.8V13.234A2.342,2.342,0,0,0,24.132,15.569Zm-.778,16.717A9.766,9.766,0,0,1,19.2,27.052c.438-1.8,1.129-4.535.6-6.247-.457-2.861-4.126-2.579-4.651-.662-.487,1.781-.039,4.291.788,7.493a91.375,91.375,0,0,1-3.97,8.349c-.01,0-.01.01-.019.01-2.637,1.353-7.162,4.33-5.3,6.617a3.024,3.024,0,0,0,2.092.973c1.742,0,3.474-1.752,5.946-6.014a55.467,55.467,0,0,1,7.687-2.258,14.747,14.747,0,0,0,6.228,1.9,2.519,2.519,0,0,0,1.917-4.223C29.163,31.664,25.232,32.043,23.354,32.287ZM36.685,10.217,27.149.681A2.334,2.334,0,0,0,25.495,0h-.584V12.455H37.366v-.594A2.328,2.328,0,0,0,36.685,10.217ZM29.475,35.06c.4-.263-.243-1.158-4.165-.876C28.92,35.722,29.475,35.06,29.475,35.06Z" fill="#ff0007" />
                    </svg>
                    <input class="btn btn-danger" onclick="generatePDF('neft_ss_report_table','NEFT_ss')" type="submit" value="Donwnload" style="width: 150px;">


                </div>
                <div class="col" style="margin-left:60%">
                    <svg style="margin-right: 2%;" xmlns="http://www.w3.org/2000/svg" width="40.748" height="39.822" viewBox="0 0 50.748 49.822">
                        <path id="Icon_simple-microsoftexcel" data-name="Icon simple-microsoftexcel" d="M49.8,6.425h-17V9.571h5.011v4.978H32.8v1.586h5.011v4.984H32.8v1.63h5.011v4.713H32.8V29.35h5.011v4.724H32.8v1.888h5.011v4.751H32.8v3.466h17c.269-.08.493-.4.672-.947a4.637,4.637,0,0,0,.273-1.345V7c0-.271-.093-.433-.273-.491A2.326,2.326,0,0,0,49.8,6.425ZM47.6,40.709H39.442V35.962H47.6v4.747Zm0-6.635H39.442V29.348H47.6Zm0-6.614H39.442V22.767H47.6V27.46Zm0-6.343H39.442V16.139H47.6v4.978Zm0-6.6H39.442V9.573H47.6v4.948ZM0,5.64V44.972L29.941,50.15V.329L0,5.657ZM17.747,35.393q-.171-.463-1.6-3.939c-.949-2.317-1.522-3.667-1.689-4.051H14.4L11.19,35.046,6.9,34.757l5.092-9.515L7.327,15.726,11.7,15.5,14.6,22.941h.057l3.267-7.783,4.523-.285-5.386,10.3,5.551,10.5-4.861-.285Z" transform="translate(0 -0.328)" fill="#098212" />
                    </svg>

                    <input class="btn btn-success" onclick="exportTableToExcel('neft_ss_report_table','NEFT_ss')" type="submit" value="Donwnload" style="width: 150px;">
                </div>
            </div>
            <!-- Download row ends -->
            <!-- Download row ends -->
        </div>
        <!-- NEFT SS Choice Body Ends here -->

    </div>
    <!-- Form for pdf -->
    <form action="psc_scratch/pdf.php" method="post" id='pdf_form'>
        <input type="hidden" name="pdf_table" id="pdf_table" value="123">
        <input type="hidden" name="filename" id="filename" value="123">

    </form>
    <!-- Form for pdf ends -->
    <!-- Footer starts -->
    <!-- <nav class="navbar navbar-dark w3-blue " style="background-color: #294FCC;margin-top: 32.1%; z-index: 1; ">
        <a href="# " class="navbar-brand ">Copyright @ 2021 All rights reserved</a>
        <a href="# " class="navbar-brand " style="float: right; ">
            This portal is managed by Easy Techs
        </a>
    </nav> -->
    <!-- Footer Ends -->



    <!-- JS for sidde bar -->
    <script>
        function openCity(evt, cityName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("city ");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none ";
            }
            tablinks = document.getElementsByClassName("tablink ");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" svg-active-class w3-blue ", " svg-class ");
            }
            document.getElementById(cityName).style.display = "block ";
            evt.currentTarget.className = evt.currentTarget.className.replace(" svg-class ", " ")
            evt.currentTarget.className += " svg-active-class w3-blue ";

        }
    </script>

    <script>
        $(document).ready(function() {
            load_data_esic();
            load_data_neft();
            load_data_neft_ss();
            load_data_pf();
            //load_data_custom();

            function load_data_custom(month = '', site = '', designation = '') {
                $.ajax({
                    url: 'report_ajax_custom.php',
                    method: 'POST',
                    data: {
                        month: month,
                        site: site,
                        designation: designation
                    },
                    success: function(data) {
                        $('#tbody_custom').html(data);
                        console.log(data);
                    }
                })
            }

            function load_data_neft(month = '', site = '') {
                if (month == 'All_months') {
                    month = '';
                }
                $.ajax({
                    url: 'report_ajax_neft.php',
                    method: 'POST',
                    data: {
                        month: month,
                        site: site
                    },
                    success: function(data) {
                        $('#tbody_neft').html(data);
                    }
                })
            }

            function load_data_neft_ss(month = '', site = '') {
                if (month == 'All_months') {
                    month = '';
                }
                $.ajax({
                    url: 'report_ajax_neft_ss.php',
                    method: 'POST',
                    data: {
                        month: month,
                        site: site
                    },
                    success: function(data) {
                        $('#tbody_neft_ss').html(data);
                    }
                })
            }

            function load_data_esic(month = '', site = '') {
                $.ajax({
                    url: 'report_ajax_esic.php',
                    method: 'POST',
                    data: {
                        month: month,
                        site: site
                    },
                    success: function(data) {
                        $('#tbody_esic').html(data);
                    }
                })
            }

            function load_data_pf(month = '', site = '') {
                $.ajax({
                    url: 'report_ajax_pf.php',
                    method: 'POST',
                    data: {
                        month: month,
                        site: site
                    },
                    success: function(data) {
                        $('#tbody_pf').html(data);
                    }
                })
            }
            $('#site_button_neft').click(function() {
                var site_neft = $('#site_neft').val();
                var month_neft = $('#month_neft').val();
                load_data_neft(month_neft, site_neft);
            });

            $('#site_button_neft_ss').click(function() {
                var site_neft_ss = $('#site_neft_ss').val();
                var month_neft_ss = $('#month_neft_ss').val();
                load_data_neft_ss(month_neft_ss, site_neft_ss);
                console.log("clicked");
            });

            $('#site_button_esic').click(function() {
                var site_esic = $('#site_esic').val();
                var month_esic = $('#month_esic').val();
                load_data_esic(month_esic, site_esic);
            });

            $('#site_button_pf').click(function() {
                var site_pf = $('#site_pf').val();
                var month_pf = $('#month_pf').val();
                load_data_pf(month_pf, site_pf);
            });

            $('#site_button_custom').click(function() {
                var site_custom = $('#site_custom').val();
                var month_custom = $('#month_custom').val();
                var designation_custom = $('#designation_custom').val();
                load_data_custom(month_custom, site_custom, designation_custom);
            });
        });
    </script>


    <!-- Js for side bar ends -->
    <!--Preload Javascripts -->
    <script src="psc_scratch/xls.js"></script>
    <!-- <script src="js/1.14.3_popper.min.js">
    </script> -->
    <!-- <script src="js/bootstrap_4.1.3_bootstrap.min.js">
    </script> -->
</body>


</html>