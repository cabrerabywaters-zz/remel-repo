<!-- moduloReceta.php
Contiente el modulo de receta en la atencion paciente
incluyendo el buscador predictivo de medicamento
y el popup que muestra el detalle del medicamento
-->
<div class="accordion-heading">
    <a id="moduloReceta" class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion3" href="#collapseTwo2">
        Receta
    </a>
</div>
<div id="collapseTwo2" class="accordion-body collapse">

          <div class="row-fluid">
             <div class="span7 img-rounded">
                <div class="row-fluid">
                    
                    
                    <div class="span12 modal-body img-rounded">
                        <div class="btn-group" data-toggle="buttons-radio" id="filtroArsenal">
                            <br>
                            <button type="button" class="btn" filtroarsenal="false">Todos Los Medicamentos</button>
<?php 
if($_SESSION['logLugar']['rutSucursal'] == "0" || $_SESSION['logLugar']['idLugar'] == "0"){
}
else{
echo '<button type="button" class="btn" filtroarsenal="true">Arsenal</button>'."\r\n";
}
?>                            
                        </div><!-- filtro -->
                        <br>
                        <div class="btn-group" data-toggle="buttons-radio" id="filtro">
                            <br>
                            <button type="button" class="btn" filtro="true">Principio Activo</button>
                            <button type="button" class="btn" filtro="false">Nombre Comercial</button>
                            <button type="button" class="btn" filtro="false2"> Busqueda Avanzada</button>
                        </div><!-- filtro -->
                        <form class="form-search" action="#">
                                    <br>
                                     <strong><p>Buscar:</p></strong> 
                                     <input type="text" id="Medicamentos" class="search-query">
                        </form><!-- append form-->
                    </div><!-- ROW DEL BUSCADOR -->
                    
                    <div class="collapse row-fluid" id="busqueda_avanzada"><div class="span12 modal-body img-rounded">
                            <span id="tituloClase"><strong><p>Categorias ATC</p></strong></span>
                                    <select id="clase" multiple="multiple" class ="span10" SIZE=6></select>
                                    <strong><p>Sub Categorias ATC</p></strong>
                                    <select id="subclase" multiple="multiple" class ="span10" SIZE=6></select>
                                    <strong><p>Laboratorio</p></strong>
                                    <select id="laboratorio" multiple="multiple" class="span10" SIZE=6></select>    
                    </div></div><!-- busqueda avanzada-->
                    
                    <div class="row-fluid"><div class="span12 modal-body img-rounded">
                            <strong><p>Medicamentos</p></strong>
                            <select id="medicamento" multiple="multiple" class ="span10" SIZE=6></select>
                    </div></div><!-- selector de medicamento -->
                
                    <div class="row-fluid"><div class="span12  img-rounded">
                            
                    </div></div><!-- boton de añadir a la receta -->        
                    
                    <div class="row-fluid"><div class="span11  img-rounded">
                 <a class="btn btn-warning span4 offset9" id="verResumen" href="#resumenReceta" role="button" data-toggle="modal"><br><h4><strong><i class="icon-check icon-white"></i> Emitir Receta</strong></h4><br></a>
                    </div></div><!-- boton de emitir receta -->
                
                </div></div>
              
              <div class="span5 img-rounded" style="background-color: blueviolet">
                  <div class="row-fluid">
                    <div class="modal-body img-rounded pull-right span12"><div class="row-fluid">
                            <p><strong>Medicamentos Seleccionados:</strong></p>
                            <div id="medicamentosRecetados" class="span11">
                            </div>
                    </div></div><!-- medicamentos seleccionados -->
                    
              </div></div><!-- row medicamentos -->
              
              <div class="span5 img-rounded">
                  <div class="row-fluid collapse" id="detalleMedicamento">
                    <div class="modal-body img-rounded pull-right span12"><div class="row-fluid">
                            <?php include_once 'detalleMedicamento.php'; ?>
                    </div></div><!-- medicamentos seleccionados -->
                    
              </div></div><!-- row medicamentos -->
         
          </div><!-- row fluid-->
          </div><!-- contenido del acordion-->
</div><!-- body collapsable -->
<script>
    
   
       
        /*
         * el filtro correspondiente al buscador 
         */
        
        
         var filtro2 = 'false';
        $('#filtroArsenal button').click(function(){
          filtro2 = $(this).attr('filtroarsenal');
          $("#medicamento").empty();
          $("#Medicamentos").removeAttr('value')
        });
        
        var filtro = 'true';
        $('#filtro button').click(function(){
          filtro = $(this).attr('filtro'); // se modifica el filtro correspondiente  
        
        if($(this).attr('filtro')=="true"){ //si se seleccionó principio activo
             
            $("#medicamento").empty(); //limpio multiselect de medicamentos
            $("#subclase").empty(); //limpio subclases
            $("#laboratorio").empty(); //limpio laboratorios
            $("#Medicamentos").removeAttr('value') //limpio el input con el valor que tenga dentro
            
            if($('#busqueda_avanzada').is('.in')== true){ // si la busqueda avanzada está visible
            $("#busqueda_avanzada").collapse('hide'); //la escondo
            }//end if
        }//end if
        else if($(this).attr('filtro')=="false"){ // si se seleccionó nombre comercial
            $('#boton_medicamentos').attr("disabled", "disabled");
            $("#subclase").empty(); //limpio multiselects
            $("#laboratorio").empty(); //limpio laboratorio
            $("#medicamento").empty(); //limpio listado de medicamentos
            $("#Medicamentos").removeAttr('value') //limpio input
           
            if($('#busqueda_avanzada').is('.in')==true){// si la busqueda avanzada está visible
            $("#busqueda_avanzada").collapse('hide');}// la escondo
         }//end elseif
        
       else if ($(this).attr('filtro')=="false2"){ // si se seleccionó busqueda avanzada
            $('html, body').animate({
         scrollTop: $("#tituloClase").offset().top
        }, 500);
            $("#subclase").empty(); //limpio subclase
            $("#laboratorio").empty(); //limpio laboratorio
            $('#boton_medicamentos').attr("disabled", "disabled");
            $("#busqueda_avanzada").collapse('show'); //muestro el div busqueda_avanzada
            $("#medicamento").empty(); //limpio medicamentos
            $("#Medicamentos").removeAttr('value'); // limpio el imput
        }//elseif
        }); //end click
        
        $('button[filtro="true"]').addClass('active');
	$.ajax({
		type:"POST",
		url: "../../../ajax/claseMultiSelect.php",
		success: function(output){
				var output = jQuery.parseJSON(output);
				$("#clase").empty();
				$.each(output,function(i,el){
					var string = "<option value='" + el['idClase_Terapeutica'] + "'> " + el['Nombre']+"</option>";
					$("#clase").append(string);
				});//end each
			}// end success
		});//end ajax

	$('#clase').change(function() {
                    var id = $("#clase").attr("value");
                    $.ajax({
                    type:"POST",
                    url: "../../../ajax/subClaseMultiSelect.php",
                    data: {clase: id},
                    success: function(output){
                            var output = jQuery.parseJSON(output);
                            $("#subclase").empty();
                            $("#laboratorio").empty();  
                            $("#medicamento").empty();
                            $.each(output,function(i,el){
                                    var string = "<option value='" + el['idSubClase'] + "'> " + el['Nombre']+ "</option";
                                    $("#subclase").append(string);
                                    });//end each
                            }// end success
                    }); //end each
            });// end change


	$('#subclase').change(function() {
                var id2 = $("#subclase").attr("value");
                $.ajax({
                type:"POST",
                url: "../../../ajax/medicamentosMultiSelect.php",
                data: {subclase: id2},
                success: function(output){
                    
                        var output = jQuery.parseJSON(output);
                        $("#laboratorio").empty();  
                        $("#medicamento").empty();
                        $.each(output,function(i,el){
                                var string = '<option value="' + el["ID"] + '"> ' + el["Nombre"] + '</option>';
                                $("#laboratorio").append(string);
                                });//end each
                        }//success
                }); // end ajax
        });//end change
        
        
        // Pasa los medicamentos dado el laboratorio seleccionado
        $('#laboratorio').change(function() {
        
          //hacemos scroll para que podamos ver los medicamentos
   

                var idSubclase = $("#subclase").attr("value");
                var idLab=$("#laboratorio").attr("value");
                $.ajax({
                type:"POST",
                url: "../../../ajax/laboratorioMultiSelect.php",
                data: {subclase: idSubclase,
                idLaboratorio: idLab},
                success: function(output){
                       var output = jQuery.parseJSON(output);
                        $("#medicamento").empty();
                        $.each(output,function(i,el){
                                var string = "<option value='" + el['idMedicamento'] + "'> " + el['Nombre_Comercial'] + "</option>";
                                $("#medicamento").append(string);
                                });//end each
                        }//success
                });//end ajax
        });//end change

	$('#medicamento').change(function() { 
                
              //  $('button[filtro="true"]').removeClass('active'); //quito active del boton prinipio activo
              //  $('button[filtro="false2"]').removeClass('active'); //quito active del boton busqueda avanzafa
              //  $('button[filtro="false"]').addClass('active'); // hago active el boton nombre comercial
            
            
                $("#Medicamentos")
                .removeAttr('value')
               .attr('value',$('#medicamento :selected').text()) // paso el medicamento seleccionado al input
                .removeAttr('identificador')
                .attr('identificador',$('#medicamento :selected').attr('value')); // paso el id al input
		$("#boton_medicamentos").removeAttr('disabled');
		               
               //colapsa la busqueda avanzada cuando se elije un medicamento para facilitar su insercion
                if($('#busqueda_avanzada').is('.in')== true){ // si está visible
                $("#busqueda_avanzada").collapse('hide');} // se esconde
                
                /*
                 *Se setea el div detalle medicamento para llenar sus campos
                 */
                $('#idMedicamento').text($('#medicamento :selected').val()); // div cn el id del medicamento
                $('#detalleMedicamentoLabel').html($('#medicamento :selected').text()); // set del titulo
                $('#detalleMedicamento').collapse('show'); // se abre el div para ingresar datos
               
                $('html, body').animate({ // se mueve la pantalla al div para facilidad del usuario
                scrollTop: $("#detalleMedicamento").offset().top
                }, 2000);
             
	 }); // change

     
       
        $("#Medicamentos").autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url: "../../../ajax/autocompleteMedicamento.php",
                    data: {
                        name_startsWith: request.term,

                        filtro: filtro,
                        filtro2: filtro2
                        
                    },
                    type: "post",
                    success: function( data ) {
                        
                            var output = jQuery.parseJSON(data);

                            $("#medicamento").empty();
                        response( $.map( output, function( item ) {
                            if(filtro == "true"){
                            return {
                                label: item.Nombre,
                                id2:  item.idPrincipio_Activo
                            }
                            } // end if
                            else {
                                
                //Se agregan todos los medicamentos al multiselect
                 $("#medicamento").empty();
                        $.each(output,function(i,el){
                                var string = "<option value='" + el['idMedicamento'] + "'> " + el['Nombre_Comercial'] + "</option>";
                                $("#medicamento").append(string);
                                });//end each
             
                        }
                        }));
                    }//end success

                });
            },
            select: function(event, ui){
                      /*
                       * accion "añadir" medicamento seleccionado
                       * se debe abrir el modal correspondiente (detalleMedicamento) con toda la 
                       * información que sea necesaria ingresar
                       */ 

                //aquí se hace el ajax para poder indexsar los medicamentos que tienen ese principio activo
                
                if(filtro == "true"){
                    
                  $.ajax({
                    type:"POST",
                    url: "../../../ajax/medicamentosPrincipiosActivos.php",
                    data: {"idPrincipio": ui.item.id2},
                    success: function(output){
                    
                       var output = jQuery.parseJSON(output);
                        $("#medicamento").empty();
                        $.each(output,function(i,el){
                                var string = "<option value='" + el['idMedicamento'] + "'> " + el['Nombre_Comercial'] + "</option>";
                                $("#medicamento").append(string);
                                }
                        );
                        }//success
                   });//end ajax
                }//end if
                else{ // si es nombre comercial
                    $('#Medicamentos').removeAttr('identificador').attr('identificador', ui.item.id2)
                    var idMedicamento = ui.item.id2 // id del medicamento que se busca
                    
                    var medicamentosRecetados = []; // se guarda un arreglo con todos los medicamentos hasta el momento
                    $('.medicamentoRecetado').each(function(){
                    var medRecetado = $(this).attr('idmedicamento')
                    medicamentosRecetados.push(medRecetado);
                    }); // end each


                    $.ajax({ 
                        url: "../../../ajax/mostrarMedicamento.php",
                        type:"POST",
                        async: true,
                        data: {
                             "idMedicamento":idMedicamento, 
                             "medicamentosRecetados": medicamentosRecetados
                         },
                        success:function(data){
                            /*
                             * en esta funcion se utilizan los valores de los campos de medicamento y
                             * se modifica el modal para llenar los campos relativos al medicamento
                            */
                            
                             var datos = $.parseJSON(data); //arreglo asociativo con los datos del medicamento             


                             $('#detalleMedicamentoLabel').text(datos.Medicamento['Nombre_Comercial']);
                             $('#idMedicamento').text(idMedicamento);
                             $('#descripcionMedicamento').text(datos.Medicamento['Observaciones'])


                             var contraAlergias = datos.alergias;
                                 if(contraAlergias != ""){ $('#warnings').prepend('<div class="alert alert-danger">Contraindicado con alergia a: <strong>'+contraAlergias+'</strong></div>');}
                             var contraCondiciones = datos.condiciones;
                                 if(contraCondiciones != ""){ $('#warnings').prepend('<div class="alert alert-danger">Contraindicado con las siguientes Condiciones: <strong>'+contraCondiciones+'</strong></div>');}
                             var contraDiagnosticos = datos.diagnosticos;
                               if(contraDiagnosticos != ""){ $('#warnings').prepend('<div class="alert alert-danger">Contraindicado con los siguientes Diagnosticos: <strong>'+contraDiagnosticos+'</strong></div>');}
                             var contraPrincipiosRecetados = datos.medicamentosRecetadosConflictivos;
                                 if(contraPrincipiosRecetados != ""){  $('#warnings').prepend('<div class="alert alert-danger">Contraindicado con los siguientes medicamentos en esta receta: <strong>'+contraPrincipiosRecetados+'</strong></div>');}

                             
                             $('#detalleMedicamento').collapse('show'); // se muestra el modal
                        }//end success
                        });//ajax
                    }// endelse(el nombre es comercial)
                
            } //end select
            ,
            minLength: 2,
            open: function() {
                $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
            },
            close: function() {
                $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
            }
        }); //autocomplete
        $('#guardar_cambios_receta').hide();
 </script><!-- autocomplete de medicamentos -->               
<script>       
    $(document).ready(function(){ 
        
        //funcion que reacomoda la pantalla cuando se hace click en receta
      
        $("#moduloReceta").click(function() {
            $('html, body').animate({
            scrollTop: $("#tabConsulta").offset().top
            }, 500); // animate
        
            
    
        });//on click
      
        
        /*
         *funcion que maneja el modal detalleMedicamento cuando este se encuentra escondido
         */
        $('#detalleMedicamento').on('hide',function(){
                $('#Medicamentos').val('');
                $('#warnings').html('')
                $('#boton_medicamentos').attr('disabled','disabled');
                $('#detalleMedicamentoLabel').text('');
                $('#idMedicamento').text('');
                $('#descripcionMedicamento').text('');
                $('#cantidadMedicamento').val('');
                $('#frecuenciaMedicamento').val('');
                $('#periodoMedicamento').val('');
                $('#comentarioMedicamento').val('');
                $('#tipoReceta').text('');
                var select = $('#diagnosticoAsociado')
                select.val(jQuery('options:first', select).val());
                
        });
 
       /*
        * funcion que elimina de favoritos el medicamento seleccionado
        * se debe primero eliminar de la bbdd vía ajax
        * luego se elimina del DOM
        */
       $('a[href="#borrarFav"]').unbind('click').on('click',function(){
            var idFavorito = $(this).parent().attr('idFavorito');
            alert('se quiere eliminar de favoritos el medicamento con idFavorito: '+idFavorito);
            $.ajax({
              url: "../../ajax/borrarFavorito.php", //../../ajax/borrarFavorito.php
              type: "POST",
              data: {idFavorito:idFavorito},
              success: function(output){
                  alert('Favorito eliminado correctamente!');
                  if(output == 1){// se eliminó correctamente de favoritos
                      $(this).parent('span').remove(); // se elimina el div donde está contenido el elemento
                        
                  }
              }//end success
              
                
            });//end ajax
        }); // click

       /*
        * Función asignada al boton prescribir que agrega el pill con el medicamento
        * seleccionado
        *          
        */      
        $('#agregarMedicamento').unbind('click').on('click', function(){
        if($('#diagnosticoAsociado').val()== -1){ // si no se le ha asociado un diagnostico al medicamento
          $('#diagnosticoAsociado').focus();
          $('#diagnosticoAsociado').parent().parent().addClass('error');
          $('html, body').animate({ // se hace scrolling a la pagina para hacer enfasis
            scrollTop: $("#diagnosticoAsociado").offset().top
          }, 2000);
          $('#diagnosticoAsociado').popover({
              content: 'Debe Seleccionar Diagnostico',
              placement: 'top',
              trigger: 'manual'
          }).popover('show')
            
          
        }
        else{
            $('#diagnosticoAsociado').parent().parent().removeClass('error'); // se quita el error y 
            $('.popover').hide();
            
        // se obtienen los datos correspondientes del medicamento
        var nombreComercial = $('#detalleMedicamentoLabel').text();
        var idMedicamento = $('#idMedicamento').text();
        var descripcionMedicamento = $('#descripcionMedicamento').text();
        var cantidadMedicamento = $('#cantidadMedicamento').val();
        var frecuenciaMedicamento = $('#frecuenciaMedicamento').val();
        var periodoMedicamento = $('#periodoMedicamento').val();
        var comentarioMedicamento = $('#comentarioMedicamento').val();
        var diagnosticoAsociado = $('#diagnosticoAsociado').val();
        var unidadDeConsumo = $('select[name="unidadDeConsumo"]').val();
        var unidadFrecuencia = $('select[name="unidadFrecuencia"]').val();
        var unidadPeriodo = $('select[name="unidadPeriodo"]').val();
        var fechaInicio = $('input[name="fechaInicio"]').val();
        var fechaFin = $('input[name="fechaFin"]').val();
        var tipoReceta = $('#tipoReceta').text();
        
        var cuanto = $('select[name="unidadDeConsumo"] :selected').text(); // nombre de la unidad de consumo
        var cadaCuanto = $('select[name="unidadFrecuencia"] :selected').text(); //nombre de la unidad de frecuencia
        var porCuanto = $('select[name="unidadPeriodo"] :selected').text();
        
        // se arma el pill con la informacion del medicamento
        var pill = '\
        <div class="alert alert-success medicamentoRecetado" onClick="ClickPill()" idMedicamento="'+idMedicamento+'"\n\
        cantidadMedicamento="'+cantidadMedicamento+'" unidadDeConsumo="'+unidadDeConsumo+'" frecuenciaMedicamento="'+frecuenciaMedicamento+'" unidadFrecuencia="'+unidadFrecuencia+'" periodoMedicamento="'+periodoMedicamento+'" unidadPeriodo="'+unidadPeriodo+'"\n\
        comentarioMedicamento="'+comentarioMedicamento+'" diagnosticoAsociado="'+diagnosticoAsociado+'" fechaInicio="'+fechaInicio+'" fechaFin="'+fechaFin+'">\n\
        <button type="button" class="close" data-dismiss="alert">×</button><a href=# class="editMedicamento pull-right" data-target="#detalleMedicamento" id="editarMedicamento" rel="tooltip" title="Editar Diagnostico"><i class="icon-pencil"></i> </a>\n\
        <strong>'+nombreComercial+'<br>Cantidad: </strong>'+cantidadMedicamento+' '+cuanto+' <strong>Frecuencia: </strong>'+frecuenciaMedicamento+' '+cadaCuanto+'<br><strong>Periodo: </strong>'+periodoMedicamento+' '+porCuanto+'\n\
        </div>';
            
        $('#medicamentosRecetados').prepend(pill); // se agrega el pill del medicamento
        
        $('.editMedicamento').click(function(){
            //BOTON EDITAR
        //AUTOR: MAX SILVA mit master oviedo
            
            var idRecetaEdit = $(this).parent().attr('idMedicamento');
            
            $('#Medicamentos').val(
            $(this).parent().attr('medicamentos')
        );
            
            //$('#warnings').html('')
            
            $('#detalleMedicamentoLabel').text(
            $(this).parent().children('strong').text()
        );
            
            /*$('#idMedicamento').text(
            $(this).parent().attr('idmedicamento')
                );
            
            $('#descripcionMedicamento').text(
            $(this).parent().attr('descripcionmedicamento').text()
        ); */
            
            $('#cantidadMedicamento').val(
            $(this).parent().attr('cantidadmedicamento')
        );
            
            $('#frecuenciaMedicamento').val(
            $(this).parent().attr('frecuenciamedicamento')
        );
            
            $('#periodoMedicamento').val(
            $(this).parent().attr('periodomedicamento')
        );
            
            $('#comentarioMedicamento').val(
            $(this).parent().attr('comentariomedicamento')
        );
            
            $('#tipoReceta').text(
            $(this).parent().attr('tiporeceta')
        );
            
            $('#diagnosticoAsociado').val(
            $(this).parent().attr('diagnosticoasociado')
        );
            
            $('input[name="fechaInicio"]').val(
            $(this).parent().attr('fechainicio')
        );
               
            
            $('#guardar_cambios_receta').show().attr('disabled',false);
            $('#agregarMedicamento').hide();
            $('#detalleMedicamento').collapse('show');
            $('html, body').animate({
                scrollTop: $("#detalleMedicamento").offset().top
            }, 500);
            
            
            
            $('#guardar_cambios_receta').unbind('click').on('click',function(){
                
                var cantidad_medicamento = $('#cantidadMedicamento').val();
                var frecuencia_medicamento = $('#frecuenciaMedicamento').val();
                var periodo_medicamento = $('#periodoMedicamento').val();
                var comentario_medicamento = $('#comentarioMedicamento').val();
                var tipo_receta = $('#tipoReceta').text();
                var diagnostico_asociado = $('#diagnosticoAsociado').val();
                var id_medicamento = $('#idMedicamento').val();
                var fecha_inicio = $('input[name="fechaInicio"]').val();
              
                
                $('.medicamentoRecetado[idMedicamento="'+ idRecetaEdit +'"]').attr('cantidadmedicamento',cantidad_medicamento);
                $('.medicamentoRecetado[idMedicamento="'+ idRecetaEdit +'"]').attr('frecuenciamedicamento',frecuencia_medicamento);
                $('.medicamentoRecetado[idMedicamento="'+ idRecetaEdit +'"]').attr('periodomedicamento',periodo_medicamento);
                $('.medicamentoRecetado[idMedicamento="'+ idRecetaEdit +'"]').attr('comentariomedicamento',comentario_medicamento);
                $('.medicamentoRecetado[idMedicamento="'+ idRecetaEdit +'"]').attr('tiporeceta',tipo_receta);
                $('.medicamentoRecetado[idMedicamento="'+ idRecetaEdit +'"]').attr('diagnosticoasociado',diagnostico_asociado);
                $('.medicamentoRecetado[idMedicamento="'+ idRecetaEdit +'"]').attr('fechainicio',fecha_inicio);
                
                        //se redirecciona la vista de la pantalla hacia receta.
                  $('html, body').animate({
                    scrollTop: $("#tabConsulta").offset().top
                  }, 1000);
                //se limpian los campos y se esconde el modal 
                $('#detalleMedicamento').collapse('hide');
                $('#Medicamentos').val('');
                $('#warnings').html('');
                $('#boton_medicamentos').attr('disabled','disabled');
                $('#detalleMedicamentoLabel').text('');
                $('#idMedicamento').text('');
                $('#descripcionMedicamento').text('');
                $('#cantidadMedicamento').val('');
                $('#frecuenciaMedicamento').val('');
                $('#periodoMedicamento').val('');
                $('#comentarioMedicamento').val('');
                $('#tipoReceta').text('');
                
                
                $('#guardar_cambios_receta').hide();
                $('#agregarMedicamento').show();
                
            });
            
            
        });//end click   
        //se redirecciona la vista de la pantalla hacia receta.
          $('html, body').animate({
            scrollTop: $("#tabConsulta").offset().top
          }, 1000);
        //se limpian los campos y se esconde el modal 
        $('#detalleMedicamento').collapse('toggle');
        $('#Medicamentos').val('');
        $('#warnings').html('');
        $('#boton_medicamentos').attr('disabled','disabled');
        $('#detalleMedicamentoLabel').text('');
        $('#idMedicamento').text('');
        $('#descripcionMedicamento').text('');
        $('#cantidadMedicamento').val('');
        $('#frecuenciaMedicamento').val('');
        $('#periodoMedicamento').val('');
        $('#comentarioMedicamento').val('');
        $('#tipoReceta').text('');
        
        var select = $('#diagnosticoAsociado')
        select.val(jQuery('options:first', select).val());
        }
        
        
        
                  
     });
            
                       
        
        
});//end ready

$("#cancelar_cambios_receta").unbind('click').on('click',function(){
        $('#detalleMedicamento').collapse('toggle');                 
       
                    }); //end on


       
</script><!-- agregacion del pill medicamento y triggers de favoritos y arsenal (pueden ser movidos de aquí) -->
