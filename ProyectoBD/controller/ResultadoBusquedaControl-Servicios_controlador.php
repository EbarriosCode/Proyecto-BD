<?php
		session_start();
		//echo $_SESSION['Usuario'];
		if (!isset($_SESSION['Usuario'])) {
			header(("Location:../index.php"));
		} 
	require_once("../model/ResultadoBusquedaControl-Servicios_modelo.php");
	$inst = new Resultado_ControlService();
	if(isset($_POST['buscar']))
	{
		$la_busqueda = htmlentities(addslashes($_POST['busqueda-control-servicio']));
		$object = $inst->busqueda($la_busqueda);
		require_once("../view/modules/ResultadoBusquedaControl-Servicios_vista.php");
	}


 ?>