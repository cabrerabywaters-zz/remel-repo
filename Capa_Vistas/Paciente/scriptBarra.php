<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
          // script que despliega datos del paciente datos de ejemplo
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
          "title": 'Cantidad Medicamentos Recetados',
          "vAxis": {title: 'Medicamentos',  titleTextStyle: {color: 'red'}},
          "width": 550,
          "height": 450
        };

        var chart = new google.visualization.BarChart(document.getElementById('Barra'));
        chart.draw(data, options);
      }
</script>