<?php

include '../Capa_Datos/llamarQuery.php';

session_start();

//$idPaciente = $_SESSION['idPaciente'];
$idPaciente = 5;
$idMedicamento = 1;
//obtener idMedicamento de algun lado

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

//diagnosticos queda para despues por complejidad
//$queryStringDiagnosticos = 'SELECT '

$busquedaAlergias = CallQuery($queryStringAlergias);
$busquedaCondiciones = CallQuery($queryStringCondiciones);
$busquedaMedicamentos = CallQuery($queryStringMedicamentos);

var_dump($busquedaAlergias);
var_dump($busquedaCondiciones);
echo '<br>';

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
    var_dump($resultadoAlergias);
    var_dump($resultadoCondiciones);
    var_dump($resultadoMedicamentos);
    //echo 'poto';
    //con los arreglos anteriores se tienen todas las contraindicaciones que presenta el medicamento
    //a continuación la alerta de componentes
    //IMPORTANTE: no existe relación alguna entre los componentes y las contraindicaciones, por lo que no se puede mostrar.
    //Atento a futuros cambios
}

//falta hacer la magia de mostrar las alergias de manera bonita
//y obtener las cantidades de las contraindicaciones en los medicamentos
?>
