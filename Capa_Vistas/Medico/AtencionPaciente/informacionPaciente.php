  
<div class="accordion-heading">
  <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
  Información Personal del Paciente
  </a>
  </div>
  <div id="collapseOne" class="accordion-body collapse">
  <div class="accordion-inner">
   <center> <div style="width: 50%; ;"><form id="funciona" class="form-inline" method="post" >
    
    <div class="control-group">
    <label class="control-label" for="Nombre" ><strong>Nombre </strong> <br><input style="text-align:center;" class="span6" type="text" id="Nombre" value="<?php echo"".$paciente['Nombre']." ".$paciente['Apellido_Paterno']." ".$paciente['Apellido_Materno'].""; ?>" disabled></label>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="Fecha" > <strong>Fecha de Nacimiento </strong> <br> <input style="text-align:center;" type="datetime" class="span3 uneditable-input" id="Fecha" value="<?php echo $paciente['Fecha_Nac']; ?>" disabled></label>&nbsp
    <label class="control-label" for="Sexo"><strong>Sexo </strong> <br>  <input style="text-align:center;" type="text" class="span3" id="Sexo" value="<?php if($paciente['Sexo']=='1')
	{
		echo "Masculino";
	}
	else
	{
	echo "Femenino";	
	}; ?>" disabled></label>
    <br> <br>
    <label class="control-label" for="Peso"><strong>Peso [Kg]  </strong><br> <input style="text-align:center;" type="text" class="span3 edicion"  id="Peso" value="<?php echo $paciente['Peso']; ?>"></label>
    <label class="control-label" for="Altura"><strong>Altura [Cm] </strong><br><input style="text-align:center;" type="text" class="span3 edicion" id="Altura" value="<?php echo $paciente['altura']; ?>"></label>
    </div>
     <br> 
    <div class="control-group">
    <label class="control-label" for="Pais"><strong>País </strong> <br><input style="text-align:center;" type="text" class="span2" id="Pais" value="Chile" disabled></label>
    <label class="control-label" for="Region"><strong>Región </strong><br> <input style="text-align:center;" type="text" class="span2 inline edicion" id="Region" value="<?php echo $region['Nombre']; ?>" disabled></label>
    <label class="control-label" for="Comuna"><strong>Comuna </strong> <br> <input style="text-align:center;" type="text" class="span2 inline edicion" id="Comuna" value="<?php echo $comuna['Nombre']; ?>"></label>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="Direccion"><strong>Dirección  </strong> <br> <input style="text-align:center;" type="text" class="span4 edicion" id="Direccion" value="<?php echo "".$paciente['Calle']." ";?>"></label>
    <label class="control-label" for="Numero"><strong>Numero</strong><br><input style="text-align:center;" type="text" class="span2 edicion" id="Numero" value=" <?php echo " ".$paciente['Numero']." "; ?>"></label>
    </div>
 
    <div class="control-group">
    <label class="control-label" for="Nacionalidad"><strong>Nacionalidad  </strong><br>  <input style="text-align:center;" type="text" class="span3" id="Nacionalidad" value="<?php echo $paciente['Nacionalidad']; ?>" disabled></label>
    <label class="control-label" for="Etnia"><strong>Etnia </strong> <br> <input style="text-align:center;" type="text" class="span3" id="Etnia" value="<?php echo $etnia['Nombre']; ?>" disabled></label>
    </div>
       
    <div class="control-group">
    <label class="control-label" for="N_Celular N_Fijo"><strong>Teléfonos </strong> <br> <input style="text-align:center;" type="text" class="span3 edicion" id="N_Celular" value="<?php echo $paciente['N_Celular']; ?>">  
        <input style="text-align:center;" type="text" class="span3 edicion" id="N_Fijo" value="<?php echo $paciente['n_fijo']; ?>">  </label>
    </div>
     
    
    <div class="control-group">
    <label class="control-label" for="Isapre"><strong>Isapre </strong> <br> <input style="text-align:center;" type="text" class="span6" id="Isapre" value="<?php echo $prevision['Nombre']; ?>" disabled></label>
    </div>
     
    <input name="guardar" id="guardar" type="button" class="btn btn-danger" value="Guardar">
    
           </form></div> </center>
    
    
  </div>
  </div>

<script>
    $('#guardar').hide();
    $('.edicion').change(function() {
                $('#guardar').show();
    });
    $('#guardar').unbind('click').on('click',function() {
                $("#guardar").hide();
                
                $('.edicion').each(function(){
                        var run = <?php echo $paciente['rut'] ?> ;
                        var peso = $('#Peso').html()
                        var altura = $('#Altura').html()
                        var direccion = $('#Direccion').html()
                        var comuna = $('#Comuna').html()
                        var n_celular = $('#N_Celular').html()
                        var n_fijo = $('#N_Fijo').html()
                $.ajax({
                      url:'../../../ajax/actualizarDatosPaciente.php',
                      data: {RUN:run,
                      Peso:peso, 
                      altura:altura, 
                      Direccion:direccion, 
                      Comuna:comuna,
                      n_celular:n_celular,
                      n_fijo:n_fijo},
                      type: 'post',
                      success: function(output){
                        var data = jQuery.parseJSON(output);
                        
                        $('#Peso').html(data['peso']);
                        $('#Altura').html(data['altura']);
                        $('#Direccion').html(data['direccion']);
                        $('#Comuna').html(data['comuna']);
                        $('#N_Celular').html(data['N_celular']);
                        $('#N_Fijo').html(data['n_fijo']);
                      }
            });
       });
 });    
    
    
    
                    /*new Array(document.getElementById('Peso'),document.getElementById('Altura'),document.getElementById('Region').document.getElementById('Comuna'));
                for($i=0;editado[$i]<editado.lenght;$i++){
                alert(editado[$i].value);
                }
                });
                /*$("#Peso").each(function(){
                var editado = $(this);
                alert(editado);   */            
                
   
   /* $('#guardar').hide();
    $('.edicion').change(function() {
                $('#guardar').show();
    });
    $('#guardar').click(function() {
                $("#guardar").hide();
                var editado = $("#funciona").serialize();
                alert(editado);
                $.ajax({
                      url:'../../../ajax/actualizarDatosPaciente.php',
                      data: editado,
                      type: 'post',
                      success: function(output){
                        var data = jQuery.parseJSON(output);
                        
                        $('#Peso').html(data['peso']);
                        $('#Altura').html(data['altura']);
                        $('#Direccion').html(data['direccion']);
                        $('#Comuna').html(data['comuna']);
                        
                      }
                });
           });
           */
$( "#Comuna" ).autocomplete({
                                /**
                             * esta función genera el autocomplete para el campo de comuna (input)
                             * al seleccionar y escribir 2 letras se ejecuta el ajax
                             * busca en la base de datos en el archivo autocompleteComuna.php
                             * el jSon correspondiente a las coincidencias
                             * 
                             * Funcion select que ejecutará una accion cuando se devuelva
                             */        
                          source: function( request, response ){
                                $.ajax({
                                    url: "../../../ajax/autocompleteComuna.php",
                                    data: {
                                        name_startsWith: request.term
                                        
                                    },
                                    type: "post",
                                    success: function( data ){
                                        var output = jQuery.parseJSON(data);
                                                                                
                                        response( $.map( output, function( item ) {
                                           return {
                                               label: item.Nombre
                                              ,id3 : item.idComuna
                                            }
                                            
                                        })//end map
                                        );  // end response
                                    }//end success

                                }); // end ajax
                            },  // end source
                           select: function(event, ui){
                                    $('#comuna').removeAttr('idComuna').attr('idComuna',ui.item.id3)
                                  
                                },
                           minLength: 2,
                           open: function() {
                                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
                                }, //end open
                           close: function() {
                                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                                } //end close
                            });//autocompleteComuna

</script>
