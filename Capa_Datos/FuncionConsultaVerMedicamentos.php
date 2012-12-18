<?php

//conexion BDD
include "Conexion.php";

$conexion = new ConexionDB();
$conexion->conectar();
//fin conexion BDD
//medicamento pedido
$medicamento;

//funcion de ver medicamentos segun medicamento seleccionado
function ConsultaVerMedicamentos($medicamento) {

    //consulta de escalares de tabla Medicamentos (nombre, laboratorio, contraindicaciones, etc)
    $consultaEscalar = mysql_query(
            "select Medicamentos.Nombre_Comercial as titulo, Clases_Terapeuticas.Nombre as subtitulo, 
	    Laboratorios.Nombre as laboratorio, Medicamentos.Observaciones as indicaciones, 
	    Presentaciones.Descripcion as presentacion, Foto_Presentacion as foto,
	    Reacciones_Adversas as reaccionesAdversas, 
	    Contraindicaciones_Diagnosticos.Descripcion as contraindicacionesDiagnostico,
	    Contraindicaciones_Alergias.Descripcion as contraindicacionesAlergias,
	    Contraindicaciones_Condiciones.Descripcion as contraindicacionesCondiciones,
	    Medicamentos.Descripcion_Consumo as descripcionConsumo

            from Medicamentos, Clases_Terapeuticas, Laboratorios, Presentaciones, Contraindicaciones_Diagnosticos,
            Contraindicaciones_Alergias, Contraindicaciones_Condiciones

            where Medicamentos.idClase_Terapeutica = Clases_Terapeuticas.idClase_Terapeutica
            and Medicamentos.Laboratorio_idLaboratorio = Laboratorios.RUT
            and Presentaciones.id_Presentacion = Medicamentos.id_Presentacion
            and Medicamentos.idMedicamento = Contraindicaciones_Diagnosticos.idMedicamento
            and Medicamentos.idMedicamento = Contraindicaciones_Alergias.idMedicamento
            and Medicamentos.idMedicamento = Contraindicaciones_Condiciones.idMedicamento"
            );
    
    //consulta de principios activos del medicamento
    $consultaVectorial = mysql_query(
            "select Princio_Activo.Nombre as nombre

            from Princio_Activo, Medicamentos, Medicamentos_has_Princio_Activo

            where Medicamentos.idMedicamento = Medicamentos_has_Princio_Activo.idMedicamento
            and Medicamentos_has_Princio_Activo.idPrincio_Activo = Princio_Activo.idPrincio_activo"
            );
}

?>
