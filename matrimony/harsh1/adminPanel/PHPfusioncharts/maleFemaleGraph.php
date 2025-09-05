<?php
include_once('../../../backend/connect.php');

// function month2Month($month)
// {
//   switch ($month) {
//     case 1:
//       return 'January';
//       break;
//     case 2:
//       return 'February';
//       break;
//     case 3:
//       return 'March';
//       break;
//     case 4:
//       return 'April';
//       break;
//     case 5:
//       return 'May';
//       break;
//     case 6:
//       return 'June';
//       break;
//     case 7:
//       return 'July';
//       break;
//     case 8:
//       return 'August';
//       break;
//     case 9:
//       return 'September';
//       break;
//     case 10:
//       return 'October';
//       break;
//     case 11:
//       return 'November';
//       break;
//     case 12:
//       return 'December';
//       break;
//   }
// }

// $today = mysqli_query($conn, "SELECT MONTH(current_timestamp()) as 'todayMonth', YEAR(current_timestamp()) as 'todayYear'");
// $todayMonth = $today['todayMonth'];
// $todayYear = $today['todayYear'];

$visitsGraphSQL = "SELECT MONTHNAME(create_time) AS 'Month', YEAR(create_time) AS 'Year', COUNT(id) AS 'Count' FROM per_details WHERE ((create_time >= DATE_SUB(NOW(), INTERVAL 13 MONTH)) AND gender='Male') GROUP BY CONCAT(MONTH(create_time), YEAR(create_time)) ORDER BY create_time ASC";
$visitsGraphQuery = mysqli_query($conn, $visitsGraphSQL);
$visitsGraphValues = array();
$visitsGraphLabels = array();
$jsonEncodedDataM = '';
$jsonEncodedDataF = '';
$jsonEncodedDataL = '';
$monthCountHelper = 12;
// if (mysqli_num_rows($visitsGraphQuery) > 0) {
$visitsGraphResult = mysqli_fetch_all($visitsGraphQuery, MYSQLI_ASSOC);
function monthGap($graphItem, $conn)
{
  global $monthCountHelper, $visitsGraphValues, $visitsGraphLabels;
  $requiredDate = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MONTHNAME(current_timestamp() - INTERVAL {$monthCountHelper} MONTH) as 'Month', YEAR(current_timestamp() - INTERVAL {$monthCountHelper} MONTH) as 'Year'"));
  if ($graphItem['Month'] == $requiredDate['Month'] && $graphItem['Year'] == $requiredDate['Year']) {
    // array_push($visitsGraphValues, array(
    //   "value" => $graphItem['Count']
    // ));
    // array_push($visitsGraphLabels, array(
    //   "label" => $graphItem['Month'] . ' ' . $graphItem['Year']
    // ));
    array_push($visitsGraphValues, $graphItem['Count']);
    array_push($visitsGraphLabels, $graphItem['Month'] . ' ' . $graphItem['Year']);
    $monthCountHelper = $monthCountHelper - 1;
  } else {
    if ($monthCountHelper >= 0) {
      // array_push($visitsGraphValues, array(
      //   "value" => "0"
      // ));
      // array_push($visitsGraphLabels, array(
      //   "label" => $requiredDate['Month'] . ' ' . $requiredDate['Year']
      // ));
      array_push($visitsGraphValues, "0");
      array_push($visitsGraphLabels, $requiredDate['Month'] . ' ' . $requiredDate['Year']);
      $monthCountHelper = $monthCountHelper - 1;
      if ($monthCountHelper >= 0) {
        monthGap($graphItem, $conn);
      }
    }
  }
}
foreach ($visitsGraphResult as $graphItem) {
  monthGap($graphItem, $conn);
  // array_push($visitsGraphValues, array(
  //   "label" => $graphItem['Month'] . ' ' . $graphItem['Year'], "value" => $graphItem['Count']
  // ));
}
$jsonEncodedDataM = json_encode($visitsGraphValues);
$jsonEncodedDataL = json_encode($visitsGraphLabels);

// }

$visitsGraphSQL = "SELECT MONTHNAME(create_time) AS 'Month', YEAR(create_time) AS 'Year', COUNT(id) AS 'Count' FROM per_details WHERE ((create_time >= DATE_SUB(NOW(), INTERVAL 13 MONTH)) AND gender='Female') GROUP BY CONCAT(MONTH(create_time), YEAR(create_time)) ORDER BY create_time ASC";
$visitsGraphQuery = mysqli_query($conn, $visitsGraphSQL);
$visitsGraphValues = array();
// $visitsGraphLabels = array();
// $jsonEncodedDataM = '';
// $jsonEncodedDataF = '';
// $jsonEncodedDataL = '';
$monthCountHelper = 12;
// if (mysqli_num_rows($visitsGraphQuery) > 0) {
$visitsGraphResult = mysqli_fetch_all($visitsGraphQuery, MYSQLI_ASSOC);
function monthGap1($graphItem, $conn)
{
  global $monthCountHelper, $visitsGraphValues, $visitsGraphLabels;
  $requiredDate = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MONTHNAME(current_timestamp() - INTERVAL {$monthCountHelper} MONTH) as 'Month', YEAR(current_timestamp() - INTERVAL {$monthCountHelper} MONTH) as 'Year'"));
  if ($graphItem['Month'] == $requiredDate['Month'] && $graphItem['Year'] == $requiredDate['Year']) {
    // array_push($visitsGraphValues, array(
    //   "value" => $graphItem['Count']
    // ));
    array_push($visitsGraphValues, $graphItem['Count']);
    // array_push($visitsGraphLabels, array(
    //   "label" => $graphItem['Month'] . ' ' . $graphItem['Year']
    // ));
    $monthCountHelper = $monthCountHelper - 1;
  } else {
    if ($monthCountHelper >= 0) {
      // array_push($visitsGraphValues, array(
      //   "value" => "0"
      // ));
      array_push($visitsGraphValues, "0");
      // array_push($visitsGraphLabels, array(
      //   "label" => $requiredDate['Month'] . ' ' . $requiredDate['Year']
      // ));
      $monthCountHelper = $monthCountHelper - 1;
      if ($monthCountHelper >= 0) {
        monthGap1($graphItem, $conn);
      }
    }
  }
}
foreach ($visitsGraphResult as $graphItem) {
  monthGap1($graphItem, $conn);
  // array_push($visitsGraphValues, array(
  //   "label" => $graphItem['Month'] . ' ' . $graphItem['Year'], "value" => $graphItem['Count']
  // ));
}
$jsonEncodedDataF = json_encode($visitsGraphValues);
$jsonEncodedDataM = json_encode($visitsGraphValues);
// echo $jsonEncodedDataF;
// }








// include("fusioncharts/fusioncharts.php");





// $visitsGraphSQL = 'SELECT MONTHNAME(create_time) AS "Month", YEAR(create_time) AS "Year", COUNT(id) AS "Count" FROM per_details WHERE ((create_time >= DATE_SUB(NOW(), INTERVAL 12 MONTH))) GROUP BY CONCAT(MONTH(create_time), YEAR(create_time)) ORDER BY create_time ASC';
// $visitsGraphQuery = mysqli_query($conn, $visitsGraphSQL);
// $visitsGraphValues = array();
// $visitsGraphLabels = array();
// $jsonEncodedDataF = '';
// $jsonEncodedDataL = '';
// if (mysqli_num_rows($visitsGraphQuery) > 0) {
// $visitsGraphResult = mysqli_fetch_all($visitsGraphQuery, MYSQLI_ASSOC);
// foreach ($visitsGraphResult as $graphItem) {
// array_push($visitsGraphValues, array(
// "value" => $graphItem['Count']
// ));
// array_push($visitsGraphLabels, array(
// "label" => $graphItem['Month'] . ' ' . $graphItem['Year']
// ));
// }
// $jsonEncodedDataF = json_encode($visitsGraphValues);
// $jsonEncodedDataL = json_encode($visitsGraphLabels);
// echo $jsonEncodedDataF;
// echo $jsonEncodedDataL;
// }

// $columnChart = new FusionCharts("mscolumn2d", "maleFemaleGraph1", "48%", 400, "maleFemaleGraph", "json", '{
// "chart": {
// "caption": "Monthly Registrations",
// "subcaption": "",
// "xaxisname": "Years",
// "yaxisname": "Total number of apps in store",
// "formatnumberscale": "1",
// "plottooltext": "<b>$dataValue</b> apps were available on <b>$seriesName</b> in $label",
// "theme": "fusion",
// "drawcrossline": "1"
// },
// "categories": [
// {
// "category": ' . $jsonEncodedDataL . '
// }
// ],
// "dataset": [
// {
// "seriesname": "Female",
// "data": ' . $jsonEncodedDataF . '
// }
// ]
// }');

// $columnChart->render();






// $visitsGraphSQL = 'SELECT MONTHNAME(create_time) AS "Month", YEAR(create_time) AS "Year", COUNT(id) AS "Count" FROM per_details WHERE ((create_time >= DATE_SUB(NOW(), INTERVAL 12 MONTH))) GROUP BY CONCAT(MONTH(create_time), YEAR(create_time)) ORDER BY create_time ASC';
// $visitsGraphQuery = mysqli_query($conn, $visitsGraphSQL);
// $visitsGraphValues = array();
// $jsonEncodedDataF = '';
// if (mysqli_num_rows($visitsGraphQuery) > 0) {
// $visitsGraphResult = mysqli_fetch_all($visitsGraphQuery, MYSQLI_ASSOC);
// foreach ($visitsGraphResult as $graphItem) {
// array_push($visitsGraphValues, array(
// "label" => $graphItem['Month'] . ' ' . $graphItem['Year'], "value" => $graphItem['Count']
// ));
// }
// $jsonEncodedDataF = json_encode($visitsGraphValues);
// }

//

// $columnChart = new FusionCharts("mscolumn2d", "maleFemaleGraph1", "48%", 400, "maleFemaleGraph", "json", '{
// "chart": {
// "caption": "Monthly Registrations",
// "subcaption": "",
// "xaxisname": "Month",
// "yaxisname": "No. of Registrations",
// "formatnumberscale": "1",
// "plottooltext": "<b>$dataValue</b> apps were available on <b>$seriesName</b> in $label",
// "theme": "fusion",
// "drawcrossline": "1",
// "rotatelabels": "1"
// },
// "categories": [
// {
// "category": ' . $jsonEncodedDataL . '
// }
// ],
// "dataset": [
// {
// "seriesname": "Male",
// "data": ' . $jsonEncodedDataM . '
// },
// {
// "seriesname": "Female",
// "data": ' . $jsonEncodedDataF . '
// }
// ]
// }');

// $columnChart->render();

//

// echo $jsonEncodedDataM;
// echo $jsonEncodedDataL;
// echo $jsonEncodedDataF;





























// $columnChart = new FusionCharts("mscolumn2d", "maleFemaleGraph1", "48%", 400, "maleFemaleGraph", "json", '{
// "chart": {
// "caption": "Monthly Registrations",
// "subcaption": "",
// "xaxisname": "Years",
// "yaxisname": "Total number of apps in store",
// "formatnumberscale": "1",
// "plottooltext": "<b>$dataValue</b> apps were available on <b>$seriesName</b> in $label",
// "theme": "fusion",
// "drawcrossline": "1"
// },
// "categories": [
// {
// "category": [
// {
// "label": "2012"
// },
// {
// "label": "2013"
// },
// {
// "label": "2014"
// },
// {
// "label": "2015"
// },
// {
// "label": "2016"
// },
// {
// "label": "2017"
// },
// {
// "label": "2018"
// },
// {
// "label": "2019"
// },
// {
// "label": "2020"
// },
// {
// "label": "2021"
// }
// ]
// }
// ],
// "dataset": [
// {
// "seriesname": "iOS App Store",
// "data": [
// {
// "value": "125000"
// },
// {
// "value": "300000"
// },
// {
// "value": "480000"
// },
// {
// "value": "800000"
// },
// {
// "value": "1100000"
// },
// {
// "value": "900000"
// },
// {
// "value": "1100000"
// },
// {
// "value": "900000"
// },
// {
// "value": "1100000"
// },
// {
// "value": "900000"
// }
// ]
// },
// {
// "seriesname": "Google Play Store",
// "data": [
// {
// "value": "70000"
// },
// {
// "value": "150000"
// },
// {
// "value": "350000"
// },
// {
// "value": "600000"
// },
// {
// "value": "1400000"
// },
// {
// "value": "900000"
// },
// {
// "value": "1100000"
// },
// {
// "value": "900000"
// },
// {
// "value": "1100000"
// },
// {
// "value": "900000"
// }
// ]
// },
// {
// "seriesname": "Amazon AppStore",
// "data": [
// {
// "value": "10000"
// },
// {
// "value": "100000"
// },
// {
// "value": "300000"
// },
// {
// "value": "600000"
// },
// {
// "value": "900000"
// },
// {
// "value": "900000"
// },
// {
// "value": "1100000"
// },
// {
// "value": "900000"
// },
// {
// "value": "1100000"
// },
// {
// "value": "900000"
// }
// ]
// }
// ]
// }');

// $columnChart->render();

?>

<script>
  var maleFemaleGraphData = {
    labels: <?php echo $jsonEncodedDataL; ?>,
    datasets: [{
      type: 'bar',
      label: 'Male Registration (Monthly)',
      data: <?php echo $jsonEncodedDataM; ?>,
      borderColor: 'rgb(255, 99, 132)',
      backgroundColor: 'rgba(75, 192, 192, 0.5)'
      // backgroundColor: 'rgba(255, 99, 132, 0.5)'
    }, {
      type: 'bar',
      label: 'Female Registration (Monthly)',
      data: <?php echo $jsonEncodedDataF; ?>,
      fill: false,
      borderColor: 'rgb(54, 162, 235)',
      backgroundColor: 'rgba(255, 99, 132, 0.5)'
    }]
  };

  var maleFemaleGraphConfig = {
    type: 'scatter',
    data: maleFemaleGraphData,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  };
</script>