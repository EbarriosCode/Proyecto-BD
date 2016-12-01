
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="view/images/php1.jpg" type="image/x-icon"/>

    <link rel="stylesheet" type="text/css" href="../view/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../view/css/estilos.css">
    <link rel="stylesheet" type="text/css" href="../view/css/css-font/fontello.css">
    
    <link rel="stylesheet" type="text/css" href="../view/css/jquery.littlelightbox.css" >
    <style>
        .header {
            color: #36A0FF;
            font-size: 27px;
            padding: 10px;
        }

        .bigicon {
            font-size: 35px;
            color: #36A0FF;
        }
    </style>
</head>
<body>
    <br>
    <div class="container">
        <header>
            <nav class="navbar navbar-default nabar-fixed-top navbar-invers">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="false">
                            <span class="sr-only">Menu</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <strong class="navbar-brand">System Control </strong>
                    </div>

                    <div class="collapse navbar-collapse" id="navbar-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="hovered"><a href="../index.php"><span class="icon-home"></span></a></li>
                            <li class="hovered"><a href="#ventana-Login" data-toggle="modal">Login <span class="icon-user-1" ></span></a></li>
                            <li class="hovered"><a href="Acercade_controlador.php">Acerca de <span class="icon-info-circled"></span></a></li>
                            <li class="hovered"><a href="Form-contacto_controlador.php">Contácto <span class="icon-mail-1"></span></a></li>
                            
                        </ul>

                    </div>
                </div>
                
            </nav>
        </header>
    </div>

<!-- FORMULARIO CONTACTO -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <form class="form-horizontal" method="post">
                        <fieldset>
                            <legend class="text-center header">Contáctanos</legend>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="icon-user-1 bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="nombre" name="nombre" type="text" placeholder="Tu Nombre" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="icon-commenting-o bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="asunto" name="asunto" type="text" placeholder="Asunto" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="icon-mail bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="correo" name="correo" type="text" placeholder="Tu Correo Eléctronico" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="icon-phone bigicon"></i></span>
                                <div class="col-md-8">
                                    <input id="telefono" name="telefono" type="text" placeholder="Tu Teléfono" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="icon-edit-alt bigicon"></i></span>
                                <div class="col-md-8">
                                    <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Escriba su mensaje aquí, después de click en Enviar Correo" rows="7" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" id="sendCorreo" name="sendCorreo" class="btn btn-primary btn-lg">Enviar Correo <span class="icon-hand-pointer-o"></span></button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
      <hr>

      <footer>
        <p>&copy; 2016 Ingeniería en Sistemas, UMG.</p>
      </footer>
    </div>


<!-- CONTENIDO DEL MODAL LOGIN -->
                            <div class="modal fade" id="ventana-Login">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <!-- CONTENIDO DEL HEAD - MODAL -->
                                        
                                        <div class="modal-header">

                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h2 class="text-center "><strong>Login</strong><span class="icon-users"></span></h2>
                                        </div>
                                        
                                        <!-- Contenido de la ventana -->
                                        <div class="modal-body">
                                            
                                            <form class="form-signin" action="Logeo_controlador.php" method="POST">
                                                                    
                                            
                                            <div class="form-group">
                                                    <label for="usuario" class="sr-only">Usuario</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><span class="icon-user"></span></span>
                                                            <input value="" class="form-control" type="text" id="usu" name="usu" placeholder="Usuario" required autofocus>
                                                        </div>  
                                            </div>

                                            <div class="form-group">
                                                    <label for="password" class="sr-only">Contraseña</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><span class="icon-lock-open"></span></span>
                                                            <input value="" class="form-control" type="password" id="pass" name="pass" placeholder="Contraseña" required>
                                                        </div>
                                            </div>

                                        <div class="modal-footer">
                                                <input type="submit" class="btn btn-primary" name="entrar" id="entrar" value="Entrar">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        </div>
 
                                        </form>
                                    </div>
                                </div>
                            </div>    
<script type="text/javascript" src="../view/js/jquery.min.js"></script>
<script type="text/javascript" src="../view/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../view/js/jquery.littlelightbox.js"></script>

</body>
</html>
    