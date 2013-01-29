<?php

include_once(dirname(__FILE__) . '/../../ajax/sessionCheck.php');
iniciarCookie();
verificarIP();
include(dirname(__FILE__) . "/../funcionarioHeader.php");
include(dirname(__FILE__) . "/../../Capa_Controladores/medicamentoVendido.php");

$fechaActual = date("Y-m-d H:i:s");
$med = MedicamentoVendido::InsertarConParametros($_SESSION['logLugar']['idLugar'], 
                                                                $_SESSION['medicamentoID'],
                                                                $_SESSION['recetaID'], 
                                                                $_SESSION['cantidadMedicamentoVendido'], 
                                                                $fechaActual, 
                                                                $_SESSION['unidadID']);
if ($med){
 echo 'Medicamento Expendido Exitosamente.';   
}
?>
<center>
        <button id="volver" class="btn btn-primary" onClick="volver()" type="submit"><strong>Volver</strong></button>
    </center>

<script>
    
    function volver(){
        window.location.href = 'funcionarioIndex.php#';
    }
    
    function seleccionar(idMedicamento, idReceta, unidad){
        var idMed = idMedicamento;
        var idRec = idReceta;
        var uni = unidad;
        $.ajax({ url: '../../ajax/guardarDatosMedicamento.php',
            data: {'idMedicamento': idMed,'idReceta': idRec,'unidad': uni },
            type: 'post',
            success: function(output) {
                if(output == 1){// redireccion a atencionPaciente
                    window.location.href = 'expenderMedicamento.php#';
                    
                }                
                else{    
                                    
                }
            }
        });
    }
</script>
