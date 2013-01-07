<?php

include_once(dirname(__FILE__).'/../Capa_Controladores/medicosHasPlazasInstituciones.php');

session_start();

$instituciones =  MedicosHasPlazasInstituciones::PlazasPorIDMedico($_SESSION['idMedicoLog']);

echo json_encode($instituciones);
?>

<?php


//session_start();

 $id_plaza_log = $_SESSION[0]['idPlaza'];
 $nombre_institucion_log = $_SESSION[0]['Nombre'];
 //print_r($_SESSION['idMedicoLog'][0]);
 $_SESSION['institucionLog'][0]= $id_plaza_log;
 $_SESSION['institucionLog'][1]= $nombre_institucion_log;
 
 if(isset($_SESSION['institucionLog'])==true){
     
     echo '1';
     
 }
 else
 {
     echo '0';
     
 }


//echo json_encode($instituciones);



?>
