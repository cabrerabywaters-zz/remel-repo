<?php


session_start();

 $id_plaza_log = $_REQUEST['idPlaza'];
 $nombre_institucion_log = $_REQUEST['nombre'];
 
 $_SESSION['institucionLog'][0]= $id_plaza_log;
 $_SESSION['institucionLog'][1]= $nombre_institucion_log;

 //LA INSTITUCION NO SIRVE DE NADA SIN LA INSTITUCION PLAZA
 
 
 if(isset($_SESSION['institucionLog'])==true){
     
     echo '1';
     
 }
 else
 {
     echo '0';
     
 }


//echo json_encode($instituciones);



?>
