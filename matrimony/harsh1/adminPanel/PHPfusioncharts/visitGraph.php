<?php
include_once('../../../backend/connect.php');

$visitsGraphSQL = 'SELECT MONTHNAME(on_time) AS "Month", YEAR(on_time) AS "Year", COUNT(viewed_by) AS "Count" FROM views WHERE on_time >= DATE_SUB(NOW(), INTERVAL 12 MONTH) GROUP BY CONCAT(MONTH(on_time), YEAR(on_time)) ORDER BY on_time ASC';
$visitsGraphQuery = mysqli_query($conn, $visitsGraphSQL);
$visitsGraphValues = array();
$visitsGraphLabels = array();
// $jsonEncodedData = '';
$monthCountHelper = 12;
// if (mysqli_num_rows($visitsGraphQuery) > 0) {
$visitsGraphResult = mysqli_fetch_all($visitsGraphQuery, MYSQLI_ASSOC);
function monthGap($graphItem, $conn)
{
  global $monthCountHelper, $visitsGraphValues, $visitsGraphLabels;
  $requiredDate = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MONTHNAME(current_timestamp() - INTERVAL {$monthCountHelper} MONTH) as 'Month', YEAR(current_timestamp() - INTERVAL {$monthCountHelper} MONTH) as 'Year'"));
  if ($graphItem['Month'] == $requiredDate['Month'] && $graphItem['Year'] == $requiredDate['Year']) {
    // array_push($visitsGraphValues, array(
    //   "label" => $graphItem['Month'] . ' ' . $graphItem['Year'], "value" => $graphItem['Count']
    // ));
    array_push($visitsGraphLabels, $graphItem['Month'] . ' ' . $graphItem['Year']);
    array_push($visitsGraphValues, (int) $graphItem['Count']);
    $monthCountHelper = $monthCountHelper - 1;
  } else {
    if ($monthCountHelper >= 0) {
      // array_push($visitsGraphValues, array(
      //   "label" => $requiredDate['Month'] . ' ' . $requiredDate['Year'], "value" => "0"
      // ));
      array_push($visitsGraphLabels, $requiredDate['Month'] . ' ' . $requiredDate['Year']);
      array_push($visitsGraphValues, 0);
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
$jsonEncodedDataLabels = json_encode($visitsGraphLabels);
$jsonEncodedDataValues = json_encode($visitsGraphValues);
// }

// include("fusioncharts/fusioncharts.php");

// $visitGraph = new FusionCharts("line", "visitGraph1", "48%", 400, "visitGraph", "json", '{
//   "chart": {
//     "caption": "Profile Visists",
//     "yaxisname": "No. of Visits",
//     "xaxisname": "Month",
//     "subcaption": "[Monthly]",
//     "numbersuffix": "",
//     "rotatelabels": "1",
//     "setadaptiveymin": "1",
//     "theme": "fusion"
//   },
//   "data": ' . $jsonEncodedData . '
// }');

// $visitGraph->render();
?>

<script>
  var visitGraphData = {
    labels: <?php echo $jsonEncodedDataLabels; ?>,
    datasets: [{
      // type: 'bar',
      label: 'Profile Visits (Monthly)',
      data: <?php echo $jsonEncodedDataValues; ?>,
      borderColor: 'rgba(75, 192, 192, 0.5)',
      backgroundColor: 'rgba(75, 192, 192, 0.5)'
      // backgroundColor: 'rgba(255, 99, 132, 0.5)'
    }]
  };

  var visitGraphConfig = {
    type: 'line',
    fill: false,
    data: visitGraphData,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  };
</script>