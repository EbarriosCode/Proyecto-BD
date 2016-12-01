<?php 
	
	class Conexion{
	
		public function Conectar()
		{
			try {
				$base = new PDO("oci:dbname=XE","PRUEBA","root");
				$base->exec("SET CARACTER SET utf8");

				//echo "Exito";
				return $base;
			
				} catch (Exception $e) {
				die("Error: ".$e->getMessage());
			}
		}
	}

	/*
	$conn = new Conexion();
	$bd = $conn->Conectar();


	$sql = "insert into usuarios (ID, NOMBRE, APELLIDO) values('5','ah ya vas','morro')";
	//$sql = "select * from usuarios";
	$result = $bd->prepare($sql);
	$result->execute();

	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		echo $row["NOMBRE"]."<br>";
	}  */

 ?>