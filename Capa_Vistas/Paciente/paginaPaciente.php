<?php
include '/../../ajax/sessionCheck.php';

iniciarCookie();
verificarIP();
include('/../pacienteHeader.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head> 
    <body>
        
        
  
  
    <div class="tab-content"><!-- contenido del panel 1-->
    
    <div class="tab-pane active img-rounded" id="tabHistorial"><!-- tab Historial-->
      
        <div class="accordion" id="accordion2"><!-- accordion historial -->
            <div class="accordion-group"><!-- informacion personal del paciente-->
                 <?php 
		  // muestra los detalles de paciente
		  include ("informacionPacientePaciente.php"); 
                  ?>
            </div><!-- informacion personal del paciente-->
            
            <div class="accordion-group"><!-- informacion medica registrada-->
                <?php 
		  //muestra alergias y condiciones del paciente
		  include ("informacionMedicaPaciente.php"); 
                ?>
            </div><!-- informacion medica registrada-->
        </div>
    
    </div><!-- Fin tab historial-->
    </body>
</html>
