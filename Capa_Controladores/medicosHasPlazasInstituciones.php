<?php

include_once(dirname(__FILE__).'/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__).'/institucion.php');

class MedicosHasInstituciones{


    static $nombreTabla = "Medicos";
    
    public static function InstitucionesPorID($id){
	$rutInstituciones = array();

	$queryString = "SELECT Institucion_RUT FROM Medicos_has_Instituciones WHERE Medico_idMedico = '$id';";

	$resultado = CallQuery($queryString);

	while($row = $resultado->fetch_assoc()){
		$rutInstituciones[] = "'".$row['Institucion_RUT']."'";
	}
	
	return Institucion::BuscarNombreArrayRUT($rutInstituciones);	

     
    }

}

?>
