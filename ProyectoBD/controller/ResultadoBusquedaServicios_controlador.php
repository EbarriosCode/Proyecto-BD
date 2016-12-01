<?php 
		session_start();
		//echo $_SESSION['Usuario'];
		if (!isset($_SESSION['Usuario'])) {
			header(("Location:../index.php"));
		}
	require_once("../model/ResultadoBusquedaServicios_modelo.php");
	$inst = new Resultado_Servicio();
	if(isset($_POST['buscar']))
	{
		$la_busqueda = htmlentities(addslashes($_POST['busqueda-servicio']));
		$object = $inst->busqueda($la_busqueda);
		require_once("../view/modules/ResultadoBusquedaServicios_vista.php");
	}


 ?>