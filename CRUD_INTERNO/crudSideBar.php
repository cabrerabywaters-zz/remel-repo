<?php

/*
 * Archivo que contiene el sidebar generado para el arreglo
 * $tablasDB que contiene cada una de las tablas de la DB agrupadas por vista
 * ej: vistaUsuarios => personas, funcionarios, etnias, etc
 */

$tablasDB = array(); //arreglo con las vistas de la DB

$tablasDB['Usuarios'] =
array( // arreglo con indice de tabla => nombreArchivo
    'Personas'=>'#',
    'Funcionarios'=>'#',
    'Pinpass'=>'#',
    'Etnias'=>'#',
    'Previsiones'=>'#',
    'Especialidades'=>'#',
    'Pinpass'=>'#',
    'SubEspecialidads'=>'#');

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
    'Regiones'=>'#',
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
foreach($tablasDB as $vista=>$tablas){
    echo "<div class='accordion-group'><!-- $vista-->
                    <div class='accordion-heading'>
                        <a class='btn btn-primary btn-block' data-toggle='collapse' data-parent='#accordion2' href='#$vista'>
                        <i class='icon-arrow-down'></i>$vista
                        </a>
                    </div>
                    <div id='$vista' class='accordion-body collapse in'>
                    <div class='accordion-inner'>";
    foreach($tablas as $tabla=>$pagina){
        echo "<a class='btn btn-block btn-small' data-parent='#accordion2' href='#'>
                            $tabla
                        </a>";
    }
    echo "</div>
                    </div>
                </div><!-- end $vista-->";
}
   ?>             
            </div>
    </div><!-- end sidebar -->