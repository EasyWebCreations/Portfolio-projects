<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
require_once("../conn.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	// echo $_GET["email"];
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {

		echo "<b>Transaction status is success</b>" . "<br/>";
		$UserPhone = $_POST["ORDERID"];
		$txnid = $_POST["TXNID"];
		$currentDate = new DateTime();
		$datetime = $currentDate->format('d/m/Y h:i a');
		// echo  $_POST["CUSTID"];
		$plan = $_GET["plan"];
		if($plan == "classic"){
			$validity = date('d M Y',strtotime(date('Y-m-d', time()) . ' + 1 days'));
		}else{
			$validity = date('d M Y',strtotime(date('Y-m-d', time()) . ' + 2 days'));
		}
		$email = $_GET["email"];

		$updateQuery = "UPDATE `per_details` SET `payment_transation`='{$txnid}', `date_of_payment`='{$datetime}',`planName`='{$plan}', `Validity`='{$validity}' WHERE `email` = '{$email}'";
		$runQuery = mysqli_query($conn, $updateQuery);
		if($runQuery){
			// echo $UserPhone;
			// echo "</br>";
			// echo $txnid;
			echo "Update Success";
			header("refresh:1;url= ../../../index.php");
		}else{
			echo  "error";
			header("refresh:1;url= ../../../index.php");
		}


		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
		header("refresh:1;url= ../../../index.php");
	}

	// if (isset($_POST) && count($_POST)>0 )
	// { 
	// 	foreach($_POST as $paramName => $paramValue) {
	// 			echo "<br/>" . $paramName . " = " . $paramValue;
	// 	}
	// }
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>