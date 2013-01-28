<div class="accordion-heading">
<a class="btn btn-large btn-block active"  data-parent="#accordion4" >
    Mi Historial Medico
</a>
 </div>
  <div class="accordion-body">
  <div class="accordion-inner">

  <div class="row">

  <center><div style="width: 50%; ;">
  <table>
                <tr><td>
   <table class="table table-striped table-bordered table-condensed">
	<thead>
    <tr>
    <th>Diagnostico</th>
    <th>Fecha</th>
    <th>Nombre del Médico</th>
    <th>Especialidad</th></tr></thead>
 <?php
    foreach ($diagnosticosPaciente as $datos => $dato) {
        echo "<tr>";
        foreach ($dato as $llave=>$valor) {
            //var_dump($llave);
            if ($llave == 'Nombre'){
                echo '<td>';
                echo $valor.' ';
            }
            if ($llave == 'Apellido_Paterno'){
                echo $valor;
                echo '</td>';
            }
            if ($llave == 'Fecha' || $llave == 'Diagnostico') {
                echo '<td>';
                echo $valor;
                echo '</td>';
            }
            if($llave == 'Especialidad'){
                echo '<td>';
                echo $valor;
                echo '</td>';
            }
        }

            echo "</tr>";
    }
 ?>
   </table></td></tr></table></div></center></div>';

  </div>
  </div>