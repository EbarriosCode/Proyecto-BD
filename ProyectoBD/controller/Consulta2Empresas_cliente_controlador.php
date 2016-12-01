<?php 
		session_start();
		//echo $_SESSION['Usuario'];
		if (!isset($_SESSION['Usuario'])) {
			header(("Location:../index.php"));
		}

	require_once("../model/Consulta2Empresas_cliente_modelo.php");
		$obj = new EmpresasCliente2();
		$objeto = new EmpresasCliente2();
		//$inst = $obj->getServicios();

	if(isset($_POST['insertar']))
	{
		$empresa = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$direccion = $_POST['direccion'];
		$responsable = $_POST['responsable'];

		$comprobar = $obj->insertar($empresa,$descripcion,$direccion,$responsable);
			if($comprobar)
			{
				echo "<script>alert('Registro Guardado Correctamente');";
				echo "window.location.href='Consulta2Empresas_cliente_controlador.php'</script>";
				//header("Location:Consulta2Empresas_cliente_controlador.php");
			}
			else
			{
				echo "Error";
			}
	}

	if(isset($_POST['actualizar'])){
		 $id = $_POST['id-empresa2'];
		 $empresa2 = $_POST['nombre-empresa2'];
		 $descripcion = $_POST['descripcion-empresa2'];
		 $direccion = $_POST['direccion-empresa2'];
		 $responsable = $_POST['responsable-empresa2'];

		 $verifica = $objeto->editar($id,$empresa2,$descripcion,$direccion,$responsable);
			if($verifica)
			{
				header("Location:Consulta2Empresas_cliente_controlador.php");
			}
			else
			{
				echo "Error";
			}		
		
	}
	
	if(isset($_GET['accion']))
	{
		if(strcmp($_GET['accion'],"borrar") == 0 ){
			$idEmpresa = $_GET['id'];

			$bool = $obj->eliminar($idEmpresa);
			if ($bool) {
				header("Location:Consulta2Empresas_cliente_controlador.php");
			}
			else
			{
				echo "<script>alert('No se borro ningún registro');";
			}
		}
	}

	$cant_Columnas = new EmpresasCliente2();
	
	$no_registros = 5;

	if(isset($_GET['pagina']))
	 {
		if($_GET['pagina']==1)
		{
			header("Location:Consulta2Empresas_cliente_controlador.php");
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

	$inst = $obj->getEmpresas2($nuevo_inicio,$no_registros);
	
	$total_registros = $cant_Columnas->numRegistros();
	$total_paginas = ceil($total_registros/$no_registros);
	require_once("../view/modules/Consulta2Empresas_cliente_vista.php");
 ?>