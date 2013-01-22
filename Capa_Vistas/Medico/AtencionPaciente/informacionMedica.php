    <div class="accordion-heading">
      <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        Información Médica Registrada
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
	  <?php 
function mostrarAlergias($alergias){ 
    echo'
  <div class="row-fluid">
  <div class="span6" id="alergias">
  <center>
  <table>
   <thead>
                     <tr>
                     <th colspan="2">Alergias</th>                      
                    </tr>
                </thead>
                <tr><td>
   <table class="table table-hover">
   <tbody>';
   foreach ($alergias as $datos => $dato)
   
   {
	echo "<tr>";
	echo "<td>".$dato['Alergia']." </td>";
	
	
	echo "</tr>";   
	   
   }
			   
			   
			   
              echo '</tbody>
            </table>
            </tr></td><tfoot><tr><td> 
			<form class="form-search" id="buscar_alergia" method="post">
			<div class="input-append">
  				<input id="Alergias" type="text">
 				 <button class="btn" type="button" id="boton_alergia">Añadir</button>
  			</div>
			</form>
  </td></tr></tfoot></table></center></div>';
}
  
function mostrarCondiciones($condiciones){  
    echo'<div class="span6"><center>
  <table>
   <thead>
                     <tr>
                     <th>Condiciones</th>                      
                    </tr>
                </thead>
                <tr><td>
   <table class="table table-hover">';
   foreach ($condiciones as $datos => $dato)
   {
	echo "<tr>";
	echo "<td>".$dato['Nombre']." </td>";
	echo "</tr>";   
	   
   }
echo'
                </tbody>
            </table>
            </tr></td><tfoot><tr><td> 
			<form class="form-search" id="buscar_condicion" method="post">
			<div class="input-append">
  				<input id="Condiciones" type="text">
  				<button class="btn" type="button" id="boton_condiciones">Añadir</button></div>
				</form></td></tr>	
				</tfoot></table></center>
			</div> 
  </div>';
  } 

          mostrarAlergias($alergias);
          mostrarCondiciones($condiciones); ?>
      </div>
    </div>
<script>
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

                                }); // end ajax
                            },  // end source
                           select: function(event, ui){
                                    $('#Condiciones').removeAttr('idCondiciones').attr('idCondiciones',ui.item.id3)
                                    $('#guardar_condiciones').removeAttr('disabled');
                                    $('#boton_ondiciones').removeAttr('disabled');
                                },
                           minLength: 2,
                           open: function() {
                                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
                                }, //end open
                           close: function() {
                                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                                } //end close
                            });//autocompleteDiagnosticos
$( "#Alergias" ).autocomplete({
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
                                              ,id3 : item.idAlergias
                                            }
                                            
                                        })//end map
                                        );  // end response
                                    }//end success

                                }); // end ajax
                            },  // end source
                           select: function(event, ui){
                                    $('#Alergias').removeAttr('idAlergia').attr('idAlergia',ui.item.id3)
                                    $('#guardar_alergia').removeAttr('disabled');
                                    $('#boton_alergia').removeAttr('disabled');
                                },
                           minLength: 2,
                           open: function() {
                                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
                                }, //end open
                           close: function() {
                                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                                } //end close
                            });//autocompleteDiagnosticos
</script>
