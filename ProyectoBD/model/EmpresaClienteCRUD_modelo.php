<?php 
	
	class EmpresaClienteCRUD
	{	
		private $db, $conn;

		public function __construct()
		{
			require_once('Conexion.php');
			$this->db = new Conexion();
			$this->conn = $this->db->Conectar();
		}

		public function insertar($nombre, $descripcion, $direccion, $responsable)
		{
			$sql = "INSERT INTO EMPRESAS_CLIENTELA (NOMBRE,DESCRIPCION,DIRECCION,RESPONSABLE) VALUES ('".$nombre."','".$descripcion."','".$direccion."','".$responsable."')";
			
			$stmt = $this->conn->prepare($sql);
			$result = $stmt->execute();

				if($result)
				{
					return 1;
				}			
				else
				{
					return 0;
				}
		}

		public function editar($id, $nombre, $descripcion, $direccion, $responsable)
		{
			$sql = "UPDATE EMPRESAS_CLIENTELA SET NOMBRE='$nombre', DESCRIPCION='$descripcion', DIRECCION='$direccion', RESPONSABLE='$responsable' WHERE ID='$id'";
			$stmt = $this->conn->prepare($sql);
			$result = $stmt->execute();

				if($result)
				{
					return 1;
				}			
				else
				{
					return 0;
				}
		}

		public function borrar($id)
		{
		  $sql = "DELETE FROM EMPRESAS_CLIENTELA WHERE ID = '$id'";
		  $rs = $this->conn->prepare($sql);
		  $result = $rs->execute();

 				if($result)
				{
					return 1;
				}			
				else
				{
					return 0;
				}
		}
}
	/*$inst = new AgregarEmpresaCliente();
	$res = $inst->borrar('6');
	echo $res;*/

 ?>