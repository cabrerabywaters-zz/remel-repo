<?php

 /**
  * Descripcion: Se ingresa la eleccion de institucion a la sesion y se
  * devuelve estado.
  * Input (POST)
  * 	int idPlaza
  *	int nombre
  * Output: int de estado final.
  */

 session_start();

 $id_plaza_log = $_POST['idPlaza'];
 $nombre_institucion_log = $_POST['nombre'];
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

?>
