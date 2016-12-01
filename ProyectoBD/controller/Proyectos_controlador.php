<?php 
	session_start();
	//echo $_SESSION['Usuario'];
	if (!isset($_SESSION['Usuario'])) {
		header(("Location:../index.php"));
	}
	
	require_once("../model/Proyectos_modelo.php");
	$obj = new Proyectos();
	$objeto = new Proyectos();
	//$inst = $obj->getProyectos();


	if(isset($_POST['insertar']))
	{
		$proyecto = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];

		$comprobar = $obj->insertar($proyecto,$descripcion);
			if($comprobar)
			{
				echo "<script>alert('Registro Almacenado Correctamente');";
				echo "window.location.href='Proyectos_controlador.php'</script>";
			}
			else
			{
				echo "<script>alert('No se inserto ningún registro');";
				echo "window.location.href='Proyectos_controlador.php'</script>";
			}
	}

	if(isset($_POST['actualizar'])){
		 $id = $_POST['id-servicio'];
		 $servicio = $_POST['nombre-servicio'];
		 $descripcion = $_POST['descripcion-servicio'];

		 $verifica = $objeto->editar($id,$servicio,$descripcion);
			if($verifica)
			{
				echo "<script>alert('Registro Actualizado Correctamente');";
				echo "window.location.href='Proyectos_controlador.php'</script>";
			}
			else
			{
				echo "<script>alert('Error No se Actualizao el registro');";
				echo "window.location.href='Proyectos_controlador.php'</script>";
			}		
		
	}
	
	if(isset($_GET['accion']))
	{
		if(strcmp($_GET['accion'],"borrar") == 0 ){
			$idServicio = $_GET['id'];

			$bool = $obj->eliminar($idServicio);
			if ($bool) {
				echo "<script>alert('Registro Borrado Correctamente');";
				echo "window.location.href='Proyectos_controlador.php'</script>";
			}
			else
			{
				echo "<script>alert('No se borro ningún registro');";
			}
		}
	}

	$cant_filas = new Proyectos();
	$pagination = new Proyectos();	
	$no_registros = 5;

	if(isset($_GET['pagina']))
	 {
		if($_GET['pagina']==1)
		{
			header("Location:Proyectos_controlador.php");
		}
		else{
			$inicio = $_GET['pagina'];
			//$nuevo_inicio = ($inicio-1)*$no_registros;
		}
	}
	
	if(!(isset($_GET['pagina'])))
	{
		$inicio = 0;
		
	}		
	
	$nuevo_inicio = ($inicio-1)*$no_registros;

	$inst = $pagination->getProyectos($nuevo_inicio,$no_registros);
	
	$total_registros = $cant_filas->numRegistros();
	$total_paginas = ceil($total_registros/$no_registros);
	//echo "Inicio: ".$nuevo_inicio." Fin: ".$no_registros;
	require_once("../view/modules/Proyectos_vista.php");
 ?>