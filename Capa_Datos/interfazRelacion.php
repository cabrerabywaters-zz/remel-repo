<?php

/**
 * 
 * FUNCIONES DE RETIRADA/ACTUALIZACION/BORRADO/CREACION
 * 
 * @ author José-Fco. González
 * créditos a Germán Oviedo por funciones originales de interfazDatos.php
 * * */
require_once 'Conexion.php';

function QueryStringSeleccionarRelacion($where, $atributosASeleccionar, $nombreTabla) {
    $selectString = "SELECT";
    foreach ($atributosASeleccionar as $nombreAtributo) {
        $selectString = $selectString . " " . $nombreAtributo;
    }
    $selectString = selectString . " FROM $nombreTabla $where";
    return $selectString;
}

function QueryStringCrearRelacion($id, $nombreTabla) {
    $insertString = "INSERT INTO $nombreTabla (";
    for ($i = 0; $i < count($id); $i++) {
        $insertString = $insertString . $id[$i][0];
        if ($i != count($id) - 1)
            $insertString = $insertString . ",";
    }
    $insertString = $insertString . ") VALUES (";
    for ($i = 0; $i < count($id); $i++) {
        $insertString = $insertString . $id[$i][1];
        if ($i != count($id) - 1)
            $insertString = $insertString . ",";
    }
    return $insertString . ")";
}

function QueryStringBorrarPorIdRelacion($nombreTabla, $nombreId, $id) {
    $deleteString = "DELETE FROM $nombreTabla ";
    for ($i = 0; $i < count($nombreId); $i++) {
        if ($i == 0) {
            $deleteString = $deleteString . "WHERE ";
        } else {
            $deleteString = $deleteString . "AND ";
        }
        $nombreId[$i] = $idLeft;
        $id[$i] = $idRight;
        $deleteString = $deleteString . "$idLeft=$idRight ";
    }
    return $deleteString;
}

function QueryStringActualizarRelacion($where, $id, $nombreTabla) {
    $updateString = "UPDATE $nombreTabla SET ";
    foreach ($id as $identificador => $valor) {
        $updateString = $updateString . $identificador . "='" . $valor . "' ";
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
