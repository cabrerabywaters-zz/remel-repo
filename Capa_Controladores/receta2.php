<?php 

/**
 * Clase Receta
 * @package TableFunctions
 */

include_once(dirname(__FILE__) . '/../Capa_Datos/generadorStringQuery.php');

/**
 * Clase que maneja la tabla Receta
 * @package TableFunctions
 */
class Receta  {
    /**
     * Nombre de la tabla
     * @static  
     * @var string
     */
    static $nombreTabla = "Recetas";
    /**
     * Nombre del id de tabla
     * @static  
     * @var string
     */
    static $nombreIdTabla = "idReceta";    
    
    /**
     * Inserta una nueva entrada
     * @static
     * @access public
     * @param string $ip Ip desde donde se emite la receta
     * @param int $idConsulta El id de la consulta correspondiente
     * @return int El id de la receta insertada
     */
    public static function Insertar($ip, $idConsulta ) {
    	$datosCreacion = array(
                                array('Fecha_Emision',date("Y-m-d H:i:s")),
                                array('DireccionIP',$ip),
                                array('Consulta_Id_consulta',$idConsulta),
                                array('Estado','0'),
                                );
        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQueryReturnID($queryString);
	return $query;
    }

    /**
     * Borra una entrada segun su id.
     * @param int $idReceta Id de la receta a eliminar
     * @access public
     * @static
     */
    public static function BorrarPorId($idReceta) {
        $queryString = QueryStringBorrarPorId(self::$nombreTabla, self::$nombreIdTabla, $this->_id);
        $query = CallQuery($queryString);
    }

    /**
     * Se retiran los datos de una receta dada por id. 
     * @param int $idReceta Id de la receta a seleccionar
     * @return mixed Entrega array o codigo de falla
     * @access public
     * @static
     */
	
	public static function SeleccionarPorId($idReceta) {
        $atributosASeleccionar = array(
                                'Fecha_Emision',
                                'Lugar_de_Atencion_idLugar_de_atencion',
                                'DireccionIP',
                                'Tipo_Receta_idTipo_Receta',
                                'Fecha_Vencimiento',
                                'Folio_RP',
                                'Consulta_Id_consulta',
                                'Estado',
                                'Causa_eliminacion',
                                'Fecha_eliminacion'
            );
	$where = "WHERE idReceta = '$idReceta'";
        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, self::$nombreTabla);
	$query = CallQuery($queryString);
	return $query->fetch_assoc();
    }
    /**
     * Esta funcion selecciona todas las entradas de una tabla con respecto a una condicion dada. Tambien es posible entregar un limite y un offset.
     * @param string $where Condicion a utilizar
     * @param int $limit Cantidad limite de entradas a seleccionar
     * @param int $offset Corrimiento de la seleccion
     * @returns mixed $resultArray Array o codigo de fallo
     * @static
     * @access public
     */
    public static function Seleccionar($where, $limit = 0, $offset = 0) {
    	$atributosASeleccionar = array(
                                'Fecha_Emision',
                                'Institucion_Emision',
				'Lugar_de_Atencion_idLugar_de_atencion',
                                'DireccionIP',
                                'Tipo_Receta_idTipo_Receta',
                                'Fecha_Vencimiento',
                                'Folio_RP',
                                'Consulta_Id_consulta',
                                'Estado',
                                'Causa_eliminacion',
                                'Fecha_eliminacion'
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
    
    /*
    public static function Actualizar() {
    	$id = $_POST['id_receta'];
    	$datosActualizacion = array(
                               array('Fecha_Emision','NOW()'),
                                array('Recetacol',$_POST['Recetacol']),
                                array('Institucion_Emision',$_POST['institucion_emision']),
                                array('DireccionIP',$_POST['direccion_ip']),
                                array('Tipo_Receta_idTipo_Receta',$_POST['idTipo_Receta']),
                                array('Fecha_Vencimiento',$_POST['fecha_vencimiento']),
                                array('Folio_RP',$_POST['Folio_RP']),
                                array('Consulta_Id_consulta',$_POST['id_consulta']),
                                array('Estado',$_POST['estado']),
                                array('Causa_eliminacion',$_POST['causa_eliminacion']),
                                array('Fecha_eliminacion',$_POST['fecha_eliminacion']),
                                        	);

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    } */

     /**
     * Selecciona una receta segun la consulta y la ip donde se realizo
     * @param int $idConsulta Id de la receta a eliminar
     * @param string $ip Ip donde se realizo la consulta
     * @return mixed Array con resultados o error
     * @static
     * @access public
     */
     public static function SeleccionarPorLugarIpConsulta($ip,$idConsulta) {
    	

        $queryString = "Select idReceta from Recetas where DireccionIP='$ip' and Consulta_Id_consulta='$idConsulta' ";

          
        $result = CallQuery($queryString);
	    $resultArray = array();
	    while($fila = $result->fetch_assoc()) {
	       $resultArray[] = $fila;
	    }
	    return $resultArray;
    }
    
    
    
}
?>
