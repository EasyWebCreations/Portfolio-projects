<?php
include_once('../../../backend/connect.php');

$visitsGraphSQL = 'SELECT MONTHNAME(dateandtime) AS "Month", YEAR(dateandtime) AS "Year", COUNT(DISTINCT sender) AS "Count" FROM chat WHERE dateandtime >= DATE_SUB(NOW(), INTERVAL 13 MONTH) GROUP BY CONCAT(MONTH(dateandtime), YEAR(dateandtime)) ORDER BY dateandtime ASC';
$visitsGraphQuery = mysqli_query($conn, $visitsGraphSQL);
$visitsGraphValues = array();
$visitsGraphLabels = array();
$jsonEncodedDataValues = '';
$jsonEncodedDataLabels = '';
$monthCountHelper = 12;
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
    array_push($visitsGraphValues, $graphItem['Count']);
    $monthCountHelper = $monthCountHelper - 1;
  } else {
    if ($monthCountHelper >= 0) {
      // array_push($visitsGraphValues, array(
      //   "label" => $requiredDate['Month'] . ' ' . $requiredDate['Year'], "value" => "0"
      // ));
      array_push($visitsGraphLabels, $requiredDate['Month'] . ' ' . $requiredDate['Year']);
      array_push($visitsGraphValues, "0");
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

// $visitGraph = new FusionCharts("column2d", "chatGraph1", "48%", 400, "chatGraph", "json", '{
//   "chart": {
//     "caption": "Chats Stats",
//     "subcaption": "[Monthly]",
//     "xaxisname": "Month",
//     "yaxisname": "No. of People Who Chat",
//     "numbersuffix": "",
//     "theme": "fusion",
//     "rotatelabels": "1"
//   },
//   "data": ' . $jsonEncodedData . '
// }');

// $visitGraph->render();
?>

<script>
  var chatGraphData = {
    labels: <?php echo $jsonEncodedDataLabels; ?>,
    datasets: [{
      // type: 'bar',
      label: 'Chat Stats (Monthly)',
      data: <?php echo $jsonEncodedDataValues; ?>,
      borderColor: 'rgb(75, 192, 192)',
      backgroundColor: 'rgba(75, 192, 192, 0.5)'
      // backgroundColor: 'rgba(255, 99, 132, 0.5)'
    }]
  };

  var chatGraphConfig = {
    type: 'bar',
    // fill: false,
    data: chatGraphData,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  };
</script>