<?php 
	 //echo "<h5>".$_GET['user']."</h5>";
	session_start();
	//echo $_SESSION['Usuario'];
	if (!isset($_SESSION['Usuario'])) {	
			header(("Location:../index.php"));		
	}

	if(isset($_SESSION['estado'])){
		if($_SESSION['estado']==0)
			header(("Location:../index.php?status=disabled"));				
	}
	
	require_once('../view/modules/PrincipalLogeado_vista.php');
 ?>