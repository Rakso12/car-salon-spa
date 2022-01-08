<?php

class ChartView
{

    public function print_chart($array)
    {
        $jsvars = "";

        foreach ($array as $element) {

            $jsvars = $jsvars . "[" . "'" . $element["model"] . "'," . $element["visits"] . "],";
        }

        echo '<div id="piechart"></div>';

        echo "
          <script>
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
      
            function drawChart() {
                
              var data = google.visualization.arrayToDataTable([
                ['Model', 'Visits'],
                $jsvars
              ]);
      
              var options = {
                title: 'Car sell stats by CarDelivery'
              };
      
              var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      
              chart.draw(data, options);
            }
            window.onload = drawChart;
            window.onresize = drawChart;
         </script>";
    }
}
?>
