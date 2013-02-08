<?php

/**
 * Descripcion: Entrega laboratorios que presentan medicamentos
 * en una subclase dada para la funcion de multiselect
 * Input (POST)
 *	int subClase
 * Output: json con los laboratorios asociados
 */

include_once(dirname(__FILE__)."/../Capa_Controladores/laboratorio.php");



$subClase = $_POST['subclase'];


$laboratorios = array();

	$laboratorio = Laboratorio::SeleccionarLaboratorioPorClaseTerapeutica($subClase);

         echo json_encode($laboratorio);
 

?>
