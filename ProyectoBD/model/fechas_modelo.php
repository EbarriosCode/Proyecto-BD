<?php 
	class fechas{

		private $db, $conn;

		public function __construct()
		{
			require_once('Conexion.php');
			$this->db = new Conexion();
			$this->conn = $this->db->Conectar();
		}

		public function insertarFecha($fecha,$hora)
		{

			$sql = "INSERT INTO FECHAS(FECHA,HORA) VALUES(?,?)";

			$stmt = $this->conn->prepare($sql);
			$rs = $stmt->execute(array($fecha,$hora));

				if($rs)
					return true;

				else
					return false;
		}
	}
 ?>