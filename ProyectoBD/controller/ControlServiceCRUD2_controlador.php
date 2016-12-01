<?php 

	session_start();
	//echo $_SESSION['Usuario'];
	if (!isset($_SESSION['Usuario'])) {
		header(("Location:../index.php"));
	}

	require_once('../model/ControlServiceCRUD_modelo.php');
	$CRUD = new ControlServiceCRUD();

	echo $id_edit = $_POST['id-edit'];
	echo $empresaCliente_edit = $_POST['empresa-cliente-edit'];
	echo $responsable_edit = $_POST['responsable-cliente-edit'];
	echo $proyecto_edit = $_POST['proyecto-edit'];
	echo $servicio_edit = $_POST['servicio-edit'];
	echo $encargadoServicio_edit = $_POST['encargado-edit'];
	echo $fechaInicio_edit = $_POST['fecha1-edit'];
	echo $horaInicio_edit = $_POST['hora1-edit'];
	echo $fechaFin_edit = $_POST['fecha2-edit'];
	echo $horaFin_edit = $_POST['hora2-edit'];
	echo $duracionServicio_edit = $_POST['duracion-edit'];
	echo $descripcion_edit = $_POST['descripcion-edit'];
		
	$editar = $CRUD->editar($id_edit,$empresaCliente_edit,$responsable_edit,$proyecto_edit,$servicio_edit,$encargadoServicio_edit,$fechaInicio_edit,$horaInicio_edit,$fechaFin_edit,$horaFin_edit,$duracionServicio_edit,$descripcion_edit);
	//$CRUD->editar($_POST['id-edit'],$_POST['empresa-cliente-edit'],$_POST['responsable-cliente-edit'],$_POST['proyecto-edit'],$_POST['servicio-edit'],$_POST['encargado-edit'],$_POST['fecha1-edit'],$_POST['hora1-edit'],$_POST['fecha2-edit'],$_POST['hora2-edit'],$_POST['duracion-edit'],$_POST['descripcion-edit']);	
	if($editar){
		 //echo "<script>alert('Se Edito correctamente');</script>;";
		 //echo "<script>window.location.href='listaControlService_controlador.php'</script>";
		 //header("Location:listaControlService_controlador.php");
		echo "se edito :)";
	}
	else
		echo "No se edito :(";
		//echo "<script>alert('No Se Edito ningún registro');</script>";
	

 ?>