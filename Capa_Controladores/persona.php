<?php

include_once(dirname(__FILE__) . '/../Capa_Datos/generadorStringQuery.php');

class Persona {

    static $nombreTabla = "Personas";
    static $nombreIdTabla = "RUN";

    /**
     * Insertar
     * 
     * Inserta una nueva entrada
     * 
     */
    public static function Insertar() {
        $datosCreacion = array(
            array('Nombre', $_POST['nombre']),
            array('Apellido_Paterno', $_POST['apellido_paterno']),
            array('Apellido_Materno', $_POST['apellido_materno']),
            array('Direccion_idDireccion', $_POST['idDireccion']),
            array('Fecha_Nac', $_POST['fecha_nac']),
            array('Prevision_rut', $_POST['rut']),
            array('sexo', $_POST['sexo']),
            array('Foto', $_POST['foto']),
            array('Clave', $_POST['clave']),
            array('Codigo_Seguridad', $_POST['codigo_seguridad']),
            array('email', $_POST['email']),
            array('n_celular', $_POST['n_celular']),
            array('Fecha_creacion_REMEL', 'NOW()'),
            array('n_fijo', $_POST['n_fijo']),
            array('Nacionalidad', $_POST['nacionalidad'])
        );

        $queryString = QueryStringAgregar($datosCreacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    /**
     * BorrarPorId
     * 
     * Borra una entrada segun su id, pasada por POST.
     */
    private static function BorrarPorId() {
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
            'Nombre',
            'Apellido_Paterno',
            'Apellido_Materno',
            'Direccion_idDireccion',
            'Fecha_Nac',
            'Prevision_rut',
            'Sexo',
            'Foto',
            'Clave',
            'Codigo_Seguridad',
            'Email',
            'N_Celular',
            'Fecha_creacion_REMEL',
            'n_fijo',
            'Nacionalidad'
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
    private static function Actualizar() {
        $id = $_POST['id_persona'];
        $datosActualizacion = array(
            array('Direccion_idDireccion', $_POST['idDireccion']),
            array('Clave', $_POST['clave']),
            array('email', $_POST['email']),
            array('Foto', $_POST['foto']),
            array('N_celular', $_POST['n_celular']),
            array('Fecha_creacion_REMEL', 'NOW()'),
            array('n_fijo', $_POST['n_fijo']),
            array('Nacionalidad', $_POST['nacionalidad'])
        );

        $where = "WHERE " . self::$nombreIdTabla . " = '$id'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
    }

    public static function VerificarClave($rut, $pass) {
        $pass = md5($pass);
        $queryString = "SELECT * FROM Personas WHERE RUN = '$rut' AND Clave = '$pass';";
        if (CallQuery($queryString)->num_rows != 1) {
            return false;
        }
        else
            return true;
    }

    public static function VerificarPIN($rut, $pin) {
        $pin = md5($pin);
        $queryString = "SELECT RUN FROM Personas WHERE RUN = '$rut' AND Codigo_Seguridad = '$pin';";
        if (CallQuery($queryString)->num_rows != 1) {
            return false;
        }
        else
            return true;
    }

    public static function BuscarNombre($rut) {
        $queryString = "SELECT Nombre, Apellido_Paterno, Apellido_Materno, RUN FROM Personas WHERE RUN = '$rut';";
        $query = CallQuery($queryString);
        if ($query->num_rows == 1) {
            return $query->fetch_assoc();
        }
        else
            return false;
    }

    public static function ActualizarFoto($rut, $url) {
        $datosActualizacion = array(
            array('Foto', $url)
        );

        $where = "WHERE " . self::$nombreIdTabla . " = '$rut'";
        $queryString = QueryStringActualizar($where, $datosActualizacion, self::$nombreTabla);
        $query = CallQuery($queryString);
        return $query;
    }

    public static function BuscarDatosAnteriores($run) {
        $queryString = 'SELECT Personas.n_celular as n_celular, Personas.n_fijo as n_fijo, Personas. Direccion_idDireccion as id_direccion,
                               Pacientes.Peso as peso, Pacientes.altura as altura, Personas.Prevision_rut as prevision, Pacientes.Seguros_idSeguros as seguro
                        FROM Personas, Pacientes
                        WHERE Personas.RUN = ' . $run . '
                        AND Pacientes.Personas_RUN = ' . $run . '
                        ';
        $datosAnteriores = CallQuery($queryString);
        if ($datosAnteriores) {
            $datosAnteriores = $datosAnteriores->fetch_assoc();
            return $datosAnteriores;
        }
        else
            return false;
    }

    public static function ActualizarDatos($nCelular, $nFijo, $idDireccion, $peso, $altura, $prevision, $run, $seguro) {
        $queryString = 'UPDATE Personas, Pacientes
                        SET Personas.n_celular = "' . $nCelular . '", Personas.n_fijo = "' . $nFijo . '", Personas.Direccion_idDireccion = "' . $idDireccion . '", 
                            Pacientes.Peso = "' . $peso . '", Pacientes.altura = "' . $altura . '", Personas.Prevision_rut = "' . $prevision . '", Pacientes.Seguros_idSeguros = "' . $seguro . '"
                        WHERE Personas.RUN = Pacientes.Personas_RUN
                        AND Personas.RUN = "' . $run . '"
            
                        ';
        $resultado = CallQuery($queryString);
    }

    public static function MedicoEditarDatosPaciente($run, $peso, $altura, $calle, $comuna, $nCalle, $nCelular, $nFijo, $prevision, $seguro) {
        include_once(dirname(__FILE__) . '/direccion.php');
        include_once(dirname(__FILE__) . '/log.php');
        include_once(dirname(__FILE__) . '/seguro.php');
        include_once(dirname(__FILE__) . '/prevision.php');
        $idSeguro = Seguro::BuscarNombreExacto($seguro);
        $idSeguro = $idSeguro['idSeguros'];
        $idDireccion = Direccion::BuscarIdDireccion($calle, $nCalle, $comuna);
        if ($idDireccion) $idDireccion = $idDireccion['idDireccion'];
        $idPrevision = Prevision::BuscarIdPrevisionPorNombreExacto($prevision);
        $idPrevision = $idPrevision['rut'];
        if ($idDireccion == false) {
            $nuevaDireccion = Direccion::InsertarConDatos($calle, $nCalle, $comuna);
            $idDireccion = Direccion::BuscarIdDireccion($calle, $nCalle, $comuna);
            if ($idDireccion) $idDireccion = $idDireccion['idDireccion'];
        }
        $datosAnteriores = Persona::BuscarDatosAnteriores($run);
        $cambios = array();
        //si es necesario cambiar el atributo, se agrega
        if ($nCelular != $datosAnteriores['n_celular']) {
            $cambios['n_celular'] = array($nCelular, $datosAnteriores['n_celular'], 'Personas');
        }
        if ($nFijo != $datosAnteriores['n_fijo']) {
            $cambios['n_fijo'] = array($nFijo, $datosAnteriores['n_fijo'], 'Personas');
        }
        if ($peso != $datosAnteriores['peso']) {
            $cambios['Peso'] = array($peso, $datosAnteriores['peso'], 'Pacientes');
        }
        if ($idPrevision != $datosAnteriores['prevision']) {
            $cambios['Prevision_rut'] = array($idPrevision, $datosAnteriores['prevision'], 'Personas');
        }
        if ($idSeguro != $datosAnteriores['seguro']) {
            $cambios['Seguros_idSeguros'] = array($idSeguro, $datosAnteriores['seguro'], 'Pacientes');
        }
        if ($altura != $datosAnteriores['altura']) {
            $cambios['altura'] = array($altura, $datosAnteriores['altura'], 'Pacientes');
        }
        if ($idDireccion != $datosAnteriores['id_direccion']) {
            $cambios['idDireccion'] = array($idDireccion, $datosAnteriores['id_direccion'], 'Personas');
        }
        foreach ($cambios as $key => $value) {
            if (isset($_SESSION['RUTPaciente'])){
                $log = Log::InsertarModificacionDatosPaciente(date('Y-m-d H:i:s'), $key, $value[1], $value[0], $value[2], $_SESSION["RUTPaciente"], $_SESSION['idMedicoLog']);
            }
            else{
                $log = Log::InsertarModificacionDatosPacientePropia(date('Y-m-d H:i:s'), $key, $value[1], $value[0], $value[2], $_SESSION["RUT"]);
            }
        }
        $actualizar = Persona::ActualizarDatos($nCelular, $nFijo, $idDireccion, $peso, $altura, $idPrevision, $run, $idSeguro);
        return true;
    }

}

?>