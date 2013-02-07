<?php
include './../../ajax/sessionCheck.php';

iniciarCookie();
verificarIP();
include('./../pacienteHeader.php');
?>
<!-- esta es la pagina principal del paciente donde se incluyen todos los demas archivos -->
    <body>
  
    <div class="tab-content"><!-- contenido del panel 1-->
    

    <div class="tab-pane active img-rounded" id="tabInfoPersonal"><!-- tab info personal-->
      
        <div class="accordion" id="accordion1"><!-- accordion info personal -->
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
    
    <div class="tab-pane img-rounded" id="tabRecetas"><!-- tab info personal-->
      
        <div class="accordion" id="accordion3"><!-- accordion info personal -->
            <div class="accordion-group"><!-- informacion personal del paciente-->
               <?php 
		  // muestra los detalles de paciente
		  include ("recetasHistorial.php"); 
                  ?>
            </div><!-- informacion personal del paciente-->
        </div><!-- fin acordion info personal-->
    
    </div><!-- Fin tab info personal-->

       <div class="tab-pane img-rounded" id="tabHistorialMedico"><!-- tab info personal-->
      
        <div class="accordion" id="accordion4"><!-- accordion info personal -->
            <div class="accordion-group"><!-- informacion personal del paciente-->
               <?php 
		  // muestra los detalles de paciente
		  include ("pacienteMiHistorialMedico.php"); 
                  ?>
            </div><!-- informacion personal del paciente-->
        </div><!-- fin acordion info personal-->
    
    </div><!-- Fin tab info personal-->
    <div class="tab-pane img-rounded" id="infoRelevante"><!-- tab de info Revelante-->
      
        <div class="accordion" id="accordion5"><!-- accordion info Relevante
         -->
            <div class="accordion-group">
           <!-- Diagnosticos del paciente-->
                 <?php 
		  // muestra los detalles de paciente
		  include ("informacionRelevante.php"); 
                  ?>
            </div><!-- fin diagnosticos del paciente-->
        </div><!-- fin acordion info Diagnostico-->
    
    </div><!-- Fin tab Diagnostico--> 
    <div class="tab-pane img-rounded" id="calendario"><!-- tab de info Revelante-->
      
        <div class="accordion" id="accordion6"><!-- accordion info Relevante
         -->
            <div class="accordion-group">
           <!-- Diagnosticos del paciente-->
                 <?php 
		 include ("calendario.php"); 
                  ?>
            </div><!-- fin diagnosticos del paciente-->
        </div><!-- fin acordion info Diagnostico-->
    
    </div><!-- Fin tab Diagnostico--> 
    
     <div class="tab-pane img-rounded" id="medicamentos"><!-- tab de info Revelante-->
      
        <div class="accordion" id="accordion6"><!-- accordion info Relevante
         -->
            <div class="accordion-group">
           <!-- Diagnosticos del paciente-->
                 <?php 
		 include ("medicamentos.php"); 
                  ?>
            </div><!-- fin diagnosticos del paciente-->
        </div><!-- fin acordion info Diagnostico-->
    
    </div><!-- Fin tab Diagnostico--> 
    
 <!-- </div><!--fin div contenido panel-->
 <!-- </div><!-- fin contenedor general -->
    
    </body>
</html>
