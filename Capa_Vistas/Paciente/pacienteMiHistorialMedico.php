<div class="accordion-heading">
<a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion4" href="#collapsefour">
    Mi Historial Medico
</a>
 </div>
  <div id="collapsefour" class="accordion-body collapse">
  <div class="accordion-inner">
    <?php
    echo'
  <div class="row">

  <center> <div style="width: 50%; ;">
  <table>
                <tr><td>
   <table class="table table-striped">
	<thead>
    <tr>
    <th>Diagnostico</td>
    <th>Fecha</td>
    <th>Nombre del Médico</td></tr></thead>
    ';
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
        }

            echo "</tr>";
    }
    echo '</table></div></center></div>';
    ?>
  </div>
  </div>