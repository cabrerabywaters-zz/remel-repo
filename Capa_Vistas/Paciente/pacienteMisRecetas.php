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
                                            <th>Medicamentos</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                        

                                        include_once(dirname(__FILE__) . "/../../Capa_Controladores/paciente.php");

                                        $historialRecetas = Paciente::SeleccionarRecetaPorId($idPaciente);
											print_r($historialRecetas);
                                        foreach ($historialRecetas as $lineaRecetas) {
                                            echo "<tr folio='" . $lineaRecetas['folio'] . "'>";
                                            echo "<td>" . $lineaRecetas["folio"] . "</td>";
                                            echo "<td>" . $lineaRecetas["nombreMedico"] . " " . $lineaRecetas["apellidoMedico"] . "</td>";
                                            echo "<td>" . $lineaRecetas["fechaEmision"] . "</td>";
                                            echo '<td>';

                                            $medicamentosReceta = Paciente::R_MedicamentosReceta($idReceta);
                                            for ($i = 0; $i < count($medicamentosReceta); $i++) {
                                                echo $medicamentosReceta[$i]['Nombre_Comercial'] . '</br>';
                                            }
                                            echo '</td>';
                                            echo '<td><center><input  type="button" class="btn btn-info" value="' . $lineaRecetas["nombreDiagnostico"] . '"></center></td>';
                                            echo "</tr>";
                                        }
                                        echo '</table></div></table></center></div>';
                                        ?>


                                    </tbody>
                                    </div>
                                </table></td></tr></table>

                </div>
                <script>
                    var folio = $(this).parent('tr').attr('folio');
                    var RUTPAciente = <?php echo $_SESSION['RUT']; ?>
  
  
                </script>