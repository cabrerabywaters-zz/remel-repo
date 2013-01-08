<?php #script uploader_upload.php maneja la información del uploader y del archivo nuevo creado
include('../includes/dbinfo.php');
include('../includes/function_lib.php');
$id_actual = id_actual($dbc); // obtenemos el id actual de la db
$id_nuevo = $id_actual +1;

$error_upload = array(); // arreglo para revisar errores de upload
$dir = '../img/fotos/';
$prefijo = "propiedad".$id_nuevo."_";

//Guardo la info en la base de datos
$metros = $_REQUEST['metros'];
$valor = $_REQUEST['valor'];
$dormitorios = $_REQUEST['dormitorios'];
$banos = $_REQUEST['banos'];
$tipo = $_REQUEST['tipo'];
$desc = $_REQUEST['descripcion'];
$entorno = $_REQUEST['entorno'];
$calle = $_REQUEST['calle'];
$numero = $_REQUEST['numero'];
$comuna = $_REQUEST['comuna'];
$estado = $_REQUEST['estado'];
$lat = geocode($calle,$numero,$comuna,'BioBío','lat');
$long = geocode($calle,$numero,$comuna,'BioBío','long');
$titulo = $_REQUEST['titulo'];
$estacionamiento = $_REQUEST['estacionamiento'];
$portada = $_REQUEST['portada'];
$currency = $_REQUEST['currency'];


$query = "INSERT INTO propiedad (`idpropiedad`, `metraje`, `valor`, `dormitorios`, `banos`, `tipo`, `descripcion`, `entorno`, `lat`, `long`, `fecha_creacion`, `id_comuna`, `calle`, `numero`, `estado`, titulo, estacionamiento, currency) VALUES ('$id_nuevo', '$metros', '$valor', '$dormitorios', '$banos', '$tipo', '$desc', '$entorno', $lat, $long, NOW(), '$comuna', '$calle', '$numero', '$estado', '$titulo', '$estacionamiento', '$currency')";


$resultado = mysql_query($query,$dbc);
  if($resultado){ //si se guardó la información de la propiedad
  
// Guardo las fotos
	for($i = 0; $i<=11 ; $i++){ // para cada archivo seleccionamos lo subimos

	$file_name = $_FILES['pictures']['name'][$i];
	$file_type =  $_FILES['pictures']['type'][$i];
	$file_temp_name = $_FILES['pictures']['tmp_name'];
	$file_size = $_FILES['pictures']['size'][$i];
	$destino = $dir.$prefijo.$file_name;
	$url = 'http://www.inmobiliariaconcepcion.cl/admin_propiedades/img/fotos/'.$prefijo.$file_name;
	
	if(!($file_type == 'image/jpeg' || $file_type == 'image/bmp' || $file_type == 'image/png') && $file_size < 5000000 && !empty($file_name)){ // se verifica tipo de archivo (jpg o bmp) y tamaño < a 10mb y no vacío
	echo 'La extensión o el tamaño del archivo $i no es correcta';
	}else{ // si cumple con especificaciones de archivo
		if(move_uploaded_file($file_temp_name[$i], $destino)){// se sube el archivo si no hay errores
				if($portada == $i){$principal = 1;}else{$principal = 0;}
		$query2 = "INSERT INTO foto (idfotos, url, size, name, principal, propiedad_idpropiedad, fecha_subida) VALUES (NULL, '$url', '$file_size', '$prefijo$file_name', $principal, $id_nuevo, NOW())";
			
		$result = mysql_query($query2,$dbc);
				
			if($result){ //si se guardó la info en la db se muestra
			echo "<html> 
				<head> 
				<meta http-equiv='Refresh' content='2;url=../loggedin.php'> 
				</head> 
				<body> 
				<p> Foto ingresada con éxito!...</p> 
				</body> 
				</html>";}
			else{echo "Error en ingreso de la foto $i a la db.<br>".mysql_error()."<br>$query2<br>";}
		}
	}
}echo "<html> 
				<head> 
				<meta http-equiv='Refresh' content='2;url=../loggedin.php'> 
				</head> 
				<body> 
				<p> Propiedad ingresada con éxito!... Redireccionando.</p> 
				</body> 
				</html>";

}else{echo "<b>Hubo errores Revise el Query MySQL</b>: $query";}


?>