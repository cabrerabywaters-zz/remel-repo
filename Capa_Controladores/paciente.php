<?php 

include('../Capa_Datos/llamarQuery.php');
include('../Capa_Datos/generadorStringQuery.php');

class Condicion {

    static $nombreTabla = "Pacientes";
    static $nombreIdTabla = "idPaciente";
    
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$datosCreacion = array(
                                array('Fecha_Ultima_Actualizacion',$_POST['fecha_ultima_actualizacion']),
                                array('Nacionalidad',$_POST['nacionalidad']),
                                array('Peso',$_POST['peso']),
                                array('Etnias',$_POST['idEtnias'])                  
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
				'Fecha_Ultima_Actualizacion',
                                'Nacionalidad',
                                'Peso',
                                'Etnias'
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
                                array('Nacionalidad',$_POST['nacionalidad']),
                                array('Peso',$_POST['peso']),
				);

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }


<<<<<<< HEAD
=======
function PacienteSeleccionIdPorRUN($run){
	$atributosASeleccionar = array(
					'idPaciente',
					'Fecha_Ultima_Actualizacion',
					'Nacionalidad',
					'Peso',
					'Etnias_idEtnias',
					'altura'
					);
	$where = "WHERE Personas_RUN = '$run'";
	$resultado = Paciente::Seleccionar($atributosASeleccionar, $where);
	return $resultado;
>>>>>>> 8c29be510abee9e60415e54127d1ed016f607d9f
}

?>
