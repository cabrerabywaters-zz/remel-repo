<?php

/**
 * 
 * FUNCIONES DE RETIRADA/ACTUALIZACION/BORRADO/CREACION
 * 
 * @ author José-Fco. González
 * créditos a Germán Oviedo por funciones originales de interfazDatos.php
 * * */
include_once(dirname(__FILE__).'/llamarQuery.php');

function QueryStringSeleccionarRelacion($where, $atributosASeleccionar, $nombreTabla) {
    $selectString = "SELECT";
    foreach ($atributosASeleccionar as $nombreAtributo) {
        $selectString = $selectString . " " . $nombreAtributo;
    }
    $selectString = $selectString . " FROM $nombreTabla $where";
    return $selectString;
}

function QueryStringCrearRelacion($id, $datos, $nombreTabla) {
    $insertString = "INSERT INTO $nombreTabla";

    $atributos = "(";
    $valores = "(";

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

function QueryStringBorrarPorIdRelacion($nombreTabla, $nombreId, $id) {
    $deleteString = "DELETE FROM $nombreTabla ";
    for ($i = 0; $i < count($nombreId); $i++) {
        if ($i == 0) {
            $deleteString = $deleteString . "WHERE ";
        } 
	else {
            $deleteString = $deleteString . "AND ";
        }
        $idLeft = $nombreId[$i];
        $idRight = $id[$i];
        $deleteString = $deleteString . "$idLeft=$idRight ";
    }
    return $deleteString;
}

function QueryStringActualizarRelacion($where, $id, $datos, $nombreTabla) {
    $updateString = "UPDATE $nombreTabla SET ";
    foreach ($datos as $identificador => $valor) {
        $updateString = $updateString . $identificador . "='" . $valor . "' ";
    }
    $where = "WHERE ";
    $condicionId = array();
    foreach ($id as $identificador => $valor) {
        $condicionId[] = $identificador . "='" . $valor . "' ";
    }
    for($i=0;$i<count($condicionId);$i++){
        $where = $where . $condicionId[$i];
        if ($i + 1 != count($condicionId)){
            $where = $where . " AND ";
        }
    }
    $updateString = $updateString . $where;
    return $updateString;
}

function CallQueryRelacion($queryString) {
    $con = new ConexionDB();
    $con->ConexionDB();

    $query = mysql_query($queryString);
    if ($query) {
        echo "procedimiento realizado con exito";
    } else {
        die('Error: ' . mysql_error());
    }

    $con->desconectar();
    return $query;
}

?>
