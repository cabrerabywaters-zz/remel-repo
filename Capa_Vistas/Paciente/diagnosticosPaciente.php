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
    foreach ($diagnosticosPaciente as $datos => $dato) {
        echo "<tr>";
        foreach ($dato as $llave=>$valor) {
           var_dump($llave);
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
    echo '</table></div></table></center></div>';
  ?>
           
           
  </tbody>
  </div>
  </div>

