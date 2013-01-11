
<a class="active btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion2" href="#collapsethree">
    Mis Diagnosticos

</a>
<div class="accordion-inner">
    <?php
    echo'
  <div class="row">

  <center> <div style="width: 50%; ;">
  <table>
                <tr><td>
   <table class="table table-striped">

    <tr>
    <td>Diagnostico</td>
    <td>Fecha</td>
    <td>Nombre del Médico</td>
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

