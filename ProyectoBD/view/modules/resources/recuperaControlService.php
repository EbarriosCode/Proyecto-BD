<!DOCTYPE html>
<html>
<head>
	
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<meta charset="utf-8">
</head>
<body>

</body>
</html>
<?php 
		$parametro = $_GET['parametro'];
		//$parametro = "Futeca";
		include("../../../model/Conexion.php");
		$con = new Conexion();
		$conect = $con->Conectar();

		$sql = "SELECT RESPONSABLE FROM EMPRESAS_CLIENTELA WHERE NOMBRE =?";
		$result = $conect->prepare($sql);
		$result->execute(array($parametro));

		while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
			echo "<input class='form-control' id='responsable-cliente' name='responsable-cliente' required onkeypress='return validateInput(event)'  onpaste='return false' value='".$fila['RESPONSABLE']."'>";
			//echo $fila['RESPONSABLE'];
		}

 ?>
