    <div class="accordion-heading">
      <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo" id="infomedica">
        Información Médica Registrada
      </a>
        <!-- despliega los datos medicos del paciente alergias y condiciones con la posibilidad de ingresar nuevas alergias y condiciones-->
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
          <div class="alert alert-info"><small>Ultima Actualizacion: 
                    <strong><span id="ultimoLogInfoMedica">
                 <?php include_once(dirname(__FILE__) . '/../../../ajax/mostrarUltimoLogInfoMedica.php'); ?>              
                    </span></strong></small></div>
          <div id="estadoInfoMedica"></div>
          <div class="row-fluid">
 		<div class="span6" id="divAlergias">
 			 <center>
             
             

 <table class="table table-bordered table-hover">
  				 <thead>
                     <tr>
                     <th colspan="2" style="background: rgb(176,212,227); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(176,212,227,1) 0%, rgba(136,186,207,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(176,212,227,1)), color-stop(100%,rgba(136,186,207,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b0d4e3', endColorstr='#88bacf',GradientType=0 ); /* IE6-9 */
"><center><h4>Alergias / Intolerancias</h4></center></th>                 
                    </tr>
                    <tr>
                    <th><center>Tipo</center></th>
                    <th ><center>Nombre de Alergia</center></th>
                    </tr>
                </thead>
   <tbody>

<?php 

foreach ($tiposAlergias as $datos => $dato){
	   echo '<tr  idTipo="'.$dato['IdTipo'].'">';
                echo '<td  class="tipoAlergia" rowspan="'.$dato['Cantidad'].'">';
                echo "<center>".$dato['Tipo']."</center>";
				echo '</td>';
			$idTipo=$dato['IdTipo'];
           $alergias=Paciente::R_AlergiaPaciente($idPaciente,$idTipo);
		   $contador=0;
		   foreach($alergias as $value => $info)
		   {
			   if($contador==0)
			   {
			   echo '<td idAlergias="'.$info['IdAlergia'].'" idTipo="'.$dato['IdTipo'].'">';			   
			   echo "<button type='button' class='close' data-dismiss='alert'>×</button><center>".$info['Nombre']."</center>";
			   echo "</td>";
			   echo"</tr>";
			   }
			  else
			  {
			   echo"<tr>";
			   echo '<td idAlergias="'.$info['IdAlergia'].'">';			   
			   echo "<button type='button' class='close' data-dismiss='alert'>×</button><center>".$info['Nombre']."</center>";
			   echo "</td>";
			   echo"</tr>";
			  }
			    $contador++;	   	 
		   }
		  echo" </tr>";
	   } 
?>	   
	</tbody>		   
			   
               
               
            </table> 

			
  				
 				<form class="form-search" method="post"> 
  			 <select style="text-align:center;" type="text" class="inline edicion" id="Alergias">
        
        
<?php  
  include_once("../../../Capa_Controladores/alergia.php");
    
    $arrayAlergia = Alergia::BuscarAlergia($_SESSION['idPaciente']);
    
  echo "
      <option value='0' idTipo='0'>Ver todas las alergias</option>";  
  foreach ($arrayAlergia as $campo=>$valor){
    
    echo "
        <option tipo='".$valor['Tipo']."' value='".$valor['idAlergia']."' idTipo='".$valor['idTipo']."'>".$valor['Nombre'] ."</option>";
    
  }
?>  
        
          </select>

<div class="input-append">                        
<input id="alergias_seleccionadas" type="text" idAlergia="0">                             
<button class="btn" type="button" id="boton_alergias" disabled="disabled">Añadir</button>
</div>
                                </form>

</center></div>
<div class="span6" id="condiciones"> <center>
  <table class="table table-bordered table-hover">
   <thead>
                     <tr>
                     <th style="background: rgb(176,212,227); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(176,212,227,1) 0%, rgba(136,186,207,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(176,212,227,1)), color-stop(100%,rgba(136,186,207,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(176,212,227,1) 0%,rgba(136,186,207,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b0d4e3', endColorstr='#88bacf',GradientType=0 ); /* IE6-9 */
"><center><h4>Condiciones</h4></center></th>                      
                    </tr>
                </thead>
                <tbody>

  <?php 
  if(empty($condiciones)){
      echo "<tr class='sinCondiciones warning'><td><center>El paciente no tiene Condiciones registradas</center></td></tr>";
  }
  else{
  foreach ($condiciones as $datos => $dato){
	echo '<tr idCondicion="'.$dato['idCondiciones'].'">';
	echo "<td><button type='button' class='close' data-dismiss='alert'>×</button><center>".$dato['Nombre']."</center></td>";
	echo "</tr>";   
	   
   }} ?>
                </tbody>
</table></center><center>
    
			<form class="form-search" method="post">
			<select style="text-align:center;" type="text" class="edicion" id="Condiciones_select">
                        
                        <?php  
                          include_once("../../../Capa_Controladores/condicion.php");

                            $arrayCondicion = Condicion::Seleccionar("order by Nombre ASC");

                          echo "
                              <option value='0'>Ver todas las condiciones</option>";  
                          foreach ($arrayCondicion as $campo=>$valor){

                          echo "
                              <option value='".$valor['idCondiciones']."'>". $valor['Nombre'] ."</option>";

                          }
                        ?>  
        
                        </select>
                            <div class="input-append">
  				<input id="Condiciones" type="text">
  				<button class="btn" type="button" id="boton_condiciones" disabled="disabled">Añadir</button>
                            </div>
                        </form></center>
		  </div></div> 
  		</div>
      </div>
<script>
$('#infomedica').click(function(){


 $('html, body').animate({
    scrollTop: $("#infomedica").offset().top
    }, 500); // animate
})
</script>
<script>
$('#Alergias').change(function(){
    var valor = $('#Alergias').val();
    var tipo = $('#Alergias').children(":selected").attr("idTipo");
    var alergia = $('#Alergias option=[value="'+valor+'"]').text();
	var nombreTipo = $('#Alergias').children(":selected").attr("Tipo");
    
    if( valor != 0){ 
       $('#alergias_seleccionadas').val(alergia).removeAttr('idAlergia').attr('idAlergia',valor);
       $('#alergias_seleccionadas').attr('idTipo',tipo);
       $('#alergias_seleccionadas').attr('Tipo',nombreTipo);
       $('#boton_alergias').removeAttr('disabled');
    }
    else{
        $('#alergias').val('').removeAttr('idAlergia idTipo');
    }
       
}); //end change
</script><!-- droptlist alergias -->
<script>
$('#Condiciones_select').change(function(){
    var valor = $('#Condiciones_select').val();
    var tipo = $('#Condiciones_select').val();
    var condicion = $('#Condiciones_select option=[value="'+valor+'"]').text();
    
        if( valor != 0){
       $('#Condiciones').val(condicion).removeAttr('idCondicion').attr('idCondicion',valor);
       $('#boton_condiciones').removeAttr('disabled');
        }
        else{
        $('#Condiciones').val('').removeAttr('idCondicion');
    }
}); //end change
</script><!-- droplist condiciones -->
<script>
$( "#alergias_seleccionadas" ).autocomplete({
                                /**
                             * esta función genera el autocomplete para el campo de diagnostico (input)
                             * al seleccionar y escribir 2 letras se ejecuta el ajax
                             * busca en la base de datos en el archivo autocompleteDiagnostico.php
                             * el jSon correspondiente a las coincidencias
                             * 
                             * Funcion select que ejecutará una accion cuando se devuelva
                             */        
                         source: function( request, response ){
                                	 
								$.ajax({
                                    url: "../../../ajax/autocompleteAlergias.php",
                                    data: {
                                        name_startsWith: request.term
    										                                
									},
									
                                    type: "post",
                                    success: function( data ){
                                        var output = jQuery.parseJSON(data); 
										              
                                        response( $.map( output, function( item ) {
                                           return {
											   
                                               label: item.Nombre
                                              ,idAlergia : item.idAlergia
											  ,idTipo : item.idTipo
											  ,Sintomas : item.Sintomas
											  ,Tipo : item.Tipo
											  
                                            }
                                        })//end map
                                        );  // end response
                                    }//end success

                                });//end ajax 
							}, // end source
                           select: function(event, ui){
							   
                            var ID = ui.item.idAlergia
							var idTipo = ui.item.idTipo
							var Tipo = ui.item.Tipo
							var Sintomas = ui.item.Tipo
							$("#boton_alergias").removeAttr('disabled');
							$("#alergias_seleccionadas").removeAttr('idAlergia').removeAttr('idTipo').removeAttr('nombreTipo').attr('idAlergia',ID).attr('idTipo',idTipo).attr('Tipo',Tipo).attr('Sintomas',Sintomas);
							},
                           minLength: 2,
                           open: function() {
                                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
                                }, //end open
                           close: function() {
                                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                                } //end close
		                        });//autocomplete ALergias
</script><!-- autocomplete Alergias -->
<script>
$("#boton_alergias").click(function(){
var idAlergia = $("#alergias_seleccionadas").attr('idAlergia');
var idTipo = $("#alergias_seleccionadas").attr('idTipo');
var Tipo = $("#alergias_seleccionadas").attr('Tipo');
var Sintomas = $("#alergias_seleccionadas").attr('Sintomas');
var nombreAlergia = $("#alergias_seleccionadas").val()
$.ajax({
		url: "../../../ajax/agregarAlergia.php",
		data: {"idAlergia":idAlergia},
		type: "post",
		async:false,
		success: function(output){
		$("#divAlergias tbody").append('<tr><td idtipo"'+idTipo+'"><center>'+Tipo+'</center></td><td idAlergias="'+idAlergia+'"><button type="button" class="close" data-dismiss="alert">×</button><center>'+nombreAlergia+'</center></td></tr>');
		$('#estadoInfoMedica').html('').html('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><center><strong>Alergia añadida correctamente!</strong></center></div>');
                /*
                *AJAX que retorna la fecha de la ultima modificación hecha al paciente
                */
                $.ajax({
                                url: '../../../ajax/mostrarUltimoLogInfoMedica.php',
                                type: 'post',
                                success:function(output){
                                   $('#ultimoLogInfoMedica').html('').html(output); 
                                }//end success
                            })// end ajax
                
                /*
		* Funcion que asigna el comportamiento de borrado del elemento
		*/
		$("#divAlergias .close").click(function(){
			   var idAlergia = $(this).parent().attr('idAlergias');
			   var tr = $(this).parent().parent();
			  
			   //ajax que borra la alergia respectiva del paciente
			   $.ajax({
				 url: '../../../ajax/eliminarAlergia.php',
				 type:'post',
				 data: { "idAlergia" : idAlergia},
				 success: function(output){
					
					if(tr.children('.tipoAlergia').attr('rowspan')==1){
						tr.remove();
						}
					else{
						var cantidad = tr.children('.tipoAlergia').attr('rowspan')
						tr.children('.tipoAlergia').removeAttr('rowspan').attr('rowspan',cantidad-1)
						}	
					
                                        
                                        $('#estadoInfoMedica').html('').html('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><center><strong>Alergia eliminada correctamente!</strong></center></div>');
                                        /*
                                        *AJAX que retorna la fecha de la ultima modificación hecha al paciente
                                        */
                                        $.ajax({
                                            url: '../../../ajax/mostrarUltimoLogInfoMedica.php',
                                            type: 'post',
                                            success:function(output){
                                               $('#ultimoLogInfoMedica').html('').html(output); 
                                            }//end success
                                        })// end ajax
                                        
					
				 
				 }//end success
			   });//end ajax
			});//end click
		}//end succes

});//end ajax
$("#boton_alergias").attr('disabled',"disable");
$("#alergias_seleccionadas").attr("value","");
});//end click
</script><!-- agregar alergias -->
<script>
$("#divAlergias .close").click(function(){
   var idAlergia = $(this).parent().attr('idAlergias');
   var tr = $(this).parent().parent();
   
   //ajax que borra la alergia respectiva del paciente
   $.ajax({
     url: '../../../ajax/eliminarAlergia.php',
     type:'post',
     data: { "idAlergia" : idAlergia},
     success: function(output){
        
		if(tr.children('.tipoAlergia').attr('rowspan')==1){
			tr.remove();
			}
		else{
			var cantidad = tr.children('.tipoAlergia').attr('rowspan')
			tr.children('.tipoAlergia').removeAttr('rowspan').attr('rowspan',cantidad-1)
			}	
		$('#estadoInfoMedica').html('').html('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><center><strong>Alergia eliminada correctamente!</strong></center></div>');
                /*
                *AJAX que retorna la fecha de la ultima modificación hecha al paciente
                */
                $.ajax({
                    url: '../../../ajax/mostrarUltimoLogInfoMedica.php',
                    type: 'post',
                    success:function(output){
                       $('#ultimoLogInfoMedica').html('').html(output); 
                    }//end success
                })// end ajax
		
     
     }//end success
   });//end ajax
});//end click
</script><!-- Eliminar Alergia-->
<script>
$( "#Condiciones" ).autocomplete({
                                /**
                             * esta función genera el autocomplete para el campo de diagnostico (input)
                             * al seleccionar y escribir 2 letras se ejecuta el ajax
                             * busca en la base de datos en el archivo autocompleteDiagnostico.php
                             * el jSon correspondiente a las coincidencias
                             * 
                             * Funcion select que ejecutará una accion cuando se devuelva
                             */        
                          source: function( request, response ){
                                	 
								$.ajax({
                                    url: "../../../ajax/autocompleteCondiciones.php",
                                    data: {
                                        name_startsWith: request.term
    										                                
									},
									
                                    type: "post",
                                    success: function( data ){
                                        var output = jQuery.parseJSON(data); 
										              
                                        response( $.map( output, function( item ) {
                                           return {
                                               label: item.Nombre
                                              ,id3 : item.idCondiciones
                                            }
                                        })//end map
                                        );  // end response
                                    }//end success

                                });//end ajax 
							}, // end source
                           select: function(event, ui){
                            var idCondicion = ui.item.id3
							$("#boton_condiciones").removeAttr('disabled');
							$('#Condiciones').removeAttr('idCondicion').attr('idCondicion',idCondicion);
							},
                           minLength: 2,
                           open: function() {
                                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
                                }, //end open
                           close: function() {
                                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                                } //end close
		                        });//autocompleteDiagnosticos
</script><!-- autocomplete condiciones -->
<script>
$("#boton_condiciones").click(function(){
var idCondicion = $("#Condiciones").attr('idcondicion')
var nombreCondicion = $("#Condiciones").val()

            $.ajax({
		url: "../../../ajax/agregarCondicion.php",
                type: "post",
		data: {"idCondicion":idCondicion},
		async:false,
		success: function(output){ 
                if($('.sinCondiciones').length == 1){
                    $('.sinCondiciones').remove();
                }   
		$('#condiciones tbody').append('<tr idCondicion="'+idCondicion+'"><td><button type="button" class="close" data-dismiss="alert">×</button><center>'+nombreCondicion+'</center></td></tr>');
		$('#estadoInfoMedica').html('').html('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><center><strong>Condición añadida correctamente!</strong></center></div>');
                
                /*
                *AJAX que retorna la fecha de la ultima modificación hecha al paciente
                */
                $.ajax({
                                url: '../../../ajax/mostrarUltimoLogInfoMedica.php',
                                type: 'post',
                                success:function(output){
                                   $('#ultimoLogInfoMedica').html('').html(output); 
                                }//end success
                            })// end ajax
        
              }//end success
            });//end ajax

        $("#boton_condiciones").attr('disabled',"disabled");
        
        $("#condiciones .close").unbind('').on("click", function(){
        var idCondicion = $(this).parent().parent().attr('idCondicion');  
           //ajax que borra la condicion respectiva del paciente
           $.ajax({
             url: '../../../ajax/eliminarCondicion.php',
             type:'post',
             data: { "idCondicion" : idCondicion},
             success: function(output){
                 
                $(this).parent().parent().remove(); 
                if($('#condiciones .close').length == 0){ // si ya no quedan condiciones
                    $('#condiciones tbody').prepend("<tr class='sinCondiciones warning'><td><center>El paciente no tiene Condiciones registradas</center></td></tr>")  
                }        
                $('#estadoInfoMedica').html('').html('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><center><strong>Condición eliminada correctamente!</strong></center></div>');
                        /*
                        *AJAX que retorna la fecha de la ultima modificación hecha al paciente
                        */
                        $.ajax({
                                url: '../../../ajax/mostrarUltimoLogInfoMedica.php',
                                type: 'post',
                                success:function(output){
                                   $('#ultimoLogInfoMedica').html('').html(output); 
                                }//end success
                            })// end ajax
              
      
  
              }//end success
           });//end ajax
});//end click

$("#Condiciones").attr("value","");
});//end click
</script><!-- agregar condiciones -->
<script>
$("#condiciones .close").unbind('').on("click", function(){
   var idCondicion = $(this).parent().parent().attr('idCondicion');  
   //ajax que borra la alergia respectiva del paciente
   $.ajax({
     url: '../../../ajax/eliminarCondicion.php',
     type:'post',
     data: { "idCondicion" : idCondicion},
     success: function(output){
        
        $(this).parent().parent().remove(); 
        if($('#condiciones .close').length == 0){ // si ya no quedan condiciones
          
          $('#condiciones tbody').prepend("<tr class='sinCondiciones'><td><center>El paciente no tiene Condiciones registradas</center></td></tr>")  
        }        
        $('#estadoInfoMedica').html('').html('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a><center><strong>Condición eliminada correctamente!</strong></center></div>');
        
               /*
                *AJAX que retorna la fecha de la ultima modificación hecha al paciente
                */
                $.ajax({
                                url: '../../../ajax/mostrarUltimoLogInfoMedica.php',
                                type: 'post',
                                success:function(output){
                                   $('#ultimoLogInfoMedica').html('').html(output); 
                                }//end success
                            })// end ajax
        
	 }//end success
   });//end ajax
});//end click
</script><!-- eliminar condicion -->
