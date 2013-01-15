<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');

class Laboratorio {

    static $nombreTabla = "Log";
    static $nombreIdTabla = "ID";    
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$datosCreacion = array(
								array('Fecha',$_POST['fecha']),
								array('campoModificado',$_POST['campoModificado']),
								array('valorAnterior',$_POST['valorAnterior']),
								array('valorNuevo',$_POST['valorNuevo']),
								array('NombreTabla',$_POST['NombreTabla']),
								array('Personas_RUN',$_POST['Personas_RUN']),
								array('Medicos_idMedico',$_POST['Medicos_idMedico']),
								array('Medicos_Personas_RUN',$_POST['Medicos_Personas_RUN']),
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
                                        'Fecha',
										'campoModificado',
										'valorAnterior',
										'valorNuevo',
										'NombreTabla',
										'Personas_RUN',
										'Medicos_idMedico',
										'Medicos_Personas_RUN',
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
    	$id = $_POST['rut'];
    	$datosActualizacion = array(
                                array('Fecha',$_POST['fecha']),
								array('campoModificado',$_POST['campoModificado']),
								array('valorAnterior',$_POST['valorAnterior']),
								array('valorNuevo',$_POST['valorNuevo']),
								array('NombreTabla',$_POST['NombreTabla']),
								array('Personas_RUN',$_POST['Personas_RUN']),
								array('Medicos_idMedico',$_POST['Medicos_idMedico']),
								array('Medicos_Personas_RUN',$_POST['Medicos_Personas_RUN']),
                );

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

}

?>