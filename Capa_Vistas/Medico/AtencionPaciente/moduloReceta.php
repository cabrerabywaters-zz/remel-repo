<!-- moduloReceta.php -->
<!--
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
    <div class="accordion-inner"><!-- contenido del accordion -->
        <div class="row-fluid"><!-- fila fluida -->
            <div class="span12 modal-body">  
            <p>
                <strong>Buscar:</strong> 
                    <div class="btn-group" data-toggle="buttons-radio">
                    <button type="button" class="btn" filtro="principioActivo">Principio Activo</button>
                    <button type="button" class="btn" filtro="nombreComercial">Nombre Comercial</button>
                    </div>
            </p>
            <form class="form-search">

                    <div class="span11">
                    <div class="input-append">
                    <input type="text" id="Medicamentos" class="span10 search-query" placeholder="Escriba aquí para buscar">
                    <a id="boton_medicamentos" class="btn detalleMedicamento" disabled="disabled">Añadir</a>  <br>
                    </div>
                    </div><br>
		   
                    
                 
                    <div class="span11">
                        <strong><p>Categorias</p></strong>
                        <select id="clase" multiple="multiple"></select>
                        <select id="subclase" multiple="multiple"></select>
                        <select id="medicamento" multiple="multiple"></select>
                    </div>
                                              

            </form>
            </div><!-- span -->
            
            <div class="row-fluid">
                <div class="span12 modal-body">
                <p><strong>Medicamentos Seleccionados:</strong></p>
                    <div id="medicamentosRecetados">
                    </div> 
                </div>
            </div> <!-- row -->
        
        
            <div class="row-fluid">
                <div class="span4 offset4">
                <a class="btn btn-warning btn-block"><br><h4><strong><i class="icon-check icon-white"></i> Emitir Receta</strong></h4><br></a>
                </div>
            </div>
        
        </div><!-- fila fluida -->
        
     </div><!-- contenido del accordion -->
</div><!-- contenido del colapsable-->


<!--JS de funcion verificacion de contraindicaciones-->
<script>
        $('button[filtro="principioActivo"]').button('toggle')
	$.ajax({
		type:"POST",
		url: "../../../ajax/claseMultiSelect.php",
		data: "",
		success: function(output){
				var output = jQuery.parseJSON(output);
				$("#clase").empty();
				$.each(output,function(i,el){
					var string = "<option value='" + el['idClase_Terapeutica'] + "'> " + el['Nombre']+ "</option>";
					$("#clase").append(string);
				});
			}
		}
	);

	$('#clase').change(function() {
				var id = $("#clase").attr("value");
				$.ajax({
                		type:"POST",
                		url: "../../../ajax/subClaseMultiSelect.php",
                		data: {clase: id},
                		success: function(output){
                                	var output = jQuery.parseJSON(output);
                                	$("#subclase").empty();
                                	$.each(output,function(i,el){
                                        	var string = "<option value='" + el['idSubClase'] + "'> " + el['Nombre']+ "</option";
                                        	$("#subclase").append(string);
						}
					);
                                	}
				});
                	}
        );


	$('#subclase').change(function() {
                                var id2 = $("#subclase").attr("value");
                                $.ajax({
                                type:"POST",
                                url: "../../../ajax/medicamentosMultiSelect.php",
                                data: {subclase: id2},
                                success: function(output){
                                        var output = jQuery.parseJSON(output);
                                        $("#medicamento").empty();
                                        $.each(output,function(i,el){
                                                var string = "<option value='" + el['idMedicamento'] + "'> " + el['Nombre_Comercial'] + "</option>";
                                                $("#medicamento").append(string);
                                                }
                                        );
                                        }
                                });
                        }
        );

	$('#medicamento').change(function() { 
		$("#Medicamentos").val($('#medicamento :selected').text());
		$("#boton_medicamentos").removeAttr('disabled').attr('enabled', 'enabled');
	 } );

        
   $(function(){
    $("#Medicamentos").autocomplete({
                                source: function( request, response ) {
                                    $.ajax({
                                        url: "../../../ajax/autocompleteMedicamento.php",
                                        data: {
                                            name_startsWith: request.term
                                        },
                                        type: "post",
                                        success: function( data ) {
                                            $('#boton_medicamentos').removeAttr('disabled');
                         		    
                        		    
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
   
    $('.detalleMedicamento').unbind('click').bind('click',function(){
      $('#modalDetalleMedicamento').modal('show')
        
    });//bind click
   
   
   
   });//end ready
   
</script>
