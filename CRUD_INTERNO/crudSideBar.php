<?php

/*
 * Archivo que contiene el sidebar generado para el arreglo
 * $tablasDB que contiene cada una de las tablas de la DB agrupadas por vista
 * ej: vistaUsuarios => personas, funcionarios, etnias, etc
 */

$tablasDB = array(); //arreglo con las vistas de la DB

$tablasDB['Usuarios'] =
array( // arreglo con indice de tabla => nombreArchivo
    'Personas'=>'Personas',
    'Funcionarios'=>'Funcionarios',
    'Pinpass'=>'Pinpass',
    'Etnias'=>'Etnias',
    'Previsiones'=>'Previsiones',
    'Especialidades'=>'#',
    'Pinpass'=>'#',
    'SubEspecialidades'=>'#');

$tablasDB['InformacionPacientes']=
array( // arreglo con indice de tabla => nombreArchivo
    'TratamientoGes'=>'#',
    'TratamientoGesPaciente'=>'#',
    'Alergias'=>'#',
    'AlergiasPaciente'=>'#',
    'Condiciones'=>'#',    
    'CondicionesPaciente'=>'#');

$tablasDB['Ubicacion']=
array( // arreglo con indice de tabla => nombreArchivo
    'TipoInstituciones'=>'#',
    'PlazasInstitucion'=>'#',
    'Regiones'=>'regiones',
    'Provincias'=>'#',
    'Comunas'=>'#');

$tablasDB['Core']=
array(
    'TiposRecetas'=>'#'
);

$tablasDB['Vademecum']=
array(
    'ClasesTerapeuticas'=>'#',
    'SubClasesTerapeuticas'=>'#',
    'Laboratorios'=>'#',
    'Presentaciones'=>'#',
    'Unidades'=>'#',
    'PrincipiosActivos'=>'#',
);

$tablasDB['Logica']=
array(
   
);

?>
<div class="span2"> <!--Sidebar content-->
            <div class="accordion" id="accordion2">
<?php
echo "<div id='accordion'>";
foreach($tablasDB as $vista=>$tablas){
     echo "<h3 class='btn btn-primary btn-block'>$vista</h3><!-- $vista-->       
            <div>";
    foreach($tablas as $tabla=>$pagina){
        echo "<a class='btn btn-block btn-small' id='$pagina'>$tabla</a>
        ";
    }
    echo "</div><!-- end $vista -->
          ";
}
echo "</div>";
   ?>             
            </div>
    </div><!-- end sidebar -->