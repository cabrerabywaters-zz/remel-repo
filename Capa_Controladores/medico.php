<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');

class Medico {

    static $nombreTabla = "Medicos";
    static $nombreIdTabla = "idMedico";    
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$datosCreacion = array(
                                array('Medicocol',$_POST['medico_col']),
                                array('Direccion_Consulta',$_POST['id_consulta']),
                                array('Correo_Medico',$_POST['correo_medico']),
                                array('Codigo_Registro_SS',$_POST['codigo_registro_ss']),
                                array('Codigo_Registro_CM',$_POST['codigo_registro_cm']),
                                array('Fecha_Inscripcion',$_POST['fecha_inscripcion']),
                                array('Medicocol1',$_POST['medico_col_1']),
                                array('Fecha_ultima_edicion',$_POST['fecha_ultima_edicion'])
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
										'Medicocol',
                                        'Direccion_Consulta',
                                        'Correo_Medico',
                                        'Codigo_Registro_SS',
                                        'Codigo_Registro_CM',
                                        'Fecha_Inscripcion_REMEL',
                                        'Medicocol1',
                                        'Fecha_ultima_edicion'
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
	    return $resultArray[0];
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
                                array('Medicocol',$_POST['medico_col']),
                                array('Direccion_Consulta',$_POST['id_consulta']),
                                array('Correo_Medico',$_POST['correo_medico']),
                                array('Medicocol1',$_POST['medico_col_1']),
                                array('Fecha_ultima_edicion',"NOW()")
				);

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    public static function EncontrarMedico($rut) {
        $queryString = "SELECT idMedico FROM Medicos WHERE Personas_RUN = '$rut';";
        $res = CallQuery($queryString);
        if($res->num_rows == 1){
                return $res->fetch_row();
        }
        else return false;
    }
}

?>
