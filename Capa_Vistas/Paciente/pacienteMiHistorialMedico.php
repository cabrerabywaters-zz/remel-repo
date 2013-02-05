<div class="accordion-heading">
<a class="btn btn-large btn-block active"  data-parent="#accordion4" >
    Mi Historial Medico
</a>
 </div>
     		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
                             $('#misMedicos').dataTable();
                        });
		</script>
<div class="accordion-body">
    <div class="accordion-inner">
        <div class="row">
            <center>
            	<div style="width: 50%; ;">
                    <table class="table table-bordered" cellpadding="0" cellspacing="0" border="0" class="display" id="misMedicos">
                        <thead>
                            <tr>
                                <th>Diagnostico</th>
                                <th>Fecha</th>
                                <th>Nombre del Médico</th>
                                <th>Especialidad</th>
                            </tr>
                        </thead>
                        <tbody>
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
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Diagnostico</th>
                                <th>Fecha</th>
                                <th>Nombre del Médico</th>
                                <th>Especialidad</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
        	</center>
        </div>        
	</div>
</div>