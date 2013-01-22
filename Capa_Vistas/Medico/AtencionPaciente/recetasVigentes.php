    <div class="accordion-heading">
      <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
        Recetas Vigentes
      </a>
    </div>
    <div id="collapseThree" class="accordion-body collapse">
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
    <th>Medico</td>
    <th>Fecha de Emision</td>
    <th>Fecha de Vencimiento</td>
    <th>Medicamentos</td>
    </tr></thead>
    ';
        foreach ($recetas as $datos => $dato) {
            echo "<tr>";
            foreach ($dato as $llave => $valor) {
                if ($llave == 'Id_consulta'){
                    echo '<td>';
                    $medicamentosConsulta = Paciente::R_MedicamentosConsulta($valor);
                    for($i=0;$i<count($medicamentosConsulta);$i++){
                        echo $medicamentosConsulta[$i]['Nombre_Comercial'].'</br>';
                    }
                }
                if ($llave == 'Nombre'){
                    echo '<td>';
                    echo $valor.' ';
                }
                if ($llave == 'Apellido_Paterno'){
                    echo $valor;
                    echo '</td>';
                }
                if ($llave == 'Fecha_Emision' || $llave == 'Fecha_Vencimiento'){
                    echo '<td>';
                    echo $valor;
                    echo '</td>';
                }                
            }
            echo "</tr>";
        }
        echo '</table></div></table></center></div>';
        ?>
    </div>
</div>