<?php
require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$usuarios = $client->tienda->vendedores->find();

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Ammu-Nation</title>
        <link rel='icon' href='assets/img/page/favicon.ico' type='image/x-icon' sizes="16x16" />
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    </head>

    <body class="colorfondo">
        
        <?php include_once("header.php"); ?>

        <main>

            <div id="login">
                <div class="container colorfondo">
                    <div id="login-row" class="row justify-content-center align-items-center">
                        <div id="login-column" class="col-md-6">
                            <div id="login-box" class="col-md-12">
                                <form id="login-form" class="form" action="validar.php" method="POST">
                                    <h3 class="text-center texto-form">Iniciar sesión</h3>
                                    <div class="form-group">
                                        <label class="texto-form">Nombre de usuario:</label><br>
                                        <input type="text" name="user" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="texto-form">Contraseña:</label><br>
                                        <input type="password" name="pass" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="texto-form"><span>Recordarme</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                        <input type="submit" class="btn btn-success btn-md" value="Ingresar">
                                    </div>
                                    <div id="register-link" class="text-right">
                                        <a href="register.php" class="texto-form">Registrarse como vendedor</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        
        <?php include_once("footer.php"); ?>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    </body>

</html>