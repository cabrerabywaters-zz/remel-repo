<?php function mostrarPaciente($paciente)
{
 ?>
 
<form class="form-horizontal">
  <div class="control-group">
    <label class="control-label" for="Nombre">Nombre</label>
    <div class="controls">
      <input class="span5" type="text" id="Nombre" value="<?php echo $paciente['Nombre']; ?>" disabled>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="Fecha">Fecha de Nacimiento</label>
    <div class="controls">
      <input type="datetime" class="uneditable-input" id="Fecha" value="<?php echo $paciente['Fecha']; ?>" disabled>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="Peso">Peso</label>
    <div class="controls">
      <input type="text" class="span1" id="Peso" value="<?php echo $paciente['Peso']; ?>">
    </div>
  </div> 
  <div class="control-group">
    <label class="control-label" for="Direccion">Dirección</label>
    <div class="controls">
      <input type="text" class="span5" id="Direccion" value="<?php echo $paciente['Direccion']; ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="Comuna">Comuna</label>
    <div class="controls">
      <input type="text" class="span2" id="Comuna" value="<?php echo $paciente['Comuna']; ?>">
    </div>
   </div>
  <div class="control-group">
    <label class="control-label" for="Region">Region</label>
    <div class="controls">
      <input type="text" class="span1" id="Region" value="<?php echo $paciente['Region']; ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="Pais">Pais</label>
    <div class="controls">
      <input type="text" class="span1" id="Pais" value="<?php echo $paciente['Pais']; ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="Nacionalidad">Nacionalidad</label>
    <div class="controls">
      <input type="text" class="span1" id="Nacionalidad" value="<?php echo $paciente['Nacionalidad']; ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="Etnia">Etnia</label>
    <div class="controls">
      <input type="text" class="span2" id="Etnia" value="<?php echo $paciente['Etnia']; ?>" disabled>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="Telefono1 Telefono2 Telefono3">Telefonos</label>
    <div class="controls">
      <input type="text" class="span2" id="Telefono1" value="<?php echo $paciente['Telefono1']; ?>">
    </div>
    <div class="controls">
      <input type="text" class="span2" id="Telefono2" value="<?php echo $paciente['Telefono2']; ?>">
    </div>
    <div class="controls">
      <input type="text" class="span2" id="Tlefono3" value="<?php echo $paciente['Telefono3']; ?>">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="Isapre">Isapre</label>
    <div class="controls">
      <input type="text" class="span2" id="Isapre" value="<?php echo $paciente['Isapre']; ?>">
    </div>
  </div>
</form>


<?php } ?>
























?>