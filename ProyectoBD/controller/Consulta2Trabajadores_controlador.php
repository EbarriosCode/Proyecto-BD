<?php 
		session_start();
		//echo $_SESSION['Usuario'];
		if (!isset($_SESSION['Usuario'])) {
			header(("Location:../index.php"));
		}

	require_once("../model/Consulta2Trabajadores_modelo.php");
		$obj = new Trabajadores();
		$objeto = new Trabajadores();
		//$inst = $obj->getServicios();

	if(isset($_POST['insertar']))
	{
		$nombre = $_POST['nombre'];
		$telefono = $_POST['telefono'];
		$direccion = $_POST['direccion'];
		$puesto = $_POST['puesto'];

		$comprobar = $obj->insertar($nombre,$telefono,$direccion,$puesto);
			if($comprobar)
			{
				echo "<script>alert('Registro Guardado Correctamente');";
				echo "window.location.href='Consulta2Trabajadores_controlador.php'</script>";
				//header("Location:Consulta2Empresas_cliente_controlador.php");
			}
			else
			{
				echo "Error";
			}
	}

	if(isset($_POST['actualizar'])){
		 $id = $_POST['id-trabajador2'];
		 $nombre2 = $_POST['nombre-trabajador2'];
		 $telefono2 = $_POST['telefono-trabajador2'];
		 $direccion2 = $_POST['direccion-trabajador2'];
		 $puesto2 = $_POST['puesto-trabajador2'];

		 $verifica = $objeto->editar($id,$nombre2,$telefono2,$direccion2,$puesto2);
			if($verifica)
			{
				echo "<script>alert('Registro Actualizado Correctamente');";
				echo "window.location.href='Consulta2Trabajadores_controlador.php'</script>";
			}
			else
			{
				echo "<script>alert('No se Actualizo ningun Registro');";
				echo "window.location.href='Consulta2Trabajadores_controlador.php'</script>";
			}		
		
	}
	
	if(isset($_GET['accion']))
	{
		if(strcmp($_GET['accion'],"borrar") == 0 ){
			$idTrabajador = $_GET['id'];

			$bool = $obj->eliminar($idTrabajador);
			if ($bool) {
				echo "<script>alert('Registro Borrado Correctamente');";
				echo "window.location.href='Consulta2Trabajadores_controlador.php'</script>";
			}
			else
			{
				echo "<script>alert('No se borro ningún registro');";
			}
		}
	}

	$cant_Columnas = new Trabajadores();
	
	$no_registros = 5;

	if(isset($_GET['pagina']))
	 {
		if($_GET['pagina']==1)
		{
			header("Location:Consulta2Trabajadores_controlador.php");
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

	$inst = $obj->getTrabajadores2($nuevo_inicio,$no_registros);
	
	$total_registros = $cant_Columnas->numRegistros();
	$total_paginas = ceil($total_registros/$no_registros);
	require_once("../view/modules/Consulta2Trabajadores_vista.php");
 ?>