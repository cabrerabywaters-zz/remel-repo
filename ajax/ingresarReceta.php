<?php




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





$idReceta = Receta::Insertar($idLugar, $ip, $idConsulta);

$Receta= Receta::SeleccionarPorLugarIpConsulta($idLugar , $ip, $idConsulta);


if($idReceta == false){ $check = 0; die("No se insertó la receta correctamente"); }

if($diagnosticos != null){
    foreach($diagnosticos as $diagnostico) {
            $idDiagnostico = $diagnostico['idDiagnostico'];
            $check = HistorialMedico::Insertar($idConsulta,$idDiagnostico,$diagnostico['tipoDiagnostico'],$diagnostico['comentarioDiagnostico']);
            if($check == false){ echo '0'; die("No se insertó el historial médico"); }

            foreach($diagnostico['medicamentos'] as $medicamento) {
                                $check = MedicamentoReceta::Insertar(end(end($Receta)),$idDiagnostico, $medicamento['idMedicamento'], $medicamento['cantidadMedicamento'], $medicamento['unidadDeConsumo'], $medicamento['frecuenciaMedicamento'],$medicamento['unidadFrecuencia'], $medicamento['periodoMedicamento'], $medicamento['unidadPeriodo'], $medicamento['fechaInicio'], $medicamento['fechaFin'], $medicamento['comentarioMedicamento']);
            if( $check=0 ){ echo'0'; die("No se puede insertar este medicamento SD".end(end($Receta))); }
            }
    }
}
if($sinDiagnostico != null){
    foreach($sinDiagnostico as $medicamento) {
        
       
            $check = MedicamentoReceta::Insertar(end(end($Receta)),"0", $medicamento['idMedicamento'], $medicamento['cantidadMedicamento'], $medicamento['unidadDeConsumo'], $medicamento['frecuenciaMedicamento'],$medicamento['unidadFrecuencia'], $medicamento['periodoMedicamento'], $medicamento['unidadPeriodo'], $medicamento['fechaInicio'], $medicamento['fechaFin'], $medicamento['comentarioMedicamento']);
            if( $check=0 ){ echo'0'; die("No se puede insertar este medicamento SD".end(end($Receta))); }
            
    }
}

echo end(end($Receta));


?>
