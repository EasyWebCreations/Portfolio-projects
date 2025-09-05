<?php

// Include mpdf library file
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

// Database Connection 
include 'db.php';
include 'amt2words.php';
//Check for connection error
if ($conn->connect_error) {
    die("Error in DB connection: " . $conn->connect_errno . " : " . $conn->connect_error);
}

$firm = $_POST["FIRM"];

$siteid = $_POST["SITEID"];
echo $siteid . " ";

$format = $_POST["FORMAT"];
echo $format . " ";
$month = $_POST["SLIP_MONTH"];
echo $month;
if ($_POST['EMPID'] != '') {
    $emid = $_POST["EMPID"];
    echo $emid . " ";
    $sql = "select emp_details.EMP_NAME, emp_details.CATEGORY,emp_details.DESIGNATION,leaves.WORKING_DAYS,(emp_details.BASIC_SAL+emp_details.HRA_SAL+ emp_details.ALLOW) as gs, salary.month, emp_details.UAN_NO, emp_details.ESIC_NO,emp_details.EMP_ID,emp_details.FIRM,salary.NET_SAL,salary.BASIC_SAL, salary.HRA_SAL, salary.PDA,salary.PH_PAY, salary.SPL_ALLOW, salary.LEAVE_PAY,salary.GROSS_SAL, salary.PF, salary.ESIC, salary.PT, salary.LWF,salary.ADV, salary.OTHER_DEDUCTION, leaves.C_OFF_AVAILED, leaves.C_OFF_EARNED, leaves.E_LEAVE_AVAILED, leaves.C_OFF_BAL, leaves.E_LEAVE_AVAILED, leaves.E_LEAVE_AVAILABLE,leaves.E_LEAVE_BAL, leaves.C_OFF_AVAILABLE, emp_details.SITE_ID from emp_details, leaves , salary where emp_details.EMP_ID=leaves.EMP_ID and 
    leaves.EMP_ID=salary.EMP_ID and salary.EMP_ID='$emid' and leaves.month=salary.month and leaves.SITE_ID='$siteid' and salary.month='$month'";
} else {

    $sql = "select emp_details.EMP_NAME, emp_details.CATEGORY,emp_details.DESIGNATION,leaves.WORKING_DAYS,(emp_details.BASIC_SAL+emp_details.HRA_SAL+ emp_details.ALLOW) as gs, salary.month, emp_details.UAN_NO, emp_details.ESIC_NO,emp_details.EMP_ID,emp_details.FIRM,salary.NET_SAL,salary.BASIC_SAL, salary.HRA_SAL, salary.PDA,salary.PH_PAY, salary.SPL_ALLOW, salary.LEAVE_PAY,salary.GROSS_SAL, salary.PF, salary.ESIC, salary.PT, salary.LWF,salary.ADV, salary.OTHER_DEDUCTION, leaves.C_OFF_AVAILED, leaves.C_OFF_EARNED, leaves.E_LEAVE_AVAILED, leaves.C_OFF_BAL, leaves.E_LEAVE_AVAILED, leaves.E_LEAVE_AVAILABLE,leaves.E_LEAVE_BAL, leaves.C_OFF_AVAILABLE, emp_details.SITE_ID from emp_details, leaves , salary where emp_details.EMP_ID=leaves.EMP_ID and 
    leaves.EMP_ID=salary.EMP_ID and leaves.month=salary.month and leaves.SITE_ID='$siteid' and salary.month='$month'";
}

$result = $conn->query($sql);
echo $sql;
$data = '';
$n = 0;
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $n += 1;
        $gross_payslip = $row["BASIC_SAL"] + $row["HRA_SAL"] + $row["PDA"] + $row["PH_PAY"] + $row["SPL_ALLOW"] + $row["LEAVE_PAY"];
        $deduction_payslip = $row["PF"] + $row["ESIC"] + $row["PT"] + $row["LWF"] + $row["ADV"] + $row["OTHER_DEDUCTION"];
        $final_net = $gross_payslip - $deduction_payslip;
        if ($firm == "TEE") {
            $data .= '<img src="../img/logo.jpg" style="width:10%;height:7%;margin-left:45%">
        <h1 style="text-align:centre">Techno Energy Engineering Private Limited</h1>';
        } else {
            $data .= '<img src="../img/Shreyas_logo.jpg" style="width:10%;height:7%;margin-left:45%">
        <h1 style="text-align:centre;margin-left:30%">Shreyas Services </h1>';
        }

        $data .= '
    <h3 style="margin-left:5%">Site Name: ' . $row["SITE_ID"] . ' </h3>
	
	
 
   
	<table style="width:95%;margin-left:5%">
	<tr >
                    <th class="col">EmployeeName</th>
                    <th class="col">' . $row['EMP_NAME'] . '</th>
                    <th class="col">Month</th>
                    <th class="col" >' . date('M-y', strtotime($month)) . '</th>
					
                    <tr>
					<tr class="row">
                    <td class="col">Department</td>
                    <td class="col">' . $row['CATEGORY'] . '</td>
                    <td class="col">UAN</td>
                    <td class="col">' . $row['UAN_NO'] . '</td>
					
                    <tr>
					<tr class="row">
                    <td class="col">Designation</td>
                    <td class="col">' . $row['DESIGNATION'] . '</td>
                    <td class="col">ESIC Code</td>
                    <td class="col" >' . $row['ESIC_NO'] . '</td>
					
                    <tr>
					<tr class="row">
                    <td class="col">Present days</td>
                    <td class="col">' . $row['WORKING_DAYS'] . '</td>
                    <td class="col">Employee ID</td>
                    <td class="col" >' . $row['FIRM'] . $row['EMP_ID'] . '</td>
					
                    <tr>
                   
                   	
					<tr class="row">
                    <td class="col">Gross Salary</td>
                    <td class="col">' . $row['gs'] . '</td>
                    <td class="col">Net Salary</td>
                    <td class="col">' . (int)$final_net . '</td>
                    </table>
                    <table style="width:95%;margin-left:5%;">
                    <tr >
					<tr class="row">
                    <th class="col-2">Sr. No</th>
                    <th class="col-3">Particular</th>
                    <th class="col-2">Amount</th>
                    <th class="col-3">Particular</th>
                    <th class="col-2">Amount</th>
                    <tr>
					<tr class="row">
                    <td class="col-2">1</td>
                    <td class="col-3">Basic + DA</td>
                    <td class="col-2">' . round($row['BASIC_SAL']) . '</td>
                    <td class="col-3">PF</td>
                    <td class="col-2">' . round($row['PF']) . '</td>
                    <tr>
					<tr class="row">
                    <td class="col-2">2</td>
                    <td class="col-3">HRA</td>
                    <td class="col-2">' . round($row['HRA_SAL']) . '</td>
                    <td class="col-3">ESIC</td>
                    <td class="col-2">' . round($row['ESIC']) . '</td>
                    <tr>
					<tr class="row">
                    <td class="col-2">' . "3" . '</td>
                    <td class="col-3">PDA</td>
                    <td class="col-2">' . round($row['PDA']) . '</td>
                    <td class="col-3">PT</td>
                    <td class="col-2">' . round($row['PT']) . '</td>
                    <tr>
					<tr class="row">
                    <td class="col-2">4</td>
                    <td class="col-3">PH</td>
                    <td class="col-2">' . round($row['PH_PAY']) . '</td>
                    <td class="col-3">LWF</td>
                    <td class="col-2">' . round($row['LWF']) . '</td>
                    <tr>
					<tr class="row">
                    <td class="col-2">5</td>
                    <td class="col-3">Other Allowance</td>
                    <td class="col-2">' . round($row['SPL_ALLOW']) . '</td>
                    <td class="col-3">Advance</td>
                    <td class="col-2">' . round($row['ADV']) . '</td>
                    <tr>
					<tr class="row">
                    <td class="col-2">6</td>
                    <td class="col-3">Leave Payment</td>
                    <td class="col-2">' . round($row['LEAVE_PAY']) . '</td>
                    <td class="col-3">Other Deduction</td>
                    <td class="col-2">' . round($row['OTHER_DEDUCTION']) . '</td>
                    <tr>
					<tr class="row">
                    <td class="col-2">7</td>
                    <td class="col-3">Gross Amount</td>
                    <td class="col-2">' . round($gross_payslip) . '</td>
                    <td class="col-3">Deduction</td>
                    <td class="col-2">' . round($deduction_payslip) . '</td>
                    <tr>
					<tr class="row" style="background-color:lightgray">
                    <th class="col-2">Leaves</th>
                    <th class="col-3">Previous Balance</th>
                    <th class="col-2">Earned</th>
                    <th class="col-3">Availed</th>
                    <th class="col-2">Current Balance</th>
                    <tr>
					<tr class="row" style="background-color:white">
                    <td class="col-2">C-OFF</td>
                    <td class="col-3">' . $row['C_OFF_AVAILABLE'] . '</td>
                    <td class="col-2">' . $row['C_OFF_EARNED'] . '</td>
                    <td class="col-3">' . $row['C_OFF_AVAILED'] . '</td>
                    <td class="col-2">' . $row['C_OFF_BAL'] . '</td>
                    <tr>
					<tr class="row" style="background-color:white">
                    <td class="col-2">Earned Leaves</td>
                    <td class="col-2">' . $row['E_LEAVE_AVAILABLE'] . '</td>
                    <td class="col-3">' . ($row['WORKING_DAYS'] * 0.05) . '</td>
                    <td class="col-3">' . $row['E_LEAVE_AVAILED'] . '</td>
                    <td class="col-2">' . ((int)$row['E_LEAVE_BAL'] + $row['WORKING_DAYS'] * 0.05) . '</td>
                    <tr>
                    </table>
                    <table style="width:95%;margin-left:5%;margin-top:10px;">
					<tr class="row" style="background-color:lightgray;">
                    <th class="col amt">Amount in words: ' . AmountInWords((int)$final_net) . '</th>
                    </tr>
                    </table>
<br>                               
            <h4>Note: This is a computer generated payslip, here any signature of authority is not required</h4>';
    }
}

// Take PDF contents in a variable
$pdfcontent = '
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
       
        td{
            
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
       th {
            background-color:lightgray;
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }
        h4{
            margin-bottom:18%;
        }
        
        </style>
		
		
		
		' . $data . '
		';

$filename = 'Payslip_' . substr($month, 0, 7) . '_' . $siteid;

if ($format === "EXCEL") {
    header('Content-Type:application/xls');
    header('Content-Disposition:attachment;filename=' . $filename . '.xls');
    echo $pdfcontent;
}

if ($format === "PDF") {

    // echo $pdfcontent;
    $mpdf->WriteHTML($pdfcontent);

    $mpdf->SetDisplayMode('fullpage');
    $mpdf->list_indent_first_level = 0;

    //call watermark content and image
    $mpdf->SetWatermarkText($firm);
    $mpdf->showWatermarkText = true;
    $mpdf->watermarkTextAlpha = 0.1;
    //output in browser
    $mpdf->Output($filename . '.pdf', 'd');
    // $mpdf->Output();
}