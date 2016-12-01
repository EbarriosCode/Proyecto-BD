<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Acerca De</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="view/images/php1.jpg" type="image/x-icon"/>

    <link rel="stylesheet" type="text/css" href="../view/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../view/css/estilos.css">
    <link rel="stylesheet" type="text/css" href="../view/css/css-font/fontello.css">
	
    <link rel="stylesheet" type="text/css" href="../view/css/jquery.littlelightbox.css" >
    <style>
		.carousel-control.right, .carousel-control.left {
		    background-image: none;
		    color: #f4511e;
		}

		.carousel-indicators li {
		    border-color: #f4511e;
		}

		.carousel-indicators li.active {
		    background-color: #f4511e;
		}

		.item h4 {
		    font-size: 19px;
		    line-height: 1.375em;
		    font-weight: 400;
		    font-style: italic;
		    margin: 70px 0;
		}

		.item span {
		    font-style: normal;
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

                        <strong href="#" class="navbar-brand">System Control </strong>
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


    <div class="container">
		<h2>Ingeniería en Sisemas, UMG 2016</h2>
			<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			    <li data-target="#myCarousel" data-slide-to="1"></li>
			    <li data-target="#myCarousel" data-slide-to="2"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			    <h4>"Lorem ipsum dolor sit amet, consectetur adipsicicing elit.!"<br><span style="font-style:normal;">Atque porro a reprehenderit repellendus, molestias pariatur</span></h4>
			    </div>
			    <div class="item">
			      <h4>"One word... WOW!!"<br><span style="font-style:normal;">John Doe, Salesman, Rep Inc</span></h4>
			    </div>
			    <div class="item">
			      <h4>"Could I... BE any more happy with this company?"<br><span style="font-style:normal;">Chandler Bing, Actor, FriendsAlot</span></h4>
			    </div>
			  </div>

			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>

		<hr>
      <div class="row">
        <div class="col-md-4">
          <h2>Misión</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque porro a reprehenderit repellendus, molestias pariatur odio corrupti qui? Adipisci temporibus similique, sequi maxime optio blanditiis aspernatur in mollitia dolorum dolorem.</p>
          <p><a class="btn btn-default" href="#" role="button">Ver Más &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Visión</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt, distinctio totam ipsa soluta eum officiis maiores dolores perspiciatis in ad. Veritatis sapiente, culpa magni, enim recusandae fugit laboriosam nam pariatur.</p>
          <p><a class="btn btn-default" href="#" role="button">Ver Más &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Valores</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio fugiat ullam ipsa dignissimos autem voluptatem facilis et excepturi ex deserunt dolores, quidem soluta adipisci culpa, fuga illum aspernatur. Quod, consequatur.</p>
          <p><a class="btn btn-default" href="#" role="button">Ver Más &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; 2016 Ingeniería en Sistemas, UMG.</p>
      </footer>
    </div> <!-- /container -->


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