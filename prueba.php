<?php
include_once(dirname(__FILE__).'/Capa_Datos/llamarQuery.php');

function CrearRelacion($id, $datos, $nombreTabla) {
    $insertString = "INSERT INTO $nombreTabla";

    $atributos = "(";
    $valores = "(";
    print_r($id);
    if ($datos == null) {
        for ($i = 0; $i < count($id); $i++) {
            $atributos = $atributos . $id[$i][0];
            $valores = $valores . "'" . $id[$i][1] . "'";
            if ($i != count($id) - 1) {
                $atributos = $atributos . ",";
                $valores = $valores . ",";
            }
        }
    } else {
        $totalAtributos = count($id) + count($datos);
        for ($i = 0; $i < count($id); $i++) {
            $atributos = $atributos . $id[$i][0];
            $valores = $valores . "'" . $id[$i][1] . "'";
            $atributos = $atributos . ",";
            $valores = $valores . ",";
        }
        for ($i = 0; $i < count($datos); $i++) {
            $atributos = $atributos . $datos[$i][0];
            $valores = $valores . "'" . $datos[$i][1] . "'";

            if ($i != count($datos) - 1) {
                $atributos = $atributos . ",";
                $valores = $valores . ",";
            }
        }
    }
    $atributos = $atributos . ")";
    $valores = $valores . ")";

    $insertString = "$insertString $atributos VALUES $valores";
    return $insertString;
}

$id1 = 5;
$id2 = 10;
$id[0][0] = 'Paciente_idPaciente';
$id[0][1] = 5;
$id[1][0] = 'Condiciones_idCondiciones';
$id[1][1] = 21;
$queryString = CrearRelacion($id, NULL, 'Paciente_has_Condiciones');
$query = CallQuery($queryString);
?>