<?php
include(dirname(__FILE__) . "/../../Capa_Controladores/arsenal.php");
//buscar Recetas del cliente
?>

<div class="accordion-heading">
    <a class="btn btn-large btn-block active" data-toggle="collapse" data-parent="#accordion2" >
        Arsenal de <?php echo $_SESSION['logLugar']['nombreSucursal'] ?>, <?php echo $_SESSION['logLugar']['nombreLugar'] ?>
    </a>
</div>
<div><center>
    <button id="volver" class="btn btn-primary" onClick="volver()" type="submit"><strong>Volver</strong></button>
</center></div><hr>
<div class="accordion-body">
    <div class="accordion-inner">
        <?php
        //$fechaActual = date('y-m-d');
        $idExpendedor = intval($_SESSION['logLugar']['idLugar']);
        $medicamentosArsenal = Arsenal::R_MedicamentosEnArsenalPorExpendedor($idExpendedor);
        if ($medicamentosArsenal){
        echo'
  <div class="row">

  <center> <div style="width: 50%; ;">
  <table>
                <tr><td>
   <table class="table table-striped">
	<thead>
    <tr>
    <th>Nombre Medicamento</td>
    <th>Precio</td>
    </tr></thead>
    ';
        foreach ($medicamentosArsenal as $datos => $dato) {
            echo "<tr>";
            foreach ($dato as $llave => $valor) {
                if ($llave == 'Nombre') {
                    echo '<td>';
                    echo $valor . ' ';
                    echo '</td>';
                }
                if ($llave == 'Precio') {
                    echo '<td>';
                    echo $valor . ' ';
                    echo '</td>';
                }

            }
            echo '</tr>';
        }
        echo '</table></div></table></center></div>';
        }
        else {
            echo 'el arsenal no tiene medicamentos';
        }
        ?>
    </div>
</div>
<script>
    
    function volver(){
        window.location.href = 'funcionarioIndex.php#';
    }
    
</script>
