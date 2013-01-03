<?php 

include_once('../Capa_Datos/generadorStringQuery.php');

class PlazaInstitucion {

    static $nombreTabla = "Plazas_Instituciones";
    static $nombreIdTabla = "idPlaza";    
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$datosCreacion = array(
                                array('Nombre',$_POST['nombre_plaza_institucion']),
                                array('Telefono',$_POST['telefono']),
                                array('Direccion_idDireccion',$_POST['idDireccion']),
                                array('RUN_Administrador',$_POST['run_administrador']),
                                array('Email_Administrador',$_POST['email_administrador']),
                                array('Plaza_Institucioncol',$_POST['plaza_institucioncol']),
                                array('Instituciones_RUT',$_POST['RUT'])
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
                                        'Direccion_idDireccion',
                                        'RUN_Administrador',
                                        'Email_Administrador',
                                        'Telefono',
                                        'Tipo_Institucion_idTipo_Institucion',
                                        'Fecha_creacion_REMEL'
      );

        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, self::$nombreTabla);

	    if($limit != 0){
	       $queryString = $queryString." LIMIT $limit";
	    }
	    if($offset != 0){
		  $queryString = $queryString." OFFSET $offset ";
	    }

        $result = CallQuery($queryString);
	    $resultArray = array();
	    while($fila = $result->fetch_assoc()) {
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
                                array('Nombre',$_POST['nombre_plaza_institucion']),
                                array('Telefono',$_POST['telefono']),
                                array('Email_Administrador',$_POST['email_administrador']),
                                array('Plaza_Institucioncol',$_POST['plaza_institucioncol']),
				);

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

}

?>