<div class="accordion-heading">
    <a class="btn btn-large btn-block active" data-toggle="collapse" data-parent="#accordion3" >
        Mis Recetas

    </a>
</div>

<div id="collapsetwo">
    <div class="accordion-inner">

        <div class="row">

            <center> <div style="width: 90%; ;">
                       		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
                             $('#tablaMisRecetas').dataTable();
                        });
		</script>
<table class="table table-bordered" cellpadding="0" cellspacing="0" border="2 px" class="display" id="tablaMisRecetas">
	<thead>
		<tr>
			 <th>Folio</th>    
             <th>Nombre del Médico</th>
             <th>Fecha Emisión</th>
             <th>Medicamentos</th>
             <th>Diagnostico</th>		
		</tr>
	</thead>
	<tbody>
     <?php 
                                        foreach ($historialRecetas as $lineaRecetas) {
                                            echo "<tr folio='" . $lineaRecetas['folio'] . "'>";
                                            echo "<td>" . $lineaRecetas["folio"] . "</td>";
                                            echo "<td>" . $lineaRecetas["nombreMedico"] . " " . $lineaRecetas["apellidoMedico"] . "</td>";
                                            echo "<td>" . $lineaRecetas["fechaEmision"] . "</td>";
                                            echo '<td>';

                                            $medicamentosReceta = Paciente::R_MedicamentosReceta($lineaRecetas["folio"]);
                                            for ($i = 0; $i < count($medicamentosReceta); $i++) {
                                                echo $medicamentosReceta[$i]['Nombre_Comercial'] . '</br>';
                                            }
                                            echo '</td>';
                                            echo '<td><center><input  type="button" class="btn btn-info" value="' . $lineaRecetas["nombreDiagnostico"] . '"></center></td>';
                                            echo "</tr>";
                                        }
										?>
		
	</tbody>
	<tfoot>
		<tr>
			 <th>Folio</th>    
             <th>Nombre del Médico</th>
             <th>Fecha Emisión</th>
             <th>Medicamentos</th>
             <th>Diagnostico</th>		
		</tr>
	</tfoot>
</table>

</div>
</center>
</div>
</div>
</div>
                <script>
                    var folio = $(this).parent('tr').attr('folio');
                    var RUTPAciente = <?php echo $_SESSION['RUT']; ?>
  
  
                </script>