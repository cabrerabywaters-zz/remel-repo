<?php
include '/../../ajax/sessionCheck.php';

iniciarCookie();
verificarIP();
include('/../pacienteHeader.php');
?>
    <body>
  
    <div class="tab-content"><!-- contenido del panel 1-->
    
    <div class="tab-pane active img-rounded" id="tabInfoPersonal"><!-- tab info personal-->
      
        <div class="accordion" id="accordion2"><!-- accordion info personal -->
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
        </div><!-- fin acordion info personal-->
    
    </div><!-- Fin tab info personal-->
    <div class="tab-pane img-rounded" id="tabDiagnosticos"><!-- tab Diagnostico-->
      
        <div class="accordion" id="accordion2"><!-- accordion historial -->
            <div class="accordion-group"><!-- informacion personal del paciente-->
                 <?php include("diagnosticosPaciente.php"); ?>
            </div><!-- informacion personal del paciente-->
            
        </div>
    
    </div><!-- Fin tab Diagnostico-->
    <div class="tab-pane img-rounded" id="tabRecetas"><!-- tab Recetas-->
      
        <div class="accordion" id="accordion2"><!-- accordion historial -->
            <div class="accordion-group"><!-- informacion personal del paciente-->
                 Hola
            </div><!-- informacion personal del paciente-->
            
            <div class="accordion-group"><!-- informacion medica registrada-->
              hola
            </div><!-- informacion medica registrada-->
        </div>
    
    </div><!-- Fin tab Recetas-->
    <div class="tab-pane img-rounded" id="tabHistorialMedico"><!-- tab Historial Medico-->
      
        <div class="accordion" id="accordion2"><!-- accordion historial -->
            <div class="accordion-group"><!-- informacion personal del paciente-->
                 Hola
            </div><!-- informacion personal del paciente-->
            
            <div class="accordion-group"><!-- informacion medica registrada-->
              hola
            </div><!-- informacion medica registrada-->
        </div>
    
    </div><!-- Fin tab Historial Medico-->
</div><!--fin div contenido panel-->
</div><!-- fin contenedor general -->
    
    </body>
</html>
