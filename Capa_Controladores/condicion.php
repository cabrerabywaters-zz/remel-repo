<?php

include_once(dirname(__FILE__) . '/../Capa_Datos/generadorStringQuery.php');

class Condicion {
    /**
     * Nombre de la tabla
     * @static  
     * @var string
     */
    static $nombreTabla = "Condiciones";
    /**
     * Nombre del id de tabla
     * @static  
     * @var string
     */
    static $nombreIdTabla = "idCondiciones";

    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
        $datosCreacion = array(
            array('Nombre', $_POST['nombre_condicion'])
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
            'idCondiciones'
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
            array('Nombre', $_POST['nombre_condicion'])
        );
        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    //busca condiciones segun su nombre y el id del paciente
    //devuelve el id y el nombre
    public static function BuscarCondicionLike($Nombre, $id) {

        $queryString = 'SELECT Nombre,idCondiciones
									 
									FROM Condiciones

									WHERE Nombre LIKE "%' . $Nombre . '%"
									
									AND idCondiciones NOT IN (SELECT Condiciones.idCondiciones

                     				FROM Condiciones, Paciente_has_Condiciones, Pacientes

                       				WHERE Pacientes.idPaciente= ' . $id . '
									 
									AND Pacientes.idPaciente=Paciente_has_Condiciones.Paciente_idPaciente
									 
									AND Paciente_has_Condiciones.Condiciones_idCondiciones=Condiciones.idCondiciones)

                       				ORDER BY  Condiciones.Nombre ASC 
									
									LIMIT 5';

        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }
    //busca condiciones por su id
    //devuelve el nombre
    /*
     * Busca el nombre de la condicion segun su id
     * @static
     * @access public
     * @param int $idCondicion ID de la condicion
     * @return array asociativo
     */
    public static function BuscarNombreCondicionPorId($idCondicion) {
        $queryString = 'SELECT Nombre as Text FROM Condiciones WHERE idCondiciones = ' . $idCondicion . ';';
        $result = CallQuery($queryString);
        return $result;
    }

}

?>
