<?php

session_start();
include_once "conn.php";
if (!isset($_SESSION['email'])) {
   header("location: ../index1.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-v4-rtl/4.6.0-2/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    * {
        margin: 0px;
        padding: 0px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        box-sizing: border-box;
    }

    .head {
        display: flex;
        border: 1px solid #707070;
        line-height: 70px;
        background-color: white;
    }

    .head .logo a {
        text-decoration: none;
        color: #707070;
        font-size: 35px;
        margin-left: 90px;
        font-weight: 300;
    }

    .row {
        margin: 0px;
    }

    .head .cos_name a {
        text-decoration: none;
        color: #707070;
        font-weight: 100;
        font-size: 28px;
        margin-left: 300px;
    }

    .container h5 {
        line-height: 50px;
        margin-top: -1rem;
    }

    .nav1 {
        border-bottom: 1px solid #EAEAEB;
        text-align: right;
        height: 50px;
        margin-top: -5rem;
        line-height: 50px;
    }

    .menu {
        margin: 0 30px 0 0;
    }

    .menu a {
        clear: right;
        text-decoration: none;
        color: gray;
        margin: 0 10px;
        line-height: 50px;
    }

    .menu img {
        margin-top: -2rem;
    }

    .logo {
        margin-top: -10px;
    }

    nav span {
        color: white;

    }

    select {
        color: #000000;
    }

    .nav_item {
        margin-top: -2rem;
        color: white;

    }

    .hidnot {
        visibility: hidden;
    }

    .navbar {
        line-height: 35px;
        position: fixed;
        width: 100%;
        z-index: 10000;
    }

    /*label {
    margin: 0 40px 0 0;
    font-size: 26px;
    line-height: 70px;
    display: none;
    width: 26px;
    float: right;
}*/
    #toggle {
        display: none;
    }

    .hide2 {
        visibility: hidden;
    }

    .navbar-brand>img {
        display: block;
        margin-top: -40px;
    }

    nav .container-fluid {
        height: 80px;
    }

    @media screen and (max-width:550px) {

        #pay,
        #cashForm {
            width: 200px;
            height: 40px;
            margin: auto auto 30px 60px;
            background: #4e73ff;
            color: white;
            border: none;
            outline: none;
        }

        .col-md-7 #plan1 {
            margin-top: 0px !important;
            display: block !important;
        }

        .col-md-7 #plan2 {
            margin-top: -20px !important;
            display: block !important;
        }

        nav .container-fluid {
            height: 100% !important;
        }

        nav {
            line-height: 20px !important;
            position: fixed !important;
            width: 99%;
            top: 0px;
        }

        .navbar-nav>li>a {
            padding-top: 20px;
            padding-bottom: 10px;
            line-height: 23px;
        }

        .head .cos_name {
            display: none;
        }

        .head {
            width: 100%;
        }

        .top,
        .input1,
        .input2 {
            margin: 30px 10px 0px 15px !important;
        }

        .plan_body {
            padding: 10px !important;
        }

        .col-md-7 .plan .plan_name {
            font-size: 20px !important;
            text-align: left;
        }

        .col-md-7 .cost .rate {
            font-size: 20px !important;
        }

        .details .de_name .coupon-name input {
            font-size: 18px !important;
            width: 160px !important;
        }

        .grand_amount {
            margin-bottom: 50px !important;
        }

        .cos_rate .customer .cos_name {
            font-size: 18px !important;
            margin-left: 10px !important;
        }

        .cos_rate .customer .duration_pre {
            font-size: 15px !important;
            margin-left: 8px !important;
        }

        .cos_rate .cost {
            margin-right: 15px !important;
        }

        .cos_rate .cost s {
            margin-right: -20px !important;
        }

        .col-md-3 .title {
            margin: 30px auto 30px 40px !important;
        }

        .col-md-3 {
            margin-bottom: 100px !important;
            margin: 60px 0px auto 0px !important;
        }
    }

    .plan_body {
        display: flex;
        justify-content: space-between;
        margin-bottom: 50px;
        padding: 30px;
        border-bottom: 1px solid darkgray;
    }

    .top {
        padding: 0px;
        border: 1px solid #707070;
        margin: 60px 30px auto 60px;
        background-color: white;
        text-align: center;
    }

    .col-md-7 a {
        color: #18BC70;
        text-transform: capitalize;
        text-decoration: none;
        margin-left: 20px;
        font-weight: 900;
    }

    .col-md-7 .plan .plan_name {
        color: #3B67E2;
        font-size: 25px;
        font-weight: 900;
        padding-bottom: 15px;
    }

    .col-md-7 .plan .plan_name label {
        margin-left: 30px;
        font-size: 20px;
    }

    .col-md-7 .plan .duration {
        color: #707070;
        font-weight: 800;
        text-align: left;
        margin-left: 40px;
    }

    body {
        background-color: #F7F5F5;
    }

    .col-md-7 .cost .rate {
        color: #707070;
        font-size: 20px;
        font-weight: 900;
        /* margin-left: 50%; */
        padding-bottom: 15px;
    }

    .col-md-7 .cost .coupon .cou_name {
        color: #18BC70;
        font-weight: 800;
    }

    .col-md-7 .cost .coupon .cou_name s {
        margin-left: 30px;
        font-weight: 100;
    }

    .cos_rate {
        display: flex;
        justify-content: space-between;
        /*border-bottom: 1px solid #707070;*/
        border-top: 1px solid #707070;
        margin-top: 0px;
    }

    .cos_rate .customer .cos_name {
        font-size: 20px;
        text-align: left;
        padding: 20px 0px 3px 0px;
        margin-left: 20px;
    }

    .cos_rate .customer .duration_pre a {
        color: #707070;
    }

    .cos_rate .customer .duration_pre {
        padding-bottom: 20px;
        margin-left: 20px;
    }

    .cos_rate .cost {
        padding: 20px 0px 0px 0px;
        font-size: 20px;
        color: #707070;
        font-weight: 900;
        margin-right: 25px !important;
    }

    .cos_rate .cost s {
        color: black;
        font-weight: 100;
        font-size: initial;
        margin-right: 20px;
    }

    #cos_iss {
        margin-top: 30px;
    }

    .input1,
    .input2 {
        border: 1px solid #707070;
        margin: 20px 30px auto 60px;
        background-color: white;
        font-size: 25px;
        padding: 20px;
    }

    .paymode label a {
        color: #3D4B45 !important;
        font-size: 20px;
    }

    .payment h1 {
        margin: 20px 30px auto 60px;
        font-size: 25px;
        color: #3B67E2;
    }

    .col-md-3 {
        padding: 0px;
        border: 1px solid #707070;
        margin: 60px -50px auto 100px;
        background-color: white;
    }

    .col-md-3 .title {
        text-align: center;
        color: #3D4B45;
        background-color: #F0F0F0;
        width: fit-content;
        padding: 20px 30px;
        margin: 30px auto 30px 70px;
    }

    .col-md-3 .details {
        display: flex;
        justify-content: space-between;
        padding: 20px;
        color: #3D4B45;
        margin-top: -30px;
    }

    .col-md-3 .details .price {
        text-align: right;
    }

    .col-md-3 p {
        margin: 0px;
    }

    .details .de_name .coupon-name input {
        line-height: 30px;
        margin-top: 30px;
        border: 2px solid #0FC972;
        border-radius: 5px;
        padding: 10px;
        font-size: 20px;
        outline: none;
        width: 190px;
    }

    .details .price .coupon-apply button {
        background-color: #47E29A;
        line-height: 45px;
        margin-top: 30px;
        border: 1px solid #707070;
        color: white;
        padding: 1px 30px;
        font-size: 20px;
        cursor: pointer;
    }

    .details .price .coupon-apply button:hover {
        background-color: #18BC70;
    }

    .grand_amount {
        display: flex;
        justify-content: space-around;
        color: #3D4B45;
        border-top: 1px dashed #707070;
        border-bottom: 1px dashed #707070;
        margin-bottom: 30px;
    }

    .grand_amount .grand {
        font-size: 22px;
        padding: 15px;
    }

    .grand_amount .grandamt {
        font-size: 22px;
        padding: 15px;
    }

    .row {
        padding-top: 60px;
    }

    .col-md-7 #plan2 {
        margin-top: -60px;
    }

    .col-md-7 #plan1 {
        margin-top: -20px;
    }

    .col-md-7 #change_plan {
        margin: -20px 0px;
        line-height: 20px;
        padding-bottom: 20px;
    }

    #pay,
    #cashForm {
        width: 200px;
        height: 40px;
        margin: -20px auto 10px 80px;
        background: #4e73ff;
        color: white;
        text-align: center;
        border: none;
        outline: none;
        display: block;
    }

    #cashForm {
        display: none;
    }

    #pay:hover,
    #cashForm:hover {
        background: #4433ff;
        cursor: pointer;
    }

    #pay a {
        text-decoration: none;
    }

    #scanRediect {
        text-align: center;
        text-decoration: none;
    }

    #scanRediect:hover {
        cursor: pointer;
    }
    </style>
</head>

<body>
    <!-- nav bar -->
    <nav class="navbar navbar-inverse" style="background-color: #200116;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="../../images/Logo.png" alt="not found" width="160" height="110" class="logo"></a>
            </div>
            <a href="#"><img src="images/not.png" width="25" height="25" alt="" class="hidnot"></a>
            <a href="#"><img src="images/search.png" width="25" height="25" alt="" class="hidnot hid1"></a>
            <div class="collapse navbar-collapse" id="myNavbar">

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../../index.php" class="nav_item"><span class="glyphicon glyphicon-home"></span>
                            Home</a></li>
                    <li><a href="../../index.php#about" class="nav_item"><span
                                class="glyphicon glyphicon-info-sign"></span> About us</a></li>
                    <li><a href="../../index.php#eventsSection" class="nav_item"><span
                                class="glyphicon glyphicon-calendar"></span> Events</a></li>
                    <li><a href="../../index.php#contactusportion" class="nav_item"><span
                                class="glyphicon glyphicon-phone"></span> Contact</a></li>
                    <!-- <li><a href="../../index.php#" class="nav_item"><span class="glyphicon glyphicon-user"></span> Youth</a></li> -->
                </ul>

            </div>
        </div>
    </nav>
    <!-- nav bar ends -->
    <?php

$useremail = $_SESSION['email'];
$sql = "SELECT * FROM `per_details` WHERE  `email` = '{$useremail}'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
  ?>

    <?php
                $paymentMethod = "SELECT `payment_transation` FROM `per_details` WHERE `id` = '11111'";
                $mehtodrun = mysqli_query($conn, $paymentMethod);
                $row21 = mysqli_fetch_assoc($mehtodrun);
                $result = $row21['payment_transation'];
                $dis = "";
                $dis1 = "";
                $extraT = "";
                $paymentAction = "";
                if($result == 'txn'){
                    $dis = "none";
                    $dis1 = "block";
                }else{
                    $dis1 = "none";
                    $extraT = "hidden";
                    $dis = "block";
                    if($result == "payU"){
                        $paymentAction = "sendpaydetails.php";
                    }else{
                        $paymentAction = "./PaytmKit/TxnTest.php";
                    }
                }
?>

    <form action="<?php echo $paymentAction?>" name="paymentForm" method="post" id="paymentForm">
        <div class="row">
            <div class="col-md-7">
                <div class="top" id="planName">
                    <div class="plan_body" id="plan1">
                        <div class="plan">
                            <div class="plan_name" onclick="hideLinkOne()">
                                <input type="radio" value="6" name="plan" id="plan_1"><label for="plan_1">Premium 1 day
                                    Plan</label>
                            </div>
                            <div class="duration">
                                1 days
                            </div>
                        </div>
                        <div class="cost">
                            <div class="rate">
                                ₹20/mon
                            </div>
                            <div class="coupon">
                                <div class="cou_name">
                                    <!-- 10% coupon applied -->

                                    <s style="color: #3D4B45;">₹50/mon</s>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="plan_body" id="plan2">
                        <div class="plan">
                            <div class="plan_name" onclick="hideLinkTwo()">
                                <input type="radio" value="12" checked="checked" name="plan" id="plan_2"><label
                                    for="plan_2">Premium 2 days Plan</label>
                            </div>
                            <div class="duration">
                                2 days
                            </div>
                        </div>
                        <div class="cost">
                            <div class="rate">
                                ₹40/mon
                            </div>
                            <div class="coupon">
                                <div class="cou_name">
                                    <!-- 10% coupon applied -->

                                    <s style="color: #3D4B45;">₹70/mon</s>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p id="change_plan">Do you want to change your plan to 2 days?<label onclick="plantwo()"
                            for="plan_2"><a>change</a></label></p><br>
                    <!--div class="cos_rate" id="cos_iss">
            <div class="customer">
                
                <div class="cos_name">
                    Karthik Subbaraj
                </div>
                <div class="duration_pre">
                    Premium 3 months <a href="#">Remove</a>
                </div>
            </div>
            <div class="cost">
              $18/mon <br> <s>$26.00/mon</s>
            </div>
            </div>
            <div class="cos_rate">
                <div class="customer">
                    <div class="cos_name">
                        Manivannan Rajarathinam
                    </div>
                    <div class="duration_pre">
                        Premium 3 months <a href="#">Remove</a>
                    </div>
                </div>
                <div class="cost">
                  $18/mon <br> <s>$26.00/mon</s>
                </div>
                </div-->
                </div>
                <div class="payment" id="paymentMethods">
                    <h1>Payment Methods</h1>
                    <div class="paymode">
                        <div class="input1"><input type="radio" checked="checked" name="payment" id="online"
                                value="online"><label for="online"><a>Online Payment</a></label></div><br>
                        <div class="input2"><input type="radio" name="payment" id="cash" value="cash"><label
                                for="cash"><a>By Cash </a></label></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="title">
                    Order Summary - #<?php $orderid = mt_rand(1000000,9999999); echo $orderid; ?> <br><br>
                    <p>User Name: <?php echo $row['fname']." ".$row['lname'] ?></p>
                    <p>User ID:<?php echo $row['id']; ?></p>
                </div>
                <div class="details">
                    <div class="de_name">
                        <p>Plan</p><br>
                        <p>Price</p><br>
                        <p>Billig cycle</p><br>
                        <p>Next Billing Date</p><br>
                        <p>No of addons</p>
                        <div class="coupon-name">
                            <input type="text" style="text-transform:uppercase" name="coupon" id="coupon"
                                placeholder="Apply Coupon">
                        </div><br>
                        <div class="total">
                            <p>Total Amount</p> <br>
                            <p>Coupon Applied </p>
                        </div>
                    </div>
                    <?php
$oneYearOn = date('d M Y',strtotime(date('Y-m-d', time()) . ' + 2 days'));

$date1 = new DateTime($oneYearOn);
$date2 = new DateTime(date('d M Y',strtotime(date('Y-m-d', time()))));

if($date1>$date2){
    $test =  "success";
}else{
    $test =  "false";
}
                ?>
                    <div class="price">
                        <p>classic <?php  echo $test; ?></p><br>
                        <p id="planPrice">₹40.00 </p><br>
                        <p id="planCycle">yearly</p><br>
                        <p id="planValidity"><?php  echo $oneYearOn; ?></p><br>
                        <input type="hidden" name="Validity" id="planValidityLast" value="<?php echo $oneYearOn;?>">
                        <p>1</p>
                        <div class="coupon-apply">
                            <button type="button" id="couponBtn">Apply</button>
                        </div><br>
                        <div class="totalamt">
                            <p id="planPrice1">₹40.00</p><br>
                            <p id="couponPrice">-
                                <input type="number" name="couponRate" value='0' id="couponRate" hidden>
                            </p>
                            <input type="hidden" name="planValue" id="planValue" value="premium">
                            <p id="planRateValue"><input type="number" id="planRate" name="planRate" value='40' hidden>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="grand_amount">
                    <div class="grand">
                        <b>Grand Total</b>
                    </div>
                    <div class="grandamt">
                        <b id="grandTotal">₹40.00</b>
                    </div>
                </div>

                <div id="scanRediect" <?php echo $extraT ?> style="display:<?php echo $dis1; ?>"> <a
                        href="./scan.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['fname'] ." ".$row['lname']?>&plan=premium"><input
                            id="pay" value="Pay Now"></input></a></div>
                <div id="scanRediect1" <?php echo $extraT ?> style="display:none" style="display:<?php echo $dis1; ?>"
                    style="display:none"> <a
                        href="./scan.php?id=<?php echo $row['id'] ?>&name=<?php echo $row['fname'] ." ".$row['lname']?>&plan=classic"><input
                            id="pay" value="Pay Now"></input></a></div>
                <div> <input type="submit" style="display:<?php echo $dis; ?>" id="pay" value="Pay Now"></input></div>
                <div> <input type="button" id="cashForm" value="Fill Form"></input></div>
            </div>
        </div>
        <?php

$MERCHANT_KEY = "FAdIOw";
$SALT = "l4BuaAiHdmeLWwVuSoY8ltxwZBLBashw";

$txnid = "Txn" . rand(10000,99999999);

?>
        <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY;?>">
        <input type="hidden" name="txnid" value="<?php echo $txnid;?>">
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
        <input type="hidden" name="productinfo" id="productinfo" value="<?php echo $oneYearOn;?>" />
        <input type="hidden" name="amount" value="1111" id="GrandTotalValue" />
        <input type="hidden" name="email" id="email" value="<?php echo $row['email'];?>" />
        <input type="hidden" name="firstname" id="fname" value="<?php echo $row['fname'];?>" />
        <input type="hidden" name="lastname" id="lname" value="<?php echo $row['lname'];?>" />
        <input type="hidden" name="surl" id="surl"
            value="https://projects.iampratham29.com/matrimony/harsh1/premium/success.php" />
        <input type="hidden" name="furl" id="furl"
            value="https://projects.iampratham29.com/matrimony/harsh1/premium/fail.php" />
        <input type="hidden" name="service_provider" value="payu_paisa" />
        <input type="hidden" name="phone" id="phone" value="<?php echo $row['mobile'];?>" />

    </form>
    <script>
    var paymentLink1 = document.getElementById('scanRediect');
    var paymentLink2 = document.getElementById('scanRediect1');
    var planValue = document.getElementById("planValue");

    function hideLinkOne() {
        paymentLink1.style.display = 'none';
        paymentLink2.style.display = '<?php echo $dis1 ?>';
        planValue.value = "classic";
    }

    function hideLinkTwo() {
        paymentLink2.style.display = 'none';
        paymentLink1.style.display = '<?php echo $dis1 ?>';
        planValue.value = "premium";
    }
    </script>
    <script>
    var planRate = document.getElementById('planRate');
    //var couponRate = document.getElementById('couponRate');
    var planValidityLast = document.getElementById('planValidityLast');

    function planone() {
        planRate.value = '20';
        planValidityLast.value = '<?php
$halfYearOn = date('d M Y',strtotime(date('Y-m-d', time()) . ' + 1 days'));
echo $halfYearOn;
                ?>';
    }

    function plantwo() {
        planRate.value = '40';
        planValidityLast.value = '<?php
$oneYearOn = date('d M Y',strtotime(date('Y-m-d', time()) . ' + 2 days'));
echo $oneYearOn;
                ?>';
    }
    </script>



    <!--script>

var payBtn = document.getElementById('pay');
var key = document.getElementById('key').value;
var txnid = document.getElementById('txnid').value;
var amount = document.getElementById('GrandTotalValue').value;
var email = document.getElementById('email').value;
var fname = document.getElementById('fname').value;
var lname = document.getElementById('lname').value;
var pg = document.getElementById('pg').value;
var bankcode = document.getElementById('bankcode').value;
var surl = document.getElementById('surl').value;
var furl = document.getElementById('furl').value;
var phone = document.getElementById('phone').value;
var productinfo = document.getElementById('productinfo').value;
var hash = document.getElementById('hash').value;
var salt = document.getElementById('salt').value;
payBtn.onclick = () =>{
    console.log("pay test");
    let xhr = new XMLHttpRequest();
    xhr.open("POST","https://api-playground.payu.in" , true);
    xhr.onload = () =>{
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            let data = xhr.response;
            //afterCouponPrice.innerHTML = data;
            console.log("success!");
          }
        }else{
            afterCouponPrice.style.backgroundImage = "url('spinner2.gif')";
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("key=" + key + "&salt="+salt + "&txnid="+txnid + "&amount="+amount + "&productinfo="+productinfo + "&firstname="+fname + "&lastname="+lname + "&email="+email + "&phone="+phone + "&hash="+hash + "&bankcode="+bankcode + "&furl="+furl + "&surl="+surl + "&pg="+pg);
}
</script-->
    <script>
    var form = document.getElementById('paymentForm');
    var couponBtn = document.getElementById('couponBtn');
    var coupon = document.getElementById('coupon');
    var afterCouponPrice = document.getElementById('couponPrice');

    couponBtn.onclick = () => {
        console.log('success');
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "coupon/coupon.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    afterCouponPrice.innerHTML = data;
                    console.log("success!");
                }
            } else {
                afterCouponPrice.style.backgroundImage = "url('spinner2.gif')";
            }
        }

        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("coupon=" + coupon.value);
    }
    </script>


    <script>
    // document.paymentForm.onclick = function(){
    setInterval(() => {


        var planName = document.paymentForm.plan.value;
        var paymentMethods = document.paymentForm.payment.value;
        var planValidity = document.getElementById('planValidity');
        var planPrice = document.getElementById('planPrice');
        var planPrice1 = document.getElementById('planPrice1');
        var planCycle = document.getElementById('planCycle');
        var onlinePay = document.getElementById('pay');
        var cashPay = document.getElementById('cashForm');
        var planRate = document.getElementById('planRate').value;
        var couponRate = document.getElementById('couponRate').value;

        var grandTotal = document.getElementById('grandTotal');
        var GrandTotalValue = document.getElementById('GrandTotalValue');
        var grandTOTAL = (planRate) - (couponRate);
        if (grandTOTAL <= 0) {
            grandTOTAL = 0;
        }
        GrandTotalValue.value = grandTOTAL;
        //console.log(GrandTotalValue.value);
        //console.log(planRate);
        //console.log(couponRate);
        grandTotal.innerHTML = '₹' + String(grandTOTAL);
        //alert(planName);
        //console.log(planName);
        if (paymentMethods == 'online') {
            cashPay.style.display = 'none';
            onlinePay.style.display = 'block';
        } else {
            cashPay.style.display = 'block';
            onlinePay.style.display = 'none';
        }

        if (planName == 6) {
            planValidity.innerHTML = '<?php
$halfYearOn = date('d M Y',strtotime(date('Y-m-d', time()) . ' + 1 days'));
echo $halfYearOn;
                ?>';

            planPrice.innerHTML = '₹20.00';
            //planRate.innerHTML = '<input type="number" name="planRate" value="751" hidden>';
            planPrice1.innerHTML = '₹20.00';
            planCycle.innerHTML = '1 days';
            //document.getElementById('planRate').value = '751';
        } else {
            planValidity.innerHTML = '<?php
$oneYearOn = date('d M Y',strtotime(date('Y-m-d', time()) . ' + 2 days'));
echo $oneYearOn;
                ?>';

            planPrice.innerHTML = '₹40.00';
            // planRate.innerHTML = '<input type="number" name="planRate" value="1111" hidden>';
            planPrice1.innerHTML = '₹40.00';
            planCycle.innerHTML = '2 days';
            //document.getElementById('planRate').value = '1111';
        }
    }, 500);
    </script>
</body>

</html>