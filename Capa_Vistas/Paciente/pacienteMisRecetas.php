<div class="accordion-heading">
<a class="btn btn-large btn-block active"  data-parent="#accordion3">
    Mis Recetas

</a>
 </div>
  <div  class="accordion-body">
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
    foreach ($recetasPaciente as $datos => $dato) {
        echo "<tr>";
        var_dump($llave);
        foreach ($dato as $llave=>$valor) {
            //var_dump($llave);
            
        }

            echo "</tr>";
    }
    echo '</table></div></table></center></div>';
    ?>
  </div>
  </div>