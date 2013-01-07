<<<<<<< HEAD
<?php

include_once(dirname(__FILE__).'/Capa_Controladores/medicosHasInstituciones.php');

session_start();

$instituciones =  MedicosHasInstituciones::InstitucionesPorID($_SESSION['idMedicoLog']);

echo json_encode($instituciones);

?>
=======
<?php


session_start();

 $id_plaza_log = $_REQUEST['idPlaza'];
 $nombre_institucion_log = $_REQUEST['nombre'];
 
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
>>>>>>> fc68623a5574b6b25c3f5b3b8d905eed54594d58
