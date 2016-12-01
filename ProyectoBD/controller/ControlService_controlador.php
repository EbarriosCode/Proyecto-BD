<?php 
	/*require_once('../model/Conexion.php');
	
	$conn = new Conexion();
	$inst = $conn->Conectar(); 
	$sql = "SELECT * FROM EMPRESAS_CLIENTELA";
	$stmt = $inst->prepare($sql);
	$stmt->execute();*/
		session_start();
	//echo $_SESSION['Usuario'];
	if (!isset($_SESSION['Usuario'])) {
		header(("Location:../index.php"));
	}

	require_once('../model/ControlService_modelo.php');
	$inst = new ControlService();
	$obj = new ControlService();

	$cliente = $inst->getPintarCliente();
	//$responsableCliente = $inst->recuperaResponsable($_POST['responsable-cliente']);
	$proyecto = $inst->getPintarProyecto();
	$servicio = $obj->getPintarServicio();
	$trabajador = $obj->getPintarTrabajador();

	if(isset($_POST['guarda']))
	{
		//echo $_POST['empresa-cliente'];
		//echo "<br>".$_POST['responsable-cliente'];
		$empresaCliente = $_POST['empresa-cliente'];
		$responsable = $_POST['responsable-cliente'];
		$proyecto = $_POST['proyecto'];
		$servicio = $_POST['servicio'];
		$encargadoServicio = $_POST['encargado'];
		$fechaInicio = $_POST['fecha1'];
		$horaInicio = $_POST['hora1'];
		$fechaFin = $_POST['fecha2'] ;
		$horaFin = $_POST['hora2'];
		$duracionServicio = $_POST['duracion'];
		$descripcion = $_POST['descripcion'];

		$objGuardar = new ControlService();
		$verificarInsertado = $objGuardar->insertarServicio($empresaCliente,$responsable,$proyecto,$servicio,$encargadoServicio,$fechaInicio,$horaInicio,$fechaFin,$horaFin,$duracionServicio,$descripcion);

			if ($verificarInsertado) {
					echo "<script> alert('Datos Guardados Correctamente'); </script>";
					echo "<script>window.location.href='listaControlService_controlador.php'</script>";
			}

			else{
				echo "<script> alert('No se guardaron los datos'); </script>";
			} 
		
	}
	

	require_once('../view/modules/ControlService_vista.php');


 ?>