 <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
          // script que le establece datos al grafico del paciente 
        var data = google.visualization.arrayToDataTable([
          ['Mes', 'Cantidad'],
          ['Ene',  0],
          ['Feb',  2],
          ['Mar',  0],
          ['Abr',  0],
          ['May',  0],
          ['Jun',  0],
          ['Jul',  0],
          ['Ago',  0],
          ['Sep',  0],
          ['Oct',  0],
          ['Nov',  0],
          ['Dic',  0]
        ]);

        var options = {
          title: 'Recetas Mensuales',
          "width": 650,
          "height": 450
        };

        var chart = new google.visualization.LineChart(document.getElementById('Lineas'));
        chart.draw(data, options);
      }
    </script>