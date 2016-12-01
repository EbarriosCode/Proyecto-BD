<?php 
		session_start();
		//echo $_SESSION['Usuario'];
		if (!isset($_SESSION['Usuario'])) {
			header(("Location:../index.php"));
		}
		require_once('../model/EmpresasClientes_modelo.php');

		$boton = $_POST['boton'];
		
		if($boton === 'buscar')
		{
			
       	 	$limite = 5;
		  		
		  		if(isset($_POST['pagina'])){
			  		$inicio=$_POST['pagina'];
			    	$nuevo_inicio = ($inicio-1) * $limite;
		    	}

			$valor = $_POST['valor'];
			
			$clientes = new Clientes_modelo();
			$matrizClientes = $clientes->busquedaClientes($valor);
			$contarRegistros = count($matrizClientes);
			//$contarRegistros = $clientes->numRegistros();
			$matrizClientesPag = $clientes->busquedaClientes($valor,$nuevo_inicio,$limite);
			
			echo json_encode($matrizClientesPag)."*".$contarRegistros;	
		}

		//require_once('../view/modules/EmpresasClientebuscar_vista.php');
		
 ?>