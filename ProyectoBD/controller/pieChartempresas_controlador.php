<?php 
	session_start();
	//echo $_SESSION['Usuario'];
	if (!isset($_SESSION['Usuario'])) {
		header(("Location:../index.php"));
	}	
	require_once('../model/pieChartempresas_modelo.php');
	//$empresaChart = new Empresas();
	//$matrizEmpresas = $empresaChart->getEmpresas();

	require_once('../view/modules/pieChartempresas_vista.php');
 ?>


