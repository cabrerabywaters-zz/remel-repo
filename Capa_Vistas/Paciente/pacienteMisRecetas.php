<div class="accordion-heading">
    <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion3" href="#collapsethree">
        Mis Recetas

    </a>
</div>
<div id="collapsethree" class="accordion-body collapse">
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
    <th>Receta</td>
    <th>Fecha</td>
    <th>Nombre del Médico</td></tr></thead>
    ';
        var_dump($recetasPaciente);
        foreach ($recetasPaciente as $datos => $dato) {
            echo "<tr>";
            foreach ($dato as $llave => $valor) {
                //var_dump($llave);
            }

            echo "</tr>";
        }
        echo '</table></div></table></center></div>';
        ?>
    </div>
</div>