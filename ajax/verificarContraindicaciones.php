<?php

include '../Capa_Datos/llamarQuery.php';
include_once(dirname(__FILE__).'/../Capa_Controladores/alergiaHasPaciente.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/R_contraindicacionAlergia.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/pacienteHasCondicion.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/R_contraindicacionCondiciones.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/paciente.php');


session_start();

$idPaciente = $_SESSION['idPacienteLog'][0];
$idMedicamento = 1;
//obtener idMedicamento de algun lado
//query de medicamentos vigentes del paciente
$fechaActual = date('d-m-y');
$MedicamentosVigentes = Paciente::R_MedicamentosVigentesPaciente($idPaciente, $fechaActual);
if ($MedicamentosVigentes != false) {
    $queryStringPrincipiosActivos = array();
    $principiosActivos = array();
    foreach ($MedicamentosVigentes as $llave => $valor) {
    //query de principios activos de los medicamentos vigentes del usuario
        $queryStringPrincipiosActivos[] = 'SELECT Principio_Activo_idPrincipio_Activo
                                           FROM Composicion_Medicamento
                                           WHERE Medicamentos_idMedicamento = '.$valor.'
                                         ';
        $principiosActivos[] = CallQuery($queryStringPrincipiosActivos);
    }
}
$paresContraindicadores = array();
for($i=0;$i<count($principiosActivos);$i++){
    for($j=$i+1;$j<count($principiosActivos);$j++){
        $queryStringVerificarContraindicacionPrincipioActivo = 
        'SELECT Principio_Activo_has_Principio_Activo, Principio_Activo_has_Principio_Activo1
         FROM Contraindicaciones_Principios_Activos
         WHERE ('.$principiosActivos[$i].' = Principio_Activo_has_Principio_Activo
            AND '.$principiosActivos[$j].' = Principio_Activo_has_Principio_Activo1)
         OR    ('.$principiosActivos[$i].' = Principio_Activo_has_Principio_Activo1
            AND '.$principiosActivos[$j].' = Principio_Activo_has_Principio_Activo)
         ';
        $resultado = CallQuery($queryStringVerificarContraindicacionPrincipioActivo);
        if ($resultado){
            $paresContraindicadores[] = array($principiosActivos[$i], $principiosActivos[$j]);
        }
    }
}

$busquedaAlergiasPaciente = AlergiaHasPaciente::BuscarAlergiasPorPacienteId($idPaciente);
$busquedaAlergiasMedicamento = ContraindicacionAlergia::BuscarAlergiasPorMedicamentoId($idMedicamento);

$busquedaCondicionesPaciente = PacienteHasCondicion::BuscarCondicionesPorPacienteId($idPaciente);
$busquedaCondicionesMedicamento = ContraindicacionCondicion::BuscarCondicionesPorMedicamentoId($idMedicamento);

$busquedaMedicamentos = CallQuery($queryStringMedicamentos);

$idAlergias = array();
while ($row = $busquedaAlergiasMedicamento->fetch_array()) {
//echo $row['ID'];
    while ($fila = $busquedaAlergiasPaciente->fetch_array()) {
        if ($row['ID'] == $fila ['ID']) {
            $idAlergias[] = $row['ID'];
            break;
        }
    }
}

$idCondiciones = array();
while ($row = $busquedaCondicionesMedicamento->fetch_array()) {
    while ($fila = $busquedaCondicionesPaciente->fetch_array()) {
        if ($row['ID'] == $fila ['ID']) {
            $idCondiciones[] = $row['ID'];
            break;
        }
    }
}
$idMedicamentos = array();
while ($row = $busquedaMedicamentos->fetch_array()) {
    $idMedicamentos[] = $row['ID'];
}

//guarda el nombre de las alergias
$nombreAlergias = array();
for ($i = 0; $i < count($idAlergias); $i++) {
    $queryString = 'SELECT Nombre as Text FROM Alergias WHERE idAlergia = ' . $idAlergias[$i] . ';';
    $result = CallQuery($queryString);
    $fila = $result->fetch_array();
    $nombreAlergias[] = $fila['Text'];
}

$nombreCondiciones = array();
for ($i = 0; $i < count($idCondiciones); $i++) {
    $queryString = 'SELECT Nombre as Text FROM Condiciones WHERE idCondiciones = ' . $idCondiciones[$i] . ';';
    $result = CallQuery($queryString);
    $fila = $result->fetch_array();
    $nombreCondiciones[] = $fila['Text'];
}

$nombreMedicamentos = array();
for ($i = 0; $i < count($idMedicamentos); $i++) {
    $queryString = 'SELECT Nombre_Comercial as Nombre FROM Medicamentos WHERE idMedicamento = ' . $idMedicamentos[$i] . ';';
    $result = CallQuery($queryString);
    $fila = $result->fetch_array();
    $nombreMedicamentos[] = $fila['Nombre'];
}
//primer if, verifica si alguno de los resultados es positivo, de ser así, continua:
//falta hacer la magia de mostrar las alergias de manera bonita
//y obtener las cantidades de las contraindicaciones en los medicamentos
?>
