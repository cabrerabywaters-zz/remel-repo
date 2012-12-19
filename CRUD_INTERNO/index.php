<!DOCTYPE html>
<!-- header del CRUD-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Remel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet"> <!-- Estilo css de bootstrap -->
    <link href="css/navegacion.ss" rel="stylesheet"> <!-- Estilo de la barra de navegacion -->
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>
    
    <script type="text/javascript" src="/js/verificacion.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap.no-icons.min.css" rel="stylesheet">
    <script type="text/javascript">                                         
    $(document).ready(function() {
      // para que los acordiones inicien colapsados
    $('.accordion-body').collapse({
   
  toggle: true
      })
        }); //end ready
    </script>
    
</head>
<body>
<?php
include 'crudNavBar.php';
?>
    
<div class="container-fluid">
  <div class="row-fluid">
    
<?php
include 'crudSideBar.php';
?>
    
      
    <div class="span10"><!--Body content-->
        <h1>aqui contenido</h1>
    </div><!-- fin body content -->
</div>
<?php
include'crudFooter.php';
?>