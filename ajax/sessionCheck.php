<?php


/** 
 * Function iniciarCookie
 * Cambia la configuracion php para setear cookies solo por http
 */
function iniciarCookie() {
    ini_set('session.cookie_httponly', true);
}

/* Function verificarIP
 * Destruye la sesion si es que hay intento de seguirla en otro lugar
 */
function verificarIP() {
    session_start();
    if (isset($_SESSION['last_ip']) == false) {
        $_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
    }

    if ($_SESSION['last_ip'] !== $_SERVER['REMOTE_ADDR']) {
        session_unset();
        session_destroy();
    }
}

?>
