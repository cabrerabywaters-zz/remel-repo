<?php
    /**
     * Logout medico
     * 
     * Este Archivo lo que hace que cada ves que es redireccionado
	 * destruye la session y te redirige al inicio (index.php)
	 *
	 * @param array $_SESSION
     */
session_start();
session_destroy();
header("Location: ../../index.php");

?>
