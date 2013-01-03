<?php 
include dirname(__FILE__)."/../../../Capa_Controladores/persona.php";
include dirname(__FILE__)."/../../../Capa_Controladores/paciente.php";
include dirname(__FILE__)."/../../../Capa_Controladores/medico.php";
$run=$_SESSION['RUTPaciente'];
$array1 = PacienteSeleccionIdPorRUN($run);
$array2 = PersonaSeleccionNombrePorRUN($run);

$arrayFinal = array_merge($array1[0], $array2[0]);
print_r($arrayFinal);
//Array ( [idPaciente] => 2 [Fecha_Ultima_Actualizacion] => 2012-12-27 09:43:55 [Nacionalidad] => Chilena [Peso] => 9.99 [Etnias_idEtnias] => 1 [Nombre] => Leonardo [Apellido_Paterno] => Hidalgo [Apellido_Materno] => Sepulveda [RUN] => 185415562 [Direccion_idDireccion] => 1 [sexo] => [n_celular] => 987654321 [Fecha_Nac] => 1993-09-09 )
 ?>
 
<form class="form-inline">
  <div class="control-group">
    <label class="control-label" for="Nombre">Nombre <input class="span5" type="text" id="Nombre" value="<?php echo"".$arrayFinal['Nombre']." ".$arrayFinal['Apellido_Paterno']." ".$arrayFinal['Apellido_Materno'].""; ?>" disabled></label>
  </div>
  <div class="control-group">
  <label class="control-label" for="Fecha">Fecha de Nacimiento  <input type="datetime" class="uneditable-input" id="Fecha" value="<?php echo $arrayFinal['Fecha_Nac']; ?>" disabled></label>
    <label class="control-label" for="Sexo">Sexo  <input type="text" class="span1" id="Sexo" value="<?php echo $arrayFinal['sexo']; ?>" disabled></label>
    <label class="control-label" for="Peso">Peso <input type="text" class="span1" id="Peso" value="<?php echo $arrayFinal['Peso']; ?>"></label>
  </div>
  <div class="control-group">
    <label class="control-label" for="Direccion">Dirección  <input type="text" class="span5" id="Direccion" value="<?php echo $paciente['Direccion']; ?>"></label>
  </div>
  <div class="control-group">
    <label class="control-label" for="Comuna">Comuna  <input type="text" class="input-small inline" id="Comuna" value="<?php echo $paciente['Comuna']; ?>"></label>
    <label class="control-label" for="Region">Region <input type="text" class="input-small inline" id="Region" value="<?php echo $paciente['Region']; ?>"></label>
    <label class="control-label" for="Pais">Pais <input type="text" class="span1" id="Pais" value="<?php echo $paciente['Pais']; ?>"></label>
  </div>
  <div class="control-group">
    <label class="control-label" for="Nacionalidad">Nacionalidad  <input type="text" class="span1" id="Nacionalidad" value="<?php echo $paciente['Nacionalidad']; ?>" disabled></label>
    <label class="control-label" for="Etnia">Etnia  <input type="text" class="span2" id="Etnia" value="<?php echo $paciente['Etnia']; ?>" disabled></label>
  </div>
  <div class="control-group">
    <label class="control-label" for="Telefono1 Telefono2 Telefono3">Telefonos  <input type="text" class="span2" id="Telefono1" value="<?php echo $paciente['Telefono1']; ?>">  <input type="text" class="span2" id="Telefono2" value="<?php echo $paciente['Telefono2']; ?>">  <input type="text" class="span2" id="Tlefono3" value="<?php echo $paciente['Telefono3']; ?>"></label>
  </div>
  <div class="control-group">
    <label class="control-label" for="Isapre">Isapre  <input type="text" class="span2" id="Isapre" value="<?php echo $paciente['Isapre']; ?>" disabled></label>
  </div>
</form>
























