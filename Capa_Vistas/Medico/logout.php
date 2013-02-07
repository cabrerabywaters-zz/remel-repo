<?php
//destruye la session del medico
session_start();
session_destroy();
header("Location: ../../index.php");

?>
