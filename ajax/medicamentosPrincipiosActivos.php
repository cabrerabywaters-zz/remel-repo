<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

  include_once('../Capa_Controladores/medicamento.php');
  
  $idPrincipio = $_POST['idPrincipio'];
  
  $medicamentos = Medicamento::BuscarMedicamentoPorIdPrincipioActivo($idPrincipio);
  
    echo json_encode($medicamentos);
    
    
?>
