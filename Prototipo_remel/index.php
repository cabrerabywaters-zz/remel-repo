<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Ingresar-Remel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #CDD9AE;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #B6DEDB;
        border: 3px solid #DCF1EF;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
        
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
      
     
          
          
      
    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

      
  </head>

  <body>

    <div class="container-fluid">

      <form class="form-signin" action="doctor1.php">
        <h2 class="form-signin-heading"><center>Bienvenido</center>  <center> a Remel</center> </h2>
        <input type="text" class="input-block-level" placeholder="Rut">
        <input type="password" class="input-block-level" placeholder="Contraseña">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Recordarme
        </label>
        <button class="btn btn-large btn-warning" type="submit"><strong>Ingresar</strong></button>
      </form>

    </div> <!-- /container -->



  </body>
</html>
