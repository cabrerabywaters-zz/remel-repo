
<button type="button" class="btn btn-block btn-large" data-toggle="collapse" data-target="#demo"><i class="icon-chevron-down icon-white"></i> Perfil Médico o Profesional</button>
<div id="demo" class="collapse" data-parent="#ingresoMedico">
    <div id="contenedor_lugares">    
        <?php
        /**
         * genero el listado de las instituciones desde el arreglo
         * de sesion instituciones (contiene todas las instituciones de 
         * el medico conectado
         */
        if (isset($_SESSION['lugares']) == "true") {
            $sucursales = $_SESSION['lugares'];

            foreach ($sucursales as $sucursal) {
                echo "<div idSucursal='" . $sucursal['RUT'] . "' nombreSucursal='" . $sucursal['Nombre'] . "' class='alert alert-success'><strong>" . $sucursal['Nombre'] . "</strong>";
                foreach ($sucursal['Lugares'] as $lugar) {
                    echo "<button class='btn btn-block lugar' type='button' idLugar='" . $lugar['idLugar_de_Atencion'] . "'>" . $lugar['Nombre'] . "</button>";
                }
                echo "</div>";
            }
        }//end if
        ?>
    </div>
    <script>
        /**
         * script que envía el valor de la institucion seleccionada
         * al archivo institucionesLog.php para ser guardado en la 
         * $_SESSION['institucionLog']
         */
        $("#contenedor_lugares .lugar").click(function(){
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
                        window.location.href = "Medico/doctorIndex.php";
                    }
                    else{
                        $('#mensaje').html("<span style='color: red'>No se guardó la Institucion en la sesion!</span>");
                    }
                }
            });//fin ajax
                                
                             
        });//fin click
                    
            
    </script>

</div>