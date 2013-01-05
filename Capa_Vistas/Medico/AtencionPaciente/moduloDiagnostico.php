    <div class="accordion-heading">
      <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion3" href="#collapseOne1">
        Diagnóstico
      </a>
    </div>
    <div id="collapseOne1" class="accordion-body collapse">
        <div class="accordion-inner">
            
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
                                       $('#myModalLabel').html(data['idDiagnostico']) ;                         
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

  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><!-- popup informacion diagnostico -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">El Diagnóstico No Existe</h3>
            </div>
            <div class="modal-body">
                <strong><p></p></strong>
                <div class="span3" id="imagenDiagnostico"> </div>
                <p></p>
                <p>Comentario: </p>
                <center> <textarea rows="2" style="width:90%"></textarea></center>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true" id="cancelar_modal">Cancelar</button>
                <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true" id="diagnoticar_modal">Diagnosticar</a>
            </div>
        </div><!-- fin popup informacion diagnostico -->
        <script>
            $("#cancelar_modal").click(function() {
      $('#myModalLabel').html('El Diagnóstico No Existe');
      $('#imagenDiagnostico').html('<img src="../../../imgs/no_encontrado.jpg" style="width:30%" >');
});
            
            </script>