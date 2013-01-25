<div class="accordion-heading">
<a class="btn btn-large btn-block active"  data-parent="#accordion2" >
    Mis Diagnósticos Históricos

</a>
 </div>
  <div id="collapsetwo">
  <div class="accordion-inner">
  
  <div class="row">

  <center> <div style="width: 50%; ;">
  <table>
                <tr><td>
   <table class="table table-striped table-bordered table-condensed">
	<thead>
    <tr>
    <th>Diagnostico</th>
    <th>Nombre del Médico</th>
    <th>Fecha</th>
    <th>Tipo</th>
    <th>Comentario</th>
    </tr>
       </thead>
       <tbody>
    
    <?php
    
    include_once(dirname(__FILE__)."/../../Capa_Controladores/paciente.php");
    
    $historialPaciente = Paciente::SeleccionarDiagnosticosPorId($idPaciente);
    
    foreach ($historialPaciente as $lineaHistorial) {
            echo "<tr>";
            echo "<td>".$lineaHistorial['nombreDiagnostico']."</td>";
            echo "<td>".$lineaHistorial['nombreMedico']." ".$lineaHistorial['apellidoMedico']."</td>";
            echo "<td>".$lineaHistorial['fechaConsulta']."</td>";
            echo "<td>".$lineaHistorial['nombreTipoDiagnostico']."</td>";
            echo "<td>".$lineaHistorial['comentarioDiagnostico']."</td>";
            echo "</tr>";
    }
        
    echo '</table></div></table></center></div>';
  ?>
           
           
  </tbody>
  </div>
  </div>

