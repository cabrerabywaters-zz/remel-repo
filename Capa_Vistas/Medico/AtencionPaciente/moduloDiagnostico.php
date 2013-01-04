    <div class="accordion-heading">
      <a class="btn btn-large btn-block btn-warning" data-toggle="collapse" data-parent="#accordion3" href="#collapseOne1">
        Diagnóstico
      </a>
    </div>
    <div id="collapseOne1" class="accordion-body collapse">
        <div class="accordion-inner">
            
            <div class="modal-body">
            <strong><p>Ingrese nombre del diagnóstico</p></strong>
            <form class="form-search">
            <div class="input-append"> <!-- buscador inline con autocomplete -->
               
            <input type="text" class="span2 search-query" id="diagnostico">
            <button type="button" class="btn btn" data-toggle="collapse" data-target="#informacion">Buscar</button>  <br>
            
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
			alert(data);
                        response( $.map( data.geonames, function( item ) {
                            return {
                                label: item.name,
                                value: item.name
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

    </script>

            
            
            
            </div>
   
            <div id="log" class="collapse" > </div> <!-- div donde se mostraran los diagnosticos obtenidos -->
          
            </form>
    
   
    
  </div>
      </div>
    </div>
