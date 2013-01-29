<?php
include_once(dirname(__FILE__).'/Capa_Controladores/persona.php');


        $queryString = 'SELECT Personas.n_celular as n_celular, Personas.n_fijo as n_fijo, Personas. Direccion_idDireccion as id_direccion,
                               Pacientes.Peso as peso, Pacientes.altura as altura
                        FROM Personas, Pacientes
                        WHERE Personas.RUN = "179944634"
                        AND Pacientes.Personas_RUN = "179944634"
                        ';
        $datosAnteriores = CallQuery($queryString);
                $datosAnteriores = $datosAnteriores->fetch_assoc();

        print_r($datosAnteriores['n_celular']);
        echo '<br>';
                $queryString = 'SELECT idComuna FROM Comunas WHERE Nombre = "ARICA"';
        $result = CallQuery($queryString);
        $result = $result->fetch_assoc();
        print_r($result['idComuna']);



?>