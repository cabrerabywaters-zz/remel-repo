<!DOCTYPE html>
<!-- header del CRUD-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Remel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

<?php
include 'estilosBootstrap.php'; // archivo de estilos Bootstrap
?>
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