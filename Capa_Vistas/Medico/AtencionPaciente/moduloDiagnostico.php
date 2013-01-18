
<div class="accordion-heading">
    <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion3" href="#collapseOne1">
        Diagnóstico
    </a>
</div>
<div id="collapseOne1" class="accordion-body collapse">
    <div class="accordion-inner"><!-- contenido del modulo diagnostico -->

        <div class="row-fluid">
            <div class="span6 modal-body"><!-- div donde estará el buscador -->     
            <strong><p>Ingrese nombre del diagnóstico</p></strong>

            <form class="form-search" id="buscar_diagnostico" method="post">
                <div class="input-append"> <!-- buscador inline con autocomplete -->

                    <input type="text" class="search-query" id="diagnostico" name="diagnostico">
                    <input type="submit" id="boton_diagnostico" class="btn" data-target="#myModal"  data-toggle="modal" value="Añadir" disabled>  <br>
           </form>
               </div><!-- buscador inline con autocomplete -->
            </div><!-- div del buscador-->
            
            <div id="log" class="span6"><!-- div de diagnosticos selecciondos -->
                <div id="log_titulo"></div>   
                <div id="log_diagnostico"></div> <!-- div donde se mostraran los diagnosticos obtenidos -->
            </div><!-- div de diagnosticos selecciondos -->
            



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
        <span id="id_diagnostico" style="display:none"></span>

        <p></p>
        <select id="tipo_diagnostico">
            <option value="0" selected="selected">Escoja un tipo...</option>
            <?php
            include_once('../../../Capa_Controladores/tipo.php');

            $tipos_diagnosticos = Tipo::Seleccionar('');

            foreach ($tipos_diagnosticos as $tipo) {

                echo'<option value="'.$tipo['idTipo'].'">'. $tipo['Nombre'] . '</option>';
            }
            ?>
        </select>
            <p></p>


                <p>Comentario: </p>
                <center> <textarea id="comentario_diagnostico" rows="2" style="width:90%"></textarea></center>
                <span id="mensaje"></span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info"  id="guardar_diagnostico" disabled="disabled">Diagnosticar</a>
                        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true" id="cancelar_modal">Cancelar</button>

                </div>
</div><!-- fin popup informacion diagnostico -->

<!-- dialogo que contiene los medicamentos asociados a un diagnostico -->
<div id="medicamentosAsociados">
    
    
        <?php $institucion = $_SESSION['institucionLog']; 
            echo '<button id="institucion" type="button" class="btn btn-danger btn-block" data-toggle="collapse" data-target="#recomendadosInstitucion"><i class="icon-white icon-circle-arrow-up"></i> Guía '.$institucion[1].'</button>';
            
        ?>
     
    
        <div id="recomendadosInstitucion" class="collapse in"><!-- div con los medicamentos asociados por la institucion-->
        </div><!-- div con los medicamentos asociados por la institucion-->
       
    
        <button id='medicamentosFavo' type='button' class='btn btn-danger btn-block' data-toggle='collapse' data-target='#recomendadosFav'><i class="icon-white icon-circle-arrow-up"></i>Guía GES</button>
        
        <div id="recomendadosFav" class="collapse in"><!-- div con los medicamentos asociados por favoritos-->
        <span class="label label-info">Principio Activo GES <a href="#valor"> <i class="icon-plus-sign icon-white"></i></a></span>
        </div><!-- div con los medicamentos asociados por los favoritos -->
</div> 


<!-- fin dialogo de "usos" -->
                
<script>
                            $("#medicamentosAsociados").hide();//escondo el dialogo
                            if($('#id_diagnostico').html()==""){
                                $('#boton_diagnostico').attr('disabled','disabled'); //se hace disabled el boton
                            }
                        
                            
                        $( "#diagnostico" ).autocomplete({
                                /**
                             * esta función genera el autocomplete para el campo de diagnostico (input)
                             * al seleccionar y escribir 2 letras se ejecuta el ajax
                             * busca en la base de datos en el archivo autocompleteDiagnostico.php
                             * el jSon correspondiente a las coincidencias
                             * 
                             * Funcion select que ejecutará una accion cuando se devuelva
                             */        
                          source: function( request, response ){
                                $.ajax({
                                    url: "../../../ajax/autocompleteDiagnostico.php",
                                    data: {
                                        name_startsWith: request.term
                                    },
                                    type: "post",
                                    success: function( data ){
                                        var output = jQuery.parseJSON(data);
                                        response( $.map( output, function( item ) {
                                           return {
                                                label: item
                                                //,id2:  item.idPrincipio_Activo
                                            }
                                            
                                        })); //end map / end response
                                    }//end success

                                }); // end ajax
                            },  // end source
                           select: function(event, ui){
                                    $('#diagnostico').removeAttr('idDiagnostico').attr('idDiagnostico',ui.item.id3)
                                    $('#guardar_diagnostico').removeAttr('disabled');
                                    $('#boton_diagnostico').removeAttr('disabled');
                                },
                           minLength: 2,
                           open: function() {
                                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
                                }, //end open
                           close: function() {
                                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                                } //end close
                            });
        
        
     
                        
    
    
                        $('#boton_diagnostico').click(function(){
                        /**
                         * funcion que envía el id del diagnostico y retorna el json 
                         * con todos los atributos para rellenar el popup del diagnostico
                         **/
                           
                           
                           var idDiagnostico = $("#buscar_diagnostico").serialize();
                            $.ajax({ 
                                url: '../../../ajax/diagnosticarPaciente.php',
                                data: idDiagnostico,
                                type: 'post',
                                async: false,
                                success: function(output) {
                                    alert(output)
                                    var data = jQuery.parseJSON(output);
                                                                                             
                                    $('#myModalLabel').html(data['Nombre']) ; //nombre de la enfermedad
                                    $('#id_diagnostico').html(data['idDiagnostico']); // id de la enfermedad
                                    //resto de la informacion que se busca desplegar en el popup
                                    
                                }//end success
                                

                            });// end ajax
                              
                        }); // end click
</script>
                
<script>
         
                    
                    $("#cancelar_modal").unbind('click').on('click',function(){
                        /**
                         * funcion que maneja el popup de diagnostico cuando se hace click
                         * en el boton canelar
                         * 
                         */
                        $('#myModalLabel').html('Debe Escojer un Diagnóstico'); // cambio el titulo
                        $('#imagenDiagnostico').html('<img src="../../../imgs/no_encontrado.jpg" style="width:30%" >');
                        $('select>option:eq(0)').attr('selected', true);
                        $('#diagnostico').val(''); // borro el buscador
                        $('#comentario_diagnostico').val(''); //borro el comentario
                        $('#boton_diagnostico').attr('disabled','disabled'); //se hace disabled el boton
                    }); //end on
                    
                    
                    $("#guardar_diagnostico").click(function(){
                            /**
                             * funcion que guarda el diagnostico correspondiente
                             * en el div al hacer click en "diagnosticar"
                             * agrega el pill en la seccion log_diagnostico
                             */
                        var nombre_diagnostico = $('#myModalLabel').text();    
                        var id_diagnostico= $('#id_diagnostico').text();
                        var id_consulta = $('#consulta').text();
                        var id_tipo = $('#tipo_diagnostico').val();
                        
                        var pill = '<div class="alert alert-info" idDiagnostico="'+id_diagnostico+'"><button type="button" class="close" data-dismiss="alert">×</button><strong>'+nombre_diagnostico+'</strong><a href=# class="editDiagnostico pull-right" rel="tooltip" title="Editar Diagnostico"><i class="icon-edit"></i> </a><a href=# class="protocolo pull-right" rel="tooltip" title="Ver Guias"><i class="icon-th-list"></i></a></div>';
                        $('#log').removeClass().addClass('span6 modal-body');
                        $('#log_titulo').html('<p><strong>Diagnosticos seleccionados:</strong></p>');
                        $('#log_diagnostico').prepend(pill);
                        $('#myModal').modal('hide');// se cierra el modal
                        $('#diagnostico').val(''); // se borra el buscador
                        $('select>option:eq(0)').attr('selected', true); //se deja seleccionada la opcion 0
                        $('#comentario_diagnostico').val(''); // se borra el comentario
                        $('#boton_diagnostico').attr('disabled','disabled'); //se hace disabled el boton
                            
                            
                     $('a[rel="tooltip"]').tooltip({title:"Ver Guías del diagnostico"}).unbind("click")
                        .on('click', (function(){
                            /**
                             *Funcion que abre el widget donde se encuentran los 
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
                                    output = $.parseJSON(output);
                                    $.each(output,function(i,value){
                                        $.each(value,function(indice,valor){
                                            if(indice == "Nombre_Comercial"){
                                            var pill = '<span class="label label-info">'+valor+' <a href="#'+valor+'"> <i class="icon-plus-sign icon-white"></i></a></span>';
                                            $('#recomendadosInstitucion').append(pill);//agrego cada uno de los medicamentos
                                            }//end if   
                                        })//end each
                                    })//end each
                                }//end success
                            });//ajax
                           
                            // se setea el dialogo
                            $("#medicamentosAsociados").dialog({
                                width: 250, 
                                title: '<small>Guías asociadas a:</small> <span class="label label-inverse">'+nombreDiagnostico+'</span>',
                                autoOpen: false,
                                resizable: false,
                                position: {my: "left center", at: "right", of: $('#log_diagnostico')}
                            }).dialog('open');

                         
                        })); // end click del tooltip
                    }); // end click guardar_diagnostico   
                  
               /*
                * comportamiento de los paneles colapsables
                * @author: Cesar González
                */ 

               $('#recomendadosInstitucion').on('hide',function(){
                   $('button[data-target="#recomendadosInstitucion"] i').removeClass("icon-circle-arrow-up").addClass("icon-circle-arrow-down");})
               $('#recomendadosInstitucion').on('show',function(){
                   $('button[data-target="#recomendadosInstitucion"] i').removeClass("icon-circle-arrow-down").addClass("icon-circle-arrow-up");})
               $('#recomendadosFav').on('hide',function(){
                   $('button[data-target="#recomendadosFav"] i').removeClass("icon-circle-arrow-up").addClass("icon-circle-arrow-down");})
               $('#recomendadosFav').on('show',function(){
                   $('button[data-target="#recomendadosFav"] i').removeClass("icon-circle-arrow-down").addClass("icon-circle-arrow-up");})
                                         
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
                  
				
    
            
</script>
