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
                    </div><!-- filtro -->
                    
                    <form class="form-search">
                        <br>
                        <div class="input-append">
                            <input type="text" id="Medicamentos" class="search-query">
                            <a id="boton_medicamentos" role="button" class="btn" disabled="disabled">Añadir</a><br>
                        </div><!-- input +boton -->
                        <br>
                    </form><!-- append form-->
            
            </div><!-- row del buscador -->
            
                    
                 
            <div class="row-fluid span12">
                        <strong><p>Categorias</p></strong>
                        <select id="clase" multiple="multiple"></select>
                        <select id="subclase" multiple="multiple"></select>
                        <select id="medicamento" multiple="multiple"></select>
            </div><!-- row de multiselect-->
                                              

            
            
            
            <div class="span12"><!-- row medicamentos seleccionados -->
                <p><strong>Medicamentos Seleccionados:</strong></p>
                <div id="medicamentosRecetados">
                </div>    
            </div> <!-- row medicamentos seleccionados -->
        
        
       <div class="row-fluid span11"><!-- boton emitir receta -->
        <a class="btn btn-warning span4 offset4"><br><h4><strong><i class="icon-check icon-white"></i> Emitir Receta</strong></h4><br></a>
       </div> <!-- boton emitir receta -->
        
        
     </div><!-- interior del accordion -->
</div><!-- accordion modulo receta -->


<!-- modalDetalleMedicamento-->
<div id="detalleMedicamento" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-header"><!-- titulo del modal (nombre del medicamento) -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Paracetamol</h3>
    </div><!-- titulo del modal (nombre del medicamento) -->
    
    <div class="modal-body"><!-- contenido del modal (indicaciones de día frecuencia etc)-->
        <div class="span3"><img src="../../../imgs/paracetamol.jpg" style="width:60%" ></div>
        <p>El paracetamol (DCI) o acetaminofén (acetaminofeno) es un fármaco con propiedades analgésicas, sin propiedades antiinflamatorias clínicamente significativas. Actúa inhibiendo la síntesis de prostaglandinas, mediadores celulares responsables de la aparición del dolor. Además, tiene efectos antipiréticos.</p>
        <p>Cantidad: <input type="text" placeholder="Indique Cantidad">Miligramos (mg)</p>
        <p>Cada :<input type="text" placeholder="frequencia">Horas (hrs)</p>
        <p>Por :<input type="text" placeholder="periodo">Dias</p>
        <p>Comentario: </p>
        <center> <textarea rows="2" style="width:90%"></textarea></center>
    </div><!-- contenido del modal (indicaciones de día frecuencia etc)-->
    
    <div class="modal-footer"><!-- acciones del modal (cancerlar, agregar medicamento etc)-->
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <a href="#" role="button" class="btn btn-warning">Prescribir</a>
    </div>

</div><!-- fin popup informacion del medicamento -->

<script>
        /*
         * el filtro correspondiente al buscador 
         */
        var filtro;
        $('#filtro button').click(function(){
          filtro = $(this).attr('filtro'); // el filtro correspondiente  
        });
        
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
                        }//success
                });
        });//end change

	$('#medicamento').change(function() { 
                filtro = "false";
                $('button[filtro="true"]').removeClass('active');
                $('button[filtro="false"]').addClass('active');
                $("#Medicamentos").removeAttr('value').attr('value',$('#medicamento :selected').text());
                $("#Medicamentos").removeAttr('identificador').attr('identificador',$('#medicamento :selected').attr('value'));
		$("#boton_medicamentos").removeAttr('disabled');
		$("#boton_medicamentos").attr('enabled', 'enabled');
	 }); // change


    
       
       
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
                            else return {
                                label: item.Nombre_Comercial,
                                id2: item.idMedicamento
                            }
                        }));
                    }//end success

                });
            },
            select: function(event, ui){

                $('#Medicamentos').removeAttr('identificador').attr('identificador',ui.item.id2)
            
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
                
        /*
        * funcionalidad de los botones de agregar un medicamento desde favoritos o desde arsenal
        * a la receta
        * ----------------------------------------------
        * solo para los medicamentos que requieren escribir el rp
        */
       $('.detalleMedicamento').click(function(){
           var idMedicamento = $(this).attr('medicamento'); // id del medicamento a agregar
           alert('se hizo click en agregar un elemento desde la barra favoritos o arsenal!'+idMedicamento);
           
           $.ajax({ 
               url: "url", //agregar la ../ajax/mostrarMedicamento.php
               type:"POST",
               data: idMedicamento,
               success:function(data){
                   /*
                    * en esta funcion se utilizan los valores de los campos de medicamento y
                    * se modifica el modal para llenar los campos relativos al medicamento
                    */
                    alert(data);
                    var medicamento = $.parseJSON(data); //arreglo asociativo con los datos del medicamento
                    
                    
                    $('#detalleMedicamento').modal('show'); // se muestra el modal
                    alert(medicamento);                    

               }//end success
           });//ajax


       });// end click 
               

       $('#boton_medicamentos').click(function(){
       if(filtro =='true'){// si es principio activo
           // POR AHORA NO HACE NADA
       }
       else{ // si es nombre comercial
           var idMedicamento = $('#Medicamentos').attr('identificador'); // id del medicamento que se busca
           $.ajax({ 
               url: "../../../ajax/mostrarMedicamento.php",
               type:"POST",
               data: {idMedicamento:idMedicamento},
               success:function(data){
                   /*
                    * en esta funcion se utilizan los valores de los campos de medicamento y
                    * se modifica el modal para llenar los campos relativos al medicamento
                    */
                    alert(data);
                    var medicamento = $.parseJSON(data); //arreglo asociativo con los datos del medicamento
                    $('#myModalLabel').text(medicamento['Nombre_Comercial']);
                    
                   
                    $('#modalDetalleMedicamento').modal('show'); // se muestra el modal
                                        

               }//end success
           });//ajax
           }// if(el nombre es comercial
           
       
       
       });// end click
       
       
       /*
        * funcion que elimina de favoritos el medicamento seleccionado
        * se debe primero eliminar de la bbdd vía ajax
        * luego se elimina del DOM
        */
       $('a[href="#borrarFav"]').click(function(){
            var idMedicamento = $(this).attr('medicamento');
            alert('se quiere eliminar de favoritos el medicamento con id: '+idMedicamento);
            $.ajax({
              url: "url",
              type: "POST",
              data: idMedicamento,
              success: function(output){
                  alert(output);
//                  if(output == 1){// se eliminó correctamente de favoritos
//                      $(this).parent('span').remove(); // se elimina el div donde está contenido el elemento
//                        
//                  }
              }//end success
              
                
            });//end ajax
            
            
            
            
      }); // click
</script>
