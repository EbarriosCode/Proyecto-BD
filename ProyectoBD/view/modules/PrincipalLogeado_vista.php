<?php 
	require_once('../view/section/header.php');
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Información solo para Usuarios</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="../view/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../view/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../view/css/jumbotron-narrow.css">
	<link rel="stylesheet" type="text/css" href="../view/css/jquery.littlelightbox.css" >
    <style>
      .disabled{
        pointer-events:none;
        opacity: .3;
        cursor: none;
        
      }
  </style>
  <?php 
    if($_SESSION['tipo'] == 'admin')
      {
     ?>
          <style>.disabled{pointer-events:auto;opacity:1;cursor: pointer;}</style> 
      <?php } ?>

  <?php 
      if(isset($_GET['boolean']))
      {
        echo "<style>.elemento{display:inline;}</style>";
      }
   ?>
 </head>
 <body>
 	<div class="container">

        <div id="alerta-verde" class="elemento">
            <div class="alert alert-success" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;
                </span></button>
                <strong>Bienvenido <?php echo $_SESSION['Usuario']; ?>!</strong> Se ha autenticado correctamente.
            </div>
        </div>
	   
     <?php //echo "Type: ".$_SESSION['tipo']." Status: ".$_SESSION['estado']; ?>
      <div class="jumbotron">
        <h2>Bienvenido</h2>
        <p class="lead">Navega por las diferentes secciones de este sistema, puedes observar reportes confiables, eficientes y gráficos con diferenes reportes estadísticos.</p>
        <p class="disabled"><a class="btn btn-lg btn-success" href="../Panel-admin/controller/flot_controller.php" role="button">Revisar Gráficas</a></p>
      </div>
      <center><h5><strong>Conectado como: <?php echo $_SESSION['Usuario']; ?></strong></h5></center>

      <div class="container-fluid text-center">
          <h2>OPCIONES</h2>
          <h4>Selecciona</h4>
          <br>
      
      <div class="row">

        <div class="col-sm-4">
          <span class="icon-home"></span>
          <h4>INICIO</h4>
          <p><a href="#">Regresar al inicio</a></p>
        </div>

        <div class="col-sm-4">
          <span class="icon-edit-alt"></span>
          <h4>CONTROL DE SERVICIOS</h4>
          <p><a href="ControlService_controlador.php">Registra un nuevo servicio</a></p>
        </div>

        <div class="col-sm-4">
          <span class="icon-cogs"></span>
          <h4>MANTENIMIENTO</h4>
          <p><a href="../view/modules/EmpresasClientebuscar_vista.php">Empresas cliente, Servicios, etc.</a></p>
        </div>
      
      </div>
    
    <br><br>
  
      <div class="row">
    
      <div class="col-sm-4">
        <span class="icon-chart-line"></span>
        <h4>ADMINISTRACIÓN</h4>
        <p><a href="../Panel-admin" class="disabled">Ir al panel de administración para super usuarios</a></p>
      </div>

      <div class="col-sm-4">
        <span class="icon-mail-1"></span>
        <h4>CONTACTO</h4>
        <p><a href="Form-contacto_controlador.php">Contácto servicios</a></p>
      </div>

      <div class="col-sm-4">
        <span class="icon-info-circled"></span>
        <h4>ACERCA DE</h4>
        <p><a href="Acercade_controlador.php">Misión, Visión, Valores</a></p>
      </div>

    </div>
    </div>

      <footer class="footer">
        <p>&copy; 2016 Ingeniería en Sistemas, UMG.</p>
      </footer>
	</div>



 		<!-- carga de scripts-->
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/ajaxGoogle.js"></script>
	<script src="../js/jquery.littlelightbox.js"></script>
 </body>
 </html>