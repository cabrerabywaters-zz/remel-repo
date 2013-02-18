<?php
/** Descripcion: Guarda una nueva asociacion Paciente-Alergia en la base de 
 * datos y luego devuelve el estado.
 *
 * Input (POST):
 *	int idAlergia
 * Input (SESSION):
 *	int idPaciente
 * Output: Boolean de estado.
 */

session_start();


include_once(dirname(__FILE__) . '/../Capa_Controladores/alergiaHasPaciente.php');



$idPaciente = $_SESSION['idPaciente'];
$idAlergia = $_POST['idAlergia'];

//echo $idAlergia;
$insercion = AlergiaHasPaciente::Insertar($idAlergia, $idPaciente);
    
    if($insercion){//se guarda el log
        echo '0';}
    else{
        echo '1';
    }


?>
