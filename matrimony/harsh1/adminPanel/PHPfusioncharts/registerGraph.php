<?php
include_once('../../../backend/connect.php');

$result = mysqli_query($conn, "SELECT COUNT('id') AS count FROM per_details WHERE id <> '11111'");
$row = mysqli_fetch_assoc($result);
$totalCount = $row['count'];
$result = mysqli_query($conn, "SELECT COUNT('id') AS count FROM per_details WHERE id <> '11111' GROUP BY gender HAVING gender='Male'");
$row = mysqli_fetch_assoc($result);
$maleCount = $row['count'];
$result = mysqli_query($conn, "SELECT COUNT('id') AS count FROM per_details WHERE id <> '11111' GROUP BY gender HAVING gender='Female'");
$row = mysqli_fetch_assoc($result);
$femaleCount = $row['count'];
$registerGraphValues = array();
// $registerGraphLabels = array();
$jsonEncodedDataValues = '';
// $jsonEncodedDataLabels = '';
// foreach ($visitsGraphResult as $graphItem) {
array_push($registerGraphValues, $totalCount);
array_push($registerGraphValues, $maleCount);
array_push($registerGraphValues, $femaleCount);
// }
$jsonEncodedDataValues = json_encode($registerGraphValues);

// include("fusioncharts/fusioncharts.php");

// $columnChart = new FusionCharts("line", "ex1", "48%", 410, "registerGraph", "json", '{
//   "chart": {
//     "caption": "Visits to Profiles",
//     "yaxisname": "No. of Visits",
//     "subcaption": "[Monthly]",
//     "numbersuffix": "",
//     "rotatelabels": "1",
//     "setadaptiveymin": "1",
//     "theme": "fusion"
//   },
//   "data": ' . $jsonEncodedData . '
// }');

// $columnChart->render();


// $registerGraph = new FusionCharts("pie2d", "registerGraph1", "48%", 400, "registerGraph", "json", '{
//   "chart": {
//     "caption": "Total Registrations",
//     "plottooltext": "<b>$percentValue</b> of web servers run on $label servers",
//     "showlegend": "1",
//     "showpercentvalues": "1",
//     "legendposition": "bottom",
//     "usedataplotcolorforlabels": "1",
//     "theme": "fusion"
//   },
//   "data": ' . $jsonEncodedData . '
// }');

// $registerGraph->render();
?>

<script>
  var registerGraphData = {
    labels: [
      'Total Users',
      'Male',
      'Female'
    ],
    datasets: [{
      label: 'Total Registrations',
      data: <?php echo $jsonEncodedDataValues; ?>,
      backgroundColor: [
        'rgb(255, 205, 86)',
        'rgb(54, 162, 235)',
        'rgb(255, 99, 132)'
      ],
      hoverOffset: 4
    }]
  };

  var registerGraphConfig = {
    type: 'pie',
    data: registerGraphData,
  };
</script>