<?php

 /** Descripcion: Se guardan los datos de sucursal elegida en sesion y luego
  * se devuelve el estado de la operacion
  * Input (POST):
  * 	int idLugar
  *	int nombreLugar
  *	int rutSucursal
  *	int nombreSucursal
  * Output: int con estado de operacion
  * TODO: Verificar por interno la existencia del idLugar y rutSucursal en
  * la BBDD.
  */

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
