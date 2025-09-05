<?php
require_once '../Payslip/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();


$pdfcontent = '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table or report</title>
    <style>
        table {
            width: 96%;
            margin: 2% 2%;
            border-collapse: collapse;
            font-family: Arial, Helvetica, sans-serif;
        }
        tr:nth-of-type(odd) {
            background: #eee;
        }
        
        th {
            background: blue;
            color: white;
            font-weight: bold;
        }
        
        td,
        th {
            padding: 6px;
            border: 1px solid #ccc;
            text-align: left;
        }
    </style>

</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Month</th>
                <th>UAN</th>
                <th>Employee Name</th>
                <th>Gross Wages</th>
                <th>EPF Wages</th>
                <th>EPF CR</th>
                <th>EPS CR</th>
                <th>EPF EPS DR</th>
                <th>NCP Days</th>
                <th>Refund of ADV</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>ID123</td>
                <td>Ramakant bahskar Mishra</td>
                <td>10000</td>
                <td>100</td>
                <td>121</td>
                <td>121</td>
                <td>12312</td>
                <td>2</td>
                <td>0</td>
            </tr>
            <tr>
                <td>1</td>
                <td>ID123</td>
                <td>Ramakant bahskar Mishra</td>
                <td>10000</td>
                <td>100</td>
                <td>121</td>
                <td>121</td>
                <td>12312</td>
                <td>2</td>
                <td>0</td>
            </tr>
        </tbody>
    </table>

</body>

</html>';


// header('Content-Type:application/xls');
// header('Content-Disposition:attachment;filename=Payslip.xls');
// echo $pdfcontent;


$mpdf->WriteHTML($pdfcontent);
$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;


// output in browser
$mpdf->Output();