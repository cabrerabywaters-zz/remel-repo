<!DOCTYPE html>
<!-- header del CRUD-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Remel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script><!-- estilos bootstrap -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" /><!-- jQuery UI -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script><!-- jQuery -->
    <link href="../css/bootstrap.css" rel="stylesheet"> <!-- Estilo css de bootstrap -->
    <link href="../css/bootstrap-responsive.css" rel="stylesheet"><!-- estilo responsive de bootstrap -->
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap.no-icons.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <script type="text/javascript" language="javascript" src="../js/jquery.js"></script>
    <script type="text/javascript">                                         
   $(document).ready(function() {
        $( "#accordion" ).accordion({
            collapsible: true
        });
        $('#datepicker').datepicker();
    }); // end ready
    <!-- scripts de la datetable -->
    </script>
    
		<script type="text/javascript" language="javascript" src="../js/jquery.jeditable.js"></script>
		<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				/* Init DataTables */
				var oTable = $('#example').dataTable();
				
				/* Apply the jEditable handlers to the table */
				oTable.$('td').editable( '../examples_support/editable_ajax.php', {
					"callback": function( sValue, y ) {
						var aPos = oTable.fnGetPosition( this );
						oTable.fnUpdate( sValue, aPos[0], aPos[1] );
					},
					"submitdata": function ( value, settings ) {
						return {
							"row_id": this.parentNode.getAttribute('id'),
							"column": oTable.fnGetPosition( this )[2]
						};
					},
					"height": "14px",
					"width": "100%"
				} );
			} );
		</script>
    <!-- estilos para la tabla-->
    	<style type="text/css" title="currentStyle">
			@import "../css/demo_page.css";
			@import "../css/demo_table.css";
		</style>
        
    
</head>
<body>