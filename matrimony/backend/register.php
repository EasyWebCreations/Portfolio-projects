<?php

session_start();

// use PHPMailer\PHPMailer\PHPMailer;
// use SMTP\SMTP\SMTP;
// use Exception\Exception\Exception;

// require_once "PHPMailer/src/PHPMailer.php";
// require_once "PHPMailer/src/SMTP.php";
// require_once "PHPMailer/src/Exception.php";

if (isset($_SESSION['mobile'])) {
    // if (true) {
    include_once "connect.php";
    $mobileno = $_SESSION['mobile'];
    $time = time();
    $ran_id = substr(strval(rand($time, 10000)), 0, 5);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $blood = mysqli_real_escape_string($conn, $_POST['blood']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $marital = mysqli_real_escape_string($conn, $_POST['marital']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $height = mysqli_real_escape_string($conn, $_POST['height']);

    $call = mysqli_real_escape_string($conn, $_POST['call']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);

    $complexion = mysqli_real_escape_string($conn, $_POST['complexion']);
    $mother_tongue = mysqli_real_escape_string($conn, $_POST['mother_tongue']);
    $education = mysqli_real_escape_string($conn, $_POST['education']);
    $occupation = mysqli_real_escape_string($conn, $_POST['occupation']);
    $det_education = mysqli_real_escape_string($conn, $_POST['det_education']);
    $det_occupation = mysqli_real_escape_string($conn, $_POST['det_occupation']);
    $income = mysqli_real_escape_string($conn, $_POST['income']);
    $aboutme = mysqli_real_escape_string($conn, $_POST['aboutme']);

    $mother_name = mysqli_real_escape_string($conn, $_POST['mother_name']);
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $mother_occupation = mysqli_real_escape_string($conn, $_POST['mother_occupation']);
    $father_occupation = mysqli_real_escape_string($conn, $_POST['father_occupation']);
    // $family_income = mysqli_real_escape_string($conn, $_POST['family_income']);
    $no_of_brothers = mysqli_real_escape_string($conn, $_POST['no_of_brothers']);
    $siblings = mysqli_real_escape_string($conn, $_POST['siblings']);
    $no_of_sisters = mysqli_real_escape_string($conn, $_POST['no_of_sisters']);
    $brother_details = mysqli_real_escape_string($conn, $_POST['brother_details']);
    $sister_details = mysqli_real_escape_string($conn, $_POST['sister_details']);

    $birth_name = mysqli_real_escape_string($conn, $_POST['birth_name']);
    $zodiac = mysqli_real_escape_string($conn, $_POST['zodiac']);
    $gotra1 = mysqli_real_escape_string($conn, $_POST['gotra1']);
    $birth_time = mysqli_real_escape_string($conn, $_POST['birth_time']);
    $janma_tithi = mysqli_real_escape_string($conn, $_POST['janma_tithi']);
    $gotra2 = mysqli_real_escape_string($conn, $_POST['gotra2']);
    $birth_place = mysqli_real_escape_string($conn, $_POST['birth_place']);

    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $c_district = mysqli_real_escape_string($conn, $_POST['c_district']);
    $c_locality = mysqli_real_escape_string($conn, $_POST['c_locality']);
    $c_landmark = mysqli_real_escape_string($conn, $_POST['c_landmark']);
    $c_pincode = mysqli_real_escape_string($conn, $_POST['c_pincode']);
    // $mobileno = $mobile;

    //     $sql = mysqli_query($conn, "UPDATE `per_details` SET `mobile`='{$mobileno}', `email`='{$email}',`fname`='{$fname}',`mname`='{$mname}',`lname`='{$lname}',`gender`='{$gender}',`martial_status`='{$marital}',`callno`='{$call}' WHERE `id` = '$user_id'") ;

    $insert_query = mysqli_query($conn, "INSERT INTO per_details (`id`,`password`,`mobile`,`email`,`fname`,`mname`,`lname`,`gender`,`martial_status`,`callno`,`blood`,`dob`, `complexion`, `mother_tongue`, `brother_details`, `sister_details`, `age`, `about_me`, `education`, `det_education`, `det_occupation`, `no_of_brothers`, `no_of_sisters`, `income`, `occupation`, `height`, `c_country`, `c_landmark`, `c_locality`, `c_city`, `c_district`, `c_state`, `c_pincode`, `mother_name`, `mother_occupation`, `father_occupation`, `siblings`, `janma_tithi`, `zodiac`, `birth_time`, `gotra1`, `birth_place`, `birth_name`,`gotra2`)
                        VALUES ('{$ran_id}','{$ran_id}','{$mobile}','{$email}','{$fname}','{$mname}','{$lname}','{$gender}','{$marital}','{$call}','{$blood}','{$dob}','{$complexion}','{$mother_tongue}','{$brother_details}','{$sister_details}','{$age}','{$aboutme}','{$education}','{$det_education}','{$det_occupation}','{$no_of_brothers}','{$no_of_sisters}','{$income}','{$occupation}','{$height}','{$country}','{$c_landmark}','{$c_locality}','{$city}','{$c_district}','{$state}','{$c_pincode}','{$mother_name}','{$mother_occupation}','{$father_occupation}','{$siblings}','{$janma_tithi}','{$zodiac}','{$birth_time}','{$gotra1}','{$birth_place}','{$birth_name}','{$gotra2}')");


// $queryProfileSetting = "UPDATE per_details SET `fname`='{$fname}', `lname`='{$lname}', `blood`='{$blood}', `gender`='{$gender}', `dob`='{$dob}', `complexion`='{$complexion}', `mother_tongue`='{$mother_tongue}', `brother_details`='{$brother_details}', `sister_details`='{$sister_details}', `age`='{$age}', `about_me`='{$aboutme}', `education`='{$education}', `det_education`='{$det_education}', `det_occupation`='{$det_occupation}', `no_of_brothers`='{$no_of_brothers}', `no_of_sisters`='{$no_of_sisters}', `income`='{$income}', `occupation`='{$occupation}', `height`='{$height}', `c_country`='{$country}', `c_landmark`='{$c_landmark}', `c_locality`='{$c_locality}', `c_city`='{$city}', `c_district`='{$c_district}', `c_state`='{$state}', `c_pincode`='{$c_pincode}', `mother_name`='{$mother_name}', `mname`='{$mname}', `mother_occupation`='{$mother_occupation}', `father_occupation`='{$father_occupation}', `siblings`='{$siblings}', `family_income`='{$family_income}', `janma_tithi`='{$janma_tithi}', `zodiac`='{$zodiac}', `birth_time`='{$birth_time}', `gotra1`='{$gotra1}', `birth_place`='{$birth_place}', `birth_name`='{$birth_name}' WHERE `id`='{$_SESSION['unique_id']}'";
// $updateQuery = mysqli_query($conn,$queryProfileSetting);

// $stmtProfileSetting->bind_param("sssssssssssssssssssssssssssssssssssssss",$fname, $lname, $blood, $mobile, $gender, $dob, $complexion, $mother_tongue, $brother_details, $sister_details, $age, $about_me, $education, $det_education, $det_occupation, $no_of_brothers, $no_of_sisters, $income, $occupation, $height, $country, $c_landmark, $c_locality, $city, $c_district, $state, $c_pincode, $mother_name, $mname, $mother_occupation, $father_occupation, $siblings, $family_income, $janma_tithi, $zodiac, $birth_time, $gotra1, $birth_place, $birth_name);
// $stmtProfileSetting->execute();

    if ($insert_query) {

        // header("url= registersuccess.php");
        // include "registersuccess.php";
        // $mail = new PHPMailer(true);

        // $mail->SMTPDebug = 0;

        // $mail->isSMTP();

        // $mail->Host = "smtp.gmail.com";

        // $mail->SMTPAuth = true;

        // $mail->SMTPOptions = array(
        //     'ssl' => array(
        //         'verify_peer' => false,
        //         'verify_peer_name' => false,
        //         'allow_self_signed' => false,
        //     )
        // );

        // $mail->Username = "akshadaasite@gmail.com";
        // $mail->Password = "AkshadaaSitePass@1";

        // $mail->SMTPSecure = "tls";

        // $mail->Port = 587;

        // $mail->From = "akshadaasite@gmail.com";
        // $mail->FromName = 'Akshadaa Site';

        // $mail->addAddress($email, $fname . " " . $lname);

        // $mail->isHTML(true);

        // $mail->Subject = "Akshadaa Registration";

        // $mail->Body = nl2br("This mail contains sensitive information!\r\nYour registration for Akshadaa Site will be confirmed after payment only. Enter email id and password to login.\r\n" . "\r\nEmail ID: " . $email . "\r\nPassword: " . $ran_id);

        // $mail->send();

        $_SESSION['email'] = $email;
        header("refresh:0 ; url= ../harsh1/premium/payment.php");
        // $setLoggedIn = "UPDATE per_details SET logged_in=? WHERE id={$_SESSION['unique_id']}";
        // $stmtSetLoggedIn = $conn->prepare($setLoggedIn);
        // $stmtSetLoggedIn->bind_param("s", '1');
        // $stmtSetLoggedIn->execute();

        // echo "<script>alert('Your Account is Created! Check Your mail For Credentials.');</script>";
        // $_SESSION['unique_id'] = $ran_id;
        // header("refresh:2 ; url= ../harsh1/settings.php");
    } else {
        // echo error_get_last();
        include "failure.php";
    }
} else {
    echo "error";
}
