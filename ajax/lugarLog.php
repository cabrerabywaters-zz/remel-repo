<?php

 session_start();

 $idLugar = $_POST['idLugar'];
 $nombreLugar = $_POST['nombre'];
 //print_r($_SESSION['idMedicoLog'][0]);
 $_SESSION['lugarLog'][0]= $idLugar;
 $_SESSION['lugarLog'][1]= $nombreLugar;
 
 if(isset($_SESSION['lugarLog'])==true){
     
     echo '1';
     
 }
 else
 {
     echo '0';
     
 }

?>
