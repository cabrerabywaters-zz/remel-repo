<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');

class Consulta  {

    static $nombreTabla = "Consulta";
    static $nombreIdTabla = "Id_consulta";    
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$datosCreacion = array(
                                array('Fecha','NOW()'),
                                array('Medicos_idMedico',$_POST['idMedico']),
                                array('Pacientes_idPaciente',$_POST['idPaciente']),
                                array('Prestadores_Salud_idPrestadores_Salud',$_POST['idPrestadores_Salud']),
                                array('Prestadores_Salud_Plazas_Instituciones_idPlaza',$_POST['idPlaza'])
                                );

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }
    public static function InsertarAlternativo($fecha, $idMedico, $idPaciente, $idPrestadorSalud, $idPlaza){
        $queryString = 'INSERT INTO '.self::$nombreTabla.' (Fecha, Medicos_idMedico, Pacientes_idPaciente, Prestadores_Salud_idPrestadores_Salud, Prestadores_Salud_Plazas_Instituciones_idPlaza)
                        VALUES ("'.$fecha.'","'.$idMedico.'","'.$idPaciente.'","'.$idPrestadorSalud.'","'.$idPlaza.'")';
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
                                'Fecha',
                                'Hora',
                                'Medicos_idMedico',
                                'Pacientes_idPaciente',
                                'Prestadores_Salud_idPrestadores_Salud',
                                'Prestadores_Salud_Plazas_Instituciones_idPlaza'
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
                                array('Fecha','NOW()'),
                                array('Hora','NOW()'),
                               	);

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

}

?>