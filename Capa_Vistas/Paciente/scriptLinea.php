 <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
          // script que le establece datos al grafico del paciente 
        var data = google.visualization.arrayToDataTable([
          ['Año', 'Visitas Personales', 'Visitas Totales'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Resumen de Visitas'
        };

        var chart = new google.visualization.LineChart(document.getElementById('Lineas'));
        chart.draw(data, options);
      }
    </script>