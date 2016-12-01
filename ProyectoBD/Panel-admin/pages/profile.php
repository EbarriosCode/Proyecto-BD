<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">System Control Admin</a>
            </div>


            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><?php echo $_SESSION['Usuario']; ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Usuario <?php echo $_SESSION['Usuario']; ?> </a>
                        </li>
                        <li><a href="../../controller/PrincipalLogeado_controlador.php"><i class="fa fa-home fa-fw"></i> Ir al Inicio</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../../controller/cerrar_sesion.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Buscar....">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="../index.php"><i class="fa fa-dashboard fa-fw"></i> Administración </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Reportes Gráficos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../controller/flot_controller.php"> Gráficas 1</a>
                                </li>
                                <li>
                                    <a href="../controller/morris_controller.php"> Gráficas 2</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="../controller/tables_controller.php"><i class="fa fa-table fa-fw"></i> Consulta Usuarios</a>
                        </li>
                        <li>
                            <a href="../controller/forms_controller.php"><i class="fa fa-edit fa-fw"></i> Mantenimiento Usuarios</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>

        </nav>

        <div id="page-wrapper">
            <br>
                <h1>Perfil de Usuario</h1><hr>
                <form action="" method="POST">
                 <?php foreach($user as $dato): ?>
                    <input type="hidden" id="id" name="id" value="<?php echo $dato['ID']; ?>">
                    <div class="form-group col-md-8">
                        <label for="user">Nombre de Usuario:</label>
                        <input type="text" class="form-control" id="user" name="user" value="<?php echo $dato['NOMBRE'] ?>">
                    </div> 
                               
                    
                    <div class="form-group col-md-8">
                        <label for="">Contraseña:</label>
                        <input type="password" class="form-control" value="<?php echo $dato['PASSWORD'] ?>">
                    </div>

                    <div class="form-group col-md-8">
                        <label for="tipo">Tipo de usuario</label>
                        <input type="text" class="form-control" disabled value="<?php echo $_SESSION['tipo']; ?>">
                    </div>                    
                    
                    <div class="form-group col-md-8">
                        <label for="pass">Cambiar Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <?php endforeach; ?>
                    <div class="form-group col-md-8">
                        <input type="submit" class="btn btn-info" id="guardar" name="guardar" value="Guardar">

                    </div>
                </form>
        <div class="form-group col-md-12">
          <hr>
          <footer>
            <p>&copy; 2016 Ingeniería en Sistemas, UMG.</p>
          </footer>    
        </div>    
        </div>
    </div>

    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
