<?php
// // An array of hash objects which stores data
// $arrChartData = array(
//   ["Venezuela", "290"],
//   ["Saudi", "260"],
//   ["Canada", "180"],
//   ["Iran", "140"],
//   ["Russia", "115"],
//   ["UAE", "100"],
//   ["US", "30"],
//   ["China", "30"]
// );

// $arrLabelValueData = array();
// // Pushing labels and values
// for ($i = 0; $i < count($arrChartData); $i++) {
//   array_push($arrLabelValueData, array(
//     "label" => $arrChartData[$i][0], "value" => $arrChartData[$i][1]
//   ));
// }

// echo '
// <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>

// <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>';

// // Chart Configuration stored in Associative Array
// $arrChartConfig = array(
//   "chart" => array(
//     "caption" => "Countries With Most Oil Reserves [2017-18]",
//     "subCaption" => "In MMbbl = One Million barrels",
//     "xAxisName" => "Country",
//     "yAxisName" => "Reserves (MMbbl)",
//     "numberSuffix" => "K",
//     "theme" => "fusion"
//   )
// );

// $arrChartConfig["data"] = $arrLabelValueData;
// // JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
// $jsonEncodedData = json_encode($arrChartConfig);

// include("fusioncharts/fusioncharts.php");
?>

<!-- <html> -->

<!-- <head> -->
<!-- <title>FusionCharts | My First Chart</title> -->
<!-- <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
  <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> -->
<!-- </head> -->

<!-- <body> -->
<!-- <canvas id="myChart" style="width:100%;max-width:700px"></canvas> -->

<!-- <script>
    var myChart = new Chart("myChart", {
      type: "line",
      data: {},
      options: {}
    });

    var xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
    var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

    new Chart("myChart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: "rgba(0,0,0,1.0)",
          borderColor: "rgba(0,0,0,0.1)",
          data: yValues
        }]
      },
      options: {
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            ticks: {
              min: 6,
              max: 16
            }
          }],
        }
      }
    });
  </script> -->




















<?php
// // Chart Configuration stored in Associative Array
// $arrChartConfig = array(
//   "chart" => array(
//     "caption" => "Countries With Most Oil Reserves [2017-18]",
//     "subCaption" => "In MMbbl = One Million barrels",
//     "xAxisName" => "Country",
//     "yAxisName" => "Reserves (MMbbl)",
//     "numberSuffix" => "K",
//     "theme" => "fusion"
//   )
// );
// // An array of hash objects which stores data
// $arrChartData = array(
//   ["Venezuela", "290"],
//   ["Saudi", "260"],
//   ["Canada", "180"],
//   ["Iran", "140"],
//   ["Russia", "115"],
//   ["UAE", "100"],
//   ["US", "30"],
//   ["China", "30"]
// );
// $arrLabelValueData = array();

// // Pushing labels and values
// for ($i = 0; $i < count($arrChartData); $i++) {
//   array_push($arrLabelValueData, array(
//     "label" => $arrChartData[$i][0], "value" => $arrChartData[$i][1]
//   ));
// }
// $arrChartConfig["data"] = $arrLabelValueData;

// // JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
// $jsonEncodedData = json_encode($arrChartConfig);

// // chart object
// $Chart = new FusionCharts("column2d", "MyFirstChart", "700", "400", "contentOut", "json", $jsonEncodedData);

// // Render the chart
// $Chart->render();
?>
<!-- <center>
    <div id="chart-container">Chart will render here!</div>
  </center> -->

<!-- </body> -->

<!-- </html> -->













<!-- <!DOCTYPE html>
<html>

<head> -->
<!-- <style>
    .chartOut {
      border: 1px solid red;
      width: 50vw;
      height: 27vw;
    }
  </style> -->
<!-- </head> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- <body> -->
<!-- <div class="chartOut" id="chart">
    <canvas id="myChart"></canvas>
  </div> -->
<!-- <div>
    <canvas id="myChart"></canvas>
  </div> -->
<script>
  // const ctx = document.getElementById('myChart').getContext('2d');

  var data = {
    labels: [
      'January',
      'February',
      'March',
      'April'
    ],
    datasets: [{
      type: 'bar',
      label: 'Bar Dataset',
      data: [10, 20, 30, 40],
      borderColor: 'rgb(255, 99, 132)'
      // backgroundColor: 'rgba(255, 99, 132, 0.5)'
    }, {
      type: 'bar',
      label: 'Line Dataset',
      data: [30, 40, 20, 50],
      fill: false,
      borderColor: 'rgb(54, 162, 235)',
      backgroundColor: 'rgba(255, 99, 132, 0.5)'
    }]
  };

  var config = {
    type: 'scatter',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  };

  // try {
  //   myChart.destroy();
  //   alert('Destroyed');
  // } catch (exeption) {

  // }

  // var myChart = new Chart(
  //   document.getElementById('visitGraphCanvas'),
  //   config
  // );
</script>

<!-- </body>

</html> -->