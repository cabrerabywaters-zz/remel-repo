
<div class="accordion-heading">
    <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion3" href="#collapseOne1">
        Diagnóstico
    </a>
</div>
<div id="collapseOne1" class="accordion-body collapse">
    <div class="accordion-inner"><!-- contenido del modulo diagnostico -->

        <div class="modal-body">
            <div class="span4"><!-- div donde estará el buscador -->     
            <strong><p>Ingrese nombre del diagnóstico</p></strong>

            <form class="form-search" id="buscar_diagnostico" method="post">
                <div class="input-append"> <!-- buscador inline con autocomplete -->

                    <input type="text" class="span2 search-query" id="diagnostico" name="diagnostico">
                    <input type="submit" id="boton_diagnostico" class="btn" data-target="#myModal"  data-toggle="modal" value="Añadir" disabled>  <br>

               </div>
            </div><!-- div del buscador-->
                <div class="span5" id="log"><!-- div de diagnosticos selecciondos -->
                <div id="log_titulo"></div>   
                <div id="log_diagnostico" class="span2"></div> <!-- div donde se mostraran los diagnosticos obtenidos -->
                </div>
            </form>



        </div>
    </div>
</div>

<!-- popup informacion diagnostico -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Debe seleccionar un Diagnóstico</h3>

    </div>
    <div class="modal-body">
        <strong><p></p></strong>
        <div class="span3" id="imagenDiagnostico">
        <img src="http://agingadrenalinejunkies.com/wp-content/uploads/2011/05/istockphoto_10197494-sick-flu-bug-with-thermometer.jpg" class="img-rounded" width="100px" height="100px">
        </div>
        <span id="id_diagnostico" style="display:none"></span>

        <p></p>
        <select id="tipo_diagnostico">
            <option value="0" selected="selected">Escoja un tipo...</option>
            <?php
            include_once('../../../Capa_Controladores/tipo.php');

            $tipos_diagnosticos = Tipo::Seleccionar('');

            foreach ($tipos_diagnosticos as $tipo) {

                echo'<option value="'.$tipo['idTipo'].'">' . $tipo['Nombre'] . '</option>';
            }
            ?>
        <select>
            Patología notificada como GES?
            <div class="btn-group" data-toggle="buttons-radio">
                <button type="button" class="btn">Si</button>
                <button type="button" class="btn">No</button>
            </div>
            <p></p>


                <p>Comentario: </p>
                <center> <textarea id="comentario_diagnostico" rows="2" style="width:90%"></textarea></center>
                <span id="mensaje"></span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info"  id="guardar_diagnostico">Diagnosticar</a>
                        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true" id="cancelar_modal">Cancelar</button>

                </div>
</div><!-- fin popup informacion diagnostico -->

<!-- dialogo que contiene los medicamentos asociados a un diagnostico -->


<div id="medicamentosAsociados">
    
    <strong id="institucion">
        <?php $institucion = $_SESSION['institucionLog']; echo $institucion[1]; ?>
    </strong>
        <div id="recomendadosInstitucion"><!-- div con los medicamentos asociados por la institucion-->
        </div><!-- div con los medicamentos asociados por la institucion-->
    
        <hr>
    <strong id="medicamentosFavo">Mis Favoritos Asociados</strong>    
        <div id="recomendadosFav"><!-- div con los medicamentos asociados por favoritos-->
        </div><!-- div con los medicamentos asociados por los favoritos -->
</div> 


<!-- fin dialogo de "usos" -->
                
                                    <script>
                            $("#medicamentosAsociados").hide();           
                        
                            /**
                             * esta función genera el autocomplete para el campo de diagnostico (input)
                             * al seleccionar y escribir 2 letras se ejecuta el ajax
                             * busca en la base de datos en el archivo autocompleteDiagnostico.php
                             * el jSon correspondiente a las coincidencias
                             * 
                             * Funcion select que ejecutará una accion cuando se devuelva
                             */
                            $( "#diagnostico" ).autocomplete({
                                source: function( request, response ) {
                                    $.ajax({
                                        url: "../../../ajax/autocompleteDiagnostico.php",
                                        data: {
                                            name_startsWith: request.term
                                        },
                                        type: "post",
                                        success: function( data ) {
                                            $('#boton_diagnostico').removeAttr('disabled');
                         
                        
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
        
        
     
                        
    
    
                        $('#boton_diagnostico').click(function(){
                        /**
                         * funcion que envía el id del diagnostico y retorna el json 
                         * con todos los atributos para rellenar el popup
                         **/
                           
                           if( $("#diagnostico").val() == "" ){ }
                           else{
                            var postData = $("#buscar_diagnostico").serialize();
                            $.ajax({ 
                                url: '../../../ajax/diagnosticarPaciente.php',
                                data: postData,
                                type: 'post',
                                success: function(output) {
                                    var data = jQuery.parseJSON(output);
                                     // se hace enable al boton_diagnostico                                                  
                                    $('#myModalLabel').html(data['Nombre']) ; //nombre de la enfermedad
                                    $('#id_diagnostico').html(data['idDiagnostico']); // id de la enfermedad
                                    $('#imagenDiagnostico').html('<img src="'+data['Foto']+'" class="img-rounded" width="100px" height="100px">');//foto de la enfermedad
                                    //resto de la informacion que se busca desplegar en el popup
                                    
                                }
                           

                            });// end ajax
                           }
                          
                        });
                </script>
                
                <script>
                    
                    
                    $("#cancelar_modal").click(function() {
                        /**
                         * funcion que maneja el popup cuando se hace click
                         * en el boton canelar
                         * 
                         */
                        $('#myModalLabel').html('Debe Escojer un Diagnóstico');
                        $('#imagenDiagnostico').html('<img src="../../../imgs/no_encontrado.jpg" style="width:30%" >');
                        $('select>option:eq(0)').attr('selected', true);
                        $('#diagnostico').val('');
                        $('#comentario_diagnostico').val('');
                        $('#boton_diagnostico').attr('disabled','disabled'); //se hace disabled el boton
                    });
                    
                    
                    $("#guardar_diagnostico").click(function() {
                            /**
                             * funcion que guarda el diagnostico correspondiente
                             * en la bbdd al hacer click en "diagnosticar"
                             * agrega el pill en la seccion log_diagnostico
                             */
                        var nombre_diagnostico = $('#myModalLabel').text();    
                        var id_diagnostico= $('#id_diagnostico').text();
                        var id_consulta = $('#consulta').text();
                        var id_tipo = $('#tipo_diagnostico').val();
                        
                        var pill = '<div class="alert alert-info" id="diag_'+id_diagnostico+'"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+nombre_diagnostico+'</strong><a href=# class="protocolo pull-right" rel="tooltip" onclick=""><i class="icon-th-list icon-white"></i></a></div>';
                        $('#log').removeClass().addClass('span5 img-rounded');
                        $('#log_titulo').html('<p><strong>Diagnosticos seleccionados:</strong></p>');
                        $('#log_diagnostico').prepend(pill);
                        $('#myModal').modal('hide');
                        $('#diagnostico').val(''); // se borra el buscador
                        $('select>option:eq(0)').attr('selected', true); //se deja seleccionada la opcion 0
                        $('#comentario_diagnostico').val(''); // se borra el comentario
                        $('#boton_diagnostico').attr('disabled','disabled'); //se hace disabled el boton
                            
                            /**
                             * el siguiente popover contiene la información de los protocolos asociados 
                             * a un diagnostico especifico
                             */
                            
                            
                           
                        $('a[rel="tooltip"]').tooltip({title:"Ver Medicamentos Asociados"}).unbind("click").on('click', (function(){
                            /**
                             *Funcion que abre el dialogo donde se encuentran los 
                             *medicamentos asignados al diagnostico seleccionado
                             */
                            
                            var nombreDiagnostico = $(this).parent().children('strong').html(); //nombre del diagnostico clickeado
                            var idDiagnostico = $(this).parent().attr('id'); 
                            idDiagnostico = idDiagnostico[5]; // id del diagnostico clickeado
                            
                            
                            
                            // generar pills vía ajax syncronico
                            $.ajax({ 
                                url: '../../../ajax/medicamentosAsociados.php',
                                data: idDiagnostico,
                                type: 'post',
                                async: false,
                                success: function(output) {
                                    $('#recomendadosInstitucion').html('');//limpio el espacio antes de mostrar

                                    $.each(output,function(index,val){
                                    var pill = '<span class="label label-info">'+val+'<a href="#'+index+'_'+val+'"><i class="icon-plus-sign icon-white"></i></a></span>';
                                    $('#recomendadosInstitucion').append(pill);//agrego cada uno de los medicamentos
                                    })//end each
                                }//end success
                            });//ajax
                           
                            // pill ejemplo
                            var label = '<span class="label label-info">Medicamento 1 <a href=""><i class="icon-plus-sign icon-white"></i></a></span>';
                            $('#recomendadosInstitucion').html(label);                            
                            
                            
                            
                            // se setea el dialogo
                            $("#medicamentosAsociados")
                                .dialog({
                                height: 250,
                                width: 275,
                                title: '<small>Medicamentos asociados a:</small> <span class="label label-inverse">'+nombreDiagnostico+'</span>',
                                autoOpen: false,
                                resizable: false,
                                position: {my: "left center", at: "center", of: $('#accordion3')}
                            });
                            //se abre el dialogo con los medicamentos asociados sugeridos
                            $("#medicamentosAsociados").dialog('open');

                         
                        })); // end click 
                        
                                
                            
//                      
//                      
//                      la siguiente función guarda en la bbdd un diagnostico
//                      especifico 
//                      
//                        $.ajax({ url: '../../../ajax/agregarHistorialMedico.php',
//                            data: { diagnostico: id_diagnostico, consulta:  id_consulta, tipo: id_tipo },
//                            type: 'post',
//                            success: function(output) {
//                                if(output == '1') {
//                                    $('#myModal').modal('hide'); //se esconde el modal
//                                    $('#diagnostico').val(''); // se borra el buscador
//                                    $('select>option:eq(0)').attr('selected', true); //se deja seleccionada la opcion 0
//                                    $('#comentario_diagnostico').val(''); // se borra el comentario
//                                    
//                                    //se agrega el pill correspondiente al div "log_diagnostico"
//                                    
//                                    
//                                    $('#log_diagnostico').html()
//                                    
//                                 
//                                }
//                                else{
//                                    $('#mensaje').html("<span style='color: red'>No se pudo insertar el disgnóstico</span>");
//                                }
//                            }
//                        });
                    });// end click
				
    
            
                </script>
