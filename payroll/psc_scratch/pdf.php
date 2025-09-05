<?php


// header('Location: pdf.php');
require_once '../Payslip/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$pdfcontent = $_POST['pdf_table'];
$filename = $_POST['filename'];
$ppp = '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>' . $filename . '</title>
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
<img src="../img/logo.jpg" style="width:8%;height:4%;margin-left:46%">
<h4 style="text-align:centre">' . $filename . '</h4>
    
' . $pdfcontent . '
    

</body>

</html>';

$pdfcontent .= $ppp;
$mpdf->WriteHTML($ppp);
$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0;
$mpdf->SetWatermarkText('TEE');
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;


// output in browser
$mpdf->Output($filename, 'd');