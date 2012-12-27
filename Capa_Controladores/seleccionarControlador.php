<?php
$arreglo = array();
	switch($_POST['Tabla']){
		case 'Regiones':
			include('../Capa_Controladores/region.php');
	}

	switch($_POST['Accion']){
		case 0:	
			$arreglo = Seleccion(); // traspasa los datos al arreglo
		case 1:
			Eliminacion();
		case 2:
			Actualizacion();
		case 3:	
			Creacion();
	}


?>
