<?php

include '../../../ajax/sessionCheck.php';

iniciarCookie();
verificarIP();



include('../../medicoHeader.php'); // elementos visuales, navegacion y encabezado


?>

<div class="row-fluid">
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
            <div class="accordion-group"><!-- informacion medica registrada-->
                <?php 
		  //muestra alergias y condiciones del paciente
		  include ("recetasVigentes.php"); 
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
  
  
  <div class="span4 img-rounded">
  <!-- barra de favoritos -->
  <?php include_once('../favBar.php');?>
  <!-- barra de favoritos -->
  </div>
  
  <?php require_once'resumenReceta.php'; ?>
</div><!--fin div contenido -->
</div>
</div><!-- fin contenedor general -->
        
<script>
    $('#favBar').hide(); //para que la barra de favoritos se no se muestre al inicio
$('#toggleFav').click(
    function(){// se ejecuta
        if($('.tab-content').hasClass('span8')){// si el panel está chico
            $(this).parent().addClass('active'); // se pone como activo
            $('#favBar').show();// se muestra simplemente
        }
        else{// si el panel está grande
           $('.tab-content').addClass('span8'); //achico el panel
           $('#favBar').show();// se muestra simplemente
        }
    }
    
); // click
  

$('.closeBar').click(function(){
    /*
     * funcion que oculta el div de favoritos o arsenal se gun corresponda.
     * si no hay ninguno visible entonces agranda el espacio de muestra.
     */
    var padre = $(this).parent().parent();
    padre.hide();
    
    $('.tab-content').removeClass('span8'); //agrando el div contenido
    
});//end click (close bar)

</script>        


</body>
</html>
