<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="view/images/php1.jpg" type="image/x-icon"/>

	<link rel="stylesheet" type="text/css" href="../view/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../view/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../view/css/css-font/fontello.css">
	<link rel="stylesheet" type="text/css" href="../view/css/jquery.littlelightbox.css" >
	<link rel="stylesheet" type="text/css" href="../view/css/validarFormEmpresasCliente.css">
	<style>
			.dis{
				pointer-events:none;
				opacity: .3;
				cursor: none;
				
			}
	</style>
	<?php 
		if($_SESSION['tipo'] == 'admin')
      {
     ?>
       		<style>.dis{pointer-events:auto;opacity:1;cursor: pointer;}</style> 
      <?php } ?>	
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

						<strong href="#" class="navbar-brand">System Control</strong>
					</div>

					<div class="collapse navbar-collapse" id="navbar-1">
				
						<ul class="nav navbar-nav " >
							
							<li class="hovered"> <a href="../controller/PrincipalLogeado_controlador.php">Inicio<span class="icon-home"></span></a></li>
							<!-- empieza dropdown -->
							<li class="dropdown hovered">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mantenimiento Control Service<span class="icon-cogs"></span></a>
					          <ul class="dropdown-menu">
					            <li><a href="../view/modules/EmpresasClientebuscar_vista.php">Clientes<span class="icon-users"></span></a></li>
					            <li><a href="../controller/Servicios_controlador.php">Servicios<span class="icon-edit-alt"></span></a></li>
					            <li><a href="../controller/Proyectos_controlador.php">Proyectos <span class="icon-flag"></span></a></li>
					          </ul>
					        </li>
							<li role="separator" class="divider"></li>
					            <li class="dropdown hovered">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mantenimiento Trabajadores<span class="icon-blind"></span></a>
									<ul class="dropdown-menu">
										<li><a href="../view/modules/TrabajadoresCRUD_vista.php">CRUD Trabajadores  <span class="icon-search"></span><span class="icon-plus"></span><span class="icon-pencil"></span><span class="icon-trash"></span></a></li>
									</ul>
								</li>
							<li class="dropdown hovered">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Control Servicios<span class="icon-pencil"></span></a>
								<ul class="dropdown-menu">
									<li class="hovered "> <a href="ControlService_controlador.php">Insertar Nuevo<span class="icon-plus"></span></a></li>
									<li><a href="../controller/listaControlService_controlador.php">Consulta Control de Servicios <span class="icon-globe"></span> </a></li>
								</ul>
							</li>

                            <li class=" hovered dis ">
                                <a href="../Panel-admin">P-admin<span class="icon-chart-line"></span></a>
                            </li>
							
							
						</ul>
						
						<!--<form action="" class="navbar-form navbar-left" role="search">
							<div class="form-group">
								<input type="text" class="form-control " placeholder="Buscar">
							</div>

							<button type="submit" class="btn btn-default ">Buscar</button>
						</form> -->
						
						<ul class="nav navbar-nav">
							<li class="hovered text-left "><a href="../controller/cerrar_sesion.php">Salir<span class="icon-reply-all"></span></a></li>
						</ul>
					</div>
				</div>
				
			</nav>
		</header>
	</div>
	
	<script type="text/javascript" src="../view/js/jquery.min.js"></script>
	<script type="text/javascript" src="../view/js/ajaxGoogle.js"></script>
	<script type="text/javascript" src="../view/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery.littlelightbox.js"></script>
	
</body>
</html>