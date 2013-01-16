<?php

function CallQuery($queryString){
		include('dbconfig.php');
		$mysqlCon = new mysqli($servidor,$nombre_usuario,$contrasena,$base_de_datos);
		$mysqlCon->set_charset("utf8");

		if($mysqlCon->errno) {
			printf("Conexion fallida: %s\n", $mysqli->connect_error);
			exit();
		}
		
		if($result = $mysqlCon->query($queryString)){
			$mysqlCon->close();
			return $result;
		}     
		else{
			$mysqlCon->close();
			return false;
		}  
}

function CallQueryReturnID($queryString){
    include('dbconfig.php');
		$mysqlCon = new mysqli($servidor,$nombre_usuario,$contrasena,$base_de_datos);
		$mysqlCon->set_charset("utf8");

		if($mysqlCon->errno) {
			printf("Conexion fallida: %s\n", $mysqli->connect_error);
			exit();
		}
		
		if($result = $mysqlCon->query($queryString)){
                        $id = $mysqlCon->insert_id;
			$mysqlCon->close();
			return $id;
		}     
		else{
			$mysqlCon->close();
			return false;
		}  
}
?>
