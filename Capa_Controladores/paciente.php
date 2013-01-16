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
            array('Nacionalidad', $_POST['nacionalidad']),
            array('Peso', $_POST['peso']),
            array('Etnias', $_POST['idEtnias']),
            array('altura', $_POST['altura'])
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
            'altura'
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
            array('Nacionalidad', $_POST['nacionalidad']),
            array('Peso', $_POST['peso']),
            array('altura', $_POST['altura'])
        );

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
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

    public static function R_AlergiaPaciente($idPaciente) {
        $queryString = "SELECT Descripcion
FROM Pacientes, Alergia_has_Paciente, Alergias
WHERE Pacientes.idPaciente = Alergia_has_Paciente.Paciente_idPaciente
AND Alergias.idAlergia = Alergia_has_Paciente.Alergia_idAlergia
AND Pacientes.idPaciente =" . $idPaciente . "";



        $result = CallQuery($queryString);
        $resultArray = array();
        if ($result != null){
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
        }
        else{
            return false;
        }
    }

    public static function R_CondicionPaciente($idPaciente) {
        $queryString = "SELECT Nombre
FROM Pacientes, Paciente_has_Condiciones, Condiciones
WHERE Pacientes.idPaciente = Paciente_has_Condiciones.Paciente_idPaciente
AND Condiciones.idCondiciones = Condiciones_idcondiciones
AND Pacientes.idPaciente=" . $idPaciente . "";



        $result = CallQuery($queryString);
        $resultArray = array();
        if ($result != null){
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
        }
        else{
            return false;
        }
    }
    public static function R_DiagnosticoPaciente($idPaciente) {
        $queryString = "SELECT Diagnosticos.Nombre as Diagnostico, Consulta.Fecha, Personas.Nombre, Personas.Apellido_Paterno
						FROM Personas, Medicos, Consulta, Pacientes, Historiales_medicos, Diagnosticos
						WHERE Pacientes.idPaciente = $idPaciente
						AND Pacientes.idPaciente = Consulta.Pacientes_idPaciente
						AND Consulta.Id_consulta = Historiales_medicos.Consulta_Id_consulta
						AND Historiales_medicos.Diagnosticos_idDiagnostico = Diagnosticos.idDiagnostico
						AND Consulta.Medicos_idMedico = Medicos.idMedico
						AND Medicos.Personas_RUN = Personas.RUN";


        $result = CallQuery($queryString);
        $resultArray = array();
        while ($fila = $result->fetch_assoc()) {
            $resultArray[] = $fila;
        }
        return $resultArray;
    }

    /*public static function R_RecetasPaciente($idPaciente) {

        //primera query que obtiene solo escalares (nombre medico, fechas, etc)
        $queryString = "SELECT Personas.Nombre, Personas.Apellido_Paterno, Recetas.Fecha_Emision, Recetas.Fecha_Vencimiento, Instituciones.Nombre as nomInst, Consulta.Id_consulta 
                        FROM Consulta, Recetas, Medicamentos_Recetas, Medicamentos, Pacientes, Personas, Instituciones, Medicos_has_Instituciones, Medicos
			WHERE Pacientes.idPaciente = $idPaciente
                        AND Medicos.idMedico = Medicos_has_Instituciones.Medico_idMedico
                        AND Medicos_has_Instituciones.Institucion_RUT = Instituciones.RUT
                        AND Instituciones.RUT = Recetas.Institucion_Emision
                        AND Medicos.Personas_RUN = Personas.RUN
                        AND Pacientes.idPaciente = Consulta.Pacientes_idPaciente
                        AND Consulta.Id_consulta = Recetas.Consulta_Id_consulta
                        AND Recetas.idReceta = Medicamentos_Recetas.Receta_idReceta
                        ";
                                //AND Medicamentos_Recetas.Medicamento_idMedicamento = Medicamentos.idMedicamento

        $result = CallQuery($queryString);
        $resultArray = array();
        $resultEscalar = array();
        $resultVectorial = array();
        while ($fila = $result->fetch_assoc()) {
            $resultEscalar[] = $fila;
        }
        
        //segunda query que obtiene todos los nombres de medicamentos (vectores)
        $queryString = "SELECT Medicamentos.Nombre_Comercial, Consulta.Id_consulta
                        FROM Consulta, Recetas, Medicamentos_Recetas, Medicamentos, Pacientes
			WHERE Pacientes.idPaciente = $idPaciente
                        AND Pacientes.idPaciente = Consulta.Pacientes_idPaciente
                        AND Consulta.Id_consulta = Recetas.Consulta_Id_consulta
                        AND Recetas.idReceta = Medicamentos_Recetas.Receta_idReceta
                        AND Medicamentos_Recetas.Medicamento_idMedicamento = Medicamentos.idMedicamento         
                       ";
        $result = CallQuery($queryString);
        $count = 0;
        while ($fila = $result->fetch_assoc()) {
            $resultVectorial[$count] = $fila;
            $count++;
        }
        $resultArray = array_merge($resultEscalar, $resultVectorial);
        //$resultArray[0] = $resultEscalar;
        //$resultArray[1] = $resultVectorial;
        return $resultArray;
    }*/
}

?>
