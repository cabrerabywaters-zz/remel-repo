<?php

include_once(dirname(__FILE__) . '/../Capa_Datos/generadorStringQuery.php');

class PrincipioActivo {

    static $nombreTabla = "Principio_Activo";
    static $nombreIdTabla = "idPrincipio_Activo";

    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
        $datosCreacion = array(
            array('Nombre', $_POST['nombre_principio_activo']),
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
        $id = $_POST['id_principio_activo'];
        $datosActualizacion = array(
            array('Nombre', $_POST['nombre_principio_activo']),
        );

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    //busca el nombre y el id de los principios activos segun una fraccion de texto
    public static function BuscarPrincipioActivoLike($nombre) {
        $limit = 5;
        $offset = 0;
        $like = "'%$nombre%'";
        $where = "WHERE Nombre LIKE $like";
        $atributosASeleccionar = array(
            'Nombre',
            'idPrincipio_Activo'
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
    //busca el nombre de un principio activo segun su id
    public static function BuscarNombrePrincipioActivoPorId($idPrincipioActivo) {
        $queryString = 'SELECT Nombre FROM Principio_Activo WHERE idPrincipio_Activo = ' . $idPrincipioActivo . '';
        $result = CallQuery($queryString);
        return $result;
    }   
    //busca id y nombre de principios activos en el arsenal segun el una fraccion de texto y el id de sucursal
    public static function BuscarPrincipioActivoArsenalLike($nombre, $sucursal) {



        $queryString = " Select Nombre, idPrincipio_Activo from Principio_Activo where
            idPrincipio_Activo IN 
            (Select DISTINCT Principio_activo_idPrincipio_Activo from Composicion_Medicamento where
           Medicamentos_idMedicamento IN 
           (Select Medicamentos_idMedicamento from Arsenal where Expendedores_idExpendedores IN 
            (Select idExpendedores from Expendedores where Sucursales_RUT=$sucursal))) and Nombre like '%$nombre%'";



        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }

        return $resultArray;
    }

}

?>
