<div class="accordion-heading">
    <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion1" href="#collapseone2">
        Información Médica Registrada
    </a>
</div>
<div id="collapseone2" class="accordion-body collapse">
    <div class="accordion-inner">

        <div class="row">
            <div class="span5" id="alergias">
                <table>
                    <thead>
                        <tr>
                            <th>Alergias</th>                      
                        </tr>
                    </thead>
                    <tr><td>
                            <table class="table table-hover">
                                <?php
                                if ($alergiasPaciente != false) {
                                    foreach ($alergiasPaciente as $datos => $dato) {
                                        echo"	<tr>";
                                        $contador = 1;
                                        foreach ($dato as $valor) {
                                            $contador++;
                                        }

                                        echo"<td rowspan='" . $contador . "'>
					</td></tr>";

                                        foreach ($dato as $valor) {
                                            $contador++;
                                            echo "<tr><td>$valor</td></tr>";
                                        }
                                        echo"</tr>";
                                    }
                                }
                                else{
                                    echo 'el paciente no tiene alergias';
                                }
                                ?>
                                </tbody>
                            </table>
                    </tr></td><tfoot><tr><td> 
                            </td></tr></tfoot></table></div>



            <div class="span5 offset2">
                <table>
                    <thead>
                        <tr>
                            <th>Condiciones</th>                      
                        </tr>
                    </thead>
                    <tr><td>
                            <table class="table table-hover">

<?php
if ($condicionesPaciente != false){
foreach ($condicionesPaciente as $datos => $dato) {
    echo"	<tr>";
    $contador = 1;
    foreach ($dato as $valor) {
        $contador++;
    }

    echo"<td rowspan='" . $contador . "'>
						</td></tr>";

    foreach ($dato as $valor) {
        $contador++;
        echo "<tr><td>$valor</td></tr>";
    }
    echo"</tr>";
}
}
else{
    echo 'el paciente no tiene condiciones';
}
?>
                                </tbody>
                            </table>
                    </tr></td><tfoot><tr><td> 
                            </td></tr></tfoot></table></div></div>
    </div>
</div>