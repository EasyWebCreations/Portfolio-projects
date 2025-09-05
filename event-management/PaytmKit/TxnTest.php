<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	$orderId = $_POST['txnid'];
	$userId = $_POST['phone'];
	$amount = $_POST['amount'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Merchant Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
<style>
      .paymentDetails{
        display: none;
      }
      .loader{
        margin-top: 50px;
            }
    </style>
<script>

    function submitPaytmForm() {
      var paytmForm = document.forms.paytmForm;
      paytmForm.submit();
    }
  </script>
</head>
<body onload="submitPaytmForm()">
<div class="loader">
    <center>
    <img src="../spinner2.gif" alt="loading">
  </center>
  </div>
  <div class="paymentDetails">
	<form method="post" action="pgRedirect.php" name="paytmForm">
		<table border="1">
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  $userId?>">
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $userId?>"></td>
				</tr>
				<tr>
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>txnAmount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?php echo $amount?>">
						<input type="hidden" name="phone" value="<?php echo $phone; ?>">
						<input type="hidden" name="email" value="<?php echo $email; ?>">
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit"></td>
				</tr>
			</tbody>
		</table>
		* - Mandatory Fields
	</form>
</div>
</body>
</html>