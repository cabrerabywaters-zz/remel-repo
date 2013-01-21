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
  <table>
   <thead>
                     <tr>
                     <th colspan="2">Alergias</th>                      
                    </tr>
                </thead>
                <tr><td>
   <table class="table table-hover">
   <tbody>
<tr><td><strong>Nombre</strong></td><td><strong>Sintomas</strong></td></tr>
 <?php  foreach ($alergiasPaciente as $datos => $dato)
   
   {
	echo "<tr>";
	echo "<td>".$dato['Alergia']." </td>";
	echo "<td>".$dato['Sintomas']."</td>";
	
	
	echo "</tr>";   
	   
   }
			   
			   
			   
?> </tbody>
            </table>
            </td></tr></table></div></center></div>  
		<div class="span5 offset2"><center><div style="width: 50%; ;">
  <table>
   <thead>
                     <tr>
                     <th>Condiciones</th>                      
                    </tr>
                </thead>
                <tr><td>
   <table class="table table-hover">
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