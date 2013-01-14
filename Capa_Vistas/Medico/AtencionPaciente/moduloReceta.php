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
    <div class="accordion-inner">
        <div class="modal-body img-rounded">
            <strong><p>Ingrese nombre del medicamento</p></strong>
            <form class="form-search">
		   <div class="row-fluid">
                    <input type="text" id="Medicamentos" class="span2 search-query"/>
		    </div><br>
		   <div class="row-fluid">
		    <strong><p>Categorias</p></strong>
                    <select name="clase" id="clase" multiple="multiple"></select>
		    <select name="subclase" id="subclase" multiple="multiple"></select>
	            <select name="medicamento" id="medicamento" multiple="multiple"></select>
		   </div>
            </form>
        </div>
        
        
        <a class="btn btn-warning span2 offset5"><br><h4><strong><i class="icon-check icon-white"></i> Emitir Receta</strong></h4><br></a>
    </div>
</div>




<div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Información del Medicamento</h3>
    </div>
    <div class="modal-body">
        <strong><p>Paracetamol</p></strong>
        <div class="span3"> <img src="../../../imgs/paracetamol.jpg" style="width:60%" ></div>
        <p>El paracetamol (DCI) o acetaminofén (acetaminofeno) es un fármaco con propiedades analgésicas, sin propiedades antiinflamatorias clínicamente significativas. Actúa inhibiendo la síntesis de prostaglandinas, mediadores celulares responsables de la aparición del dolor. Además, tiene efectos antipiréticos.</p>
        <p>Cantidad: </p>
        <input type="text" placeholder="Indique Cantidad">
        <p>Comentario: </p>
        <center> <textarea rows="2" style="width:90%"></textarea></center>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <a href="atendiendo_paciente.php" role="button" class="btn btn-warning">Recetar</a>
    </div>
</div><!-- fin popup informacion del medicamento -->

<!--JS de funcion verificacion de contraindicaciones-->
<script>
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
                                        $("#subclase").empty();
                                        $.each(output,function(i,el){
                                                var string = "<option value='" + el['idMedicamento'] + "'> " + el['Nombre'] + "</option>";
                                                $("#subclase").append(string);
                                                }
                                        );
                                        }
                                });
                        }
        );

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
   });
</script>
