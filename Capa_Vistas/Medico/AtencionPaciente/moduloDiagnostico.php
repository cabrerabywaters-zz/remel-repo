
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
                    <input type="submit" id="boton_diagnostico" onClick="javascript:enviar_diagnostico()" class="btn btn" data-target="#myModal"  data-toggle="modal" value="Añadir">  <br>

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
    
    
                        function enviar_diagnostico(){
                            var postData = $("#buscar_diagnostico").serialize();
                            $.ajax({ 
                                url: '../../../ajax/diagnosticarPaciente.php',
                                data: postData,
                                type: 'post',
                                success: function(output) {
                                    var data = jQuery.parseJSON(output);

                                    $('#myModalLabel').html(data['Nombre']) ; //nombre de la enfermedad
                                    $('#id_diagnostico').html(data['idDiagnostico']); // id de la enfermedad
                                    //

                                }

                            });// end ajax
                          
                        }
                    </script>




                </div>

                <div id="log" class="collapse" > </div> <!-- div donde se mostraran los diagnosticos obtenidos -->

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
        <div class="span3" id="imagenDiagnostico"> </div>
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



                <p>Comentario: </p>
                <center> <textarea id="comentario_diagnostico" rows="2" style="width:90%"></textarea></center>
                <span id="mensaje"></span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info"  id="diagnoticar_modal">Diagnosticar</a>
                        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true" id="cancelar_modal">Cancelar</button>

                </div>
                </div><!-- fin popup informacion diagnostico -->
                <script>
                    $("#cancelar_modal").click(function() {
                        $('#myModalLabel').html('Debe Escojer un Diagnóstico');
                        $('#imagenDiagnostico').html('<img src="../../../imgs/no_encontrado.jpg" style="width:30%" >');
                        $('select>option:eq(0)').attr('selected', true);
                        $('#diagnostico').val('');
                        $('#comentario_diagnostico').val('');
                    });
                    
                    
                    $("#diagnoticar_modal").click(function() {
                     
        
                        var id_diagnostico= $('#id_diagnostico').html();
                        var id_consulta = $('#consulta').html();
        
			var id_tipo = document.getElementById('tipo_diagnostico').value ;
                        
                        $.ajax({ url: '../../../ajax/agregarHistorialMedico.php',
                            data: { diagnostico: id_diagnostico, consulta:  id_consulta, tipo: id_tipo },
                            type: 'post',
                            success: function(output) {
                                if(output == '1') {
                                    $('#myModal').modal('hide');
                                    $('#diagnostico').val('');
                                    $('select>option:eq(0)').attr('selected', true);
                                  $('#comentario_diagnostico').val('');
                                 
                                }
                                else{
                                    $('#mensaje').html("<span style='color: red'>No se puedo insertar el disgnóstico</span>");
                                }
                            }
                        });
                    });
				
    
            
                </script>
