<?php
/*
 * inicio del sistema. muestra login
 * input: ninguno
 * output: rut del usuario
 */
session_start();
if (!empty($_SESSION))
    header("Location: ajax/comprobadorDoctor.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Ingresar-Remel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- le js -->
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
        <!-- Le styles -->
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #fafaf0;
            }

            .form-signin {

                font-style:italic;

                font-weight:bold;

                font-size:2em;

                font-color:#ffffff;

                font-family: ;


                max-width: 300px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: white;
                border: 3px solid #0b72b5;
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



    </head>

    <body>

        <div class="container-fluid">

            <form class="form-signin" id="usuario" method="post" action="javascript:enviar()">
                <fieldset>
                    
                         <center> <img class="img-rounded " src="imgs/logo-remel-principal.png" style="width: 230px; height: 180px;"></center>
                         <br>
                    <input type="text" class="input-block-level" placeholder="Rut" id="rut" onfocus="disableIngresar()" maxlength="15" pattern="^0*(\d{1,3}(\.?\d{3})*)\-?([\dkK])$" name="rutUsuario">
                    <input type="password" class="input-block-level" placeholder="Contraseña" onfocus="verificarRut(rut)" id="pass" name="passUsuario">
                    <label class="checkbox">
                        <input type="checkbox" value="remember-me"> Recordarme
                    </label>
                    <center>   <button class="btn btn-large" disabled="disabled" id="ingresar" type="submit"><strong>Ingresar</strong></button></center>
                    <p><span id="mensaje"></span></p>
                </fieldset>
            </form>



            <script type="text/javascript">
                //validacion del rut ingresado
                function disableIngresar(){
                    
                    $('#ingresar').attr('disabled','disabled');

                    
                }
                
                
                function verificarRut( Objeto )
                {
                    var tmpstr = "";
                    $('#mensaje').html("");
                    var intlargo = Objeto.value
                    if (intlargo.length> 0)
                    {
                        crut = Objeto.value
                        largo = crut.length;
                        if ( largo <2 )
                        {
                            $('#mensaje').html("<span class='alert alert-danger'><small><strong>El rut ingresado no es válido</strong></small></span>");
                            Objeto.focus()
                            return false;
                        }
                        for ( i=0; i <crut.length ; i++ )
                        if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' )
                        {
                            tmpstr = tmpstr + crut.charAt(i);
                        }
                        rut = tmpstr;
                        crut=tmpstr;
                        largo = crut.length;
	
                        if ( largo> 2 )
                            rut = crut.substring(0, largo - 1);
                        else
                            rut = crut.charAt(0);
	
                        dv = crut.charAt(largo-1);
	
                        if ( rut == null || dv == null )
                            return 0;
	
                        var dvr = '0';
                        suma = 0;
                        mul  = 2;
	
                        for (i= rut.length-1 ; i>= 0; i--)
                        {
                            suma = suma + rut.charAt(i) * mul;
                            if (mul == 7)
                                mul = 2;
                            else
                                mul++;
                        }
	
                        res = suma % 11;
                        if (res==1)
                            dvr = 'k';
                        else if (res==0)
                            dvr = '0';
                        else
                        {
                            dvi = 11-res;
                            dvr = dvi + "";
                        }
                        if ( dvr != dv.toLowerCase() )
                        {
                            $('#mensaje').html("<span class='alert alert-danger'>El rut ingresado no es válido</span>");
                            Objeto.focus();
                            return false;
                        }
                        //alert('El Rut Ingresado es Correcto!')
                        $('#ingresar').removeAttr('disabled');
                        return true;
                    }
                }                       
                $("usuario").validator();
		
                function enviar(){
                    var postData = $("#usuario").serialize();
                    $.ajax({ url: 'ajax/verificarPassUsuario.php',
                        data: postData,
                        type: 'post',
                        success: function(output) {
                            if(output = '1') {
                                window.location.href = "ajax/comprobadorDoctor.php";
                            }
                            else{
                                $('#mensaje').html("<span class='alert alert-danger'>Nombre de Usuario o Constraseña Incorrecto </span>");
                            }
                        }
                    });
                }
		    
            </script>

        </div> <!-- /container -->



    </body>
</html>
