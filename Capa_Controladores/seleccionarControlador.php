<?php

	switch($_POST['Tabla']){
		case 'Regiones':
			include('region.php');
	}

	switch($_POST['Accion']){
		case 0:	
			Seleccion();
		case 1:
			Eliminacion();
		case 2:
			Actualizacion();
		case 3:	
			Creacion();
	}


?>
