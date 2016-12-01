<?php 
	
	session_start();
	//echo $_SESSION['Usuario'];
	if (!isset($_SESSION['Usuario'])) {
		header(("Location:../index.php"));
	}
	require_once("../model/Servicios_modelo.php");
		$obj = new Servicios();
		$objeto = new Servicios();
		//$inst = $obj->getServicios();

	if(isset($_POST['insertar']))
	{
		$servicio = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];

		$comprobar = $obj->insertar($servicio,$descripcion);
			if($comprobar)
			{
				echo "<script>alert('Registro Almacenado Correctamente');";
				echo "window.location.href='Servicios_controlador.php'</script>";
			}
			else
			{
				echo "<script>alert('No se inserto ningún registro');";
				echo "window.location.href='Servicios_controlador.php'</script>";
			}
	}

	if(isset($_POST['actualizar'])){
		 $id = $_POST['id-servicio'];
		 $servicio = $_POST['nombre-servicio'];
		 $descripcion = $_POST['descripcion-servicio'];

		 $verifica = $objeto->editar($id,$servicio,$descripcion);
			if($verifica)
			{
				header("Location:Servicios_controlador.php");
			}
			else
			{
				echo "Error";
			}		
		
	}
	
	if(isset($_GET['accion']))
	{
		if(strcmp($_GET['accion'],"borrar") == 0 ){
			$idServicio = $_GET['id'];

			$bool = $obj->eliminar($idServicio);
			if ($bool) {
				echo "<script>alert('Registro Eliminado Correctamente');";
				echo "window.location.href='Servicios_controlador.php'</script>";
			}
			else
			{
				echo "<script>alert('No se borro ningún registro');";
			}
		}
	}

	$cant_Columnas = new Servicios();
	
	$no_registros = 5;

	if(isset($_GET['pagina']))
	 {
		if($_GET['pagina']==1)
		{
			header("Location:Servicios_controlador.php");
		}
		else{
			$inicio = $_GET['pagina'];
			//$nuevo_inicio = ($inicio-1)*$no_registros;
		}
	}
	else
	{
		$inicio = 0;
		
	}		
	
	$nuevo_inicio = ($inicio-1)*$no_registros;

	$inst = $obj->getServicios($nuevo_inicio,$no_registros);
	
	$total_registros = $cant_Columnas->numRegistros();
	$total_paginas = ceil($total_registros/$no_registros);
	require_once("../view/modules/Servicios_vista.php")
 ?>