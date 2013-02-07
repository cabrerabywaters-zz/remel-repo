<?php

/*
 * Tabla de recetas del cliente con botones para expender los medicamentos. Muestra la disponibilidad de los
 * medicamentos en las recetas. Muestra 1 o más medicamentos por receta
 * 
 * Input: id del Paciente, fecha actual
 * 
 * Output: Nombre del medico, fecha de emision, numero de folio y medicamentos y su disponibilidad de cada receta
 *         hecha al paciente.
 *         Al seleccionar un medicamento, se entrega su id de medicamento, receta y unidad
 * 
 * 
 */


include_once(dirname(__FILE__) . '/../../ajax/sessionCheck.php');
iniciarCookie();
verificarIP();
include(dirname(__FILE__) . "/../funcionarioHeader.php");
include(dirname(__FILE__) . "/../../Capa_Controladores/paciente.php");
include(dirname(__FILE__) . "/../../Capa_Controladores/medicamento.php");
//buscar Recetas del cliente
?>
<div class="row-fluid">
    <div class="tab-content"><!-- contenido del panel 1-->
        <div class="tab-pane active img-rounded" id="tabVenderMedicamentos"><!-- tab Historial-->

            <div class="accordion-heading">
                <a class="btn btn-large btn-block in" disabled="disabled" data-toggle="collapse" data-parent="#accordion1" >
                    Recetas del Cliente
                </a>
            </div>
            <div><center>
                    <button id="volver" class="btn btn-primary" onClick="volver()" type="submit"><strong>Volver</strong></button>
                </center></div><hr>
            <div class="accordion-body">
                <div class="accordion-inner">
                    <?php
                    //$fechaActual = date('y-m-d');
                    $fechaActual = date("Y-m-d H:i:s");
                    $recetasPaciente = Paciente::R_RecetasPacienteVigentes($_SESSION['idPaciente'], $fechaActual);
                    echo'
  <div class="row">

  <center> <div style="width: 50%; ;">
  <table>
                <tr><td>
   <table class="table table-striped">
	<thead>
    <tr>
    <th>Medico</td>
    <th>Fecha de Emision</td>
    <th>Folio</td>
    <th>Medicamentos</td>
    </tr></thead>
    ';
                    $folios = array();
                    foreach ($recetasPaciente as $datos => $dato) {
                        echo "<tr>";
                        $folios[] = $dato['Folio'];
                        $contadorRepeticiones = 0;
                        for ($cantidadFolios = 0; $cantidadFolios < count($folios); $cantidadFolios++) {
                            if ($folios[$cantidadFolios] == $dato['Folio'])
                                $contadorRepeticiones++;
                        }
                        if ($contadorRepeticiones == 1) {


                            foreach ($dato as $llave => $valor) {
                                if ($llave == 'Folio') {
                                    echo '<td>';
                                    echo $valor;
                                    echo '</td><td>';
                                    $medicamentosReceta = Paciente::R_MedicamentosReceta($valor);
                                    for ($i = 0; $i < count($medicamentosReceta); $i++) {
                                        //echo $medicamentosReceta[$i]['Nombre_Comercial'] . '</br>';
                                        if ($medicamentosReceta[$i]['tipo'] == 0) {
                                            echo '<button class="btn btn-block " onClick="seleccionar(' . $medicamentosReceta[$i]['idMedicamento'] . ', ' . $medicamentosReceta[$i]['idReceta'] . ', ' . $medicamentosReceta[$i]['unidad'] . ')" type="submit"><strong>' . $medicamentosReceta[$i]['Nombre_Comercial'] . '</strong></button></br>';
                                        }
                                        else{
                                            //datosMedicamento indica la frecuencia, el periodo y la cantidad consumida de cada medicamento
                                            $datosMedicamento = Medicamento::R_CantidadDisponibleMedicamento($medicamentosReceta[$i]['idMedicamento']);
                                            //ventaMedicamento indica cuantas veces se ha vendido el medicamento
                                            $ventaMedicamento = Medicamento::R_NumeroVentaMedicamento($medicamentosReceta[$i]['idMedicamento'], $medicamentosReceta[$i]['idReceta']);
                                            //ambas variables calculan la disponibilidad del medicamento redondeado hacia arriba
                                            $cantidadDisponible = (($datosMedicamento['cantidad'] * 24/$datosMedicamento['frecuencia'] * $datosMedicamento['periodo'])/$datosMedicamento['cantidadPresentacion']) - $ventaMedicamento['cantidadVendida'];
                                            $cantidadDisponible = ceil($cantidadDisponible);
                                            if ($cantidadDisponible != 0){
                                                echo '<button class="btn btn-block " onClick="seleccionar(' . $medicamentosReceta[$i]['idMedicamento'] . ', ' . $medicamentosReceta[$i]['idReceta'] . ', ' . $medicamentosReceta[$i]['unidad'] . ')" type="submit"><strong>' . $medicamentosReceta[$i]['Nombre_Comercial'] .' - '. $cantidadDisponible . ' Disponibles</strong></button></br>';                                            
                                            }
                                            else {
                                                echo '<button class="btn btn-block " disabled="disabled" onClick="seleccionar(' . $medicamentosReceta[$i]['idMedicamento'] . ', ' . $medicamentosReceta[$i]['idReceta'] . ', ' . $medicamentosReceta[$i]['unidad'] . ')" type="submit"><strong>' . $medicamentosReceta[$i]['Nombre_Comercial'] .'</br> Sin expensiones disponibles</strong></button></br>';                                            
                                            }
                                        }
                                    }
                                }
                                if ($llave == 'Nombre') {
                                    echo '<td>';
                                    echo $valor . ' ';
                                }
                                if ($llave == 'Apellido_Paterno') {
                                    echo $valor;
                                    echo '</td>';
                                }
                                if ($llave == 'Fecha_Emision') {
                                    echo '<td>';
                                    echo $valor;
                                    echo '</td>';
                                }
                            }

                            echo "</tr>";
                        }
                    }
                    echo '</table></div></table></center></div>';
                    ?>
                </div>
            </div></div>

        <div class="tab-pane img-rounded" id="tabVerArsenal"><!-- tab Historial-->

            <!-- <div class="accordion" id="accordionF2"><!-- accordion historial -->
            <!-- <div class="accordion-group"><!-- informacion personal del paciente-->
            <?php
            // muestra los detalles de paciente
            include("verArsenal.php");
            ?>
        </div><!-- informacion personal del paciente-->
        <!--   </div>
       </div>-->
    </div>

</div>
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