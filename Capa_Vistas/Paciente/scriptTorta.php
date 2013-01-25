<script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Doc Jose', 12],
          ['Doc Leo', 5],
          ['Doc Maria', 6],
          ['Doc Amor', 15],
          ['Doc Nacho', 4],
		  ['Doc Cesar', 2]
        ]);

        // Set chart options
        var options = {'title':'Visitas de los medicos',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('Torta'));
        chart.draw(data, options);
      }
    </script>