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

            <div class="form-signin">
                <h2 class="form-signin-heading"><center>Bienvenido</center>  <center> a Remel</center> </h2>
                <input type="text" class="input-block-level" placeholder="Rut" id="rut">
                <input type="password" class="input-block-level" placeholder="Contraseña" onfocus="verificarRut(rut)" id="pass">
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Recordarme
                </label>
                <button class="btn btn-large btn-warning" onclick="validar()"><strong>Ingresar</strong></button>
            </div>

            <script type="text/javascript">
                //validacion del rut ingresado
                function verificarRut( Objeto )
                {
                    var tmpstr = "";
                    var intlargo = Objeto.value
                    if (intlargo.length> 0)
                    {
                        crut = Objeto.value
                        largo = crut.length;
                        if ( largo <2 )
                        {
                            alert('rut inválido')
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
                            alert('El Rut Ingreso es Invalido')
                            Objeto.focus();
                            return false;
                        }
                        //alert('El Rut Ingresado es Correcto!')
                        return true;
                    }
                }

                //funcion de validacion del usuario
                function validar(){
                   var permiso = false; 
                   if (pass.value == null || rut.value == null){
                       alert('rellene los campos');
                   }
                   else{
                       
                   }
                }
                
                
    
            </script>

        </div> <!-- /container -->



    </body>
</html>
