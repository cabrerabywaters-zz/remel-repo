<!-- moduloReceta.php -->
<!--
Contiente el modulo de receta en la atencion paciente
incluyendo el buscador predictivo de medicamento
y el popup que muestra el detalle del medicamento
-->
<div class="accordion-heading">
    <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion3" href="#collapseTwo2">
        Receta
    </a>
</div>
<div id="collapseTwo2" class="accordion-body collapse">
    <div class="accordion-inner">
        <div class="modal-body img-rounded">
            <strong><p>Ingrese nombre del medicamento</p></strong>
            <form class="form-search">
                <div class="input-append">
                    <input type="text" id="Medicamentos" class="span2 search-query">
                    <button type="button" id="boton_medicamentos" class="btn" data-toggle="collapse" data-target="#informacion2">Buscar</button>  <br>
                    <div id="informacion2" class="collapse" > <span id="info2" class="badge badge-info">  <a  href="#myModal2" id='ID' data-toggle="modal"> Paracetamol </a></span></div>
                </div>
            </form>
        </div>
        
        
        <a class="btn btn-warning span2 offset5"><strong><br><i class="icon-check icon-white"></i> Emitir Receta<br></strong><br></a>
    </div>
</div>




<div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Información del Medicamento</h3>
    </div>
    <div class="modal-body">
        <strong><p>Paracetamol</p></strong>
        <div class="span3"> <img src="../../../imgs/paracetamol.jpg" style="width:60%" ></div>
        <p>El paracetamol (DCI) o acetaminofén (acetaminofeno) es un fármaco con propiedades analgésicas, sin propiedades antiinflamatorias clínicamente significativas. Actúa inhibiendo la síntesis de prostaglandinas, mediadores celulares responsables de la aparición del dolor. Además, tiene efectos antipiréticos.</p>
        <p>Cantidad: </p>
        <input type="text" placeholder="Indique Cantidad">
        <p>Comentario: </p>
        <center> <textarea rows="2" style="width:90%"></textarea></center>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <a href="atendiendo_paciente.php" role="button" class="btn btn-warning">Recetar</a>
    </div>
</div><!-- fin popup informacion del medicamento -->

<!--JS de funcion verificacion de contraindicaciones-->
<script>
   $(function(){
    $("#Medicamentos").autocomplete({
                                source: function( request, response ) {
                                    $.ajax({
                                        url: "../../../ajax/autocompleteMedicamento.php",
                                        data: {
                                            name_startsWith: request.term
                                        },
                                        type: "post",
                                        success: function( data ) {
                                            alert(data);
                                            $('#boton_medicamentos').removeAttr('disabled');
                         
                        
                                            var output = jQuery.parseJSON(data);
                       
                                            response( $.map( output, function( item ) {
                                                return {
                                                    label: item
                                                    // value: item.Nombre
                                                }
                                            }));
                                        }
                    
                                    });
                                },
                                minLength: 2,
                                 open: function() {
                                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
                                },
                                close: function() {
                                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                                }
                            });
   });
</script>