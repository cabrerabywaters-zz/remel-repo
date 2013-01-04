<?php

include_once(dirname(__FILE__) . '/../Capa_Datos/generadorStringQuery.php');

class Diagnostico {

    static $nombreTabla = "Diagnosticos";
    static $nombreIdTabla = "idDiagnostico";

    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
        $datosCreacion = array(
            array('Nombre', $_POST['nombre_diagnostico']),
            array('Codigo_Snom', $_POST['codigo_snom']),
            array('Tipo_Diagnostico', $_POST['idTipo']),
            array('Es_Ges', $_POST['es_ges']),
            array('Codigo_Cie', $_POST['codigo_cie']),
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
            'Codigo_Snom',
            'Tipo_Diganostico',
            'Es_Ges',
            'Codigo_Cie'
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
            array('Nombre', $_POST['nombre_diagnostico']),
            array('Codigo_Snom', $_POST['codigo_snom']),
            array('Tipo_Diagnostico', $_POST['idTipo']),
            array('Es_Ges', $_POST['es_ges']),
            array('Codigo_Cie', $_POST['codigo_cie']),
        );

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    public static function BuscarDiagnosticoLike($nombre) {
       
        $queryString = 'SELECT Nombre

                        FROM Diagnosticos

                        WHERE Nombre LIKE %'.$nombre.'%

                        ORDER BY Nombre

                        LIMIT 5';
        $query = CallQuery($queryString);
        return $query;
    }

}

?>