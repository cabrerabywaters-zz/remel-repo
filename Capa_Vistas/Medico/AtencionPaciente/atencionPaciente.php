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
    
        
        
        
       
        
        
    </body>
</html>
