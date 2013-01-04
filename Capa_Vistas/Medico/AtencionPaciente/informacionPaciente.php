<?php 
print_r($arrayFinal);



?>

<form class="form-inline">
  <div class="control-group">
    <label class="control-label" for="Nombre">Nombre <input class="span5" type="text" id="Nombre" value="<?php echo"".$arrayFinal['Nombre']." ".$arrayFinal['Apellido_Paterno']." ".$arrayFinal['Apellido_Materno'].""; ?>" disabled></label>
  </div>
  <div class="control-group">
  <label class="control-label" for="Fecha">Fecha de Nacimiento  <input type="datetime" class="uneditable-input" id="Fecha" value="<?php echo $arrayFinal['Fecha_Nac']; ?>" disabled></label>
    <label class="control-label" for="Sexo">Sexo  <input type="text" class="span2" id="Sexo" value="<?php if($arrayFinal['Sexo']=='1')
	{
		echo "Masculino";
	}
	else
	{
	echo "Femenino";	
	}; ?>" disabled></label>
    <label class="control-label" for="Peso">Peso <input type="text" class="span1" id="Peso" value="<?php echo $arrayFinal['Peso']; ?>"></label>
    <label class="control-label" for="Altura">Altura <input type="text" class="span1" id="Altura" value="<?php echo $arrayFinal['Altura']; ?>"></label>
  </div>
    <div class="control-group">
    <label class="control-label" for="Pais">Pais <input type="text" class="span1" id="Pais" value="Chile" disabled></label>
    <label class="control-label" for="Region">Region <input type="text" class="input-small inline" id="Region" value="<?php echo $paciente['Region']; ?>"></label>
    <label class="control-label" for="Comuna">Comuna  <input type="text" class="input-small inline" id="Comuna" value="<?php echo $paciente['Comuna']; ?>"></label>
    
    
  </div>
  <div class="control-group">
    <label class="control-label" for="Direccion">Dirección  <input type="text" class="span5" id="Direccion" value="<?php echo $paciente['Direccion']; ?>"></label>
  </div>

  <div class="control-group">
    <label class="control-label" for="Nacionalidad">Nacionalidad  <input type="text" class="span2" id="Nacionalidad" value="<?php echo $arrayFinal['Nacionalidad']; ?>" disabled></label>
    <label class="control-label" for="Etnia">Etnia  <input type="text" class="span2" id="Etnia" value="<?php echo $paciente['Etnia']; ?>" disabled></label>
  </div>
  <div class="control-group">
    <label class="control-label" for="N_Celular N_Fijo">Telefonos  <input type="text" class="span2" id="N_Celular" value="<?php echo $arrayFinal['N_Celular']; ?>">  <input type="text" class="span2" id="N_Fijo" value="<?php echo $arrayFinal['N_Fijo']; ?>">  </label>
  </div>
  <div class="control-group">
    <label class="control-label" for="Isapre">Isapre  <input type="text" class="span2" id="Isapre" value="<?php echo $paciente['Isapre']; ?>" disabled></label>
  </div>
</form> 
























