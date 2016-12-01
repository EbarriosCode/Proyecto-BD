<?php 

	class Servicios{

		private $conn,$db,$servicios;

		public function __construct()
		{
			require_once('Conexion.php');
			$this->conn = new Conexion();
			$this->db = $this->conn->Conectar();
			$this->servicios = array();
		}

		public function getServicios($inicio=false,$no_registros=false)
		{
			if($inicio!=false && $no_registros!=false)
			{
				
				$sql = "SELECT * FROM (SELECT ID,NOMBRE,DESCRIPCION,ROW_NUMBER() OVER(ORDER BY ID ASC) RN FROM SERVICIOS) WHERE RN>'$inicio' AND ROWNUM <='$no_registros'";
			}

			else
			{
				$sql = "SELECT * FROM SERVICIOS ORDER BY ID ASC";
			}

			$stmt = $this->db->prepare($sql);
			$stmt->execute();

			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->servicios[] = $row;
			}

			return $this->servicios;
		}

		public function insertar($servicio,$descripcion)
		{
			$sql = "INSERT INTO SERVICIOS(NOMBRE,DESCRIPCION) VALUES('$servicio','$descripcion')";
			$stmt = $this->db->prepare($sql);
			$result = $stmt->execute();

			if($result)
			{
				return true;
			}

			else{
				return false;
			}

		}

		public function eliminar($id)
		{
			$sql = "DELETE FROM SERVICIOS WHERE ID='$id'";
			$stmt = $this->db->prepare($sql);
			$result = $stmt->execute();

			if($result)
			{
				return true;
			}

			else{
				return false;
			}
		}

		public function editar($id,$servicio,$descripcion)
		{
			$sql = "UPDATE SERVICIOS SET NOMBRE='$servicio', DESCRIPCION='$descripcion' WHERE ID='$id'";
			$stmt = $this->db->prepare($sql);
			$result = $stmt->execute();

			if($result)
			{
				return true;
			}

			else{
				return false;
			}
		}

		public function numRegistros()
		{
			$sql = "SELECT COUNT(*) FROM SERVICIOS";
				$resultado = $this->db->query($sql);
				$num = $resultado->fetchColumn();
				return $num;
		}

	}
	/*
	$r = new Servicios();
	$n = $r->numRegistros();
	echo "total: ".$n."<br>";

	$r = new Servicios();
	$m = $r->getServicios();
	//print_r($m);  
	echo json_encode($r->getServicios());*/

 ?>