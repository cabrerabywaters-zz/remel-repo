<?php 

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');

class Receta  {

    static $nombreTabla = "Recetas";
    static $nombreIdTabla = "idReceta";    
    
    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
    	$datosCreacion = array(
                                array('Fecha_Emision','NOW()'),
                                array('Recetacol',$_POST['Recetacol']),
                                array('Medicos_Personas_RUN',$_POST['Personas_RUN']),
                                array('Institucion_Emision',$_POST['institucion_emision']),
                                array('DireccionIP',$_POST['direccion_ip']),
                                array('Tipo_Receta_idTipo_Receta',$_POST['idTipo_Receta']),
                                array('Fecha_Vencimiento',$_POST['fecha_vencimiento']),
                                array('Folio_RP',$_POST['Folio_RP']),
                                array('Consulta_Medicos_idMedico',$_POST['idMedico']),
                                array('Consulta_Medicos_Persona_RUN',$_POST['Personas_RUN']),
                                array('Consulta_Id_consulta',$_POST['id_consulta']),
                                array('Estado',$_POST['estado']),
                                array('Causa_eliminacion',$_POST['causa_eliminacion']),
                                array('Fecha_eliminacion',$_POST['fecha_eliminacion']),
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
    	$id = $_POST['id_receta'];
    	$datosActualizacion = array(
                               array('Fecha_Emision','NOW()'),
                                array('Recetacol',$_POST['Recetacol']),
                                array('Institucion_Emision',$_POST['institucion_emision']),
                                array('Fecha_Vencimiento',$_POST['fecha_vencimiento']),
                                array('Folio_RP',$_POST['folio_rp']),
                                array('Estado',$_POST['estado']),
                                array('Causa_eliminacion',$_POST['causa_eliminacion']),
                                array('Fecha_eliminacion',$_POST['fecha_eliminacion']),
                      	);

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

}

?>