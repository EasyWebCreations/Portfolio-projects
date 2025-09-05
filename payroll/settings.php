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
if ($_SESSION["user"] != "admin") {
    header('Location: settings_user.php');
}
include_once 'connectDB.php';
if (isset($_POST["EMP_ID"])) {
    $EMP_ID = $_POST["EMP_ID"];
    $SITE_ID = $_POST['SITE_ID'];
    $EMP_NAME = $_POST['EMP_NAME'];
    $AADHAR = $_POST['AADHAR'];
    //$PAN=$_POST['PAN'];
    $EMP_ADDRESS = $_POST['EMP_ADDRESS'];
    $EMP_MOBILE = $_POST['EMP_MOBILE'];
    $UAN_NO = $_POST['UAN_NO'];
    $ESIC_NO = $_POST['ESIC_NO'];
    $BANK_AC_NO = $_POST['BANK_AC_NO'];
    $IFSC_CODE = $_POST['IFSC_CODE'];
    $BNK_NAME = $_POST['BNK_NAME'];
    $BNK_ADDRESS = $_POST['BNK_ADDRESS'];
    $DESIGNATION = $_POST['DESIGNATION'];
    $CATEGORY = $_POST['CATEGORY'];
    $BASIC_SAL = $_POST['BASIC_SAL'];
    $HRA_SAL = $_POST['HRA_SAL'];
    $SPL_ALLOW = $_POST['SPL_ALLOW'];
    $STATUS = $_POST['STATUS'];
    include_once 'connectDB.php';
    $update_emp_sql = "UPDATE emp_details SET SITE_ID='$SITE_ID',EMP_NAME='$EMP_NAME',AADHAR='$AADHAR',EMP_ADDRESS='$EMP_ADDRESS',EMP_MOBILE='$EMP_MOBILE',UAN_NO='$UAN_NO',ESIC_NO='$ESIC_NO',BANK_AC_NO='$BANK_AC_NO',IFSC_CODE='$IFSC_CODE',BNK_NAME='$BNK_NAME',BNK_ADDRESS='$BNK_ADDRESS',DESIGNATION='$DESIGNATION',CATEGORY='$CATEGORY',BASIC_SAL='$BASIC_SAL',HRA_SAL='$HRA_SAL',ALLOW='$SPL_ALLOW',STATUS='$STATUS' WHERE EMP_ID='$EMP_ID'";
    //unset($_POST);
    // $update_emp_sql = "UPDATE `emp_details` SET `AADHAR` = 123112 WHERE `SITE_ID`='TESTSITE'";
    echo $update_emp_sql;
    if (mysqli_query($conn, $update_emp_sql)) {
        echo "<script>alert('Record Updated, Kindly refresh first');</script>";
    } else {
        echo "<script src='js/sweetalert.min.js'></script>
        <script>swal('Oh no!','Can not update the record','error');</script>";
    }

    $result_update_emp = $conn->query($update_emp_sql);
}

$sql = "SELECT * FROM  sites";
$sql_all_emp = "SELECT * FROM  emp_details ORDER BY DESIGNATION ";
$result_all_emp = $conn->query($sql_all_emp);
$result = $conn->query($sql);
$result2 = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_lib/4.1.3_bootstrap.min.css">
    <link rel="stylesheet" href="css_lib/w3css_4_w3.css">
    <link rel="stylesheet" href="settings.css">
    <script src="js/jquery_3.3.1.min.js"></script>
    <script src="js/ajax_jquery_3.5.1_jquery.min.js"></script>
    <title>Settings</title>
</head>

<body>
    <!-- Header start -->
    <nav class="navbar navbar-dark" style="position: fixed;z-index: 2; background-color: #294FCC;width: 100%;height: 70px;">
        <a class="navbar-brand" href="dashboard.php"><img src="img/logo.svg" width="60" height="30" class="d-inline-block align-top" alt="">Home</a>
    </nav>
    <!-- Header End -->

    <!-- Sidebar Menu-->
    <div class="w3-sidebar w3-bar-block w3-card " style="width:300px; position:fixed;margin-top: 4%;">
        <div class="admin-image" style="background-color: #D8DBF2; text-align: center; ">
            <img src="img/admin.svg" alt="" style="width:200px; margin:20px 45px">
            <h3 style="margin-top: -15px;color: black;"><b>Admin</b></h3>
        </div>

        <button class="w3-bar-item w3-button tablink svg-class" onclick="openCity(event, 'London ')">
            <svg class="" xmlns="http://www.w3.org/2000/svg" width="20" height="36" viewBox="0 0 30.07 36">
                <path id="Icon_simple-sitepoint" data-name="Icon simple-sitepoint" d="M3.707,15.8l2.656,2.532,8.4,7.712,3.6-3.437a1.206,1.206,0,0,0-.069-1.477l-3.306-2.853L15,18.268l-3.556-3.4a1.182,1.182,0,0,1,.031-1.618L21.06,4.137,16.719,0,3.713,12.357a2.357,2.357,0,0,0,0,3.443ZM32.291,20.2l-2.655-2.537L21.243,9.955l-3.617,3.437a1.16,1.16,0,0,0,.067,1.477L21,17.706h-.009l3.553,3.4a1.155,1.155,0,0,1-.044,1.6l-9.587,9.112L19.282,36l13-12.357a2.354,2.354,0,0,0,0-3.442l0,0Z" transform="translate(-2.965)" />
            </svg>
            Site Settings
        </button>

        <button class="w3-bar-item w3-button tablink svg-class" onclick="openCity(event, 'Paris ')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="36" viewBox="0 0 31.5 36">
                <path id="Icon_awesome-user-tie" data-name="Icon awesome-user-tie" d="M15.75,18a9,9,0,1,0-9-9A9,9,0,0,0,15.75,18Zm6.736,2.292L19.125,33.75l-2.25-9.562,2.25-3.937h-6.75l2.25,3.938-2.25,9.563L9.014,20.292A9.434,9.434,0,0,0,0,29.7v2.925A3.376,3.376,0,0,0,3.375,36h24.75A3.376,3.376,0,0,0,31.5,32.625V29.7a9.434,9.434,0,0,0-9.014-9.408Z" />
            </svg>
            Employee Settings
        </button>

        <button class="w3-bar-item w3-button tablink svg-class" onclick="openCity(event, 'Tokyo ')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="36" viewBox="0 0 31.5 36">
                <path id="Icon_awesome-unlock-alt" data-name="Icon awesome-unlock-alt" d="M28.125,18H10.688V10.751a5.063,5.063,0,1,1,10.125-.063v1.125A1.683,1.683,0,0,0,22.5,13.5h2.25a1.683,1.683,0,0,0,1.688-1.687V10.688a10.688,10.688,0,1,0-21.375.105V18H3.375A3.376,3.376,0,0,0,0,21.375v11.25A3.376,3.376,0,0,0,3.375,36h24.75A3.376,3.376,0,0,0,31.5,32.625V21.375A3.376,3.376,0,0,0,28.125,18ZM18.563,28.688a2.813,2.813,0,0,1-5.625,0V25.313a2.813,2.813,0,0,1,5.625,0Z" transform="translate(0 0)" />
            </svg>

            Change Password
        </button>

        <button class="w3-bar-item w3-button tablink svg-class" onclick="openCity(event, 'Mumbai ')">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="36" viewBox="0 0 34.992 24.494">
                <path id="Icon_awesome-money-bill-wave" data-name="Icon awesome-money-bill-wave" d="M33.962,3.478A16.191,16.191,0,0,0,27.6,2.25c-6.734,0-13.468,3.408-20.2,3.408a16.589,16.589,0,0,1-5.066-.75,1.869,1.869,0,0,0-.566-.089A1.74,1.74,0,0,0,0,6.559V23.905a1.739,1.739,0,0,0,1.03,1.611,16.182,16.182,0,0,0,6.365,1.229c6.734,0,13.469-3.409,20.2-3.409a16.589,16.589,0,0,1,5.066.75,1.87,1.87,0,0,0,.566.089,1.74,1.74,0,0,0,1.763-1.739V5.089a1.741,1.741,0,0,0-1.031-1.611ZM2.624,7.73a19.027,19.027,0,0,0,3.429.488,3.5,3.5,0,0,1-3.429,2.818Zm0,15.582V20.7a3.5,3.5,0,0,1,3.483,3.357A13.208,13.208,0,0,1,2.624,23.312ZM17.5,19.746c-2.416,0-4.374-2.35-4.374-5.249S15.08,9.248,17.5,9.248,21.87,11.6,21.87,14.5,19.911,19.746,17.5,19.746Zm14.872,1.519A18.8,18.8,0,0,0,29.4,20.8a3.492,3.492,0,0,1,2.97-2.694Zm0-12.909A3.492,3.492,0,0,1,29.316,4.99a13.143,13.143,0,0,1,3.051.692Z" transform="translate(0 -2.25)" />
            </svg>
            Salary Settings
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
        <!-- <div class="w3-padding "> Vertical Tab Example (sidebar)</div> -->

        <div id="London " class="w3-container city " style="display:none ">
            <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            </div>

            <div class="row ">
                <div class="col-9 ">
                    <div style="width: 90%;margin-left: 20%;margin-top:12% ">
                        <!-- Sites Table -->
                        <table class="table table-striped table-primary table-hover ">
                            <thead>
                                <th>Sr No</th>
                                <th>Site ID</th>
                                <th>Site Name</th>
                            </thead>
                            <tbody id="sites_view">
                                <?php
                                if ($result->num_rows > 0) {
                                    $num = 1;
                                    while ($row = $result->fetch_assoc()) {
                                ?>
                                        <tr class="table-light">
                                            <td><?= $num++; ?></td>
                                            <td><?= $row['SITE_ID']; ?></td>
                                            <td><?= $row['SITE_NAME']; ?></td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </tbody>
                            <!-- <tr class="table-light">
                            </tr> -->
                        </table>
                        <!-- Sites Table Ends -->
                    </div>
                </div>
                <!-- Add, Remove button columns here -->
                <div class="col " style="float: right;margin-top: 20%;margin-left:10% ">
                    <svg type="button" data-toggle="modal" data-target="#add_modal" class="row " id="add_svg" xmlns="http://www.w3.org/2000/svg " width="60.648 " height="60.648 " viewBox="0 0 72.648 72.648 ">
                        <path id="Icon_awesome-plus-circle " data-name="Icon awesome-plus-circle " d="M36.887.562A36.324,36.324,0,1,0,73.211,36.887,36.318,36.318,0,0,0,36.887.562ZM57.978,40.988a1.763,1.763,0,0,1-1.758,1.758H42.745V56.22a1.763,1.763,0,0,1-1.758,1.758h-8.2a1.763,1.763,0,0,1-1.758-1.758V42.745H17.553A1.763,1.763,0,0,1,15.8,40.988v-8.2a1.763,1.763,0,0,1,1.758-1.758H31.028V17.553A1.763,1.763,0,0,1,32.786,15.8h8.2a1.763,1.763,0,0,1,1.758,1.758V31.028H56.22a1.763,1.763,0,0,1,1.758,1.758Z
            " transform="translate(-0.563 -0.563) " />
                    </svg>
                    <svg type="button" data-toggle="modal" data-target="#remove_modal" class="row " id="remove_svg" xmlns="http://www.w3.org/2000/svg " width="60.648 " height="60.648 " viewBox="0 0 72.648 72.648 ">
                        <path id="Icon_awesome-minus-circle " data-name="Icon awesome-minus-circle " d="M36.887.562A36.324,36.324,0,1,0,73.211,36.887,36.318,36.318,0,0,0,36.887.562ZM17.553,42.745A1.763,1.763,0,0,1,15.8,40.988v-8.2a1.763,1.763,0,0,1,1.758-1.758H56.221a1.763,1.763,0,0,1,1.758,1.758v8.2a1.763,1.763,0,0,1-1.758,1.758Z
            " transform="translate(-0.563 -0.563) " />
                    </svg>
                </div>
                <!-- Buttons add remove column ends here -->
            </div>
            <!-- Row ends here -->


            <!-- Modal -->
            <div class="modal fade" id="add_modal" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <!-- Modal content-->
                    <div class="modal-content" style="border-radius:20px;">
                        <div style="background-color: green;border-radius: 20px; ">
                            <h4 style="text-align: center;font-weight: 700;color: azure;">Add Site</h4>
                        </div>
                        <div class="modal-body">
                            <form id="fupForm" name="form1" method="post">
                                <div class="form-group">
                                    <label>Site ID:</label>
                                    <input type="text" class="form-control" id="site_id" placeholder="Site ID" name="site_id">
                                </div>
                                <div class="form-group">
                                    <label>Site Name:</label>
                                    <input type="text" class="form-control" id="site_name" placeholder="Site Name" name="site_name">
                                </div>
                                <input type="button" name="save" class="btn btn-success" data-dismiss="modal" value="Save" id="butsave">
                                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                            </form>
                        </div>
                    </div>

                </div>
            </div>


            <div class="modal fade" id="remove_modal" role="dialog">
                <div class="modal-dialog modal-dialog-centered">

                    <!-- Modal content-->
                    <div class="modal-content" style="border-radius:20px;">
                        <div style="background-color: rgb(182, 39, 39);border-radius: 20px; ">
                            <h4 style="text-align: center;font-weight: 700;color: azure;">Remove Site</h4>
                        </div>
                        <div class="modal-body">
                            <form id="delForm" name="form1" method="post">
                                <div class="form-group">
                                    <label for="">Site ID : </label>
                                    <select type="text" class="form-control" id="site_id_to_delete" value="Site ID" name="site_id">
                                        <?php
                                        if ($result2->num_rows > 0) {
                                            $num = 1;
                                            while ($row = $result2->fetch_assoc()) { ?>
                                                <option value="<?= $row['SITE_ID']; ?>"><?= $row['SITE_NAME']; ?></option>
                                        <?php    }
                                        } else {
                                            echo "0 results";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="submit" name="save" class="btn btn-danger" data-dismiss="modal" value="Save" id="butdelete">
                                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Choice 1 ends -->

        <!-- Choice 2 of sidebar begins -->
        <div id="Paris " class="w3-container city " style="display:none ">
            <!-- Row for search bar and button -->
            <div class="row " style="margin-top: 15vh;margin-left: 39%; ">
                <img src="./img/search.gif" style="width: 25px;margin-right: 2%;" alt="">

                <input type="search" id="empSearchInput" onkeyup="searchEmp()" placeholder="Search for names.." title="Type in a name" autocomplete="off">

            </div>

            <!-- Row for table -->
            <div class="row " style="width: 70%;margin-left:15%;margin-top: 5%; ">
                <table class="table  table-primary table-hover " id="empTable">
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Designation</th>
                    <?php
                    //$rows = $result_all_emp->fetch_assoc();
                    if ($result_all_emp->num_rows > 0) {
                        $num = 1;
                        while ($row = $result_all_emp->fetch_assoc()) {
                    ?>
                            <tr class="table-light">
                                <td data-toggle="modal" data-target=<?= '#' . $row['PAN']; ?>>
                                    <?= $row['FIRM'] . '_' . $row['EMP_ID']; ?></td>
                                <td data-toggle="modal" data-target=<?= '#' . $row['PAN']; ?>><?= $row['EMP_NAME']; ?></td>
                                <td data-toggle="modal" data-target=<?= '#' . $row['PAN']; ?>><?= $row['DESIGNATION']; ?></td>
                                <td><button onclick="delEmp(<?= $row['EMP_ID']; ?>)">
                                        Delete
                                    </button>

                                </td>

                            </tr>
                            <!-- Modal begin -->
                            <div class="modal fade" id=<?= (string)$row['PAN']; ?> role="dialog">
                                <div class="modal-dialog modal-dialog-centered">

                                    <!-- Modal content-->
                                    <div class="modal-content" style="border-radius:20px;">
                                        <div style="background-color: green;border-radius: 20px; ">
                                            <h4 style="text-align: center;font-weight: 700;color: azure; ">Update Employee
                                                Details</h4>
                                        </div>
                                        <div class="modal-body" style="margin:10px;border: 5px solid #646561;border-radius: 30px; ">
                                            <?php
                                            include "modal.php";

                                            ?>
                                            <!-- Vedangi's code ends -->
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Modal Ends -->
                    <?php
                        }
                    } else {
                        echo "0 results";
                    }

                    ?>

                </table>
                <!-- Table Ends -->
            </div>
        </div>
        <!-- Choice 2 of sidebar ends-->

        <!-- Choice 3 of sidebar begins -->
        <div id="Tokyo " class="w3-container city " style="display:none ">
            <div class="alert alert-success alert-dismissible" id="success_pass_change" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            </div>
            <h2 class="change-pass-head "> </h2>
            <div class="change-pass-form ">
                <div class="mb-4 row ">
                    <label for="inputPassword " class="col-sm-4 col-form-label ">Old Password :</label>
                    <div class="col-sm-4 ">
                        <input type="password" class="form-control " id="inputPasswordOld">
                    </div>
                </div>
                <div class="mb-3 row ">
                    <label for="inputPassword " class="col-sm-4 col-form-label ">New Password :</label>
                    <div class="col-sm-4 ">
                        <input type="password" class="form-control " id="inputPasswordNew">
                    </div>
                </div>
                <div class="mb-3 row ">
                    <label for="inputPassword " class="col-sm-4 col-form-label ">Re-enter New Password :</label>
                    <div class="col-sm-4 ">
                        <input type="password" class="form-control " id="inputPasswordConfirm">
                    </div>
                </div>
                <div class="mb-3 row ">
                    <div class="col-sm-10 ">
                        <input type="submit" style="float: right; " class="btn btn-success mb-3" id="change_pass_btn" value="Save Changes">
                    </div>
                </div>
            </div>

        </div>

        <!-- Salary Settings Choice 4 -->
        <div id="Mumbai " class="w3-container city " style="display:none ">
            <div class="alert alert-success alert-dismissible" id="sal_success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            </div>

            <div class="row ">
                <div class="col-9 ">
                    <div style="width: 90%;margin-left: 15%;margin-top:12% ">
                        <!-- Sites Table -->
                        <table class="table table-striped table-primary table-hover ">
                            <thead>
                                <th>Sr No</th>
                                <th>Designation</th>
                                <th>Basic Pay</th>
                                <th>Special Allowance</th>
                                <th>HRA</th>
                                <th>CTC</th>
                            </thead>
                            <tbody id="sites_view">
                                <?php
                                include_once 'connectDB.php';
                                $sql_sal_profile = 'SELECT * from sal_profile';
                                $result_sal_profile = $conn->query($sql_sal_profile);
                                if ($result_sal_profile->num_rows > 0) {
                                    $num = 1;
                                    while ($row = $result_sal_profile->fetch_assoc()) {
                                ?>
                                        <tr class="table-light">
                                            <td><?= $num++; ?></td>
                                            <td><?= $row['DESIGNATION']; ?></td>
                                            <td><?= $row['BASIC']; ?></td>
                                            <td><?= $row['SPL_PAY']; ?></td>
                                            <td><?= $row['HRA']; ?></td>
                                            <td><?= $row['CTC']; ?></td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </tbody>
                            <!-- <tr class="table-light">
                            </tr> -->
                        </table>
                        <!-- Sites Table Ends -->
                    </div>
                </div>
                <!-- Add, Remove button columns here -->
                <div class="col " style="float: right;margin-top: 20%;margin-left:10% ">
                    <svg type="button" data-toggle="modal" data-target="#add_sal_modal" class="row " id="add_svg" xmlns="http://www.w3.org/2000/svg " width="60.648 " height="60.648 " viewBox="0 0 72.648 72.648 ">
                        <path id="Icon_awesome-plus-circle " data-name="Icon awesome-plus-circle " d="M36.887.562A36.324,36.324,0,1,0,73.211,36.887,36.318,36.318,0,0,0,36.887.562ZM57.978,40.988a1.763,1.763,0,0,1-1.758,1.758H42.745V56.22a1.763,1.763,0,0,1-1.758,1.758h-8.2a1.763,1.763,0,0,1-1.758-1.758V42.745H17.553A1.763,1.763,0,0,1,15.8,40.988v-8.2a1.763,1.763,0,0,1,1.758-1.758H31.028V17.553A1.763,1.763,0,0,1,32.786,15.8h8.2a1.763,1.763,0,0,1,1.758,1.758V31.028H56.22a1.763,1.763,0,0,1,1.758,1.758Z
            " transform="translate(-0.563 -0.563) " />
                    </svg>
                    <svg type="button" data-toggle="modal" data-target="#remove_sal_modal" class="row " id="remove_svg" xmlns="http://www.w3.org/2000/svg " width="60.648 " height="60.648 " viewBox="0 0 72.648 72.648 ">
                        <path id="Icon_awesome-minus-circle " data-name="Icon awesome-minus-circle " d="M36.887.562A36.324,36.324,0,1,0,73.211,36.887,36.318,36.318,0,0,0,36.887.562ZM17.553,42.745A1.763,1.763,0,0,1,15.8,40.988v-8.2a1.763,1.763,0,0,1,1.758-1.758H56.221a1.763,1.763,0,0,1,1.758,1.758v8.2a1.763,1.763,0,0,1-1.758,1.758Z
            " transform="translate(-0.563 -0.563) " />
                    </svg>
                </div>
                <!-- Buttons add remove column ends here -->
            </div>
            <!-- Row ends here -->


            <!-- Modal -->
            <div class="modal fade" id="add_sal_modal" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <!-- Modal content-->
                    <div class="modal-content" style="border-radius:20px;">
                        <div style="background-color: green;border-radius: 20px; ">
                            <h4 style="text-align: center;font-weight: 700;color: azure;">Add Salary Profile</h4>
                        </div>
                        <div class="modal-body">
                            <form id="salupForm" name="form1" method="post">
                                <div class="form-group">
                                    <label>Designation:</label>
                                    <input type="text" class="form-control" id="sal_designation" placeholder="Designation" name="sal_designation">
                                </div>
                                <div class="form-group">
                                    <label>Basic Pay:</label>
                                    <input type="text" class="form-control" id="sal_basic_pay" placeholder="Basic Pay" name="sal_basic_pay">
                                </div>
                                <div class="form-group">
                                    <label>Special Allowance:</label>
                                    <input type="text" class="form-control" id="sal_spl_pay" placeholder="Special Allownace" name="sal_spl_pay">
                                </div>
                                <div class="form-group">
                                    <label>HRA:</label>
                                    <input type="text" class="form-control" id="sal_hra" placeholder="HRA" name="sal_hra">
                                </div>
                                <div class="form-group">
                                    <label>CTC:</label>
                                    <input type="text" class="form-control" id="sal_ctc" placeholder="CTC" name="sal_ctc">
                                </div>
                                <input type="button" name="save" class="btn btn-success" data-dismiss="modal" value="Save" id="sal_butsave">
                                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                            </form>
                        </div>
                    </div>

                </div>
            </div>


            <div class="modal fade" id="remove_sal_modal" role="dialog">
                <div class="modal-dialog modal-dialog-centered">

                    <!-- Modal content-->
                    <div class="modal-content" style="border-radius:20px;">
                        <div style="background-color: rgb(182, 39, 39);border-radius: 20px; ">
                            <h4 style="text-align: center;font-weight: 700;color: azure;">Remove Salary Profile</h4>
                        </div>
                        <div class="modal-body">
                            <form id="sal_profile_del" name="form1" method="post">
                                <div class="form-group">
                                    <label for="">Site ID : </label>
                                    <select type="text" class="form-control" id="sal_desg_to_delete" value="Designation" name="sal_designation">
                                        <?php
                                        include "connectDB.php";
                                        $sql_sal_profile = 'SELECT * from sal_profile';
                                        $result_sal_profile = $conn->query($sql_sal_profile);

                                        if ($result_sal_profile->num_rows > 0) {
                                            $num = 1;
                                            while ($row = $result_sal_profile->fetch_assoc()) { ?>
                                                <option value="<?= $row['DESIGNATION']; ?>"><?= $row['DESIGNATION']; ?></option>
                                        <?php    }
                                        } else {
                                            echo "0 results";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="submit" name="save" class="btn btn-danger" data-dismiss="modal" value="Save" id="sal_butdelete">
                                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- Footer starts -->
    <!-- <nav class="navbar navbar-dark w3-blue " style="background-color: #294FCC;margin-top: 32.1%; z-index: 1; ">
        <a href="# " class="navbar-brand ">Copyright @ 2021 All rights reserved</a>
        <a href="# " class="navbar-brand " style="float: right; ">
            This portal is managed by Easy Techs
        </a>
    </nav> -->
    <!-- Footer Ends -->
    <script src="js/sweetalert.min.js"></script>
    <script>
        function searchEmp() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("empSearchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("empTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }

            }
        }

        function delEmp(empId) {
            swal({
                    title: "Are you sure?",
                    text: "Employee Data of ID " + empId + " will be deleted forever!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "delEmp.php",
                            type: "POST",
                            data: {
                                empId: empId
                            },
                            cache: false,
                            success: function(Result) {
                                if (Result == 1) {
                                    swal("Operation Result",
                                        "Employee " + empId + " Deleted Successfully!", "success").then(
                                        (a) => {
                                            if (a) {
                                                location.reload();
                                            }
                                        });
                                } else {
                                    swal("Sorry", "Could not delete the user. Please retry", "error");
                                }

                            }
                        });
                    }
                });



        }
        let sal_butdelete = document.getElementById("sal_butdelete");
        sal_butdelete.addEventListener('click', () => {
            var sal_designation = $('#sal_desg_to_delete').val();
            if (sal_designation != "") {
                $.ajax({
                    url: "del_sal_profile.php",
                    type: "POST",
                    data: {
                        sal_designation: sal_designation,
                    },

                    cache: false,
                    success: function(dataResult) {
                        console.log(dataResult);
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            //$("#butsave").removeAttr("disabled");
                            $('#salupForm').find('input:text').val('');
                            $("#sal_success").show();
                            $('#sal_success').html(
                                'Salary Profile Removed successfully, refresh once to view!');
                        } else if (dataResult.statusCode == 201) {
                            alert("Error occured! Refresh an try again");
                        }

                    }
                });
            } else {
                alert('Please fill all the field !');
            }

        });


        let sal_butsave = document.getElementById("sal_butsave");
        sal_butsave.addEventListener('click', () => {
            var sal_designation = $('#sal_designation').val();
            var sal_basic_pay = $('#sal_basic_pay').val();
            var sal_spl_pay = $('#sal_spl_pay').val();
            var sal_hra = $('#sal_hra').val();
            var sal_ctc = $('#sal_ctc').val();
            if (sal_designation != "") {
                $.ajax({
                    url: "save_sal_profile.php",
                    type: "POST",
                    data: {
                        sal_designation: sal_designation,
                        sal_basic_pay: sal_basic_pay,
                        sal_spl_pay: sal_spl_pay,
                        sal_hra: sal_hra,
                        sal_ctc: sal_ctc,
                    },

                    cache: false,
                    success: function(dataResult) {
                        console.log(dataResult);
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            //$("#butsave").removeAttr("disabled");
                            $('#salupForm').find('input:text').val('');
                            $("#sal_success").show();
                            $('#sal_success').html('Profile added successfully, refresh once to view!');
                        } else if (dataResult.statusCode == 201) {
                            alert("Error occured! Refresh an try again");
                        }

                    }
                });
            } else {
                alert('Please fill all the field !');
            }
        });



        let pass_btn = document.getElementById("change_pass_btn");
        pass_btn.addEventListener('click', () => {
            let oldPass = $("#inputPasswordOld").val();
            let newPass = $("#inputPasswordNew").val();
            let confPass = $("#inputPasswordConfirm").val();
            console.log(confPass);
            if (confPass == newPass) {
                $.ajax({
                    url: "changePass.php",
                    type: "POST",
                    //cache = false,
                    data: {
                        oldPass: oldPass,
                        //newPass: newPass,
                        confPass: confPass
                    },
                    success: function(dataResult) {
                        console.log(dataResult);
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            //$("#butsave").removeAttr("disabled");
                            //$('#fupForm').find('input:text').val('');
                            $("#success_pass_change").show();
                            $('#success_pass_change').html('Password changed successfully');
                            setInterval(function() {
                                $("#success_pass_change").hide();
                            }, 2000);
                        } else if (dataResult.statusCode == 201) {
                            alert("Please Enter a correct Password");
                        }

                    }

                });
            } else {
                alert("New passwords do not match");
                $('#fupForm').find('input:text').val('')
            }

        });


        let delForm = document.getElementById("butdelete");
        delForm.addEventListener('click', () => {
            alert("Site will be deleted permanantly!");
            let siteID = $('#site_id_to_delete').val();
            console.log(siteID)
            $.ajax({
                url: "deleteSite.php",
                type: "POST",
                data: {
                    siteID: siteID
                },
                success: function(dataResult) {
                    console.log(dataResult);
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        //$("#butsave").removeAttr("disabled");
                        //$('#fupForm').find('input:text').val('');
                        $("#success").show();
                        $('#success').html('Site Removed successfully, refresh once to view!');
                    } else if (dataResult.statusCode == 201) {
                        alert("Error occured! Refresh an try again");
                    }

                }

            });
        });


        $(document).ready(function() {
            $('#butsave').on('click', function() {
                //$("#butsave").attr("disabled", "disabled");
                var siteId = $('#site_id').val();
                var siteName = $('#site_name').val();
                if (siteId != "" && siteName != "") {
                    //siteId = JSON.stringify(siteId);
                    //siteName = JSON.stringify(siteName);
                    $.ajax({
                        url: "save_site.php",
                        type: "POST",
                        data: {
                            siteId: siteId,
                            siteName: siteName,
                        },

                        cache: false,
                        success: function(dataResult) {
                            console.log(dataResult);
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                //$("#butsave").removeAttr("disabled");
                                $('#fupForm').find('input:text').val('');
                                $("#success").show();
                                $('#success').html(
                                    'Site added successfully, refresh once to view!');
                            } else if (dataResult.statusCode == 201) {
                                alert("Error occured! Refresh an try again");
                            }

                        }
                    });
                } else {
                    alert('Please fill all the field !');
                }
            });

        });
    </script>

    <!-- JS for sidde bar -->
    <script>
        openCity(event, 'Paris ');

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
        //var myModal = document.getElementById('myModal')
        //var myInput = document.getElementById('myInput')

        //        myModal.addEventListener('shown.bs.modal', function() {
        //          myInput.focus()
        //    })
    </script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);

        }
    </script>
    <!-- Js for side bar ends -->
    <!--Preload Javascripts -->


    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js "
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49 " crossorigin="anonymous ">
    </script> -->
    <script src="js/bootstrap_4.1.3_bootstrap.min.js ">
    </script>
</body>

</html>