<?php

/**
 * Tomar datos actualizados de persona por AJAX, actualizar la base de datos y devolver el estado final de la operacion
 *
 * @package ajaxController 
 */

include_once(dirname(__FILE__) . '/../Capa_Controladores/persona.php');
include_once(dirname(__FILE__).'/../Capa_Controladores/comuna.php');
session_start();

actualizarDatosPaciente($_POST['RUN'],
                        $_POST['Peso'],
                        $_POST['Altura'],
                        $_POST['Direccion'],
                        $_POST['Comuna'],
                        $_POST['Numero'],
                        $_POST['N_celular'],
                        $_POST['N_fijo'],
                        $_POST['Prevision'],
                        $_POST['Seguro']);
/**
 *
 * @param int $run
 * @param int $run
 * @
 */
function actualizarDatosPaciente($run,$peso,$altura,$calle,$comuna,$nCalle,$nCelular,$nFijo,$prevision,$seguro    ) {

	$comuna = Comuna::BuscarComunaPorNombre($comuna);
	$comuna = $comuna['idComuna'];

	$actualizado = Persona::MedicoEditarDatosPaciente($run, $peso, $altura, $calle, $comuna, $nCalle, $nCelular, $nFijo, $prevision, $seguro);
	if ($actualizado==1) {
    		echo '1';
	} else {
    		echo '0';
	}
}
?>
