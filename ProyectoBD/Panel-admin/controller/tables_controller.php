<?php 
		session_start();
		//echo $_SESSION['Usuario'];
		if (!isset($_SESSION['Usuario'])) {
			header(("Location:../../index.php"));
		}
	require_once("../../Panel-admin/model/tables_model.php");
	$user = new Usuarios();
	$usuarios = $user->getUsuarios();
	
	require_once("../../Panel-admin/pages/tables.php");
 ?>