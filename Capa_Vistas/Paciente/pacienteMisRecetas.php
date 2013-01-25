<div class="accordion-heading">
    <a class="btn btn-large btn-block active" data-toggle="collapse" data-parent="#accordion3" >
        Mis Recetas

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
    <th>Folio</th>    
    <th>Nombre del Médico</th>
    <th>Fecha Emisión</th>
    <th>Fecha Vencimiento</th>
    <th>Fecha Adquisición</th>
    <th>Diagnostico Asociado</th>
    </tr>
       </thead>
       <tbody>
           
           <?php
               include_once(dirname(__FILE__)."/../../Capa_Controladores/paciente.php");
               
               $historialRecetas = Paciente::SeleccionarRecetaPorId($idPaciente);
               
           foreach($historialRecetas as $lineaRecetas){
              echo "<tr>";
              echo "<td>".$lineaRecetas["folio"]."</td>";
              echo "<td>".$lineaRecetas["nombreMedico"]." ".$lineaRecetas["apellidoMedico"]."</td>";
              echo "<td>".$lineaRecetas["fechaEmision"]."</td>";
              echo "<td>".$lineaRecetas["fechaEliminacion"]."</td>";
              echo "<td>".$lineaRecetas["fechaAdquisicion"]."</td>";
              echo "<td>".$lineaRecetas["nombreDiagnostico"]."</td>";
              echo "</tr>";
        }
    echo '</table></div></table></center></div>';
  ?>
           
           
  </tbody>
  </div>
  </div>