<?php
include_once(dirname(__FILE__) . '/../../ajax/sessionCheck.php');
iniciarCookie();
verificarIP();
include(dirname(__FILE__) . "/../funcionarioHeader.php");
?>
<div class="row-fluid">
    <div class="tab-content"><!-- contenido del panel 1-->

        <div class="tab-pane active img-rounded" id="tabVenderMedicamentos"><!-- tab Historial-->

            <div class="accordion" id="accordion1"><!-- accordion historial -->
                <div class="accordion-group"><!-- informacion personal del paciente-->
                    <?php
                    // muestra los detalles de paciente
                    include(dirname(__FILE__) . "/venderMedicamento.php");
                    ?>
                </div><!-- informacion personal del paciente-->
            </div>
        </div>
    </div>

        <div class="tab-content"><!-- contenido del panel 1-->

        <div class="tab-pane img-rounded" id="tabVerArsenal"><!-- tab Historial-->

            <div class="accordion" id="accordion2"><!-- accordion historial -->
                <div class="accordion-group"><!-- informacion personal del paciente-->
                    <?php
                    // muestra los detalles de paciente
                    include(dirname(__FILE__) . "/verArsenal.php");
                    ?>
                </div><!-- informacion personal del paciente-->
            </div>
        </div>
    </div>

</div>