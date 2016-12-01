<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="view/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="view/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="view/css/css-font/fontello.css">
	<link rel="stylesheet" type="text/css" href="view/css/jquery.littlelightbox.css" >

	<style>
		.elemento{
			display: none;
		}

		.inactivo{
			display: none;
		}
	</style>
	
	<?php 
		
		if(isset($_GET['boolean'])){
			//$ingreso = $_GET['boolean'];	
			echo "<style>.elemento{display:inline;}</style>";
		}


		if(isset($_GET['status'])){
			if($_GET['status'] == 'disabled')
				echo "<style>.inactivo{display:inline;}</style>";
		}
	 ?>

</head>
<body>
<div class="body-fon">
	<div class="container">
	<br>
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

						<strong href="#" class="navbar-brand">System Control </strong>
					</div>

					<div class="collapse navbar-collapse" id="navbar-1">
						<ul class="nav navbar-nav navbar-right">
							<li class="hovered"><a href="#ventana-Login" data-toggle="modal">Login <span class="icon-user-1" ></span></a></li>
							<li class="hovered"><a href="controller/Acercade_controlador.php">Acerca de <span class="icon-info-circled"></span></a></li>
							<li class="hovered"><a href="controller/Form-contacto_controlador.php">Contácto <span class="icon-mail-1"></span></a></li>
							
						</ul>

					</div>
				</div>
				
			</nav>
		</header>
	<div id="alerta-roja" class="elemento">
		<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;
			  </span></button>
			  <strong>Error de Autenticación:</strong> Usuario y / o Contraseña incorrectos.
		</div>
	</div>

		<div id="alerta-roja" class="inactivo">
		<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;
			  </span></button>
			  <strong>Error de Autenticación:</strong> Usuario Inactivo Comuniquese con el Administrador del Sistema.
		</div>
	</div>
	</div>

	<main class="container main">

		<a class="lightbox thumbnail" href="view/images/oracle.jpg" data-littlelightbox-group="gallery" title="Oracle Data-Base"><img src="view/images/oracle.jpg" alt="Oracle Data-Base" /></a>

		<a class="lightbox thumbnail" href="view/images/php1.jpg" data-littlelightbox-group="gallery" title="PHP 7"><img src="view/images/php1.jpg" alt="PHP 7"/></a>

	</main>

	<div class="container">	      
			<hr>
	      <footer>
	        <p>&copy; 2016 Ingeniería en Sistemas, UMG.</p>
	      </footer>
	 </div>

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
											
											<form class="form-signin" action="controller/Logeo_controlador.php" method="POST">
																	
											
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

	<script type="text/javascript" src="view/js/jquery.min.js"></script>
	<script type="text/javascript" src="view/js/bootstrap.min.js"></script>
	<script src="view/js/jquery.littlelightbox.js"></script>
	<script>
	$('.lightbox').littleLightBox();
	</script>

	
</body>
</html>