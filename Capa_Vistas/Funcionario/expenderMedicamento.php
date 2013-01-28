<?php
include_once(dirname(__FILE__) . '/../../ajax/sessionCheck.php');
iniciarCookie();
verificarIP();
include(dirname(__FILE__) . "/../funcionarioHeader.php");
include(dirname(__FILE__) . "/../../Capa_Controladores/medicamento.php");

//buscar datos del medicamento
$datosMedicamento = Medicamento::BuscarMedicamentoPorId($_SESSION['medicamentoID']);
print_r($datosMedicamento);
echo '<br><br>';
print_r($_SESSION);
echo '<br>';
echo $datosMedicamento['Nombre_Comercial'];
echo '<br>';
echo '<img src="' . $datosMedicamento['Foto_Presentacion'] . '" width="200" height="200"></img>';
echo '<br>';
echo '<input type="text" id="cantidad" value="1">';
echo '<br>';
echo '<button class="btn btn-primary" onClick="expender()" type="submit"><strong>Expender</strong></button>';
?>

<script>
    
    function expender(){
        var cantidad = document.getElementById('cantidad').value;
        $.ajax({ url: '../../ajax/expenderMedicamento.php',
            data: {'cantidad': cantidad },
            type: 'post',
            success: function(output) {
                if(output == 1){// redireccion a atencionPaciente
                    window.location.href = 'medicamentoExpendido.php#';
                    
                }                
                else{    
                                    
                    $("#mensaje").html("<div class='alert alert-error'>La Clave no es correcta</div>");
                }
            }
        });

    }
    
</script>