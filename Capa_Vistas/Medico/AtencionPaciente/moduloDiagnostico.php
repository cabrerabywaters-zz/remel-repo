
<div class="accordion-heading">
    <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion3" href="#collapseOne1">
        Diagnóstico
    </a>
</div>
<div id="collapseOne1" class="accordion-body collapse">
    <div class="accordion-inner"><!-- contenido del modulo diagnostico -->

        <div class="modal-body">

            <strong><p>Ingrese nombre del diagnóstico</p></strong>

            <form class="form-search" id="buscar_diagnostico" method="post">
                <div class="input-append"> <!-- buscador inline con autocomplete -->

                    <input type="text" class="span2 search-query" id="diagnostico" name="diagnostico">
                    <input type="submit" id="boton_diagnostico" class="btn" data-target="#myModal"  data-toggle="modal" value="Añadir" disabled>  <br>

                    <script>
                        $(function() {
                            /**
                             * esta función genera el autocomplete para el campo de diagnostico (input)
                             * al seleccionar y escribir 2 letras se ejecuta el ajax
                             * busca en la base de datos en el archivo autocompleteDiagnostico.php
                             * el jSon correspondiente a las coincidencias
                             * 
                             * Funcion select que ejecutará una accion cuando se devuelva
                             */
                            function log( message ) {
                                /**
                                 * Funcion log
                                 *      Recibe: message -> string de mensaje
                                 *      Retorna: agrega el mensaje en el div con id = "log"
                                 **/
                                $( "<div>" ).text( message ).prependTo( "#log" );
                                $( "#log" ).scrollTop( 0 );
                            }
 
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
                                /**
                                 * ESTA FUNCION ES LA QUE REALIZA LA ACCION UNA VEZ ESTÁ SELECCIONADO
                                 * ALGUNO DE LOS ELEMENTOS MOSTRADOS
                                 * ---------
                                 * en este caso se muestra de forma simple
                                 * (cambiar esto segun como se quieran mostrar los datos)
                                 */
                                select: function( event, ui ) {
                                    log( ui.item ?
                                        "Selected: " + ui.item.label :
                                        "Nothing selected, input was " + this.value);
                                },
                                open: function() {
                                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
                                },
                                close: function() {
                                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                                }
                            });
        
        
     
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
                                    //resto de la informacion que se busca desplegar en el popup
                                    
                                }
                           

                            });// end ajax
                           }
                          
                        });
                    </script>




                </div>
                <div>
                <div id="log_titulo"></div>   
                <div id="log_diagnostico" class="span3"></div> <!-- div donde se mostraran los diagnosticos obtenidos -->
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
        <img src="#" class="img-rounded" width="100px" height="100px">
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
                        
                        var pill = '<div class="alert alert-info" id="id_diagnostico'+id_diagnostico+'"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+nombre_diagnostico+'</strong></div>';
                        $('#log_titulo').html('<p>Diagnosticos seleccionados:</p>');
                        $('#log_diagnostico').prepend(pill);
                        $('#myModal').modal('hide');
                        
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
                    });
				
    
            
                </script>
