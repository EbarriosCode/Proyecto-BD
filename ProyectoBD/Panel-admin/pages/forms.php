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
    <link href="../css-font/fontello.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

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
                        <li><a href="../controller/profile_controller.php"><i class="fa fa-user fa-fw"></i> Usuario <?php echo $_SESSION['Usuario']; ?></a>
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
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mantenimiento Usuarios</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Usuarios
                        </div>
                        <div class="panel-body">
                            <a href="#modal-insertar" data-toggle="modal"><button class="btn btn-primary">Crear Nuevo <span class="icon-plus"></span></button></a>
                            <br>
                            <form action="">
                                <div class="form-group">
                                    
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOMBRE</th>
                                            <th>CONTRASEÑA</th>
                                            <th>TIPO DE USUARIO</th>
                                            <th>ESTADO</th>
                                            <th colspan="2">OPCIONES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($User as $inst): ?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo $inst['ID']; ?></td>
                                            <td class="center"><?php echo $inst['NOMBRE']; ?></td>
                                            <td class="center"><?php echo $inst['PASSWORD']; ?></td>
                                            <td><?php echo $inst['TIPO_USUARIO']; ?></td>
                                            <td><?php  if($inst['ESTADO'] == '1') echo "Activo"; else echo "Inactivo"; ?></td>
                                            <td><a href="#modal-editar" data-toggle="modal"><button class="btn btn-success" onclick="cargarDatosModal('<?php echo $inst['ID'];?>','<?php echo $inst['NOMBRE']; ?>','<?php echo $inst['PASSWORD']; ?>','<?php echo $inst['TIPO_USUARIO']; ?>','<?php echo $inst['ESTADO']; ?>');">Editar <span class="icon-pencil"></span></button></a></td>
                                            <td><button onclick="confirmarDelete('borrar',<?php echo $inst['ID'];?>);" class="btn btn-danger">Borrar <span class="icon-trash"></span></button></td>
                                        </tr>
                                <?php endforeach; ?>
                                   
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
            <!--PAGINACION --> 

    <div class="text-center">
        <nav aria-label="Page navigation">
              <ul class="pagination">
               <?php 
                

                    for($i=1;$i<=$total_paginas;$i++)
                    {
                        if($i == $inicio ){
                             echo "<li class='active'><a>".$i." </a></li>";
                        }    
                        else{
                             echo "<li><a href='?pagina=".$i."'>".$i." </a></li>";  
                        }    
                    
                    } 
                 ?>
              </ul>
        </nav> 
    </div>
     <div class="container">
        <h5 class="text-left">
            <strong>
                    <?php 
                        if($inicio == 0) $inicioPag = 1;
                        else $inicioPag = $inicio;
                        echo "Página ".$inicioPag." de ".$total_paginas;
                        echo " (Total de registros ".$total_registros.")"; 
                        
                    ?>
            </strong>
        </h5>
    </div>
        <!-- /#page-wrapper -->
<div class="container">
            <hr>
      <footer>
        <p>&copy; 2016 Ingeniería en Sistemas, UMG.</p>
      </footer>
</div>
    </div>

    <!-- MODAL PARA EDITAR -->

                <div class="modal fade" id="modal-editar">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                 <h2 class="text-center "><strong>Editar Usuario</strong><span class="icon-pencil"></span></h2>
                            </div>
                             
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div class="from-group">
                                        <label for="idUser">Id:</label>
                                        <input  type="text" id="idUser" name="idUser" class="form-control" placeholder="Id"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" id="nombre" name="nombre" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Contraseña:</label>
                                        <input type="text" id="password" name="password" class="form-control" onkeypress="return validateInput(event)"  onpaste="return false">
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="sr-only">Tipo Usuario:</label>
                                            <select name="tipoUserEdit" class="form-control" required>
                                                <option value="">Tipo Usuario:</option>
                                                <option value="1">admin</option>
                                                <option value="0">user</option>
                                        </select>
                                    </div>
                                            
                                    <div class="form-group">
                                        <label>Estado Usuario:</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="estadoEdit" id="activo" value="1"checked>Activo
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="estadoEdit" id="inactivo" value="0">Inactivo
                                                </label>
                                            </div>
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
<!-- CODIGO MODAL REGISTRO NUEVO  -->
                            <div class="modal fade" id="modal-insertar">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        
                                        <!-- CONTENIDO DEL HEAD - MODAL -->
                                        
                                        <div class="modal-header">  

                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h2 class="text-center "><strong>Nuevo Usuario</strong><span class="icon-plus"></span></h2>
                                        </div>
                                        
                                        <!-- Contenido de la ventana -->
                                        <div class="modal-body">
                                            
                                            <form action="" method="POST" onSubmit="return validar();">
                                            <div class="form-group">                                            
                                                    <label for="id" class="sr-only">Id:</label>
                                                    <input  class="form-control" onblur="this.className ='form-control campo';" type="text" id="id" name="id" placeholder="Id" required autofocus onkeypress="return validateInput(event)"  onpaste="return false">
                                                    <span></span>
                                            </div>
                                                                    
                                            <div class="form-group">                                            
                                                    <label for="nombre" class="sr-only">Nombre:</label>
                                                    <input  class="form-control" onblur="this.className ='form-control campo';" type="text" id="nombre" name="nombre" placeholder="Nombre" required autofocus onkeypress="return validateInput(event)"  onpaste="return false">
                                                    <span></span>
                                            </div>

                                            <div class="form-group">
                                                    <label for="password" class="sr-only">Contraseña:</label>
                                                    <input value="" class="form-control" onblur="this.className ='form-control campo';" type="text" id="password" name="password" placeholder="Contraseña" required onkeypress="return validateInput(event)"  onpaste="return false">
                                                    <span></span>
                                            </div>
                                            
                                            <div class="form-group">
                                                    <label for="tipoUser" class="sr-only">Tipo Usuario:</label>
                                                    <select name="tipoUser" id="tipoUser" class="form-control" required="required">
                                                        <option >Tipo Usuario:</option>
                                                        <option value="1">admin</option>
                                                        <option value="0">user</option>
                                                    </select>
                                            </div>
                                            
                                        <div class="form-group">
                                            <label>Estado Usuario:</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="estado" id="activo" value="1" checked>Activo
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="estado" id="inactivo" value="0">Inactivo
                                                </label>
                                            </div>
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


    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script>
    function cargarDatosModal(id,nombre,pass,tipo,estado){
                    var idUser = id;
                    var nombreUser = nombre;
                    var passUser = pass;
                    var tipoUser = tipoUser;
                    var estado = status;
                    //alert(id+nombre+descripcion);

                    $("#idUser").val(idUser);
                    $("#nombre").val(nombreUser);
                    $("#password").val(passUser);
                    $("#tipoUser").val(tipoUser);
                    $("#").val(passUser);

                }


    function confirmarDelete(accion,idDelete)
    {   
        if (window.confirm("Esta seguro que desea eliminar este registro? ") == true)
        {
            window.location = "forms_controller.php?accion="+accion+"&id="+idDelete;
        }
    }
    
    </script>

</body>

</html>
