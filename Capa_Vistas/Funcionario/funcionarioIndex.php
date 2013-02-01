<?php
/*
_________                    __   .__  ____  __.        
\______   \_______ _____   _/  |_ |__||    |/ _|  ____  
 |     ___/\_  __ \\__  \  \   __\|  ||      <   /  _ \ 
 |    |     |  | \/ / __ \_ |  |  |  ||    |  \ (  <_> )
 |____|     |__|   (____  / |__|  |__||____|__ \ \____/ 
                        \/                    \/        
 josegonzalez@alumnos.uai.cl +56984641608

*/



include_once(dirname(__FILE__) . '/../../ajax/sessionCheck.php');
iniciarCookie();
verificarIP();
include(dirname(__FILE__) . "/../funcionarioHeader.php");
?>
<div class="row-fluid">
    <div class="tab-content"><!-- contenido del panel 1-->

        <div class="tab-pane active img-rounded" id="tabVenderMedicamentos"><!-- tab Historial-->

            <!--<div class="accordion" id="accordionF1"><!-- accordion historial -->
            <!--    <div class="accordion-group"><!-- informacion personal del paciente-->
                    <?php
                    // muestra los detalles de paciente
                    include("venderMedicamento.php");
                    ?>
                </div><!-- informacion personal del paciente-->
            <!--</div>-->
        <!--</div>-->
    </div>

        <div class="tab-content"><!-- contenido del panel 1-->

        <div class="tab-pane img-rounded" id="tabVerArsenal"><!-- tab Historial-->

           <!-- <div class="accordion" id="accordionF2"><!-- accordion historial -->
               <!-- <div class="accordion-group"><!-- informacion personal del paciente-->
                    <?php
                    // muestra los detalles de paciente
                    include("verArsenal.php");
                    ?>
                </div><!-- informacion personal del paciente-->
            </div>
     <!--   </div>
    </div>-->

</div>