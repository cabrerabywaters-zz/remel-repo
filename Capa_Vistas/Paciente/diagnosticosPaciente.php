
<a class="active btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion2" href="#collapsethree">
    Mis Diagnosticos

</a>
<div class="accordion-inner">
    <?php
    var_dump($diagnosticosPaciente);

    echo'
  <div class="row">
  <div class="span5" id="diagnosticos">
  <table>
                <tr><td>
   <table class="table table-hover">';

    foreach ($diagnosticosPaciente as $datos => $dato) {
        echo"	<tr>";
        foreach ($dato as $valor) {
            echo '<td>';
            echo $valor;
            echo '</td>';
        }

            echo "</tr>";
    }
    echo '</table>';
    ?>

</div>

