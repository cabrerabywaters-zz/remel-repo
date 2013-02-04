    <div class="accordion-heading">
      <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
        Recetas Anteriores
      </a>
    </div>
    <div id="collapseThree" class="accordion-body collapse">
      <div class="accordion-inner">

  <div class="row">

  <center> <div style="width: 50%; ;">
  <script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
                             $('#tablaRecetasVigentes').dataTable();
                        });
		</script>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="tablaRecetasVigentes">
	<thead>
		<tr>
			<th>Medico</th>
			<th>Fecha de Emision</th>
			<th>Fecha de Vencimiento</th>
			<th>Medicamentos</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($recetas as $datos => $dato) {
            echo "<tr>";
            foreach ($dato as $llave => $valor) {
                if ($llave == 'idReceta'){
                    echo '<td>';
					echo $valor;
                    $medicamentosReceta = Paciente::R_MedicamentosReceta($valor);
                    for($i=0;$i<count($medicamentosReceta);$i++){
                        echo $medicamentosReceta[$i]['Nombre_Comercial'].'</br>';
                    }
                }
                if ($llave == 'Nombre'){
                    echo '<td>';
                    echo $valor.' ';
                }
                if ($llave == 'Apellido_Paterno'){
                    echo $valor;
                    echo '</td>';
                }
                if ($llave == 'Fecha_Emision' || $llave == 'Fecha_Vencimiento'){
                    echo '<td>';
                    echo $valor;
                    echo '</td>';
                }                
            }
            echo "</tr>";
        }
		?>
	</tbody>
	<tfoot>
		<tr>
			<tr>
			<th>Medico</th>
			<th>Fecha de Emision</th>
			<th>Fecha de Vencimiento</th>
			<th>Medicamentos</th>
		</tr>
	</tfoot>
</table>
          
</div>
</center>
</div>
</div>
</div>
