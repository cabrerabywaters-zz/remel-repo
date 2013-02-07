<?php
/*
 * consigue la info del funcionario
 * input: rut del usuario
 * output: nombre de la persona y categoria de funcionario
 */
	// consulta a Realizar a la base de datos del usuario 
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
