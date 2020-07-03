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

            <div id="register">
                <div class="container colorfondo">
                    <div id="register-row" class="row justify-content-center align-items-center">
                        <div id="register-column" class="col-md-6">
                            <div id="register-box" class="col-md-12">
                                <form id="register-form" class="form" action="verificar.php" method="POST">
                                    <h3 class="text-center texto-form">Registrarse</h3>
                                    <div class="form-group">
                                        <label class="texto-form">Nombre de usuario:</label><br>
                                        <input type="text" name="user" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="texto-form">Contraseña:</label><br>
                                        <input type="password" name="pass" class="form-control">  
                                    </div>
                                    <div class="form-group">
                                        <label class="texto-form">Repetir contraseña:</label><br>
                                        <input type="password" name="passver" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="submit" class="btn btn-success btn-md" value="Ingresar">
                                    </div>
                                    <div id="login-link" class="text-right">
                                        <a href="login.php" class="texto-form">Iniciar sesión</a>
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