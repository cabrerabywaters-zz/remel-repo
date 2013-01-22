<!-- moduloReceta.php
Contiente el modulo de receta en la atencion paciente
incluyendo el buscador predictivo de medicamento
y el popup que muestra el detalle del medicamento
-->
<div class="accordion-heading">
    <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion3" href="#collapseTwo2">
        Receta
    </a>
</div>
<div id="collapseTwo2" class="accordion-body collapse">
    <div class="accordion-inner">
            <div class="row-fluid span12"><!-- row del buscador -->  
                    <strong>Buscar:</strong><br><br>
                    <div class="btn-group" data-toggle="buttons-radio" id="filtro">
                        <button type="button" class="btn" filtro="true">Principio Activo</button>
                        <button type="button" class="btn" filtro="false">Nombre Comercial</button>
                        <button type="button" class="btn" filtro="false2"> Busqueda Avanzada</button>
            
                    </div><!-- filtro -->
                    
                    <form class="form-search" action="#">
                        <br>
                        <div class="input-append">
                            <input type="text" id="Medicamentos" class="search-query">
                            <button id="boton_medicamentos" role="button" class="btn" href="#" disabled="disabled">Añadir</button><br>
                        </div><!-- input +boton -->
                        <br>
                    </form><!-- append form-->
            
            </div><!-- row del buscador -->
            
                    
            
            
                 
            <div class="row-fluid span12">
                <div id="busqueda_avanzada" class="collapse">
                        <strong><p>Categorias</p></strong>
                        <select id="clase" multiple="multiple" class ="span5"></select>
                        <strong><p>Sub Categorias</p></strong>
                        <select id="subclase" multiple="multiple" class ="span7"></select>
                        <strong><p>Laboratorio</p></strong>
                        <select id="laboratorio" multiple="multiple" class="span5"></select>
                        
            </div>
                
               
                        <strong><p>Medicamentos</p></strong>
                        <select id="medicamento" multiple="multiple" class ="span7"></select>
            </div><!-- row de multiselect-->
                                              

            
            
            
            <div class="row-fluid span12"><!-- row medicamentos seleccionados -->
                <p><strong>Medicamentos Seleccionados:</strong></p>
                <div id="medicamentosRecetados" class="span10">
                </div>    
            </div> <!-- row medicamentos seleccionados -->
        
        
       <div class="row-fluid span11"><!-- boton emitir receta -->
        <a class="btn btn-warning span4 offset4" id="verResumen" href="#resumenReceta" role="button" data-toggle="modal"><br><h4><strong><i class="icon-check icon-white"></i> Emitir Receta</strong></h4><br></a>
       </div> <!-- boton emitir receta -->
        
        
     </div><!-- interior del accordion -->
</div><!-- accordion modulo receta -->
<script>
    
   
       
        /*
         * el filtro correspondiente al buscador 
         */
        var filtro = 'true';
        $('#filtro button').click(function(){
          filtro = $(this).attr('filtro'); // se modifica el filtro correspondiente  
        
        if($(this).attr('filtro')=="true"){
            $("#medicamento").empty();
            $("#Medicamentos").removeAttr('value')
            
            if($('#busqueda_avanzada').attr('class')=="collapse"){
            }
            else{
            $("#busqueda_avanzada").collapse('hide');
            }
        }//end if
        else if ($(this).attr('filtro')=="false"){
            
            $("#medicamento").empty();
            $("#Medicamentos").removeAttr('value')
           
            if($('#busqueda_avanzada').attr('class')=="collapse"){
            }//end if
            else{
               $("#busqueda_avanzada").collapse('hide');
            }//end else
        }//end elseif
        
       else if ($(this).attr('filtro')=="false2"){
           $("#busqueda_avanzada").collapse('show');
           $("#medicamento").empty();
           $("#Medicamentos").removeAttr('value')
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
					var string = "<option value='" + el['idClase_Terapeutica'] + "'> " + el['Nombre']+ "</option>";
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
                filtro = "false";
                $('button[filtro="true"]').removeClass('active');
                $('button[filtro="false"]').addClass('active');
                $("#Medicamentos").removeAttr('value').attr('value',$('#medicamento :selected').text());
                $("#Medicamentos").removeAttr('identificador').attr('identificador',$('#medicamento :selected').attr('value'));
		$("#boton_medicamentos").removeAttr('disabled');
		$("#boton_medicamentos").attr('enabled', 'enabled');
               
               
               //colapsa la busqueda avanzada cuando se elije un medicamento para facilitar su insercion
                if($('#busqueda_avanzada').attr('class')=="collapse"){
                }
                else{
                $("#busqueda_avanzada").collapse('hide');
                     
                }
                 
               
               
                               
	 }); // change

</script><!-- filtro de la busqueda avanzada -->
<script>       
       
        $("#Medicamentos").autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url: "../../../ajax/autocompleteMedicamento.php",
                    data: {
                        name_startsWith: request.term,
                        filtro: filtro
                    },
                    type: "post",
                    success: function( data ) {
                        $('#boton_medicamentos').removeAttr('disabled');


                        var output = jQuery.parseJSON(data);

                        response( $.map( output, function( item ) {
                            if(filtro == "true"){
                            return {
                                label: item.Nombre,
                                id2:  item.idPrincipio_Activo
                            }
                            }
                            else {
                                return {
                                label: item.Nombre_Comercial,
                                id2: item.idMedicamento};
                        }
                        }));
                    }//end success

                });
            },
            select: function(event, ui){

                $('#Medicamentos').removeAttr('identificador').attr('identificador',ui.item.id2)
                
                //aquí se hace el ajax para poder indexsar los medicamentos que tienen ese principio activo
                
                if (filtro == "true"){
                
                  $.ajax({
                type:"POST",
                url: "../../../ajax/medicamentosPrincipiosActivos.php",
                data: {idPrincipio: ui.item.id2},
                success: function(output){
                    
                       var output = jQuery.parseJSON(output);
                        $("#medicamento").empty();
                        $.each(output,function(i,el){
                                var string = "<option value='" + el['idMedicamento'] + "'> " + el['Nombre_Comercial'] + "</option>";
                                $("#medicamento").append(string);
                                }
                        );
                        }//success
                });//cierra ajax extraño 
                }
            }
            ,
            minLength: 2,
            open: function() {
                $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
            },
            close: function() {
                $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
            }
        }); //autocomplete
 </script><!-- autocomplete de medicamentos -->               
       
<script>       
    $(document).ready(function(){ 
        /*
         *funcion que maneja el modal detallemedicamento cuando este se encuentra escondido
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
                var select = $('#diagnosticoAsociado')
                select.val(jQuery('options:first', select).val());
        })
        
        
        
        
        
        /*
        * funcionalidad de los botones de agregar un medicamento desde favoritos o desde arsenal
        * a la receta
        * ----------------------------------------------
        * solo para los medicamentos que requieren escribir el rp
        */
//       $('.detalleMedicamento').unbind('click').on('click',function(){
//           var idMedicamento = $(this).parent().attr('identificador'); // id del medicamento a agregar
//                   
//           $.ajax({ 
//               url: "../../../ajax/mostrarMedicamento.php", //agregar la ../ajax/mostrarMedicamento.php
//               type:"POST",
//               data: {idMedicamento:idMedicamento},
//               success:function(data){
//                   /*
//                    * en esta funcion se utilizan los valores de los campos de medicamento y
//                    * se modifica el modal para llenar los campos relativos al medicamento
//                    */
//                    var medicamento = $.parseJSON(data); //arreglo asociativo con los datos del medicamento
//                    $('#detalleMedicamentoLabel').text(medicamento['Nombre_Comercial']);
//                    
//                   
//                    $('#detalleMedicamento').modal('show'); // se muestra el modal
//                    }//end success
//           });//ajax 
//
//
//       });// end click 
               

      /*
       * accion de click en el boton "añadir" medicamento seleccionado
       * se debe abrir el modal correspondiente (detalleMedicamento) con toda la 
       * información que sea necesaria ingresar
       */       
       $('#boton_medicamentos').click(function(){
       if(filtro =='true'){// si es principio activo
           // POR AHORA NO HACE NADA
       }
       else{ // si es nombre comercial
           var idMedicamento = $('#Medicamentos').attr('identificador'); // id del medicamento que se busca
           var medicamentosRecetados = [];
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
                        if(contraAlergias != ""){ $('#warnings').prepend('<div class="alert alert-warning">Contraindicado con alergia a: <strong>'+contraAlergias+'</strong></div>');}
                    var contraCondiciones = datos.condiciones;
                        if(contraCondiciones != ""){ $('#warnings').prepend('<div class="alert alert-warning">Contraindicado con las siguientes Condiciones: <strong>'+contraCondiciones+'</strong></div>');}
                    var contraDiagnosticos = datos.diagnosticos;
                      if(contraDiagnosticos != ""){ $('#warnings').prepend('<div class="alert alert-warning">Contraindicado con los siguientes Diagnosticos: <strong>'+contraDiagnosticos+'</strong></div>');}
                    var contraPrincipiosRecetados = datos.principiosActivosRecetados;
                        if(contraPrincipiosRecetados != ""){  $('#warnings').prepend('<div class="alert alert-warning">Contraindicado con los siguientes Principios Activos: <strong>'+contraPrincipiosRecetados+'</strong></div>');}
                    
                    
                    $('#detalleMedicamento').modal('show'); // se muestra el modal
                                        

           
       }//end success
           });//ajax
           }// endif(el nombre es comercial)
           
       
       
       });// end click
       
       
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
        
        // se obtienen los datos correspondientes del medicamento
        var nombreComercial = $('#detalleMedicamentoLabel').text();
        var idMedicamento = $('#idMedicamento').text();
        var descripcionMedicamento = $('#descripcionMedicamento').text();
        var cantidadMedicamento = $('#cantidadMedicamento').val();
        var frecuenciaMedicamento = $('#frecuenciaMedicamento').val();
        var periodoMedicamento = $('#periodoMedicamento').val();
        var comentarioMedicamento = $('#comentarioMedicamento').val();
        var diagnosticoAsociado = $('#diagnosticoAsociado').val();
        
        // se arma el pill con la informacion del medicamento
        var pill = '<div class="alert alert-success medicamentoRecetado" idMedicamento="'+idMedicamento+'" descripcionMedicamento="'+descripcionMedicamento+'\
        " cantidadMedicamento="'+cantidadMedicamento+'" frecuenciaMedicamento="'+frecuenciaMedicamento+'" periodoMedicamento="'+periodoMedicamento+'"\n\
        comentarioMedicamento="'+comentarioMedicamento+'" diagnosticoAsociado="'+diagnosticoAsociado+'">\n\
        <button type="button" class="close" data-dismiss="alert">×</button><strong>'+nombreComercial+'</strong>\n\
        <a href=# class="editMedicamento pull-right" rel="tooltip" title="Editar Medicamento"><i class="icon-edit"></i> </a>'
        
        $('#medicamentosRecetados').prepend(pill); // se agrega el pill del medicamento
        
        //se limpian los campos y se esconde el modal   
        
        
        $('#detalleMedicamento').modal('hide');
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
        var select = $('#diagnosticoAsociado')
        select.val(jQuery('options:first', select).val());

        
        
        })
      

        $('.editMedicamento').tooltip().click(function(){
            
            
            
        });// end click a edit medicamento
        
});//end ready
</script><!-- agregacion del pill medicamento y triggers de favoritos y arsenal (pueden ser movidos de aquí) -->
