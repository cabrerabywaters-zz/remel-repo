<div class="accordion-heading">
  <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
  Información Personal del Paciente
  
  </a>
   <!-- despliega la informacion medica de la persona pacient econ al posbilidad de editar datos y queen registrados en un registro -->
  </div>
  <div id="collapseOne" class="accordion-body collapse">
  <div class="accordion-inner">
      <div class="row-fluid">
   <center> <div class="span12">
           <form id="funciona" class="form-inline" method="post" >
  
               <div class="span6 img-rounded fluid"> <!--div para datos personales-->
                   
                    <center> <table class="table table-bordered table-hover">
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
"><center><h5>Datos Personales</h5></center></th>                       

</tr>
</thead>
<tbody>

    <td>
                   
                   
    <center><div class="control-group">
        <label class="control-label" for="Nombre" ><strong>Nombre </strong> <br><input style="text-align:center;" class="input-xxlarge" type="text" id="Nombre" value="<?php echo"".$paciente['Nombre']." ".$paciente['Apellido_Paterno']." ".$paciente['Apellido_Materno'].""; ?>" disabled></label>
    </div></center>
    
   <center> <div class="control-group">
    <label class="control-label" for="Fecha" > <strong>Fecha de Nacimiento </strong> <br> <input style="text-align:center;" type="datetime" class="uneditable-input" id="Fecha" value="<?php 
    $fechaNac = explode(" ",$paciente['Fecha_Nac']); 
    $fechaNac = $fechaNac[0]; 
    echo $fechaNac; 
    ?>" disabled></label>&nbsp
    <label class="control-label" for="Sexo"><strong>Sexo </strong> <br>  <input style="text-align:center;" type="text" id="Sexo" value="<?php if($paciente['Sexo']=='1')
	{echo "Masculino";}
	else
	{echo "Femenino";} ?>" disabled></label>
    <br> <br>
    <label class="control-label" for="Peso"><strong>Peso [Kg]  </strong><br> <input style="text-align:center;" type="text" class="edicion"  id="Peso" value="<?php echo $paciente['Peso']; ?>"></label>
    <label class="control-label" for="Altura"><strong>Altura [Cm] </strong><br><input style="text-align:center;" type="text" class="edicion" id="Altura" value="<?php echo $paciente['altura']; ?>"></label>
    </div></center>
                   
                   <center> <div class="control-group">
    <label class="control-label" ><strong>Teléfono Móvil </strong><br><input style="text-align:center;" type="text" class="edicion" id="N_Celular" value="<?php echo $paciente['N_Celular']; ?>">  </label>
       <label class="control-label"><strong>Teléfono Fijo </strong> <br>  <input style="text-align:center;" type="text" class="edicion" id="N_Fijo" value="<?php echo $paciente['n_fijo']; ?>">  </label>
    </div></center>
                   
                    </td>
                    
                </tbody>
</table> </center> 
               </div> <!--!div para datos personales-->
               
               
   <div class="span6 img-rounded fluid"> <!--div para datos informacion de dirrección-->
       
     
      <center>   <table class="table table-bordered table-hover">
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
"><center><h5>Ubicación</h5></center></th>                      
                    </tr>
                </thead>
                <tbody>

                    <td>
                      <center>  <div class="control-group">
    <label class="control-label" for="Direccion"><strong>Dirección  </strong> <br> <input style="text-align:center;" type="text" class="edicion input-xxlarge" id="Direccion" value="<?php echo "".$paciente['Calle']." ";?>"></label>
    <br><br>
    <label class="control-label" for="Numero"><strong>Número</strong><br><input style="text-align:center;" type="text" class="edicion" id="Numero" value=" <?php echo " ".$paciente['Numero']." "; ?>"></label>
     <label class="control-label" for="Comuna"><strong>Comuna </strong> <br> <input style="text-align:center;" type="text" class="inline edicion" id="Comuna" value="<?php echo $comuna['Nombre']; ?>"></label>
     
                          </div>  
                         <div class="control-group">

    
   
        
    
    <label class="control-label" for="Region"><strong>Región </strong><br> <input style="text-align:center;" type="text" class="inline edicion" id="Region" value="<?php echo $region['Nombre']; ?>" disabled></label>
<label class="control-label" for="Pais"><strong>País </strong> <br><input style="text-align:center;" type="text" id="Pais" value="Chile" disabled></label>

    
    </div>
                        
                         <div class="control-group">
    <label class="control-label" for="Nacionalidad"><strong>Nacionalidad  </strong><br>  <input style="text-align:center;" type="text" id="Nacionalidad" value="<?php echo $paciente['Nacionalidad']; ?>" disabled></label>
    <label class="control-label" for="Etnia"><strong>Etnia </strong> <br> <input style="text-align:center;" type="text" id="Etnia" value="<?php echo $etnia['Nombre']; ?>" disabled></label>
    </div></center>
                    </td>
  
	
	   

                </tbody>
</table> </center> 
       
       
   </div><!--!div para datos informacion de dirrección-->
    
    
    <div class="span11 img-rounded"> <!--div para datos informacion de seguros-->
    
      <center>   <table class="table table-bordered table-hover">
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
"><center><h5>Otros</h5></center></th>                      
                    </tr>
                </thead>
                <tbody>

                    <td>
    <div class="control-group row-fluid">
    <label class="control-label pull-left" for="Prevision"><strong>Previsión de Salud</strong><br>  <input style="text-align:center;" type="text" class="edicion input-xlarge" id="Prevision" value="<?php echo $prevision['Nombre']; ?>"></label>
    <label class="control-label pull-right" for="Seguro"><strong>Compañía de Seguro</strong> <br> <input style="text-align:center;" type="text" class="edicion" id="Seguro" value="<?php echo $seguro['Nombre']; ?>"></label>

    </div>
     
    
                        
                          </td>
              
                </tbody>
</table> </center> 
    
    </div>
     
    
     
    <input id="guardar" type="button" class="btn btn-danger" value="Guardar">

           </form></div></div> </center>
    
    
  </div>
  </div>

<script>
    $('#guardar').hide();
    $('.edicion').change(function() {
                $('#guardar').show();
    });
  
    $("#guardar").click(function() {
                        var run = <?php echo $_SESSION['RUTPaciente'];   ?>;
                        var peso = $('#Peso').val();
                        var altura = $('#Altura').val();
                        var direccion = $('#Direccion').val();
                        var numero = $('#Numero').val();
                        var comuna = $('#Comuna').val();
                        var n_celular = $('#N_Celular').val();
                        var n_fijo = $('#N_Fijo').val();
                        var prevision = $('#Prevision').val();
                        var seguro = $('#Seguro').val();
                       
                $.ajax({
                      url:'../../ajax/actualizarDatosPaciente.php',
                      data: {
                            "RUN":run,
                            "Peso":peso, 
                            "Altura":altura, 
                            "Direccion":direccion, 
                            "Numero":numero,
                            "Comuna":comuna,
                            "N_celular":n_celular,
                            "N_fijo":n_fijo,
                            "Prevision":prevision,
                            "Seguro":seguro
                            
          },
                      type: 'post',
                      success: function(output){
                          
                        if(output==1)
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
                                    url: "../../ajax/autocompleteComuna.php",
                                    data: {
                                        
                                        name_startsWith: request.term
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
                              $('#Comuna').removeAttr('idComuna').attr('idComuna',ui.item.id3);
                              var comuna = ui.item.id3;
                              $.ajax({
                                    url: "../../../ajax/cambiarRegion.php",
                                    data: { "idComuna":comuna 
                                    },//end data
                                    type: "post",
                                    success:function(data){
                                        var ardilla = jQuery.parseJSON(data);
                                        $('#Region').val(ardilla[0].Nombre);
                                       $('#guardar').show();
                                        }//end success
                                    });//end ajax
                                }//end select
                            });//autocompleteComuna


//CAMBIAR LA QUERY PARA GUARDAR LOS DATOS!

 $( "#Prevision" ).autocomplete({
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
                                    url: "../../ajax/autocompletePrevision.php",
                                    data: {
                                        
                                        name_startsWith: request.term
                                    },
                                    type: "post",
                                    success: function( data ){
                                        
                                        var output = jQuery.parseJSON(data);
                                                                                
                                        response( $.map( output, function( item ) {
                                           return {
                                               label: item.Nombre
                                             
                                            }
                                            
                                        })//end map
                                        );  // end response
                                    }//end success

                                }); // end ajax
                            },  // end source
                           minLength: 2,
                           select: function(event, ui){
                                   $('#guardar').show();
                                }
                            });//autocompletePrevision
                            
$( "#Seguro" ).autocomplete({
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
                                    url: "../../ajax/autocompleteSeguro.php",
                                    data: {
                                        
                                        name_startsWith: request.term
                                    },
                                    type: "post",
                                    success: function( data ){
                                        
                                        var output = jQuery.parseJSON(data);
                                                                                
                                        response( $.map( output, function( item ) {
                                           return {
                                               label: item.Nombre
                                             
                                            }
                                            
                                        })//end map
                                        );  // end response
                                    }//end success

                                }); // end ajax
                            },  // end source
                           minLength: 2,
                           select: function(event, ui){
                                   $('#guardar').show();
                                }
                            });//autocompleteSeguro
</script>
