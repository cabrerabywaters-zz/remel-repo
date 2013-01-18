<?php

include_once(dirname(__FILE__)."/../Capa_Controladores/laboratorio.php");


$subClase = $_POST['subclase'];


$laboratorios = array();

	$laboratorio = Laboratorio::SeleccionarLaboratorioPorClaseTerapeutica($subClase);

         echo json_encode($laboratorio);
 

?>
