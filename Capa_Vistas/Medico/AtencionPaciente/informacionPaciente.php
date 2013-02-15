  
<div class="accordion-heading">
  <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion2" href="#collapseOne" id="infopaciente">
  Información Personal del Paciente
  
  </a>
   <!-- despliega la informacion medica de la persona pacient econ al posbilidad de editar datos y queen registrados en un registro -->
  </div>
  <div id="collapseOne" class="accordion-body collapse">
  <div class="accordion-inner">
      <div class="row-fluid">
           <div class="span12">
           <form id="funciona" class="form-inline" method="post" >
  
               <div class="span6 img-rounded fluid"> <!--div para datos personales-->
                   
   <table class="table table-bordered table-hover">
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
   <tr> 
   <td>
                   
  <div class="row-fluid">                 
    <div class="span12">
        <center><strong>Nombre </strong></center>
        <input style="text-align:center;" class="span12" type="text" id="Nombre" value="<?php echo"".$paciente['Nombre']." ".$paciente['Apellido_Paterno']." ".$paciente['Apellido_Materno'].""; ?>" disabled>
        <br>
    </div><!-- end nombre -->
  </div><!-- end row-->
  <br>     
  <div class="row-fluid">  
    
    <div class="span6">
    <center><strong>Fecha de Nacimiento </strong></center>
    <input style="text-align:center;" class="span12" type="text" id="Fecha" value="<?php 
    $fechaNac = explode(" ",$paciente['Fecha_Nac']); 
    $fechaNac = $fechaNac[0]; 
    echo $fechaNac; 
    ?>" disabled>&nbsp
    </div><!-- fecha de nacimiento -->
      
    <div class="span6">
    <center><strong>Sexo</strong></center>
    <input style="text-align:center;" class="span12" type="text" id="Sexo" value="<?php if($paciente['Sexo']=='1')
	{echo "Masculino";}
	else
	{echo "Femenino";} ?>" disabled>
    </div><!-- sexo -->
    
  </div><!-- end row -->
  
  <div class="row-fluid">
      
      <div class="span6">
          <center><strong>Peso [Kg]</strong></center>
          <input style="text-align:center;" type="text" class="span12 edicion int"  id="Peso" value="<?php echo trim($paciente['Peso']); ?>">
      </div><!-- peso -->
      
      <div class="span6">
          <center><strong>Altura [Cm] </strong></center>
          <input style="text-align:center;" type="text" class="span12 edicion int" id="Altura" value="<?php echo trim($paciente['altura']); ?>"></label>
      </div><!-- altura -->
      
  </div><!-- end row -->
  <br>                 
  <div class="row-fluid">
      
      <div class="span6">
          <center><strong>Teléfono Móvil </strong></center>
          <input style="text-align:center;" type="text" class="span12 edicion int" id="N_Celular" value="<?php echo trim($paciente['N_Celular']); ?>">
      </div><!-- fono movil -->
      
      <div class="span6">
          <center><strong>Teléfono Fijo </strong></center>
          <input style="text-align:center;" type="text" class="span12 edicion int" id="N_Fijo" value="<?php echo trim($paciente['n_fijo']); ?>">
      </div><!-- fono fijo -->
      
  </div><!-- end row -->       
    
   </td>
   </tr>                 
</tbody>
</table>
                    </center> 
               </div> <!--!div para datos personales-->
               
               
   <div class="span6 img-rounded fluid"> <!--div para datos informacion de dirección-->
       
     
   <table class="table table-bordered table-hover">
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
   <tr>
   <td>
    <div class="row-fluid">
        <center><strong>Dirección</strong></center>
        <input style="text-align:center;" type="text" class="edicion span12 varChar" id="Direccion" value="<?php echo trim($paciente['Calle']);?>">
    </div><!-- end row nombre calle-->
    <br>  
     
    <div class="row-fluid">
        <div class="span6">
        <center><strong>Número</strong></center>
        <input style="text-align:center;" type="text" class="span12  int" id="Numero" value=" <?php echo trim($paciente['Numero']); ?>">
        </div><!-- calle numero -->
         
        <div class="span6">
        <center><strong>Comuna</strong></center>
        <input style="text-align:center;" type="text" class="span12 edicion varChar" id="Comuna" value="<?php echo trim($comuna['Nombre']); ?>">
        </div><!-- comuna -->
    </div>
    <br>
    <div class="row-fluid">
        <div class="span6">
             <center><strong>Región </strong></center>
             <input style="text-align:center;" type="text" class="span12 edicion varChar" id="Region" value="<?php echo trim($region['Nombre']); ?>" disabled>
        </div><!-- region -->
         
        <div class="span6">
             <center><strong>País </strong></center>
             <input class="span12" style="text-align:center;" type="text" id="Pais" value="Chile" disabled>
        </div><!-- pais -->
    </div><!-- end row -->
    <br>
    <div class="row-fluid">
        <div class="span6">
        <center><strong>Nacionalidad</strong></center>
            <input class="span12" style="text-align:center;" type="text" id="Nacionalidad" value="<?php echo trim($paciente['Nacionalidad']); ?>" disabled>
        </div><!-- nacionalidad -->
        
        <div class="span6">
            <center><strong>Etnia </strong></center>
            <input class="span12" style="text-align:center;" type="text" id="Etnia" value="<?php echo trim($etnia['Nombre']); ?>" disabled>
        </div><!-- etnia -->
    </div>
   </td>
   </tr>                
   </tbody>
   </table>
  </div><!--!div para datos informacion de dirrección-->
    
  <div class="row-fluid">
    <div class="span12 img-rounded"> <!--div para datos informacion de seguros-->
    
   <table class="table table-bordered table-hover">
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
   "><center><h5>Otros</h5></center>
   </th>                      
   </tr>
   </thead>
   <tbody>
   <tr>    
   <td>
    <div class="row-fluid">
        <div class="span6">
            <center><strong>Previsión de Salud</strong></center>
            <input style="text-align:center;" type="text" class="edicion span12 varChar" id="Prevision" value="<?php echo $prevision['Nombre']; ?>">
        </div><!-- prevision de salud -->
        
        <div class="span6">
            <center><strong>Compañía de Seguro</strong></center>
            <input style="text-align:center;" type="text" class="edicion span12 varChar" id="Seguro" value="<?php echo $seguro['Nombre']; ?>">
        </div><!-- seguro -->
    </div><!-- row otros -->
    </td>
    </tbody>
    </table> 
    
    </div><!-- div informacion seguros y prevision -->
  </div> <!-- end row -->  
    
    <div class="row-fluid">
        <center><a id="guardar" class="btn btn-danger" style="display:none"><strong>Guardar Cambios <i class="icon-lock icon-white"></i></strong></a></center>
    </div><!-- row del boton guardar cambios -->
    </form>
    </div><!-- end div span12 -->
    </div><!-- end row-fluid --> 
  </div><!-- accordion inner -->
  </div><!-- body .collapse-->

<script>
    $('.edicion').change(function(){
        $('#guardar').show();
    }); // se muestra el boton guadar al modificar algun campo (modificable)
    
    $('#infopaciente').click(function(){
        $('html, body').animate({
            scrollTop: $("#infopaciente").offset().top
            }, 500); // animate
    });// focus visual de la seccion de informaciòn paciente
</script>    
<script>    
    /*
     *Funcion que guarda los datos de paciente modificados
     */
    $("#guardar").click(function(){
                        var run = <?php echo trim($_SESSION['RUTPaciente']);?>;
                        var peso = $.trim($('#Peso').val());
                        
                        var altura = $.trim($('#Altura').val());
                        var direccion = $.trim($('#Direccion').val());
                        var numero = $.trim($('#Numero').val());
                        var comuna = $.trim($('#Comuna').val());
                        var n_celular = $.trim($('#N_Celular').val());
                        var n_fijo = $.trim($('#N_Fijo').val());
                        var prevision = $.trim($('#Prevision').val());
                        var seguro = $.trim($('#Seguro').val());
                       
                $.ajax({
                      url:'../../../ajax/actualizarDatosPaciente.php',
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
                          /*
                           *se verifica la actualizacion correcta
                           */
                        if(output==1){ 
                            $("#guardar").hide();
                            }
                        else{
                            alert('No se pudo insertar el campo');
                            }
                        }//success
            });//end ajax
});//end click
</script><!-- guardar cambios infoPaciente -->    
<script>    
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
</script>
<script>
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
</script><!-- autocomplete comuna -->
<script>
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
                                    url: "../../../ajax/autocompletePrevision.php",
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
</script><!-- autocomplete prevision -->
<script>
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
                                    url: "../../../ajax/autocompleteSeguro.php",
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
</script><!-- autocomplete seguro -->
