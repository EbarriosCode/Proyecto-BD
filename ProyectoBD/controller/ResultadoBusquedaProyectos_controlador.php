<?php 
		session_start();
		//echo $_SESSION['Usuario'];
		if (!isset($_SESSION['Usuario'])) {
			header(("Location:../index.php"));
		}
	require_once("../model/ResultadoBusquedaProyectos_modelo.php");
	$inst = new Resultado_Proyecto();
	if(isset($_POST['buscar']))
	{
		$la_busqueda = htmlentities(addslashes($_POST['busqueda-proyecto']));
		$object = $inst->busqueda($la_busqueda);
		require_once("../view/modules/ResultadoBusquedaProyectos_vista.php");
	}


 ?>