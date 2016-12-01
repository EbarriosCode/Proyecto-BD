<?php 
        session_start();
    //echo $_SESSION['Usuario'];
    if (!isset($_SESSION['Usuario'])) {
        header(("Location:../../index.php"));
    }
    include('../../model/Conexion.php');
     $bd = new Conexion();
    $conn = $bd->Conectar();
 ?>
<!DOCTYPE HTML>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Gráfica de Pie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="view/images/php1.jpg" type="image/x-icon"/>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <link rel="stylesheet" type="text/css" href="../css/css-font/fontello.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery.littlelightbox.css" >
<!--        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
        <script src="../js/ajaxGoogle.js"></script>


        </style>
        <script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Presupuesto Empresas 2016'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [

            <?php 
                $sql = "SELECT * FROM EMPRESAS_CLIENTE";

                $stmt = $conn->prepare($sql);
                $stmt->execute();

                while ($fila = $stmt->fetch()) 
                {
              ?>       
                ["<?php echo $fila['NOMBRE']; ?>",  <?php echo $fila['PRESUPUESTO']; ?>],

                <?php } ?>
            ]
        }]
    });
});


        </script>
    </head>
    <body>
 <div class="container">
    <br>    
        <header>
            <nav class="navbar navbar-default nabar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="false">
                            <span class="sr-only">Menu</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <strong href="#" class="navbar-brand">System Control </strong>
                    </div>

                    <div class="collapse navbar-collapse" id="navbar-1">
                
                        <ul class="nav navbar-nav">
                            
                            <li class="hovered "> <a href="../../controller/PrincipalLogeado_controlador.php">Inicio<span class="icon-home"></span></a></li>
                            <!-- empieza dropdown -->
                            <li class="dropdown hovered">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mantenimiento Control Service<span class="icon-cogs"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="EmpresasClientebuscar_vista.php">Clientes <span class="icon-users"></span></a></li>
                                <li><a href="../../controller/Servicios_controlador.php">Servicios<span class="icon-edit-alt"></span></a></li>
                                <li><a href="../../controller/Proyectos_controlador.php">Proyectos <span class="icon-flag"></span></a></li>
                              </ul>
                            </li>
                           <li role="separator" class="divider"></li>
                                <li class="dropdown hovered">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mantenimiento Trabajadores<span class="icon-blind"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="TrabajadoresCRUD_vista.php">CRUD Trabajadores  <span class="icon-search"></span><span class="icon-plus"></span><span class="icon-pencil"></span><span class="icon-trash"></span></a></li>
                                    </ul>
                                </li>

                            <li class="dropdown hovered">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Control Servicios<span class="icon-pencil"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="hovered "> <a href="../../controller/ControlService_controlador.php">Insertar Nuevo<span class="icon-plus"></span></a></li>
                                    <li><a href="../../controller/listaControlService_controlador.php">Consulta Control de Servicios <span class="icon-globe"></span> </a></li>
                                </ul>
                            </li>

                            <li class="dropdown hovered">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gráficos<span class="icon-chart-line"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="hovered "><a href="pieChartempresas_vista.php">Pie<span class="icon-chart-pie"></span></a></li>                            
                                    <li class="hovered "><a href="columnChartempresas_vista.php">Barras <span class="icon-chart-bar"></span></a></li>                            
                                </ul>
                            </li>
                            
                            
                        </ul>
                        
                        <ul class="nav navbar-nav">
                            <li class="hovered "> <a href="../../controller/cerrar_sesion.php">Salir<span class="icon-reply-all"></span></a></li>
                        </ul>
                    </div>
                </div>
                
            </nav>
        </header>
    </div>

<!--<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>-->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.littlelightbox.js"></script>
<script type="text/javascript" src="../Highcharts-4.1.5/js/highcharts.js"></script>
<script type="text/javascript" src="../Highcharts-4.1.5/js/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

<div class="container">
        <hr>
      <footer>
        <p>&copy; 2016 Ingeniería en Sistemas, UMG.</p>
      </footer>    
</div>
</body>
</html>


