<?php

include_once(dirname(__FILE__) . '/../Capa_Datos/generadorStringQuery.php');

class Expendedor {

    static $nombreTabla = "Expendedores";
    static $nombreIdTabla = "idExpendedores";

    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
        $datosCreacion = array(
            array('Nombre', $_POST['nombre_expendedor']),
            array('Encargado', $_POST['encargado_expendedor']),
            array('Telefono_expendedor', $_POST['telefono_expendedor']),
            array('Sucursales_RUT', $_POST['RUT'])
        );

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId() {
        $id = $_POST['id'];
        $queryString = QueryStringBorrarPorId(self::$nombreTabla, self::$nombreIdTabla, $this->_id);
        $query = CallQuery($queryString);
    }

    /**
     * Seleccionar
     * 
     * Esta funcion selecciona todas las entradas de una tabla
     * con respecto a una condicion dada. Tambien es posible
     * entregar un limite y un offset.
     * 
     * @param string $where
     * @param int $limit
     * @param int $offset
     * @returns array $resultArray
     */
    public static function Seleccionar($where, $limit = 0, $offset = 0) {
        $atributosASeleccionar = array(
            'Nombre',
            'Encargado',
            'Telefono_expendedor',
            'Sucursales_RUT'
        );
        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, self::$nombreTabla);

        if ($limit != 0) {
            $queryString = $queryString . " LIMIT $limit";
        }
        if ($offset != 0) {
            $queryString = $queryString . " OFFSET $offset ";
        }

        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }

    /**
     * Actualizar
     * 
     * Esta funcion toma una id de una entrada existente
     * y actualiza con datos nuevos, la id y los datos vienen
     * por POST desde AJAX
     */
    public static function Actualizar() {
        $id = $_POST['id_condiciones'];
        $datosActualizacion = array(
            array('Nombre', $_POST['nombre_expendedor']),
            array('Encargado', $_POST['encargado_expendedor']),
            array('Telefono_expendedor', $_POST['telefono_expendedor']),
            array('Sucursales_RUT', $_POST['RUT'])
        );

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    //busca las sucursales por su rut
    //devuelve nombre e id
    public static function SeleccionarPorRutSucursal($RUT) {
        $nombreTabla = self::$nombreTabla;
        $queryString = "SELECT Nombre, idExpendedores FROM $nombreTabla WHERE Sucursales_RUT = '$RUT'";

        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }

        return $resultArray;
    }

}

?>