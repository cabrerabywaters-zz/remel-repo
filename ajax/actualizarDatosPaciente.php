<?php

/*
 * Descripcion: Tomar datos actualizados de persona por AJAX, actualizar
 * la base de datos y devolver el estado final de la operacion
 *
 * Input (POST):
 *	int RUN
 *	float Peso
 *	float Altura
 *	string Direccion
 *	int Comuna
 *	int Numero
 *	int N_celular
 *	int N_fijo
 *	int Prevision
 *	int Seguro
 * Output: Devuelve un bool (0 o 1) como respuesta HTML.
 */

include_once(dirname(__FILE__) . '/../Capa_Controladores/persona.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/comuna.php');
session_start();
$run = $_POST['RUN'];
$peso = $_POST['Peso'];
$altura = $_POST['Altura'];
$calle = $_POST['Direccion'];
$comuna = $_POST['Comuna'];
$nCalle = $_POST['Numero'];
$nCelular = $_POST['N_celular'];
$nFijo = $_POST['N_fijo'];
$prevision = $_POST['Prevision'];
$seguro = $_POST['Seguro'];

$comuna = Comuna::BuscarComunaPorNombre($comuna);
$comuna = $comuna['idComuna'];

$actualizado = Persona::MedicoEditarDatosPaciente($run, $peso, $altura, $calle, $comuna, $nCalle, $nCelular, $nFijo, $prevision, $seguro);
if ($actualizado==1){
    echo '1';
}
else{
    echo '0';
}

?>
