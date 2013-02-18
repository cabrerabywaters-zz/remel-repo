  
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
               <div class="alert alert-info"><small>Ultima Actualizacion: 
                    <strong><span id="ultimoLog">
                 <?php include_once(dirname(__FILE__) . '/../../../ajax/mostrarUltimoLog.php'); ?>              
                    </span></strong></small></div>
               <div id="estado"></div>     
           <form id="funciona" class="form-inline" method="post" >
  
               <div class="span6 img-rounded fluid"> <!--div para datos personales-->
                   
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
   "><center><h4>Datos Personales</h4></center></th>                       
   </tr>
   </thead>
   <tbody>
   <tr> 
   <td>
                   
  <div class="row-fluid">                 
    <div class="span12 control-group">
        <center><label class="control-label" for="Nombre"><strong>Nombre </strong></label></center>
        <div class="controls">
        <input style="text-align:center;" class="span12" type="text" id="Nombre" value="<?php echo"".$paciente['Nombre']." ".$paciente['Apellido_Paterno']." ".$paciente['Apellido_Materno'].""; ?>" disabled>
        </div><!-- controls -->
    </div><!-- end nombre control-group -->
  </div><!-- end row-->
       
  <div class="row-fluid">  
    
    <div class="span6 control-group">
    <center><label class="control-label" for="Fecha"><strong>Fecha de Nacimiento</strong></label></center>
    <div class="controls">
    <input style="text-align:center;" class="span12" type="text" id="Fecha" value="<?php 
    $fechaNac = explode(" ",$paciente['Fecha_Nac']); 
    $fechaNac = $fechaNac[0]; 
    echo $fechaNac; 
    ?>" disabled>
    </div><!-- controls -->
    </div><!-- fecha de nacimiento control-group -->
      
    <div class="span6 control-group">
    <center><label class="control-label" for="Sexo"><strong>Sexo</strong></label></center>
    <div class="controls">
    <input style="text-align:center;" class="span12" type="text" id="Sexo" value="<?php if($paciente['Sexo']=='1')
	{echo "Masculino";}
	else
	{echo "Femenino";} ?>" disabled>
    </div><!-- controls -->
    </div><!-- sexo control-group -->
    
  </div><!-- end row -->
  
  <div class="row-fluid">
      
      <div class="span6 control-group">
          <center><label class="control-label" for="Peso"><strong>Peso [Kg]</strong></label></center>
          <div class="controls">
          <input style="text-align:center;" type="text" class="span12 edicion int"  id="Peso" value="<?php echo trim($paciente['Peso']); ?>">
          </div><!-- controls -->
      </div><!-- control-group peso -->
      
      <div class="span6 control-group">
          <center><label class="control-label" for="Altura"><strong>Altura [Cm] </strong></label></center>
          <div class="controls">
          <input style="text-align:center;" type="text" class="span12 edicion int" id="Altura" value="<?php echo trim($paciente['altura']); ?>">
          </div><!-- controls -->
      </div><!-- altura control-group-->
      
  </div><!-- end row -->
                
  <div class="row-fluid">
      
      <div class="span6 control-group">
          <center><label class="control-label" for="N_Celular"><strong>Teléfono Móvil </strong></label></center>
          <div class="controls">
          <input style="text-align:center;" type="text" class="span12 edicion int" id="N_Celular" value="<?php echo trim($paciente['N_Celular']); ?>">
          </div><!-- controls -->
      </div><!-- fono movil controlgroup-->
      
      <div class="span6 control-group">
          <center><label class="control-label" for="N_Fijo"><strong>Teléfono Fijo</strong></label></center>
          <div class="controls">
          <input style="text-align:center;" type="text" class="span12 edicion int" id="N_Fijo" value="<?php echo trim($paciente['n_fijo']); ?>">
          </div><!-- controls -->
      </div><!-- fono fijo control group-->
      
  </div><!-- end row -->       
    
   </td>
   </tr>                 
</tbody>
</table>
                    </center> 
               </div> <!--!div para datos personales-->
               
               
   <div class="span6 img-rounded fluid"> <!--div para datos informacion de dirección-->
       
     
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
"><center><h4>Ubicación</h4></center></th>                      
   </tr>
   </thead>
   <tbody>
   <tr>
   <td>
    <div class="row-fluid control-group">
        <center><label class="control-label" for="Direccion"><strong>Dirección</strong></label></center>
        <div class="controls">
        <input style="text-align:center;" type="text" class="edicion span12 varChar" id="Direccion" value="<?php echo trim($paciente['Calle']);?>">
        </div><!-- controls -->
    </div><!-- end row direccion control group-->
     
    <div class="row-fluid">
        <div class="span6 control-group">
        <center><label class="control-label" for="Numero"><strong>Número</strong></label></center>
        <div class="controls">
        <input style="text-align:center;" type="text" class="span12 edicion int" id="Numero" value="<?php echo trim($paciente['Numero']); ?>">
        </div><!-- controls -->
        </div><!-- calle numero control.group-->
         
        <div class="span6 control-group">
        <center><label class="control-label" for="Comuna"><strong>Comuna</strong></label></center>
        <div class="controls">
        <input style="text-align:center;" type="text" class="span12 edicion varChar" id="Comuna" value="<?php echo trim($comuna['Nombre']); ?>">
        </div><!-- controls -->
        </div><!-- comuna control-group-->
    </div>
   
    <div class="row-fluid">
        <div class="span6 control-group">
             <center><label class="control-label" for="Region"><strong>Región</strong></label></center>
             <div class="controls">
             <input style="text-align:center;" type="text" class="span12 edicion varChar" id="Region" value="<?php echo trim($region['Nombre']); ?>" disabled>
             </div><!--controls -->
        </div><!-- region -->
         
        <div class="span6 control-group">
             <center><label class="control-label" for="Pais"><strong>País</strong></label></center>
             <div class="controls">
             <input class="span12" style="text-align:center;" type="text" id="Pais" value="Chile" disabled>
             </div><!--controls-->
        </div><!-- pais -->
    </div><!-- end row -->
    
    <div class="row-fluid">
        <div class="span6 control-group">
        <center><label class="control-label" for="Nacionalidad"><strong>Nacionalidad</strong></label></center>
            <div class="controls"> 
            <input class="span12" style="text-align:center;" type="text" id="Nacionalidad" value="<?php echo trim($paciente['Nacionalidad']); ?>" disabled>
            </div><!--controls -->
        </div><!-- nacionalidad -->
        
        <div class="span6 control-group">
            <center><label class="control-label" for="Etnia"><strong>Etnia </strong></label></center>
            <div class="controls">
            <input class="span12" style="text-align:center;" type="text" id="Etnia" value="<?php echo trim($etnia['Nombre']); ?>" disabled>
            </div><!--controls-->
        </div><!-- etnia -->
    </div>
   </td>
   </tr>                
   </tbody>
   </table>
  </div><!--!div para datos informacion de dirrección-->
    
  <div class="row-fluid">
    <div class="span12 img-rounded"> <!--div para datos informacion de seguros-->
    
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
   "><center><h4>Otros</h4></center>
   </th>                      
   </tr>
   </thead>
   <tbody>
   <tr>    
   <td>
    <div class="row-fluid">
        <div class="span6 control-group">
            <center><label class="control-label" for="Prevision"><strong>Previsión de Salud</strong></label></center>
            <div class="controls">
            <input style="text-align:center;" type="text" class="edicion span12 varChar" id="Prevision" value="<?php echo $prevision['Nombre']; ?>">
            </div><!-- controls -->
        </div><!-- prevision de salud -->
        
        <div class="span6 control-group">
            <center><label class="control-label" for="Seguro"><strong>Compañía de Seguro</strong></label></center>
            <div class="controls">
            <input style="text-align:center;" type="text" class="edicion span12 varChar" id="Seguro" value="<?php echo $seguro['Nombre']; ?>">
            </div>
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
        if($(this).is('.int')){
           if(!$.isNumeric($(this).val())){
             $(this).popover({
                 title: 'Este campo solo debe contener Números!',
                 html: 'false',
                 placement: 'top',
                 trigger: 'manual'
             }).popover('show');
             $(this).parent().parent().removeClass('success').addClass('error');
             $('#guardar').hide();}//if
           else{
             $(this).parent().parent().removeClass('error').addClass('success');  
             $(this).popover('hide');
             $('#guardar').show();} // else
            
        }// if
        else if($(this).is('.varChar')){ // si el campo es varChar
            if($(this).val()==""){
                $(this).popover({
                 title: 'Este campo es obligatorio!',
                 html: 'false',
                 placement: 'top',
                 trigger: 'manual'
             }).popover('show');
             $(this).parent().parent().removeClass('success').addClass('error');
             $('#guardar').hide(); }// if
            else{
             $(this).parent().parent().removeClass('error').addClass('success');  
             $(this).popover('hide');
             $('#guardar').show(); } //else
        }//else if
    }); // verificacion de modificaciones previas a guardar)
</script><!-- verificacion de tipos de dato en modificacion-->
<script>
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
        var errores = 0;
        var success = 0;
        $.each($('#collapseOne .edicion'),function(){
            
            if($(this).parent().parent().is('.error')){
                errores ++;
            }else if($(this).parent().parent().is('.success')){ success++;}
        })// end each
        
        if(errores == 0){
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
                            $('#estado').html('').html('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><center><strong>'+success+' Campos modificados exitosamente!</strong></center></div>');
                            $('html, body').animate({
                            scrollTop: $("#infopaciente").offset().top
                            }, 500); // animate
                            
                            $.each($('#collapseOne .edicion'),function(){
                                $(this).parent().parent().removeClass('success')
                            });
                            /*
                             *AJAX que retorna la fecha de la ultima modificación hecha al paciente
                             */
                            $.ajax({
                                url: '../../../ajax/mostrarUltimoLog.php',
                                type: 'post',
                                success:function(output){
                                   $('#ultimoLog').html('').html(output); 
                                }//end success
                            })// end ajax
                        }//end if (output = 1)
                        else{
                            alert('No se pudo insertar el campo');
                            }
                        }//success
            });//end ajax
            }//si no hay errores
            else{
                $('#estado').html('').html('<div class="alert alert-error"><center><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Debe Corregir '+errores+' Campos!</strong></center></div>');
                $('html, body').animate({
                scrollTop: $("#infopaciente").offset().top
                }, 500); // animate
            }
            
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