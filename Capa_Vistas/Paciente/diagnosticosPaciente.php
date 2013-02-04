<div class="accordion-heading">
<a class="btn btn-large btn-block active"  data-parent="#accordion2" >
    Mis Diagnósticos Históricos

</a>
 </div>
  <div id="collapsetwo">
  <div class="accordion-inner">
  
  <div class="row">

  <center> <div style="width: 90%; ;">
    		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
                             $('#tablaDignosticosPaciente').dataTable();
                        });
		</script>		
<table class="table table-bordered" cellpadding="0" cellspacing="0" border="2 px" class="display" id="tablaDignosticosPaciente">
	<thead>
		<tr>
            <th>Diagnostico</th>
            <th>Nombre del Médico</th>
            <th>Fecha</th>
            <th>Tipo</th>
            <th>Comentario</th>
		</tr>
	</thead>
	<tbody>
    <?php
		    foreach ($historialPaciente as $lineaHistorial) {
            echo "<tr>";
            echo "<td>".$lineaHistorial['nombreDiagnostico']."</td>";
            echo "<td>".$lineaHistorial['nombreMedico']." ".$lineaHistorial['apellidoMedico']."</td>";
            echo "<td>".$lineaHistorial['fechaConsulta']."</td>";
            echo "<td>".$lineaHistorial['nombreTipoDiagnostico']."</td>";
            echo "<td>".$lineaHistorial['comentarioDiagnostico']."</td>";
            echo "</tr>";
    }
	?>
	</tbody>
	<tfoot>
		<tr>
            <th>Diagnostico</th>
            <th>Nombre del Médico</th>
            <th>Fecha</th>
            <th>Tipo</th>
            <th>Comentario</th>
		</tr>
	</tfoot>
</table>
</div>
</center>
</div>  
</div>
</div>

