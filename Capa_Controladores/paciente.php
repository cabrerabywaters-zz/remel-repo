<?php

include_once(dirname(__FILE__) . '/../Capa_Datos/generadorStringQuery.php');

class Paciente {

    static $nombreTabla = "Pacientes";
    static $nombreIdTabla = "idPaciente";

    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
        $datosCreacion = array(
            array('Fecha_Ultima_Actualizacion', $_POST['fecha_ultima_actualizacion']),
            array('Peso', $_POST['peso']),
            array('Etnias', $_POST['idEtnias']),
            array('altura', $_POST['altura']),
        );

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    public static function BorrarPorId() {
        $id = $_POST['id'];
        $queryString = QueryStringBorrarPorId(self::$nombreTabla, self::$nombreIdTabla, $this->_id);
        $query = CallQuery($queryString);
    }

    /**
     * Seleccionar
     * 
     * Esta funcion selecciona todas las entradas de una tabla
     * con respecto a una condicion dada. Tambien es posible
     * entregar un limite y un offset.
     * 
     * @param string $where
     * @param int $limit
     * @param int $offset
     * @returns array $resultArray
     */
    public static function Seleccionar($where, $limit = 0, $offset = 0) {
        $atributosASeleccionar = array(
            'idPaciente',
            'Fecha_Ultima_Actualizacion',
            'Peso',
            'Etnias_idEtnias',
            'altura',
            'Seguros_idSeguros',
	    'Personas_RUN'
        );

        $queryString = QueryStringSeleccionar($where, $atributosASeleccionar, self::$nombreTabla);

        if ($limit != 0) {
            $queryString = $queryString . " LIMIT $limit";
        }
        if ($offset != 0) {
            $queryString = $queryString . " OFFSET $offset ";
        }

        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }

    /**
     * Actualizar
     * 
     * Esta funcion toma una id de una entrada existente
     * y actualiza con datos nuevos, la id y los datos vienen
     * por POST desde AJAX
     */
    public static function Actualizar() {
        $id = $_POST['id_paciente'];
        $datosActualizacion = array(
            array('Fecha_Ultima_Actualizacion', 'NOW()'),
            array('Peso', $_POST['peso']),
            array('altura', $_POST['altura'])
        );

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    public static function ActualizarPorId($idPaciente) {
        $queryString = "UPDATE Personas SET (Altura = $_POST[altura], Peso = $_POST[peso], Comuna = $_POST[comuna], Direccion = $_POST[direccion],)
                        WHERE Pacientes.idPaciente = '$idPaciente'
                        AND Direcciones.idDireccion = Personas.Direccion_idDireccion
                        AND Pacientes.Personas_RUN = Persona.RUN
                        ";
        echo $queryString;
    }

    public static function EncontrarPaciente($rut) {
        $queryString = "SELECT idPaciente FROM Pacientes WHERE Personas_RUN = '$rut';";
        $res = CallQuery($queryString);
        if ($res->num_rows == 1) {
            return $res->fetch_row();
        }
        else
            return false;
    }

    public static function EncontrarPacienteAssoc($rut) {
        $queryString = "SELECT idPaciente FROM Pacientes WHERE Personas_RUN = '$rut';";
        $res = CallQuery($queryString);
        if ($res->num_rows == 1) {
            return $res->fetch_assoc();
        }
        else
            return false;
    }


	public static function AlergiasTipoPaciente($idPaciente) {
        $queryString = "SELECT Tipo_Alergia.Nombre as Tipo, Tipo_Alergia.idTipo as IdTipo, count(Tipo_Alergia.idTipo) as Cantidad
		FROM Pacientes, Alergia_has_Paciente, Alergias, Tipo_Alergia
WHERE Pacientes.idPaciente = Alergia_has_Paciente.Paciente_idPaciente
AND Alergias.idAlergia = Alergia_has_Paciente.Alergia_idAlergia
AND Alergias.Tipo_idTipo=Tipo_Alergia.idTipo
AND Pacientes.idPaciente =" . $idPaciente . "
GROUP BY Tipo_Alergia.Nombre
ORDER BY Tipo_Alergia.Nombre;";
        $result = CallQuery($queryString);
        $resultArray = array();
        if ($result != null) {
            while ($fila = $result->fetch_assoc()) {
                $resultArray[] = $fila;
            }
            return $resultArray;
        } else {
            return false;
        }
    }
	public static function R_AlergiaPaciente($idPaciente,$idTipo) {
        $queryString = "SELECT Alergias.Nombre as Nombre, Alergias.idAlergia as IdAlergia
		FROM Pacientes, Alergia_has_Paciente, Alergias
WHERE Pacientes.idPaciente = Alergia_has_Paciente.Paciente_idPaciente
AND Alergias.idAlergia = Alergia_has_Paciente.Alergia_idAlergia
AND Alergias.Tipo_idTipo=".$idTipo."
AND Pacientes.idPaciente =" . $idPaciente . ";";
        $result = CallQuery($queryString);
        $resultArray = array();
        if ($result != null) {
            while ($fila = $result->fetch_assoc()) {
                $resultArray[] = $fila;
            }
            return $resultArray;
        } else {
            return false;
        }
    }
	

    public static function R_CondicionPaciente($idPaciente) {
        $queryString = "SELECT Nombre, idCondiciones
FROM Pacientes, Paciente_has_Condiciones, Condiciones
WHERE Pacientes.idPaciente = Paciente_has_Condiciones.Paciente_idPaciente
AND Condiciones.idCondiciones = Condiciones_idcondiciones
AND Pacientes.idPaciente=" . $idPaciente . "";



        $result = CallQuery($queryString);
        $resultArray = array();
        if ($result != null) {
            while ($fila = $result->fetch_assoc()) {
                $resultArray[] = $fila;
            }
            return $resultArray;
        } else {
            return false;
        }
    }

    public static function R_DiagnosticoPaciente($idPaciente) {
        $queryString = "SELECT Diagnosticos.Nombre as Diagnostico, Consulta.Fecha, Personas.Nombre, Personas.Apellido_Paterno, Especialidades.Nombre as Especialidad
						FROM Personas, Medicos, Consulta, Pacientes, Historiales_medicos, Diagnosticos, Especialidades, Especialidades_has_Medicos
						WHERE Pacientes.idPaciente = $idPaciente
						AND Pacientes.idPaciente = Consulta.Pacientes_idPaciente
						AND Consulta.Id_consulta = Historiales_medicos.Consulta_Id_consulta
						AND Historiales_medicos.Diagnosticos_idDiagnostico = Diagnosticos.idDiagnostico
						AND Consulta.Medicos_idMedico = Medicos.idMedico
                                                AND Especialidades_has_Medicos.Medico_idMedico=Medicos.idMedico
                                                AND Especialidades_has_Medicos.Especialidad_idEspecialidad=Especialidades.idEspecialidad
						AND Medicos.Personas_RUN = Personas.RUN";


        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }

    public static function RecetasPacienteMedico($idPaciente, $RUTMedico) {
        $queryString = "SELECT Diagnosticos.Nombre as Diagnostico, Consulta.Fecha, Personas.Nombre, Personas.Apellido_Paterno
						FROM Personas, Medicos, Consulta, Pacientes, Historiales_medicos, Diagnosticos, 
						Medicamentos_Recetas
						WHERE Pacientes.idPaciente = $idPaciente
						AND Pacientes.idPaciente = Consulta.Pacientes_idPaciente
						AND Consulta.Id_consulta = Historiales_medicos.Consulta_Id_consulta
						AND Historiales_medicos.Diagnosticos_idDiagnostico = Diagnosticos.idDiagnostico
						AND Consulta.Medicos_idMedico = Medicos.idMedico;";

        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }

    public static function R_RecetasPaciente($idPaciente) {

        //primera query que obtiene solo escalares (nombre medico, fechas, etc)
        $queryString = "SELECT Personas.Nombre, Personas.Apellido_Paterno, Recetas.Fecha_Emision, Recetas.Fecha_Vencimiento, Consulta.Id_consulta 
                        FROM Consulta, Recetas, Medicamentos_Recetas, Pacientes, Personas, Medicos
			WHERE Pacientes.idPaciente = $idPaciente
                        AND Medicos.Personas_RUN = Personas.RUN
                        AND Medicos.idMedico = Consulta.Medicos_idMedico
                        AND Pacientes.idPaciente = Consulta.Pacientes_idPaciente
                        AND Consulta.Id_consulta = Recetas.Consulta_Id_consulta
                        AND Recetas.idReceta = Medicamentos_Recetas.Receta_idReceta
                        ";

        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }
    
    public static function R_RecetasPacienteVigentes($idPaciente, $fechaActual) {

        //primera query que obtiene solo escalares (nombre medico, fechas, etc)
        $queryString = "SELECT Personas.Nombre, Personas.Apellido_Paterno, Recetas.Fecha_Emision, Recetas.idReceta as Folio, Consulta.Id_consulta 
                        FROM Consulta, Recetas, Medicamentos_Recetas, Pacientes, Personas, Medicos
			WHERE Pacientes.idPaciente = $idPaciente
                        AND Medicos.Personas_RUN = Personas.RUN
                        AND Medicos.idMedico = Consulta.Medicos_idMedico
                        AND Pacientes.idPaciente = Consulta.Pacientes_idPaciente
                        AND Consulta.Id_consulta = Recetas.Consulta_Id_consulta
                        AND Recetas.idReceta = Medicamentos_Recetas.Receta_idReceta
                        ORDER BY Recetas.Fecha_Emision DESC
                        ";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }
    
    public static function R_MedicamentosVigentesPaciente($idPaciente, $fechaActual) {
        $queryString = 'SELECT Medicamentos_Recetas.idMedicamento
                                    FROM Medicamentos_Recetas, Recetas, Consulta, Pacientes
                                    WHERE Recetas.Fecha_Vencimiento <= ' . $fechaActual . '
                                    AND Recetas.idReceta = Medicamentos_Recetas.Recetas_idReceta
                                    AND Recetas.Consulta_Id_consulta = Consulta.Id_consulta
                                    AND Consulta.Pacientes_idPaciente = Pacientes.idPaciente
                                    AND Pacientes.idPaciente =' . $idPaciente . '
                                    ';
        $resultado = CallQuery($queryString);
        return $resultado;
    }
    

    public static function R_MedicamentosConsulta($idConsulta) {
        $queryString = "SELECT Medicamentos.Nombre_Comercial, Consulta.Id_consulta, Medicamentos.idMedicamento, Recetas.idReceta, 
                               Medicamentos_Recetas.Unidad_de_Consumo_idUnidad_de_Consumo as unidad
                        FROM Consulta, Recetas, Medicamentos_Recetas, Medicamentos
			WHERE Consulta.Id_consulta = $idConsulta
                        AND Consulta.Id_consulta = Recetas.Consulta_Id_consulta
                        AND Recetas.idReceta = Medicamentos_Recetas.Receta_idReceta
                        AND Medicamentos_Recetas.Medicamento_idMedicamento = Medicamentos.idMedicamento         
                       ";
        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }

    public static function R_DiagnosticosIdPorPacienteId($idPaciente) {
        $queryString = 'SELECT Historiales_medicos.Diagnosticos_idDiagnostico as ID
                        FROM Pacientes, Consulta, Historiales_medicos
                        WHERE ' . "$idPaciente" . ' = Pacientes.idPaciente
                        AND Pacientes.idPaciente = Consulta.Pacientes_idPaciente
                        AND Consulta.Id_consulta = Historiales_medicos.Consulta_Id_consulta
                        ';
        $resultado = CallQuery($queryString);
        return $resultado;
    }
    
    public static function SeleccionarDiagnosticosPorId($idPaciente, $limit = 0, $offset = 0) {
        $queryString = "SELECT Diagnosticos.Nombre AS nombreDiagnostico, Personas.Nombre AS nombreMedico, Personas.Apellido_Paterno as apellidoMedico, Tipo.Nombre AS nombreTipoDiagnostico, Consulta.Fecha AS fechaConsulta, Historiales_medicos.Comentario AS comentarioDiagnostico
            FROM Diagnosticos, Personas, Consulta, Historiales_medicos, Tipo, Medicos
            WHERE Consulta.Pacientes_idPaciente = '$idPaciente' 
            AND Historiales_medicos.Diagnosticos_idDiagnostico = Diagnosticos.idDiagnostico
            AND Consulta.Medicos_idMedico = Medicos.idMedico
            AND Medicos.Personas_RUN = Personas.RUN
            AND Historiales_medicos.Tipo_idTipo = Tipo.idTipo
            AND Historiales_medicos.Consulta_Id_consulta = Consulta.Id_consulta";
        if ($limit != 0) $queryString = $queryString."LIMIT $limit";
        if ($offset != 0) $queryString = $queryString."OFFSET $offset";
        $queryString = $queryString.";";
        $query = CallQuery($queryString);
        $historialMedico = array();
        while($lineaHistorial = $query->fetch_assoc()){
            $historialMedico[] = $lineaHistorial;
        }
        return $historialMedico;
    }

    public static function SeleccionarRutPorId($idPaciente){
	$nombreTabla = self::$nombreTabla;
	$queryString = "SELECT Personas_RUN FROM $nombreTabla WHERE idPaciente = '$idPaciente;'";
	$query = CallQuery($queryString);

	return $query->fetch_assoc();
    }
    
    public static function SeleccionarRecetaPorId($idPaciente){
    $queryString = "SELECT Personas.Nombre as nombreMedico, Personas.Apellido_Paterno as apellidoMedico, Recetas.Folio_RP as folio, Recetas.Fecha_Emision as fechaEmision, 
                    Recetas.Fecha_eliminacion as fechaEliminacion, Diagnosticos.Nombre as nombreDiagnostico, Medicamentos_Vendidos.Fecha as fechaAdquisicion                   
                    FROM Recetas, Medicos, Personas, Diagnosticos, Consulta, Historiales_medicos, Medicamentos_Recetas, Medicamentos_Vendidos
                    WHERE Consulta.Pacientes_idPaciente =  '$idPaciente'
                    AND Recetas.Consulta_Id_consulta = Consulta.Id_consulta
                    AND Consulta.Medicos_idMedico = Medicos.idMedico
                    AND Medicos.Personas_RUN = Personas.RUN
                    AND Historiales_medicos.Consulta_Id_consulta = Consulta.Id_consulta
                    AND Historiales_medicos.Diagnosticos_idDiagnostico = Diagnosticos.idDiagnostico
                    AND Medicamentos_Recetas.Receta_idReceta = Recetas.idReceta
                    AND Medicamentos_Recetas.Medicamento_idMedicamento = Medicamentos_Vendidos.Medicamentos_Recetas_Medicamento_idMedicamento";
    $query = CallQuery($queryString);
    $historialRecetas=array();
    while($lineaRecetas = $query->fetch_assoc()){
        $historialRecetas[] = $lineaRecetas;
    }
    return $historialRecetas;
}

}
?>
