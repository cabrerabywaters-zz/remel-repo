    <div class="accordion-heading">
      <a class="btn btn-large btn-block" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree" id="recetas">
        Recetas Históricas
      </a>
    </div>
<!-- despleiga als recetas que esten vigentes con el medico para que este pueda ver que se le harecetado al paciente -->
    <div id="collapseThree" class="accordion-body collapse in">
      <div class="accordion-inner">

  <div class="row">

  <center> <div style="width: 90%; ;">
  <script type="text/javascript" charset="utf-8">
       $('#recetas').click(function(){
        
      
         $('html, body').animate({
            scrollTop: $("#recetas").offset().top
            }, 500); // animate
    })   
      
      
      
      
			$(document).ready(function(){
                             $('#tablaRecetasVigentes').dataTable();
                        });
		</script>
                
             
<table class="table table-bordered"  border="2" id="tablaRecetasVigentes">
	<thead style="background: rgb(176,212,227); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(176,212,227,1) 0%, rgba(136,186,207,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(176,212,227,1)), color-stop(100%,rgba(136,186,207,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b0d4e3', endColorstr='#88bacf',GradientType=0 ); /* IE6-9 */
">
		<tr>
			<th>Médico</th>
                        <th>Folio Receta</th>
			<th>Fecha de Emisión</th>
			<th>Fecha Estimada Fin de Tratamiento</th>
            <th>Diagnóstico</th>
            <th>Medicamentos</th>
           
		</tr>
	</thead>
	<tbody>
		<?php 
		$contador=0;
		foreach ($consultas as $consulta => $dato) {
			if($contador==0)
			{
				
			}
			if($contador==0)
			{
					echo "<tr>";            
                    echo '<td>';
					echo $dato['Nombre']." ".$dato['Apellido_Paterno']." ".$dato['Apellido_Materno'];
					echo '</td>';
                                         echo '<td>';
                                         $receta=Paciente::SeleccionarRecetasxConsulta($dato['Id_consulta']);
                                         
                                        foreach($receta as $recp)
                                        {
                                            echo $recp['idReceta']."<br>";
                                            
                                        }
                                       
                                          echo '</td>';
                                        
					echo '<td>';
                    echo $dato['Fecha'];
					echo '</td>';
					echo '<td>';
                                        
                               $fechaV = Paciente::SeleccionarFechaVencimientoxidConsulta($dato['Id_consulta']);
                               foreach($fechaV as $vencimiento)
                               {
                                   echo "-".$vencimiento['Fecha_Termino']."<br>";
                                   
                               }
                    
                    echo '</td>';
                    echo '<td>';
                  
                    $diagnos = Paciente::SeleccionarDiagnosticoXIdConsulta($dato['Id_consulta']);
                    foreach($diagnos as $diagnostico){
                         
                        echo "-".$diagnostico['Nombre']."<br>";
                        
                    }
                    
                    echo '</td>';
                      echo '<td>';
                      $receta=Paciente::SeleccionarRecetasxConsulta($dato['Id_consulta']);
                      foreach($receta as $recp)
                                        {
                                           $medica= Paciente::medicamentosByIdReceta($recp['idReceta']);
                                            foreach($medica as $medicamentos)
                                            {
                                                echo "-".$medicamentos['Nombre_Comercial']."<br>";
                                                
                                            }
                                        }
                     
                        echo '</td>';
				
                    echo '</td>';
					echo "</tr>";
			}
        }
		?>
	</tbody>
	<tfoot style="background: rgb(176,212,227); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(176,212,227,1) 0%, rgba(136,186,207,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(176,212,227,1)), color-stop(100%,rgba(136,186,207,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b0d4e3', endColorstr='#88bacf',GradientType=0 ); /* IE6-9 */
">
		<tr>
			<tr>
			<th>Médico</th>
                        <th>Folio Receta</th>
			<th>Fecha de Emision</th>
			<th>Fecha estimada Fin de Tramiento</th>
            <th>Diagnóstico</th>
            <th>Medicamentos</th>
		</tr>
	</tfoot>
</table>
          
</div>
</center>
</div>
</div>
</div>
