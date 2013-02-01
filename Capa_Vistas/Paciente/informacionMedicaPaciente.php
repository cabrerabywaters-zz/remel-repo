<div class="accordion-heading">
    <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion1" href="#collapseone2">
        Información Médica Registrada
    </a>
</div>
<div id="collapseone2" class="accordion-body collapse">
    	<div class="accordion-inner">
        <div class="row">
        <div class="span5" id="alergias">

     <center> <div style="width: 50%; ;">
   				 <table class="table table-hover table-bordered ">
  				 <thead>
                     <tr>
                     <th colspan="2"><center>Alergias</center></th>                 
                    </tr>
                    <tr>
                    <th><center>Tipo de Alergia</center></th>
                    <th><center>Nombre de Alergia</center></th>
                    </tr>
                </thead>
   <tbody>
  <?php    
  
  foreach ($alergiasPaciente as $datos => $dato)
   {
	  echo "<tr>";


                echo '<td idTipo="'.$dato['IdTipo'].'" rowspan="'.$dato['Cantidad'].'">';
                echo "<center>".$dato['Tipo']."</center>";
				echo '</td>';
			$idTipo=$dato['IdTipo'];
           $alergias=Paciente::R_AlergiaPaciente($idPaciente,$idTipo);
		   foreach($alergias as $value => $info)
		   {
			   echo '<td idAlergias="'.$info['IdAlergia'].'">';			   
			   echo "<center>".$info['Nombre']."</center>";
			   echo "</td>";
			   echo"</tr>";
			   echo"<tr>";
			 
			   
		   }
            echo "</tr>";

   }
		?>	   
			   
</tbody>
</table></div></center></div>  
		<div class="span5 offset2"><center><div style="width: 50%; ;">
  <table>
   <thead>
                     <tr>
                     <th>Condiciones</th>                      
                    </tr>
                </thead>
                <tr><td>
   <table class="table table-hover table-bordered">
   <tbody>
  <?php  foreach ($condicionesPaciente as $datos => $dato)
   {
	echo "<tr>";
	echo "<td>".$dato['Nombre']." </td>";
	echo "</tr>";   
	   
   }
?>
                </tbody>
            </table>
            </td></tr></table></div></center></div>

		</div>
        </div>
    </div>