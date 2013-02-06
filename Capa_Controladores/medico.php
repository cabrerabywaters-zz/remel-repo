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
                                array('Direccion_Consulta',$_POST['id_consulta']),
                                array('Correo_Medico',$_POST['correo_medico']),
                                array('Codigo_Registro_SS',$_POST['codigo_registro_ss']),
                                array('Codigo_Registro_CM',$_POST['codigo_registro_cm']),
                                array('Fecha_Inscripcion',$_POST['fecha_inscripcion']),
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
                                        'Direccion_Consulta',
                                        'Correo_Medico',
                                        'Codigo_Registro_SS',
                                        'Codigo_Registro_CM',
                                        'Fecha_Inscripcion_REMEL',
                                        'Fecha_ultima_edicion',
					'Personas_RUN'
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

    public static function SeleccionarPorId($idMedico){
	$atributosASeleccionar = array(
                                        'Correo_Medico',
                                        'Codigo_Registro_SS',
                                        'Codigo_Registro_CM',
                                        'Fecha_Inscripcion',
                                        'Fecha_ultima_edicion',
                                        'Personas_RUN' 
                                                                        );
	$where = "WHERE idMedico = '$idMedico'";
	$queryString = QueryStringSeleccionar($where, $atributosASeleccionar, self::$nombreTabla);
	$query = CallQuery($queryString);
	return $query->fetch_assoc();
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

    public static function SeleccionarNombre($idMedico) {
	$queryString = "SELECT Nombre, Apellido_Paterno, Apellido_Materno 
			FROM Medicos, Personas
			WHERE Medicos.Personas_RUN = Personas.RUN AND
				Medicos.idMedico = '$idMedico';";
	$query = CallQuery($queryString);
	$result = $query->fetch_assoc();
	return $result['Nombre']." ".$result['Apellido_Paterno']." ".$result['Apellido_Materno'];
    }

    public static function SeleccionarRUT($idMedico) {
	$queryString = "SELECT Personas_RUT FROM Medicos WHERE idMedico = '$idMedico';";
	$query = CallQuery($queryString);
	return $query->fetch_assoc();
    }

    public static function SeleccionarEspecialidades($idMedico) {
	$queryString = "SELECT Especialidades.Nombre as Nombre
			FROM Especialidades, Especialidades_has_Medicos
			WHERE Especialidades.idEspecialidad = Especialidades_has_Medicos.Especialidad_idEspecialidad AND
				Especialidades_has_Medicos.Medico_idMedico = '$idMedico';";
	$query = CallQuery($queryString);
	$especialidades = array();
	while($especialidad = $query->fetch_assoc()){
		$especialidades[] = $especialidad['Nombre'];
	}
	return $especialidades;
    }
	 public static function especialidadMedicoPaciente($id) {
	$queryString = "SELECT Nombre
			FROM Especialidades
			WHERE idEspecialidad= $id";
	$query = CallQuery($queryString);
	$especialidades = array();
	while($especialidad = $query->fetch_assoc()){
		$especialidades[] = $especialidad['Nombre'];
	}
	return $especialidades;
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
