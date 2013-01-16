<?php

 session_start();

 $idLugar = $_POST['idLugar'];
 $nombreLugar = $_POST['nombreLugar'];
  $rutSucursal = $_POST['rutSucursal'];
 $nombreSucursal = $_POST['nombreSucursal'];
 //print_r($_SESSION['idMedicoLog'][0]);
 $_SESSION['logLugar'] = array(
     'rutSucursal' => $rutSucursal,
     'nombreSucursal' => $nombreSucursal,
     'idLugar' => $idLugar,
     'nombreLugar' => $nombreLugar
 );
 
 if(isset($_SESSION['logLugar'])==true){
     
     echo '1';
     
 }
 else
 {
     echo '0';
     
 }

?>
