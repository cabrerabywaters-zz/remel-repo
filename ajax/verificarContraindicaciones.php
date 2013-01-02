<?php

include '../Capa_Datos/callQuery.php';

session_start();

$idPaciente = $_SESSION['idPaciente'];
$idMedicamento;

//query de alergias del paciente
$queryStringAlergias = 'SELECT Alergia_has_Paciente.Alergia_idAlergia as ID FROM Paciente, Alergia_has_Paciente 
                        WHERE '.$idPaciente.' = Alergias_has_Paciente.idPaciente
                        AND '.$idPaciente.' = Pacientes.idPaciente
                            
                        INTERSECT
                        
                        SELECT Alergia_has_Paciente.Alergias_idAlergia as ID FROM Medicamentos, Contraindicaciones_Alergias
                        WHERE '.$idMedicamento.' = Contraindicaciones_Alergias.Medicamentos_idMedicamento
                        AND '.$idMedicamento.' = Medicamentos.idMedicamento';


//query de condiciones del paciente
$queryStringCondiciones = 'SELECT Paciente_has_Condiciones.Condiciones_idCondiciones as ID FROM Paciente, Paciente_has_Condiciones
                           WHERE '.$idPaciente.' = Paciente_has_Condiciones.Paciente_idPaciente
                           AND '.$idPaciente.' = Pacientes.idPaciente
                           
                           INTERSECT
                           
                           SELECT Paciente_has_Condiciones.Condiciones_idCondiciones as ID FROM Medicamentos, Contraindicaciones_Condiciones
                           WHERE '.$idMedicamento.' = Contraindicaciones_Condiciones.Condiciones_idCondiciones
                           AND '.$idMedicamento.' = Medicamentos.idMedicamento';

$queryStringMedicamentos = 'SELECT Medicamentos.idMedicamento FROM Medicamentos, Contraindicaciones_Medicamentos 
                            WHERE ('.$idMedicamento.' = Contraindicaciones_Medicamentos.Medicamentos_idMedicamento
                            OR '.$idMedicamento.' = Contraindicaciones_Medicamentos.Medicamentos_idMedicamento1)
                            AND '.$idMedicamento.' = Medicamentos.idMedicamento';

$busquedaAlergias = CallQuery($queryStringAlergias);
$busquedaCondiciones = CallQuery($queryStringCondiciones);
$busquedaMedicamentos = CallQuery($queryStringMedicamentos);

//primer if, verifica si alguno de los resultados es positivo, de ser así, continua:
if ($busquedaAlergias || $busquedaCondiciones || $busquedaMedicamentos){
    //primer if de resultado: alergias
    if($busquedaAlergias){
        $resultadoAlegias = array();
        foreach ($resultAlergias as $assoc -> $value){
            $resultadoAlergias[$value] = 'SELECT Descripcion FROM Alergias 
                                          WHERE idAlergia = '.$value.'';     
        }
    }
    //segundo if de resultado: condiciones
    if($busquedaCondiciones){
        $resultadoCondiciones = array();
        foreach ($resultAlergias as $assoc -> $value){
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
}

//falta hacer la magia de mostrar las alergias de manera bonita
//y obtener las cantidades de las contraindicaciones en los medicamentos
?>
