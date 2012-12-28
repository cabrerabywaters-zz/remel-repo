<?php

function iniciarCookie() {
    ini_set('session.cookie_httponly', true);
}

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
