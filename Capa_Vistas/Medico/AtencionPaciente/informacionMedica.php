    <div class="accordion-heading">
      <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        Información Médica Registrada
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
	  <?php 
function mostrarAlergias($alergias){ 
//print_r($alergias);
    echo'
  <div class="row">
  <div class="span5" id="alergias">
  <table>
   <thead>
                     <tr>
                     <th>Alergias</th>                      
                    </tr>
                </thead>
                <tr><td>
   <table class="table table-hover">';
			   $tipos=array();
			   $cantidad=count($alergias);
			   echo $cantidad;
               foreach ($alergias as $datos => $dato)
				{

					
					print_r($dato);
					
					$tipos[]=$dato['Tipo'];
					echo "<br>";
					echo"<td rowspan='"; if ($hola="hola")
					{					
						echo"".$dato['Cantidad']."";
												
					}echo "'>".$dato['Tipo']."
					</td><td>".$dato['Alergia']."</td></tr>";
				} 
				print_r($tipos);
				echo' </tbody>
            </table>
            </tr></td><tfoot><tr><td> 
			<form class="form-search">
			<div class="input-append">
  				<input class="span2" id="Alergias" type="text">
 				 <button class="btn" type="button">Añadir</button>
  			</div>
			</form>
  </td></tr></tfoot></table></div>';
}
  
function mostrarCondiciones($condiciones){  
print_r($condiciones);
    echo'<div class="span5 offset2">
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
				echo"	<tr>";
					$contador=1;
					foreach($dato as $valor)
					{
						$contador++;
						
					}
					
					echo"<td rowspan='".$contador."'>
						</td></tr>";
					
					foreach($dato as $valor)
					{
						$contador++;
						echo "<tr><td>$valor</td></tr>";
						
					}
					echo"</tr>";
				}
echo'
                </tbody>
            </table>
            </tr></td><tfoot><tr><td> 
			<form class="form-search">
			<div class="input-append">
  				<input class="span2" id="Condiciones" type="text">
  				<button class="btn" type="button">Añadir</button></div>
				</form></td></tr>	
				</tfoot></table>
			</div> 
  </div>';
  } 

          mostrarAlergias($alergias);
          mostrarCondiciones($condiciones); ?>
      </div>
    </div>
<script>
$( "#Condiciones" ).autocomplete({
                                source: function( request, response ) {
                                    $.ajax({
                                        url: "../../../ajax/autocompleteCondiciones.php",
                                        data: {
                                            name_startsWith: request.term
                                        },
                                        type: "post",
                                        success: function( data ) {
                         
                        
                                            var output = jQuery.parseJSON(data);
                       
                                            response( $.map( output, function( item ) {
                                                return {
                                                    label: item
                                                    // value: item.Nombre
                                                }
                                            }));
                                        }
                    
                                    });
                                },
                                minLength: 2,
                                open: function() {
                                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
                                },
                                close: function() {
                                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                                }
                            });
</script>
