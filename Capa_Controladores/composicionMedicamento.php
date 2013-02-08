<?php

include_once(dirname(__FILE__) . '/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__) . '/../Capa_Datos/interfazRelacion.php');

class ComposicionMedicamento {
    /**
     * Nombre de la tabla
     * @static  
     * @var string
     */
    static $nombreTabla = "Composicion_Medicamento";
    /**
     * Nombre del id de medicamento
     * @static  
     * @var string
     */
    static $nombreIdTabla = "Medicamentos_idMedicamento";
    /**
     * Nombre del id de principio activo
     * @static  
     * @var string
     */
    static $nombreIdTabla1 = "Principio_Activo_idPrincipio_Activo";

    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
        $id = array(
            array('Medicamentos_idMedicamento', $_POST['idMedicamento']),
            array('Principio_Activo_idPrincipio_Activo', $_POST['idPrincipioActivo'])
        );
        $datosCreacion = array(
            array('Cantidad', $_POST['cantidad']),
            array('Unidades_idUnidade', $_POST['idUnidade']),
        );

        $queryString = QueryStringCrearRelacion($id, $datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId($id) {
        $queryString = QueryStringBorrarPorIdRelacion(self::$nombreTabla, self::$nombreIdTabla, $id);
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
            'Cantidad',
            'Unidades_idUnidade'
        );

        $queryString = QueryStringSeleccionarRelacion($where, $atributosASeleccionar, self::$nombreTabla);

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
        $id = array(
            array('Medicamentos_idMedicamento', $_POST['idMedicamento']),
            array('Principio_Activo_idPrincipio_Activo', $_POST['idPrincipioActivo'])
        );

        $datosActualizacion = array(
            array('Cantidad', $_POST['cantidad']),
                        array('Unidades_idUnidade', $_POST['idUnidade'])

        );

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizarRelacion($where, $id, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    //busca los principios activos de un medicamento segun su id
    //devuelve los id de principio activo
    /*
     * Busca principios activos por ID del medicamento
     * @static
     * @access public
     * @param int $idMedicamento ID del medicamento
     * @return array asociativo
     */
    public static function BuscarPrincipiosActivosPorMedicamentoId($idMedicamento){
        $queryString = 'SELECT Principio_Activo_idPrincipio_Activo
                                         FROM Composicion_Medicamento
                                         WHERE Medicamentos_idMedicamento = '.$idMedicamento.'
                                         ';
        $resultado = CallQuery($queryString);
        $result = array();
        while ($fila = $resultado->fetch_array()){
            $result[] = $fila['Principio_Activo_idPrincipio_Activo'];
        }
        return $result;
    }
}

?>
