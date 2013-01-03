<?php 

include('../Capa_Datos/generadorStringQuery.php');

class Condicion {

    static $nombreTabla = "Personas";
    static $nombreIdTabla = "RUN";    
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$datosCreacion = array(
                                array('Nombre',$_POST['nombre']),
                                array('Apellido_Paterno',$_POST['apellido_paterno']),
                                array('Apellido_Materno',$_POST['apellido_materno']),
                                array('Direccion_idDireccion',$_POST['idDireccion']),
                                array('Fecha_Nac',$_POST['fecha_nac']),
                                array('Prevision_rut',$_POST['rut']),
                                array('Sexo',$_POST['sexo']),
                                array('Clave',$_POST['clave']),
                                array('Codigo_Seguridad',$_POST['codigo_seguridad']),
                                array('Email',$_POST['email']),
                                array('N_celular',$_POST['n_celular']),
                                array('Fecha_creacion_REMEL',$_POST['fecha_creacion_remel'])
						);

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    private static function BorrarPorId() {
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
    private static function Seleccionar($where, $limit = 0, $offset = 0) {
    	$atributosASeleccionar = array(
									'Nombre',
                                                                        'Apellido_Paterno',
                                                                        'Apellido_Materno',
                                                                        'Direccion_idDireccion',
                                                                        'Fecha_Nac',
                                                                        'Prevision_rut',
                                                                        'Sexo',
                                                                        'Clave',
                                                                        'Codigo_Seguridad',
                                                                        'Email',
                                                                        'N_Celular',
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
    private function Actualizar() {
    	$id = $_POST['id_condiciones'];
    	$datosActualizacion = array(
                                array('Direccion_idDireccion',$_POST['idDireccion']),
                                array('Clave',$_POST['clave']),
                                array('Email',$_POST['email']),
                                array('N_celular',$_POST['n_celular'])
				);

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

}

?>
