<?php

/**
 * Descripcion: Entrega todos los medicamentos con un principio activo
 * asociado.
 * Input (POST)
 *	int idPrincipio
 * Output: json con los medicamentos
 */

  include_once('../Capa_Controladores/medicamento.php');
  
  $idPrincipio = $_POST['idPrincipio'];
  
  $medicamentos = Medicamento::BuscarMedicamentoPorIdPrincipioActivo($idPrincipio);
  
    echo json_encode($medicamentos);
    
    
?>
