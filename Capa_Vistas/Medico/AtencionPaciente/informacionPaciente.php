  
<div class="accordion-heading">
  <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
  Información Personal del Paciente
  </a>
  </div>
  <div id="collapseOne" class="accordion-body collapse">
  <div class="accordion-inner">
   <center> <div style="width: 50%; ;"><form id="arbol" class="form-inline" >
    
    <div class="control-group">
    <label class="control-label" for="Nombre" ><strong>Nombre </strong> <br><input style="text-align:center;" class="span6" type="text" id="Nombre" value="<?php echo"".$paciente['Nombre']." ".$paciente['Apellido_Paterno']." ".$paciente['Apellido_Materno'].""; ?>" disabled></label>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="Fecha" > <strong>Fecha de Nacimiento </strong> <br> <input style="text-align:center;" type="datetime" class="span3 uneditable-input" id="Fecha" value="<?php echo $paciente['Fecha_Nac']; ?>" disabled></label>&nbsp
    <label class="control-label" for="Sexo"><strong>Sexo </strong> <br>  <input style="text-align:center;" type="text" class="span3" id="Sexo" value="<?php if($paciente['Sexo']=='1')
	{
		echo "Masculino";
	}
	else
	{
	echo "Femenino";	
	}; ?>" disabled></label>
    <br> <br>
    <label class="control-label" for="Peso"><strong>Peso [Kg]  </strong><br> <input style="text-align:center;" type="text" class="span3 edicion"  id="Peso" value="<?php echo $paciente['Peso']; ?>"></label>
    <label class="control-label" for="Altura"><strong>Altura [Cm] </strong><br><input style="text-align:center;" type="text" class="span3 edicion" id="Altura" value="<?php echo $paciente['altura']; ?>"></label>
    </div>
     <br> 
    <div class="control-group">
    <label class="control-label" for="Pais"><strong>País </strong> <br><input style="text-align:center;" type="text" class="span2" id="Pais" value="Chile" disabled></label>
    <label class="control-label" for="Region"><strong>Región </strong><br> <input style="text-align:center;" type="text" class="span2 inline edicion" id="Region" value="<?php echo $region['Nombre']; ?>"></label>
    <label class="control-label" for="Comuna"><strong>Comuna </strong> <br> <input style="text-align:center;" type="text" class="span2 inline edicion" id="Comuna" value="<?php echo $comuna['Nombre']; ?>"></label>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="Direccion"><strong>Dirección  </strong> <br> <input style="text-align:center;" type="text" class="span6 edicion" id="Direccion" value="<?php echo "".$paciente['Calle']." ".$paciente['Numero']." "; ?>"></label>
    </div>
 
    <div class="control-group">
    <label class="control-label" for="Nacionalidad"><strong>Nacionalidad  </strong><br>  <input style="text-align:center;" type="text" class="span3" id="Nacionalidad" value="<?php echo $paciente['Nacionalidad']; ?>" disabled></label>
    <label class="control-label" for="Etnia"><strong>Etnia </strong> <br> <input style="text-align:center;" type="text" class="span3" id="Etnia" value="<?php echo $etnia['Nombre']; ?>" disabled></label>
    </div>
       
    <div class="control-group">
    <label class="control-label" for="N_Celular N_Fijo"><strong>Teléfonos </strong> <br> <input style="text-align:center;" type="text" class="span3 edicion" id="N_Celular" value="<?php echo $paciente['N_Celular']; ?>">  <input style="text-align:center;" type="text" class="span3 edicion" id="N_Fijo" value="<?php echo $paciente['n_fijo']; ?>">  </label>
    </div>
     
    
    <div class="control-group">
    <label class="control-label" for="Isapre"><strong>Isapre </strong> <br> <input style="text-align:center;" type="text" class="span6" id="Isapre" value="<?php echo $prevision['Nombre']; ?>" disabled></label>
    </div>
    
    </form></div> </center>
      
      
      
  </div>
  </div>


<html>
<head>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.24/themes/base/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.8.24/jquery-ui.js"></script>
</head>
<body>
 
<center><button id="guardar" >Guardar</button></center>

</html>
<script> 
    $('#guardar').hide();
    $('.edicion').change(function() {
                $('#guardar').show();
    });
    $('#guardar').unbind('click').click(function() {
                $("#guardar").hide();
                var editado = $("#collapseOne").serialize();
                alert(editado);
                $.ajax({
                      url:'../../../ajax/actualizarDatosPaciente.php',
                      data: editado,
                      type: 'post',
                      success: function(output){
                        var data = jQuery.parseJSON(output);
                        
                        $('#Peso').html(data['peso']);
                        $('#Altura').html(data['altura']);
                        $('#Direccion').html(data['direccion']);
                        $('#Comuna').html(data['comuna']);
                        
                      }
                });
           });
</script>
