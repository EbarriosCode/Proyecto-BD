<?php 
	session_start();
	//echo $_SESSION['Usuario'];
	if (!isset($_SESSION['Usuario'])) {
		header(("Location:../index.php"));
	}

	require_once('../model/ControlServiceCRUD_modelo.php');
	require_once('../model/ControlService_modelo.php');
	
	$inst = new ControlService();
	$obj = new ControlService();
	$r = new ControlService();
	$n = new ControlService();
	$CRUD = new ControlServiceCRUD();

	$cliente = $inst->getPintarCliente();
	//echo json_encode($proyecto = $inst->getPintarProyecto());
	$proyecto = $r->getPintarProyecto();
	$servicio = $n->getPintarServicio();
	$trabajador = $obj->getPintarTrabajador();
	$getRegistrosControlService = $CRUD->getRegistros();
	$getRegistrosControlService1 = $CRUD->getRegistros();

	if(isset($_GET['accion']))
	{
		if($_GET['accion']=='editar')
		{	
			// datos recibidos por url para cargarlos al form de editar
			$id = $_GET['id'];
			$empresaCliente = $_GET['empresa_cliente'];
			$responsable = $_GET['responsable'];
			$proyecto = $_GET['proyecto'];
			$servicio = $_GET['servicio'];
			$encargadoServicio = $_GET['encargado'];
			$fechaInicio = $_GET['fechaInicio'];
			$horaInicio = $_GET['horaInicio'];
			$fechaFin = $_GET['fechaFin'];
			$horaFin = $_GET['horaFin'];
			$duracionServicio = $_GET['duracion'];
			$descripcion = $_GET['descripcion'];
			
		}

		if(isset($_POST['guarda']))
		{
				// datos recibidos del formulario de editar registro
				$id_edit = $_POST['id-edit'];
				$empresaCliente_edit = $_POST['empresa-cliente-edit'];
				$responsable_edit = $_POST['responsable-cliente-edit'];
				$proyecto_edit = $_POST['proyecto-edit'];
				$servicio_edit = $_POST['servicio-edit'];
				$encargadoServicio_edit = $_POST['encargado-edit'];
				$fechaInicio_edit = $_POST['fecha1-edit'];
				$horaInicio_edit = $_POST['hora1-edit'];
				$fechaFin_edit = $_POST['fecha2-edit'];
				$horaFin_edit = $_POST['hora2-edit'];
				$duracionServicio_edit = $_POST['duracion-edit'];
				$descripcion_edit = $_POST['descripcion-edit'];
				
				$editar = $CRUD->editar($id_edit,$empresaCliente_edit,$responsable_edit,$proyecto_edit,$servicio_edit,$encargadoServicio_edit,$fechaInicio_edit,$horaInicio_edit,$fechaFin_edit,$horaFin_edit,$duracionServicio_edit,$descripcion_edit);
				//$CRUD->editar($_POST['id-edit'],$_POST['empresa-cliente-edit'],$_POST['responsable-cliente-edit'],$_POST['proyecto-edit'],$_POST['servicio-edit'],$_POST['encargado-edit'],$_POST['fecha1-edit'],$_POST['hora1-edit'],$_POST['fecha2-edit'],$_POST['hora2-edit'],$_POST['duracion-edit'],$_POST['descripcion-edit']);	
				if($editar){
					 echo "<script>alert('Se Edito correctamente');</script>;";
					 echo "<script>window.location.href='listaControlService_controlador.php'</script>";
					 //header("Location:listaControlService_controlador.php");
				}
				else
					echo "<script>alert('No Se Edito ningún registro');</script>";
					//echo "No se Edito ningún registro"; */	
		}

		if($_GET['accion']=='borrar')
		{
			$id = $_GET['id'];
			$borrar = $CRUD->eliminar($id);

			if ($borrar) {
				//echo "Registro Eliminado Correctamente";
				header("Location:listaControlService_controlador.php");
			}
			else{
				echo "No se elimino ningún Registro";
				//header("Location:../view/modules/EmpresasClientebuscar_vista.php");
			}
		}
	}

	require_once('../view/modules/ControlServiceCRUD_vista.php');
echo $registro['ID']."<BR>";
								 echo $id;
 ?>