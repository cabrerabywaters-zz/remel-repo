<?php

//$stdin = fopen('php://recetaMedicaRemel', 'r+');
$filename = 'recetaMedicaRemel.tex';
$file = fopen( $filename, "r+" );
if( $file == false )
{
   echo ( "Error in opening file" );
   exit();
}

$filesize = filesize( $filename );
$filetext = fread( $file, $filesize );


$search  = array('[doctor]','[sucursal]','[fecha]','[fechaVencimiento]','[nombreDiagnostico]',
    '[tipoDiagnostico]','[comentarioDiagnostico]','[nombreMedicamento]','[cantidad]',
    '[periodo]','[frecuencia]','[comentarioMedicamento]');

$replace = array('Max','clinica alemana','hoy','mañana','SPM','hipotesis','es muy raro',
        'hedilar','3cucharadas','cada 6 horas','dos veces al dia','ayudaa');

$filetext = str_replace($search, $replace, $filetext,$i);

echo $filetext;

?>
<!--fwrite( $file, "This is  a simple test\n" );-->