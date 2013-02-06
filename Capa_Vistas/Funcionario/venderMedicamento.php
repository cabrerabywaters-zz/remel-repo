<?php ?>
<body>
<center>
    <div class="accordion-heading">

      <a class="btn btn-large btn-block" disabled="disabled" data-toggle="collapse" data-parent="#accordionF1" href="#collapseOne">
Venta de Medicamentos  
  </a>
  <div id="collapseOne" class="accordion-body collapse in">

    <div class="modal-body">
        <strong><p>Ingrese el Rut del Paciente</p></strong>
        <form class="form-search" id="busqueda" method="post" action="javascript:enviar()">
            <div class="input-append">
                <input type="text" class="span6 search-query" name="RUN" required  maxlength="15" pattern="^0*(\d{1,3}(\.?\d{3})*)\-?([\dkK])$">
                <button class="btn btn" type="submit">Buscar</button>
            </div>
        </form>
        <div id="atender" class="atender">
            <!-- aqui se muestra el paciente obtenido -->
        </div>
        <div id="clave" class="collapse" >
            <form id="verificacionClave" action="javascript:verificarClave()" method="post">
                <br>
                <strong>Ingrese Clave :</strong> <center> 
                    <input type="password" name="clave" required placeholder="Ingrese Clave Del Paciente"></center> 
                <div id="mensaje"></div>
                <input type="hidden"  name="hID" value=""/>
                <input type="hidden" name="hRUN" value=""/> 
                <div class="modal-footer">
                    
                    <button id="ingresar" class="btn btn-primary" type="submit"><strong>Ingresar</strong></button>
                </div>
            </form>

    </div>
        
</div>
      
  </div>
        
    </div>
    
</center>

</body>
<script>
    $('busqueda').validator();
    $('verificacionClave').validator();
    $('#myModal').on('show',function(){
        $('input[name="RUN"]').focus();
    })
    function enviar(){
        var postData = $('#busqueda').serialize();
        $.ajax({ 
            url: '../../ajax/jsonPaciente.php',
            data: postData,
            type: 'post',
            success: function(output) {
                var data = jQuery.parseJSON(output);
                nombre = data['Nombre'] + ' ' + data['Apellido_Paterno'] + ' ' + data['Apellido_Materno'];
                $("#atender").html("<a class='label label-info' id='"+data['Nombre']+"'>"+nombre+"</a>");
                $('input[name=hID]').val(data['idPaciente']);
                $('input[name=hRUN]').val(data['RUN']);
                $('#clave').collapse('show');
                $('input[name="clave"]').focus();
            }

        });// end ajax
    } // end funcion enviar
    function verificarClave(){
        /**
         * función que verifica la clave del paciente
         */
        var rut = $("input[name='hRUN']").val();
        var clave = $("input[name='clave']").val();
        var id = $("input[name='hID']").val();
        $.ajax({ url: '../../ajax/verificarClavePaciente.php',
            data: {'hRUN': rut,'clave': clave, 'hID': id},
            type: 'post',
            success: function(output) {
                if(output == 1){// redireccion a atencionPaciente
                    window.location.href = 'recetasCliente.php#';

                }
                else if(output == 0){ //mensaje de error
                    $("#mensaje").html("<div class='alert alert-error'>La Clave no es correcta</div>"); }
                else
                {    
                                    
                    $("#mensaje").html(output);
                }
                            
            }
        });
    }
       
</script>