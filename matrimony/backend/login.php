<?php
session_start();
include_once "connect.php";
$userid = mysqli_real_escape_string($conn, $_POST['userid']);
$password = mysqli_real_escape_string($conn, $_POST['pass']);

$sql = mysqli_query($conn, "SELECT * FROM per_details WHERE email = '{$userid}'");
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
    //            $user_pass = md5($password);
    //            $enc_pass = $row['password'];
    //   $approval_status = 'approved';
    if ($password === $row['password']) {

        $_SESSION['unique_id'] = $row['id'];
        $_SESSION['email'] = $userid;
        if ($row['id'] == 11111) {
            //echo "success<br>";
            header("refresh:0;url= ../harsh1/adminPanel/adminPanel.php");
        } else{
            // echo "success<br>";
            $setLoggedIn = "UPDATE per_details SET logged_in='1' WHERE id={$_SESSION['unique_id']}";
            mysqli_query($conn, $setLoggedIn);
            $myValidity = $row['Validity'];
            $myValidity = strtotime($myValidity);
            $currentDate = new DateTime();
            $today = $currentDate->format('d M Y');
            $today = strtotime($today);
            // $today = new DateTime(date('d M Y',strtotime(date('Y-m-d', time()))));
            if($myValidity >= $today){
                $validityStatus = "yes";
            }else{
                $validityStatus = "no";
            }
            if($validityStatus == "yes" && $myValidity != ""){
                // echo $validityStatus;
                // echo $myValidity;
                // echo $today;
            header("refresh:0;url= ../harsh1/index1.php");
            }else{
                // echo $validityStatus;
                // echo $myValidity;
                // echo $today;
                header("refresh:0;url= ../harsh1/premium/payment.php");
            }
        // } elseif ($row['approval_status'] == 'pending') {
        //     $setLoggedIn = "UPDATE per_details SET logged_in='1' WHERE id={$_SESSION['unique_id']}";
        //     mysqli_query($conn, $setLoggedIn);
        //     echo "success<br>";
        //     header("refresh:1;url= ../harsh1/settings.php");
        // } else {
        //     echo "Admin has unapproved your account!";
        //     echo 'Error: ';
        //     echo mysqli_error($conn);
        // }
        }
    } else {
        echo "Email or Password is Incorrect!";
    }
} else {
    echo "Entered email is not registered with us!";
}
