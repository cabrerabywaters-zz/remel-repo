<?php




include_once(dirname(__FILE__)."/../Capa_Controladores/receta.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/historialMedico.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/medicamentoReceta.php");

error_reporting('E_ALL');

session_start();

$_POST['resumenPoder'] ;
/*
if(array_key_exists('resumenPoder', $_POST)){
    $diagnosticos = $_POST['resumenPoder'];
}
else $diagnosticos = null;

if(array_key_exists('sinDiagnostico', $_POST)){
    $sinDiagnostico = $_POST['sinDiagnostico'];
}
else $sinDiagnostico = null;


/*
$idLugar = $_SESSION['logLugar']['idLugar'];
$idConsulta = $_SESSION['idConsulta'];
$idMedico = $_SESSION['idMedicoLog'][0];
$idPaciente = $_SESSION['idPaciente'];
$ip = $_SESSION['last_ip'];


$unidadConsumo = $_POST['unidadDeConsumo'];
$unidadFrecuencia = $_POST['unidadFrecuencia'];
$unidadDePeriodo = $_POST['unidadPeriodo'];


$idReceta = Receta::Insertar($idLugar, $ip, $idConsulta);

if($idReceta == false){ $check = -1; die("No se insertó la receta correctamente"); }

if($diagnosticos != null){
    foreach($diagnosticos as $diagnostico) {
            $idDiagnostico = $diagnostico['idDiagnostico'];
            $check = HistorialMedico::Insertar($idConsulta,$idDiagnostico,$diagnostico['tipoDiagnostico'],$diagnostico['comentarioDiagnostico']);
            if($check == false){ echo -1; die("No se insertó el historial médico"); }

            foreach($diagnostico['medicamentos'] as $medicamento) {
                    $check = MedicamentoReceta::Insertar($idReceta, $idDiagnostico, $medicamento['idMedicamento'], $medicamento['cantidadMedicamento'], $unidadConsumo, $medicamento['frecuenciaMedicamento'], $unidadFrecuencia, $medicamento['periodoMedicamento'], $unidadDePeriodo, $medicamento['fechaInicio'],$medicamento['fechaFin'], $medicamento['comentarioMedicamento']); 
                    if( $check != 1){ echo -1; die("No se insertó el medicamento"); }
            }
    }
}
if($sinDiagnostico != null){
    foreach($sinDiagnostico as $medicamento) {
        
        
            $check = MedicamentoReceta::Insertar($idReceta, '0', $medicamento['idMedicamento'], $medicamento['cantidadMedicamento'], $unidadConsumo, $medicamento['frecuenciaMedicamento'], $unidadFrecuencia, $medicamento['periodoMedicamento'], $unidadDePeriodo, $medicamento['fechaInicio'], $medicamento['fechaFin'], $medicamento['comentarioMedicamento']);
            if( $check != 1){ echo -1; die("No se puede insertar este medicamento SD"); }
    }
}
echo $idReceta;
*/
?>
