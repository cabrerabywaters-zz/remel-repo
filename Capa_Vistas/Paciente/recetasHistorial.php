   
 <?php 
 require_once(dirname(__FILE__)."/../../convertToPDF.php");
 //esta es la funcion que es llamada con el Submit del Boton Imprimir 
 //Del modal del Firmar Receta
 if(isset($_POST['content'])){
//traermos el contenido del html para hacer el pdf desde el textarea del modal
     $html= $_POST['content'];
     $html = utf8_decode($html);
// usamos la función doPDF para crear el pdf
     doPDF('RecetaMedica_REMEL',$html,true,'../../css/formatoReceta.css'); 
     
    
 }
 // el archivo que genera el pdf del mpaciente al emitir su receta 
 ?>

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
           <th>Medicamentos</th>
                        <th>Diagnósticos</th>
            
            <th>Ver Receta</th>
           
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
                      echo '<td>';
                      $diagnos = Paciente::SeleccionarDiagnosticoXIdConsulta($dato['Id_consulta']);
                    foreach($diagnos as $diagnostico){
                         
                        echo "-".$diagnostico['Nombre']."<br>";
                        
                    }
                  
                     
                        echo '</td>';
                        echo'<td>';
                        
                      
                                 echo '<a class="btn btn-block imprimirreceta" href="#verReceta" role="button" data-toggle="modal" idconsulta="';         
                                      echo $dato['Id_consulta']; 
                        echo '" >Ver Receta</a> ';
                        
                        
                    
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
            <th>Medicamentos</th>
                        <th>Diagnóstico</th>
            
            <th>Ver Receta</th>
		</tr>
	</tfoot>
</table>
          
</div>
</center>
</div>
</div>
</div>
<!-- Modal de resumen de la receta-->
<div id="verReceta" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="resumenRecetaLabel" aria-hidden="true">
  
  <div class="modal-header">
      <center> <h3 id="resumenRecetaLabel">Reimpresión Receta N°  <span id="folioReceta"></span></h3></center>
  </div>
  
  <div class="modal-body" id="contenidoRecetaI">
      <table class="recetaHeader">
      <tr>
          <td colspan="3"> <h4><center><span id="LugarId">Hospital Regional de Rancagua</span></center></h4></td>
      </tr>
      <tr>
      
          <td  style="width:37%"><div class="datosDoctor">Doctor: <strong><span id="doctorI"></span> </strong></div></td>
          <td  style="width:26%"><div class="logoRed"><center><img src="../../imgs/clip_image002.jpg" width="130px" height="110px"></center></div></td>
          <td  style="width:37%"><div class="datosPaciente">Paciente:<strong> <span id="pacienteI"></span> </strong></div></td>
          
      <!-- en este div van los datos del doctor y del paciente que está siendo -->
      </tr>
      </table>
      <table class="recetaContenido">
      <tr><td colspan="3"><hr></td></tr>
      <tr><td colspan="3">
      <strong>Receta Médica Electrónica:</strong><br>
      <div class="row-fluid" id="resumenI">
          
      
      </div>
      </td>        
      </tr>
      </table>
      <table class="recetaFooter">
      <tr><td colspan="3"><hr></td></tr>    
      <tr>
         <td><div class="logoRemel pull-left"><img src="../../imgs/logo-remel-principal.png" height="90px" width="150px"></div></td>
         <td colspan="2"><div class="infoRemel"><strong>www.remel.cl</strong><br><strong>Dirección:</strong> Arzobispo Larraín Gandarillas 119, Providencia, Santiago. <br><strong>Telefonos:</strong> 562-23282153</div></td>
      </tr><!-- footer receta fisica -->
      </table>
</div>
  <div class="modal-footer">
    <form method="post" action="recetasHistorial.php">
    <textarea name="content" id="contentI" style="display:none"> </textarea>
   <button type="submit" id="submit" class="btn imprimir pull-right" ><strong>Re-imprimir Receta</strong> <i class="icon-print"></i></button>
    
    </form>
   
    <center><a class="btn btn-danger pull-left cancelarEmision" data-dismiss="modal" aria-hidden="true" ><strong>Volver</strong></a></center>
    
    
    </div><!-- modal footer -->

</div><!-- modal de resumen de la receta -->
<script>
    /*
     *Funcion que maneja el modal Resumen Receta cuando está escondido. (se borran los elementos puestos
     */
    $('#verReceta').on('hide',function(){
        $('#resumen').html('');
    });
    /*
     * Función que al hacer click en el boton "ver receta" hace el resumen completo de la 
     * receta. es necesario mostrar los diagnosticos con sus medicamentos asociados 
     * como listado
     */
    $('.imprimirreceta').click(function(){
         $.ajax({
         data: {'consulta' : $(this).attr('idconsulta'),
         
                   'tipo':"a"},
         url: '../../../ajax/reImprimirReceta.php',
         type: 'post',
         async: true,
         success: function(output){
		      
          //Se maneja el error 
                    if(output=='0')
                        {
                            alert('La receta no pudo ser desplegada');
                        }
                        //Cuando el ingreso de los datos de la receta es correcto
                   else{
                         output = jQuery.parseJSON(output) ;
                       $.each(output, function(index, value) {
                            
                               $('#folioReceta').html(value);
                         });
                        
                     
                   }
                      
         }//end success
       
       
       
   
   }); 
      
      $('#contentI').html($('#contenidoRecetaI').html());
    });
</script>