<?php

// Cargando todos los controladores necesarios
include_once(dirname(__FILE__)."/../Capa_Controladores/receta.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/historialMedico.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/diagnostico.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/paciente.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/medico.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/consulta.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/lugarAtencion.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/direccion.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/medicamentoReceta.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/medicamento.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/unidadDeConsumo.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/unidadFrecuencia.php");
include_once(dirname(__FILE__)."/../Capa_Controladores/unidadPeriodo.php");

define("TMPDIRECTORY", dirname(__FILE__)."/tmp/");

// Carga del header
$filename = 'recetaMedicaHeader.tex';
$file = fopen( $filename, "r+" );
if( $file == false )
{
   echo ( "Error in opening file" );
   exit();
}

$filesize = filesize( $filename );
$filetext = fread( $file, $filesize );

// Carga de datos de receta por POST y SQL
$idReceta = $_REQUEST['idReceta'];
$idReceta = 49;
$infoReceta = Receta::SeleccionarPorId($idReceta);

// Info Consulta
$idConsulta = $infoReceta['Consulta_Id_consulta'];
$infoConsulta = Consulta::SeleccionarPorId($idConsulta);

//Info Medico
$idMedico = $infoConsulta['Medicos_idMedico'];
$infoMedico = Medico::SeleccionarPorId($idMedico);
$nombreMedico = Medico::SeleccionarNombre($idMedico);
$especialidades = Medico::SeleccionarEspecialidades($idMedico);
$numeroEspecialidades = count($especialidades); $esp1 = ""; $esp2 = "";
$especialidadesRestantes = ""; $espr = array();

// Opciones especialidades segun cantidad
if($numeroEspecialidades > 0) $esp1 = $especialidades[0];
if($numeroEspecialidades > 1) $esp2 = $especialidades[1];
if($numeroEspecialidades > 2){
	for($i = 2; $i < count($especialidades); $i++){
		$especialidadesRestantes = $especialidadesRestantes." ".$especialidades[$i];
	} 
}

//Info Lugar
$idLugar = $infoConsulta['Lugar_de_Atencion_idLugar_de_Atencion'];
$lugar = LugarAtencion::SeleccionarDatosRed($idLugar);
$direccion = Direccion::SeleccionarStringDireccion($lugar['Direccion_idDireccion']);

//Info Paciente
$idPaciente = $infoConsulta['Pacientes_idPaciente'];
$rutPaciente = Paciente::SeleccionarRutPorId($idPaciente);

//Carga de historial medico segun consulta/receta
$diagnosticos = HistorialMedico::SeleccionarPorConsulta($idConsulta);

//Busqueda y reemplazo de 'variables' en template latex por datos reales por SQL
$search  = array('[doctor]','[red]','[rut]','[sucursal]','[regss]',
    '[lugar]','[regcm]','[direccion]','[esp1]', '[telefono]',
    '[esp2]','[web]','[espr]','[nro]');

$replace = array($nombreMedico,$lugar['redNombre'],$infoMedico['Personas_RUN'],$lugar['sucursalNombre'],$infoMedico['Codigo_Registro_SS'],$lugar['lugarNombre'],$infoMedico['Codigo_Registro_CM'],$direccion,
        $esp1,$lugar['telefono'],$esp2,$lugar['correo'],$especialidadesRestantes, $idReceta);

$filetext = str_replace($search, $replace, $filetext);

// Construyendo seccion de diagnosticos y medicinas relacionadas
foreach($diagnosticos as $diagnostico){
	$nombre = Diagnostico::BuscarNombreDiagnosticoPorId($diagnostico['Diagnosticos_idDiagnostico']);
	$nombre = $nombre['Text'];
	$filetext = $filetext.'\noindent '.$nombre.' \\\\'."\r\n"; // Se agrega diagnostico al latex	

	// Carga de medicamentos recetados por diagnostico en esta receta
	$medicamentosRecetados = MedicamentoReceta::SeleccionarPorHistorialMedico($idReceta, $diagnostico['Diagnosticos_idDiagnostico']);

	$contadorMedicamentos = 0;
	// Construyendo seccion de medicamentos por diagnostico de historial
	foreach($medicamentosRecetados as $medicamentoRecetado){
		// Obtencion informacion medicamento
		$infoMedicamento = Medicamento::BuscarMedicamentoPorId($medicamentoRecetado['Medicamento_idMedicamento']);
		$filetext = $filetext.$infoMedicamento['Nombre_Comercial'].' \\\\'."\r\n";

		$unidadDeConsumo = UnidadDeConsumo::SeleccionarPorId($medicamentoRecetado['Unidad_de_Consumo_idUnidad_de_Consumo']);
		$unidadDeFrecuencia = UnidadFrecuencia::SeleccionarPorId($medicamentoRecetado['Unidad_Frecuencia_ID']);
		$unidadDePeriodo = UnidadPeriodo::SeleccionarPorId($medicamentoRecetado['Unidad_Periodo_ID']);

		$filetext = $filetext.'\indent Fecha inicio: '.$medicamentoRecetado['Fecha_Inicio'].' \\\\'."\r\n";
		$filetext = $filetext.'\indent Periodo: '.$medicamentoRecetado['Periodo'].' '.$unidadDePeriodo.' \\\\'."\r\n";
		$filetext = $filetext.'\indent Frecuencia: '.$medicamentoRecetado['Frecuencia'].' '.$unidadDeFrecuencia.' \\\\'."\r\n";
		$filetext = $filetext.'\indent Cantidad: '.$medicamentoRecetado['Cantidad'].' '.$unidadDeConsumo.' \\\\'."\r\n";
	}	
	$filetext = $filetext.'\\\\ \\\\'."\r\n";
}

$filetext = $filetext.'\end{document}';
$randomNumber = mt_rand();
$texName = $randomNumber.".tex";
$pathTex = TMPDIRECTORY.$texName;
file_put_contents($pathTex, $filetext); 

$pdfLatex = '/usr/bin/env pdflatex '.$pathTex.' -output-directory='.TMPDIRECTORY;
exec($pdfLatex);

$rmTex = '/usr/bin/env rm '.$pathTex;
exec($rmTex);

header('Content-type: application/pdf');
header('Content-Disposition: attachment; filename="receta.pdf"');
readfile($randomNumber.'.pdf');

$rmTemps = '/usr/bin/env rm '.$randomNumber.'.*';
exec($rmTemps);

?>
