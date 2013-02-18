<?php
/*
 * Descripcion: Toma el RUT del paciente logeado y retorna la fecha de ultima actualización de sus 
 * datos
 * Input (SESSION):
 *	int RUTPersona
 *      int RUT
 * Output: timeStamp
 * @package ajaxController
 */

include_once(dirname(__FILE__) . '/../Capa_Controladores/log.php');
if(isset($_SESSION)){
    // si hay una sesion iniciada (cuando se utilice esta info vía SERVIDOR)
}
else{ // si no hay una session iniciada (cuando se utiliza esta info vía AJAX)
session_start();}

if(isset($_SESSION['RUTPaciente'])){ // si se encuentra en la seccion de atención paciente el rut es el del paciente
    $personaRUN = trim($_SESSION['RUTPaciente']);
}
else if(isset($_SESSION['RUT'])){// si se encuentra en la seccion de paciente el rut es el del logueado
    $personaRUN = trim($_SESSION['RUT']);
}
$where = 'WHERE Personas_RUN = '.$personaRUN;
$ultimoLog = Log::Seleccionar($where,1); // información del ultimo log

if($ultimoLog != null){ // si hay resultados
echo $ultimoLog[0]['Fecha'];
}
else{ // si no hay resultados 
echo 'Nunca';    
}
?>
