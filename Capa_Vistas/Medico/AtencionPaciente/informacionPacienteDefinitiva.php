<div class="accordion-heading">
  <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
  Información Personal del Paciente
  
  </a>
  </div>
  <div id="collapseOne" class="accordion-body collapse">
  <div class="accordion-inner row-fluid">
   <center> <div class="span12">
           <form id="funciona" class="form-inline" method="post" >
    
    <div class="control-group">
    <label class="control-label" for="Nombre" ><strong>Nombre </strong> <br><input style="text-align:center;" type="text" id="Nombre" value="<?php echo"".$paciente['Nombre']." ".$paciente['Apellido_Paterno']." ".$paciente['Apellido_Materno'].""; ?>" disabled></label>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="Fecha" > <strong>Fecha de Nacimiento </strong> <br> <input style="text-align:center;" type="datetime" class="uneditable-input" id="Fecha" value="<?php echo $paciente['Fecha_Nac']; ?>" disabled></label>&nbsp
    <label class="control-label" for="Sexo"><strong>Sexo </strong> <br>  <input style="text-align:center;" type="text" id="Sexo" value="<?php if($paciente['Sexo']=='1')
	{
		echo "Masculino";
	}
	else
	{
	echo "Femenino";	
	}; ?>" disabled></label>
    <br> <br>
    <label class="control-label" for="Peso"><strong>Peso [Kg]  </strong><br> <input style="text-align:center;" type="text" class="edicion"  id="Peso" value="<?php echo $paciente['Peso']; ?>"></label>
    <label class="control-label" for="Altura"><strong>Altura [Cm] </strong><br><input style="text-align:center;" type="text" class="edicion" id="Altura" value="<?php echo $paciente['altura']; ?>"></label>
    </div>
     <br> 
    <div class="control-group">
    <label class="control-label" for="Pais"><strong>País </strong> <br><input style="text-align:center;" type="text" id="Pais" value="Chile" disabled></label>

   
    <label class="control-label" for="Region"><strong>Región </strong><br>
    <select name="cars" style="text-align:center;" type="text" class="inline edicion" id="Region">
        
        
<?php  
  include_once("../../../Capa_Controladores/region.php");
    
    $arrayRegiones =  Region::Seleccionar("");
    
  
  foreach ($arrayRegiones  as $campo=>$valor){
    echo "<option value='".$valor['idRegion']."'>". $valor['Nombre'] ."</option>";
    
  }
?>  
        
          </select>
    </label>
    
    
    <label class="control-label" for="Comuna"><strong>Comuna </strong> <br> <input style="text-align:center;" type="text" class="inline edicion" id="Comuna" value="<?php echo $comuna['Nombre']; ?>"></label>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="Direccion"><strong>Dirección  </strong> <br> <input style="text-align:center;" type="text" class="edicion" id="Direccion" value="<?php echo "".$paciente['Calle']." ";?>"></label>
    <label class="control-label" for="Numero"><strong>Numero</strong><br><input style="text-align:center;" type="text" class="edicion" id="Numero" value=" <?php echo " ".$paciente['Numero']." "; ?>"></label>
    </div>
 
    <div class="control-group">
    <label class="control-label" for="Nacionalidad"><strong>Nacionalidad  </strong><br>  <input style="text-align:center;" type="text" id="Nacionalidad" value="<?php echo $paciente['Nacionalidad']; ?>" disabled></label>
    <label class="control-label" for="Etnia"><strong>Etnia </strong> <br> <input style="text-align:center;" type="text" id="Etnia" value="<?php echo $etnia['Nombre']; ?>" disabled></label>
    </div>
       
    <div class="control-group">
    <label class="control-label" for="N_Celular N_Fijo"><strong>Teléfonos </strong> <br> <input style="text-align:center;" type="text" class="edicion" id="N_Celular" value="<?php echo $paciente['N_Celular']; ?>">  
        <input style="text-align:center;" type="text" class="edicion" id="N_Fijo" value="<?php echo $paciente['n_fijo']; ?>">  </label>
    </div>
     
     
    <div class="control-group">
    <label class="control-label" for="Prevision"><strong>Previsión</strong><br>  <input style="text-align:center;" type="text" class="edicion" id="Prevision" value="<?php echo $prevision['Nombre']; ?>"></label>
    </div>
     
    <div class="control-group">
    <label class="control-label" for="Seguro"><strong>Seguro</strong> <br> <input style="text-align:center;" type="text" class="edicion" id="Seguro" value="<?php echo $seguro['Nombre']; ?>"></label>
    </div> 
     
    <input id="guardar" type="button" class="btn btn-danger" value="Guardar">

           </form></div> </center>
    
    
  </div>
  </div>

<script>
    $('#guardar').hide();
    $('.edicion').change(function() {
                $('#guardar').show();
    });
  
    $("#guardar").click(function() {
                        var run = <?php echo $_SESSION['RUT'];   ?>;
                        var peso = $('#Peso').val();
                        var altura = $('#Altura').val();
                        var direccion = $('#Direccion').val();
                        var numero = $('#Numero').val();
                        var comuna = $('#Comuna').val();
                        var n_celular = $('#N_Celular').val();
                        var n_fijo = $('#N_Fijo').val();
                       
                       
                $.ajax({
                      url:'../../../ajax/actualizarDatosPaciente.php',
                      data: {
                          RUN:run,
                          Peso:peso, 
                         altura:altura, 
                        Direccion:direccion, 
                        Numero:numero,
                        Comuna:comuna,
                         n_celular:n_celular,
                        n_fijo:n_fijo
                  
          },
                      type: 'post',
                      success: function(output){
                                               
                        if(output=="1")
                            {
                                $("#guardar").hide();
                            }
                            else{
                                alert('No se pudo insertar el campo');
                            }
                            
        
                        
                      }
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
$('#Region').change(function(){
    $("#Comuna").removeAttr('value')
});

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
                                        
                                        name_startsWith: request.term,
                                        idRegion: $('#Region').attr('value')
                                    },
                                    type: "post",
                                    success: function( data ){
                                        
                                        var output = jQuery.parseJSON(data);
                                                                                
                                        response( $.map( output, function( item ) {
                                           return {
                                               label: item.Nombre,
                                               id3: item.idComuna
                                             
                                            }
                                            
                                        })//end map
                                        );  // end response
                                    }//end success

                                }); // end ajax
                            },  // end source
                           minLength: 2,
                           select: function(event, ui){
                                   
                                }
                            });//autocompleteComuna

                            
                         
       //change regiones
       
  /*     $('#Region').change(function(){
	$.ajax({
		url: "../../../ajax/selectComunas.php",
                data: {
                    
                 idRegion: $('#Region').attr('idRegion');
                    
                }
		success: function(output){
				var output = jQuery.parseJSON(output);
				$.each(output,function(i,el){
					nombre comunas que tienen el id region
				});//end each
			}// end        
                });
       });
      */
     
</script>