<?php

include '../../../ajax/sessionCheck.php';

iniciarCookie();
verificarIP();
print_r($_SESSION);



include('../../medicoHeader.php'); // elementos visuales, navegacion y encabezado

/*******************************************************/ // consulta a la base de datos del usuario
include(dirname(__FILE__)."/../../../Capa_Controladores/paciente.php");
include(dirname(__FILE__)."/../../../Capa_Controladores/persona.php");
$RUTMedico=$_SESSION['RUT'];
$RUTPaciente = $_SESSION['RUTPaciente'];
$medico = Paciente::Seleccionar("WHERE Personas_RUN = '$RUTMedico'")[0];

$paciente1 = Paciente::Seleccionar("WHERE Personas_RUN = '$RUTPaciente'")[0];

$paciente2 = Persona::Seleccionar("WHERE RUN = '$RUTPaciente'")[0];

$paciente = array_merge($paciente1, $paciente2);
/***************************************/ // fin de la consulta llevar a ajax
?>


  <div class="tab-content"><!-- contenido del panel 1-->
    <div class="tab-pane active img-rounded" id="tabHistorial"><!-- tab Historial-->
      
        <div class="accordion" id="accordion2">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="btn btn-large btn-block btn-warning" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        Información Personal
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse">
      <div class="accordion-inner">
          <?php 
		  // muestra los detalles de paciente
		  include ("informacionPaciente.php"); ?>
      </div>
    </div>
  </div>
  <div class="accordion-group">
  
    <div class="accordion-heading">
      <a class="btn btn-large btn-block btn-warning" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        Información Médica
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
          <?php 
		  //muestra alergias y condiciones del paciente
		  include ("informacionMedica.php"); 
          mostrarAlergias($alergias);
          mostrarCondiciones($condiciones); ?>
      </div>
    </div>
  </div>
</div>
    </div><!-- Fin tab historial-->
    
    <div class="tab-pane img-rounded" id="tabConsulta"><!-- tab consulta-->

<div class="accordion" id="accordion3"><!-- accordion diagnostico-->
  <div class="accordion-group">
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
  </div>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="btn btn-large btn-block btn-warning" data-toggle="collapse" data-parent="#accordion3" href="#collapseTwo2">
        Receta
      </a>
    </div>
    <div id="collapseTwo2" class="accordion-body collapse">
      <div class="accordion-inner">
         <div class="modal-body img-rounded">
      <strong><p>Ingrese nombre del medicamento</p></strong>
    <form class="form-search">
  <div class="input-append">
    <input type="text" id="Recetas" class="span2 search-query">
    <button type="button" class="btn" data-toggle="collapse" data-target="#informacion2">Buscar</button>  <br>
    
   
    <div id="informacion2" class="collapse" > <span id="info2" class="badge badge-info">  <a  href="#myModal2" role="button"   data-toggle="modal"> Paracetamol </a></span></div>
  </div>
    </form>
    
   
    
  </div>
      </div>
    </div>
  </div>
</div><!-- accordion diagnostico-->
        
        
        
        
        
    </div><!-- Fin del tab consulta-->
    
  </div>
  </div><!-- fin contenido del panel-->
</div>
</div>
        
        
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><!-- popup informacion diagnostico -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Información del Paciente</h3>
            </div>
            <div class="modal-body">
                <strong><p>Resfrio Común</p></strong>
                <div class="span3"> <img src="../../../imgs/resfriado.jpg" style="width:30%" ></div>
                <p>El resfriado común, catarro, resfrío o romadizo es una enfermedad infecciosa viral leve del sistema respiratorio superior que afecta a personas de todas las edades, altamente contagiosa, causada fundamentalmente por rinovirus y coronavirus.</p>
                <p>Comentario: </p>
                <center> <textarea rows="2" style="width:90%"></textarea></center>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <a href="atendiendo_paciente.php" role="button" class="btn btn-warning">Diagnosticar</a>
            </div>
        </div><!-- fin popup informacion diagnostico -->
        
        
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
        </div>
        
       
        
        
    </body>
</html>
