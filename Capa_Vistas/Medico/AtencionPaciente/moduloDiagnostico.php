
<div class="accordion-heading">
    <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion3" href="#collapseOne1">
        Diagnóstico
    </a>
</div>
<!-- modulo donde se diagnosticas los diagnosticos del pacinte desplegando los datos existentes y enlazarlos a uno -->
<div id="collapseOne1" class="accordion-body collapse in">
    <div class="accordion-inner"><!-- contenido del modulo diagnostico -->

        <div class="row-fluid">
            <div class="span6 modal-body img-rounded"><!-- div donde estará el buscador -->     
            <strong><p>Tipo de diagnóstico</p></strong>

            <div class="form-search" id="buscar_diagnostico">
                <select id="tipo_diagnostico">
                                <?php
                                include_once('../../../Capa_Controladores/tipo.php');

                                $tipos_diagnosticos = Tipo::Seleccionar('');

                                foreach ($tipos_diagnosticos as $tipo) {

                                    echo'<option value="'.$tipo['idTipo'].'">'. $tipo['Nombre'] . '</option>';
                                }
                                ?>
                </select>
                <strong><p><br>Ingrese diagnóstico</p></strong>
                <input type="text" class="search-query" id="diagnostico" placeholder="Ingrese Diagnóstico" name="diagnostico">
                    <br>
                
               </div><!-- buscador inline con autocomplete -->
            
            <!-- popup informacion diagnostico -->
                        <div id="modalDiagnostico" class="collapse">
                            <div class="arrow"></div>
                            <br>
                            <strong><h3 id="modalDiagnosticoLabel" class="popover-title">Debe seleccionar un Diagnóstico</h3></strong>

                            <div class="popover-content">
                            <span id="id_diagnostico" style="display:none"></span>
                            <span id="esGES" style="display:none">0</span>
                            <p>Comentario: </p>
                            <center> <textarea id="comentario_diagnostico" rows="2" style="width:90%" placeholder="Puede Ingresar un comentario para su diagnostico"></textarea></center>
                            <span id="mensaje"></span>
                                <a class="addFav btn btn-inverse pull-right" href="#" title="Añadir a Favoritos"><i class="icon-star icon-white"></i></a>
                                <button class="btn btn-info"  id="guardar_diagnostico" disabled="disabled">Añadir <i class="icon-ok"></i></button>
                                <button class="btn btn-info" id="guardar_cambios" disabled="disabled">Guardar <i class="icon-ok"></i></button>  
                                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true" id="cancelar_modal">Cancelar</button>
                            </div>   
                        </div><!-- fin popup informacion diagnostico -->
            </div><!-- div del buscador-->
            
            <div id="log" class="span6"><!-- div de diagnosticos selecciondos -->
                <div id="log_titulo"></div>   
                <div id="log_diagnostico"></div> <!-- div donde se mostraran los diagnosticos obtenidos -->
            </div><!-- div de diagnosticos selecciondos -->
            



        </div>
    </div>
</div>

<!-- dialogo que contiene los medicamentos asociados a un diagnostico -->
<div id="medicamentosAsociados">
    
    
        <?php 
        echo '<button id="sucursal" type="button" class="btn btn-danger btn-block" data-toggle="collapse" data-target="#recomendadosInstitucion"><i class="icon-white icon-circle-arrow-up"></i> Guía '.$lugar['idSucursal'].'</button>';
            
        ?>
     
    
        <div id="recomendadosInstitucion" class="collapse in"><!-- div con los medicamentos asociados por la institucion-->
        </div><!-- div con los medicamentos asociados por la institucion-->
       
    
        <button type='button' class='btn btn-danger btn-block' data-toggle='collapse' data-target='#recomendadosFav'><i class="icon-white icon-circle-arrow-up"></i>Guía GES</button>
        
        <div id="guiaGES" class="collapse in"><!-- div con los medicamentos asociados por favoritos-->
        <span class="label label-info">Principio Activo GES <a href="#valor"> <i class="icon-plus-sign icon-white"></i></a></span>
        </div><!-- div con los medicamentos asociados por los favoritos -->
</div> 


<!-- fin dialogo de "usos" -->
                
<script>
          $('a[href="#tabConsulta"]').click(function(){
              $('#diagnostico').focus();
              
          })
          
          
          
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
                                var diagnosticados = [];
                                $('.diagnostico').each(function(){
                                    diagnosticados = $(this).attr('idDiagnostico');
                                });
                                
                                $.ajax({
                                    url: "../../../ajax/autocompleteDiagnostico.php",
                                    data: {
                                        name_startsWith: request.term,
                                        "diagnosticados": diagnosticados
                                    },
                                    type: "post",
                                    success: function( data ){
                                        var output = jQuery.parseJSON(data);
                                                                                
                                        response( $.map( output, function( item ) {
                                           return {
                                               label: item.Nombre
                                              ,id3 : item.idDiagnostico
                                            }
                                            
                                        })//end map
                                        );  // end response
                                    }//end success

                                }); // end ajax
                            },  // end source
                           select: function(event, ui){
                                    $('#diagnostico').removeAttr('idDiagnostico').attr('idDiagnostico',ui.item.id3)
                                    $('#guardar_diagnostico').removeAttr('disabled');
                                    
                                 /* funcion que envía el id del diagnostico y retorna el json 
                                 * con todos los atributos para rellenar el popup del diagnostico
                                 **/
                                   $('#guardar_cambios').hide();
                                   $('#guardar_diagnostico').show();
                                   $('select>option:eq(0)').attr('selected', true); 
                                   $('#comentario_diagnostico').val('');

                                   var postData = $("#diagnostico").attr('iddiagnostico');
                                   $.ajax({ 
                                        url: '../../../ajax/informacionDiagnostico.php',
                                        data: {"diagnostico":postData},
                                        type: 'post',
                                        async: false,
                                        success: function(output) {

                                            var data = jQuery.parseJSON(output);
                                            $('#modalDiagnosticoLabel').text(data['Nombre']) ; //nombre de la enfermedad
                                            $('#id_diagnostico').html(data['idDiagnostico']);// id de la enfermedad

                                            if(data['Es_Ges'] != null){ // el diagnostico es ges se informa con un pill y un
                                                $('#modalDiagnosticoLabel').append('<span class="badge badge-success">Considerado GES por MINSAL</span>')
                                                $('#esGES').html('1');
                                            } // end if
                                            //resto de la informacion que se busca desplegar en el popup
                                          $('#modalDiagnostico').collapse('show');  
                                        $('.addFav').removeAttr('disabled');
                                        }//end success


                                    });// end ajax    
                            
                            
                            
                            
                             }, //end select:
                           minLength: 2,
                           open: function() {
                                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
                                }, //end open
                           close: function() {
                                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                                } //end close
                            });//autocompleteDiagnosticos
            
</script>



<script>
                    /*
                     * dialogo donde se guardarán las guías relativas al diagnostico
                     */
                    $("#medicamentosAsociados").dialog({
                                width: 250, 
                                title: '<div id="titleGuias"><small>Guías asociadas a:</small></div>',
                                autoOpen: false,
                                resizable: false,
                                position: {my: "left center", at: "right", of: $('#log_diagnostico')}
                            })
                    
                    $("#cancelar_modal").unbind('click').on('click',function(){
                        /**
                         * funcion que maneja el popup de diagnostico cuando se hace click
                         * en el boton canelar
                         * 
                         */
                        $('#modalDiagnosticoLabel').html('Debe Escojer un Diagnóstico'); // cambio el titulo
                        $('select>option:eq(1)').attr('selected', true);
                        $('#diagnostico').val(''); // borro el buscador
                        $('#comentario_diagnostico').val(''); //borro el comentario
                        $('#modalDiagnostico').collapse('hide');
                    }); //end on
                    
                    
                    $("#guardar_diagnostico").click(function(){
                            /**
                             * funcion que guarda el diagnostico correspondiente
                             * en el div al hacer click en "diagnosticar"
                             * agrega el pill en la seccion log_diagnostico
                             */
                        var nombre_diagnostico = $('#modalDiagnosticoLabel').text();    
                        var id_diagnostico= $('#id_diagnostico').text();
                        var id_consulta = $('#consulta').text();
                        var id_tipo = $('#tipo_diagnostico').val();
                        var comentarioDiagnostico = $('#comentario_diagnostico').val();
                        var esGES = $('#esGES').text();
                        
                        var pill = '\
                        <div class="alert alert-info diagnostico" idDiagnostico="'+id_diagnostico+'" esGES="'+esGES+'" tipoDiagnostico="'+id_tipo+'" comentarioDiagnostico="'+comentarioDiagnostico+'">\n\
                        <button type="button" class="close" data-dismiss="alert">×</button><a href=# class="editar pull-right" data-target="#modalDiagnostico" id="editarDiagnostico" rel="tooltip" title="Editar Diagnostico"><i class="icon-pencil"></i> </a>\n\
                        <strong>'+nombre_diagnostico+'</strong>\n\
                        </div>';
                        
                
                        $('#log').removeClass().addClass('span6 modal-body img-rounded');
                        $('#log_titulo').html('<p><strong>Diagnosticos seleccionados:</strong></p>');
                        $('#log_diagnostico').prepend(pill);
                        $('#modalDiagnostico').collapse('toggle');// se cierra el modal
                        $('#diagnostico').val(''); // se borra el buscador
                        $('select>option:eq(0)').attr('selected', true); //se deja seleccionada la opcion 0
                        $('#comentario_diagnostico').val(''); // se borra el comentario 
                        
                        
     //BOTON EDITAR
     //AUTOR: MAX SILVA mit master oviedo
     $('.editar').tooltip({title:"edita"}).unbind('click').on('click',function(){  
            
            var idDiagnosticoEdit = $(this).parent().attr('iddiagnostico');
         
            $('#modalDiagnosticoLabel').text($(this).parent().children('strong').text());
            $('#comentario_diagnostico').val($(this).parent().attr('comentariodiagnostico'));
            $('#tipo_diagnostico').val($(this).parent().attr('tipodiagnostico'));
            $('#esGES').text($(this).parent().attr('esges'));
                
            $('#guardar_cambios').show().attr('disabled',false);
            $('#guardar_diagnostico').hide();
            $('.addFav').removeAttr('disabled')
            $('#modalDiagnostico').collapse('show');
                     
                     
            $('#guardar_cambios').unbind('click').on('click',function(){
                   
                   var comentario = $('#comentario_diagnostico').val();
                   var tipo_diagnostico = $('#tipo_diagnostico').val();
                       
                       $('.diagnostico[iddiagnostico="'+ idDiagnosticoEdit +'"]').attr('comentariodiagnostico',comentario);
                       $('.diagnostico[iddiagnostico="'+ idDiagnosticoEdit +'"]').attr('tipodiagnostico',tipo_diagnostico);
                         
                       $('#modalDiagnostico').collapse('hide');
                         
                     });
                 });//FIN BOTON EDITAR                      
      
      
                     $('.protocolo').tooltip({title:"Ver Guías del diagnostico"}).unbind("click")
                        .on('click', (function(){
                            /**
                             *Funcion que abre el widget donde se encuentran los 
                             *medicamentos asignados al diagnostico seleccionado
                             */
                            
                            var nombreDiagnostico = $(this).parent().children('strong').html(); //nombre del diagnostico clickeado
                            var idDiagnostico = $(this).parent().attr('idDiagnostico');  // id del diagnostico clickeado
                            
                            
                            
                            // generar pills vía ajax syncronico
                            $.ajax({ 
                                url: '../../../ajax/medicamentosAsociados.php',
                                data: {"idDiagnostico":idDiagnostico},
                                type: 'post',
                                async: false,
                                success: function(output) {
                                    alert(output)
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
                            $('#titleGuias').append(nombreDiagnostico);
                            $("#medicamentosAsociados").dialog('open');
                        })); // end click del tooltip
                    }); // end click guardar_diagnostico   
                  
               /*
                * comportamiento de los paneles colapsables
                * @author: Cesar González
                */ 
               $('#recomendadosInstitucion').on('hide',function(){
                   $('button[data-target="#recomendadosInstitucion"] i').removeClass("icon-circle-arrow-up").addClass("icon-circle-arrow-down");});
               $('#recomendadosInstitucion').on('show',function(){
                   $('button[data-target="#recomendadosInstitucion"] i').removeClass("icon-circle-arrow-down").addClass("icon-circle-arrow-up");});
               $('#recomendadosFav').on('hide',function(){
                   $('button[data-target="#recomendadosFav"] i').removeClass("icon-circle-arrow-up").addClass("icon-circle-arrow-down");});
               $('#recomendadosFav').on('show',function(){
                   $('button[data-target="#recomendadosFav"] i').removeClass("icon-circle-arrow-down").addClass("icon-circle-arrow-up");});
                                         


    
            
</script>




