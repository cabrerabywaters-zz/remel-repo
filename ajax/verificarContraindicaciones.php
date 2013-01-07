<?php

include '../Capa_Datos/llamarQuery.php';

session_start();

$idPaciente = $_SESSION['idPacienteLog'][0];
$idMedicamento = 1;
//obtener idMedicamento de algun lado

//query de alergias del paciente
$queryStringAlergiasPaciente = 'SELECT Alergia_has_Paciente.Alergia_idAlergia as ID FROM Pacientes, Alergia_has_Paciente 
                                WHERE '."$idPaciente".' = Alergia_has_Paciente.Paciente_idPaciente
                                AND '."$idPaciente".' = Pacientes.idPaciente';
//query de contraindicaciones a alergias del medicamento
$queryStringAlergiasMedicamento = 'SELECT Contraindicaciones_Alergias.Alergias_idAlergia as ID FROM Medicamentos, Contraindicaciones_Alergias
                                   WHERE '.$idMedicamento.' = Contraindicaciones_Alergias.Medicamentos_idMedicamento
                                   AND '.$idMedicamento.' = Medicamentos.idMedicamento';

//query de condiciones del paciente
$queryStringCondicionesPaciente = 'SELECT Paciente_has_Condiciones.Condiciones_idCondiciones as ID FROM Pacientes, Paciente_has_Condiciones
                                   WHERE '.$idPaciente.' = Paciente_has_Condiciones.Paciente_idPaciente
                                   AND '.$idPaciente.' = Pacientes.idPaciente';
//query de contraindicaciones a condiciones del medicamento                                                      
$queryStringCondicionesMedicamento = 'SELECT Contraindicaciones_Condiciones.Condiciones_idCondiciones as ID FROM Medicamentos, Contraindicaciones_Condiciones
                                      WHERE '.$idMedicamento.' = Contraindicaciones_Condiciones.Medicamentos_idmedicamento
                                      AND '.$idMedicamento.' = Medicamentos.idMedicamento';

//query de contraindicaciones a otros medicamentos
$queryStringMedicamentos = 'SELECT Medicamentos.idMedicamento FROM Medicamentos, Contraindicaciones_Medicamentos 
                            WHERE ('.$idMedicamento.' = Contraindicaciones_Medicamentos.Medicamentos_idMedicamento
                            OR '.$idMedicamento.' = Contraindicaciones_Medicamentos.Medicamentos_idMedicamento1)
                            AND '.$idMedicamento.' = Medicamentos.idMedicamento';

$busquedaAlergiasPaciente = CallQuery($queryStringAlergiasPaciente);
$busquedaAlergiasMedicamento = CallQuery($queryStringAlergiasMedicamento);

$busquedaCondicionesPaciente = CallQuery($queryStringCondicionesPaciente);
$busquedaCondicionesMedicamento = CallQuery($queryStringCondicionesMedicamento);

$busquedaMedicamentos = CallQuery($queryStringMedicamentos);

$idAlergias = array();
while($row = $busquedaAlergiasMedicamento->fetch_array()){
//echo $row['ID'];
    while($fila = $busquedaAlergiasPaciente->fetch_array()){
        if ($row['ID'] == $fila ['ID']){
            $idAlergias[] = $row['ID'];
            break;
        }
    }
}

$idCondiciones = array();
while($row = $busquedaCondicionesMedicamento->fetch_array()){
    while($fila = $busquedaCondicionesPaciente->fetch_array()){
        if ($row['ID'] == $fila ['ID']){
            $idCondiciones[] = $row['ID'];
            break;
        }
    }
}

if ($queryStringAlergiasMedicamento != false && $queryStringAlergiasPaciente != false){

}

//primer if, verifica si alguno de los resultados es positivo, de ser así, continua:
if ($busquedaAlergias || $busquedaCondiciones || $busquedaMedicamentos){
    //primer if de resultado: alergias
    if($busquedaAlergias){
        $resultadoAlergias = array();
        foreach ($resultadoAlergias as $assoc -> $value){
            $resultadoAlergias[$value] = 'SELECT Descripcion FROM Alergias 
                                          WHERE idAlergia = '.$value.'';     
        }
    }
    //segundo if de resultado: condiciones
    if($busquedaCondiciones){
        $resultadoCondiciones = array();
        foreach ($resultadoCondiciones as $assoc -> $value){
            $resultadoCondiciones[$value] = 'SELECT Nombre FROM Condiciones 
                                             WHERE idCondiciones = '.$value.'';     
        }
    }
    //tercer if de resultado: medicamentos
    if($busquedaMedicamentos){
        $resultadoMedicamentos = array();
        foreach ($resultadoMedicamentos as $assoc -> $value){
            $resultadoMedicamentos[$value] = 'SELECT Nombre_Comercial FROM Medicamentos 
                                              WHERE idMedicamento = '.$value.'';
        }
    }
    //echo 'poto';
    //con los arreglos anteriores se tienen todas las contraindicaciones que presenta el medicamento
    //a continuación la alerta de componentes
    //IMPORTANTE: no existe relación alguna entre los componentes y las contraindicaciones, por lo que no se puede mostrar.
    //Atento a futuros cambios
}

//falta hacer la magia de mostrar las alergias de manera bonita
//y obtener las cantidades de las contraindicaciones en los medicamentos
?>
