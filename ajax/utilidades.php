<?php

/**
 * Set de utilidades varias
 * @package ajaxController
 */
/**
 * Formatea el rut a como se utiliza en la base de datos
 * @param int $rut RUT a formatear
 * @return string RUT formateado
 */
function validadorRUT($rut){
	$rut=str_replace(".","",$rut);//elimina puntos del rut
        $rut=str_replace("-","",$rut);//elimina guiones del rut
        $rut=str_replace("k","0",$rut);//elimina las K y las reemplaza por 0

        return $rut; //iguala la variable final a la variable inicial
}

?>
