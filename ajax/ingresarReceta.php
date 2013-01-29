<?php

/*

  _____________________________    _____      _____    _______   
 /  _____/\_   _____/\______   \  /     \    /  _  \   \      \  
/   \  ___ |    __)_  |       _/ /  \ /  \  /  /_\  \  /   |   \ 
\    \_\  \|        \ |    |   \/    Y    \/    |    \/    |    \
 \______  /_______  / |____|_  /\____|__  /\____|__  /\____|__  /
        \/        \/         \/         \/         \/         \/ 

*/


include_once(dirname(__FILE__)."/../Capa_Controladores/receta.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/historialMedico.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/medicamentoReceta.php");

error_reporting('E_ALL');

session_start();

if(array_key_exists('resumenPoder', $_POST)){
    $diagnosticos = $_POST['resumenPoder'];
}
else $diagnosticos = null;

if(array_key_exists('sinDiagnostico', $_POST)){
    $sinDiagnostico = $_POST['sinDiagnostico'];
}
else $sinDiagnostico = null;

$idLugar = $_SESSION['logLugar']['idLugar'];
$idConsulta = $_SESSION['idConsulta'];
$idMedico = $_SESSION['idMedicoLog'][0];
$idPaciente = $_SESSION['idPaciente'];
$ip = $_SESSION['last_ip'];
$tipoReceta = 1;

$idReceta = Receta::Insertar($idLugar, $ip, $tipoReceta, $idConsulta);

if($idReceta == false){ $check = -1; die("Muere receta"); }

if($diagnosticos != null){
    foreach($diagnosticos as $diagnostico) {
            $idDiagnostico = $diagnostico['idDiagnostico'];
            $check = HistorialMedico::Insertar($idConsulta,$idDiagnostico,$diagnostico['tipoDiagnostico'],$diagnostico['comentarioDiagnostico']);
            if($check == false){ echo -1; die("Muere Diagnostico"); }

            foreach($diagnostico['medicamentos'] as $medicamento) {
                    $check = MedicamentoReceta::Insertar($idReceta, $idDiagnostico, $medicamento['idMedicamento'], $medicamento['cantidadMedicamento'], '1', $medicamento['frecuenciaMedicamento'], '1', $medicamento['periodoMedicamento'], '1', '1', $medicamento['fechaInicio'], $medicamento['comentarioMedicamento']); 
                    if( $check != 1){ echo -1; die("Muere medicamento"); }
            }
    }
}
if($sinDiagnostico != null){
    foreach($sinDiagnostico as $medicamento) {
            $check = MedicamentoReceta::Insertar($idReceta, '0', $medicamento['idMedicamento'], $medicamento['cantidadMedicamento'], '1', $medicamento['frecuenciaMedicamento'], '1', $medicamento['periodoMedicamento'], '1', '1', $medicamento['fechaInicio'], $medicamento['comentarioMedicamento']);
            if( $check != 1){ echo -1; die("Muere medicamento SD"); }
    }
}
echo $idReceta;

?>
