<?php

include '../../../ajax/sessionCheck.php';

iniciarCookie();
verificarIP();



include('../../medicoHeader.php'); // elementos visuales, navegacion y encabezado


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

<div class="accordion" id="accordion3"><!-- accordion consulta-->
  
    <div class="accordion-group"><!-- accordion diagnostico-->
        <?php include('moduloDiagnostico.php'); ?>
  </div><!-- accordion diagnostico
  <div class="accordion-group"><!--accordion receta  -->
    <?php include('moduloReceta.php'); ?>
  </div>


</div><!-- accordion consulta-->
        
        
        
        
        
    </div><!-- Fin del tab consulta-->
    
  </div>
  </div><!-- fin contenido del panel-->
</div>
</div>
        
        
      
        
        
        
       
        
        
    </body>
</html>
