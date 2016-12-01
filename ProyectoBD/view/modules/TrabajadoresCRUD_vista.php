<?php 
		session_start();
		//echo $_SESSION['Usuario'];
		if (!isset($_SESSION['Usuario'])) {
			header(("Location:../../index.php"));
		}

    if(isset($_SESSION['estado'])){
        if($_SESSION['estado']==0)
            header(("Location:../index.php?status=disabled"));              
    }
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Búsqueda de Clientes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <link rel="stylesheet" type="text/css" href="../css/css-font/fontello.css"> 
    <link rel="stylesheet" type="text/css" href="../css/validarFormEmpresasCliente.css">
	
</head>
    <?php 
        if($_SESSION['tipo'] == 'admin')
          {
    ?>
          <style>.dis{
                    pointer-events:default;
                    opacity: 1;
                    cursor: default;
                    }
         </style> 
    <?php }else{ ?>
          <style>
              .dis{
                pointer-events:none;
                opacity: .3;
                cursor: none;
            }
      </style>
      <?php } ?>

      <?php 
          if(isset($_GET['boolean']))
          {
            echo "<style>.elemento{display:inline;}</style>";
          }
       ?>


<body onload="lista_Trabajadores('','1');">
    <!--Barra de Navegacion
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Cambiar Navegacion</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Búsqueda de Empresas Cliente</a>
        </div>
				
        
    </nav>  -->  </br></br>
    <div class="container">
        
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
                            
                            <li class="hovered dis">
                                <a href="../../Panel-admin">P-admin<span class="icon-chart-line"></span></a>
                            </li>
                        </ul>
                        
                        <ul class="nav navbar-nav">
                            <li class="hovered "> <a href="../../controller/cerrar_sesion.php">Salir<span class="icon-reply-all"></span></a></li>
                        </ul>
                    </div>
                </div>
                
            </nav>
        </header>



         <div class="row form-horizontal">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_consultar" data-toggle="tab">Consulta Tipo A</a></li>
              <li><a href="#tab_registrar" data-toggle="tab">Consulta Tipo B</a></li>
              
            </ul>
        </div>

        </br>


        <div class="tab-content">
            <div class="tab-pane active" id="tab_consultar">
                <div class="row form-horizontal">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4>Trabajadores Existentes</h4></div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-xs-4  text-right">
                                    <label for="buscar" class="control-label">Buscar:</label>

                                </div>
                                
                                <div class="col-xs-4">
                                    <input  type="text" name="buscar" id="buscar" class="form-control" onkeyup="lista_Trabajadores(this.value,1);" placeholder="Ingrese nombre, teléfono, direccion o puesto" onkeypress="return validateInput(event)"  onpaste="return false"/>
                                </div>

                                <div class="col-xs-4 text-left">
                                	 <a href="#modal-insertar" data-toggle="modal"><button type="button" class="btn btn-primary" ><span class="icon-plus"></span>Agregar / Nuevo</button></a>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div id="lista"></div> 
                                <div id="paginacion" class="text-center"></div>
                            </div> 
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        <!--PAGINACION  

          
        <nav aria-label="Page navigation">
              <ul class="pagination">
                <li class="disabled">
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                
                </li>
               <?php 
                //require_once('../model/EmpresaClientes_modelo.php');

                 //   for($i=1;$i<=10;$i++)
                    {
                 //     echo "<li><a href='../../controller/controladorbusquedaEmpresas_controlador.php?pagina=".$i."'>".$i." </a></li>";
                    }   
                
                ?>  

        
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>  
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
        </nav> -->

        <!--FIN PAGINACION-->          
            <div class="tab-pane" id="tab_registrar">
                <p>Presione click para Realizar la Consulta B</p><a href="../../controller/Consulta2Trabajadores_controlador.php" class="btn btn-info"><h4>Consulta Opción B <span class="icon-tripadvisor"></span></h4></a>
                     <hr>

      <footer>
        <p>&copy; 2016 Ingeniería en Sistemas, UMG.</p>
      </footer>
            </div>  
        </div><!-- tab content -->
    </div>

     <!-- MODAL PARA EDITAR -->

                <div class="modal fade" id="modal-editar">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h2 class="text-center "><strong>Editar Trabajadores</strong><span class="icon-pencil"></span></h2>
                            </div>
                             
                            <div class="modal-body">
                                <form action="../../controller/TrabajadoresCRUD_controlador.php" method="POST">
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input  type="hidden" id="idTrabajador" name="idTrabajador"/>
                                        <input type="text" id="nombre" name="nombre" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="telefono">Teléfono:</label>
                                        <input type="text" id="telefono" name="telefono" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="direccion">Dirección:</label>
                                        <input type="text" id="direccion" name="direccion" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="puesto">Puesto de Trabajo:</label>
                                        <input type="text" id="puesto" name="puesto" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                            </div>           

                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success" id="actualizar" name="actualizar" value="Actualizar">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                             </form>
                        </div>                     
                    </div>
                </div>

    <!-- CODIGO MODAL NUEVA EMPRESA CLIENTE  -->
    						<div class="modal fade" id="modal-insertar">
								<div class="modal-dialog">
									<div class="modal-content">
										
   										<!-- CONTENIDO DEL HEAD - MODAL -->
										
										<div class="modal-header">  

											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h2 class="text-center "><strong>Agregar Nuevo Trajador</strong><span class="icon-plus"></span></h2>
										</div>
										
										<!-- Contenido de la ventana -->
										<div class="modal-body">
											
											<form class="form-signi" action="../../controller/TrabajadoresCRUD_controlador.php" method="POST" onSubmit="return validar();">
																	
											<div class="form-group">											
													<label for="nombre" class="sr-only">Nombre:</label>
													<input  class="form-control" onblur="this.className ='form-control campo';" type="text" id="nombre" name="nombre" placeholder="Nombre del Trabajador" required autofocus onkeypress="return validateInput(event)"  onpaste="return false">
                                                    <span></span>
											</div>

											<div class="form-group">
													<label for="descripcion" class="sr-only">Teléfono:</label>
													<input value="" class="form-control" onblur="this.className ='form-control campo';" type="text" id="telefono" name="telefono" placeholder="Teléfono del Trabajador" required onkeypress="return validateInput(event)"  onpaste="return false">
                                                    <span></span>
											</div>
											
											<div class="form-group">
													<label for="direccion" class="sr-only">Dirección:</label>
													<input value="" class="form-control" onblur="this.className ='form-control campo';" type="text" id="direccion" name="direccion" placeholder="Dirección del Trabajador" required onkeypress="return validateInput(event)"  onpaste="return false">	
                                                    <span></span>
											</div>
                                            
                                            <div class="form-group">
                                                    <label for="responsable" class="sr-only">Puesto:</label>
                                                    <input value="" class="form-control" onblur="this.className ='form-control campo';" type="text" id="puesto" name="puesto" placeholder="Puesto del Trabajador" required onkeypress="return validateInput(event)"  onpaste="return false">  
                                                    <span></span>
                                            </div>

										<div class="modal-footer">
												<input type="submit" class="btn btn-primary" id="insertar" name="insertar"  value="Agregar">
                                                <!--<input type="reset" class="btn btn-danger" value="Limpiar Formulario">-->
												<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
										</div>
 
										</form>
									</div>
								</div>
							</div>

		<!-- carga de scripts-->
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap-modal.js"></script>
    <script type="text/javascript" src="../js/Trabajadores_ajax.js"></script>
    <script>
            function validateInput(e){
                    key = e.keyCode || e.which;
                    teclado = String.fromCharCode(key);
                    caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ´áéíóúÁÉÍÓÚ0123456789-";
                    especiales = "8-37-38-46-164";
                    teclado_especial = false;

                        for(var i in especiales)
                        {
                            if(key==especiales[i])
                            {
                                teclado_especial = true;
                                break;
                            }
                        }

                        if(caracteres.indexOf(teclado) == -1 && !teclado_especial)
                        {
                            return false;
                        }
                }
    </script>
<div class="container">
        <hr>
      <footer>
        <p>&copy; 2016 Ingeniería en Sistemas, UMG.</p>
      </footer>
</div>	
</body>
</html>