<?php

include_once(dirname(__FILE__) . '/../Capa_Datos/generadorStringQuery.php');
include_once(dirname(__FILE__) . '/institucion.php');

class MedicosHasPlazasInstituciones {

    static $nombreTabla = "Medicos";

    public static function PlazasPorIDMedico($idMedico) {
        
        //print_r($idMedico);
        $queryString = "Select idPlaza, Nombre from 
                Plazas_Instituciones where idPlaza in  (Select id_plaza_institucion  from 
                Medico_has_Plaza_Institucion where id_medico='".$idMedico[0] ."' 
                    and id_plaza_institucion   in   (Select 
                                Plazas_Instituciones_idPlaza  from Prestadores_Salud ));";
        $resultado = CallQuery($queryString);
        while($row = $resultado->fetch_assoc()){
		$instituciones[] = $row;
	}

	return $instituciones;
    }
        
        
    

}

?>
