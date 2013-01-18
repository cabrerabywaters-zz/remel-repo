<?php

include_once(dirname(__FILE__) . '/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__) . '/../Capa_Datos/interfazRelacion.php');

class ComposicionMedicamento {

    static $nombreTabla = "Composicion_Medicamento";
    static $nombreIdTabla = "Medicamentos_idMedicamento";
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
    public static function BuscarPrincipiosActivosPorMedicamentoId($idMedicamento){
        $queryStringPrincipiosActivos = 'SELECT Principio_Activo_idPrincipio_Activo
                                         FROM Composicion_Medicamento
                                         WHERE Medicamentos_idMedicamento = '.$idMedicamento.'
                                         ';
        $resultado = CallQuery($queryString);
        return $resultado;
    }
}

?>