<?php
// destruye la session y se redirige el menu 
session_start();
session_destroy();
header("Location: ../../index.php");

?>
