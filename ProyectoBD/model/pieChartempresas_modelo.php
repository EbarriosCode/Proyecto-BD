<?php 
	
	class Empresas{

		private $db, $conn;
		private $registo;
		private $nombreEmpresa , $presupuestoEmpresa;

		public function __construct()
		{
			require_once('Conexion.php');
			$this->db = new Conexion();
			$this->conn = $this->db->Conectar();

			$this->registo = array();
			$this->nombreEmpresa = array();
			$this->presupuestoEmpresa = array();
		}

		public function getEmpresas()
		{
			$sql = "SELECT * FROM EMPRESAS_CLIENTE";

			$stmt = $this->conn->prepare($sql);
			$stmt->execute();

			while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$this->registro[] = $fila;
			}

			return $this->registro;
		}

		public function getNombreEmpresa()
		{
			$sql = "SELECT NOMBRE FROM EMPRESAS_CLIENTE";

			$stmt = $this->conn->prepare($sql);
			$stmt->execute();

			while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$this->nombreEmpresa[] = $fila;
			}

			return $this->nombreEmpresa;	
		}

	}

 ?>