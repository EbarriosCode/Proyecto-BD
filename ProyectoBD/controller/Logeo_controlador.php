<?php 
	
	$usu = htmlentities(addslashes($_POST['usu']));
	$pass = htmlentities(addslashes($_POST['pass']));
	
	require_once('../model/Logeo_modelo.php');
	
	$usersLogeados = new Usuarios_sistema(); 

		//$usersLogeados->setUsuario();
		
			if ($usersLogeados->entrarSystem($usu,$pass))
			{
				$verificacion = $usersLogeados->autenticar($usu);
				foreach($verificacion as $autenticado)
				{
					$type = $autenticado['TIPO_USUARIO'];
					$status = $autenticado['ESTADO'];
				}
				//echo "Existe -- Usuario";
				session_start();
				$_SESSION['Usuario'] = $_POST['usu'];
				$_SESSION['tipo'] = $type;
				$_SESSION['estado'] = $status;
				//echo $_SESSION['Usuario'];

				header("Location:PrincipalLogeado_controlador.php?boolean=true&user=$usu&tipo=$type&estado=$status");		
			}

			else
			{
				header("Location:../index.php?boolean=false");
			}		

 ?>