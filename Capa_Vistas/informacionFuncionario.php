<?php
	// consulta a Realizar a la base de datos del usuario 
        session_start();
	include(dirname(__FILE__)."/../Capa_Controladores/persona.php");
	include(dirname(__FILE__)."/../Capa_Controladores/funcionario.php");
	include(dirname(__FILE__)."/../Capa_Controladores/categoriaFuncionario.php");
	$RUTFuncionario = $_SESSION['RUTFuncionario'];
	$funcionario = Persona::Seleccionar("WHERE RUN = '$RUTFuncionario'");
	$funcionario = $funcionario[0];
        $idCategoria = Funcionario::SeleccionarIdCategoria($RUTFuncionario);
	$idCategoria = $idCategoria[0];
        $nombreCategoria = CategoriaFuncionario::EncontrarNombrePorId($idCategoria);
        $nombreCategoria = $nombreCategoria[0];

?>
