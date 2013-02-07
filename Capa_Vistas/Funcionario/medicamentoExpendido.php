<?php
/*
 * Muestra mensaje de exito e ingresa el medicamento vendido a la BDD
 * Input: Ninguno
 * Output: Ingreso de la venta a la BDD
 * 
 */
include_once(dirname(__FILE__) . '/../../ajax/sessionCheck.php');
iniciarCookie();
verificarIP();
include(dirname(__FILE__) . "/../funcionarioHeader.php");
include(dirname(__FILE__) . "/../../Capa_Controladores/medicamentoVendido.php");
?>
<div class="row-fluid">
    <div class="tab-content"><!-- contenido del panel 1-->
        <div class="tab-pane active img-rounded" id="tabVenderMedicamentos"><!-- tab Historial-->

<?php
$fechaActual = date("Y-m-d H:i:s");
$med = MedicamentoVendido::InsertarConParametros($_SESSION['logLugar']['idLugar'], 
                                                                $_SESSION['medicamentoID'],
                                                                $_SESSION['recetaID'], 
                                                                $_SESSION['cantidadMedicamentoVendido'], 
                                                                $fechaActual, 
                                                                $_SESSION['compradorRUT'],
                                                                $_SESSION['precio'])
        ;
if ($med){
 echo 'Medicamento Expendido Exitosamente.';   
}
?>
<center>
        <button id="volver" class="btn btn-primary" onClick="volver()" type="submit"><strong>Volver al Inicio</strong></button>
        <button id="volverMedicamentos" class="btn btn-primary" onClick="volverMedicamentos()" type="submit"><strong>Expender más Medicamentos</strong></button>

    </center>
</div>

    <div class="tab-pane img-rounded" id="tabVerArsenal"><!-- tab Historial-->

            <!-- <div class="accordion" id="accordionF2"><!-- accordion historial -->
            <!-- <div class="accordion-group"><!-- informacion personal del paciente-->
            <?php
            // muestra los detalles de paciente
            include("verArsenal.php");
            ?>
        </div>
</div>
</div>
<script>
    
    function volver(){
        window.location.href = 'funcionarioIndex.php#';
    }
    function volverMedicamentos(){
        window.location.href = 'recetasCliente.php#';
    }

    
</script>
