    <div class="accordion-heading">
      <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        Información Médica Registrada
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
  	<div class="row-fluid">
 		 <div class="span6" id="divAlergias">
         <?php print_r($tiposAlergias); ?>
 			 <center>
 				 <table class="table table-hover">
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

  <tr>
    <td rowspan="3">medicamentos</td>
    <td><tr><td>resfrio</td></tr><tr><td>poxipol</td></tr><tr><td>agua</td></tr></td>
  </tr>
  <tr>
    <td>diabetes</td>
    <td><tr><td>hola</td></tr></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
  </tr>


  <?php 
  /* foreach ($tiposAlergias as $datos => $dato)
   {
	  echo '<tr idTipo="'.$dato['IdTipo'].'">';


                echo '<td  rowspan="'.$dato['Cantidad'].'">';
                echo $dato['Tipo'];
				echo '</td><td>';
			$idTipo=$dato['IdTipo'];
           $alergias=Paciente::R_AlergiaPaciente($idPaciente,$idTipo);
		   foreach($alergias as $value => $info)
		   {   echo"<tr>";
			   echo '<td idAlergias="'.$info['IdAlergia'].'">';			   
			   echo $info['Nombre'];
			   echo "</td>";
			   echo"</tr>";
			   
			 
			   
		   }

				echo"</td>";

            echo "</tr>";

   }
		*/ ?>	   
			   
			   
               
               
 </tbody>
 <tfoot>
 		<tr><td> 
			<form class="form-search" method="post">
			<div class="input-append">
  				<input id="alergias" type="text" idAlergia="0">
 				 <button class="btn" type="button" id="boton_alergias" disabled="disabled">Añadir</button>
  			</div>
			</form>
  		</td></tr>
</tfoot>
</table>
</center></div>
<div class="span6" id="condiciones"> <center>
  <table class="table table-hover">
   <thead>
                     <tr>
                     <th><center>Condiciones</center></th>                      
                    </tr>
                </thead>
                <tbody>

  <?php foreach ($condiciones as $datos => $dato)
   {
	echo '<tr idCondicion="'.$dato['idCondiciones'].'">';
	echo "<td><center>".$dato['Nombre']."</center></td>";
	echo "</tr>";   
	   
   } ?>
                </tbody>
<tfoot><tr><td> 
			<form class="form-search" method="post">
			<div class="input-append">
  				<input id="Condiciones" type="text">
  				<button class="btn" type="button" id="boton_condiciones" disabled="disabled">Añadir</button></div>
				</form></td></tr>	
				</tfoot></table></center>
		  </div> 
  		</div>
      </div>
    </div>
<script>

$( "#alergias" ).autocomplete({
                                /**
                             * esta función genera el autocomplete para el campo de diagnostico (input)
                             * al seleccionar y escribir 2 letras se ejecuta el ajax
                             * busca en la base de datos en el archivo autocompleteDiagnostico.php
                             * el jSon correspondiente a las coincidencias
                             * 
                             * Funcion select que ejecutará una accion cuando se devuelva
                             */        
                         source: function( request, response ){
                                	 
								$.ajax({
                                    url: "../../../ajax/autocompleteAlergias.php",
                                    data: {
                                        name_startsWith: request.term
    										                                
									},
									
                                    type: "post",
                                    success: function( data ){
                                        var output = jQuery.parseJSON(data); 
										              
                                        response( $.map( output, function( item ) {
                                           return {
											   
                                               label: item.Nombre
                                              ,idAlergia : item.idAlergia
											  ,idTipo : item.idTipo
											  ,Sintomas : item.Sintomas
											  ,Tipo : item.Tipo
											  
                                            }
                                        })//end map
                                        );  // end response
                                    }//end success

                                });//end ajax 
							}, // end source
                           select: function(event, ui){
                            var ID = ui.item.idAlergia
							var idTipo = ui.item.idTipo
							var Tipo = ui.item.Tipo
							var Sintomas = ui.item.Tipo
							$("#boton_alergias").removeAttr('disabled');
							$("#alergias").removeAttr('idAlergia').removeAttr('idTipo').removeAttr('nombreTipo').attr('idAlergia',ID).attr('idTipo',idTipo).attr('Tipo',Tipo).attr('Sintomas',Sintomas);
							},
                           minLength: 2,
                           open: function() {
                                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
                                }, //end open
                           close: function() {
                                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                                } //end close
		                        });
								

							//autocompleteDiagnosticos
$("#boton_alergias").click(function(){
var idAlergia = $("#alergias").attr('idAlergia');
var idTipo = $("#alergias").attr('idTipo');
var Tipo = $("#alergias").attr('Tipo');
var Sintomas = $("#alergias").attr('Sintomas');
var nombreAlergia = $("#alergias").val()
$.ajax({
		url: "../../../ajax/agregarAlergia.php",
		data: {idAlergia:idAlergia},
		type: "post",
		success: function(output){
		$("#divAlergias tbody").append('<tr><td idtipo"'+idTipo+'">'+Tipo+'</td><td idAlergias="'+idAlergia+'"><center>'+nombreAlergia+'</center></td></tr>');
		}

});
$("#boton_alergias").attr('disabled',"disable");
$("#alergias").attr("value","");
});
$( "#Condiciones" ).autocomplete({
                                /**
                             * esta función genera el autocomplete para el campo de diagnostico (input)
                             * al seleccionar y escribir 2 letras se ejecuta el ajax
                             * busca en la base de datos en el archivo autocompleteDiagnostico.php
                             * el jSon correspondiente a las coincidencias
                             * 
                             * Funcion select que ejecutará una accion cuando se devuelva
                             */        
                          source: function( request, response ){
                                	 
								$.ajax({
                                    url: "../../../ajax/autocompleteCondiciones.php",
                                    data: {
                                        name_startsWith: request.term
    										                                
									},
									
                                    type: "post",
                                    success: function( data ){
                                        var output = jQuery.parseJSON(data); 
										              
                                        response( $.map( output, function( item ) {
                                           return {
                                               label: item.Nombre
                                              ,id3 : item.idCondiciones
                                            }
                                        })//end map
                                        );  // end response
                                    }//end success

                                });//end ajax 
							}, // end source
                           select: function(event, ui){
                            var idCondicion = ui.item.id3
							$("#boton_condiciones").removeAttr('disabled');
							$('#Condiciones').removeAttr('idCondicion').attr('idCondicion',idCondicion);
							},
                           minLength: 2,
                           open: function() {
                                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
                                }, //end open
                           close: function() {
                                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                                } //end close
		                        });
								

							//autocompleteDiagnosticos
$("#boton_condiciones").click(function(){
var idCondicion = $("#Condiciones").attr('idcondicion')
var nombreCondicion = $("#Condiciones").val()
$.ajax({
		url: "../../../ajax/agregarCondicion.php",
		data: {"idCondicion":idCondicion},
		type: "post",
		success: function(output){ 
		$('#condiciones tbody').append('<tr><td idCondicion="'+idCondicion+'"><center>'+nombreCondicion+'</center></td></tr>');
		}

});
$("#boton_condiciones").attr('disabled',"disable");
$("#Condiciones").attr("value","");
});
</script>
