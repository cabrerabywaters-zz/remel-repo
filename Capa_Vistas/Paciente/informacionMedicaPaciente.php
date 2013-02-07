<div class="accordion-heading">
    <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion1" href="#collapseone2">
        Información Médica Registrada
    </a>
</div>
<!-- se despliegan las alergias del paciente y las condiciones del paciente -->
<div id="collapseone2" class="accordion-body collapse">
    	<div class="accordion-inner">
        <div class="row">
        <div class="span5" id="alergias">

     <center> <div style="width: 70%; ;">
   				 <table class="table table-hover table-bordered ">
  				 <thead>
                     <tr>
                     <th colspan="2" style="background: rgb(176,212,227); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(176,212,227,1) 0%, rgba(136,186,207,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(176,212,227,1)), color-stop(100%,rgba(136,186,207,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b0d4e3', endColorstr='#88bacf',GradientType=0 ); /* IE6-9 */
"><center><h4>Alergias / Intolerancias</h4></center></th>                
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
		<div class="span5 offset2"><center><div style="width: 70%; ;">
  <table class="table table-hover table-bordered">
   <thead>
                     <tr>
                     <th style="background: rgb(176,212,227); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(176,212,227,1) 0%, rgba(136,186,207,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(176,212,227,1)), color-stop(100%,rgba(136,186,207,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b0d4e3', endColorstr='#88bacf',GradientType=0 ); /* IE6-9 */
"><center><h4>Condiciones</h4></center></th>                   
                    </tr>
                </thead>
   <tbody>
  <?php  foreach ($condicionesPaciente as $datos => $dato)
   {
	echo "<tr>";
	echo "<td>".$dato['Nombre']." </td>";
	echo "</tr>";   
	   
   }
?>
                </tbody>

</table></div></center></div>

		</div>
        </div>
    </div>