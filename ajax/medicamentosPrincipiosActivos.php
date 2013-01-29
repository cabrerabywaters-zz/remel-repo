<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

  include_once('../Capa_Controladores/medicamento.php');
  
  $idPrincipio = $_POST['idPrincipio'];
  
  
 if($_POST['arsenal']=="false")
 {
  $medicamentos = Medicamento::BuscarMedicamentoPorIdPrincipioActivo($idPrincipio);
  
 }
 else
 {
     $medicamentos = Medicamento::BuscarMedicamentoPorIdPrincipioActivoEnArsenal($idPrincipio,$_SESSION['logLugar']['rutSucursal']);
     
 }
 
    echo json_encode($medicamentos);
  //  echo $_POST['arsenal'];
    
?>
