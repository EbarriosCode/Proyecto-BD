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

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                        <li><a href="../controller/profile_controller.php"><i class="fa fa-user fa-fw"></i> Usuario <?php echo $_SESSION['Usuario']; ?> </a>
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
        <?php 
            include('../../model/Conexion.php');
             $bd = new Conexion();
            $conn = $bd->Conectar();
        ?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../../view/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../view/css/estilos.css">
    <link rel="stylesheet" type="text/css" href="../../view/css/css-font/fontello.css">
    <link rel="stylesheet" type="text/css" href="../../view/css/jquery.littlelightbox.css" >


        <script src="../../view/js/ajaxGoogle.js"></script>
        <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
$(function () {

    $('#container').highcharts({
        chart: {
            type: 'pyramid',
            marginRight: 100
        },
        title: {
            text: 'Reporte de Piramide',
            x: -50
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b> ({point.y:,.0f})',
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
                    softConnector: true
                }
            }
        },
        legend: {
            enabled: false
        },
        series: [{
            name: 'Total de horas en servicios',
            data: [
                <?php 
                if(isset($_POST['buscar']))
                {
                    $desdePost = $_POST['desde'];
                    $hastaPost = $_POST['hasta'];

                    $date = new DateTime($desdePost);
                    $desde = $date->format('d/m/Y');
                    $date = new DateTime($hastaPost);
                    $hasta = $date->format('d/m/Y');

                    $sql = "SELECT * FROM CONTROL_SERVICIO WHERE FECHA_INICIO >= '$desde' AND FECHA_INICIO <= '$hasta'";
                        
                }

                else{
                    $sql = "SELECT * FROM CONTROL_SERVICIO";
                }    

                $stmt = $conn->prepare($sql);
                $stmt->execute();
                
                while ($fila = $stmt->fetch()) 
                {
              ?>       
                ["<?php echo $fila['EMPRESA_CLIENTE']; ?>",  <?php echo $fila['DURACION_SERVICIO']; ?>],

                <?php } ?>
            ]
        }]
    });
});
        </script>
        <br>
<div class="pull-left"><a href="#modal-busqueda" data-toggle="modal"><button class="btn btn-warning">Consulta por Rango de Fechas <span class="icon-search"></span></button></a></div>

<br><hr><h4 class="center">Detalle Servicios a Empresas Cliente con mas horas en Servicios</h4>

    </head>
    <body>
<script src="../../view/Highcharts-4.1.5/js/highcharts.js"></script>
<script src="../../view/Highcharts-4.1.5/js/modules/funnel.js"></script>
<script src="../../view/Highcharts-4.1.5/js/modules/exporting.js"></script>

<div id="container" style="min-width: 410px; max-width: 600px; height: 400px; margin: 0 auto"></div>
<br>

        <hr>
      <footer>
        <p>&copy; 2016 Ingeniería en Sistemas, UMG.</p>
      </footer>    




        </div>
        <!-- /#page-wrapper -->

    </div>

<!-- MODAL PARA BUSCAR RANGO DE FECHA-->

                <div class="modal fade" id="modal-busqueda">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h2 class="text-center "><strong>Realizar una Búsqueda</strong><span class="icon-search"></span></h2>
                            </div>
                            <div class="modal-body">
                                <h3>Rango de fechas por fecha de inicio</h3><br>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="">Desde:</label>
                                            <input type="date" class="form-control" id="desde" name="desde" required>    
                                        </div>
                                        <div class="form-group">
                                            <label for="">Hasta:</label>
                                            <input type="date" class="form-control" id="hasta" name="hasta" required>    
                                        </div>                            
                            </div>           

                            <div class="modal-footer">
                                <input type="submit" class="btn btn-warning" id="buscar" name="buscar" value="Buscar">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                             </form>
                        </div>                     
                    </div>
                </div>

    <!-- jQuery 
    <script src="../vendor/jquery/jquery.min.js"></script>

     Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
