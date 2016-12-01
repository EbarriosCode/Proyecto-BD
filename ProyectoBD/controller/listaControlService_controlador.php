<?php
	session_start();
	//echo $_SESSION['Usuario'];
	if (!isset($_SESSION['Usuario'])) {
		header(("Location:../index.php"));
	}
	require_once('../model/listaControlService_modelo.php');

	$inst = new listaControlService();
	$cant_Columnas = new listaControlService();
	
	$no_registros = 5;

	if(isset($_GET['pagina']))
	 {
		if($_GET['pagina']==1)
		{
			header("Location:listaControlService_controlador.php");
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

	$obj = $inst->getControlService($nuevo_inicio,$no_registros);
	
	$total_registros = $cant_Columnas->numRegistros();
	$total_paginas = ceil($total_registros/$no_registros);
	//echo "Total registros: ".$total_registros;

	require_once('../view/modules/listaControlService_vista.php');
 ?>