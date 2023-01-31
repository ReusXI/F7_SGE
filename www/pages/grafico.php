<?php
include_once 'conexion.php';
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['MES', 'TIEMPO DE INTERRUPCION'],
          <?php
          $sql_leer = "select MONTHNAME(f_incidente) as 'MES', sum(tiempo_interrupcion) AS 'TIEMPO DE INTERRUPCION' from evento WHERE f_incidente IS NOT NULL AND YEAR(f_incidente) = 2023 GROUP BY MONTH(f_incidente);";
          $gsent = $pdo->prepare($sql_leer);
          $gsent->execute();
          $resultado = $gsent->fetchAll();
          foreach ($resultado as $dato) :
            echo "['". $dato['MES'] ."',". $dato['TIEMPO DE INTERRUPCION'] ."],";
          endforeach
          ?>
          ['Otros', 0]
        ]);

        var options = {
          title: 'TIEMPO DE INTERRUPCION POR MES'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);

        var data = google.visualization.arrayToDataTable([
          ['MES', 'CANTIDAD DE INCIDENTES'],
          <?php
          $sql_leer = "select  MONTHNAME(f_incidente) as 'MES', count(codigo_incidente) AS 'CANTIDAD DE INCIDENTES' from evento WHERE f_incidente IS NOT NULL AND YEAR(f_incidente) = 2023 GROUP BY MONTH(f_incidente);";
          $gsent = $pdo->prepare($sql_leer);
          $gsent->execute();
          $resultado = $gsent->fetchAll();
          foreach ($resultado as $dato) :
            echo "['". $dato['MES'] ."',". $dato['CANTIDAD DE INCIDENTES'] ."],";
          endforeach
          ?>
        ]);

        var options = {
          title: 'Cantidad de Incidentes por Mes',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 650px; height: 500px; display:inline-block;"></div>
    <div id="curve_chart" style="width: 650px; height: 500px; display:inline-block;"></div>
  </body>
</html>