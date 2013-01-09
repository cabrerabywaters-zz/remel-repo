  
<div class="accordion-heading">
  <a class="btn btn-large btn-block " data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
  Información Personal del Paciente
  </a>
  </div>
  <div id="collapseOne" class="accordion-body collapse">
  <div class="accordion-inner">
   <center> <div style="width: 50%; ;"><form class="form-inline" >
    
    <div class="control-group">
    <label class="control-label" for="Nombre" ><strong>Nombre </strong> <br><input style="text-align:center;" class="span6"  type="text" id="Nombre" value="<?php echo"".$paciente['Nombre']." ".$paciente['Apellido_Paterno']." ".$paciente['Apellido_Materno'].""; ?>" disabled></label>
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
    <label class="control-label" for="Peso"><strong>Peso [Kg]  </strong><br> <input style="text-align:center;" type="text" class="span3" id="Peso" value="<?php echo $paciente['Peso']; ?>" disabled></label>
    <label class="control-label" for="Altura"><strong>Altura [Cm] </strong><br><input style="text-align:center;" type="text" class="span3" id="Altura" value="<?php echo $paciente['altura']; ?>" disabled></label>
    </div>
     <br> 
    <div class="control-group">
    <label class="control-label" for="Pais"><strong>País </strong> <br><input style="text-align:center;" type="text" class="span2" id="Pais" value="Chile" disabled></label>
    <label class="control-label" for="Region"><strong>Región </strong><br> <input style="text-align:center;" type="text" class="span2 inline" id="Region" value="<?php echo $region['Nombre']; ?>" disabled></label>
    <label class="control-label" for="Comuna"><strong>Comuna </strong> <br> <input style="text-align:center;" type="text" class="span2 inline" id="Comuna" value="<?php echo $comuna['Nombre']; ?>" disabled></label>
    </div>
    
    <div class="control-group">
    <label class="control-label" for="Direccion"><strong>Dirección  </strong> <br> <input style="text-align:center;" type="text" class="span6" id="Direccion" value="<?php echo "".$paciente['Calle']." ".$paciente['Numero']." "; ?>" disabled></label>
    </div>
 
    <div class="control-group">
    <label class="control-label" for="Nacionalidad"><strong>Nacionalidad  </strong><br>  <input style="text-align:center;" type="text" class="span3" id="Nacionalidad" value="<?php echo $paciente['Nacionalidad']; ?>" disabled></label>
    <label class="control-label" for="Etnia"><strong>Etnia </strong> <br> <input style="text-align:center;" type="text" class="span3" id="Etnia" value="<?php echo $etnia['Nombre']; ?>" disabled></label>
    </div>
       
    <div class="control-group">
    <label class="control-label" for="N_Celular N_Fijo"><strong>Teléfonos </strong> <br> <input style="text-align:center;" type="text" class="span3" id="N_Celular" value="<?php echo $paciente['N_Celular']; ?>" disabled>  <input style="text-align:center;" type="text" class="span3" id="N_Fijo" value="<?php echo $paciente['n_fijo']; ?>" disabled>  </label>
    </div>
     
    <div class="control-group">
    <label class="control-label" for="Isapre"><strong>Isapre </strong> <br> <input style="text-align:center;" type="text" class="span6" id="Isapre" value="<?php echo $prevision['Nombre']; ?>" disabled></label>
    </div>
    
    </form></div> </center>
  </div>
  </div>























