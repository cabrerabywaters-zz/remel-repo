<?php

include_once('../Capa_Controladores/historialMedico.php');


  $insertado=  HistorialMedico::Insertar($idDiagnostico, $idConsulta);
  
  if($insertado=true)
  {
      echo "1";
      
  }
  else{
      
      echo "0";
  }

?>
