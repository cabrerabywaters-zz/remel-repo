<button type="button" class="btn btn-block btn-large" data-toggle="collapse" data-target="#funcionario"><i class="icon-chevron-down icon-white"></i> Ingresar como Funcionario</button>
<div id="funcionario" class="collapse" data-parent="#ingresoFuncionario">
    <div id="contenedor_lugares_funcionario">    
        <?php
        /**
         * genero el listado de las instituciones desde el arreglo
         * de sesion instituciones (contiene todas las instituciones de 
         * el medico conectado
         */
        if (isset($_SESSION['lugaresFuncionario']) == "true") {
            $sucursalesFuncionario = $_SESSION['lugaresFuncionario'];

            foreach ($sucursalesFuncionario as $sucursal) {
                echo "<div idSucursal='" . $sucursal['RUT'] . "Funcionario' nombreSucursal='" . $sucursal['Nombre'] . "Funcionario' class='alert alert-success'><strong>" . $sucursal['Nombre'] . "</strong>";
                foreach ($sucursal['Lugares'] as $lugar) {
                    echo "<button class='btn btn-block lugar' type='button' idLugar='" . $lugar['idLugar_de_Atencion'] . "Funcionario'>" . $lugar['Nombre'] . "</button>";
                }
                echo "</div>";
            }
        }//end if
        ?>
    </div>
</div>
<script>
    /**
     * script que envía el valor de la institucion seleccionada
     * al archivo institucionesLog.php para ser guardado en la 
     * $_SESSION['institucionLog']
     */
    $("#contenedor_lugares_funcionario .lugar").click(function(){
        var postData = { //JSON con la info de la institucion que se envia
            'idLugar': $(this).attr('idLugar'),
            'nombreLugar': $(this).html(),
            'rutSucursal': $(this).parent().attr('idSucursal'),
            'nombreSucursal': $(this).parent().attr('nombreSucursal') 
        };
	        
        $.ajax({ url: '../ajax/lugarLog.php',
            data: postData,
            type: 'post',
            async: 'false',
            success: function(output){                          
                /**
                 * funcion que verifica el output de la consulta
                 * si es 1 re-dirige a la pagina correspondiente
                 * si es 0 muestra que la institucion no está bien seleccionada
                 */
                                        
                if(output == '1'){
                    window.location.href = "Funcionario/funcionarioIndex.php";
                }
                else{
                    $('#mensaje').html("<span style='color: red'>No se guardó la Institucion en la sesion!</span>");
                }
            }
        });//fin ajax
                                
                             
    });//fin click
                    
            
</script>