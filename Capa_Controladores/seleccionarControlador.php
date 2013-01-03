<?php
$arreglo = array();
echo "Ubicacion: ".$_POST['Tabla'];
echo "<br>Accion: ".$_POST['Accion'];
	switch($_POST['Tabla']){
		case 'Regiones':
			include('../Capa_Controladores/region.php');
                case 'Alergias':
                        include('../Capa_Controladores/alergia.php');
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
