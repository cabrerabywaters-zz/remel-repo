<?php 

include_once('../Capa_Datos/generadorStringQuery.php');

class Medico {

    static $nombreTabla = "Medicos";    

    public static function Seleccionar($where, $limit = 0, $offset = 0) {
    	$atributosASeleccionar = array(
					'Medicocol',
                                        'Direccion_Consulta',
                                        'Correo_Medico',
                                        'Codigo_Registro_SS',
                                        'Codigo_Registro_CM',
                                        'Fecha_Inscripcion',
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
	    return $resultArray;
    }
    public static function EncontrarMedico($rut) {
        $queryString = "SELECT  FROM Medicos WHERE Personas_RUN = '$rut';";
        $res = CallQuery($queryString);
        if($res->num_rows >= 1){
                return $res->fetch_assoc();
        }
        else return false;
    }
}

?>
