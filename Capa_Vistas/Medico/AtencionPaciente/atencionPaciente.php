<?php

include '../../../ajax/sessionCheck.php';

iniciarCookie();
verificarIP();



include('../../medicoHeader.php'); // elementos visuales, navegacion y encabezado


?>


  <div class="tab-content"><!-- contenido del panel 1-->
    
    <div class="tab-pane active img-rounded" id="tabHistorial"><!-- tab Historial-->
      
        <div class="accordion" id="accordion2"><!-- accordion historial -->
            <div class="accordion-group"><!-- informacion personal del paciente-->
                 <?php 
		  // muestra los detalles de paciente
		  include ("informacionPaciente.php"); 
                  ?>
            </div><!-- informacion personal del paciente-->
            
            <div class="accordion-group"><!-- informacion medica registrada-->
                <?php 
		  //muestra alergias y condiciones del paciente
		  include ("informacionMedica.php"); 
                ?>
            </div><!-- informacion medica registrada-->
        </div>
    
    </div><!-- Fin tab historial-->
    
    <div class="tab-pane img-rounded" id="tabConsulta"><!-- tab consulta-->

        <div class="accordion" id="accordion3"><!-- accordion consulta-->
  
            <div class="accordion-group"><!-- accordion diagnostico-->
            <?php include('moduloDiagnostico.php'); ?>
            </div><!-- accordion diagnostico -->
    
            <div class="accordion-group"><!--accordion receta  -->
            <?php include('moduloReceta.php'); ?>
            </div>
        
        </div><!-- accordion consulta-->
      
    </div><!-- Fin del tab consulta-->
    

  </div><!-- fin contenido del panel-->
</div><!--fin div contenido -->
</div><!-- fin contenedor general -->
        
        
      
        
        
        
       
        
        
    </body>
</html>
