<?php
// require_once '../Payslip/vendor/autoload.php';
// $mpdf = new \Mpdf\Mpdf();
$hostname = 'srv1127.hstgr.io';
$dbname = 'u972129759_payroll';
$username = 'u972129759_payroll';
$password = 'Ecct@29052000';

$conn = mysqli_connect($hostname, $username, $password, $dbname);

$query = $conn->query("SELECT * from `users` where gender='Male' limit 150");

$pdfcontent = '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boys</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
            font-size: 12pt;

        }

        .main-page {
            width: 210mm;
            height: 296mm;
            background-image: url("template.png");
            background-size: 100% 97%;
            background-repeat: no-repeat;
            position: sticky;
            margin: 0px;
        }

        .AkID {
            position: relative;
            width: fit-content;
            margin-top: 0%;
            top: 30vh;
            left: 04vw;
            text-decoration: solid;

        }

        .AkNM {
            position: relative;
            width: fit-content;
            top: 34vh;
            left: 04vw;
            text-decoration: solid;

        }

        .AkDoB {
            position: relative;
            width: fit-content;
            top: 40vh;
            left: 04vw;
            text-decoration: solid;
        }

        .AkBLDG {
            position: relative;
            width: fit-content;
            top: 45vh;
            left: 04vw;
            text-decoration: solid;
        }

        .AkFGTR {
            position: relative;
            width: fit-content;
            top: 50vh;
            left: 04vw;
            text-decoration: solid;
        }

        .AkSGTR {
            position: relative;
            width: fit-content;
            top: 56vh;
            left: 04vw;
            text-decoration: solid;
        }

        .AkCNTCT {
            position: relative;
            width: fit-content;
            top: 61vh;
            left: 04vw;
            text-decoration: solid;
        }

        .AkIMG {
            position: relative;
            width: fit-content;
            top: -27vh;
            left: 52vw;
            height: 380px;

        }

        .AkEDU {
            position: relative;
            width: fit-content;
            top: -19vh;
            left: 52vw;

        }

        .AkOCC {
            position: relative;
            width: fit-content;
            top: -11vh;
            left: 52vw;

        }

        .AkADDRS {
            position: relative;
            width: fit-content;
            top: -2vh;
            left: 52vw;

        }
    </style>


<body>
    <!-- <div style="z-index:-1 ;">
        <img src="template.png" alt="">
    </div> -->';
while ($row = mysqli_fetch_assoc($query)) {
    if (strlen($row["education"]) > 30) {
        $education = substr($row["education"], 0, 30) . '<br>' . substr($row["education"], 30, 30);
    } else {
        $education = substr($row["education"], 0, 30) . '<br>';
    }
    if (strlen($row["profession"]) > 30) {
        $profession = substr($row["profession"], 0, 30) . '<br>' . substr($row["profession"], 30, 30);
    } else {
        $profession = substr($row["profession"], 0, 30);
    }
    if (strlen($row["permentantAddress"]) > 30) {
        $permentantAddress = substr($row["permentantAddress"], 0, 30) . '<br>' . substr($row["permentantAddress"], 30, 30);
    } else {
        $permentantAddress = substr($row["permentantAddress"], 0, 30);
    }
    if (strlen($row["permentantAddress"]) > 60) {
        $permentantAddress .= '<br>' . substr($row["permentantAddress"], 60, 30);
    }
    $pdfcontent .= '
        <div style="z-index: 1;" class="main-page">
        <h1 class="AkID">' . $row["id"] . '</h1>
        <h2 class="AkNM">' . $row["firstname"] . ' ' . $row["middlename"] . ' ' . $row["lastname"] . '</h2>
        <h2 class="AkDoB">' . $row["DOB"] . '</h2>
        <h2 class="AkBLDG">' . $row["bloodgroup"] . '</h2>
        <h2 class="AkFGTR">' . $row["firstGotram"] . '</h2>
        <h2 class="AkSGTR">' . $row["secondGotram"] . '</h2>
        <h2 class="AkCNTCT">' . $row["contactnumber"] . '</h2>
        <img class="AkIMG"
            src="' . $row["biodata"] . '"
            alt="" srcset="">
        <h3 class="AkEDU">' . $education  . '</h3>
        <h3 class="AkOCC">' . $profession  .  '</h3>
        <h3 class="AkADDRS">' . $permentantAddress . '</h3>
    </div>
';
}


$pdfcontent .= '</body>

</html>';


// header('Content-Type:application/xls');
// header('Content-Disposition:attachment;filename=Payslip.xls');
echo $pdfcontent;


// $mpdf->WriteHTML($pdfcontent);
// $mpdf->SetDisplayMode('fullpage');
// $mpdf->list_indent_first_level = 0;


// output in browser
// $mpdf->Output();