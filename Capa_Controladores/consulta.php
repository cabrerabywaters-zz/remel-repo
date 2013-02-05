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
    public static function Insertar($idMedico, $idPaciente, $idLugar) {
    	$datosCreacion = array(
                                array('Fecha',date("Y-m-d")),
                                array('Hora',date("H:i:s")),
                                array('Medicos_idMedico',$idMedico),
                                array('Pacientes_idPaciente',$idPaciente),
                                array('Lugar_de_Atencion_idLugar_de_Atencion',$idLugar)
                                );

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        return CallQueryReturnID($queryString);
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId($id) {
        $queryString = QueryStringBorrarPorId(self::$nombreTabla, self::$nombreIdTabla, $id);
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

    public static function SeleccionarPorId($idConsulta){
	$atributosASeleccionar = array(
					'Fecha',
					'Hora',
					'Medicos_idMedico',
					'Pacientes_idPaciente',
					'Lugar_de_Atencion_idLugar_de_Atencion'
					);
	$where = "WHERE Id_Consulta = '$idConsulta'";
	$queryString = QueryStringSeleccionar($where, $atributosASeleccionar, self::$nombreTabla);
	$query = CallQuery($queryString);
	return $query->fetch_assoc();
    }

    public static function Seleccionar($where, $limit = 0, $offset = 0) {
    	$atributosASeleccionar = array(
                                
                                'Fecha',
                                'Hora',
                                'Medicos_idMedico',
                                'Pacientes_idPaciente',
                                'Lugar_de_Atencion_idLugar_de_Atencion'
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
    
    // lo generé de forma rapida para salir del problema, hay que hacerlo de manera correcta con el 
    //seleccionar query que está arriba de este
     public static function SeleccionarID($idMedico,$hora,$idPaciente,$fecha,$idLugar) {
    	

       $queryString="Select Id_consulta from Consulta Where Medicos_idMedico =".$idMedico." 
           and Pacientes_idPaciente=".$idPaciente." and  
               Fecha='".$fecha."'  and Hora = '".$hora."'
                   Lugar_de_Atencion_idLugar_de_Atencion=".$idLugar."  LIMIT 1;";
       
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
    	$id = $_POST['id_consulta'];
    	$datosActualizacion = array(
                                array('Fecha',$_POST['fecha']),
                                array('Hora',$_POST['hora']),
                               	);

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

}

?>
