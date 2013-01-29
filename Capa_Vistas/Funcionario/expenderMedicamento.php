<?php
include_once(dirname(__FILE__) . '/../../ajax/sessionCheck.php');
iniciarCookie();
verificarIP();
include(dirname(__FILE__) . "/../funcionarioHeader.php");
include(dirname(__FILE__) . "/../../Capa_Controladores/medicamento.php");
print_r($_SESSION);
//buscar datos del medicamento
$datosMedicamento = Medicamento::BuscarMedicamentoPorId($_SESSION['medicamentoID']);
echo $datosMedicamento['Nombre_Comercial'];
echo '<br>';
echo '<img src="'.$datosMedicamento['Foto_Presentacion'].'" width="200" height="200"></img>';
echo '<br>';
echo '<input type="text" id="numero" value="1">';
echo '<br>';
echo '<input class="btn btn-primary" id="expender" type="submit" value="Expender"></input>';
?>
<html>
<script>
    
    $('#expender').click(function(){
        var cantidad = document.getElementById('numero').value;

        $.ajax({ url: '../../ajax/expenderMedicamento.php',
            data: {'cantidad': cantidad},
            type: 'post',
            success: function(output) {
                alert(output);
                if(output == 1){// redireccion a atencionPaciente
                    window.location.href = 'medicamentoExpendido.php#';
                }                
            }
        });
    })
    
</script>
</html>