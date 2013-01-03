
 
<form class="form-inline">
  <div class="control-group">
    <label class="control-label" for="Nombre">Nombre <input class="span5" type="text" id="Nombre" value="<?php echo"".$paciente['Nombre']." ".$paciente['Apellido_Paterno']." ".$paciente['Apellido_Materno'].""; ?>" disabled></label>
  </div>
  <div class="control-group">
  <label class="control-label" for="Fecha">Fecha de Nacimiento  <input type="datetime" class="uneditable-input" id="Fecha" value="<?php echo $paciente['Fecha_Nac']; ?>" disabled></label>
    <label class="control-label" for="Sexo">Sexo  <input type="text" class="span1" id="Sexo" value="<?php echo $paciente['Sexo']; ?>" disabled></label>
    <label class="control-label" for="Peso">Peso <input type="text" class="span1" id="Peso" value="<?php echo $paciente['Peso']; ?>"></label>
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
    <label class="control-label" for="Nacionalidad">Nacionalidad  <input type="text" class="span2" id="Nacionalidad" value="<?php echo $paciente['Nacionalidad']; ?>" disabled></label>
    <label class="control-label" for="Etnia">Etnia  <input type="text" class="span2" id="Etnia" value="<?php echo $paciente['Etnia']; ?>" disabled></label>
  </div>
  <div class="control-group">
    <label class="control-label" for="N_Celular N_Fijo">Telefonos  <input type="text" class="span2" id="N_Celular" value="<?php echo $paciente['N_Celular']; ?>">  <input type="text" class="span2" id="N_Fijo" value="<?php echo $paciente['N_Fijo']; ?>">  </label>
  </div>
  <div class="control-group">
    <label class="control-label" for="Isapre">Isapre  <input type="text" class="span2" id="Isapre" value="<?php echo $paciente['Isapre']; ?>" disabled></label>
  </div>
</form>
























