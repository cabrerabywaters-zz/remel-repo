<?php
include_once(dirname(__FILE__) . '/../../ajax/sessionCheck.php');
iniciarCookie();
verificarIP();
include(dirname(__FILE__) . "/../funcionarioHeader.php");
include(dirname(__FILE__) . "/../../Capa_Controladores/medicamento.php");
?>
<div class="row-fluid">
    <div class="tab-content"><!-- contenido del panel 1-->
        <div class="tab-pane active img-rounded" id="tabVenderMedicamentos"><!-- tab Historial-->
<center>
            <div class="accordion-heading">
                <a class="btn btn-large btn-block in" disabled="disabled" data-toggle="collapse" data-parent="#accordion1" >
                    Expender Medicamento
                </a>
            </div>
            <div class="accordion-body">
                <div class="accordion-inner">


                    <?php
//buscar datos del medicamento
                    $datosMedicamento = Medicamento::BuscarMedicamentoPorId($_SESSION['medicamentoID']);
                    echo $datosMedicamento['Nombre_Comercial'];
                    echo '<br>';
                    echo '<img src="' . $datosMedicamento['Foto_Presentacion'] . '" width="200" height="200"></img>';
                    echo '<br>';
                    echo 'Cantidad: <input type="text" class="span1 search-query" id="numero" value="1">';
                    echo '<br>';
                    echo 'RUT Comprador: <input type="text" id="RUN" class="span2 search-query" onfocus="disableIngresar()" onblur="verificarRut(RUN)" name="RUN" required  maxlength="15" pattern="^0*(\d{1,3}(\.?\d{3})*)\-?([\dkK])$">';
                    echo '<br>';
                    echo 'Precio: ' . $datosMedicamento['Precio_Referencia_CLP'];
                    echo '<br>';
                    echo '<input class="btn btn-primary" disabled="disabled" id="expender" type="submit" value="Expender"></input>';
                    echo '<button id="volverMedicamentos" class="btn btn-primary" onClick="volverMedicamentos()" type="submit"><strong>Volver a Medicamentos</strong></button>';
                    echo '<br>';
                    echo '<div id="mensaje">';
                    ?>
                </div>        
            </div><!-- fin accordion --></center></div>
        </div>
        <div class="tab-pane img-rounded" id="tabVerArsenal"><!-- tab Historial-->

            <!-- <div class="accordion" id="accordionF2"><!-- accordion historial -->
            <!-- <div class="accordion-group"><!-- informacion personal del paciente-->
            <?php
            // muestra los detalles de paciente
            include("verArsenal.php");
            ?>
        </div><!-- informacion personal del paciente-->
        <!--   </div>
       </div>-->
    </div>

</div>
<script>
    
    $('#expender').click(function(){
        var cantidad = document.getElementById('numero').value;
        var compradorRUT = document.getElementById('RUN').value;
        $.ajax({ url: '../../ajax/expenderMedicamento.php',
            data: {'cantidad': cantidad, 'compradorRUT': compradorRUT},
            type: 'post',
            success: function(output) {
                if(output == 1){// redireccion a atencionPaciente
                    window.location.href = 'medicamentoExpendido.php#';
                }                
            }
        });
    })
    function verificarRut( Objeto )
    {
        var tmpstr = "";
        $('#mensaje').html("");
        var intlargo = Objeto.value
        if (intlargo.length> 0)
        {
            crut = Objeto.value
            largo = crut.length;
            if ( largo <2 )
            {
                $('#mensaje').html("<span class='alert alert-danger'><small><strong>El rut ingresado no es válido</strong></small></span>");
                Objeto.focus()
                return false;
            }
            for ( i=0; i <crut.length ; i++ )
            if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' )
            {
                tmpstr = tmpstr + crut.charAt(i);
            }
            rut = tmpstr;
            crut=tmpstr;
            largo = crut.length;
	
            if ( largo> 2 )
                rut = crut.substring(0, largo - 1);
            else
                rut = crut.charAt(0);
	
            dv = crut.charAt(largo-1);
	
            if ( rut == null || dv == null )
                return 0;
	
            var dvr = '0';
            suma = 0;
            mul  = 2;
	
            for (i= rut.length-1 ; i>= 0; i--)
            {
                suma = suma + rut.charAt(i) * mul;
                if (mul == 7)
                    mul = 2;
                else
                    mul++;
            }
	
            res = suma % 11;
            if (res==1)
                dvr = 'k';
            else if (res==0)
                dvr = '0';
            else
            {
                dvi = 11-res;
                dvr = dvi + "";
            }
            if ( dvr != dv.toLowerCase() )
            {
                $('#expender').attr('disabled','disabled');
                $('#mensaje').html("<span class='alert alert-danger'>El rut ingresado no es válido</span>");
                Objeto.focus();
                return false;
            }
            //alert('El Rut Ingresado es Correcto!')
            $('#expender').removeAttr('disabled');
            return true;
        }
    }                   
    function disableIngresar(){
                    
        $('#expender').attr('disabled','disabled');

                    
    }
    function volverMedicamentos(){
        window.location.href = 'recetasCliente.php#';
    }


</script>
