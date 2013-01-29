<?php

include_once(dirname(__FILE__)."/../Capa_Controladores/receta.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/historialMedico.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/diagnostico.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/paciente.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/medico.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/consulta.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/lugarAtencion.php");

$idReceta = $_POST['idReceta'];
$idReceta = 49;

$filename = 'recetaMedicaHeader.tex';
$file = fopen( $filename, "r+" );
if( $file == false )
{
   echo ( "Error in opening file" );
   exit();
}

$filesize = filesize( $filename );
$filetext = fread( $file, $filesize );

$infoReceta = Receta::SeleccionarPorId($idReceta);

//Info Consulta
$idConsulta = $infoReceta['Consulta_Id_consulta'];
$infoConsulta = Consulta::SeleccionarPorId($idConsulta);

//Info Medico
$idMedico = $infoConsulta['Medicos_idMedico'];
$infoMedico = Medico::SeleccionarPorId($idMedico);
$nombreMedico = Medico::SeleccionarNombre($idMedico);
$especialidades = Medico::SeleccionarEspecialidades($idMedico);
var_dump($especialidades);

//Info Lugar
$idLugar = $infoConsulta['Lugar_de_Atencion_idLugar_de_Atencion'];
$lugar = LugarAtencion::SeleccionarDatosRed($idLugar);

//Info Paciente
$idPaciente = $infoConsulta['Pacientes_idPaciente'];
$rutPaciente = Paciente::SeleccionarRutPorId($idPaciente);

//Diagnosticos
$diagnosticos = HistorialMedico::SeleccionarPorConsulta($idConsulta);

$search  = array('[doctor]','[red]','[rut]','[sucursal]','[regss]',
    '[lugar]','[regcm]','[direccion]','[esp1]', '[telefono]',
    '[esp2]','[web]','[espr]');

$replace = array($nombreMedico,$lugar['redNombre'],$infoMedico['Personas_RUN'],$lugar['sucursalNombre'],$infoMedico['Codigo_Registro_SS'],$lugar['lugarNombre'],$infoMedico['Codigo_Registro_CM'],$lugar['Direccion_idDireccion'],
        'hedilar','3cucharadas','cada 6 horas',$infoMedico['Correo_Medico'],'ayudaa');

$filetext = str_replace($search, $replace, $filetext,$i);

foreach($diagnosticos as $diagnostico){
	$nombre = Diagnostico::BuscarNombreDiagnosticoPorId($diagnostico['Diagnosticos_idDiagnostico']);
	$filetext = $filetext."\r\n \noindent $nombre \\";
}


/*

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

s
*/
?>
<!--fwrite( $file, "This is  a simple test\n" );-->
